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
            if (isset($_POST['cancelar'])) {
                header('Location: '. $_SESSION['goto_url']);
                return;
            }

            foreach ($_POST as $key => $value) {
                $this->form_data[$key] = $value;
            }

            if (!validar_data($this->form_data['data'])) {
                $this->form_msg[] = "Digite uma data válida...";
            }

            if (empty($this->form_msg)) {
                $this->form_data['data'] = transformarParaBanco($this->form_data['data']);

                ColaboradorDao::registrarPresenca($this->form_data['data'],
                    $this->form_data['cpf'], $this->mysqli);

                header('Location: ' . HOME . '/adm');
            }
        } else {
            $this->form_data['data'] = date('d/m/Y');
        }
    }
}