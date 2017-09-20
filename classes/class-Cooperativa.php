<?php

class Cooperativa {
    
    private $controller;
    private $metodh;
    private $parametros;
    
    public function __construct() {
        $this->get_url_data();
        
        if (!$this->controller) {   // Chamo a página inicial
            require_once ABSPATH . '/controllers/index-controller.php';
            
            $this->controller = new IndexController();
            $this->controller->index();
            return;
        }
        
        if (!file_exists(ABSPATH . '/controllers/' . $this->controller . '.php')) {
            echo 'Página inexistente...';
            return;
        }
        
        require_once ABSPATH .'/controllers/' . $this->controller . '.php';
        $this->controller = preg_replace('/[^a-zA-Z]/i', '', $this->controller);
        
        if (!class_exists($this->controller)) {
            echo 'Página not found';
            return;
        }
        // instancio a classe
        $this->controller = new $this->controller($this->parametros);
        $this->metodh = preg_replace('/[^a-zA-Z]/i', '', $this->metodh);
        
        // if o método existir, chamo ele
        if (method_exists($this->controller, $this->metodh)) {
            $this->controller->{$this->metodh}();
            return;
        }
        //Se não, chamo o index
        $this->controller->index();
        return;
    }
    
    private function get_url_data() {
        if (isset($_GET['path'])) {
            $path = $_GET['path'];
            
            $path = rtrim($path, '/');
            $path = explode('/', $path);
            
            $this->controller = check_array($path, 0);
            $this->controller .= '-controller';
            
            $this->metodh = check_array($path, 1);
            
            if (check_array($path, 2)) {
                unset($path[0]);
                unset($path[1]);
                $this->parametros = array_values($path);
            }
        }
    }
}