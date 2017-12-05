<?php

class EmpresaDao {

    public static function adicionarEmpresa(Empresa $empresa) {
        $mysqli = getConexao();
        $endereco_id = EnderecoDao::adicionarEndereco($empresa->getEndereco());

        $sql = "INSERT INTO empresa (cnpj, razao, telefone, endereco_id) VALUES (?,?,?,?)";

        if ($stmt = $mysqli->prepare($sql)) {
            $stmt->bind_param("sssi", $empresa->getCnpj(), $empresa->getRazao(),
                $empresa->getTelefone(), $endereco_id);
            $stmt->execute();
            $stmt->close();
        }
    }

    public static function editarEmpresa(Empresa $empresa) {
        $mysqli = getConexao();
        EnderecoDao::editarEndereco($empresa->getEndereco());
        $sql = "UPDATE empresa SET razao = ?, telefone = ? WHERE cnpj = ?";

        if ($stmt = $mysqli->prepare($sql)) {
            $stmt->bind_param("sss", $empresa->getRazao(),
                $empresa->getTelefone(), $empresa->getCnpj());
            $stmt->execute();
            $stmt->close();
        }
        $mysqli->close();
    }

    public static function getEmpresas() {
        $mysqli = getConexao();
        $sql = "SELECT cnpj, razao, telefone, endereco_id FROM empresa";
        $empresas = array();

        if ($stmt = $mysqli->prepare($sql)) {
            $stmt->execute();
            $stmt->bind_result($cnpj, $razao, $telefone, $endereco_id);

            while ($stmt->fetch()) {
                $endereco = EnderecoDao::getEnderecoById($endereco_id);

                $e = new Empresa($cnpj, $razao, $telefone, $endereco);
                $empresas[] = $e;
            }
            $stmt->close();
        }
        return $empresas;
    }

    /**
     * Recupera uma empresa de acordo com o CNPJ informado
     * @param $cnpj
     * @return Empresa
     */
    public static function getEmpresaByCnpj($cnpj) {
        $mysqli = getConexao();
        $sql = "SELECT razao, telefone, endereco_id FROM empresa WHERE cnpj = ?";

        if ($stmt = $mysqli->prepare($sql)) {
            $stmt->bind_param("s", $cnpj);
            $stmt->execute();
            $stmt->bind_result($razao, $telefone, $endereco_id);

            if ($stmt->fetch()) {
                $endereco = EnderecoDao::getEnderecoById($endereco_id);
                $e = new Empresa($cnpj, $razao, $telefone, $endereco);
                $stmt->close();
                $mysqli->close();
                return $e;
            }
        }
    }

    /**
     * Recupera os encaminhamentos realizados em uma determinada data.
     * @param $data
     * @return array
     */
    public static function getEncaminhamentosPorData($data) {
        $mysqli = getConexao();
        $encaminhamentos = array();
        $sql = "SELECT descricao, empresa_cnpj FROM encaminhamento WHERE data = ?";

        if ($stmt = $mysqli->prepare($sql)) {
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

//    public static function getEncaminhamentosPorCnpj($cnpj) {
//        $mysqli = getConexao();
//        $sql = "SELECT * FROM encaminhamento WHERE empresa_cnpj = ?";
//        $encaminhamentos = array();
//
//        if ($stmt = $mysqli->prepare($sql)) {
//            $stmt->bind_param("s", $cnpj);
//            $stmt->execute();
//            $result = $stmt->get_result();
//
//            while ($e = $result->fetch_assoc()) {
//                $encaminhamentos[] = $e;
//            }
//            $stmt->close();
//        }
//        return $encaminhamentos;
//    }

    /**
     * Recupera o número de encaminhamentos de uma determinada empresa
     * @param $cnpj
     * @return mixed
     */
    public static function getCountEncaminhamentosPorCnpj($cnpj) {
        $mysqli = getConexao();
        $sql = "SELECT count(*) as c FROM encaminhamento WHERE empresa_cnpj = ?";

        if ($stmt = $mysqli->prepare($sql)) {
            $stmt->bind_param("s", $cnpj);
            $stmt->execute();
            $stmt->bind_result($c);

            if ($stmt->fetch()) {
                return $c;
            }
        }
    }

    public static function adicionarEncaminhamento(Encaminhamento $e) {
        $mysqli = getConexao();
        $sql = "INSERT INTO encaminhamento (data, descricao, empresa_cnpj) VALUES (?,?,?)";

        if ($stmt = $mysqli->prepare($sql)) {
            $stmt->bind_param("sss", $e->getData(), $e->getDescricao(), $e->getCnpj());
            $stmt->execute();
            $stmt->close();
        }
    }

    public static function removerEmpresa($cnpj) {
        $mysqli = getConexao();
        $sql = "DELETE FROM empresa WHERE cnpj = ?";

        if ($stmt = $mysqli->prepare($sql)) {
            $stmt->bind_param("s", $cnpj);
            $stmt->execute();
            $stmt->close();
        }
        $mysqli->close();
    }
}