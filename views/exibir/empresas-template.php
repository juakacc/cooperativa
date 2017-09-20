<?php
$empresas = $model->getEmpresas();
?>

<a href="<?php echo $_SESSION['goto_url']; ?>"><span class="glyphicon glyphicon-arrow-left"></span> Voltar</a>

<table class="table">
    <thead>
        <tr>
            <th>Razão</th><th>Recebimentos</th>
        </tr>
    </thead>
    <tbody>
    <?php foreach($empresas as $e):
        $count = $model->getCountEncaminhamentos($e->getCnpj());
    ?>
        <tr>
            <td><?php echo $e->getRazao(); ?></td>
            <td><?php echo $count; ?></td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table>
