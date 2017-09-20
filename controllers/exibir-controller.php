<?php

/**
 * Class ExibirController
 * @see MainController
 */
class ExibirController extends MainController {

    /**
     * Chama a view para visualização das doações
     */
    public function doacoes() {
        $data = date('Y-m-d');
        if (isset($this->parametros[0])) {
            // validar data
            $data = $this->parametros[0];
        }
        $_SESSION['goto_url'] = HOME;
        $model = $this->load_model('exibir-model');
        // inclui templates...
        include ABSPATH . '/views/_includes/header.php';
        include ABSPATH . '/views/_includes/header-normal.php';
        include ABSPATH . '/views/exibir/doacoes-template.php';
        include ABSPATH . '/views/_includes/footer.php';
    }

    /**
     * Chama a view para visualização dos encaminhamentos
     */
    public function encaminhamentos() {
        $data = date('Y-m-d');
        if (isset($this->parametros[0])) {
            // validar data
            $data = $this->parametros[0];
        }
        $_SESSION['goto_url'] = HOME;
        $model = $this->load_model('exibir-model');
        // inclui templates...
        include ABSPATH . '/views/_includes/header.php';
        include ABSPATH . '/views/_includes/header-normal.php';
        include ABSPATH . '/views/exibir/encaminhamentos-template.php';
        include ABSPATH . '/views/_includes/footer.php';
    }

    /**
     * Chama a view para visualização das colaborações
     */
    public function colaboracoes() {
        $data = date('Y-m-d');
        if (isset($this->parametros[0])) {
            // validar data
            $data = $this->parametros[0];
        }
        $_SESSION['goto_url'] = HOME;
        $model = $this->load_model('exibir-model');
        // inclui templates...
        include ABSPATH . '/views/_includes/header.php';
        include ABSPATH . '/views/_includes/header-normal.php';
        include ABSPATH . '/views/exibir/colaboracoes-template.php';
        include ABSPATH . '/views/_includes/footer.php';
    }

    /**
     * Chama a view para visualização das empresas cadastradas
     */
    public function empresas() {

        $model = $this->load_model('exibir-model');

        include ABSPATH . '/views/_includes/header.php';
        include ABSPATH . '/views/_includes/header-normal.php';
        include ABSPATH . '/views/exibir/empresas-template.php';
        include ABSPATH . '/views/_includes/footer.php';
    }

    /**
     * Chama a view para visualização dos doadores cadastrados
     */
    public function doadores() {

        $model = $this->load_model('exibir-model');

        include ABSPATH . '/views/_includes/header.php';
        include ABSPATH . '/views/_includes/header-normal.php';
        include ABSPATH . '/views/exibir/doadores-template.php';
        include ABSPATH . '/views/_includes/footer.php';
    }

    /**
     * Chama a view para visualização dos colaboradores cadastrados
     */
    public function colaboradores() {

        $model = $this->load_model('exibir-model');

        include ABSPATH . '/views/_includes/header.php';
        include ABSPATH . '/views/_includes/header-normal.php';
        include ABSPATH . '/views/exibir/colaboradores-template.php';
        include ABSPATH . '/views/_includes/footer.php';
    }

    /**
     * Chama a view para visualização das observações
     */
    public function observacao() {
        // Esse tem que ter permissão de ADMIN

        if (!isset($this->parametros[0]) or !is_numeric($this->parametros[0])) {
            header('Location: ' . $_SESSION['goto_url']);
            return;
        }

        $model = $this->load_model('exibir-model');

        include ABSPATH . '/views/_includes/header.php';
        include ABSPATH . '/views/_includes/header-login.php';
        include ABSPATH . '/views/exibir/observacao-template.php';
        include ABSPATH . '/views/_includes/footer.php';
    }
}