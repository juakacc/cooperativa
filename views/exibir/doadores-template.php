<?php
$doadores = $model->getDoadores();
?>

<a href="<?php echo $_SESSION['goto_url']; ?>"><span class="glyphicon glyphicon-arrow-left"></span> Voltar</a>

<table class="table">
    <thead>
    <tr>
        <th>Nome</th><th>Doações</th>
    </tr>
    </thead>
    <tbody>
    <?php foreach($doadores as $d):
        $count = $model->getCountDoacoes($d->getCpf());
        ?>
        <tr>
            <td><?php echo $d->getNome(); ?></td>
            <td><?php echo $count; ?></td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table>
