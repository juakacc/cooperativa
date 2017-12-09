<?php
$colaboracoes = ColaboradorDao::getColaboracoesPorData($data);
$voltar = ($this->logado) ? HOME.'/'.$this->tipo : $_SESSION['goto_url'];
?>

<div class="row">
    <div class="col">
        <h5>Colaborações do dia <?php echo mostrar_data($data); ?></h5>
    </div>

    <div class="col">
        <a href="<?php echo $voltar; ?>" class="btn btn-dark">Voltar</a>
    </div>
</div>

<div class="row justify-content-center">
    <div class="col-sm col-md-6">

        <?php if (!empty($colaboracoes)): ?>

            <table class="table table-bordered">
                <tr><th>Data</th><th>Função</th><th>Descrição</th><th>Colaborador</th></tr>

                <?php foreach ($colaboracoes as $c): ?>
                    <?php $colaborador = ColaboradorDao::getColaboradorPorCpf($c->getCpf()); ?>

                    <tr>
                        <td><?php echo mostrar_data($c->getData()); ?></td>
                        <td><?php echo $c->getFuncao(); ?></td>
                        <td><?php echo $c->getDescricao(); ?></td>
                        <td><?php echo $colaborador->getNome(); ?></td>
                    </tr>
                <?php endforeach; ?>
            </table>

        <?php else: ?>
            <p>Nenhuma colaboração realizada.</p>
        <?php endif; ?>
    </div>
</div>
