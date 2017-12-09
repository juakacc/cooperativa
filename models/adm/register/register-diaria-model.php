<?php

/**
 * Class RegisterDiariaModel
 */
class RegisterDiariaModel extends MainModel {

    /**
     * Valida os dados digitados pelo usuário e
     * envia para gravação no banco.
     */
    public function validate_register_form() {
        $this->form_data = array();
        $this->form_msg = array();

        if ($_SERVER['REQUEST_METHOD'] == 'POST' and !empty($_POST)) {

            foreach ($_POST as $key => $value) {
                $this->form_data[$key] = $value;
            }

            $this->form_msg = validar_dados($this->form_data);

            if (empty($this->form_msg)) {
                $this->form_data['data'] = transformarParaBanco($this->form_data['data']);

                ColaboradorDao::registrarPresenca($this->form_data['data'],
                    $this->form_data['cpf'], $this->mysqli);

                $_SESSION['msg'] = 'Diária registrada com sucesso';
                header('Location: ' . HOME . '/administrador');
            }
        } else {
            $this->form_data['data'] = date('d/m/Y');
        }
    }
}