<?php

/**
 * Verificar chaves em arrays
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
    }
}

/**
 * Valida uma data, retornando um boolean de acordo
 * com o resultado
 * @param $data
 * @return bool
 */
function validar_data($data) {
    $padrao = "/^[0-9]{4}-[0-9]{2}-[0-9]{2}$/";

    if (!preg_match($padrao, $data)) {
        return false;
    }
    $a = explode('-', $data);

    if (!checkdate($a[1], $a[2], $a[0])) {
        return false;
    }
    return true;
}