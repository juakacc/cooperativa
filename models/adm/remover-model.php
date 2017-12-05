<?php

class RemoverModel extends MainModel {

    public function preparar() {
        $this->form_data['tipo'] = $this->controller->parametros[0];
        $this->form_data['id'] = $this->controller->parametros[1];

        switch ($this->form_data['tipo']) {
            case 'colaborador':
                $colaborador = ColaboradorDao::getColaboradorPorCpf($this->form_data['id']);
                $this->form_data['nome'] = $colaborador->getNome();
                break;
            case 'doador':
                $doador = DoadorDao::getDoadorPorCpf($this->form_data['id']);
                $this->form_data['nome'] = $doador->getNome();
                break;
            case 'empresa':
                $empresa = EmpresaDao::getEmpresaByCnpj($this->form_data['id']);
                $this->form_data['nome'] = $empresa->getRazao();
                break;
        }
    }

    public function validate_form() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST' and !empty($_POST)) {

            if (isset($_POST['nao'])) {
                header('Location: '. HOME . '/administrador');
                return;
            }

            switch ($this->form_data['tipo']) {
                case 'colaborador':
                    ColaboradorDao::removerColaborador($this->form_data['id']);
                    break;
                case 'doador':
                    DoadorDao::removerDoador($this->form_data['id']);
                    break;
                case 'empresa':
                    EmpresaDao::removerEmpresa($this->form_data['id']);
                    break;
            }

            $_SESSION['removido'] = true;
            header('Location: ' . $_SESSION['goto_url']);
            return;
        }
    }
}