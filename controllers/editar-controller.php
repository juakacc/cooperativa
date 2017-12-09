<?php

class EditarController extends MainController {

    /**
     * Verifica as permissões e chama a view para edição de colaborador.
     * @see RegisterColaboradorModel
     */
    public function colaborador() {

        if (empty($this->parametros)) {
            $_SESSION['goto_url'] = HOME . '/index/login';
            header('Location: ' . HOME . '/administrador/logout');
            return;
        }

        if (!$this->logado or
            ($this->tipo != 'administrador' and $_SESSION['id'] != $this->parametros[0])) {

            $_SESSION['goto_url'] = HOME . '/index/login';
            header('Location: ' . HOME . '/administrador/logout');
            return;
        }

        $model = $this->load_model('colaborador/editar-colaborador-model');

        include ABSPATH . '/views/_includes/header.php';
        include ABSPATH . '/views/_includes/header-login.php';
        include ABSPATH . '/views/colaborador/editar-colaborador-template.php';
        include ABSPATH . '/views/_includes/footer.php';
    }

    /**
     * Verifica as permissões e chama a view para edição de doador.
     * @see RegisterDoadorModel
     */
    public function doador() {

        if (empty($this->parametros)) {
            $_SESSION['goto_url'] = HOME . '/index/login';
            header('Location: ' . HOME . '/administrador/logout');
            return;
        }

        if (!$this->logado or
            ($this->tipo != 'administrador' and $_SESSION['id'] != $this->parametros[0])) {

            $_SESSION['goto_url'] = HOME . '/index/login';
            header('Location: ' . HOME . '/administrador/logout');
            return;
        }
        $model = $this->load_model('doador/editar-doador-model');

        include ABSPATH . '/views/_includes/header.php';
        include ABSPATH . '/views/_includes/header-login.php';
        include ABSPATH . '/views/doador/editar-doador-template.php';
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
        if (empty($this->parametros)) {
            return;
        }
        $model = $this->load_model('adm/editar/editar-empresa-model');

        include ABSPATH . '/views/_includes/header.php';
        include ABSPATH . '/views/_includes/header-login.php';
        include ABSPATH . '/views/adm/editar/editar-empresa-template.php';
        include ABSPATH . '/views/_includes/footer.php';
    }

    public function administrador() {

        if (!$this->logado or $this->tipo != 'administrador') {
            $_SESSION['goto_url'] = HOME . '/index/login';
            header('Location: ' . HOME . '/administrador/logout');
            return;
        }

        if (empty($this->parametros)) {
            return;
        }
        $model = $this->load_model('adm/editar/editar-admin-model');

        include ABSPATH . '/views/_includes/header.php';
        include ABSPATH . '/views/_includes/header-login.php';
        include ABSPATH . '/views/adm/editar/editar-admin-template.php';
        include ABSPATH . '/views/_includes/footer.php';
    }
}

?>