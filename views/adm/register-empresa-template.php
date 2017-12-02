<?php
$model->validate_register_form();
?>

<h5>Cadastro de empresa</h5>
<p>Cadastre uma nova empresa para receber material</p>

<form method="POST" class="form-dados">

    <div class="form-group row">
        <label class="col-2 col-form-label" for="cnpj">CNPJ</label>
        <div class="col-10">
            <input type="text" name="cnpj" id="cnpj" value="<?php echo check_array($model->form_data,'cnpj'); ?>" placeholder="Apenas números" class="form-control"/>
        </div>
    </div>

    <div class="form-group row">
        <label class="col-2 col-form-label">Razão social</label>
        <div class="col-10">
            <input type="text" name="razao" value="<?php echo check_array($model->form_data,'razao'); ?>" class="form-control"/>
        </div>
    </div>

    <?php include ABSPATH . '/views/_includes/endereco.php'; ?>

    <div class="form-group row">
        <label class="col-2 col-form-label">Telefone</label>
        <div class="col-10">
            <input type="text" name="telefone" value="<?php echo check_array($model->form_data,'telefone'); ?>" placeholder="Apenas números" class="form-control"/>
        </div>
    </div>

    <?php include ABSPATH . '/views/_includes/botoes-form.php'; ?>
</form>

