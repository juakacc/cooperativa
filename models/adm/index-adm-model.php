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
        $this->form_msg = array();

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            foreach ($_POST as $key => $value) {
                $this->form_data[$key] = $value;
            }

            if (!empty($this->form_data)) {
                foreach ($this->form_data as $key => $value) {
                    if (substr_count($key, 'check-')) {
                        $tokens = explode('-', $key);
                        ColaboradorDao::marcarComoLida(end($tokens));
                    }
                }
                $_SESSION['msg'] = "Marcada(s) como lida(s)";
            } else {
                $this->form_msg['e'] = 'Marque uma observação';
            }
        }

    }
}