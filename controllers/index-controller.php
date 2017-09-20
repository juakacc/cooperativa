<?php

/**
 * Class IndexController
 * @see MainController
 */
class IndexController extends MainController {

    /**
     * Chama a página inicial do sistema
     * @see IndexModel
     */
    public function index() {

        $model = $this->load_model('index-model');

        $_SESSION['goto_url'] = HOME;

        include ABSPATH . '/views/_includes/header.php';
        include ABSPATH . '/views/_includes/header-normal.php';
        require_once ABSPATH . '/views/index-template.php';
        include ABSPATH . '/views/_includes/footer.php';
    }

    /**
     * Carrega a página de login do sistema
     * @see LoginModel
     */
    public function login() {
        
        $model = $this->load_model('login-model');

        $_SESSION['goto_url'] = HOME;
        
        include ABSPATH . '/views/_includes/header.php';
        include ABSPATH . '/views/_includes/header-normal.php';
        include ABSPATH . '/views/login-template.php';
        include ABSPATH . '/views/_includes/footer.php';

        //$this->logado = true;
    }

    /**
     * Página sobre do site
     */
    public function sobre() {

        include ABSPATH . '/views/_includes/header.php';
        include ABSPATH . '/views/_includes/header-normal.php';
        include ABSPATH . '/views/sobre-template.php';
        include ABSPATH . '/views/_includes/footer.php';
    }

    /**
     * Página com endereço da cooperativa
     */
    public function visitenos() {

        include ABSPATH . '/views/_includes/header.php';
        include ABSPATH . '/views/_includes/header-normal.php';
        include ABSPATH . '/views/visite-template.php';
        include ABSPATH . '/views/_includes/footer.php';
    }
}