<?php
$result = $model->get_dados();
?>

<div class="row">
    <div class="col">
        <p>A Cooperativa União em busca de um mundo melhor para todos, junte-se a nós</p>
    </div>
</div>

<div class="row">
    <div class="col-md-5 col-sm-8">

        <form method="POST" class="form-inline">
            <label class="mr-sm-2" for="data">Escolha um dia:</label>
            <div class="input-group">
                <input type="text" name="data" id="data" placeholder="dd/mm/aaaa"
                       value="<?php echo check_array($model->form_data, 'data'); ?>" class="form-control"/>

                <div class="input-group-btn">
                    <button type="submit" class="btn btn-primary">Pesquisar</button>
                </div>
            </div>
        </form>

    </div><!-- Formulário -->

    <div class="col-md-3">
        <?php include ABSPATH . '/views/_includes/mostrar-erros.php'; ?>
    </div>

    <div class="col-md-4 col-sm-4">
        <h5 class="text-center">Movimentação do dia: <?php echo mostrar_data($model->data); ?></h5>
    </div>
</div>

<div class="row justify-content-center">
    <div class="col-sm col-md-6">
        <table class="table">
            <tr>
                <th>Tipo</th><th>Qtd</th>
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

<div class="row">
    <div class="col-md-3 col-sm-12">
        Pessoal envolvido:
    </div>

    <div class="col-md-9 col-sm-12">
        <a href="<?php echo HOME; ?>/exibir/colaboradores" class="btn">Colaboradores</a>
        <a href="<?php echo HOME; ?>/exibir/doadores" class="btn">Doadores</a>
        <a href="<?php echo HOME; ?>/exibir/empresas" class="btn">Empresas</a>
    </div>
</div>