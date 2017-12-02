<?php

class EditarController extends MainController {

    /**
     * Verifica as permissões e chama a view para edição de colaborador.
     * @see RegisterColaboradorModel
     */
    public function colaborador() {

        if (!$this->logado or $this->tipo != 'administrador') {
            $_SESSION['goto_url'] = HOME . '/index/login';
            header('Location: ' . HOME . '/administrador/logout');
            return;
        }
        $model = $this->load_model('adm/register-colaborador-model');

        include ABSPATH . '/views/_includes/header.php';
        include ABSPATH . '/views/_includes/header-login.php';
        include ABSPATH . '/views/adm/register-colaborador-template.php';
        include ABSPATH . '/views/_includes/footer.php';
    }

    /**
     * Verifica as permissões e chama a view para edição de doador.
     * @see RegisterDoadorModel
     */
    public function doador() {

        if (!$this->logado or $this->tipo != 'administrador') {
            $_SESSION['goto_url'] = HOME . '/index/login';
            header('Location: ' . HOME . '/administrador/logout');
            return;
        }
        $model = $this->load_model('adm/register-doador-model');
        $tipo = 'Doador';

        include ABSPATH . '/views/_includes/header.php';
        include ABSPATH . '/views/_includes/header-login.php';
        include ABSPATH . '/views/adm/register-doador-template.php';
        include ABSPATH . '/views/_includes/footer.php';
    }

    /**
     * Verifica as permissões e chama a view para edição de empresa.
     * @see RegisterEmpresaModel
     */
    public function empresa() {

        if (!$this->logado or $this->tipo != 'administrador') {
            $_SESSION['goto_url'] = HOME . '/index/login';
            header('Location: ' . HOME . '/administrador/logout');
            return;
        }
        $model = $this->load_model('adm/register-empresa-model');

        include ABSPATH . '/views/_includes/header.php';
        include ABSPATH . '/views/_includes/header-login.php';
        include ABSPATH . '/views/adm/register-empresa-template.php';
        include ABSPATH . '/views/_includes/footer.php';
    }
}

?>