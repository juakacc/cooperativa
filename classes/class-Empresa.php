<?php

/**
 * Classe que representa uma Empresa
 */
class Empresa {
    
    private $cnpj;
    private $razao;
    private $endereco;

    /**
     * Empresa constructor.
     * @param $cnpj
     * @param string $razao
     * @param Endereco|null $endereco
     */
    public function __construct($cnpj, $razao = '', Endereco $endereco = null) {
        $this->cnpj = $cnpj;
        $this->razao = $razao;
        $this->endereco = $endereco;
    }

    /**
     * @return mixed
     */
    function getCnpj() {
        return $this->cnpj;
    }

    /**
     * @return string
     */
    function getRazao() {
        return $this->razao;
    }

    /**
     * @return Endereco|null
     */
    function getEndereco() {
        return $this->endereco;
    }

    /**
    Recupera os encaminhamentos realizados para essa empresa
     */
    public function getRecebimentos() {
        $mysqli = new mysqli(DB_LOCAL, DB_USER, DB_PASS, DB_BASE);
        $sql = "SELECT * FROM encaminhamento WHERE empresa_cnpj = ?";
        $encaminhamentos = array();

        if ($stmt = $mysqli->prepare($sql)) {
            $stmt->bind_param("s", $this->getCnpj());
            $stmt->execute();
            $result = $stmt->get_result();

            while ($e = $result->fetch_assoc()) {
                $encaminhamentos[] = $e;
            }
            $stmt->close();
        }
        return $encaminhamentos;
    }

    /**
     * Adiciona material encaminhado para essa empresa
     */
    public function addMaterial(Encaminhamento $d) {
        $mysqli = new mysqli(DB_LOCAL, DB_USER, DB_PASS, DB_BASE);
        $sql = "INSERT INTO encaminhamento (data, descricao, empresa_cnpj) VALUES (?,?,?)";

        if ($stmt = $mysqli->prepare($sql)) {
            $stmt->bind_param("sss", $d->getData(), $d->getDescricao(), $this->getCnpj());
            $stmt->execute();
            $stmt->close();
        }
    }
}