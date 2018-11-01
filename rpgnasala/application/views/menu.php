
<header>
    <?php
    $usuario = $this->session->userdata('usuario')[0];
    ?>
    <!-- Navbar -->
    <nav class="navbar  fixed-top navbar-expand-lg navbar-light white scrolling-navbar " style="background-color: #ffffff;">
        <div class="container-fluid">

            <!-- Brand -->
            <a class="navbar-brand waves-effect" href=""
               target="_blank">
                <img src="<?=base_url()?>assets/img/gamepad.png" style="height: 40px" class="img-responsive" alt="">
            </a>

            <!-- Collapse -->
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                    aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <!-- Links -->
            <div class="collapse navbar-collapse" id="navbarSupportedContent">

                <!-- Left -->
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item active">
                        <a class="nav-link waves-effect btn" href="#">Início
                            <span class="sr-only">(current)</span>
                        </a>
                    </li>

                    <!-- Menu visivel apenas para administradores e professores -->
                    <?php if ($usuario["graudeacesso"]<=2){?>
                        <li class="nav-item dropdown ">
                            <a class="nav-link dropdown-toggle btn" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true"
                            aria-expanded="false">Tabelas</a>
                            <div class="dropdown-menu dropdown-primary" aria-labelledby="navbarDropdownMenuLink">
                                <a class="dropdown-item" href="#">Questões</a>
                                <?php if ($usuario["graudeacesso"]==0){?>
                                    <a class="dropdown-item" href="<?=base_url()?>index.php/usuario">Usuários</a>
                                <?php } ?>

                                <?php if ($usuario["graudeacesso"]==0){?>
                                    <a class="dropdown-item" href="<?=base_url()?>index.php/titulo">Títulos</a>
                                <?php } ?>

                                <?php if ($usuario["graudeacesso"]==0){?>
                                    <a class="dropdown-item" href="<?=base_url()?>index.php/disciplina">Disciplinas</a>
                                <?php } ?>

                                <?php if ($usuario["graudeacesso"]==0){?>
                                    <a class="dropdown-item" href="<?=base_url()?>index.php/curso">Cursos</a>
                                <?php } ?>

                                <?php if ($usuario["graudeacesso"]==0){?>
                                    <a class="dropdown-item" href="<?=base_url()?>index.php/questoestipo">Tipo de Questões</a>
                                <?php } ?>

                            </div>
                        </li>
                    <?php } ?>

                    <!-- Menu visivel apenas para administradores -->
                    <?php if ($usuario["graudeacesso"]==0){?>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle btn" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true"
                           aria-expanded="false">Painel Administrativo</a>
                        <div class="dropdown-menu dropdown-primary" aria-labelledby="navbarDropdownMenuLink">
                            <a class="dropdown-item" href="#">Perfil</a>
                            <a class="dropdown-item" href="#">Inventário</a>
                            <a class="dropdown-item" href="#">Mapa</a>
                        </div>
                    </li>
                    <?php } ?>
                </ul>


                <!-- Right -->
                <ul class="navbar-nav nav-flex-icons">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle btn" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true"
                           aria-expanded="false"><?=$usuario["nome"]?></a>
                        <div class="dropdown-menu dropdown-primary" aria-labelledby="navbarDropdownMenuLink">
                            <a class="dropdown-item" href="#">Perfil</a>
                            <a class="dropdown-item" href="#">Inventário</a>
                            <a class="dropdown-item" href="#">Mapa</a>
                            <a class="dropdown-item" href="<?=base_url()?>index.php/login/deslogar">Sair</a>

                        </div>
                    </li>
                </ul>

            </div>

        </div>
    </nav>
    <!-- Navbar -->

    <!-- Sidebar -->
    <div class="sidebar-fixed position-fixed" style="background-color:#ff9b00">
        <br>
        <a class="" style="margin-left: 25%">
            <img src="<?=base_url()?>assets/img/gamepad.png" style="width: 50%" class="img-responsive" alt="">
            <h4 class="text-center" style="color: #ffffff">Nivelamento Online</h4>
        </a>

        <div class="list-group list-group-flush" style="background-color: transparent">
            <a href="#" class="list-group-item active waves-effect">
                <i class="fa fa-bookmark mr-3"></i>Início
            </a>
            <a href="#" class="list-group-item list-group-item-action waves-effect">
                <i class="fa fa-bank mr-3"></i>Inventário</a>
            <a href="#" class="list-group-item list-group-item-action waves-effect">
                <i class="fa fa-user mr-3"></i>Meu perfil</a>
            <a href="#" class="list-group-item list-group-item-action waves-effect">
                <i class="fa fa-map mr-3"></i>Mapa</a>
        </div>

    </div>
    <!-- Sidebar -->

</header>
<!--Main Navigation-->
