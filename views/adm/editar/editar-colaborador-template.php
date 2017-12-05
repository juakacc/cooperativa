<?php
$colaborador = ColaboradorDao::getColaboradorPorCpf($this->parametros[0]);
$model->prepararExibir($colaborador);
$model->validate_register_form();

$c = $model->form_data;
$edicao = true;
?>

<h5>Editar colaborador</h5>

<?php include ABSPATH . "/views/adm/forms/form-colaborador.php"; ?>
