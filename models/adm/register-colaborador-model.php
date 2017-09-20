<?php
/**
Model para cadastro de colaboradores
 */
class RegisterColaboradorModel extends MainModel {
    
    public function validate_register_form() {
        $this->form_data = array();
        $this->form_msg = array();

        if ($_SERVER['REQUEST_METHOD'] == 'POST' and !  empty($_POST)) {
            if (isset($_POST['cancelar'])) {
                header('Location: '. $_SESSION['goto_url']);
                return;
            }

            foreach ($_POST as $key => $value) {
                $this->form_data[$key] = $value;
                if ($value == '')
                    $this->form_msg[] = 'Por favor, preencha todos os campos...';
            }

            if (!is_numeric($this->form_data['cpf'])) {
                $this->form_msg[] = 'CPF apenas com números...';
                $this->form_data['cpf'] = '';
            }

            if (!is_numeric($this->form_data['numero'])) {
                $this->form_msg[] = 'Digite um número válido...';
                $this->form_data['numero'] = '';
            }

            if (!is_numeric($this->form_data['telefone'])) {
                $this->form_msg[] = 'Digite um telefone válido...';
                $this->form_data['telefone'] = '';
            }

            if (empty($this->form_msg)) {
                $endereco = new Endereco($this->form_data['rua'],
                    $this->form_data['numero'], $this->form_data['bairro'],
                    $this->form_data['cidade'], $this->form_data['uf']);

                $colaborador = new Colaborador($this->form_data['cpf'],
                    $this->form_data['nome'], $endereco, $this->form_data['telefone'],
                    $this->form_data['senha']);

                $this->adicionarColaborador($colaborador);
                header("Location: " . HOME . '/adm/');
            }
        }
    }

    /**
     * Adiciona um novo colaborador a lista de colaboradores cadastrados
     * @param $c
     */
    private function adicionarColaborador($c) {
        $id_endereco = $this->addEndereco($c->endereco);
        $sql = "INSERT INTO colaborador (cpf, nome, telefone, senha, endereco_id) 
                VALUES (?,?,?,?,?)";

        if ($stmt = $this->mysqli->prepare($sql)) {
            $stmt->bind_param("ssssi", $c->getCpf(), $c->getNome(), $c->getTelefone(),
                $c->getSenha(), $id_endereco);

            $stmt->execute();
            $stmt->close();
        }
    }
}