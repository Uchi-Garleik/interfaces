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
        <button type="button" onclick="buscarUsuarios(null, null,'buscarUsuarios','buscarTodos')" class="title" id="buscar-btn">BUSCAR</button>
    </div>
</form>
<!-- <h1>Insertar Usuario</h1>

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
</form> -->
<div id="errorDiv" class="alert alert-danger d-none" role="alert"></div>
<form id="editUserForm">
    <div class="form-group">
        <div class="input-group mb-3">
            <div class="input-group-prepend">
                <span class="input-group-text" id="basic-addon1"><i class="far fa-id-card"></i></span>
            </div>
            <input type="text" class="form-control" id="inputID" placeholder="Enter ID" aria-label="ID" aria-describedby="basic-addon1" disabled>
        </div>
    </div>
    <div class="form-group">
        <div class="input-group mb-3">
            <div class="input-group-prepend">
                <span class="input-group-text" id="basic-addon2"><i class="fas fa-user"></i></span>
            </div>
            <input type="text" class="form-control" id="inputName" placeholder="Enter name" aria-label="Name" aria-describedby="basic-addon2">
        </div>
    </div>
    <div class="form-group">
        <div class="input-group mb-3">
            <div class="input-group-prepend">
                <span class="input-group-text" id="basic-addon3"><i class="fas fa-user"></i></span>
            </div>
            <input type="text" class="form-control" id="inputLastName" placeholder="Enter last name" aria-label="Last Name" aria-describedby="basic-addon3">
        </div>
    </div>
    <div class="form-group">
        <div class="input-group mb-3">
            <div class="input-group-prepend">
                <span class="input-group-text" id="basic-addon4"><i class="fas fa-user"></i></span>
            </div>
            <input type="text" class="form-control" id="inputSurname" placeholder="Enter surname" aria-label="Surname" aria-describedby="basic-addon4">
        </div>
    </div>
    <div class="form-group">
        <div class="input-group mb-3">
            <div class="input-group-prepend">
                <span class="input-group-text" id="basic-addon5"><i class="fas fa-user"></i></span>
            </div>
            <input type="text" class="form-control" id="inputUsername" placeholder="Enter username" aria-label="Username" aria-describedby="basic-addon5">
        </div>
    </div>
    <div class="form-group">
        <div class="input-group mb-3">
            <div class="input-group-prepend">
                <span class="input-group-text" id="basic-addon6"><i class="far fa-envelope"></i></span>
            </div>
            <input type="email" class="form-control" id="inputEmail" placeholder="Enter email" aria-label="Email" aria-describedby="basic-addon6">
        </div>
    </div>
    <div class="form-group">
        <div class="input-group mb-3">
            <div class="input-group-prepend">
                <span class="input-group-text" id="basic-addon7"><i class="fas fa-lock"></i></span>
            </div>
            <input type="password" class="form-control" id="inputPassword" placeholder="Enter password" aria-label="Password" aria-describedby="basic-addon7">
        </div>
    </div>
    <div class="form-group">
        <div class="input-group mb-3">
            <div class="input-group-prepend">
                <span class="input-group-text" id="basic-addon8"><i class="fas fa-lock"></i></span>
            </div>
            <input type="password" class="form-control" id="inputRetypePassword" placeholder="Retype password" aria-label="Retype Password" aria-describedby="basic-addon8">
        </div>
    </div>
    <div class="form-group">
        <div class="input-group mb-3">
            <div class="input-group-prepend">
                <span class="input-group-text" id="basic-addon9"><i class="fas fa-venus-mars"></i></span>
            </div>
            <select id="inputGender" class="form-control" aria-label="Gender" aria-describedby="basic-addon9">
                <option value="" selected>Choose...</option>
                <option value="Male">Male</option>
                <option value="Female">Female</option>
                <option value="other">Other</option>
            </select>
        </div>
    </div>
    <div class="form-group">
        <div class="input-group mb-3">
            <div class="input-group-prepend">
                <span class="input-group-text" id="basic-addon10"><i class="fas fa-toggle-on"></i></span>
            </div>
            <select id="inputEnabled" class="form-control" aria-label="Enabled" aria-describedby="basic-addon10">
                <option value="" selected>Choose...</option>
                <option value="Yes">Yes</option>
                <option value="No">No</option>
            </select>
        </div>
    </div>
    <div class="form-group">
        <button type="button" class="btn btn-secondary" onclick="cancelEditUser()"><i class="fas fa-times"></i>Limpiar Campos</button>
        <button type="submit" id="insertUserButton" class="btn btn-primary"><i class="fas fa-save"></i> Save Edits</button>
    </div>
