<?php

/**
 * Class MainController
 */
class MainController {
    
    public $parametros;
    public $logado = false;
    public $tipo;   //Tipo do login: administrador, colaborador, doador...

    /**
     * MainController constructor.
     * @param array $parametros
     */
    public function __construct($parametros = array()) {
        $this->parametros = $parametros;

        if (isset($_SESSION['logado']) and $_SESSION['logado']) { // Verifica se está logado, por default é false
            $this->logado = true;
        }
        $this->tipo = check_array($_SESSION, 'tipo');
    }

    /**
     * Carrega um modelo para ser utilizado
     * @param $model_name
     */
    public function load_model($model_name) {
        if (!$model_name)
            return;
        $model = ABSPATH . '/models/'.$model_name.'.php';
        
        if (file_exists($model)) {
            require $model;
            $model_name = explode('/', $model_name);
            $model_name = end($model_name);
            $model_name = preg_replace('/[^a-zA-Z0-9]/is', '', $model_name);
            
            if (class_exists($model_name)){
                return new $model_name($this);
            }
        }
        return;
    }

    public function incluir_cabecalho() {
        if ($this->logado) {
            return ABSPATH . '/views/_includes/header-login.php';
        } else {
            return ABSPATH . '/views/_includes/header-normal.php';
        }
    }
}