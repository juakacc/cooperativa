<?php
    $model->validate_register_form();
    $c = $model->form_data;
?>

<p>Cadastro de <?php echo $tipo; ?></p>

<?php foreach ($model->form_msg as $erro): ?>
    <p class="erro"><?php echo $erro; ?></p>
<?php endforeach; ?>

<form method="POST">
    <table class="table">
        <tr>
            <td>CPF:</td>
            <td><input type="text" name="cpf" value="<?php echo check_array($c,'cpf'); ?>" placeholder="Apenas números" class="form-control"/></td>
        </tr>

        <tr>
            <td>Nome:</td>
            <td><input type="text" name="nome" value="<?php echo check_array($c,'nome'); ?>" class="form-control"/></td>
        </tr>

        <?php include ABSPATH . '/views/_includes/endereco.php'; ?>

        <tr>
            <td>Telefone:</td>
            <td><input type="text" name="telefone" value="<?php echo check_array($c,'telefone'); ?>" placeholder="Apenas números" class="form-control"/></td>
        </tr>

        <tr>
            <td>Senha: </td>
            <td><input type="password" name="senha" class="form-control"/></td>
        </tr>

        <?php include ABSPATH . '/views/_includes/botoes-form.php'; ?>
    </table>
</form>