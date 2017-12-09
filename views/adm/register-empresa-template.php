<?php
$model->validate_register_form();
$edicao = false;
?>

<h5>Cadastro de empresa</h5>
<p>Cadastre uma nova empresa para receber material</p>

<?php include "forms/form-empresa.php"; ?>

<!--Para a consulta AJAX-->
<input type="hidden" value="empresa" id="tipo" />
<script src="<?php echo HOME ?>/views/_js/verifica-cpf-cnpj.js"></script>
