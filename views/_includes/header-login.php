<?php
    $user = $model->getUserByIde($_SESSION['tipo'], $_SESSION['id']);
    $nome = ($_SESSION['tipo'] == 'empresa') ? $user->getRazao() : $user->getNome();
?>
<nav class="navbar navbar-azul">
    <div class="navbar-header">

        <a class="navbar-brand title">Cooperativa: União</a>

        <a class="navbar-brand">Bem vindo, <?php echo $nome; ?> <span class="glyphicon glyphicon-user"></span></a>

        <a class="navbar-brand" href="<?php echo HOME; ?>/administrador/logout"><span class="glyphicon glyphicon-off"></span> SAIR</a>
    </div>
</nav>