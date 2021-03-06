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

            foreach($_POST as $key => $value) {
                $this->form_data[$key] = $value;
            }

            $this->form_data['cnpj'] = retirar_mask($this->form_data['cnpj']);
            $this->form_data['telefone'] = retirar_mask($this->form_data['telefone']);

            $e = EmpresaDao::getEmpresaByCnpj($this->form_data['cnpj']);
            if ($e) {
                return;
            }

            $this->form_msg = validar_dados($this->form_data);

            if (empty($this->form_msg)) {

                $endereco = new Endereco($this->form_data['rua'], $this->form_data['numero'],
                    $this->form_data['bairro'], $this->form_data['cidade'], $this->form_data['uf']);

                $empresa = new Empresa($this->form_data['cnpj'], $this->form_data['razao'],
                    $this->form_data['telefone'], $endereco);

                EmpresaDao::adicionarEmpresa($empresa);
                header("Location: ".HOME.'/exibir/empresas');
            }
        }
    }
}