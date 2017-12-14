<?php
$empresa = EmpresaDao::getEmpresaByCnpj($this->parametros[0]);
$model->prepararParaExibir($empresa);
$model->validate_register_form();
$edicao = true;
?>

<h5>Editar empresa</h5>
<p>Edite os dados de uma empresa cadastrada</p>

<?php include ABSPATH . '/views/adm/forms/form-empresa.php'; ?>