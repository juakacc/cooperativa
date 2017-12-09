<?php

/**
 * Class AdministradorController
 * @see MainController
 */
class AdministradorController extends MainController {

    /**
     * Verifica as permissões e chama a página inicial do Admin
     *@see IndexAdmModel
     */
    public function index() {

        if (!$this->logado or $this->tipo != 'administrador') {
            $_SESSION['goto_url'] = HOME . '/index/login';
            header('Location: ' . HOME . '/administrador/logout');
            return;
        }
        $model = $this->load_model('adm/index-adm-model');
        $_SESSION['goto_url'] = HOME . '/administrador';
        
        include ABSPATH . '/views/_includes/header.php';
        include ABSPATH . '/views/_includes/header-login.php';
        include ABSPATH . '/views/adm/index-template.php';
        include ABSPATH . '/views/_includes/footer.php';
    }

    /**
     * Realiza o logout do usuário, destruindo os dados em sessão.
     * @param string $goto_url
     */
    public function logout() {
        session_destroy();
        //$goto_url = (isset($_SESSION['goto_url'])) ? $_SESSION['goto_url'] : HOME;
        header('Location: '. HOME);
    }
}