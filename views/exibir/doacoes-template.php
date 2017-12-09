<?php
$doacoes = DoadorDao::getDoacoesPorData($data);
$voltar = ($this->logado) ? HOME.'/'.$this->tipo : $_SESSION['goto_url'];
?>

<div class="row">
    <div class="col">
        <h5>Doações do dia <?php echo mostrar_data($data); ?></h5>
    </div>

    <div class="col">
        <a href="<?php echo $voltar; ?>" class="btn btn-dark">Voltar</a>
    </div>
</div>

<div class="row justify-content-center">
    <div class="col-sm col-md-6">

        <?php if (!empty($doacoes)): ?>

            <table class="table table-bordered">
                <tr><th>Data</th><th>Descrição</th><th>Doador</th></tr>

                <?php foreach ($doacoes as $d): ?>
                    <?php $doador = DoadorDao::getDoadorPorCpf($d->getCpf()); ?>

                    <tr>
                        <td><?php echo mostrar_data($d->getData()); ?></td>
                        <td><?php echo $d->getDescricao(); ?></td>
                        <td><?php echo $doador->getNome(); ?></td>
                    </tr>
                <?php endforeach; ?>
            </table>
        <?php else: ?>
            <p>Nenhuma doação realizada.</p>
        <?php endif; ?>
    </div>
</div>
