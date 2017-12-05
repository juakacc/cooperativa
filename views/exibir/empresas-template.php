<?php
$empresas = EmpresaDao::getEmpresas();
?>
<div class="row">
    <div class="col">
        <h5>Empresas</h5>
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

<?php if(count($empresas) > 0): ?>

    <?php if(!$this->logado): ?>
        <table class="table table-bordered">
                <tr>
                    <th>Razão</th><th>Recebimentos</th>
                </tr>
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
            <tr>
                <th>CNPJ</th><th>Razão</th><th>Opções</th>
            </tr>
            <?php foreach ($empresas as $e): ?>
                <tr>
                    <td><?php echo mostrar_cnpj($e->getCnpj()); ?></td>
                    <td><?php echo $e->getRazao(); ?></td>
                    <td>
                        <ul>
                            <li><a href="<?php echo HOME.'/editar/empresa/'.$e->getCnpj(); ?>">Editar</a></li>
                            <li><a href="<?php echo HOME.'/remover/index/empresa/'.$e->getCnpj(); ?>">Remover</a></li>
                        </ul>
                    </td>
                </tr>
            <?php endforeach; ?>
        </table>
    <?php endif; ?>

<?php else: ?>

    <div class="row">
        <div class="col" align="center">
            <p>Nenhuma empresa cadastrada.</p>
        </div>
    </div>

<?php endif; ?>
