<?php
    $o = $model->getObservacaoById($this->parametros[0]);
    if (!$o) {
        header('Location: ' . $_SESSION['goto_url']);
        return;
    }
    $c = $model->getColaboradorByCpf($o->getCpf());
?>

<div class="row">
    <div class="col">
        <h5>Detalhes da observação</h5>
    </div>

    <div class="col">
        <a href="<?php echo $_SESSION['goto_url']; ?>" class="btn btn-dark">Voltar</a>
    </div>
</div>

<table class="table table-bordered">
    <tr>
        <th>Data</th>
        <th>Descrição</th>
        <th>Colaborador</th>
        <th>Endereço</th>
    </tr>
    <tr>
        <td><?php echo mostrar_data($o->getData()); ?></td>
        <td><?php echo $o->getDescricao(); ?></td>
        <td><?php echo $c->getNome(); ?></td>
        <td><?php echo $o->getLocal(); ?></td>
    </tr>
</table>