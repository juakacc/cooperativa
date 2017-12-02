<?php
$doacoes = $model->getDoacoes($data);
?>

<div class="row">
    <div class="col">
        <h5>Doações do dia <?php echo mostrar_data($data); ?></h5>
    </div>

    <div class="col">
        <a href="<?php echo $_SESSION['goto_url']; ?>" class="btn btn-dark">Voltar</a>
    </div>
</div>

<?php if (!empty($doacoes)): ?>

<table class="table table-bordered">
        <tr>
            <th>Data</th><th>Descrição</th><th>Doador</th>
        </tr>
        <?php foreach ($doacoes as $d):
            $doador = $model->getDoadorByCpf($d->getCpf());
            ?>

            <tr>
                <td><?php echo mostrar_data($d->getData()); ?></td>
                <td><?php echo $d->getDescricao(); ?></td>
                <td><?php echo $doador->getNome(); ?></td>
            </tr>
        <?php endforeach; ?>
</table>

<?php else: ?>

    <div class="row">
        <div class="col" align="center">
            <p>Nenhuma doação realizada.</p>
        </div>
    </div>
<?php endif; ?>
