<?php

/**
 * Classe que representa uma doação.
 * @see Acao
 */
class Doacao extends Acao {

    /**
     * Doacao constructor.
     * @param $descricao
     * @param $data
     * @param string $cpf
     */
    function __construct($descricao, $data, $cpf = '') {
        parent::__construct($descricao, $data, $cpf);
    }
}