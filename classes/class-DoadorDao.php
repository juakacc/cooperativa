<?php

class DoadorDao {

    public static function adicionarDoador(Doador $doador) {
        $mysqli = getConexao();
        $id_endereco = EnderecoDao::adicionarEndereco($doador->getEndereco());
        $sql = "INSERT INTO doador (cpf, nome, telefone, senha, endereco_id) VALUES (?,?,?,?,?)";

        if ($stmt = $mysqli->prepare($sql)) {
            $stmt->bind_param("ssssi", $doador->getCpf(), $doador->getNome(),
                $doador->getTelefone(), $doador->getSenha(), $id_endereco);
            $stmt->execute();
            $stmt->close();
        }
    }

    public static function editarDoador(Doador $doador) {
        $mysqli = getConexao();
        EnderecoDao::editarEndereco($doador->getEndereco());
        $sql = "UPDATE doador SET nome = ?, telefone = ? WHERE cpf = ?";

        if ($stmt = $mysqli->prepare($sql)) {
            $stmt->bind_param("sss", $doador->getNome(),
                $doador->getTelefone(), $doador->getCpf());
            $stmt->execute();
            $stmt->close();
        }
        $mysqli->close();
    }

    public static function getDoadores($comAnonimo = false) {
        $mysqli = getConexao();
        $sql = "SELECT cpf, nome, telefone, endereco_id FROM doador";
        if (!$comAnonimo) {
            $sql .= " WHERE cpf != 00000000000";
        }
        $doadores = array();

        if ($stmt = $mysqli->prepare($sql)) {
            $stmt->execute();
            $stmt->bind_result($cpf, $nome, $telefone, $endereco_id);

            while ($stmt->fetch()) {
                $endereco = EnderecoDao::getEnderecoById($endereco_id);

                $d = new Doador($cpf, $nome, $endereco, $telefone);
                $doadores[] = $d;
            }
            $stmt->close();
        }
        $mysqli->close();
        return $doadores;
    }

    /**
     * Recupera as doação realizadas em uma determinada data.
     * @param $data
     * @return array
     */
    public static function getDoacoesPorData($data) {
        $mysqli = getConexao();
        $doacoes = array();
        $sql = "SELECT descricao, doador_cpf FROM doacao WHERE data = ?";

        if ($stmt = $mysqli->prepare($sql)) {
            $stmt->bind_param("s", $data);
            $stmt->execute();
            $stmt->bind_result($descricao, $doador_cpf);

            while ($stmt->fetch()) {
                $d = new Doacao($descricao, $data, $doador_cpf);
                $doacoes[] = $d;
            }
            $stmt->close();
        }
        return $doacoes;
    }

    /**
     * Recupera todas as doações feitas por esse doador
     * @return array
     */
    public static function getDoacoesPorCpf($cpf) {
        $mysqli = getConexao();
        $sql = "SELECT data, descricao FROM doacao WHERE doador_cpf = ?";
        $doacoes = array();

        if ($stmt = $mysqli->prepare($sql)) {
            $stmt->bind_param("s", $cpf);
            $stmt->execute();
            $stmt->bind_result($data, $descricao);

            while ($stmt->fetch()) {
                $d = new Doacao($descricao, $data, $cpf);
                $doacoes[] = $d;
            }
            $stmt->close();
        }
        $mysqli->close();
        return $doacoes;
    }

    /**
    Adiciona uma doação realizada por esse doador
     */
    public static function adicionarDoacao(Doacao $d) {
        $mysqli = getConexao();
        $sql = "INSERT INTO doacao (data, descricao, doador_cpf) VALUES (?,?,?)";

        if ($stmt = $mysqli->prepare($sql)) {
            $stmt->bind_param("sss", $d->getData(), $d->getDescricao(),
                $d->getCpf());

            $stmt->execute();
            $stmt->close();
        }
        $mysqli->close();
    }

    /**
     * Recupera a quantidade de doações de um determinado doador
     * @param $cpf
     * @return mixed
     */
    public static function getCountDoacoesPorCpf($cpf) {
        $mysqli = getConexao();
        $sql = "SELECT count(*) as c FROM doacao WHERE doador_cpf = ?";

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
     * Recupera um doador de acordo com o seu CPF
     * @param $cpf
     * @return Doador
     */
    public static function getDoadorPorCpf($cpf) {
        $mysqli = getConexao();
        $sql = "SELECT nome, telefone, endereco_id FROM doador WHERE cpf = ?";
        $c = null;

        if ($stmt = $mysqli->prepare($sql)) {
            $stmt->bind_param("s", $cpf);
            $stmt->execute();
            $stmt->bind_result($nome, $telefone, $endereco_id);

            if ($stmt->fetch()) {
                $endereco = EnderecoDao::getEnderecoById($endereco_id);
                $c = new Doador($cpf, $nome, $endereco, $telefone);
            }
            $stmt->close();
        }
        $mysqli->close();
        return $c;
    }

    public static function removerDoador($cpf) {
        $mysqli = getConexao();
        $sql = "DELETE FROM doador WHERE cpf = ?";

        if ($stmt = $mysqli->prepare($sql)) {
            $stmt->bind_param("s", $cpf);
            $stmt->execute();
            $stmt->close();
        }
        $mysqli->close();
    }
}