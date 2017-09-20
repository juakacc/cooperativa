<?php
$model->validate_register_form();
?>

<h3>Realizar um observação</h3>

<?php foreach ($model->form_msg as $erro): ?>
    <p class="erro"><?php echo $erro; ?></p>
<?php endforeach; ?>

<form method="POST">

    <table class="table">
        <p>Localização:</p>

        <?php if($cpf == '00000000000'): ?>
            <input type="hidden" name="cpf" value="<?php echo $cpf; ?>"/>

            <?php else: ?>
            <tr>
                <td>CPF:</td>
                <td><input type="text" name="cpf" value="<?php echo $cpf; ?>" readonly/></td>
            </tr>
        <?php endif; ?>

        <?php include ABSPATH . '/views/_includes/endereco.php'; ?>

        <tr>
            <td>Descrição:</td>
            <td><textarea name="descricao" class="form-control"><?php echo check_array($model->form_data, 'descricao')?></textarea></td>
        </tr>

        <?php include ABSPATH . '/views/_includes/botoes-form.php'; ?>
    </table>
</form>