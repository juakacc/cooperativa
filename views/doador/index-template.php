<?php
$doacoes = $model->getDoacoesByCpf($_SESSION['id']); // Pegar da sessão
?>

<h3>Doações realizadas</h3>

<table class="table">
    <thead>
    <tr>
        <th>Data</th>
        <th>Descrição</th>
    </tr>
    </thead>

    <tbody>
    <?php foreach ($doacoes as $e): ?>
        <tr>
            <td><?php echo $e->getData(); ?></td>
            <td><?php echo $e->getDescricao(); ?></td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table>