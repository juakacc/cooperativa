<?php
$empresas = EmpresaDao::getEmpresas();
$voltar = ($this->logado) ? HOME.'/'.$this->tipo : $_SESSION['goto_url'];
?>
<div class="row">
    <div class="col">
        <h5>Empresas</h5>
    </div>
    <div class="col">
        <a href="<?php echo $voltar; ?>" class="btn btn-dark">Voltar</a>
    </div>
</div>

<div class="row">
    <div class="col">
        <p>Quadro de empresas que recebem material da cooperativa</p>
    </div>
</div>

<div class="row justify-content-center">
    <div class="col-sm col-md-6">

        <?php if(!empty($empresas)): ?>

            <?php if(!$this->logado): ?>
                <table class="table table-bordered">
                    <tr><th>Razão</th><th>Recebimentos</th></tr>

                    <?php foreach($empresas as $e): ?>
                        <?php $count = EmpresaDao::getCountEncaminhamentosPorCnpj($e->getCnpj()); ?>
                        <tr>
                            <td><?php echo $e->getRazao(); ?></td>
                            <td><?php echo $count; ?></td>
                        </tr>
                    <?php endforeach; ?>
                </table>
            <?php else: ?>

                <table class="table table-bordered">
                    <tr><th>CNPJ</th><th>Razão</th><th>Opções</th></tr>

                    <?php foreach ($empresas as $e): ?>
                        <tr>
                            <td><?php echo mostrar_cnpj($e->getCnpj()); ?></td>
                            <td><?php echo $e->getRazao(); ?></td>
                            <td>
                                <a href="<?php echo HOME.'/editar/empresa/'.$e->getCnpj(); ?>">Editar</a>
                                <a href="<?php echo HOME.'/remover/index/empresa/'.$e->getCnpj(); ?>">Remover</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </table>
            <?php endif; ?>
        <?php else: ?>
            <p>Nenhuma empresa cadastrada.</p>
        <?php endif; ?>
    </div>
</div>
