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
            if (isset($_POST['cancelar'])) {
                header('Location: '. $_SESSION['goto_url']);
                return;
            }

            foreach ($_POST as $key => $value) {
                $this->form_data[$key] = $value;
                if ($value == '')
                    $this->form_msg['a'] = 'Preencha todos os campos...';
            }

            if (!is_numeric($this->form_data['cpf'])) {
                $this->form_msg[] = 'Digite um CPF apenas com números';
                $this->form_data['cpf'] = '';
            }

            if (!is_numeric($this->form_data['numero'])) {
                $this->form_msg[] = 'Valor inválido para número';
                $this->form_data['numero'] = '';
            }

            if (!is_numeric($this->form_data['telefone'])) {
                $this->form_msg[] = 'Digite apenas números para o telefone';
                $this->form_data['telefone'] = '';
            }

            if (empty($this->form_msg)) {
                $endereco = new Endereco($this->form_data['rua'], $this->form_data['numero'],
                    $this->form_data['bairro'], $this->form_data['cidade'], $this->form_data['uf']);

                $doador = new Doador($this->form_data['cpf'], $this->form_data['nome'], $endereco,
                    $this->form_data['telefone'], $this->form_data['senha']);

                $this->adicionarDoador($doador);
                header("Location: " . HOME . '/adm');
            }
        }
    }

    /**
     * Adiciona um novo doador a lista de doadores da cooperativa
     * @param Doador $d
     */
    private function adicionarDoador(Doador $d) {
        $id_endereco = $this->addEndereco($d->endereco);
        $sql = "INSERT INTO doador (cpf, nome, telefone, senha, endereco_id) VALUES (?,?,?,?,?)";

        if ($stmt = $this->mysqli->prepare($sql)) {
            $stmt->bind_param("ssssi", $d->getCpf(), $d->getNome(), $d->getTelefone(),
                $d->getSenha(), $id_endereco);
            $stmt->execute();
            $stmt->close();
        }
    }
}