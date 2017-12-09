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

            foreach ($_POST as $key => $value) {
                $this->form_data[$key] = $value;
            }

            if (!isset($this->form_data['cpf_colaborador'])) {
                $this->form_data['cpf_colaborador'] = $cpf;
            }

            $this->form_msg = validar_dados($this->form_data);

            if (empty($this->form_msg)) {
                $endereco = new Endereco($this->form_data['rua'], $this->form_data['numero'],
                    $this->form_data['bairro'], $this->form_data['cidade'], $this->form_data['uf']);

                $observacao = new Observacao($this->form_data['descricao'],
                    date('Y-m-d'), $endereco, $this->form_data['cpf_colaborador']);

                ColaboradorDao::adicionarObservacao($observacao);
                $_SESSION['msg'] = 'Observação enviada ao administrador';
                header('Location: ' . $_SESSION['goto_url']);
            }
        }
    }
}