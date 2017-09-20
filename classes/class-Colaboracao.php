<?php

class Colaboracao extends Acao {
    
    private $funcao;
    
    public function __construct($descricao, $data, $funcao, $cpf = '') {
        parent::__construct($descricao, $data, $cpf);
        $this->funcao = $funcao;
    }

    /**
     * @return mixed
     */
    public function getFuncao()
    {
        return $this->funcao;
    }

}
