<?php
$model->validarLogin();
?>

<h5>Login</h5>
<p>Realize login no sistema para acessar opções restritas</p>

<div class="row justify-content-center">
    <div class="col-sm col-md-5">

        <div class="row">
            <div class="col">
                <?php include ABSPATH . '/views/_includes/mostrar-erros.php' ?>
            </div>
        </div>

        <form method="POST" class="">

            <div class="form-group row">
                <label class="col-sm-2 col-form-label" for="forma">Forma</label>
                <div class="col-sm-10">
                    <select name="tipo" id="forma" autofocus class="form-control custom-select">
                        <option value="administrador">Admin</option>
                        <option value="colaborador">Colaborador</option>
                        <option value="doador">Doador</option>
                    </select>
                </div>
            </div>

            <div class="form-group row">
                <label class="col-sm-2 col-form-label" for="cpf">CPF</label>
                <div class="col-sm-10">
                    <input type="text" placeholder="CPF" name="ide" id="cpf"
                           value="<?php echo check_array($model->form_data, 'ide'); ?>"  class="form-control"/>
                </div>
            </div>

            <div class="form-group row">
                <label class="col-sm-2 col-form-label" for="senha">Senha</label>
                <div class="col-sm-10">
                    <input type="password" placeholder="Senha" name="senha" id="senha" class="form-control"/>
                </div>
            </div>

            <div class="form-group row">
                <div class="col-6">
                    <input type="submit" value="Entrar" class="btn btn-success form-control"/>
                </div>
                <div class="col-6">
                    <a href="<?php echo $_SESSION['goto_url']; ?>" class="btn btn-danger form-control">Cancelar</a>
                </div>
            </div>
        </form>
    </div>
</div>