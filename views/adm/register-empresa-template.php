<?php
$model->validate_register_form();
?>
<h1>Cooperativa: União</h1>

<p>Cadastro de Empresa receptora</p>

<?php foreach ($model->form_msg as $erro): ?>
    <p class="erro"><?php echo $erro; ?></p>
<?php endforeach; ?>

<form method="POST">
    <table class="table">
        <tr>
            <td>CNPJ:</td>
            <td><input type="text" name="cnpj" value="<?php echo check_array($model->form_data,'cnpj'); ?>" placeholder="Apenas números"/></td>
        </tr>

        <tr>
            <td>Razão social:</td>
            <td><input type="text" name="razao" value="<?php echo check_array($model->form_data,'razao'); ?>"/></td>
        </tr>

        <?php include ABSPATH . '/views/_includes/endereco.php'; ?>

        <tr>
            <td>Telefone:</td>
            <td><input type="text" name="telefone" value="<?php echo check_array($model->form_data,'telefone'); ?>" placeholder="Apenas números"/></td>
        </tr>

<!--        <tr>-->
<!--            <td>Senha: </td>-->
<!--            <td><input type="password" name="senha" /></td>-->
<!--        </tr>-->

        <?php include ABSPATH . '/views/_includes/botoes-form.php'; ?>

    </table>
</form>

