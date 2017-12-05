<?php
    $model->validate_register_form();
?>

<h5>Observação</h5>
<p>Informe onde tem material disponível, para que possa ser recolhido</p>

<form method="POST" class="form-dados">

        <?php if(isset($cpf)): ?>
            <div class="form-group row">
                <label class="col-2 col-form-label" for="cpf">CPF</label>
                <div class="col-10">
                    <input type="text" name="cpf" id="cpf"
                           value="<?php echo $cpf; ?>" readonly class="form-control"/>
                </div>
            </div>
        <?php endif; ?>

        <?php include ABSPATH . '/views/_includes/endereco.php'; ?>

        <div class="form-group row">
            <label class="col-2 col-form-label" for="descricao">Descrição</label>
            <div class="col-10">
                <textarea name="descricao" id="descricao" class="form-control">
                    <?php echo check_array($model->form_data, 'descricao')?></textarea>
            </div>
        </div>

        <?php include ABSPATH . '/views/_includes/botoes-form.php'; ?>
</form>

<script>
    document.getElementById("rua").focus();
</script>