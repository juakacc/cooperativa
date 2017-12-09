<?php if ($this->logado and $this->tipo == 'administrador'): ?>
    <nav class="navbar navbar-expand">
        <div class="collapse navbar-collapse" align="center">
            <ul class="navbar-nav mx-auto">

                <li class="nav-item dropup">
                    <a class="nav-link dropdown-toggle btn" href="#" data-toggle="dropdown">Add pessoa</a>

                    <div class="dropdown-menu">
                        <a href="<?php echo HOME; ?>/register/colaborador" class="dropdown-item">Adicionar Colaborador</a>
                        <a href="<?php echo HOME; ?>/register/doador" class="dropdown-item">Adicionar Doador</a>
                        <a href="<?php echo HOME; ?>/register/empresa" class="dropdown-item">Adicionar Empresa</a>
                    </div>
                </li><!-- Fim do dropdown adicionar -->

                <li class="nav-item dropup">
                    <a class="nav-link dropdown-toggle btn" href="#" data-toggle="dropdown">Add ação</a>

                    <div class="dropdown-menu">
                        <a href="<?php echo HOME; ?>/register/colaboracao" class="dropdown-item">Adicionar Colaboração</a>
                        <a href="<?php echo HOME; ?>/register/doacao" class="dropdown-item">Adicionar Doação</a>
                        <a href="<?php echo HOME; ?>/register/encaminhamento" class="dropdown-item">Adicionar Encaminhamento</a>
                    </div>
                </li><!-- Fim do dropdown adicionar -->

                <li class="nav-item dropup">
                    <a class="nav-link dropdown-toggle btn" href="#" data-toggle="dropdown">Gerenciar</a>

                    <div class="dropdown-menu">
                        <a href="<?php echo HOME; ?>/exibir/colaboradores" class="dropdown-item">Colaboradores</a>
                        <a href="<?php echo HOME; ?>/exibir/doadores" class="dropdown-item">Doadores</a>
                        <a href="<?php echo HOME; ?>/exibir/empresas" class="dropdown-item">Empresas</a>
                    </div>
                </li><!-- Fim do dropdown gerenciar -->
            </ul>
        </div> <!-- Menus -->
    </nav>

    <div class="row justify-content-center">
        <div class="col">
            <a href="<?php echo HOME; ?>/register/diaria" class="nav-link btn">Registrar diária</a>
        </div>
    </div>
<?php endif; ?>

<footer class="text-center bg-light">
    <ul class="nav justify-content-center">
        <li class="nav-item">
            <a href="<?php echo HOME; ?>/index/sobre" class="nav-link">Sobre</a>
        </li>
        <li class="nav-item">
            <a href="<?php echo HOME; ?>/index/visite-nos" class="nav-link">Visite-nos</a>
        </li>
    </ul>
    <p>2017 - Todos os direitos reservados</p>
</footer>
</div>

<!-- No final, para carregar a página mais rápido -->
<script src="<?php echo HOME; ?>/views/_js/jquery-3.2.1.min.js"></script>
<script src="<?php echo HOME; ?>/views/_js/popper.min.js"></script>
<script src="<?php echo HOME; ?>/views/_js/bootstrap.min.js"></script>

<!--    <script src="http://jqueryvalidation.org/files/dist/jquery.validate.js"></script>-->
<script src="<?php echo HOME; ?>/views/_js/jquery.validate.js"></script>
<!--    <script src="--><?php //echo HOME; ?><!--/views/_js/valida-dados.js"></script>-->

<!--    <script src="--><?php //echo HOME; ?><!--/views/_js/jquery.masked-1.4.1.js"></script>-->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.12/jquery.mask.min.js"></script>
<script src="<?php echo HOME; ?>/views/_js/mascara-dados.js"></script>
</body>
</html>
