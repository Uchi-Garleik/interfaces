<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login2</title>
    <link rel="stylesheet" href="./bs4/css/bootstrap.min.css">
    <link rel="stylesheet" href="./css/reset.css">
    <link rel="stylesheet" href="./css/login.css">
</head>

<body class="d-flex align-items-center justify-content-center">

<div id="section" class="row col-9 col-sm-8 col-md-7 col-lg-5">
    <div class="col-lg-10 col-md-10 col-sm-10 m-auto">
        <span id="loginTitle" class="text-capitalize">Welcome User</span>
        <form id="formularioBuscar" method="post" action="login.php">
            <div class="form-group">
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="basic-addon1"><i class="far fa-id-card"></i></span>
                    </div>
                    <input type="text" class="form-control" id="usuario" name="usuario" placeholder="Username" aria-label="ID" aria-describedby="basic-addon1">
                </div>
            </div>

            <div class="form-group">
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="basic-addon2"><i class="fas fa-lock"></i></span>
                    </div>
                    <input type="password" class="form-control" id="password" name="pass" placeholder="Password" aria-label="Password" aria-describedby="basic-addon2">
                </div>
            </div>

            <div class="form-group">
                <!-- <button type="button" onclick="buscarUsuarios(null, null, 'buscarUsuarios', 'login')" id="buttonlogin" class="btn btn-primary btn-block">Login</button> -->
                <button type="button" onclick="verifyLogin()" id="buttonlogin" class="btn btn-primary btn-block">Login</button>
            </div>
        </form>
        <div><span>Ir al <a href="/">home</a></span></div>
        <div id="errorDiv" class="alert alert-danger d-none" role="alert"></div>

    </div>
</div>

    <script src="./jquery/jquery-3.2.1.slim.min.js"></script>
    <script src="./popper/popper.min.js"></script>
    <script src="./bs4/js/bootstrap.min.js"></script>
    <script src="https://kit.fontawesome.com/ed6377cf3c.js" crossorigin="anonymous"></script>
    <script src="./js/login.js"></script>
    <script src="./js/Usuarios.js"></script>

</body>