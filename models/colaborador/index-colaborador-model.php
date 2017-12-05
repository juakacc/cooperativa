<?php

/**
 * Class IndexColaboradorModel
 * @see MainModel
 */
class IndexColaboradorModel extends MainModel {

    /**
     * Valida os dados do formulário e adiciona caso estejam corretos.
     */
    public function validate_register_form() {

        if ($_SERVER['REQUEST_METHOD'] == 'POST' and !empty($_POST)) {
            if (isset($_POST['cancelar'])) {
                header('Location: '. $_SESSION['goto_url']);
                return;
            }
            $this->form_data = array();

            foreach ($_POST as $key => $value) {
                $this->form_data[$key] = $value;
            }
            // Validação

            $endereco = new Endereco($this->form_data['rua'], $this->form_data['numero'],
                $this->form_data['bairro'], $this->form_data['cidade'], $this->form_data['uf']);

            $observacao = new Observacao($this->form_data['descricao'],
                date('Y-m-d'), $endereco, $this->form_data['cpf']);

            ColaboradorDao::adicionarObservacao($observacao);
        }
    }
}