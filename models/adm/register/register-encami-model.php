<?php

class RegisterEncamiModel extends MainModel {

    /**
     * Valida os dados enviados pelo usuário e
     * envia para ser gravado no banco
     */
    public function validate_register_form() {
        
        if ($_SERVER['REQUEST_METHOD'] == 'POST' and !empty($_POST)) {
            $this->form_data = array();
            $this->form_msg = array();

            if (isset($_POST['cancelar'])) {
                header('Location: '. HOME . '/administrador');
                return;
            }

            foreach ($_POST as $key => $value) {
                $this->form_data[$key] = $value;
            }

            if (!validar_data($this->form_data['data'])) {
                $this->form_msg[] = 'Digite uma data válida...';
            }

            if (strlen($this->form_data['descricao']) == 0) {
                $this->form_msg[] = 'Descrição inválida';
            }

            if (empty($this->form_msg)) {
                $this->form_data['data'] = transformarParaBanco($this->form_data['data']);

                $encaminhamento = new Encaminhamento($this->form_data['descricao'],
                    $this->form_data['data'], $this->form_data['cnpj']);
                EmpresaDao::adicionarEncaminhamento($encaminhamento);

                header('Location: ' . HOME . '/administrador');
            }
        }
    }
}