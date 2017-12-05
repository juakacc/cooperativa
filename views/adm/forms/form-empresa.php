<form method="POST" class="form-dados">

    <div class="form-group row">
        <label class="col-2 col-form-label" for="cnpj">CNPJ</label>
        <div class="col-10">
            <input type="text" name="cnpj" id="cnpj" autofocus
                   value="<?php echo check_array($model->form_data,'cnpj'); ?>" placeholder="Apenas números" class="form-control"/>
        </div>
    </div>

    <div class="form-group row">
        <label class="col-2 col-form-label" for="razao">Razão social</label>
        <div class="col-10">
            <input type="text" name="razao" id="razao" value="<?php echo check_array($model->form_data,'razao'); ?>" class="form-control"/>
        </div>
    </div>

    <?php include ABSPATH . '/views/_includes/endereco.php'; ?>

    <div class="form-group row">
        <label class="col-2 col-form-label" for="telefone">Telefone</label>
        <div class="col-10">
            <input type="text" name="telefone" id="telefone"
                   value="<?php echo check_array($model->form_data,'telefone'); ?>" placeholder="Apenas números" class="form-control"/>
        </div>
    </div>

    <?php include ABSPATH . '/views/_includes/botoes-form.php'; ?>
</form>