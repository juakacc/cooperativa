<?php
/**
Model para cadastro de colaboradores
 */
class EditarColaboradorModel extends MainModel {

    public function validate_register_form() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST' and !empty($_POST)) {
            $this->form_data = array();
            $this->form_msg = array();
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

            if (!is_numeric($this->form_data['cpf'])) {
                $this->form_msg['cpf'] = 'CPF inválido...';
                $this->form_data['cpf'] = '';
            }

            $this->form_msg = array_merge($this->form_msg, $this->validar_end($this->form_msg, $this->form_data));

            if (empty($this->form_msg)) {
                $endereco = new Endereco($this->form_data['rua'],
                    $this->form_data['numero'], $this->form_data['bairro'],
                    $this->form_data['cidade'], $this->form_data['uf']);

                $colaborador = new Colaborador($this->form_data['cpf'],
                    $this->form_data['nome'], $endereco, $this->form_data['telefone'],
                    $this->form_data['senha']);

                ColaboradorDao::editarColaborador($colaborador);
                header("Location: " . HOME . '/administrador/');
            }
        }
    }

    public function prepararExibir(Colaborador $colaborador) {
        $this->form_data['cpf'] = $colaborador->getCpf();
        $this->form_data['nome'] = $colaborador->getNome();
        $this->form_data['telefone'] = $colaborador->getTelefone();

        $e = $colaborador->getEndereco();
        $this->form_data['rua'] = $e->getRua();
        $this->form_data['numero'] = $e->getNumero();
        $this->form_data['bairro'] = $e->getBairro();
        $this->form_data['cidade'] = $e->getCidade();
        $this->form_data['uf'] = $e->getUf();
    }
}