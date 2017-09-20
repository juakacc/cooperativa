<?php
$encaminhamentos = $model->getEncaminhamentos($data);
?>

<a href="<?php echo $_SESSION['goto_url']; ?>"><span class="glyphicon glyphicon-arrow-left"></span> Voltar</a>

<?php if (!empty($encaminhamentos)): ?>

    <h3>Encaminhamentos do dia: <?php echo $data; ?></h3>

<table class="table">
    <thead>
    <tr>
        <th>Data</th><th>Descrição</th><th>Empresa</th>
    </tr>
    </thead>

    <tbody>
    <?php foreach ($encaminhamentos as $e):
        $empresa = $model->getEmpresaByCnpj($e->getCnpj());
        ?>

        <tr>
            <td><?php echo $e->getData(); ?></td>
            <td><?php echo $e->getDescricao(); ?></td>
            <td><?php echo $empresa->getRazao(); ?></td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table>

<?php else: ?>
<h3>Nenhum encaminhamento localizado para o dia <?php echo $data; ?>, tente novamente mais tarde.</h3>
<?php endif; ?>