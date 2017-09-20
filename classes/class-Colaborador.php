<?php

class Colaborador extends Pessoa {

    /**
     * Realiza uma observação feita por esse colaborador.
     * @param Observacao $o
     */
    public function fazerObservacao(Observacao $o) {
        $mysqli = new mysqli(DB_LOCAL, DB_USER, DB_PASS, DB_BASE);
        $endereco_id = $this->addEndereco($o->getLocal());
        $sql = "INSERT INTO observacao (data, descricao, endereco_id, col_cpf) VALUES (?,?,?,?)";

        if ($stmt = $mysqli->prepare($sql)) {
            $stmt->bind_param("ssis", $o->getData(), $o->getDescricao(), $endereco_id, $this->getCpf());
            $stmt->execute();
            $stmt->close();
        }
        $mysqli->close();
    }

    /**
     * Adiciona um novo endereço a lista de endereços e
     * retorna o ID com o qual o endereço foi gravado.
     * @param Endereco $e
     * @return int
     */
    protected function addEndereco(Endereco $e) {
        $mysqli = new mysqli(DB_LOCAL, DB_USER, DB_PASS, DB_BASE);
        $sql = "INSERT INTO endereco (rua, numero, bairro, cidade, uf) 
                VALUES (?,?,?,?,?)";

        if ($stmt = $mysqli->prepare($sql)) {
            $stmt->bind_param("sisss", $e->getRua(), $e->getNumero(),
                $e->getBairro(), $e->getCidade(), $e->getUf());

            if ($stmt->execute()) {
                $stmt->close();
                $sql = "SELECT id FROM endereco ORDER BY id DESC LIMIT 1";

                if ($stmt = $mysqli->prepare($sql)) {
                    $stmt->execute();

                    $stmt->bind_result($id);
                    if ($stmt->fetch())
                        return $id;
                }
            } else {
                echo $stmt->error;
            }
        }
        return -1;
    }

    /**
     * Recupera todas as colaborações feitas por esse colaborador
     * @return array
     */
//    public function getColaboracoes() {
//        $mysqli = new mysqli(DB_LOCAL, DB_USER, DB_PASS, DB_BASE);
//        $sql = "SELECT * FROM acao WHERE pessoa_cpf = ? AND tipo = 2";
//        $colaboracoes = array();
//
//        if ($stmt = $mysqli->prepare($sql)) {
//            $stmt->bind_param("s", $this->cpf);
//            $stmt->execute();
//
//            $result = $stmt->get_result();
//            while ($r = $result->fetch_assoc()) {
//                $colaboracoes[] = $r;
//            }
//        }
//        return $colaboracoes;
//    }

    /**
     * Registra a presença do colaborador nesse dia na cooperativa.
     * @param string $data
     */
    public function registrarPresenca($data = '') {
        $mysqli = new mysqli(DB_LOCAL, DB_USER, DB_PASS, DB_BASE);
        if ($data == '')
            $data = date("Y-m-d");

        $sql = "INSERT INTO diaria (data, col_cpf) VALUES (?, ?)";

        if ($stmt = $mysqli->prepare($sql)) {
            $stmt->bind_param("ss", $data, $this->getCpf());
            $stmt->execute();
            $stmt->close();
        }
        $mysqli->close();
    }

    /**
     * Adiciona uma nova colaboração feita por esse colaborador.
     * Aproveitando e já registrando a presença dele nesse dia.
     */
    public function addColaboracao(Colaboracao $c) {
        $mysqli = new mysqli(DB_LOCAL, DB_USER, DB_PASS, DB_BASE);
        $sql = "INSERT INTO colaboracao (funcao, data, descricao, col_cpf) VALUES (?,?,?,?)";

        if ($stmt = $mysqli->prepare($sql)) {
            $stmt->bind_param("ssss", $c->getFuncao(), $c->getData(),
                $c->getDescricao(), $this->getCpf());

            $stmt->execute();
            $stmt->close();
            $mysqli->close();
            $this->registrarPresenca($c->getData());
        }
    }
}