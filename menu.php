<nav class="navbar navbar-expand-sm bg-dark navbar-dark fixed-top">
    <a class="navbar-brand">RED GAMA</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
            <?php 
                if (isset($_SESSION['login_user_sys'])) {
                    echo '
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle btn-success text-dark" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                              Acciones
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                              <a class="dropdown-item" href="polizas.php">P&oacute;lizas</a>
                              <div class="dropdown-divider"></div>
                              <a class="dropdown-item" href="clientes.php">Clientes</a>
                            </div>
                        </li>
                        <li>
                            <label class="text-info nav-link">
                                Bienvenid@ '.utf8_encode($nombres).' '.utf8_encode($apellidos).'</b>
                            </label>
                        </li>
                        <li>
                            <a href="controladores/logout.php" class="btn btn-danger float-right">
                                Cerrar Sesi&oacute;n
                            </a>
                        </li>
                    ';  
                }else{
                    echo '
                         <li class="nav-item active">
                                <a class="nav-link" href="index.php">
                                    Inicio
                                    <span class="sr-only">(current)</span>
                                </a>
                            </li>
                        <li class="nav-item">
                            <button type="button" class="btn btn-info" data-toggle="modal" data-target="#miModal">
                                Ingreso
                            </button>
                        </li>
                    ';
                }
            ?>
        </ul>
    </div>
</nav>