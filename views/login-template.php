<?php
$model->validarLogin();
?>

<h5>Login</h5>
<p>Realize login no sistema para acessar opções restritas</p>

<?php foreach ($model->form_msg as $e): ?>
    <p class="erro"><?php echo $e; ?></p>
<?php endforeach; ?>

<div class="row justify-content-center">
    <div class="col-8">
        <form method="POST">

            <div class="form-group row">
                <label class="col-2 col-form-label" for="forma">Forma</label>
                <div class="col-10">
                    <select name="tipo" id="forma" autofocus class="form-control custom-select">
                        <option value="administrador">Admin</option>
                        <option value="colaborador">Colaborador</option>
                        <option value="doador">Doador</option>
                    </select>
                </div>
            </div>

            <div class="form-group row">
                <label class="col-2 col-form-label" for="cpf">CPF</label>
                <div class="col-10">
                    <input type="text" placeholder="CPF" name="ide" id="cpf"
                           value="<?php echo check_array($model->form_data, 'ide'); ?>"  class="form-control"/>
                </div>
            </div>

            <div class="form-group row">
                <label class="col-2 col-form-label" for="senha">Senha</label>
                <div class="col-10">
                    <input type="password" placeholder="Senha" name="senha" id="senha" class="form-control"/>
                </div>
            </div>

            <div class="form-group row">
                <div class="col-6">
                    <input type="submit" value="Entrar" class="btn btn-success form-control"/>
                </div>
                <div class="col-6">
                    <input type="submit" value="Cancelar" name="cancelar" class="btn btn-danger form-control"/>
                </div>
            </div>
        </form>
    </div>
</div>