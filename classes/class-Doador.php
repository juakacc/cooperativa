<?php

/**
 * Classe que representa Doador
 * @see Pessoa
 */
class Doador extends Pessoa {

    /**
     * Recupera todas as doações feitas por esse doador
     * @return array
     */
    public function getDoacoes() {
        $mysqli = new mysqli(DB_LOCAL, DB_USER, DB_PASS, DB_BASE);
        $sql = "SELECT data, descricao FROM doacao WHERE doador_cpf = ?";
        $doacoes = array();

        if ($stmt = $mysqli->prepare($sql)) {
            $stmt->bind_param("s", $this->getCpf());
            $stmt->execute();
            $stmt->bind_result($data, $descricao);

            while ($stmt->fetch()) {
                $d = new Doacao($this->getCpf(), $descricao, $data);
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
    public function addDoacao(Doacao $d) {
        $mysqli = new mysqli(DB_LOCAL, DB_USER, DB_PASS, DB_BASE);
        $sql = "INSERT INTO doacao (data, descricao, doador_cpf) VALUES (?,?,?)";

        if ($stmt = $mysqli->prepare($sql)) {
            $stmt->bind_param("sss", $d->getData(), $d->getDescricao(),
                $this->getCpf());

            $stmt->execute();
            $stmt->close();
        }
        $mysqli->close();
    }
}