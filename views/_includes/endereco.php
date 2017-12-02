<div class="address">
    <div class="form-group row">
        <label class="col-2 col-form-label">Rua</label>
        <div class="col-10">
            <input type="text" name="rua" value="<?php echo check_array($model->form_data,'rua'); ?>" class="form-control"/>
        </div>
    </div>
    <div class="form-group row">
        <label class="col-2 col-form-label">Nº</label>
        <div class="col-10">
            <input type="text" name="numero" value="<?php echo check_array($model->form_data,'numero'); ?>" class="form-control"/>
        </div>
    </div>
    <div class="form-group row">
        <label class="col-2 col-form-label">Bairro</label>
        <div class="col-10">
            <input type="text" name="bairro" value="<?php echo check_array($model->form_data,'bairro'); ?>" class="form-control"/>
        </div>
    </div>
    <div class="form-group row">
        <label class="col-2 col-form-label">Cidade</label>
        <div class="col-10">
            <input type="text" name="cidade" value="<?php echo check_array($model->form_data,'cidade'); ?>" class="form-control"/>
        </div>
    </div>
    <div class="form-group row">
        <label class="col-2 col-form-label">UF</label>
        <div class="col-10">
            <select name="uf" class="custom-select form-control">
                <?php include ABSPATH . '/views/_includes/estados.php'; ?>
            </select>
        </div>
    </div>
</div>