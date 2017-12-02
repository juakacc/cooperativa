<?php

/**
 * Class IndexModel
 */
class IndexModel extends MainModel {

    public $data;

    /**
     * Recupera os dados do formulário e retorna a pesquisa de acordo com eles
     * @return array
     */
    public function get_dados() {
        $this->form_data = array();
        $this->form_msg = array();
        $data = date('Y-m-d');

        if ($_SERVER['REQUEST_METHOD'] == 'POST' and !empty($_POST)) {
            foreach ($_POST as $key => $value) {
                $this->form_data[$key] = $value;
            }
        }
        if (isset($this->form_data['data']) and !validar_data($this->form_data['data'])) {
            $this->form_msg['data'] = 'Informe uma data válida...';
        }

        if (empty($this->form_msg) and isset($this->form_data['data'])){
            $this->data = $this->form_data['data'];
        } else {
            $this->data = $data;
        }
        return $this->getResultsByData($this->data);
    }

    /**
     * Recupera um relatório de acordo com a data informada
     */
    private function getResultsByData($data) {
        $resultado = array();
        // especificar cada tipo
        $sql = "SELECT * FROM doacao WHERE data = '{$data}'";
        if ($result = $this->mysqli->query($sql)) {
            $resultado['doacao'] = $result->num_rows;
        }
        
        $sql = "SELECT * FROM encaminhamento WHERE data = '{$data}'";
        if ($result = $this->mysqli->query($sql)) {
            $resultado['encaminhamento'] = $result->num_rows;
        }
        
        $sql = "SELECT * FROM colaboracao WHERE data = '{$data}'";
        if ($result = $this->mysqli->query($sql)) {
            $resultado['colaboracao'] = $result->num_rows;
        }
        
        // Material, onde fica?
        $sql = "SELECT * FROM diaria WHERE data = '{$data}'";
        if ($result = $this->mysqli->query($sql)) {
            //$resultado['material'] = $result->fetch_asso()['quantidade'];
        }
        return $resultado;
    }
}