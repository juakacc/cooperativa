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
                $this->markAsRead(end($tokens));
            }
        }
    }

    /**
     * Marca a observação como lida
     * @param $id
     */
    private function markAsRead($id) {
        $sql = "UPDATE observacao SET lida = 1 WHERE id = ?";

        if ($stmt = $this->mysqli->prepare($sql)) {
            $stmt->bind_param('i', $id);
            $stmt->execute();
            $stmt->close();
        }
    }

    /**
     * Recupera todoas as observações ainda não vistas pelo administrador.
     * @return array
     */
    public function getObservacoesNaoVistas() {
        $sql = "SELECT id, data, descricao, endereco_id, col_cpf FROM observacao WHERE lida = 0";
        $observacoes = array();

        if ($stmt = $this->mysqli->prepare($sql)) {
            $stmt->execute();
            $stmt->bind_result($id, $data, $descricao, $endereco_id, $col_cpf);

            while ($stmt->fetch()) {
                $endereco = $this->getAddressById($endereco_id);
                $o = new Observacao($descricao, $data, $endereco, $col_cpf);
                $o->setId($id);
                $observacoes[] = $o;
            }
            $stmt->close();
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

    /**
     * Recupera um Colaborador pelo seu CPF
     * @param $cpf
     * @return Colaborador|null
     */
    public function getColaboradorByCpf($cpf) {
        $sql = "SELECT nome FROM colaborador WHERE cpf = ?";

        if ($stmt = $this->mysqli->prepare($sql)) {
            $stmt->bind_param('s', $cpf);
            $stmt->execute();
            $stmt->bind_result($nome);

            if ($stmt->fetch()) {
                $c = new Colaborador($cpf, $nome);
                $stmt->close();
                return $c;
            }
        }
        return null;
    }
}