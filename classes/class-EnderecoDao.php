<?php

class EnderecoDao {

    /**
     * Adiciona um endereço e retorna o ID do mesmo
     * @param Endereco $e
     * @return int ID com o qual o endereço ficou
     */
    public static function adicionarEndereco(Endereco $e) {
        $mysqli = getConexao();
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
                    if ($stmt->fetch()) {
                        return $id;
                    }
                }
            } else {
                echo $stmt->error;
            }
        }
        return -1;
    }

    public static function getEnderecoById($id) {
        $mysqli = getConexao();
        $sql = "SELECT rua, numero, bairro, cidade, uf FROM endereco WHERE id = ?";

        $endereco = null;

        if ($stmt = $mysqli->prepare($sql)) {
            $stmt->bind_param('i', $id);
            $stmt->execute();
            $stmt->bind_result($rua, $numero, $bairro, $cidade, $uf);

            if ($stmt->fetch()) {
                $endereco = new Endereco($rua, $numero, $bairro, $cidade, $uf);
            }
            $mysqli->close();
        }
        return $endereco;
    }

    public static function editarEndereco($endereco) {

    }


}