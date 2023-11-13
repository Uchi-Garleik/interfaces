<?php
echo '<h2>Busqueda de usuarios: </h2>';
?>

<form id="formularioBuscar" name="formularioBuscar" onkeydown="return event.key != 'Enter';">
    <div id="nombre-field" class="input-field">
        <label for="nombre0">NOMBRE O APELLIDOS:</label>
        <input type="text" id="nombre0" name="nombre"> <br>
    </div>

    <div id="mail-field" class="input-field">
        <label for="mail0">MAIL:</label>
        <input type="text" id="mail0" name="mail"> <br>
    </div>

    <div id="movil-field" class="input-field">
        <label for="movil0">MOVIL:</label>
        <input type="text" id="movil0" name="movil"> <br>
    </div>
    <div class="button-field">
        <button type="button" onclick="buscarUsuarios()" class="title" id="buscar-btn">BUSCAR</button>
    </div>
</form>
<hr>
<h1>Insertar Usuario</h1>

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
<hr>


<h1>Editar Usuario</h1>
<form id="formularioEditarUsuario" name="formularioEditarUsuario" onkeydown="return event.key != 'Enter';" onsubmit="return false">

    <div class="mb-3">
        <label class="form-label" for="idEditar">Id</label>
        <input type="number" name="idEditar" id="idEditar" class="form-control" disabled>
    </div>
    <div class="mb-3">
        <label class="form-label" for="nombreEditar">nombre</label>
        <input type="text" name="nombre" id="nombreEditar" class="form-control">
    </div>
    <div class="mb-3">
        <label class="form-label" for="apellido_1_Editar">apellido_1</label>
        <input type="text" name="apellido_1" id="apellido_1_Editar" class="form-control">
    </div>

    <div class="mb-3">
        <label class="form-label" for="apellido_2_Editar">apellido_2</label>
        <input type="text" name="apellido_2" id="apellido_2_Editar" class="form-control">
    </div>

    <div class="mb-3">
        <span>Sexo:</span>
        <label for="hombreEditar">Hombre</label>
        <input type="radio" name="sexoEditar" id="hombreEditar" value="H">

        <label for="mujerEditar">Mujer</label>
        <input type="radio" name="sexoEditar" id="mujerEditar" value="M">

        <label for="nodecirEditar">No Decir</label>
        <input type="radio" name="sexoEditar" id="nodecirEditar" value="">

    </div>

    <div class="mb-3">
        <label class="form-label" for="mailEditar">mail</label>
        <input type="email" name="mail" id="mailEditar" class="form-control" required>
    </div>

    <div class="mb-3">
        <label class="form-label" for="movilEditar">movil</label>
        <input type="number" name="movil" id="movilEditar" class="form-control">
    </div>

    <div class="mb-3">
        <label class="form-label" for="loginEditar">Login</label>
        <input type="text" name="login" id="loginEditar" class="form-control" required>
    </div>

    <div class="mb-3">
        <label class="form-label" for="passEditar">Password</label>
        <input type="password" name="pass" id="passEditar" class="form-control" required>
    </div>

    <div class="mb-3">
        <span>Activo:</span>
        <label for="activoSiEditar">Si</label>
        <input type="radio" name="activoEditar" id="activoSiEditar" value="S" required>

        <label for="activoNo2">No</label>
        <input type="radio" name="activoEditar" id="activoNoEditar" value="N" required>
    </div>
    <button type="submit" onclick="editarUsuario()">Actualizar Usuario</button>
</form>

<div id="capaResultadosBusqueda">

</div>