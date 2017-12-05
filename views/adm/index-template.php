<?php
$model->validate_form();
$observacoes = ColaboradorDao::getObservacoesNaoVistas();
?>

<div class="row">
    <div class="col">
        <h5>Observações recebidas enquanto estava ausente:</h5>
    </div>
</div>
<div class="row">
    <div class="col">
        <ul>
            <li>Clique sobre a data para ver os detalhes da observação</li>
            <li>Selecione as que deseja marcar como lida</li>
        </ul>
    </div>
</div>

<?php if (!empty($observacoes)): ?>
    <form method="POST">
        <table class="table table-bordered">
            <tr>
                <th></th><th>Data</th><th>Descrição</th><th>Colaborador</th>
            </tr>

            <?php foreach ($observacoes as $o):
                $c = ColaboradorDao::getColaboradorPorCpf($o->getCpf());
                ?>
                <tr>
                    <td><input type="checkbox" name="<?php  echo 'check-'.$o->getId(); ?>" class="form-check"/></td>
                    <td><a href="<?php echo HOME.'/exibir/observacao/'.$o->getId(); ?>"><?php echo mostrar_data($o->getData()); ?></a></td>
                    <td><?php echo $o->getDescricao(); ?></td>
                    <td><?php echo $c->getNome(); ?></td>
                </tr>
            <?php endforeach; ?>
        </table>
        <button type="submit" name="enviar" class="btn btn-primary">Marcar como lidas</button>
    </form>

    <?php else: ?>
        <p>Nenhuma observação recebida</p>
<?php endif; ?>

<nav class="navbar navbar-expand">
    <div class="collapse navbar-collapse">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item">
                <a href="<?php echo HOME; ?>/register/diaria" class="nav-link btn btn-success">Registrar diária</a>
            </li>

            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown">
                    Adicionar
                </a>
                <div class="dropdown-menu">
                    <a href="<?php echo HOME; ?>/register/colaborador" class="dropdown-item">Adicionar Colaborador</a>
                    <a href="<?php echo HOME; ?>/register/doador" class="dropdown-item">Adicionar Doador</a>
                    <a href="<?php echo HOME; ?>/register/empresa" class="dropdown-item">Adicionar Empresa</a>
                    <a href="<?php echo HOME; ?>/register/colaboracao" class="dropdown-item">Adicionar Colaboração</a>
                    <a href="<?php echo HOME; ?>/register/doacao" class="dropdown-item">Adicionar Doação</a>
                    <a href="<?php echo HOME; ?>/register/encaminhamento" class="dropdown-item">Adicionar Encaminhamento</a>
                </div>
            </li><!-- Fim do dropdown adicionar -->

            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown">
                    Gerenciar
                </a>
                <div class="dropdown-menu">
                    <a href="<?php echo HOME; ?>/exibir/colaboradores" class="dropdown-item">Colaboradores</a>
                    <a href="<?php echo HOME; ?>/exibir/doadores" class="dropdown-item">Doadores</a>
                    <a href="<?php echo HOME; ?>/exibir/empresas" class="dropdown-item">Empresas</a>
                </div>
            </li><!-- Fim do dropdown gerenciar -->
        </ul>
    </div> <!-- Menus -->
</nav>

