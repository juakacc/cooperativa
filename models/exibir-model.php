<?php

/**
 * Class ExibirModel
 */
class ExibirModel extends MainModel {

    /**
     * Recupera as doação realizadas em uma determinada data.
     * @param $data
     * @return array
     */
    public function getDoacoes($data) {
        $doacoes = array();
        $sql = "SELECT descricao, doador_cpf FROM doacao WHERE data = ?";

        if ($stmt = $this->mysqli->prepare($sql)) {
            $stmt->bind_param("s", $data);
            $stmt->execute();
            $stmt->bind_result($descricao, $doador_cpf);

            while ($stmt->fetch()) {
                $d = new Doacao($doador_cpf, $descricao, $data);
                $doacoes[] = $d;
            }
            $stmt->close();
        }
        return $doacoes;
    }

    /**
     * Recupera um doador de acordo com o seu CPF
     * @param $cpf
     * @return Doador
     */
    public function getDoadorByCpf($cpf) {
        $sql = "SELECT nome FROM doador WHERE cpf = ?";

        if ($stmt = $this->mysqli->prepare($sql)) {
            $stmt->bind_param("s", $cpf);
            $stmt->execute();
            $stmt->bind_result($nome);

            if ($stmt->fetch()) {
                $c = new Doador($cpf, $nome);
                return $c;
            }
        }
    }

