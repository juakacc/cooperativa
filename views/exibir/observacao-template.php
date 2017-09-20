<?php
    $o = $model->getObservacaoById($this->parametros[0]);
    if (!$o) {
        header('Location: ' . $_SESSION['goto_url']);
        return;
    }
    $c = $model->getColaboradorByCpf($o->getCpf());
?>

<a href="<?php echo $_SESSION['goto_url']; ?>" class="btn btn-primary"><span class="glyphicon glyphicon-arrow-left"></span> Voltar</a>

<table class="table">
    <thead>
    <tr>
        <th>ID</th>
        <th>Data</th>
        <th>Descrição</th>
        <th>Colaborador</th>
        <th>Endereço</th>
    </tr>
    </thead>
    <tbody>
        <tr>
            <td><?php echo $o->getId(); ?></td>
            <td><?php echo $o->getData(); ?></td>
            <td><?php echo $o->getDescricao(); ?></td>
            <td><?php echo $c->getNome(); ?></td>
            <td><?php echo $o->getLocal(); ?></td>
        </tr>
    </tbody>

</table>