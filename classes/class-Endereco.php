<?php

/**
 * Classe que representa um Endereco
 */
class Endereco {

    private $id;
    private $rua;
    private $numero;
    private $bairro;
    private $cidade;
    private $uf;

    /**
     * Endereco constructor.
     * @param $rua
     * @param $numero
     * @param $bairro
     * @param $cidade
     * @param $uf
     */
    function __construct($rua, $numero, $bairro, $cidade, $uf) {
        $this->rua = $rua;
        $this->numero = $numero;
        $this->bairro = $bairro;
        $this->cidade = $cidade;
        $this->uf = $uf;
    }

    /**
     * @return string
     */
    function __toString() {
        $s = $this->rua;
        $s .= ', Nº: ' . $this->numero;
        $s .= ', ' . $this->bairro;
        $s .= ', ' . $this->cidade;
        $s .= '/' . $this->uf;

        return $s;
    }

    /**
     * @return mixed
     */
    function getRua() {
        return $this->rua;
    }

    /**
     * @return mixed
     */
    function getNumero() {
        return $this->numero;
    }

    /**
     * @return mixed
     */
    function getBairro() {
        return $this->bairro;
    }

    /**
     * @return mixed
     */
    function getCidade() {
        return $this->cidade;
    }

    /**
     * @return mixed
     */
    function getUf() {
        return $this->uf;
    }

    function setId($id) {
        $this->id = $id;
    }

    function getId() {
        return $this->id;
    }
}