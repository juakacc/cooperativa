<?php
$model->validate_register_form();
$colaboradores = ColaboradorDao::getColaboradores();
?>

<h5>Registro de diária</h5>
<p>Registre a presença de um colaborador em um determinado dia.</p>

<div class="row justify-content-center">
    <div class="col-sm col-md-6">

        <?php include ABSPATH . '/views/_includes/mostrar-erros.php'; ?>

        <form method="POST" class="form-dados">

            <div class="form-group row">
                <label class="col-4 col-form-label" for="cpf">Colaborador</label>
                <div class="col-8">
                    <select name="cpf" id="cpf" autofocus class="form-control custom-select">
                        <?php foreach ($colaboradores as $c): ?>
                            <option value="<?php echo $c->getCpf(); ?>"><?php echo $c->getNome(); ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
            </div>

            <div class="form-group row">
                <label class="col-4 col-form-label" for="data">Data</label>
                <div class="col-8">
                    <input type="text" name="data" id="data"
                           value="<?php echo check_array($model->form_data, 'data'); ?>" class="form-control"/>
                </div>
            </div>

            <?php include ABSPATH . '/views/_includes/botoes-form.php'; ?>
        </form>
    </div>
</div>