<?php

/**
 * Class Observacao
 */
class Observacao extends Acao {
    
    private $local;

    /**
     * Observacao constructor.
     * @param $descricao
     * @param $data
     * @param Endereco $local
     * @param string $cpf
     */
    public function __construct($descricao, $data, Endereco $local, $cpf = '') {
        parent::__construct($descricao, $data, $cpf);
        $this->local = $local;
    }

    /**
     * @return mixed
     */
    public function getLocal()
    {
        return $this->local;
    }
}