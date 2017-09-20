<?php

/**
 * Classe que representa um Encaminhamento
 */
class Encaminhamento {
    
    private $cnpj;
    private $descricao;
    private $data;

    /**
     * Encaminhamento constructor.
     * @param $descricao
     * @param $data
     * @param string $cnpj
     */
    function __construct($descricao, $data, $cnpj = '') {
        $this->cnpj = $cnpj;
        $this->descricao = $descricao;
        $this->data = $data;
    }

    /**
     * @return string
     */
    function getCnpj() {
        return $this->cnpj;
    }

    /**
     * @return mixed
     */
    function getDescricao() {
        return $this->descricao;
    }

    /**
     * @return mixed
     */
    function getData() {
        return $this->data;
    }
}