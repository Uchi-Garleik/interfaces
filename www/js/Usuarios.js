changeInsertUserButton();

function buscarUsuarios(id_Usuario, pagina, metodo, filtro) {
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
                        console.log("incorrect login");
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
                        // Create a new user object
                        let user = {
                            id: row.querySelector('.id_Usuario').textContent,
                            name: row.querySelector('.nombre').textContent,
                            lastName: row.querySelector('.apellido_1').textContent,
                            surname: row.querySelector('.apellido_2').textContent,
                            email: row.querySelector('.mail').textContent,
                            // Assuming 'login' is the username
                            username: row.querySelector('.login').textContent,
                            password: row.querySelector('.pass').textContent,
                            gender: row.querySelector('.genero').textContent === 'Hombre' ? 'Male' : 'Female',
                            // Assuming 'activo' is the enabled status
                            enabled: row.querySelector('.estado').textContent === 'activo'
                        };

                        // Add the user object to the users array
                        users.push(user);
                    }

                    let buttons = document.querySelectorAll('.buttonEditUser');
                    for (let index = 0; index < buttons.length; index++) {
                        buttons[index].addEventListener("click", () => {
                            displayEditUserForm(users[index]);
                        });
                    }




                    // Now 'users' is an array of user objects
                    console.log(users);
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

    // Fill the form with the user's information
    document.querySelector('#inputID').value = user.id;
    document.querySelector('#inputName').value = user.name;
    document.querySelector('#inputLastName').value = user.lastName;
    document.querySelector('#inputSurname').value = user.surname;
    document.querySelector('#inputUsername').value = user.username;
    document.querySelector('#inputEmail').value = user.email;
    document.querySelector('#inputPassword').value = user.password;
    document.querySelector('#inputRetypePassword').value = user.password;
    document.querySelector('#inputGender').value = user.gender;
    document.querySelector('#inputEnabled').value = user.enabled ? 'Yes' : 'No';
    changeInsertUserButton();
    // Display the edit user form
    editUserForm.style.display = 'block';

}

function changeInsertUserButton() {
    const insertUserButton = document.querySelector('#insertUserButton');
    if (document.querySelector('#inputID').value == '') {
        insertUserButton.innerHTML = "Insertar Usuario"
    }else{
        insertUserButton.innerHTML = "Guardar Usuario"
    }
    
}

function cancelEditUser() {
    document.querySelector('#inputID').value = '';
    document.querySelector('#inputName').value = '';
    document.querySelector('#inputLastName').value = '';
    document.querySelector('#inputSurname').value = '';
    document.querySelector('#inputUsername').value = '';
    document.querySelector('#inputEmail').value = '';
    document.querySelector('#inputPassword').value = '';
    document.querySelector('#inputRetypePassword').value = '';
    document.querySelector('#inputGender').value = '';
    document.querySelector('#inputEnabled').value = '';
    changeInsertUserButton();
}

function insertarUsuario() {
    let opciones = { method: "GET" };
    let parametros = "controlador=Usuarios&metodo=insertarUsuario";
    parametros += "&" + new URLSearchParams(new FormData(document.getElementById("formularioInsertarUsuario"))).toString();
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