<?php

/**
 * Class IndexColaboradorModel
 * @see MainModel
 */
class IndexColaboradorModel extends MainModel {

    /**
     * Valida os dados do formulário e adiciona caso estejam corretos.
     */
    public function validate_register_form() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST' and !empty($_POST)) {
            if (isset($_POST['cancelar'])) {
                header('Location: '. $_SESSION['goto_url']);
                return;
            }
            $this->form_data = array();

            foreach ($_POST as $key => $value) {
                $this->form_data[$key] = $value;

                if ($value == '') {
                    $this->form_msg['a'] = 'Preencha todos os campos...';
                    return;
                }
            }
            // Validação

            $endereco = new Endereco($this->form_data['rua'], $this->form_data['numero'],
                $this->form_data['bairro'], $this->form_data['cidade'], $this->form_data['uf']);

            $observacao = new Observacao($this->form_data['descricao'], date('Y-m-d'), $endereco);

            $colaborador = new Colaborador($this->form_data['cpf']);
            $colaborador->fazerObservacao($observacao);
        }
    }

    /**
     * Recupera as colaborações de um colaborador
     * @param $cpf
     * @return array
     */
    public function getColaboracoesByCpf($cpf) {
        $sql = "SELECT funcao, data, descricao FROM colaboracao WHERE col_cpf = ?";
        $colaboracoes = array();

        if ($stmt = $this->mysqli->prepare($sql)) {
            $stmt->bind_param("s", $cpf);
            $stmt->execute();
            $stmt->bind_result($funcao, $data, $descricao);

            while ($stmt->fetch()) {
                $c = new Colaboracao($descricao, $data, $funcao);
                $colaboracoes[] = $c;
            }
            $stmt->close();
        }
        return $colaboracoes;
    }

    /**
     * Recupera as observações de um colaborador
     * @param $cpf
     * @return array
     */
    public function getObservacoesByCpf($cpf) {
        $sql = "SELECT data, descricao, endereco_id FROM observacao WHERE col_cpf = ?";
        $observacoes = array();

        if ($stmt = $this->mysqli->prepare($sql)) {
            $stmt->bind_param("s", $cpf);
            $stmt->execute();
            $stmt->bind_result($data, $descricao, $endereco);

            while ($stmt->fetch()) {
                $e = $this->getAddressById($endereco);
                $o = new Observacao($descricao, $data, $e);
                $observacoes[] = $o;
            }
        }
        return $observacoes;
    }

    /**
     * Recupera um Endereço pelo ID
     * @param $id
     * @return Endereco|null
     */
    private function getAddressById($id) {
        $sql = "SELECT rua, numero, bairro, cidade, uf FROM endereco WHERE id = ?";
        $aux = new mysqli(DB_LOCAL, DB_USER, DB_PASS, DB_BASE);

        if ($s1tmt = $aux->prepare($sql)) {
            $s1tmt->bind_param('i', $id);
            $s1tmt->execute();
            $s1tmt->bind_result($rua, $numero, $bairro, $cidade, $uf);

            if ($s1tmt->fetch()) {
                $e = new Endereco($rua, $numero, $bairro, $cidade, $uf);
                $s1tmt->close();
                $aux->close();
                return $e;
            }
        }
        return null;
    }
}