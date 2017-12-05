<?php
$model->form_data['data'] = date('d/m/Y');
$model->validate_register_form();
$colaboradores = ColaboradorDao::getColaboradores();
?>

<h5>Registrar colaboração</h5>
<p>Registre a colaboração de um colaborador existente ou cadastre um novo</p>

<form method="POST" class="form-dados">

    <div class="form-group row">
        <label class="col-2 col-form-label" for="cpf">Colaborador</label>
        <div class="col-10">
            <select name="cpf" id="cpf" class="custom-select form-control" autofocus>
                <?php foreach ($colaboradores as $d): ?>
                    <option value="<?php echo $d->getCpf(); ?>"><?php echo $d->getNome(); ?></option>
                <?php endforeach; ?>
            </select>
        </div>
    </div>

    <div class="form-group row">
        <div class="col-2"></div>
        <div class="col-10">
            <a href="<?php $_SESSION['goto_url'] = HOME.'/register/colaboracao'; echo HOME; ?>/register/colaborador">Adicionar colaborador</a>
        </div>
    </div>

    <div class="form-group row">
        <label class="col-2 col-form-label" for="funcao">Função</label>
        <div class="col-10">
            <input type="text" name="funcao" id="funcao"
                   value="<?php echo check_array($model->form_data, 'funcao'); ?>" class="form-control"/>
        </div>
    </div>

    <div class="form-group row">
        <label class="col-2 col-form-label" for="data">Data</label>
        <div class="col-10">
            <input type="date" name="data" id="data"
                   value="<?php echo check_array($model->form_data, 'data'); ?>" class="form-control"/>
        </div>
    </div>

    <div class="form-group row">
        <label class="col-2 col-form-label" for="descricao">Descrição</label>
        <div class="col-10">
            <textarea name="descricao" class="form-control" id="descricao">
                <?php echo check_array($model->form_data, 'descricao'); ?>
            </textarea>
        </div>
    </div>

    <?php include ABSPATH . '/views/_includes/botoes-form.php'; ?>
</form>