</form>


<!-- <h1>Editar Usuario</h1>
<form id="formularioEditarUsuario" name="formularioEditarUsuario" onkeydown="return event.key != 'Enter';" onsubmit="return false" class="row">
    <div class="mb-3 col-md-12 input-group">
        <label class="input-group-text" for="idEditar">Id</label>
        <input type="number" name="idEditar" id="idEditar" class="form-control" disabled>
    </div>
    <div class="mb-3 col-md-4">
        <label class="input-group-text" for="nombreEditar">nombre</label>
        <input type="text" name="nombre" id="nombreEditar" class="form-control">
    </div>
    <div class="mb-3 col-md-4">
        <label class="input-group-text" for="apellido_1_Editar">apellido_1</label>
        <input type="text" name="apellido_1" id="apellido_1_Editar" class="form-control">
    </div>

    <div class="mb-3 col-md-4">
        <label class="input-group-text" for="apellido_2_Editar">apellido_2</label>
        <input type="text" name="apellido_2" id="apellido_2_Editar" class="form-control">
    </div>

    <div class="mb-3 col-md-6">
        <label class="input-group-text" for="mailEditar">mail</label>
        <input type="email" name="mail" id="mailEditar" class="form-control" required>
    </div>

    <div class="mb-3 col-md-6">
        <label class="input-group-text" for="movilEditar">movil</label>
        <input type="number" name="movil" id="movilEditar" class="form-control">
    </div>

    <div class="mb-3 col-md-12">
        <span>Sexo:</span>

        <div class="form-check">
            <label class="form-check-label" for="hombreEditar">Hombre</label>
            <input class="form-check-input" type="radio" name="sexoEditar" id="hombreEditar" value="H">
        </div>

        <div class="form-check">
            <label class="form-check-label" for="mujerEditar">Mujer</label>
            <input class="form-check-input" type="radio" name="sexoEditar" id="mujerEditar" value="M">
        </div>

        <div class="form-check">
            <label class="form-check-label" for="nodecirEditar">No Decir</label>
            <input class="form-check-input" type="radio" name="sexoEditar" id="nodecirEditar" value="">
        </div>
    </div>

    <div class="mb-3 col-md-6">
        <label class="form-label" for="loginEditar">Login</label>
        <input type="text" name="login" id="loginEditar" class="form-control" required>
    </div>

    <div class="mb-3 col-md-6">
        <label class="form-label" for="passEditar">Password</label>
        <input type="password" name="pass" id="passEditar" class="form-control" required>
    </div>
    <div class="mb-3 col-md-12">
        <span>Activo:</span>
        <div class="form-check">
            <label class="form-check-label" for="activoSiEditar">Si</label>
            <input class="form-check-input" type="radio" name="activoEditar" id="activoSiEditar" value="S" required>
        </div>

        <div class="form-check">
            <label class="form-check-label" for="activoNo2">No</label>
            <input class="form-check-input" type="radio" name="activoEditar" id="activoNoEditar" value="N" required>
        </div>

    </div>
    <button type="submit" onclick="editarUsuario()">Actualizar Usuario</button>
</form> -->

<div id="capaResultadosBusqueda">

</div>