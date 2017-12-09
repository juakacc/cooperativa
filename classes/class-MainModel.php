<?php

/**
 * Class MainModel
 */
class MainModel {

    /**
     * Conexão com o banco
     * @var mysqli
     */
    protected $mysqli;
    public $controller;

    /**
     * Dados inseridos no formulário
     * @var
     */
    public $form_data;

    /**
     * Mensagens a serem exibidas no formulário
     * @var array
     */
    public $form_msg;

    /**
     * MainModel constructor.
     * @param $controller
     */
    function __construct($controller) {
        $this->mysqli = new mysqli(DB_LOCAL, DB_USER,
            DB_PASS, DB_BASE);
        if (mysqli_connect_errno()) {
            echo 'Erro na conexão';
            die();
        }
        $this->controller = $controller;
        $this->form_msg = array();
    }

    /**
     * Por enquanto vou deixar só o nome mesmo
     * @param $tipo
     * @param $ide
     * @return Empresa|Pessoa
     */
    public function getUserByIde($tipo, $ide) {
        $mysqli = getConexao();
        $sql = "SELECT nome FROM " . $tipo . " WHERE cpf = ?";

        if ($stmt = $mysqli->prepare($sql)) {
            $stmt->bind_param("s", $ide);
            $stmt->execute();
            $stmt->bind_result($nome);

            if ($stmt->fetch()) {
                if ($tipo == 'empresa') {
                    $a = new Empresa($ide, $nome);
                } else {
                    $a = new Pessoa($ide, $nome);
                }
                $this->fechar($stmt, $mysqli);
                return $a;
            }
        }
    }

//    function validar_end($form_msg, $form_data) {
//        if (!validar_str_nao_vazia($form_data['rua'])) {
//            $form_msg['rua'] = 'Rua inválida';
//            return $form_msg;
//        }
//        if (!validar_numero($form_data['numero'])) {
//            $form_msg['numero'] = 'Número inválido';
//            return $form_msg;
//        }
//        if (!validar_str_nao_vazia($form_data['bairro'])) {
//            $form_msg['bairro'] = 'Bairro inválido';
//            return $form_msg;
//        }
//        if (!validar_str_nao_vazia($form_data['cidade'])) {
//            $form_msg['cidade'] = 'Cidade inválida';
//            return $form_msg;
//        }
//        return $form_msg;
//    }

    /**
     * Fechar conexões
     * @param array ...$itens
     */
    protected function fechar(...$itens) {
        foreach ($itens as $i) {
            $i->close();
        }
    }
}