<?php
$empresa = EmpresaDao::getEmpresaByCnpj($this->parametros[0]);
$model->prepararParaExibir($empresa);
$model->validate_register_form();
?>

<h5>Editar empresa</h5>

<?php include ABSPATH . '/views/adm/forms/form-empresa.php'; ?>