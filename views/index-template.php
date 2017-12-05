<?php
$result = $model->get_dados();
?>

<div class="row">
    <div class="col-8">
        <form method="POST" class="form-inline">
            <div class="form-group">
                <label class="col-form-label" for="data">Escolha um dia </label>
                <input type="text" name="data" id="data" placeholder="dd/mm/aaaa"
                       value="<?php echo check_array($model->form_data, 'data'); ?>" class="form-control"/>
                <button type="submit" class="btn btn-primary">Pesquisar</button>
            </div>
        </form>
    </div>
    <div class="col-4">
        <h5 class="text-center">Movimentação do dia: <?php echo mostrar_data($model->data); ?></h5>
    </div>
</div><!-- Formulário -->

<div class="row justify-content-center">
    <div class="col-6">
        <table class="table">
            <tr>
                <th>Tipo</th><th>Quantidade</th>
            </tr>
            <tr>
                <td><a href="<?php echo HOME; ?>/exibir/doacoes/<?php echo $model->data; ?>">Doações</a></td>
                <td><?php echo $result['doacao']; ?></td>
            </tr>
            <tr>
                <td><a href="<?php echo HOME; ?>/exibir/encaminhamentos/<?php echo $model->data; ?>">Encaminhamentos</a></td>
                <td><?php echo $result['encaminhamento']; ?></td>
            </tr>
            <tr>
                <td><a href="<?php echo HOME; ?>/exibir/colaboracoes/<?php echo $model->data; ?>">Colaborações</a></td>
                <td><?php echo $result['colaboracao']; ?></td>
            </tr>
        </table>
    </div>
</div> <!-- Tabela com resultados do dia -->

<div class="row">
    <div class="col">
        <p class="text-center">Sabe onde tem material disponível? <a href="<?php echo HOME; ?>/register/observacao"><span class="glyphicon glyphicon-thumbs-up"></span> Clique aqui</a></p>
    </div>
</div>

<div class="row align-items-center">
    <div class="col-5 text-right">
        Pessoal envolvido:
    </div>
    <div class="col text-left">
        <div>
            <a href="<?php echo HOME; ?>/exibir/colaboradores" class="btn btn-primary">Colaboradores</a>
            <a href="<?php echo HOME; ?>/exibir/doadores" class="btn btn-primary">Doadores</a>
            <a href="<?php echo HOME; ?>/exibir/empresas" class="btn btn-primary">Empresas</a>
        </div>
    </div>
</div>