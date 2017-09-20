<?php

/**
 * Class RegisterEmpresaModel
 * @see MainModel
 */
class RegisterEmpresaModel extends MainModel {

    /**
     * Valida os dados do formulário e adiciona a nova empresa,
     * caso tudo esteja corretamente
     */
    public function validate_register_form() {
        $this->form_data = array();
        $this->form_msg = array();
        
        if ($_SERVER['REQUEST_METHOD'] == 'POST' and !empty($_POST)) {
            if (isset($_POST['cancelar'])) {
                header('Location: '. $_SESSION['goto_url']);
                return;
            }

            foreach($_POST as $key => $value) {
                $this->form_data[$key] = $value;

                if ($value == '')
                    $this->form_msg[] = 'Preencha todos os campos...';
            }

            if (!is_numeric($this->form_data['cnpj'])) {
                $this->form_msg[] = 'Digite um CNPJ apenas com números';
                $this->form_data['cnpj'] = '';
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

                $empresa = new Empresa($this->form_data['cnpj'], $this->form_data['razao'], $endereco);

                $this->addEmpresa($empresa);
                header("Location: ".HOME.'/adm');
            }
        }
    }

    /**
     * Adiciona uma nova empresa a lista de empresas cadastradas
     * @param Empresa $e
     */
    private function addEmpresa(Empresa $e) {
        $endereco_id = $this->addEndereco($e->getEndereco());
        $sql = "INSERT INTO empresa (cnpj, razao, endereco_id) VALUES (?,?,?)";

        if ($stmt = $this->mysqli->prepare($sql)) {
            $stmt->bind_param("ssi", $e->getCnpj(), $e->getRazao(), $endereco_id);
            $stmt->execute();
            $stmt->close();
        }
    }
}