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

            foreach ($_POST as $key => $value) {
                $this->form_data[$key] = $value;
            }

            $this->form_msg = validar_dados($this->form_data);

            if (empty($this->form_msg)) {
                $this->form_data['data'] = transformarParaBanco($this->form_data['data']);

                $encaminhamento = new Encaminhamento($this->form_data['descricao'],
                    $this->form_data['data'], $this->form_data['cnpj_empresa']);

                EmpresaDao::adicionarEncaminhamento($encaminhamento);
                $_SESSION['msg'] = 'Encaminhamento registrado com sucesso';
                header('Location: '.HOME.'/exibir/encaminhamentos/'.date('Y-m-d'));
            }
        }
    }
}