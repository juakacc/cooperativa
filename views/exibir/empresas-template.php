<?php
$empresas = $model->getEmpresas();
?>
<div class="row">
    <div class="col">
        <h5>Empresas</h5>
    </div>

    <div class="col">
        <a href="<?php echo $_SESSION['goto_url']; ?>" class="btn btn-dark">Voltar</a>
    </div>
</div>

<?php if (count($empresas) > 0): ?>
    <table class="table table-bordered">
            <tr>
                <th>Razão</th><th>Recebimentos</th>
            </tr>
        <?php foreach($empresas as $e):
            $count = $model->getCountEncaminhamentos($e->getCnpj());
        ?>
            <tr>
                <td><?php echo $e->getRazao(); ?></td>
                <td><?php echo $count; ?></td>
            </tr>
        <?php endforeach; ?>
    </table>

    <?php else: ?>

    <div class="row">
        <div class="col" align="center">
            <p>Nenhuma empresa cadastrada.</p>
        </div>
    </div>

<?php endif;?>
