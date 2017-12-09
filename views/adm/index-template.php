<?php
$model->validate_form();
$observacoes = ColaboradorDao::getObservacoesNaoVistas();
?>

<div class="row">
    <div class="col">
        <h5>Observações recebidas enquanto estava ausente:</h5>
    </div>
</div>

<div class="row justify-content-center">
    <div class="col-sm col-md-8">

        <?php include_once ABSPATH . '/views/_includes/mostrar-erros.php'; ?>

        <?php if (!empty($observacoes)): ?>
            <ul>
                <li>Clique sobre a data para ver os detalhes da observação</li>
                <li>Selecione as que deseja marcar como lida</li>
            </ul>

            <form method="POST">
                <table class="table table-bordered">
                    <tr><th></th><th>Data</th><th>Descrição</th><th>Colaborador</th></tr>

                    <?php foreach ($observacoes as $o): ?>
                        <?php $c = ColaboradorDao::getColaboradorPorCpf($o->getCpf()); ?>

                        <tr>
                            <td><input type="checkbox" name="<?php  echo 'check-'.$o->getId(); ?>" class="form-check"/></td>
                            <td><a href="<?php echo HOME.'/exibir/observacao/'.$o->getId(); ?>"><?php echo mostrar_data($o->getData()); ?></a></td>
                            <td><?php echo $o->getDescricao(); ?></td>
                            <td><?php echo $c->getNome(); ?></td>
                        </tr>
                    <?php endforeach; ?>
                </table>
                <button type="submit" class="btn btn-primary">Marcar como lida(s)</button>
            </form>

            <?php else: ?>
                <p>Nenhuma observação recebida</p>
        <?php endif; ?>
    </div>
</div>