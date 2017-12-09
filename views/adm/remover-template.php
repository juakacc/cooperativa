<?php
$model->validate_form();
?>

<div class="row">
    <div class="col">
        <h5>Confirmação de remoção</h5>
    </div>
</div>

<div class="row justify-content-center">

    <div class="col-sm col-md-4">
        <div class="row">
            <div class="col">
                <p>Deseja realmente excluir o(a)
                    <?php echo $model->form_data['tipo'] . ': ' . $model->form_data['nome']; ?>?
                </p>
            </div>
        </div><!-- Linha com titulo -->

        <form action="" method="POST">
            <div class="row">
                <div class="col">
                    <input type="submit" value="Sim" name="sim" id="sim" class="btn btn-success form-control"/>
                </div>
                <div class="col">
                    <a href="<?php echo $_SESSION['goto_url']; ?>" class="btn btn-warning form-control" id="nao">Não</a>
                </div>
            </div><!-- Linha do formulário -->
        </form>
    </div>
</div><!-- Linha com corpo do formulário -->
<script>
    $(document).getElementById("#sim").focus();
</script>
