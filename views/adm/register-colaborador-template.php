<?php
    $model->validate_register_form();
    $c = $model->form_data;
?>

<h5>Cadastro de colaborador</h5>

<form method="POST" class="form-dados">

    <div class="form-group row">
        <label class="col-2 col-form-label">CPF</label>
        <div class="col-10">
            <input type="text" name="cpf" value="<?php echo check_array($c,'cpf'); ?>" placeholder="Apenas números" class="form-control"/>
        </div>
    </div>

    <div class="form-group row">
        <label class="col-2 col-form-label">Nome</label>
        <div class="col-10">
            <input type="text" name="nome" value="<?php echo check_array($c,'nome'); ?>" class="form-control"/>
        </div>
    </div>

    <?php include ABSPATH . '/views/_includes/endereco.php'; ?>

    <div class="form-group row">
        <label class="col-2 col-form-label">Telefone</label>
        <div class="col-10">
            <input type="text" name="telefone" value="<?php echo check_array($c,'telefone'); ?>" placeholder="Apenas números" class="form-control"/>
        </div>
    </div>

    <div class="form-group row">
        <label class="col-2 col-form-label">Senha</label>
        <div class="col-10">
            <input type="password" name="senha" class="form-control"/>
        </div>
    </div>

    <?php include ABSPATH . '/views/_includes/botoes-form.php'; ?>
</form>