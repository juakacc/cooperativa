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
            if (validar_data($this->parametros[0])) {
                $data = $this->parametros[0];
            }
        }
        $_SESSION['goto_url'] = HOME;
        $model = new MainModel($this);

        include ABSPATH . '/views/_includes/header.php';
        include $this->incluir_cabecalho();
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
            if (validar_data($this->parametros[0])) {
                $data = $this->parametros[0];
            }
        }
        $_SESSION['goto_url'] = HOME;
        $model = new MainModel($this);

        include ABSPATH . '/views/_includes/header.php';
        include $this->incluir_cabecalho();
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
            if (validar_data($this->parametros[0])) {
                $data = $this->parametros[0];
            }
        }
        $_SESSION['goto_url'] = HOME;
        $model = new MainModel($this);

        include ABSPATH . '/views/_includes/header.php';
        include $this->incluir_cabecalho();
        include ABSPATH . '/views/exibir/colaboracoes-template.php';
        include ABSPATH . '/views/_includes/footer.php';
    }

    /**
     * Chama a view para visualização das empresas cadastradas
     */
    public function empresas() {

        $model = new MainModel($this);
        if ($this->logado) {
            $_SESSION['goto_url'] = HOME . '/exibir/empresas';
        }

        include ABSPATH . '/views/_includes/header.php';
        include $this->incluir_cabecalho();
        include ABSPATH . '/views/exibir/empresas-template.php';
        include ABSPATH . '/views/_includes/footer.php';
    }

    /**
     * Chama a view para visualização dos doadores cadastrados
     */
    public function doadores() {

        $model = new MainModel($this);
        if ($this->logado) {
            $_SESSION['goto_url'] = HOME . '/exibir/doadores';
        }

        include ABSPATH . '/views/_includes/header.php';
        include $this->incluir_cabecalho();
        include ABSPATH . '/views/exibir/doadores-template.php';
        include ABSPATH . '/views/_includes/footer.php';
    }

    /**
     * Chama a view para visualização dos colaboradores cadastrados
     */
    public function colaboradores() {

        $model = new MainModel($this);
        if ($this->logado) {
            $_SESSION['goto_url'] = HOME . '/exibir/colaboradores';
        }

        include ABSPATH . '/views/_includes/header.php';
        include $this->incluir_cabecalho();
        include ABSPATH . '/views/exibir/colaboradores-template.php';
        include ABSPATH . '/views/_includes/footer.php';
    }

    /**
     * Chama a view para visualização das observações
     */
    public function observacao() {
        // Esse tem que ter permissão de ADMIN
        if(!$this->logado) {
            header('Location: ' . HOME);
            return;
        }

        if (!isset($this->parametros[0]) or !is_numeric($this->parametros[0])) {
            header('Location: ' . $_SESSION['goto_url']);
            return;
        }

        $model = new MainModel($this);

        include ABSPATH . '/views/_includes/header.php';
        include $this->incluir_cabecalho();
        include ABSPATH . '/views/exibir/observacao-template.php';
        include ABSPATH . '/views/_includes/footer.php';
    }
}