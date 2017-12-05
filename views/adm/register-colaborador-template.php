<?php
    $model->validate_register_form();
    $c = $model->form_data;
?>

<h5>Cadastro de colaborador</h5>

<?php include "forms/form-colaborador.php"; ?>