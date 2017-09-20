<?php

/**
 * Class RegisterObservacaoModel
 */
class RegisterObservacaoModel extends MainModel {

    /**
    Validação dos dados do formulário, para gravação de nova observação.
     */
    public function validate_register_form() {
        $this->form_data = array();
        $this->form_msg = array();

        if ($_SERVER['REQUEST_METHOD'] == 'POST' and !empty($_POST)) {
            if (isset($_POST['cancelar'])) {
                header('Location: ' . $_SESSION['goto_url']);
                return;
            }

            foreach ($_POST as $key => $value) {
                $this->form_data[$key] = $value;

                if ($value == '')
                    $this->form_msg['a'] = 'Por favor, preencha todos os campos...';
            }

            if (!is_numeric($this->form_data['cpf'])) {
                $this->form_msg[] = 'CPF apenas com números...';
                $this->form_data['cpf'] = '';
            }

            if (!is_numeric($this->form_data['numero'])) {
                $this->form_msg[] = 'Digite um número válido...';
                $this->form_data['numero'] = '';
            }

            if (empty($this->form_msg)) {
                $endereco = new Endereco($this->form_data['rua'], $this->form_data['numero'],
                    $this->form_data['bairro'], $this->form_data['cidade'], $this->form_data['uf']);

                $observacao = new Observacao($this->form_data['descricao'], date('Y-m-d'), $endereco);

                $colaborador = new Colaborador($this->form_data['cpf']);
                $colaborador->fazerObservacao($observacao);
                header('Location: ' . $_SESSION['goto_url']);
                return;
            }
        }
    }
}