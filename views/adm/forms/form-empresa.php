<div class="row justify-content-center">
    <div class="col-sm col-md-6">

        <?php include ABSPATH . '/views/_includes/mostrar-erros.php'; ?>

        <form method="POST" class="form-dados">

            <div class="form-group row">
                <label class="col-2 col-form-label" for="cnpj">CNPJ</label>
                <div class="col-10">
                    <input type="text" name="cnpj" id="cnpj" autofocus <?php if ($edicao){ echo "readonly"; }?>
                           value="<?php echo check_array($model->form_data,'cnpj'); ?>" class="form-control"/>
                </div>
            </div>

            <div class="form-group row">
                <label class="col-sm-2 col-form-label" for="razao">Razão social</label>
                <div class="col-sm-10">
                    <input type="text" name="razao" id="razao" value="<?php echo check_array($model->form_data,'razao'); ?>" class="form-control"/>
                </div>
            </div>

            <?php include ABSPATH . '/views/_includes/endereco.php'; ?>

            <div class="form-group row">
                <label class="col-md-2 col-form-label" for="telefone">Telefone</label>
                <div class="col-md-10">
                    <input type="text" name="telefone" id="telefone"
                           value="<?php echo check_array($model->form_data,'telefone'); ?>" class="form-control"/>
                </div>
            </div>

            <?php include ABSPATH . '/views/_includes/botoes-form.php'; ?>
        </form>
    </div>
</div>