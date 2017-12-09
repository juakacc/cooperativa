<?php

/**
 * Class RegisterDoadorModel
 * @see MainModel
 */
class RegisterDoadorModel extends MainModel {

    /**
     * Valida os dados do formulário e adiciona o novo doador,
     * caso tudo esta correto.
     */
    public function validate_register_form() {
        $this->form_data = array();
        $this->form_msg = array();

        if ($_SERVER['REQUEST_METHOD'] == 'POST' and !empty($_POST)) {

            foreach ($_POST as $key => $value) {
                $this->form_data[$key] = $value;
            }

            $this->form_data['cpf'] = retirar_mask($this->form_data['cpf']);
            $this->form_data['telefone'] = retirar_mask($this->form_data['telefone']);

            $d = DoadorDao::getDoadorPorCpf($this->form_data['cpf']);
            if ($d) {
                return;
            }

            $this->form_msg = validar_dados($this->form_data);

            if (empty($this->form_msg)) {
                $endereco = new Endereco($this->form_data['rua'], $this->form_data['numero'],
                    $this->form_data['bairro'], $this->form_data['cidade'], $this->form_data['uf']);

                $doador = new Doador($this->form_data['cpf'], $this->form_data['nome'], $endereco,
                    $this->form_data['telefone'], $this->form_data['senha']);

                DoadorDao::adicionarDoador($doador);
                header("Location: " . HOME . '/exibir/doadores');
            }
        }
    }
}