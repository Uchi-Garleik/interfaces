<div class="container-fluid">
    <button id="displaySearchFormBtn" type="button" onclick="displaySearchUserView()" class="btn btn-outline-primary">Buscar Usuarios</button>
    <button id="displayInsertFormBtn" type="button" onclick="displayInsertUserView()" class="btn btn-outline-primary">Formulario Insertar Datos</button>
</div>

<div class="d-none" id="searchFields">
    <h1>Busqueda De Usuarios</h1>
    <form id="formularioBuscar" name="formularioBuscar" onkeydown="return event.key != 'Enter';">
        <div class="form-group">
            Nombre o Apellidos
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="basic-addon-nombre-filtro"><i class="far fa-id-card"></i></span>
                </div>
                <input type="text" class="form-control" name="nombre" id="nombre0" placeholder="John Man" aria-label="nombre" aria-describedby="basic-addon-nombre-filtro">
            </div>
        </div>

        <div class="form-group">
            Email
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="basic-addon-email-filtro"><i class="far fa-envelope"></i></span>
                </div>
                <input type="text" class="form-control" name="mail" id="mail0" placeholder="johnman@gmail.com" aria-label="nombre" aria-describedby="basic-addon-email-filtro">
            </div>
        </div>

        <div class="form-group">
            Movil
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="basic-addon-movil-filtro"><i class="fa-solid fa-mobile"></i></span>
                </div>
                <input type="text" class="form-control" name="movil" id="movil0" placeholder="976123456" aria-label="movil" aria-describedby="basic-addon-movil-filtro">
            </div>
        </div>

        <div class="button-field">
            <button type="button" onclick="buscarUsuarios(null, null,'buscarUsuarios','buscarTodos')" class="btn btn-primary">BUSCAR</button>
        </div>
    </form>
</div>
<div class="d-none" id="insertFields">
    <h1 id="insertUserTitle">Insertar Usuario</h1>
    <form id="editUserForm">
        <!-- ID Usuario (No Necesario) -->
        <div class="form-group d-none">
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="basic-addon1"><i class="far fa-id-card"></i></span>
                </div>
                <input type="text" class="form-control" id="inputID" placeholder="Enter ID" aria-label="ID" aria-describedby="basic-addon1" disabled>
            </div>
        </div>
        <div class="form-group">
            Nombre
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="basic-addon2"><i class="fas fa-user"></i></span>
                </div>
                <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Enter name" aria-label="Name" aria-describedby="basic-addon2">
            </div>
        </div>
        <div class="form-group">
            Primer Apellido
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="basic-addon3"><i class="fas fa-user"></i></span>
                </div>
                <input type="text" class="form-control" id="apellido_1" name="apellido_1" placeholder="Enter last name" aria-label="Last Name" aria-describedby="basic-addon3">
            </div>
        </div>
        <div class="form-group">
            Segundo Apellido
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="basic-addon4"><i class="fas fa-user"></i></span>
                </div>
                <input type="text" class="form-control" id="apellido_2" name="apellido_2" placeholder="Enter surname" aria-label="Surname" aria-describedby="basic-addon4">
            </div>
        </div>
        <div class="form-group">
            Nombre De Usuario
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="basic-addon5"><i class="fas fa-user"></i></span>
                </div>
                <input type="text" class="form-control" id="login" name="login" placeholder="Enter username" aria-label="Username" aria-describedby="basic-addon5">
            </div>
        </div>
        <div class="form-group">
            Email
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="basic-addon6"><i class="far fa-envelope"></i></span>
                </div>
                <input type="email" class="form-control" id="mail" name="mail" placeholder="Enter email" aria-label="Email" aria-describedby="basic-addon6">
            </div>
        </div>
        <div class="form-group">
            Movil
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="basic-addon-movil"><i class="fa-solid fa-mobile"></i></span>
                </div>
                <input type="text" class="form-control" id="movil" name="movil" placeholder="Movil" aria-label="Movil" aria-describedby="basic-addon-movil">
            </div>
        </div>
        <div class="form-group">
            Contraseña
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="basic-addon7"><i class="fas fa-lock"></i></span>
                </div>
                <input type="password" class="form-control" id="pass" name="pass" placeholder="Enter password" aria-label="Password" aria-describedby="basic-addon7">
            </div>
        </div>
        <div class="form-group">
            Verificar Contraseña
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="basic-addon8"><i class="fas fa-lock"></i></span>
                </div>
                <input type="password" class="form-control" id="passverify" name="passverify" placeholder="Retype password" aria-label="Retype Password" aria-describedby="basic-addon8">
            </div>
        </div>
        <div class="form-group">
            Genero
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="basic-addon9"><i class="fas fa-venus-mars"></i></span>
                </div>
                <select id="sexo" name="sexo" class="form-control" aria-label="Gender" aria-describedby="basic-addon9">
                    <option value="" selected>Choose...</option>
                    <option value="Hombre">Hombre</option>
                    <option value="Mujer">Mujer</option>
                    <option value="No especificado">No decir</option>
                </select>
            </div>
        </div>
        <div class="form-group">
            Activado
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="basic-addon10"><i class="fas fa-toggle-on"></i></span>
                </div>
                <select id="activo" name="activo" class="form-control" aria-label="Enabled" aria-describedby="basic-addon10">
                    <option value="" selected>Choose...</option>
                    <option value="activo">Si</option>
                    <option value="inactivo">No</option>
                </select>
            </div>
        </div>
        <div class="form-group">
            <button type="button" id="clearFormButton" class="btn btn-secondary" onclick="cancelEditUser()"><i class="fas fa-times"></i>Limpiar Campos</button>
            <button type="button" id="insertUserButton" onclick="checkInsertForm('insertarUsuario')" class="btn btn-primary"><i class="fas fa-save"></i> Insertar Usuario</button>
            <button type="button" id="editUserButton" onclick="checkInsertForm('editarUsuario')" class="btn btn-primary"><i class="fas fa-save"></i> Guardar Usuario</button>
        </div>
    </form>
    <div id="insertErrorDiv" class="alert alert-danger d-none" role="alert"></div>
    <div id="insertSuccessDiv" class="alert alert-success d-none" role="alert"></div>
</div>

<div id="capaResultadosBusqueda">

</div>