<?php

/**
 * Classe responsável por representar uma pessoa.
 */
class Pessoa {
    
    protected $cpf;
    protected $nome;
    public $endereco;
    protected $telefone;
    protected $senha; // verificar se necessita

    /**
     * Pessoa constructor.
     * @param $cpf
     * @param string $nome
     * @param Endereco|null $endereco
     * @param string $telefone
     */
    public function __construct($cpf, $nome = '', Endereco $endereco = null, $telefone = '') {
        $this->cpf = $cpf;
        $this->nome = $nome;
        $this->endereco = $endereco;
        $this->telefone = $telefone;
    }

    /**
     * @return mixed
     */
    function getCpf() {
        return $this->cpf;
    }

    /**
     * @return string
     */
    function getNome() {
        return $this->nome;
    }

    /**
     * @return Endereco|null
     */
    function getEndereco() {
        return $this->endereco;
    }

    /**
     * @return string
     */
    function getTelefone() {
        return $this->telefone;
    }

    /**
     * @return mixed
     */
    function getSenha() {
        return $this->senha;
    }

    /**
     * @param $senha
     */
    function setSenha($senha) {
        $this->senha = $senha;
    }
}