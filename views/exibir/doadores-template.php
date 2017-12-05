<?php
$doadores = DoadorDao::getDoadores();
?>

<div class="row">
    <div class="col">
        <h5>Doadores</h5>
    </div>

    <div class="col">
        <a href="<?php echo $_SESSION['goto_url']; ?>" class="btn btn-dark">Voltar</a>
    </div>
</div>

    <!-- No caso de remoção -->
<?php if (isset($_SESSION['removido'])): ?>
    <?php unset($_SESSION['removido']); ?>
    <div class="row">
        <div class="col">
            <p>Remoção efetuada com sucesso!</p>
        </div>
    </div>
<?php endif; ?>

<?php if (count($doadores) > 0): ?>

    <?php if (!$this->logado): ?>

        <table class="table table-bordered">
            <tr>
                <th>Nome</th><th>Doações</th>
            </tr>

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
            <tr>
                <th>CPF</th><th>Nome</th><th>Opções</th>
            </tr>

            <?php foreach($doadores as $d): ?>
                <tr>
                    <td><?php echo mostrar_cpf($d->getCPF()); ?></td>
                    <td><?php echo $d->getNome(); ?></td>
                    <td>
                        <ul>
                        <li><a href="<?php echo HOME.'/editar/doador/' . $d->getCpf(); ?>">Editar</a></li>
                        <li><a href="<?php echo HOME.'/remover/index/doador/' . $d->getCpf(); ?>">Remover</a></li>
                        </ul>
                    </td>
                </tr>
            <?php endforeach; ?>
        </table>
    <?php endif; ?>

    <?php else: ?>

    <div class="row">
        <div class="col" align="center">
            <p>Nenhum doador cadastrado.</p>
        </div>
    </div>

<?php endif;?>