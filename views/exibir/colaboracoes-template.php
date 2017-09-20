<?php
$colaboracoes = $model->getColaboracoes($data);
?>

<a href="<?php echo $_SESSION['goto_url']; ?>"><span class="glyphicon glyphicon-arrow-left"></span> Voltar</a>

<?php if (!empty($colaboracoes)): ?>

    <h3>Colaborações do dia: <?php echo $data; ?></h3>

<table class="table">
    <thead>
    <tr>
        <th>Data</th><th>Função</th><th>Descrição</th><th>Doador</th>
    </tr>
    </thead>

    <tbody>
    <?php foreach ($colaboracoes as $c):
        $colaborador = $model->getColaboradorByCpf($c->getCpf());
        ?>

        <tr>
            <td><?php echo $c->getData(); ?></td>
            <td><?php echo $c->getFuncao(); ?></td>
            <td><?php echo $c->getDescricao(); ?></td>
            <td><?php echo $colaborador->getNome(); ?></td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table>

<?php else: ?>
<h3>Nenhuma colaboração localizada para o dia <?php echo $data; ?>, tente novamente mais tarde.</h3>
<?php endif; ?>