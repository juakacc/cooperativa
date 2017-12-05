<?php

/**
 * Classe que representa uma Empresa
 */
class Empresa {
    
    private $cnpj;
    private $razao;
    private $telefone;
    private $endereco;

    /**
     * Empresa constructor.
     * @param $cnpj
     * @param string $razao
     * @param Endereco|null $endereco
     */
    public function __construct($cnpj, $razao = '', $telefone = '', Endereco $endereco = null) {
        $this->cnpj = $cnpj;
        $this->razao = $razao;
        $this->telefone = $telefone;
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

    function getTelefone() {
        return $this->telefone;
    }
}