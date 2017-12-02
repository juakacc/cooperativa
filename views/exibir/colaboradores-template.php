<?php
$colaboradores = $model->getColaboradores();
?>

<div class="row">
    <div class="col">
        <h5>Colaboradores</h5>
    </div>

    <div class="col">
        <a href="<?php echo $_SESSION['goto_url']; ?>" class="btn btn-dark">Voltar</a>
    </div>
</div>

<?php if (count($colaboradores) > 0): ?>
    <table class="table table-bordered">
        <tr>
            <th>Nome</th><th>Colaborações</th>
        </tr>

        <?php foreach($colaboradores as $c): ?>
           <?php $count = $model->getCountColaboracoes($c->getCpf()); ?>
            <tr>
                <td><?php echo $c->getNome(); ?></td>
                <td><?php echo $count; ?></td>
            </tr>
        <?php endforeach; ?>
    </table>

    <table class="table table-bordered">
        <tr>
            <th>CPF</th><th>Nome</th><th>Opções</th>
        </tr>

        <?php foreach($colaboradores as $c): ?>
            <tr>
                <td><?php echo $c->getCPF(); ?></td>
                <td><?php echo $c->getNome(); ?></td>
                <td>
                    <a href="">Editar</a>
                    <a href="">Remover</a>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>
<?php else: ?>

    <div class="row">
        <div class="col" align="center">
            <p>Nenhum colaborador cadastrado.</p>
        </div>
    </div>

<?php endif;?>
