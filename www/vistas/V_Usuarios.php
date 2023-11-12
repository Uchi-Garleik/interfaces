<?php
echo '<h2>Busqueda de usuarios: </h2>';
?>

<form id="formularioBuscar" name="formularioBuscar" onkeydown="return event.key != 'Enter';">
    <div id="nombre-field" class="input-field">
        <label for="nombre">NOMBRE O APELLIDOS:</label>
        <input type="text" id="nombre" name="nombre"> <br>
    </div>

    <div id="mail-field" class="input-field">
        <label for="mail">MAIL:</label>
        <input type="text" id="mail" name="mail"> <br>
    </div>

    <div id="movil-field" class="input-field">
        <label for="movil">MOVIL:</label>
        <input type="text" id="movil" name="movil"> <br>
    </div>
    <div class="button-field">
        <button type="button" onclick="buscarUsuarios()" class="title" id="buscar-btn">BUSCAR</button>
    </div>
</form>

<form id="formularioInsertarUsuario" name="formularioInsertarUsuario" onkeydown="return event.key != 'Enter';">
    <div class="mb-3">
        <label class="form-label" for="nombre">nombre</label>
        <input type="text" name="nombre" id="nombre" class="form-control">
    </div>
    <div class="mb-3">
        <label class="form-label" for="apellido_1">apellido_1</label>
        <input type="text" name="apellido_1" id="apellido_1" class="form-control">
    </div>

    <div class="mb-3">
        <label class="form-label" for="apellido_2">apellido_2</label>
        <input type="text" name="apellido_2" id="apellido_2" class="form-control">
    </div>

    <div class="mb-3">
        <span>Sexo:</span>
        <label for="hombre">Hombre</label>
        <input type="radio" name="sexo" id="hombre" value="H">

        <label for="mujer">Mujer</label>
        <input type="radio" name="sexo" id="mujer" value="M">

        <label for="nodecir">No Decir</label>
        <input type="radio" name="sexo" id="nodecir" value="">

    </div>

    <div class="mb-3">
        <label class="form-label" for="mail">mail</label>
        <input type="text" name="mail" id="mail" class="form-control" required>
    </div>

    <div class="mb-3">
        <label class="form-label" for="movil">movil</label>
        <input type="text" name="movil" id="movil" class="form-control">
    </div>

    <div class="mb-3">
        <label class="form-label" for="login">Login</label>
        <input type="text" name="login" id="login" class="form-control" required>
    </div>

    <div class="mb-3">
        <label class="form-label" for="pass">Password</label>
        <input type="password" name="pass" id="pass" class="form-control" required>
    </div>

    <div class="mb-3">
        <span>Activo:</span>
        <label for="activoSi">Si</label>
        <input type="radio" name="activo" id="activoSi" value="S" required>

        <label for="activoNo">No</label>
        <input type="radio" name="activo" id="activoNo" value="N" required>
    </div>
    <button type="button" onclick="insertarUsuario()">registrar usuario</button>
</form>
<div id="capaResultadosBusqueda">

</div>