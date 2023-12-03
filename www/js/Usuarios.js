changeInsertUserButton();
function buscarUsuarios(id_Usuario, pagina, metodo, filtro) {
    console.log("im logging in");
    let opciones = { method: "GET" };
    let parametros = "controlador=Usuarios&metodo=" + metodo;
    parametros += "&" + new URLSearchParams(new FormData(document.getElementById("formularioBuscar"))).toString();
    if (id_Usuario != null) {
        parametros += "&id_Usuario=" + id_Usuario;
    }

    if (pagina != null) {
        parametros += "&pagina=" + pagina;
    }

    if (filtro != null) {
        parametros += "&filtro=" + filtro;
    }

    console.log(parametros);
    console.log("controladores/C_Ajax.php?" + parametros, opciones);
    fetch("controladores/C_Ajax.php?" + parametros, opciones)
        .then(res => {
            if (res.ok) {
                console.log('Respuesta ok');
                return res.text();
            }
        })
        .then(vista => {
            console.log(vista);
            switch (filtro) {
                case "login":
                    if (vista == "S") {
                        console.log("correct login");
                        document.location = "/index.php";
                    } else {
                        // document.querySelector('#errorDiv')
                        console.log("incorrect login");
                        const errorDiv = document.querySelector('#errorDiv');
                        errorDiv.classList.remove('d-none');
                        errorDiv.innerHTML = '<strong>Error:</strong><br>Incorrect Login<br>';
                    }
                    break;
                case "buscarTodos":
                    div = document.querySelector('#capaResultadosBusqueda').innerHTML = vista;
                    changeInsertUserButton();
                    // let rows = document.querySelectorAll('table tr:not(:first-child)');
                    let rows = document.querySelectorAll('tbody tr');

                    // Initialize an empty array to store the user objects
                    let users = [];

                    // Iterate over each row
                    for (let row of rows) {
                        console.log(row.querySelector('.genero').textContent);
                        // Create a new user object
                        let user = {
                            id: row.querySelector('.id_Usuario').textContent,
                            nombre: row.querySelector('.nombre').textContent,
                            apellido_1: row.querySelector('.apellido_1').textContent,
                            apellido_2: row.querySelector('.apellido_2').textContent,
                            mail: row.querySelector('.mail').textContent,
                            movil: row.querySelector('.movil').textContent,
                            // Assuming 'login' is the username
                            login: row.querySelector('.login').textContent,
                            pass: row.querySelector('.pass').textContent,
                            genero: row.querySelector('.genero').textContent,
                            // Assuming 'activo' is the enabled status
                            activo: row.querySelector('.estado').textContent
                        };
                        users.push(user);
                    }

                    let buttons = document.querySelectorAll('.buttonEditUser');
                    for (let index = 0; index < buttons.length; index++) {
                        buttons[index].addEventListener("click", () => {
                            displayEditUserForm(users[index]);
                            if (document.querySelector('#insertFields').classList.contains("d-none")) {
                                document.querySelector('#insertFields').classList.remove("d-none");
                                document.querySelector('#displayInsertFormBtn').classList.replace("btn-outline-primary", "btn-primary")
                            }
                        });
                    }

                    cancelEditUser();
                    break;
                default:

                    break;
            }


        })
        .catch(err => {
            console.log("Error al realizar la peticion.", err.message);
        });
}

function displayEditUserForm(user) {
    // Get the edit user form element
    const editUserForm = document.querySelector('#editUserForm');
    console.log(user);
    // Fill the form with the user's information
    document.querySelector('#inputID').value = user.id;
    document.querySelector('#nombre').value = user.nombre;
    document.querySelector('#apellido_1').value = user.apellido_1;
    document.querySelector('#apellido_2').value = user.apellido_2;
    document.querySelector('#login').value = user.login;
    document.querySelector('#mail').value = user.mail;
    document.querySelector('#movil').value = user.movil;
    document.querySelector('#pass').value = user.pass;
    document.querySelector('#passverify').value = user.pass;
    document.querySelector('#sexo').value = user.genero;
    document.querySelector('#activo').value = user.activo;
    changeInsertUserButton();
    // Display the edit user form
    editUserForm.style.display = 'block';

}


function changeInsertUserButton() {
    const formTitle = document.querySelector('#insertUserTitle');
    const insertUserButton = document.querySelector('#insertUserButton');
    const editUserButton = document.querySelector('#editUserButton');
    if (document.querySelector('#inputID').value == '') {
        formTitle.textContent = "Insertar Usuario";
        insertUserButton.setAttribute("style", "display:inline-block;");
        editUserButton.setAttribute("style", "display:none;");
    } else {
        formTitle.textContent = "Editar Usuario";
        insertUserButton.setAttribute("style", "display:none;");
        editUserButton.setAttribute("style", "display:inline-block;");
    }
}

