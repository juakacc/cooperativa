<?php

/**
 * Class DoadorController
 */
class DoadorController extends MainController {

    /**
     * Verifica as permissões e chama a página inicial para os doadores.
     * @see IndexDoadorModel
     */
    public function index() {

        if (!$this->logado or $this->tipo != 'doador') {
            $_SESSION['goto_url'] = HOME . '/index/login';
            header('Location: ' . HOME . '/administrador/logout');
            return;
        }
        $model = $this->load_model('doador/index-doador-model');
        $_SESSION['goto_url'] = HOME . '/doador';

        include ABSPATH . '/views/_includes/header.php';
        include ABSPATH . '/views/_includes/header-login.php';
        include ABSPATH . '/views/doador/index-template.php';
        include ABSPATH . '/views/_includes/footer.php';
    }
}