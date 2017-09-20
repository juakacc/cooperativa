<tr>
    <td>Rua:</td>
    <td><input type="text" name="rua" value="<?php echo check_array($model->form_data,'rua'); ?>" class="form-control"/></td>
</tr>

<tr>
    <td>Nº:</td>
    <td><input type="text" name="numero" value="<?php echo check_array($model->form_data,'numero'); ?>" class="form-control"/></td>
</tr>

<tr>
    <td>Bairro:</td>
    <td><input type="text" name="bairro" value="<?php echo check_array($model->form_data,'bairro'); ?>" class="form-control"/></td>
</tr>

<tr>
    <td>Cidade:</td>
    <td><input type="text" name="cidade" value="<?php echo check_array($model->form_data,'cidade'); ?>" class="form-control"/></td>
</tr>

<tr>
    <td>UF:</td>
    <td><select name="uf" class="form-control">
            <?php include ABSPATH . '/views/_includes/estados.php'; ?>
        </select>
    </td>
</tr>