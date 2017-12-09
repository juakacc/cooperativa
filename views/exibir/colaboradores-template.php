<?php
$colaboradores = ($this->logado) ? ColaboradorDao::getColaboradores()
    : ColaboradorDao::getColaboradores(true);
$voltar = ($this->logado) ? HOME.'/'.$this->tipo : $_SESSION['goto_url'];
?>

<div class="row">
    <div class="col">
        <h5>Colaboradores</h5>
    </div>
    <div class="col">
        <a href="<?php echo $voltar; ?>" class="btn btn-dark">Voltar</a>
    </div>
</div>

<div class="row">
    <div class="col">
        <p>Quadro de colaboradores que contribuem com a nossa cooperativa</p>
    </div>
</div>

<div class="row justify-content-center">
    <div class="col-sm col-md-6">

        <?php if (!empty($colaboradores)): ?>

            <?php if (!$this->logado or $this->tipo != 'administrador'): ?>

                <table class="table table-bordered">
                    <tr><th>Nome</th><th>Colaborações</th></tr>

                    <?php foreach($colaboradores as $c): ?>
                        <?php $count = ColaboradorDao::getCountColaboracoesPorCpf($c->getCpf()); ?>
                        <tr>
                            <td><?php echo $c->getNome(); ?></td>
                            <td><?php echo $count; ?></td>
                        </tr>
                    <?php endforeach; ?>
                </table> <!-- Exibição para usuário normais -->
            <?php else: ?>

                <table class="table table-bordered">
                    <tr><th>CPF</th><th>Nome</th><th>Opções</th></tr>

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
                </table> <!-- Exibição para administrador -->
            <?php endif; ?>

        <?php else: ?>
            <p>Nenhum colaborador cadastrado.</p>
        <?php endif;?>
    </div>
</div>