<?php
$model->validate_register_form();
$colaboradores = $model->getColaboradores();
?>

<h5>Registro de diária</h5>
<p>Registre a presença de um colaborador em um determinado dia.</p>

<div class="row justify-content-center">
    <div class="col-6">
        <form method="POST" class="form-dados">

            <div class="form-group row">
                <label class="col-4 col-form-label">Colaborador</label>
                <div class="col-8">
                    <select name="cpf" class="form-control custom-select">
                        <?php foreach ($colaboradores as $c): ?>
                            <option value="<?php echo $c->getCpf(); ?>"><?php echo $c->getNome(); ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
            </div>

            <div class="form-group row">
                <label class="col-4 col-form-label">Data</label>
                <div class="col-8">
                    <input type="date" name="data"
                           value="<?php echo check_array($model->form_data, 'data'); ?>" class="form-control"/>
                </div>
            </div>

            <?php include ABSPATH . '/views/_includes/botoes-form.php'; ?>
        </form>
    </div>
</div>