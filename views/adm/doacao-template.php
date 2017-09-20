<?php 
$model->validate_register_form();
$doadores = $model->getDoadores();
?>

<h1>Registrar doação</h1>

<?php foreach ($model->form_msg as $erro): ?>
    <p class="erro"><?php echo $erro; ?></p>
<?php endforeach; ?>

<form method="POST">
    <table class="table">
        <tr>
            <td>Doador: </td>
            <td>
                <select name="cpf" class="form-control">
                    <?php foreach ($doadores as $d): ?>
                        <option value="<?php echo $d->getCpf(); ?>"><?php echo $d->getNome(); ?></option>
                    <?php endforeach; ?>
                </select>
            </td>
        </tr>

        <tr>
            <td></td>
            <td><a href="<?php $_SESSION['goto_url'] = HOME . '/register/doacao'; echo HOME; ?>/register/doador">Add Doador</a></td>
        </tr>

        <tr>
            <td>Data: </td>
            <td><input type="date" name="data" value="<?php echo check_array($model->form_data, 'data'); ?>" class="form-control"/></td>
        </tr>
        
        <tr>
            <td>Descrição: </td>
            <td><textarea name="descricao" class="form-control"><?php echo check_array($model->form_data, 'descricao'); ?></textarea></td>
        </tr>

        <?php include ABSPATH . '/views/_includes/botoes-form.php'; ?>
    </table>
</form>