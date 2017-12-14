<?php

class AdministradorDao {

    public static function editarAdmin(Administrador $administrador) {
        $mysqli = getConexao();
        EnderecoDao::editarEndereco($administrador->getEndereco());
        $sql = "UPDATE administrador SET cpf = ?, nome = ?, telefone = ?, senha = ? WHERE id = ?";

        if ($stmt = $mysqli->prepare($sql)) {
            $stmt->bind_param("ssssi", $administrador->getCpf(),
                $administrador->getNome(), $administrador->getTelefone(), $administrador->getSenha(),
            $administrador->getId());

            $stmt->execute();
            $stmt->close();
        }
        $mysqli->close();
    }

    public static function getAdminPorCpf($cpf) {
        $mysqli = getConexao();
        $sql = "SELECT id, nome, telefone, endereco_id FROM administrador WHERE cpf = ?";

        if ($stmt = $mysqli->prepare($sql)) {
            $stmt->bind_param("s", $cpf);
            $stmt->execute();
            $stmt->bind_result($id, $nome, $telefone, $endereco_id);

            if ($stmt->fetch()) {
                $endereco = EnderecoDao::getEnderecoById($endereco_id);
                $admin = new Administrador($cpf, $nome, $endereco, $telefone);
                $admin->setId($id);
                $stmt->close();
            }
        }
        $mysqli->close();
        return $admin;
    }
}