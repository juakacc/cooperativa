<?php
$doacoes = DoadorDao::getDoacoesPorCpf($_SESSION['id']); // Pegar da sessão
?>

<h5>Doações realizadas</h5>

<table class="table table-bordered">
    <tr>
        <th>Data</th><th>Descrição</th>
    </tr>

    <?php foreach ($doacoes as $e): ?>
        <tr>
            <td><?php echo mostrar_data($e->getData()); ?></td>
            <td><?php echo $e->getDescricao(); ?></td>
        </tr>
    <?php endforeach; ?>
</table>