function cancelEditUser() {
    document.querySelector('#inputID').value = '';
    document.querySelector('#nombre').value = '';
    document.querySelector('#apellido_1').value = '';
    document.querySelector('#apellido_2').value = '';
    document.querySelector('#login').value = '';
    document.querySelector('#mail').value = '';
    document.querySelector('#movil').value = '';
    document.querySelector('#pass').value = '';
    document.querySelector('#passverify').value = '';
    document.querySelector('#sexo').value = '';
    document.querySelector('#activo').value = '';
    changeInsertUserButton();
}

function checkInsertForm(metodo) {
    const nombre = document.querySelector('#nombre');
    const apellido_1 = document.querySelector('#apellido_1');
    const apellido_2 = document.querySelector('#apellido_2');
    const login = document.querySelector('#login');
    const mail = document.querySelector('#mail');
    const movil = document.querySelector('#movil');
    const pass = document.querySelector('#pass');
    const passVerify = document.querySelector('#passverify');
    const gender = document.querySelector('#sexo');
    const status = document.querySelector('#activo');
    const errorDiv = document.querySelector('#insertErrorDiv');
    const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    const errorMessages = [];

    if (nombre.value.trim() === '') {
        errorMessages.push("El nombre no puede estar vacio");
    }

    if (apellido_1.value === '') {
        errorMessages.push("El primer apellido no puede estar vacio");
    }

    if (apellido_2.value === '') {
        console.log("nombre vacio");
        errorMessages.push("El segundo de usuario no puede estar vacio");
    }

    if (login.value === '') {
        console.log("nombre vacio");
        errorMessages.push("El nombre de usuario no puede estar vacio");
    }

    if (!(emailRegex.test(mail.value))) {
        errorMessages.push("Introduce un correo electrónico valido");
    }

    if (movil.value === '' || !/^\d+$/.test(movil.value)) {
        errorMessages.push("Introduzca un telefono móvil correcto");
    }

    if (pass.value === '') {
        errorMessages.push("La contraseña no puede estar vacia");
    }

    if (pass.value != passVerify.value) {
        errorMessages.push("Escriba la contraseña correctamente");
    }

    if (gender.value === '') {
        errorMessages.push("Especifique un genero o seleccione \"otro\"");
    }

    if (status.value === '') {
        errorMessages.push("El usuario debe estar activado o desactivado");
    }


    if (errorMessages.length > 0) {
        console.log("errores");
        errorDiv.classList.remove('d-none');
        errorDiv.innerHTML = '<strong>Error:</strong><br>' + errorMessages.join('<br>');
    } else {
        console.log("vacio");
        errorDiv.classList.add('d-none');
        insertarUsuario(metodo);
    }
}

function insertarUsuario(metodo) {
    let opciones = { method: "GET" };
    let parametros = "controlador=Usuarios&metodo=" + metodo;
    // WE DO THIS CUS THE ID IS DISABLED ON THE FORM
    if (metodo == "editarUsuario") {
        parametros += "&id_Usuario=" + document.querySelector('#inputID').value;
    }
    parametros += "&" + new URLSearchParams(new FormData(document.getElementById("editUserForm"))).toString();
    console.log("parametros de isnertar");
    console.log(parametros);
    fetch("controladores/C_Ajax.php?" + parametros, opciones)
        .then(res => {
            if (res.ok) {
                console.log('Respuesta ok');
                return res.text();
            }
        })
        .then(vista => {
            buscarUsuarios(null, null, "buscarUsuarios", "buscarTodos");
        })
        .catch(err => {
            console.log("Error al realizar la peticion.", err.message);
        });
}

function guardarInformacion(id_Usuario) {
    buscarUsuarios(id_Usuario);
}


function editarUsuario(id_Usuario) {
    let opciones = { method: "GET" };
    let parametros = "controlador=Usuarios&metodo=editarUsuario";
    parametros += "&id_Usuario=" + document.querySelector('#idEditar').value;
    parametros += "&" + new URLSearchParams(new FormData(document.getElementById("formularioEditarUsuario"))).toString();
    console.log("AOEOELE")
    console.log(parametros);
    fetch("controladores/C_Ajax.php?" + parametros, opciones)
        .then(res => {
            if (res.ok) {
                console.log('Respuesta ok');
                return res.text();
            }
        })
        .then(vista => {
            buscarUsuarios();
        })
        .catch(err => {
            console.log("Error al realizar la peticion.", err.message);
        });
}

function displayInsertUserView() {
    const view = document.querySelector('#insertFields');
    const btn = document.querySelector('#displayInsertFormBtn');
    view.classList.contains("d-none") ? (view.classList.remove("d-none"), btn.classList.replace("btn-outline-primary", "btn-primary")) : (view.classList.add("d-none"), btn.classList.replace("btn-primary", "btn-outline-primary"));
}

function displaySearchUserView() {
    const view = document.querySelector('#searchFields');
    const btn = document.querySelector('#displaySearchFormBtn');
    view.classList.contains("d-none") ? (view.classList.remove("d-none"), btn.classList.replace("btn-outline-primary", "btn-primary")) : (view.classList.add("d-none"), btn.classList.replace("btn-primary", "btn-outline-primary"));
}
