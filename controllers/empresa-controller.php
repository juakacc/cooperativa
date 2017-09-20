<?php

/**
 * Class EmpresaController
 */
class EmpresaController extends MainController {

    /**
     * Verifica as permissões e chama a página inicial para as empresas
     * @see IndexEmpresaModel
     */
    public function index() {

        if (!$this->logado or $this->tipo != 'empresa') {
            $_SESSION['goto_url'] = HOME . '/index/login';
            header('Location: ' . HOME . '/administrador/logout');
            return;
        }

        $model = $this->load_model('empresa/index-empresa-model');
        $_SESSION['goto_url'] = HOME . '/empresa';

        include ABSPATH . '/views/_includes/header.php';
        include ABSPATH . '/views/_includes/header-login.php';
        include ABSPATH . '/views/empresa/index-template.php';
        include ABSPATH . '/views/_includes/footer.php';
    }
}