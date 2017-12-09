<?php
    $model->validate_register_form();
    $c = $model->form_data;

    $edicao = false;
?>

<h5>Cadastro de colaborador</h5>
<p>Adicione uma nova pessoa para colaborar com a cooperativa</p>

<?php include "forms/form-colaborador.php"; ?>

<!--Para a consulta AJAX-->
<input type="hidden" value="colaborador" id="tipo"/>
<script src="<?php echo HOME ?>/views/_js/verifica-cpf-cnpj.js"></script>
