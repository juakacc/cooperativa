<?php
$colaboradores = $model->getColaboradores();
?>

<a href="<?php echo $_SESSION['goto_url']; ?>"><span class="glyphicon glyphicon-arrow-left"></span> Voltar</a>

<table class="table">
    <thead>
    <tr>
        <th>Nome</th><th>Colaborações</th>
    </tr>
    </thead>
    <tbody>
    <?php foreach($colaboradores as $c):
        $count = $model->getCountColaboracoes($c->getCpf());
        ?>
        <tr>
            <td><?php echo $c->getNome(); ?></td>
            <td><?php echo $count; ?></td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table>
