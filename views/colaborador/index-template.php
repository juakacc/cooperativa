<?php
$colaboracoes = ColaboradorDao::getColaboracoesPorCpf($_SESSION['id']);
$observacoes = ColaboradorDao::getObservacoesPorCpf($_SESSION['id']);
?>

<a href="<?php echo HOME; ?>/register/observacao" class="btn btn-success">Realizar observação</a>

<h5>Colaborações efetuadas</h5>

<?php if (!empty($colaboracoes)): ?>
    <table class="table table-bordered">
        <tr>
            <th>Data</th><th>Função</th><th>Descrição</th>
        </tr>

        <?php foreach ($colaboracoes as $c): ?>
            <tr>
                <td><?php echo mostrar_data($c->getData()); ?></td>
                <td><?php echo $c->getFuncao(); ?></td>
                <td><?php echo $c->getDescricao(); ?></td>
            </tr>
        <?php endforeach; ?>
    </table>
<?php else: ?>
    <div class="row justify-content-center">
        <div class="col" align="center">
            <p>Nenhuma colaboração efetuada</p>
        </div>
    </div>
<?php endif; ?>

<h5>Observações efetuadas</h5>

<?php if (!empty($observacoes)): ?>
    <table class="table table-bordered">
        <tr>
            <th>Data</th><th>Descrição</th><th>Local</th>
        </tr>

        <?php foreach ($observacoes as $c): ?>
            <tr>
                <td><?php echo mostrar_data($c->getData()); ?></td>
                <td><?php echo $c->getDescricao(); ?></td>
                <td><?php echo $c->getLocal(); ?></td>
            </tr>
        <?php endforeach; ?>
    </table>

<?php else: ?>
    <div class="row justify-content-center">
        <div class="col" align="center">
            <p>Nenhuma observação efetuada</p>
        </div>
    </div>
<?php endif; ?>
