<?php
$model->validate_register_form();
$encaminhamentos = $model->getEmpresas();
?>

<h3>Realizar destinação</h3>

<?php foreach ($model->form_msg as $erro): ?>
    <p class="erro"><?php echo $erro; ?></p>
<?php endforeach; ?>

<form method="POST">
    <table class="table">
        <tr>
            <td>Empresa:</td>
            <td><select name="cnpj" class="form-control">
                    <?php foreach ($encaminhamentos as $e): ?>
                        <option value="<?php echo $e->getCnpj(); ?>"><?php echo $e->getRazao(); ?></option>
                    <?php endforeach; ?>
            </select></td>
        </tr>

        <tr>
            <td></td>
            <td><a href="<?php $_SESSION['goto_url'] = HOME . '/register/encaminhamento'; echo HOME; ?>/register/empresa">Add empresa</a></td>
        </tr>

        <tr>
            <td>Data</td>
            <td><input type="date" name="data" value="<?php echo check_array($model->form_data, 'data'); ?>" class="form-control"/></td>
        </tr>

        <tr>
            <td>Descrição:</td>
            <td><textarea name="descricao" class="form-control"><?php echo check_array($model->form_data, 'descricao'); ?></textarea></td>
        </tr>

        <?php include ABSPATH . '/views/_includes/botoes-form.php'; ?>
    </table>
