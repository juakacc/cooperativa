<?php

/**
 * Class ColaboradorController
 */
class ColaboradorController extends MainController {

    /**
     * Verifica as permissões e chama a página inicial para os colaboradores.
     * @see IndexColaboradorModel
     */
    public function index() {

        if (!$this->logado or $this->tipo != 'colaborador') {
            $_SESSION['goto_url'] = HOME . '/index/login';
            header('Location: ' . HOME . '/administrador/logout');
            return;
        }

        $model = $this->load_model('colaborador/index-colaborador-model');
        $_SESSION['goto_url'] = HOME . '/colaborador';

        include ABSPATH . '/views/_includes/header.php';
        include ABSPATH . '/views/_includes/header-login.php';
        include ABSPATH . '/views/colaborador/index-template.php';
        include ABSPATH . '/views/_includes/footer.php';
    }
}