    /**
     * Recupera as colaborações realizadas em uma determinada data.
     * @param $data
     * @return array
     */
    public function getColaboracoes($data) {
        $colaboracoes = array();
        $sql = "SELECT funcao, descricao, col_cpf FROM colaboracao WHERE data = ?";

        if ($stmt = $this->mysqli->prepare($sql)) {
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
     * Recupera um colaborador de acordo com o seu CPF.
     * @param $cpf
     * @return Colaborador
     */
    public function getColaboradorByCpf($cpf) {
        $sql = "SELECT nome FROM colaborador WHERE cpf = ?";

        if ($stmt = $this->mysqli->prepare($sql)) {
            $stmt->bind_param("s", $cpf);
            $stmt->execute();
            $stmt->bind_result($nome);

            if ($stmt->fetch()) {
                $c = new Colaborador($cpf, $nome);
                return $c;
            }
        }
    }

    /**
     * Recupera os encaminhamentos realizados em uma determinada data.
     * @param $data
     * @return array
     */
    public function getEncaminhamentos($data) {
        $encaminhamentos = array();
        $sql = "SELECT descricao, empresa_cnpj FROM encaminhamento WHERE data = ?";

        if ($stmt = $this->mysqli->prepare($sql)) {
            $stmt->bind_param("s", $data);
            $stmt->execute();
            $stmt->bind_result($descricao, $empresa_cnpj);

            while ($stmt->fetch()) {
                $e = new Encaminhamento($descricao, $data, $empresa_cnpj);
                $encaminhamentos[] = $e;
            }
            $stmt->close();
        }
        return $encaminhamentos;
    }

    /**
     * Recupera uma empresa de acordo com o CNPJ informado
     * @param $cnpj
     * @return Empresa
     */
    public function getEmpresaByCnpj($cnpj) {
        $sql = "SELECT razao FROM empresa WHERE cnpj = ?";

        if ($stmt = $this->mysqli->prepare($sql)) {
            $stmt->bind_param("s", $cnpj);
            $stmt->execute();
            $stmt->bind_result($razao);

            if ($stmt->fetch()) {
                $e = new Empresa($cnpj, $razao);
                return $e;
            }
        }
    }

    /**
     * Recupera todas as empresas cadastradas
     * @return array
     */
    public function getEmpresas() {
        $sql = "SELECT cnpj, razao FROM empresa";
        $empresas = array();

        if ($stmt = $this->mysqli->prepare($sql)) {
            $stmt->execute();
            $stmt->bind_result($cnpj, $razao);

            while ($stmt->fetch()) {
                $e = new Empresa($cnpj, $razao);
                $empresas[] = $e;
            }
            $stmt->close();
        }
        return $empresas;
    }

    /**
     * Recupera o número de encaminhamentos de uma determinada empresa
     * @param $cnpj
     * @return mixed
     */
    public function getCountEncaminhamentos($cnpj) {
        $sql = "SELECT count(*) as c FROM encaminhamento WHERE empresa_cnpj = ?";

        if ($stmt = $this->mysqli->prepare($sql)) {
            $stmt->bind_param("s", $cnpj);
            $stmt->execute();
            $stmt->bind_result($c);
            if ($stmt->fetch()) {
                return $c;
            }
        }
    }

    /**
     * Recupera todos os doadores
     * @return array
     */
    public function getDoadores() {
        $sql = "SELECT cpf, nome FROM doador";
        $doadores = array();

        if ($stmt = $this->mysqli->prepare($sql)) {
            $stmt->execute();
            $stmt->bind_result($cpf, $nome);

            while ($stmt->fetch()) {
                $d = new Doador($cpf, $nome);
                $doadores[] = $d;
            }
            $stmt->close();
        }
        return $doadores;
    }

    /**
     * Recupera a quantidade de doações de um determinado doador
     * @param $cpf
     * @return mixed
     */
    public function getCountDoacoes($cpf) {
        $sql = "SELECT count(*) as c FROM doacao WHERE doador_cpf = ?";

        if ($stmt = $this->mysqli->prepare($sql)) {
            $stmt->bind_param("s", $cpf);
            $stmt->execute();
            $stmt->bind_result($c);

            if ($stmt->fetch()) {
                return $c;
            }
        }
    }

    /**
     * Recupera todos os doadores
     * @return array
     */
    public function getColaboradores() {
        $sql = "SELECT cpf, nome FROM colaborador";
        $colaboradores = array();

        if ($stmt = $this->mysqli->prepare($sql)) {
            $stmt->execute();
            $stmt->bind_result($cpf, $nome);

            while ($stmt->fetch()) {
                $c = new Colaborador($cpf, $nome);
                $colaboradores[] = $c;
            }
            $stmt->close();
        }
        return $colaboradores;
    }

    /**
     * Recupera a quantidade de colaborações realizadas por um colaborador
     * @param $cpf
     * @return mixed
     */
    public function getCountColaboracoes($cpf) {
        $sql = "SELECT count(*) as c FROM colaboracao WHERE col_cpf = ?";

        if ($stmt = $this->mysqli->prepare($sql)) {
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
    public function getObservacaoById($id) {
        //$mysqli = new mysqli(DB_LOCAL, DB_USER, DB_PASS, DB_BASE);
        $sql = "SELECT data, descricao, endereco_id, col_cpf FROM observacao WHERE id = ?";

        if ($stmt = $this->mysqli->prepare($sql)) {
            $stmt->bind_param("i", $id);
            $stmt->execute();
            $stmt->bind_result($data, $descricao, $endereco, $cpf);

            if ($stmt->fetch()) {
                $e = $this->getEnderecoById($endereco);
                $observacao = new Observacao($descricao, $data, $e, $cpf);
                $observacao->setId($id);
                $stmt->close();
                return $observacao;
            }
        }
    }

    /**
     * Recupera um endereço pelo seu ID
     * @param $id
     * @return Endereco|null
     */
    private function getEnderecoById($id) {
        $mysqli = new mysqli(DB_LOCAL, DB_USER, DB_PASS, DB_BASE);
        $sql = "SELECT rua, numero, bairro, cidade, uf FROM endereco WHERE id = ?";

        if ($stmt = $mysqli->prepare($sql)) {
            $stmt->bind_param("i", $id);
            $stmt->execute();
            $stmt->bind_result($rua, $numero, $bairro, $cidade, $uf);

            if ($stmt->fetch()) {
                $e = new Endereco($rua, $numero, $bairro, $cidade, $uf);
                $stmt->close();
                return $e;
            }
        }
        return null;
    }
}