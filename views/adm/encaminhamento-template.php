<?php
$model->validate_register_form();
$encaminhamentos = $model->getEmpresas();
?>

<h5>Realizar destinação</h5>
<p>Registre o material destinado a uma determinada empresa</p>

<form method="POST" class="form-dados">

    <div class="form-group row">
        <label class="col-2 col-form-label">Empresa</label>
        <div class="col-10">
            <select name="cnpj" class="form-control custom-select">
                <?php foreach ($encaminhamentos as $e): ?>
                    <option value="<?php echo $e->getCnpj(); ?>"><?php echo $e->getRazao(); ?></option>
                <?php endforeach; ?>
            </select>
        </div>
    </div>

    <div class="form-group row">
        <label class="col-2 col-form-label"></label>
        <div class="col-10">
            <a href="<?php $_SESSION['goto_url'] = HOME . '/register/encaminhamento'; echo HOME; ?>/register/empresa">Add empresa</a>
        </div>
    </div>

    <div class="form-group row">
        <label class="col-2 col-form-label">Data</label>
        <div class="col-10">
            <input type="date" name="data" value="<?php echo check_array($model->form_data, 'data'); ?>" class="form-control"/>
        </div>
    </div>

    <div class="form-group row">
        <label class="col-2 col-form-label">Descrição</label>
        <div class="col-10">
            <textarea name="descricao" class="form-control"><?php echo check_array($model->form_data, 'descricao'); ?></textarea>
        </div>
    </div>

    <?php include ABSPATH . '/views/_includes/botoes-form.php'; ?>
</form>