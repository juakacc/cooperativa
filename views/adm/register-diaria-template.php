<?php
$model->validate_register_form();
$colaboradores = $model->getColaboradores();
?>

<h3>Registro de diária...</h3>

<?php foreach ($model->form_msg as $erro): ?>
    <p class="erro"><?php echo $erro; ?></p>
<?php endforeach; ?>

<form method="POST">
    <table class="table">
        <tr>
            <td><label>Colaborador: </label></td>
            <td>
                <select name="cpf" class="form-control">
                    <?php foreach ($colaboradores as $c): ?>
                        <option value="<?php echo $c->getCpf(); ?>"><?php echo $c->getNome(); ?></option>
                    <?php endforeach; ?>
                </select>
            </td>
        </tr>

        <tr>
            <td><label>Data: </label></td>
            <td><input type="date" name="data" value="<?php echo check_array($this->form_data, 'data'); ?>" class="form-control"/></td>
        </tr>

        <?php include ABSPATH . '/views/_includes/botoes-form.php'; ?>
    </table>
</form>