<?php

function validar_dados($form_data) {
    if (isset($form_data['cpf']) and !validar_cpf($form_data['cpf'])) {
        $form_msg['cpf'] = 'CPF inválido';
    }

    if (isset($form_data['cnpj']) and !validar_cnpj($form_data['cnpj'])) {
        $form_msg['cnpj'] = 'CNPJ inválido';
    }

    if (isset($form_data['nome']) and !validar_str_nao_vazia($form_data['nome'])) {
        $form_msg['nome'] = 'Nome inválido';
    }

    if (isset($form_data['razao']) and !validar_str_nao_vazia($form_data['razao'])) {
        $form_msg['razao'] = 'Razão inválida';
    }

    if (isset($form_data['rua']) and !validar_str_nao_vazia($form_data['rua'])) {
        $form_msg['rua'] = 'Rua inválida';
    }
    if (isset($form_data['numero']) and !validar_numero($form_data['numero'])) {
        $form_msg['numero'] = 'Número inválido';
    }
    if (isset($form_data['bairro']) and !validar_str_nao_vazia($form_data['bairro'])) {
        $form_msg['bairro'] = 'Bairro inválido';
    }
    if (isset($form_data['cidade']) and !validar_str_nao_vazia($form_data['cidade'])) {
        $form_msg['cidade'] = 'Cidade inválida';
    }

    if (isset($form_data['telefone']) and !validar_telefone($form_data['telefone'])) {
        $form_msg['telefone'] = 'Telefone inválido';
    }

    if (isset($form_data['senha']) and !validar_senha($form_data['senha'])) {
        $form_msg['senha'] = 'Senha inválida';
    }

    if (isset($form_data['funcao']) and !validar_str_nao_vazia($form_data['funcao'])) {
        $form_msg['funcao'] = 'Função inválida';
    }

    if (isset($form_data['data']) and !validar_data($form_data['data'])) {
        $form_msg[] = 'Data inválida';
    }

    if (isset($form_data['descricao']) and !validar_str_nao_vazia($form_data['descricao'])) {
        $form_msg['descricao'] = 'Descrição inválida.';
    }

    return $form_msg;
}

function validar_cpf($cpf) {

    if (strlen($cpf) != 11 or !is_numeric($cpf)) {
        return false;
    }

    $invalidos = array('00000000000', '11111111111', '22222222222', '33333333333',
        '44444444444', '55555555555', '66666666666', '77777777777', '88888888888', '99999999999');

    if (in_array($cpf, $invalidos)) {	//CPF
        return false;
    }

    $digitos = substr($cpf, 0, 9);
    // Calcula o primeiro dígito
    $novo_cpf = calc_digitos_posicoes($digitos);
    // Calcula o segundo dígito
    $novo_cpf = calc_digitos_posicoes($novo_cpf, 11);

    if ($novo_cpf != $cpf) {
        return false;
    }
    return true;
}

function calc_digitos_posicoes($digitos, $posicoes = 10) {
    $soma_digitos = 0;

    for ($i = 0; $i < strlen($digitos); $i++) {
        $soma_digitos += ($digitos[$i] * $posicoes);
        $posicoes--;

        if ($posicoes < 2) { // para CNPJ
            $posicoes = 9;
        }
    }

    $soma_digitos = $soma_digitos % 11;

    if ($soma_digitos < 2) {
        $soma_digitos = 0;
    } else {
        $soma_digitos = 11 - $soma_digitos;
    }

    return $digitos . $soma_digitos;
}

function validar_cnpj($cnpj) {
    if (strlen($cnpj) != 14 or !is_numeric($cnpj)) {
        return false;
    }

    $primeiros_numeros_cnpj = substr($cnpj, 0, 12);
    $primeiro_calculo = calc_digitos_posicoes($primeiros_numeros_cnpj, 5);
    $novo_cnpj = calc_digitos_posicoes($primeiro_calculo, 6);

    if ($novo_cnpj != $cnpj) {
        return false;
    }
    return true;
}

function validar_telefone($telefone) {
    return $telefone == '' or is_numeric($telefone);
}

function validar_str_nao_vazia($str) {
    return strlen($str) != 0;
}

function validar_numero($num) {
    // Sem número ou um numeral
    return $num == '' or is_numeric($num);
}

function validar_senha($s) {
    return strlen($s) >= 6;
}