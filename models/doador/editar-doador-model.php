<?php

/**
 * Class RegisterDoadorModel
 * @see MainModel
 */
class EditarDoadorModel extends MainModel {

    /**
     * Valida os dados do formulário e adiciona o novo doador,
     * caso tudo esta correto.
     */
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

            if (empty($this->form_msg)) {
                $endereco = new Endereco($this->form_data['rua'], $this->form_data['numero'],
                    $this->form_data['bairro'], $this->form_data['cidade'], $this->form_data['uf']);
                $endereco->setId($this->form_data['id_endereco']);

                $doador = new Doador($this->form_data['cpf'], $this->form_data['nome'], $endereco,
                    $this->form_data['telefone'], $this->form_data['senha']);

                DoadorDao::editarDoador($doador);
                header("Location: " . $_SESSION['goto_url']);
            }
        }
    }

    public function prepararParaExibir(Doador $doador) {
        $this->form_data['cpf'] = $doador->getCpf();
        $this->form_data['nome'] = $doador->getNome();
        $this->form_data['telefone'] = $doador->getTelefone();
        $e = $doador->getEndereco();

        $this->form_data['rua'] = $e->getRua();
        $this->form_data['numero'] = $e->getNumero();
        $this->form_data['bairro'] = $e->getBairro();
        $this->form_data['cidade'] = $e->getCidade();
        $this->form_data['uf'] = $e->getUf();
        $this->form_data['id_endereco'] = $e->getId();
    }

}