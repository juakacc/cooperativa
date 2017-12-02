<?php

/**
 * Class RegisterDiariaModel
 */
class RegisterDiariaModel extends MainModel {

    /**
     * Valida os dados digitados pelo usuário e
     * envia para gravação no banco.
     */
    public function validate_register_form() {
        $this->form_data = array();
        $this->form_msg = array();

        if ($_SERVER['REQUEST_METHOD'] == 'POST' and !empty($_POST)) {
            if (isset($_POST['cancelar'])) {
                header('Location: '. $_SESSION['goto_url']);
                return;
            }

            foreach ($_POST as $key => $value) {
                $this->form_data[$key] = $value;

                if ($value == '')
                    $this->form_msg[] = 'Preencha todos os dados...';
            }

            if (!validar_data($this->form_data['data'])) {
                $this->form_msg[] = "Digite uma data válida...";
                $this->form_data['data'] = '';
            }

            if (empty($this->form_msg)) {
                $colaborador = new Colaborador($this->form_data['cpf']);
                $colaborador->registrarPresenca($this->form_data['data']);
                header('Location: ' . HOME . '/adm');
            }
        } else {
            $this->form_data['data'] = date('Y-m-d');
        }
    }

    /**
     * Recupera todos os colaboradores da cooperativa
     * @return array
     */
    public function getColaboradores() {
        $sql = "SELECT cpf, nome FROM colaborador";
        $colaboradores = array();

        if ($stmt = $this->mysqli->prepare($sql)) {
            $stmt->execute();
            $stmt->bind_result($cpf, $nome);

            while($stmt->fetch()) {
                $colaboradores[] = new Colaborador($cpf, $nome);
            }
            $stmt->close();
        }
        return $colaboradores;
    }
}