<?php
$encaminhamentos = $model->getEncaminhamentos($data);
?>

<div class="row">
    <div class="col">
        <h5>Encaminhamentos do dia <?php echo mostrar_data($data); ?></h5>
    </div>

    <div class="col">
        <a href="<?php echo $_SESSION['goto_url']; ?>" class="btn btn-dark">Voltar</a>
    </div>
</div>

<?php if (!empty($encaminhamentos)): ?>

    <table class="table table-bordered">
        <tr>
            <th>Data</th><th>Descrição</th><th>Empresa</th>
        </tr>

        <?php foreach ($encaminhamentos as $e):
                $empresa = $model->getEmpresaByCnpj($e->getCnpj());
        ?>
            <tr>
                <td><?php echo mostrar_data($e->getData()); ?></td>
                <td><?php echo $e->getDescricao(); ?></td>
                <td><?php echo $empresa->getRazao(); ?></td>
            </tr>
        <?php endforeach; ?>
    </table>

<?php else: ?>

    <div class="row">
        <div class="col" align="center">
            <p>Nenhum encaminhamento realizado.</p>
        </div>
    </div>
<?php endif; ?>
