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
    public function __construct($controller) {
        $this->mysqli = new mysqli('localhost', 'juaka', '123', 'cooperativa');
        $this->controller = $controller;
        $this->form_msg = array();
    }

    /**
     * Adiciona um endereço e retorna o ID do mesmo
     * @param Endereco $e
     * @return int ID com o qual o endereço ficou
     */
    protected function addEndereco(Endereco $e) {
        $sql = "INSERT INTO endereco (rua, numero, bairro, cidade, uf) 
                VALUES (?,?,?,?,?)";

        if ($stmt = $this->mysqli->prepare($sql)) {
            $stmt->bind_param("sisss", $e->getRua(), $e->getNumero(),
                $e->getBairro(), $e->getCidade(), $e->getUf());

            if ($stmt->execute()) {
                $stmt->close();
                $sql = "SELECT id FROM endereco ORDER BY id DESC LIMIT 1";

                if ($stmt = $this->mysqli->prepare($sql)) {
                    $stmt->execute();

                    $stmt->bind_result($id);
                    if ($stmt->fetch()) {
                        return $id;
                    }
                }
            } else {
                echo $stmt->error;
            }
        }
        return -1;
    }

    /**
     * Por enquando vou deixar só o nome mesmo
     * @param $tipo
     * @param $ide
     * @return Empresa|Pessoa
     */
    public function getUserByIde($tipo, $ide) {
        $sql = "SELECT ";
        $sql .= ($tipo == 'empresa') ? 'razao' : 'nome';
        $sql .= " FROM " . $tipo . " WHERE ";
        $sql .= ($tipo == 'empresa') ? 'cnpj' : 'cpf';
        $sql .= " = ?";

        if ($stmt = $this->mysqli->prepare($sql)) {
            $stmt->bind_param("s", $ide);
            $stmt->execute();
            $stmt->bind_result($nome);

            if ($stmt->fetch()) {
                if ($tipo == 'empresa') {
                    $a = new Empresa($ide, $nome);
                } else {
                    $a = new Pessoa($ide, $nome);
                }
                return $a;
            }
        }
    }

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