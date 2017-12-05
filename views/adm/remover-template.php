<?php
$model->validate_form();
?>

<div class="row">
    <div class="col">
        <h5>Confirmação de remoção</h5>
    </div>
</div>

<div class="row justify-content-center">

    <div class="col-4">
        <div class="row">
            <div class="col">
                <p>Deseja realmente excluir <?php echo $model->form_data['tipo'] . ': ' . $model->form_data['nome']; ?>?</p>
            </div>
        </div><!-- Linha com titulo -->

        <form action="" method="POST">
            <div class="row">
                <div class="col">
                    <input type="submit" value="Sim" name="sim" class="btn btn-success"/>
                </div>
                <div class="col">
                    <input type="submit" value="Não" name="nao" class="btn btn-warning"/>
                </div>
            </div><!-- Linha do formulário -->
        </form>
    </div>
</div><!-- Linha com corpo do formulário -->
