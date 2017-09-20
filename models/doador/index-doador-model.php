<?php

class IndexDoadorModel extends MainModel {

    public function getDoacoesByCpf($cpf) {
        $sql = "SELECT data, descricao FROM doacao WHERE doador_cpf = ?";
        $doacoes = array();

        if ($stmt = $this->mysqli->prepare($sql)) {
            $stmt->bind_param("s", $cpf);
            $stmt->execute();
            $stmt->bind_result($data, $descricao);

            while ($stmt->fetch()) {
                $d = new Doacao($descricao, $data);
                $doacoes[] = $d;
            }
            $this->fechar($stmt);
        }
        return $doacoes;
    }
}