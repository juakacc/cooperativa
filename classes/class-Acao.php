<?php

/**
 * Class Acao
 */
class Acao {

    private $id;
    private $cpf;
    private $descricao;
    private $data;

    /**
     * Acao constructor.
     * @param $descricao
     * @param $data
     * @param string $cpf
     */
    public function __construct($descricao, $data, $cpf = '') {
        $this->cpf = $cpf;
        $this->descricao = $descricao;
        $this->data = $data;
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getDescricao()
    {
        return $this->descricao;
    }

    /**
     * @return mixed
     */
    public function getData()
    {
        return $this->data;
    }

    /**
     * @return mixed
     */
    public function getCpf()
    {
        return $this->cpf;
    }
}