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
        $this->form_data = array();
        $this->form_msg = array();
        
        if ($_SERVER['REQUEST_METHOD'] == 'POST' and !empty($_POST)) {
            if (isset($_POST['cancelar'])) {
                header('Location: '. HOME . '/administrador');
                return;
            }

            foreach ($_POST as $key => $value) {
                $this->form_data[$key] = $value;
                if ($value == '')
                    $this->form_msg['a'] = 'Preencha todos os campos...';
            }

            if (!validar_data($this->form_data['data'])) {
                $this->form_msg['data'] = 'Digite uma data válida...';
                $this->form_data['data'] = date('Y-m-d');
            }

            if (strlen($this->form_data['descricao']) == 0) {
                $this->form_msg['descricao'] = 'Descrição inválida...';
            }

            if (empty($this->form_msg)) {
                $doacao = new Doacao($this->form_data['descricao'], $this->form_data['data']);

                $doador = new Doador($this->form_data['cpf']);
                $doador->addDoacao($doacao);
                header('Location: ' . HOME . '/adm');
            }
        }
    }

    /**
     * Recupera todos os doadores da cooperativa
     * @return array
     */
    public function getDoadores() {
        $sql = "SELECT cpf, nome FROM doador";
        $doadores = array();

        if ($stmt = $this->mysqli->prepare($sql)) {
            $stmt->execute();
            $stmt->bind_result($cpf, $nome);

            while ($d = $stmt->fetch()) {
                $doador = new Doador($cpf, $nome);
                $doadores[] = $doador;
            }
            $stmt->close();
        }
        return $doadores;
    }
}