<?php
$admin = AdministradorDao::getAdminPorCpf($this->parametros[0]);
$model->prepararExibir($admin);
$model->validate_register_form();

$c = $model->form_data;
$primeira_edicao = false;
// Primeiro acesso
if ($admin->getCpf() == '00000000000') {
    $primeira_edicao = true;
    if ($model->form_data['cpf'] == '00000000000') {
        $c['cpf'] = '';
    }
}
$edicao = true;
?>

<h5>Editar administrador</h5>

<div class="row justify-content-center">
    <div class="col-sm col-md-6">

        <?php include ABSPATH . '/views/_includes/mostrar-erros.php'; ?>

        <form method="POST" class="form-dados">
            <input type="hidden" name="id" value="<?php echo $c['id']; ?>" />

            <div class="form-group row">
                <label class="col-2 col-form-label" for="cpf">CPF</label>
                <div class="col-10">
                    <input type="text" name="cpf" id="cpf" <?php if($primeira_edicao) { echo 'autofocus'; } ?>
                        <?php if (!$primeira_edicao){ echo "readonly"; } ?>
                           value="<?php echo check_array($c,'cpf'); ?>" class="form-control"/>
                </div>
            </div>

            <div class="form-group row">
                <label class="col-2 col-form-label" for="nome">Nome</label>
                <div class="col-10">
                    <input type="text" name="nome" id="nome" <?php if (!$primeira_edicao) { echo 'autofocus'; } ?>
                           value="<?php echo check_array($c,'nome'); ?>" class="form-control"/>
                </div>
            </div>

            <?php include ABSPATH . '/views/_includes/endereco.php'; ?>

            <div class="form-group row">
                <label class="col-md-3 col-lg-2 col-form-label" for="telefone">Telefone</label>
                <div class="col-md-9 col-lg-10">
                    <input type="tel" name="telefone" id="telefone"
                           value="<?php echo check_array($c,'telefone'); ?>" class="form-control"/>
                </div>
            </div>

            <?php  ?>
                <div class="form-group row">
                    <label class="col-2 col-form-label" for="senha">Senha</label>
                    <div class="col-10">
                        <input type="password" name="senha" id="senha" class="form-control"/>
                    </div>
                </div>
            <?php  ?>
            <div class="form-group row">
                <label class="col-2 col-form-label" for="senha2">Confirmação de senha</label>
                <div class="col-10">
                    <input type="password" name="senha2" id="senha2" class="form-control"/>
                </div>
            </div>

            <?php include ABSPATH . '/views/_includes/botoes-form.php'; ?>
        </form>

    </div>
</div>