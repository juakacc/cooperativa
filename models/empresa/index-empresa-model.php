<?php

class IndexEmpresaModel extends MainModel {

    /**
     * Recupera os encaminhamentos recebidos por
     * uma empresa, determinada pelo CNPJ informado.
     * @param $cnpj
     * @return array
     */
    public function getEncaminhamentosByCnpj($cnpj) {
        $sql = "SELECT data, descricao FROM encaminhamento WHERE empresa_cnpj = ?";
        $encaminhamentos = array();

        if ($stmt = $this->mysqli->prepare($sql)) {
            $stmt->bind_param("s", $cnpj);
            $stmt->execute();
            $stmt->bind_result($data, $descricao);

            while ($stmt->fetch()) {
                $e = new Encaminhamento($descricao, $data);
                $encaminhamentos[] = $e;
            }
            $stmt->close();
        }
        return $encaminhamentos;
    }
}