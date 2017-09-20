<?php
$doacoes = $model->getDoacoes($data);
?>

<a href="<?php echo $_SESSION['goto_url']; ?>"><span class="glyphicon glyphicon-arrow-left"></span> Voltar</a>

<?php if (!empty($doacoes)): ?>

    <h3>Doações do dia: <?php echo $data; ?></h3>

<table class="table">
    <thead>
        <tr>
            <th>Data</th><th>Descrição</th><th>Doador</th>
        </tr>
    </thead>

    <tbody>
        <?php foreach ($doacoes as $d):
            $doador = $model->getDoadorByCpf($d->getCpf());
            ?>

            <tr>
                <td><?php echo $d->getData(); ?></td>
                <td><?php echo $d->getDescricao(); ?></td>
                <td><?php echo $doador->getNome(); ?></td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>

<?php else: ?>
    <h3>Nenhuma doação localizada para o dia <?php echo $data; ?>, tente novamente mais tarde.</h3>
<?php endif; ?>