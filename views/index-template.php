<?php
$result = $model->get_dados();
?>

<p>Fique por dentro do nosso trabalho</p>

<?php foreach ($model->form_msg as $e): ?>
    <p class="erro"><?php echo $e; ?></p>
<?php endforeach; ?>

<form method="POST">
    <input type="date" name="data" value="<?php echo check_array($model->form_data, 'data'); ?>" class="form-control"/>
    <button type="submit" class="btn btn-primary"><span class="glyphicon glyphicon-search"></span> Pesquisar</button>
</form>

<p>Movimentação do dia: <span class="glyphicon glyphicon-calendar"></span><?php echo $model->data; ?></p>

<table class="table">
    <tr>
        <th>Tipo</th>
        <th>QTD</th>
        <th></th>
    </tr>
    <tr>
        <td><a href="<?php echo HOME; ?>/exibir/doacoes/<?php echo $model->data; ?>">Doações</a></td>
        <td><?php echo $result['doacao']; ?></td>
        <td></td>
    </tr>
    <tr>
        <td><a href="<?php echo HOME; ?>/exibir/encaminhamentos/<?php echo $model->data; ?>">Encaminhamentos</a></td>
        <td><?php echo $result['encaminhamento']; ?></td>
        <td></td>
    </tr>
    <tr>
        <td><a href="<?php echo HOME; ?>/exibir/colaboracoes/<?php echo $model->data; ?>">Colaborações</a></td>
        <td><?php echo $result['colaboracao']; ?></td>
        <td></td>
    </tr>
</table>

<h4>Pessoal envolvido:</h4>

<ul>
    <li><a href="<?php echo HOME; ?>/exibir/colaboradores">Colaboradores</a></li>
    <li><a href="<?php echo HOME; ?>/exibir/doadores">Doadores</a></li>
    <li><a href="<?php echo HOME; ?>/exibir/empresas">Empresas</a></li>
</ul>

<p>Sabe onde tem material disponível? <a href="<?php echo HOME; ?>/register/observacao"><span class="glyphicon glyphicon-thumbs-up"></span> Clique aqui</a></p>
