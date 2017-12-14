<?php

function getConexao() {
    return new mysqli(DB_LOCAL, DB_USER, DB_PASS, DB_BASE);
}

/**
 * Verificar uma chave no array
 * @param $array
 * @param $key
 * @return string
 */
function check_array($array, $key) {
    if (isset($array[$key]) and !  empty($array[$key])) {
        return $array[$key];
    }
    return '';
}

/**
 * Carregar classes automaticamente
 * @param $className
 */
function __autoload($className) {
    $file = ABSPATH . '/classes/class-' . $className . '.php';
    if (file_exists($file)) {
        require_once $file;
    } else {
        $file = ABSPATH . '/classes/dao/class-' . $className . '.php';
        if (file_exists($file)) {
            require_once $file;
        }
    }
}

/**
 * Valida uma data no formato dd/mm/aaaa ou aaaa-mm-dd,
 * retornando um boolean de acordo
 * com o resultado
 * @param $data
 * @return bool
 */
function validar_data($data) {
    $padrao = "/^[0-9]{2}\/[0-9]{2}\/[0-9]{4}$/";
    $padrao2 = "/^[0-9]{4}-[0-9]{2}-[0-9]{2}$/";

    if (preg_match($padrao, $data)) {
        $a = explode('/', $data);
        return checkdate($a[1], $a[0], $a[2]);
    } else if (preg_match($padrao2, $data)) {
        $a = explode('-', $data);
        return checkdate($a[1], $a[2], $a[0]);
    } else {
        return false;
    }
}

// recebe no formato aaaa-mm-dd
// retorna no formato dd/mm/aaaa
function mostrar_data($data) {
    $a = explode('-', $data);
    return $a[2] . '/' . $a[1] . '/' . $a[0];
}

// recebe no formato dd/mm/aaaa
// retorna no formato aaaa-mm-dd
function transformarParaBanco($data) {
    $a = explode('/', $data);
    return $a[2] . '-' . $a[1] . '-' . $a[0];
}

function mostrar_cpf($c) {
    return substr($c, 0, 3) . '.' .
        substr($c, 3, 3) . '.' .
        substr($c, 6, 3) . '-' .
        substr($c, 9);
}

function mostrar_cnpj($c) {
    return substr($c, 0, 2).'.'.
        substr($c, 2, 3).'.'.
        substr($c, 5, 3).'/'.
        substr($c, 8, 4).'-'.
        substr($c, 12);
}

function retirar_mask($str) {
    return preg_replace('/\D/', "", $str);
}