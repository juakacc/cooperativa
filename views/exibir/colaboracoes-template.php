<?php
$colaboracoes = ColaboradorDao::getColaboracoesPorData($data);
?>

<div class="row">
    <div class="col">
        <h5>Colaborações do dia <?php echo mostrar_data($data); ?></h5>
    </div>

    <div class="col">
        <a href="<?php echo $_SESSION['goto_url']; ?>" class="btn btn-dark">Voltar</a>
    </div>
</div>

<?php if (!empty($colaboracoes)): ?>

    <table class="table table-bordered">
        <tr>
            <th>Data</th><th>Função</th><th>Descrição</th><th>Doador</th>
        </tr>
        <?php foreach ($colaboracoes as $c):
                $colaborador = ColaboradorDao::getColaboradorPorCpf($c->getCpf());
        ?>

            <tr>
                <td><?php echo mostrar_data($c->getData()); ?></td>
                <td><?php echo $c->getFuncao(); ?></td>
                <td><?php echo $c->getDescricao(); ?></td>
                <td><?php echo $colaborador->getNome(); ?></td>
            </tr>
        <?php endforeach; ?>
    </table>

<?php else: ?>
    <div class="row">
        <div class="col" align="center">
            <p>Nenhuma colaboração realizada.</p>
        </div>
    </div>
<?php endif; ?>