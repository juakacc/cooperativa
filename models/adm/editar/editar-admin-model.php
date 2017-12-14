<?php

class EditarAdminModel extends MainModel {

    public function validate_register_form() {

        if ($_SERVER['REQUEST_METHOD'] == 'POST' and !empty($_POST)) {
            $this->form_data = array();
            $this->form_msg = array();

            foreach ($_POST as $key => $value) {
                $this->form_data[$key] = $value;
            }

            $this->form_data['cpf'] = retirar_mask($this->form_data['cpf']);
            $this->form_data['telefone'] = retirar_mask($this->form_data['telefone']);

            $this->form_msg = validar_dados($this->form_data);

            $senha = $_POST['senha'];
            $senha2 = $_POST['senha2'];

            if ($senha != $senha2) {
                $this->form_msg['senha'] = 'Senhas diferentes';
            }

            if (empty($this->form_msg)) {
                $endereco = new Endereco($this->form_data['rua'],
                    $this->form_data['numero'], $this->form_data['bairro'],
                    $this->form_data['cidade'], $this->form_data['uf']);
                $endereco->setId($this->form_data['id_endereco']);

                $admin = new Administrador($this->form_data['cpf'],
                    $this->form_data['nome'], $endereco, $this->form_data['telefone']);

                $admin->setId($this->form_data['id']);
                $admin->setSenha($this->form_data['senha']);

                AdministradorDao::editarAdmin($admin);
                $_SESSION['msg'] = "Dados alterados, faça login novamente";
                header("Location: " . HOME . '/administrador/logout');
            }
        }
    }

    public function prepararExibir(Administrador $admin) {
        $this->form_data['id'] = $admin->getId();
        $this->form_data['cpf'] = $admin->getCpf();
        $this->form_data['nome'] = $admin->getNome();
        $this->form_data['telefone'] = $admin->getTelefone();

        $e = $admin->getEndereco();
        $this->form_data['rua'] = $e->getRua();
        $this->form_data['numero'] = $e->getNumero();
        $this->form_data['bairro'] = $e->getBairro();
        $this->form_data['cidade'] = $e->getCidade();
        $this->form_data['uf'] = $e->getUf();
        $this->form_data['id_endereco'] = $e->getId();

    }
}