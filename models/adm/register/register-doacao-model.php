<?php

/**
 * Class RegisterDoacaoModel
 */
class RegisterDoacaoModel extends MainModel {

    /**
     * Valida os dados inseridos pelo usuário e
     * envia para ser gravado em banco.
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

                $doacao = new Doacao($this->form_data['descricao'], $this->form_data['data'],
                    $this->form_data['cpf_doador']);

                DoadorDao::adicionarDoacao($doacao);
                $_SESSION['msg'] = 'Doação registrada com sucesso';
                header('Location: '.HOME.'/exibir/doacoes/'.date('Y-m-d'));
            }
        }
    }
}