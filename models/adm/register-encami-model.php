<?php

class RegisterEncamiModel extends MainModel {

    /**
     * Valida os dados enviados pelo usuário e
     * envia para ser gravado no banco
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
                $this->form_msg[] = 'Digite uma data válida...';
                $this->form_data['data'] = '';
            }

            if (empty($this->form_msg)) {
                $encaminhamento = new Encaminhamento($this->form_data['descricao'], $this->form_data['data']);
                $empresa = new Empresa($this->form_data['cnpj']);
                $empresa->addMaterial($encaminhamento);
                header('Location: ' . HOME . '/adm');
            }
        }
    }

    /**
     * Recupera todas as empresas cadastradas
     */
    public function getEmpresas() {
        $sql = "SELECT cnpj, razao FROM empresa";
        $e = array();

        if ($stmt = $this->mysqli->prepare($sql)) {
            $stmt->execute();
            $stmt->bind_result($cnpj, $razao);

            while ($d = $stmt->fetch()) {
                $e[] = new Empresa($cnpj, $razao);
            }
            $stmt->close();
        }
        return $e;
    }
}