<?php
$doadores = $model->getDoadores();
?>

<div class="row">
    <div class="col">
        <h5>Doadores</h5>
    </div>

    <div class="col">
        <a href="<?php echo $_SESSION['goto_url']; ?>" class="btn btn-dark">Voltar</a>
    </div>
</div>

<?php if (count($doadores) > 0): ?>

    <table class="table table-bordered">
        <tr>
            <th>Nome</th><th>Doações</th>
        </tr>

        <?php foreach($doadores as $d): ?>
            <?php $count = $model->getCountDoacoes($d->getCpf()); ?>
            <tr>
                <td><?php echo $d->getNome(); ?></td>
                <td><?php echo $count; ?></td>
            </tr>
        <?php endforeach; ?>
    </table>

    <table class="table table-bordered">
        <tr>
            <th>CPF</th><th>Nome</th><th>Opções</th>
        </tr>

        <?php foreach($doadores as $d): ?>
            <tr>
                <td><?php echo $d->getCPF(); ?></td>
                <td><?php echo $d->getNome(); ?></td>
                <td>
                    <ul>
                    <li><a href="">Editar</a></li>
                    <li><a href="">Remover</a></li>
                    </ul>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>

    <?php else: ?>

    <div class="row">
        <div class="col" align="center">
            <p>Nenhum doador cadastrado.</p>
        </div>
    </div>

<?php endif;?>