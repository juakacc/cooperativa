<?php

class EditarController extends MainController {

    /**
     * Verifica as permissões e chama a view para edição de colaborador.
     * @see RegisterColaboradorModel
     */
    public function colaborador() {

//        if (!$this->logado or $this->tipo != 'administrador') {
//            $_SESSION['goto_url'] = HOME . '/index/login';
//            header('Location: ' . HOME . '/administrador/logout');
//            return;
//        }
        if (empty($this->parametros)) {
            return;
        }
        $model = $this->load_model('adm/editar/editar-colaborador-model');

        include ABSPATH . '/views/_includes/header.php';
        include ABSPATH . '/views/_includes/header-login.php';
        include ABSPATH . '/views/adm/editar/editar-colaborador-template.php';
        include ABSPATH . '/views/_includes/footer.php';
    }

    /**
     * Verifica as permissões e chama a view para edição de doador.
     * @see RegisterDoadorModel
     */
    public function doador() {

//        if (!$this->logado or $this->tipo != 'administrador') {
//            $_SESSION['goto_url'] = HOME . '/index/login';
//            header('Location: ' . HOME . '/administrador/logout');
//            return;
//        }
        if (empty($this->parametros)) {
            return;
        }
        $model = $this->load_model('adm/editar/editar-doador-model');

        include ABSPATH . '/views/_includes/header.php';
        include ABSPATH . '/views/_includes/header-login.php';
        include ABSPATH . '/views/adm/editar/editar-doador-template.php';
        include ABSPATH . '/views/_includes/footer.php';
    }

    /**
     * Verifica as permissões e chama a view para edição de empresa.
     * @see RegisterEmpresaModel
     */
    public function empresa() {

//        if (!$this->logado or $this->tipo != 'administrador') {
//            $_SESSION['goto_url'] = HOME . '/index/login';
//            header('Location: ' . HOME . '/administrador/logout');
//            return;
//        }
        if (empty($this->parametros)) {
            return;
        }
        $model = $this->load_model('adm/editar/editar-empresa-model');

        include ABSPATH . '/views/_includes/header.php';
        include ABSPATH . '/views/_includes/header-login.php';
        include ABSPATH . '/views/adm/editar/editar-empresa-template.php';
        include ABSPATH . '/views/_includes/footer.php';
    }
}

?>