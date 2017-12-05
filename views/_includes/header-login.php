<?php
    $user = $model->getUserByIde($_SESSION['tipo'], $_SESSION['id']);
    $nome = ($_SESSION['tipo'] == 'empresa') ? $user->getRazao() : $user->getNome();
?>

<nav class="navbar navbar-expand-sm bg-light">
    <a class="navbar-brand" href="<?php echo HOME . '/' . $_SESSION['tipo']; ?>">Cooperativa: União</a>

    <div class="collapse navbar-collapse">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item">
                <a class="nav-link">Bem vindo, <?php echo $nome; ?></a>
            </li>
        </ul>
    </div> <!-- Menus -->

    <div>
        <a class="btn btn-success" href="<?php echo HOME . '/' . $_SESSION['tipo']; ?>">Home</a>
        <a class="btn btn-primary" href="">Alterar meus dados</a>
        <a class="btn btn-danger" href="<?php echo HOME; ?>/administrador/logout">SAIR</a>
    </div><!-- menus lado direito -->
</nav>