<?php
$model->form_data['data'] = date('d/m/Y');
$model->validate_register_form();
$empresas = EmpresaDao::getEmpresas();
?>

<h5>Realizar destinação</h5>
<p>Registre o material destinado a uma determinada empresa</p>

<div class="row justify-content-center">
    <div class="col-sm col-md-6">

        <?php include ABSPATH . '/views/_includes/mostrar-erros.php'; ?>

        <form method="POST" class="form-dados">

            <div class="form-group row">
                <label class="col-md-2 col-form-label" for="cnpj">Empresa</label>
                <div class="col-md-10">
                    <select name="cnpj_empresa" id="cnpj" autofocus class="form-control custom-select">
                        <?php foreach ($empresas as $e): ?>
                            <option value="<?php echo $e->getCnpj(); ?>"><?php echo $e->getRazao(); ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
            </div>

            <div class="form-group row">
                <label class="col-2 col-form-label"></label>
                <div class="col-10">
                    <a href="<?php echo HOME; ?>/register/empresa">Adicionar empresa</a>
                </div>
            </div>

            <div class="form-group row">
                <label class="col-2 col-form-label" for="data">Data</label>
                <div class="col-10">
                    <input type="text" name="data" id="data"
                           value="<?php echo check_array($model->form_data, 'data'); ?>" class="form-control"/>
                </div>
            </div>

            <div class="form-group row">
                <label class="col-md-2 col-form-label" for="descricao">Descrição</label>
                <div class="col-md-10">
                    <textarea name="descricao" id="descricao" class="form-control"><?php echo check_array($model->form_data, 'descricao'); ?></textarea>
                </div>
            </div>

            <?php include ABSPATH . '/views/_includes/botoes-form.php'; ?>
        </form>
    </div>
</div>