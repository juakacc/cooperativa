<?php

/**
 * Classe Controller para registros
 * @see MainController
 */
class RegisterController extends MainController {

    /**
     * Verifica as permissões e chama a view para registro de colaborador.
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
     * Verifica as permissões e chama a view para registro de doador.
     * @see RegisterDoadorModel
     */
    public function doador() {

        if (!$this->logado or $this->tipo != 'administrador') {
            $_SESSION['goto_url'] = HOME . '/index/login';
            header('Location: ' . HOME . '/administrador/logout');
            return;
        }
        $model = $this->load_model('adm/register-doador-model');

        include ABSPATH . '/views/_includes/header.php';
        include ABSPATH . '/views/_includes/header-login.php';
        include ABSPATH . '/views/adm/register-doador-template.php';
        include ABSPATH . '/views/_includes/footer.php';
    }

    /**
     * Verifica as permissões e chama a view para registro de empresa.
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

    /**
     * Verifica as permissões e chama a view para registro de colaboração.
     * @see RegisterColaboracaoModel
     */
    public function colaboracao() {

        if (!$this->logado or $this->tipo != 'administrador') {
            $_SESSION['goto_url'] = HOME . '/index/login';
            header('Location: ' . HOME . '/administrador/logout');
            return;
        }
        $model = $this->load_model('adm/register-colaboracao-model');

        include ABSPATH . '/views/_includes/header.php';
        include ABSPATH . '/views/_includes/header-login.php';
        include ABSPATH . '/views/adm/colaboracao-template.php';
        include ABSPATH . '/views/_includes/footer.php';
    }

    /**
     * Verifica as permissões e chama a view para registro de doação.
     * @see RegisterDoacaoModel
     */
    public function doacao() {

        if (!$this->logado or $this->tipo != 'administrador') {
            $_SESSION['goto_url'] = HOME . '/index/login';
            header('Location: ' . HOME . '/administrador/logout');
            return;
        }
        $model = $this->load_model('adm/register-doacao-model');
        
        include ABSPATH . '/views/_includes/header.php';
        include ABSPATH . '/views/_includes/header-login.php';
        include ABSPATH . '/views/adm/doacao-template.php';
        include ABSPATH . '/views/_includes/footer.php';
    }

    /**
     * Verifica as permissões e chama a view para registro de encaminhamento.
     * @see RegisterEncamiModel
     */
    public function encaminhamento() {

        if (!$this->logado or $this->tipo != 'administrador') {
            $_SESSION['goto_url'] = HOME . '/index/login';
            header('Location: ' . HOME . '/administrador/logout');
            return;
        }
        $model = $this->load_model('adm/register-encami-model');
        
        include ABSPATH . '/views/_includes/header.php';
        include ABSPATH . '/views/_includes/header-login.php';
        include ABSPATH . '/views/adm/encaminhamento-template.php';
        include ABSPATH . '/views/_includes/footer.php';
    }

    /**
     * Verifica as permissões e chama a view para registro de diária.
     * @see RegisterDiariaModel
     */
    public function diaria() {

        if (!$this->logado or $this->tipo != 'administrador') {
            $_SESSION['goto_url'] = HOME . '/index/login';
            header('Location: ' . HOME . '/administrador/logout');
            return;
        }
        $model = $this->load_model('adm/register-diaria-model');

        include ABSPATH . '/views/_includes/header.php';
        include ABSPATH . '/views/_includes/header-login.php';
        include ABSPATH . '/views/adm/register-diaria-template.php';
        include ABSPATH . '/views/_includes/footer.php';
    }

    /**
     * Verifica as permissões e chama a view para registro de observação.
     * @see RegisterObservacaoModel
     */
    public function observacao() {

        $model = $this->load_model('colaborador/register-observacao-model');

        // Caso não esteja logado, utilizo o anônimo.
        if (isset($_SESSION['id'])) {
            $cpf = $_SESSION['id'];
        }

        include ABSPATH . '/views/_includes/header.php';

        if ($this->logado) {
            include ABSPATH . '/views/_includes/header-login.php';
        } else {
            include ABSPATH . '/views/_includes/header-normal.php';
        }
        include ABSPATH . '/views/observacao-template.php';
        include ABSPATH . '/views/_includes/footer.php';
    }
}