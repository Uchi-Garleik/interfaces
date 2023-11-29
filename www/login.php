<?php
// session_start();
// $usuario = '';
// $pass = '';
// extract($_POST);

// $mensa = ''; // Initialize the error message variable

// // Check if the form has been submitted
// if ($_SERVER["REQUEST_METHOD"] == "POST") {
//     $_SESSION['submitted'] = true; // Set a session variable to indicate the form has been submitted

//     if ($usuario == '' || $pass == '') {
//         $mensa = 'Debe completar los campos';
//     } else {
//         require_once 'controladores/C_Usuarios.php';
//         $objUsuarios = new C_Usuarios();
//         $datos['usuario'] = $usuario;
//         $datos['pass'] = $pass;

//         $resultado = $objUsuarios->validarUsuario(array('usuario' => $usuario, 'pass' => $pass));
//         if ($resultado == 'S') {
//             header('Location: index.php');
//         }
//         $mensa = 'Datos incorrectos';
//     echo "hola";
//     }
// }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login2</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="./css/reset.css">
    <link rel="stylesheet" href="./css/login.css">
</head>

<body class="d-flex align-items-center justify-content-center">
    <div id="section" class="row">
        <div class="m-auto col-lg-12">
            <h1 class="text-center text-capitalize">Login Form</h1>
            <form id="formularioBuscar" method="post" action="login.php">
                <div class="form-group">
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon1"><i class="far fa-id-card"></i></span>
                        </div>
                        <input type="text" class="form-control" id="usuario" name="usuario" placeholder="Enter ID" aria-label="ID" aria-describedby="basic-addon1">
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
                    <button type="button" onclick="buscarUsuarios(null, null, 'buscarUsuarios','login')" id="buttonlogin" class="btn btn-primary btn-block">Login</button>
                </div>
                
            </form>
            <div id="errorDiv" class="alert alert-danger d-none" role="alert"></div>

        </div>
    </div>



    <!-- <form id="formularioLogin" method="post" action="login.php">
        <div>
            <h1>LOGIN</h1>
            <div>
                <div id="username-field" class="input-field">
                    <label for="usuario">USERNAME</label>
                    <input type="text" id="usuario" name="usuario"> <br>
                </div>
                <div id="password-field" class="input-field">
                    <label for="pass">PASSWORD</label>
                    <input type="password" id="pass" name="pass">
                </div>
                <div>
                    <?php /* echo $mensa */ ?>
                </div>
            </div>
            <div>
                <button class="title" type="submit" value="Enviar">SIGN IN</button>
            </div>
            <br>
            <span>Ir Al <a href="/">Home</a></span>
        </div>
    </form> -->


    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/ed6377cf3c.js" crossorigin="anonymous"></script>
    <script src="./js/login.js"></script>
    <script src="./js/Usuarios.js"></script>

</body>