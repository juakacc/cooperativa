<?php

class RemoverController extends MainController {

    public function index() {

        $model = $this->load_model('adm/remover-model');

        $model->preparar();

        include ABSPATH . '/views/_includes/header.php';
        include ABSPATH . '/views/_includes/header-login.php';
        include ABSPATH . '/views/adm/remover-template.php';
        include ABSPATH . '/views/_includes/footer.php';
    }
}