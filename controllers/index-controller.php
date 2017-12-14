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
        include $this->incluir_cabecalho();
        require_once ABSPATH . '/views/index-template.php';
        include ABSPATH . '/views/_includes/footer.php';
    }

    /**
     * Carrega a página de login do sistema
     * @see LoginModel
     */
    public function login() {
        
        $model = $this->load_model('login-model');

        if ($this->logado) {    // Caso já esteja logado
            header('Location: ' . HOME . '/' . $_SESSION['tipo']);
        }

        $_SESSION['goto_url'] = HOME;
        
        include ABSPATH . '/views/_includes/header.php';
        include $this->incluir_cabecalho();
        include ABSPATH . '/views/login-template.php';
        include ABSPATH . '/views/_includes/footer.php';
    }

    /**
     * Página sobre do site
     */
    public function sobre() {

        $model = new MainModel($this);

        include ABSPATH . '/views/_includes/header.php';
        include $this->incluir_cabecalho();
        include ABSPATH . '/views/sobre-template.php';
        include ABSPATH . '/views/_includes/footer.php';
    }

    /**
     * Página com endereço da cooperativa
     */
    public function visitenos() {

        $model = new MainModel($this);

        include ABSPATH . '/views/_includes/header.php';
        include $this->incluir_cabecalho();
        include ABSPATH . '/views/visite-template.php';
        include ABSPATH . '/views/_includes/footer.php';
    }

    public function faq() {

        $model = new MainModel($this);

        include ABSPATH . '/views/_includes/header.php';
        include $this->incluir_cabecalho();
        include ABSPATH . '/views/faq-template.php';
        include ABSPATH . '/views/_includes/footer.php';
    }

    public function manual() {

        $model = new MainModel($this);

        include ABSPATH . '/views/_includes/header.php';
        include $this->incluir_cabecalho();
        include ABSPATH . '/views/manual-template.php';
        include ABSPATH . '/views/_includes/footer.php';
    }
}