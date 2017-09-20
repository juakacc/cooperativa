<?php
$model->validarLogin();
?>

<h2>LOGIN</h2>

<?php foreach ($model->form_msg as $e): ?>
    <p class="erro"><?php echo $e; ?></p>
<?php endforeach; ?>

<form method="POST">
    <p><input type="radio" name="tipo" value="administrador" checked />Admin</p>
    <p><input type="radio" name="tipo" value="colaborador"/>Colaborador</p>
    <p><input type="radio" name="tipo" value="doador"/>Doador</p>
    <p><input type="radio" name="tipo" value="empresa"/>Empresa</p>

    <input type="text" placeholder="CPF/CNPJ" name="ide" value="<?php echo check_array($model->form_data, 'cpf'); ?>"  class="form-control"/>
    <input type="password" placeholder="Password" name="senha" class="form-control"/>
    
    <input type="submit" value="Entrar" class="btn btn-success"/>
    <input type="submit" value="Cancelar" name="cancelar" class="btn btn-danger"/>
</form>

