<?php
$encaminhamentos = EmpresaDao::getEncaminhamentosPorData($data);
$voltar = ($this->logado) ? HOME.'/'.$this->tipo : $_SESSION['goto_url'];
?>

<div class="row">
    <div class="col">
        <h5>Encaminhamentos do dia <?php echo mostrar_data($data); ?></h5>
    </div>

    <div class="col">
        <a href="<?php echo $voltar; ?>" class="btn btn-dark">Voltar</a>
    </div>
</div>

<div class="row justify-content-center">
    <div class="col-sm col-md-6">

        <?php if (!empty($encaminhamentos)): ?>

            <table class="table table-bordered">
                <tr><th>Data</th><th>Descrição</th><th>Empresa</th></tr>

                <?php foreach ($encaminhamentos as $e): ?>
                    <?php $empresa = EmpresaDao::getEmpresaByCnpj($e->getCnpj()); ?>
                    <tr>
                        <td><?php echo mostrar_data($e->getData()); ?></td>
                        <td><?php echo $e->getDescricao(); ?></td>
                        <td><?php echo $empresa->getRazao(); ?></td>
                    </tr>
                <?php endforeach; ?>
            </table>

        <?php else: ?>
            <p>Nenhum encaminhamento realizado.</p>
        <?php endif; ?>
    </div>
</div>