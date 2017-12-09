<?php
$doador = DoadorDao::getDoadorPorCpf($this->parametros[0]);
$model->prepararParaExibir($doador);
$model->validate_register_form();

$c = $model->form_data;
$edicao = true;
?>

<h5>Editar doador</h5>

<?php include ABSPATH . '/views/adm/forms/form-colaborador.php'; ?>
