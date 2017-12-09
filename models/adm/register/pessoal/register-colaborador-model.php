<?php
/**
Model para cadastro de colaboradores
 */
class RegisterColaboradorModel extends MainModel {
    
    public function validate_register_form() {

        if ($_SERVER['REQUEST_METHOD'] == 'POST' and !  empty($_POST)) {
            $this->form_data = array();
            $this->form_msg = array();

            foreach ($_POST as $key => $value) {
                $this->form_data[$key] = $value;
            }

            $this->form_data['cpf'] = retirar_mask($this->form_data['cpf']);
            $this->form_data['telefone'] = retirar_mask($this->form_data['telefone']);

            $c = ColaboradorDao::getColaboradorPorCpf($this->form_data['cpf']);
            if ($c) {
                //$this->form_msg['cpf'] = "CPF já cadastrado";
                return;
            }

            $this->form_msg = validar_dados($this->form_data);

            if (empty($this->form_msg)) {

                $endereco = new Endereco($this->form_data['rua'],
                    $this->form_data['numero'], $this->form_data['bairro'],
                    $this->form_data['cidade'], $this->form_data['uf']);

                $colaborador = new Colaborador($this->form_data['cpf'],
                    $this->form_data['nome'], $endereco, $this->form_data['telefone'],
                    $this->form_data['senha']);

                ColaboradorDao::adicionarColaborador($colaborador);
                header("Location: " . HOME . '/exibir/colaboradores');
            }
        }
    }
}