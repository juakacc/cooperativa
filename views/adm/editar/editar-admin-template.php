<?php
$admin = AdministradorDao::getAdminPorCpf($this->parametros[0]);
$model->prepararExibir($admin);
$model->validate_register_form();

$c = $model->form_data;
$edicao = true;
?>

<h5>Editar administrador</h5>

<?php include ABSPATH . "/views/adm/forms/form-colaborador.php"; ?>
