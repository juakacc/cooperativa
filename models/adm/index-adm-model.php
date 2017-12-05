<?php

/**
 * Class IndexAdmModel
 * @see MainModel
 */
class IndexAdmModel extends MainModel {

    /**
     * Valida os dados do formulário e marca a observação como lida
     */
    public function validate_form() {
        $this->form_data = array();

        if ($_SERVER['REQUEST_METHOD'] == 'POST' and !empty($_POST)) {
            foreach ($_POST as $key => $value) {
                $this->form_data[$key] = $value;
            }
        }

        foreach ($this->form_data as $key => $value) {
            if (substr_count($key, 'check-')) {
                $tokens = explode('-', $key);
                ColaboradorDao::marcarComoLida(end($tokens));
            }
        }
    }
}