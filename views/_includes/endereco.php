<div class="address">
    <div class="form-group row">
        <label class="col-2 col-form-label" for="rua">Rua</label>
        <div class="col-10">
            <input type="text" name="rua" id="rua"
                   value="<?php echo check_array($model->form_data,'rua'); ?>" class="form-control"/>
        </div>
    </div>
    <div class="form-group row">
        <label class="col-2 col-form-label" for="numero">Nº</label>
        <div class="col-10">
            <input type="text" name="numero" id="numero"
                   value="<?php echo check_array($model->form_data,'numero'); ?>" class="form-control"/>
        </div>
    </div>
    <div class="form-group row">
        <label class="col-2 col-form-label" for="bairro">Bairro</label>
        <div class="col-10">
            <input type="text" name="bairro" id="bairro"
                   value="<?php echo check_array($model->form_data,'bairro'); ?>" class="form-control"/>
        </div>
    </div>
    <div class="form-group row">
        <label class="col-2 col-form-label" for="cidade">Cidade</label>
        <div class="col-10">
            <input type="text" name="cidade" id="cidade"
                   value="<?php echo check_array($model->form_data,'cidade'); ?>" class="form-control"/>
        </div>
    </div>
    <div class="form-group row">
        <label class="col-2 col-form-label" for="uf">UF</label>
        <div class="col-10">
            <select name="uf" id="uf" class="custom-select form-control">
                <?php include ABSPATH . '/views/_includes/estados.php'; ?>
            </select>
        </div>
    </div>
</div>