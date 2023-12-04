<?php session_start();

?>
<!DOCTYPE html>
<html lang="es">

<head>
    <title>my web</title>
    <meta http-equiv="Cache-Control" content="no-store" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="bs4/css/bootstrap.min.css">
    <link rel="icon" type="image/x-icon" href="img/favicon.png">
    <script src="js/app.js"></script>

    <link rel="stylesheet" href="./webfontkit-league-of-legends-fonts/stylesheet.css">
    <link rel="stylesheet" href="css/reset.css">
    <link rel="stylesheet" href="css/index.css">
    <link rel="stylesheet" href="css/navbar.css">
    <link rel="stylesheet" href="./css/users.css">
</head>

<body>
    <section id="header" class="container-fluid">
        <section id="subheaderTitle" class="container-fluid">
            <div class="row">
                <div class="divTituloApp col-lg-12 col-md-12 d-block">Desarrollo de Interfaces - Manel Serna</div>
            </div>
        </section>

        <nav class="navbar navbar-expand-sm navbar-light" aria-label="Fourth navbar example">
            
            <div class="container-fluid">
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarsExample04" aria-controls="navbarsExample04" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <a class="navbar-brand" href="/">
                    <img class="img-fluid" src="./img/Untitled.png" width="340px">
                </a>
                <div class="collapse navbar-collapse" id="navbarsExample04">
                    <ul class="navbar-nav me-auto mb-2 mb-md-0">
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown" aria-expanded="false">Menús</a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" onclick="getVistaMenuSeleccionado('Usuarios', 'getVistaUsuarios')">Usuarios</a></li>
                            </ul>
                        </li>
                    </ul>
                    <div class="ml-auto">
                        <?php
                        if (isset($_SESSION['usuario'])) {
                            echo $_SESSION['usuario'];
                            echo '<a href="logout.php" title="Salir">(CERRAR SESION)</a>';
                        } else {
                            echo '<a href="login.php" title="login"> INICIAR SESION </a>';
                        }
                        ?>
                    </div>
                </div>
            </div>
        </nav>


    </section>
    <section id="content" class="container-fluid">

    </section>
    <script src="./jquery/jquery-3.2.1.slim.min.js"></script>
    <script src="./popper/popper.min.js"></script>
    <script src="./bs4/js/bootstrap.min.js"></script>
    <script src="https://kit.fontawesome.com/ed6377cf3c.js" crossorigin="anonymous"></script>
    <script src="index.js"></script>
    <script src="bs5/js/bootstrap.bundle.min.js"></script>
</body>

</html>