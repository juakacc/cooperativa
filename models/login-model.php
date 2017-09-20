<?php

/**
 * Class LoginModel
 */
class LoginModel extends MainModel {

    /**
     * Função para validar login
     */
    public function validarLogin() {
        $this->form_data = array();
        
        if ($_SERVER['REQUEST_METHOD'] == 'POST' and !empty($_POST)) {
            if (isset($_POST['cancelar'])) {
                header('Location: ' . HOME);
                return;
            }
            
            foreach ($_POST as $key => $value) {
                $this->form_data[$key] = $value;
            }

            if (check_array($this->form_data,'ide') == '') {
                $this->form_msg[] = 'Digite o CPF/CNPJ...';
                return;
            }
            $pessoa = $this->getPessoaByCpf($this->form_data['tipo'], $this->form_data['ide']);

            if (!$pessoa) {
                $this->form_msg[] = 'Usuário inexistente...';
                return;
            }

            if ($pessoa->getSenha() != $this->form_data['senha']) {
                $this->form_msg[] = 'Senha incorreta...';
                return;
            }

            $_SESSION['logado'] = true;
            $_SESSION['tipo'] = $this->form_data['tipo'];
            $_SESSION['id'] = $pessoa->getCpf();
            header('Location: '.HOME.'/' . $this->form_data['tipo']);
        }
    }

    /**
     * Recupera uma pessoa/empresa de acordo com o seu CPF/CNPJ
     * @param $tipo
     * @param $ide
     * @return null|Pessoa
     */
    private function getPessoaByCpf($tipo, $ide) {
        $sql = "SELECT senha FROM ". $tipo . " WHERE ";
        if ($tipo == 'empresa') {
            $sql .= "cnpj";
        } else {
            $sql .= "cpf";
        }
        $sql .= " = ?";

        if ($stmt = $this->mysqli->prepare($sql)) {
            $stmt->bind_param("s", $ide);
            $stmt->execute();

            $stmt->bind_result($senha);
            if ($stmt->fetch()) {
                $pessoa = new Pessoa($ide);
                $pessoa->setSenha($senha);
                return $pessoa;
            }
        }
        return null;
    }
}