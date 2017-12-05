<?php

class ColaboradorDao {

    public static function editarColaborador(Colaborador $colaborador) {
        $mysqli = getConexao();
        $id_endereco = EnderecoDao::editarEndereco($colaborador->getEndereco());

        $sql = "UPDATE colaborador SET nome = ?, telefone = ? WHERE cpf = ?";

        if ($stmt = $mysqli->prepare($sql)) {
            $stmt->bind_param("sss", $colaborador->getNome(), $colaborador->getTelefone(),
                $colaborador->getCpf());

            $stmt->execute();
            $stmt->close();
        }
    }

    public static function getColaboradorPorCpf($cpf) {
        $mysqli = getConexao();
        $sql = "SELECT nome, telefone, senha, endereco_id FROM colaborador WHERE cpf = ?";

        if ($stmt = $mysqli->prepare($sql)) {
            $stmt->bind_param("s", $cpf);
            $stmt->execute();
            $stmt->bind_result($nome, $telefone, $senha, $endereco_id);

            if ($stmt->fetch()) {
                $endereco = EnderecoDao::getEnderecoById($endereco_id, $mysqli);

                $c = new Colaborador($cpf, $nome, $endereco, $telefone);
                $c->setSenha($senha);
            }
            $stmt->close();
        }
        return $c;
    }

    public static function getColaboradores($comAnonimo = false) {
        $mysqli = getConexao();
        $colaboradores = array();

        $sql = "SELECT cpf, nome, telefone, endereco_id FROM colaborador";
        $sql .= ($comAnonimo) ? '' : " WHERE cpf != '00000000000'";

        if ($stmt = $mysqli->prepare($sql)) {
            $stmt->execute();
            $stmt->bind_result($cpf, $nome, $telefone, $endereco_id);

            while ($stmt->fetch()) {
                $endereco = EnderecoDao::getEnderecoById($endereco_id, $mysqli);

                $c = new Colaborador($cpf, $nome, $endereco, $telefone);
                $colaboradores[] = $c;
            }
            $stmt->close();
        }
        return $colaboradores;
    }

    public static function adicionarObservacao(Observacao $observacao) {
        $mysqli = getConexao();
        $endereco_id = EnderecoDao::adicionarEndereco($observacao->getLocal());

        $sql = "INSERT INTO observacao (data, descricao, endereco_id, col_cpf) VALUES (?,?,?,?)";

        if ($stmt = $mysqli->prepare($sql)) {
            $stmt->bind_param("ssis", $observacao->getData(),
                $observacao->getDescricao(), $endereco_id, $observacao->getCpf());
            $stmt->execute();
        }
        $stmt->close();
    }

    /**
     * Adiciona uma nova colaboração feita por esse colaborador.
     * Aproveitando e já registrando a presença dele nesse dia.
     */
    public static function adicionarColaboracao(Colaboracao $c) {
        $mysqli = getConexao();
        $sql = "INSERT INTO colaboracao (funcao, data, descricao, col_cpf) VALUES (?,?,?,?)";

        if ($stmt = $mysqli->prepare($sql)) {
            $stmt->bind_param("ssss", $c->getFuncao(), $c->getData(),
                $c->getDescricao(), $c->getCpf());

            $stmt->execute();
            $stmt->close();

            ColaboradorDao::registrarPresenca($c->getCpf(), $c->getData(), $mysqli);
        }
    }

    /**
     * Registra a presença do colaborador nesse dia na cooperativa.
     * @param string $data
     */
    public static function registrarPresenca($data = '', $cpf) {
        $mysqli = getConexao();

        if ($data == '')
            $data = date("Y-m-d");

        $sql = "INSERT INTO diaria (data, col_cpf) VALUES (?, ?)";

        if ($stmt = $mysqli->prepare($sql)) {
            $stmt->bind_param("ss", $data, $cpf);
            $stmt->execute();
            $stmt->close();
        }
    }

    /**
     * Recupera as colaborações realizadas em uma determinada data.
     * @param $data
     * @return array
     */
    public static function getColaboracoesPorData($data) {
        $mysqli = getConexao();
        $colaboracoes = array();
        $sql = "SELECT funcao, descricao, col_cpf FROM colaboracao WHERE data = ?";

        if ($stmt = $mysqli->prepare($sql)) {
            $stmt->bind_param("s", $data);
            $stmt->execute();
            $stmt->bind_result($funcao, $descricao, $col_cpf);

            while ($stmt->fetch()) {
                $c = new Colaboracao($descricao, $data, $funcao, $col_cpf);
                $colaboracoes[] = $c;
            }
            $stmt->close();
        }
        return $colaboracoes;
    }

