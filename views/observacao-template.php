<?php
    $model->validate_register_form();
?>

<h5>Observação</h5>
<p>Informe onde tem material disponível, para que possa ser recolhido</p>

<div class="row justify-content-center">
    <div class="col-sm col-md-6">

        <?php include ABSPATH . '/views/_includes/mostrar-erros.php'; ?>

        <form method="POST" class="form-dados">

            <input type="hidden" name="cpf_colaborador" value="<?php echo $cpf; ?>" />

            <?php include ABSPATH . '/views/_includes/endereco.php'; ?>

            <div class="form-group row">
                <label class="col-md-2 col-form-label" for="descricao">Descrição</label>
                <div class="col-md-10">
                    <textarea name="descricao" id="descricao" class="form-control"><?php echo check_array($model->form_data, 'descricao')?></textarea>
                </div>
            </div>

            <?php include ABSPATH . '/views/_includes/botoes-form.php'; ?>
        </form>
    </div>
</div>

<script>
    document.getElementById("rua").focus();
</script>