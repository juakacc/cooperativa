<?php
$encaminhamento = $model->getEncaminhamentosByCnpj('17882151000113'); // Pegar da sessão
?>

<h3>Encaminhamentos recebidos</h3>

<table class="table">
    <thead>
        <tr>
            <th>Data</th>
            <th>Descrição</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($encaminhamento as $e): ?>
            <tr>
                <td><?php echo $e->getData(); ?></td>
                <td><?php echo $e->getDescricao(); ?></td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>