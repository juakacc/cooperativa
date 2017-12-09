<?php

class AdministradorDao {

    public static function editarAdmin(Administrador $administrador) {
        $mysqli = getConexao();
        EnderecoDao::editarEndereco($administrador->getEndereco());
        $sql = "UPDATE administrador SET nome = ?, telefone = ? WHERE cpf = ?";

        if ($stmt = $mysqli->prepare($sql)) {
            $stmt->bind_param("sss", $administrador->getNome(),
                $administrador->getTelefone(), $administrador->getCpf());
            $stmt->execute();
            $stmt->close();
        }
        $mysqli->close();
    }

    public static function getAdminPorCpf($cpf) {
        $mysqli = getConexao();
        $sql = "SELECT nome, telefone, endereco_id FROM administrador WHERE cpf = ?";

        if ($stmt = $mysqli->prepare($sql)) {
            $stmt->bind_param("s", $cpf);
            $stmt->execute();
            $stmt->bind_result($nome, $telefone, $endereco_id);

            if ($stmt->fetch()) {
                $endereco = EnderecoDao::getEnderecoById($endereco_id);
                $admin = new Administrador($cpf, $nome, $endereco, $telefone);
                $stmt->close();
            }
        }
        $mysqli->close();
        return $admin;
    }
}