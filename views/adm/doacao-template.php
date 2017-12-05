<?php
$model->form_data['data'] = date('d/m/Y');
$model->validate_register_form();
$doadores = DoadorDao::getDoadores();
?>

<h5>Registrar doação</h5>
<p>Registre uma doação anônima ou escolha um doador</p>

<div class="row justify-content-center">
    <div class="col-8">

        <form method="POST" class="form-dados">

            <div class="form-group row">
                <label class="col-2 col-form-label" for="cpf">Doador</label>
                <div class="col-10">
                    <select name="cpf" id="cpf" autofocus class="form-control custom-select">
                        <?php foreach ($doadores as $d): ?>
                            <option value="<?php echo $d->getCpf(); ?>"><?php echo $d->getNome(); ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
            </div>

            <div class="form-group row">
                <div class="col-2"></div>
                <div class="col-10">
                    <a href="<?php $_SESSION['goto_url'] = HOME.'/register/doacao'; echo HOME; ?>/register/doador">Adicionar doador</a>
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
    </div>
</div>