<?php
$colaboradores = ColaboradorDao::getColaboradores();
?>

<div class="row">
    <div class="col">
        <h5>Colaboradores</h5>
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

<?php if (count($colaboradores) > 0): ?>

    <?php if (!$this->logado): ?>

        <table class="table table-bordered">
            <tr>
                <th>Nome</th><th>Colaborações</th>
            </tr>

            <?php foreach($colaboradores as $c): ?>
               <?php $count = ColaboradorDao::getCountColaboracoesPorCpf($c->getCpf()); ?>
                <tr>
                    <td><?php echo $c->getNome(); ?></td>
                    <td><?php echo $count; ?></td>
                </tr>
            <?php endforeach; ?>
        </table>
    <?php else: ?>

        <table class="table table-bordered">
            <tr>
                <th>CPF</th><th>Nome</th><th>Opções</th>
            </tr>

            <?php foreach($colaboradores as $c): ?>
                <tr>
                    <td><?php echo mostrar_cpf($c->getCpf()); ?></td>
                    <td><?php echo $c->getNome(); ?></td>
                    <td>
                        <a href="<?php echo HOME.'/editar/colaborador/' . $c->getCpf(); ?>">Editar</a>
                        <a href="<?php echo HOME.'/remover/index/colaborador/' . $c->getCpf(); ?>">Remover</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </table>
    <?php endif; ?>

<?php else: ?>

    <div class="row">
        <div class="col" align="center">
            <p>Nenhum colaborador cadastrado.</p>
        </div>
    </div>

<?php endif;?>
