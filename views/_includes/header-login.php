<?php
    $user = $model->getUserByIde($_SESSION['tipo'], $_SESSION['id']);
    $nome = ($_SESSION['tipo'] == 'empresa') ? $user->getRazao() : $user->getNome();

?>

<nav class="navbar navbar-expand-lg bg-light">
    <a class="navbar-brand" href="<?php echo HOME . '/' . $_SESSION['tipo']; ?>">Cooperativa: União</a>

    <button class="navbar-toggler my-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
                <a class="nav-link">Bem vindo, <?php echo $nome; ?>  <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
                <a class="btn btn-success nav-link mx-1 mb-1" href="<?php echo HOME . '/' . $_SESSION['tipo']; ?>">Home</a>
            </li>
            <li class="nav-item">
                <a class="btn btn-primary nav-link mx-1 mb-1" href="<?php echo HOME . '/editar/' . $_SESSION['tipo'] . '/' . $_SESSION['id']; ?>">Alterar meus dados</a>
            </li>
            <li class="nav-item">
                <a class="btn btn-danger nav-link mx-1 mb-1" href="<?php echo HOME; ?>/administrador/logout">SAIR</a>
            </li>
        </ul>
    </div>
</nav>

<?php include_once ABSPATH . '/views/_includes/mostrar-msg.php'; ?>