    /**
     * Recupera as colaborações de um colaborador
     * @param $cpf
     * @return array
     */
    public static function getColaboracoesPorCpf($cpf) {
        $mysqli = getConexao();
        $sql = "SELECT funcao, data, descricao FROM colaboracao WHERE col_cpf = ?";
        $colaboracoes = array();

        if ($stmt = $mysqli->prepare($sql)) {
            $stmt->bind_param("s", $cpf);
            $stmt->execute();
            $stmt->bind_result($funcao, $data, $descricao);

            while ($stmt->fetch()) {
                $c = new Colaboracao($descricao, $data, $funcao, $cpf);
                $colaboracoes[] = $c;
            }
            $stmt->close();
        }
        return $colaboracoes;
    }

    /**
     * Recupera as observações de um colaborador
     * @param $cpf
     * @return array
     */
    public static function getObservacoesPorCpf($cpf) {
        $mysqli = getConexao();
        $sql = "SELECT data, descricao, endereco_id FROM observacao WHERE col_cpf = ?";
        $observacoes = array();

        if ($stmt = $mysqli->prepare($sql)) {
            $stmt->bind_param("s", $cpf);
            $stmt->execute();
            $stmt->bind_result($data, $descricao, $endereco);

            while ($stmt->fetch()) {
                $e = EnderecoDao::getEnderecoById($endereco);
                $o = new Observacao($descricao, $data, $e, $cpf);
                $observacoes[] = $o;
            }
        }
        return $observacoes;
    }

    /**
     * Recupera a quantidade de colaborações realizadas por um colaborador
     * @param $cpf
     * @return mixed
     */
    public static function getCountColaboracoesPorCpf($cpf) {
        $mysqli = getConexao();
        $sql = "SELECT count(*) as c FROM colaboracao WHERE col_cpf = ?";

        if ($stmt = $mysqli->prepare($sql)) {
            $stmt->bind_param("s", $cpf);
            $stmt->execute();
            $stmt->bind_result($c);

            if ($stmt->fetch()) {
                return $c;
            }
        }
    }

    /**
     * Recupera uma observação por um determinado ID
     * @param $id
     * @return Observacao
     */
    public static function getObservacaoPorId($id) {
        $mysqli = getConexao();
        $sql = "SELECT data, descricao, endereco_id, col_cpf FROM observacao WHERE id = ?";

        if ($stmt = $mysqli->prepare($sql)) {
            $stmt->bind_param("i", $id);
            $stmt->execute();
            $stmt->bind_result($data, $descricao, $endereco, $cpf);

            if ($stmt->fetch()) {
                $e = EnderecoDao::getEnderecoById($endereco);
                $observacao = new Observacao($descricao, $data, $e, $cpf);
                $observacao->setId($id);
                $stmt->close();
                return $observacao;
            }
        }
    }

    /**
     * Adiciona um novo colaborador a lista de colaboradores cadastrados
     * @param $c
     */
    public static function adicionarColaborador($c) {
        $mysqli = getConexao();
        $id_endereco = EnderecoDao::adicionarEndereco($c->endereco);
        $sql = "INSERT INTO colaborador (cpf, nome, telefone, senha, endereco_id) 
                VALUES (?,?,?,?,?)";

        if ($stmt = $mysqli->prepare($sql)) {
            $stmt->bind_param("ssssi", $c->getCpf(), $c->getNome(), $c->getTelefone(),
                $c->getSenha(), $id_endereco);

            $stmt->execute();
            $stmt->close();
        }
    }

    public static function removerColaborador($cpf) {
        $mysqli = getConexao();
        $sql = "DELETE FROM colaborador WHERE cpf = ?";

        if ($stmt = $mysqli->prepare($sql)) {
            $stmt->bind_param("s", $cpf);
            $stmt->execute();
            $stmt->close();
        }
        $mysqli->close();
    }

    /**
     * Marca a observação como lida
     * @param $id
     */
    public static function marcarComoLida($id) {
        $mysqli = getConexao();
        $sql = "UPDATE observacao SET lida = 1 WHERE id = ?";

        if ($stmt = $mysqli->prepare($sql)) {
            $stmt->bind_param('i', $id);
            $stmt->execute();

            $stmt->close();
        }
        $mysqli->close();
    }

    /**
     * Recupera todoas as observações ainda não vistas pelo administrador.
     * @return array
     */
    public static function getObservacoesNaoVistas() {
        $mysqli = getConexao();
        $sql = "SELECT id, data, descricao, endereco_id, col_cpf FROM observacao WHERE lida = 0";
        $observacoes = array();

        if ($stmt = $mysqli->prepare($sql)) {
            $stmt->execute();
            $stmt->bind_result($id, $data, $descricao, $endereco_id, $col_cpf);

            while ($stmt->fetch()) {
                $endereco = EnderecoDao::getEnderecoById($endereco_id);
                $o = new Observacao($descricao, $data, $endereco, $col_cpf);
                $o->setId($id);
                $observacoes[] = $o;
            }
            $stmt->close();
        }
        return $observacoes;
    }
}