<?php session_start();
if (isset($_SESSION['usuario']) && $_SESSION['usuario'] != '') {
    //esta logeado
} else {
    //header('Location: login.php');
}
// https://es.cooltext.com/
?>
<!DOCTYPE html>
<html lang="es">
<html>

<head>
    <title>my web</title>
    <meta http-equiv="Cache-Control" content="no-store"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- <link rel="stylesheet" href="librerias/bootstrap-5.1.3-dist/css/bootstrap.min.css"> -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="icon" type="image/x-icon" href="img/favicon.png">
    <script src="js/app.js"></script>

    <link rel="stylesheet" href="./webfontkit-league-of-legends-fonts/stylesheet.css">
    <link rel="stylesheet" href="css/reset.css">
    <link rel="stylesheet" href="css/index.css">
    <link rel="stylesheet" href="css/navbar.css">
    <link rel="stylesheet" href="./css/menu.css">
</head>

<body>
    <section id="secMenuPagina" class="container-fluid">
    <section id="secEncabezadoPagina" class="container-fluid">
        <div class="row">
            <div class="divTituloApp col-lg-8 col-md-8 d-none d-md-block">Desarrollo de Interfaces - Manel Serna</div>
        </div>
    </section>

        <nav class="navbar navbar-expand-sm navbar-dark" aria-label="Fourth navbar example">
            <div class="container-fluid">
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarsExample04" aria-controls="navbarsExample04" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <a class="navbar-brand" href="/">
                    <h1>Rift Royale</h1>
                </a>
                <div class="collapse navbar-collapse" id="navbarsExample04">
                    <ul class="navbar-nav me-auto mb-2 mb-md-0">
                        <li class="nav-item">
                            <a class="nav-link" href="#">Link</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link disabled">Disabled</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown" aria-expanded="false">Cruds</a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" onclick="getVistaMenuSeleccionado('Usuarios', 'getVistaUsuarios')">Lista De Usuarios</a></li>
                                <li><a class="dropdown-item" onclick="getVistaMenuSeleccionado('Pedidos', 'getVistaPedidos')">Crear Usuarios</a></li>
                                <li><a class="dropdown-item" onclick="getVistaMenuSeleccionado('', '')">Something else here</a></li>
                            </ul>
                        </li>
                    </ul>
                    <div class="divLog">
                        <?php
                        if (isset($_SESSION['usuario'])) {
                            echo $_SESSION['usuario'];
                            echo '<a href="logout.php" title="Salir">';
                            echo    '(CERRAR SESION)';
                            echo '</a>';
                        } else {
                            echo '<a href="login.php" title="login">';
                            echo    'INICIAR SESION';
                            echo '</a>';
                        }
                        ?>
                    </div>
                </div>
            </div>
        </nav>


    </section>
    <section id="secContenidoPagina" class="container-fluid">

    </section>

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script> -->
    <script src="https://kit.fontawesome.com/ed6377cf3c.js" crossorigin="anonymous"></script>
    <script src="index.js"></script>
    <script src="librerias/bootstrap-5.1.3-dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>