<?php
/**
Model para cadastro de colaboradores
 */
class RegisterColaboradorModel extends MainModel {
    
    public function validate_register_form() {
        $this->form_data = array();
        $this->form_msg = array();

        if ($_SERVER['REQUEST_METHOD'] == 'POST' and !  empty($_POST)) {
            if (isset($_POST['cancelar'])) {
                header('Location: '. $_SESSION['goto_url']);
                return;
            }

            foreach ($_POST as $key => $value) {
                $this->form_data[$key] = $value;
            }

            if (strlen($this->form_data['nome']) == 0) {
                $this->form_msg['nome'] = 'Nome inválido...';
            }

            $this->form_data['cpf'] = retirar_mask($this->form_data['cpf']);

            if (!is_numeric($this->form_data['cpf'])) {
                $this->form_msg['cpf'] = 'CPF inválido...';
                $this->form_data['cpf'] = '';
            }

            if (!is_numeric($this->form_data['numero'])) {
                $this->form_msg['numero'] = 'Número inválido...';
                $this->form_data['numero'] = '';
            }

            if (strlen($this->form_data['senha']) == 0) {
                $this->form_msg['senha'] = 'Senha inválida';
            }

            $this->form_msg = array_merge($this->form_msg, $this->validar_end($this->form_msg, $this->form_data));

            if (empty($this->form_msg)) {
                $this->form_data['telefone'] = retirar_mask($this->form_data['telefone']);

                $endereco = new Endereco($this->form_data['rua'],
                    $this->form_data['numero'], $this->form_data['bairro'],
                    $this->form_data['cidade'], $this->form_data['uf']);

                $colaborador = new Colaborador($this->form_data['cpf'],
                    $this->form_data['nome'], $endereco, $this->form_data['telefone'],
                    $this->form_data['senha']);

                ColaboradorDao::adicionarColaborador($colaborador);
                header("Location: " . HOME . '/administrador');
            }
        }
    }
}