<?php
$colaboracoes = $model->getColaboracoesByCpf($_SESSION['id']);
$observacoes = $model->getObservacoesByCpf($_SESSION['id']);

?>

<a href="<?php echo HOME; ?>/register/observacao">Realizar observação</a>

<h3>Colaborações efetuadas</h3>

<table class="table">
    <thead>
        <tr>
            <th>Data</th>
            <th>Função</th>
            <th>Descrição</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($colaboracoes as $c): ?>
            <tr>
                <td><?php echo $c->getData(); ?></td>
                <td><?php echo $c->getFuncao(); ?></td>
                <td><?php echo $c->getDescricao(); ?></td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>

<h3>Observações efetuadas</h3>

<table class="table">
    <thead>
    <tr>
        <th>Data</th>
        <th>Descrição</th>
        <th>Local</th>
    </tr>
    </thead>
    <tbody>
    <?php foreach ($observacoes as $c): ?>
        <tr>
            <td><?php echo $c->getData(); ?></td>
            <td><?php echo $c->getDescricao(); ?></td>
            <td><?php echo $c->getLocal(); ?></td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table>

Colocar quantidade de faltas

<?php //include ABSPATH . '/views/observacao-template.php'; ?>
