<?php
$doadores = ($this->logado) ? DoadorDao::getDoadores()
        : DoadorDao::getDoadores(true);
$voltar = ($this->logado) ? HOME.'/'.$this->tipo : $_SESSION['goto_url'];
?>

<div class="row">
    <div class="col">
        <h5>Doadores</h5>
    </div>
    <div class="col">
        <a href="<?php echo $voltar; ?>" class="btn btn-dark">Voltar</a>
    </div>
</div>

<div class="row">
    <div class="col">
        Quadro de doadores que doam para a nossa cooperativa
    </div>
</div>

<div class="row justify-content-center">
    <div class="col-sm col-md-6">

        <?php if (!empty($doadores)): ?>


            <?php if (!$this->logado): ?>

                <table class="table table-bordered">
                    <tr><th>Nome</th><th>Doações</th></tr>

                    <?php foreach($doadores as $d): ?>
                        <?php $count = DoadorDao::getCountDoacoesPorCpf($d->getCpf()); ?>
                        <tr>
                            <td><?php echo $d->getNome(); ?></td>
                            <td><?php echo $count; ?></td>
                        </tr>
                    <?php endforeach; ?>
                </table>
            <?php else: ?>

                <table class="table table-bordered">
                    <tr><th>CPF</th><th>Nome</th><th>Opções</th></tr>

                    <?php foreach($doadores as $d): ?>
                        <tr>
                            <td><?php echo mostrar_cpf($d->getCPF()); ?></td>
                            <td><?php echo $d->getNome(); ?></td>
                            <td>
                                <a href="<?php echo HOME.'/editar/doador/' . $d->getCpf(); ?>">Editar</a>
                                <a href="<?php echo HOME.'/remover/index/doador/' . $d->getCpf(); ?>">Remover</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </table>
            <?php endif; ?>
        <?php else: ?>
            <p>Nenhum doador cadastrado.</p>
        <?php endif;?>
    </div>
</div>