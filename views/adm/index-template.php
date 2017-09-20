<?php
$model->validate_form();
$observacoes = $model->getObservacoesNaoVistas();
?>

<h3>Observações recebidas enquanto estava ausente:</h3>

<form method="POST">
<table class="table">
    <thead>
        <tr>
            <th></th>
            <th>ID</th>
            <th>Data</th>
            <th>Descrição</th>
            <th>Colaborador</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($observacoes as $o):
            $c = $model->getColaboradorByCpf($o->getCpf());
        ?>
            <tr>
                <td><input type="checkbox" name="<?php  echo 'check-'.$o->getId(); ?>"/></td>
                <td><?php echo $o->getId(); ?></td>
                <td><a href="<?php echo HOME.'/exibir/observacao/'.$o->getId(); ?>"><?php echo $o->getData(); ?></a></td>
                <td><?php echo $o->getDescricao(); ?></td>
                <td><?php echo $c->getNome(); ?></td>
            </tr>
        <?php endforeach; ?>
    </tbody>

</table>
<button type="submit" name="enviar" class="btn btn-primary"><span class="glyphicon glyphicon-ok"></span> Marcar como lida</button>

</form>
<ul>

    <li><a href="<?php echo HOME; ?>/register/colaborador">Add Colaborador</a></li>

    <li><a href="<?php echo HOME; ?>/register/doador">Add Doador</a></li>

    <li><a href="<?php echo HOME; ?>/register/empresa">Add Empresa</a></li>

    <li><a href="<?php echo HOME; ?>/register/colaboracao">Add Colaboração</a></li>

    <li><a href="<?php echo HOME; ?>/register/doacao">Add Doação</a></li>

    <li><a href="<?php echo HOME; ?>/register/encaminhamento">Add Encaminhamento</a></li>

    <li><a href="<?php echo HOME; ?>/register/diaria">Registrar diária</a></li>

</ul>