<form method="POST" class="form-dados">
    <div class="form-group row">
        <label class="col-2 col-form-label" for="cpf">CPF</label>
        <div class="col-10">
            <input type="text" name="cpf" id="cpf" autofocus
                   value="<?php echo check_array($c,'cpf'); ?>" class="form-control"/>
        </div>
    </div>

    <div class="form-group row">
        <label class="col-2 col-form-label" for="nome">Nome</label>
        <div class="col-10">
            <input type="text" name="nome" id="nome"
                   value="<?php echo check_array($c,'nome'); ?>" class="form-control"/>
        </div>
    </div>

    <?php include ABSPATH . '/views/_includes/endereco.php'; ?>

    <div class="form-group row">
        <label class="col-2 col-form-label" for="telefone">Telefone</label>
        <div class="col-10">
            <input type="text" name="telefone" id="telefone"
                   value="<?php echo check_array($c,'telefone'); ?>" class="form-control"/>
        </div>
    </div>

    <?php if (!isset($edicao)): ?>
        <div class="form-group row">
            <label class="col-2 col-form-label" for="senha">Senha</label>
            <div class="col-10">
                <input type="password" name="senha" id="senha" class="form-control"/>
            </div>
        </div>
    <?php endif; ?>

    <?php include ABSPATH . '/views/_includes/botoes-form.php'; ?>
</form>