function buscarUsuarios(id_Usuario, pagina){
    let opciones = { method: "GET" };
    let parametros = "controlador=Usuarios&metodo=buscarUsuarios";
    parametros += "&" + new URLSearchParams(new FormData(document.getElementById("formularioBuscar"))).toString();
    if ( id_Usuario != null ) {
        parametros += "&id_Usuario=" + id_Usuario;
    }

    if ( pagina != null ) {
        parametros += "&pagina=" + pagina;
    }

    fetch("controladores/C_Ajax.php?" + parametros, opciones)
        .then(res => {
            if (res.ok) {
                console.log('Respuesta ok');
                return res.text();
            }
        })
        .then(vista => {
            document.getElementById("capaResultadosBusqueda").innerHTML = vista;
            if (id_Usuario != null) {
                document.querySelector('#idEditar').value = document.querySelector('td.id_Usuario').innerHTML;
                document.querySelector('#nombreEditar').value = document.querySelector('td.nombre').innerHTML;
                document.querySelector('#apellido_1_Editar').value = document.querySelector('td.apellido_1').innerHTML;
                document.querySelector('#apellido_2_Editar').value = document.querySelector('td.apellido_2').innerHTML;
                switch (document.querySelector('td.genero').innerHTML) {
                    case "Hombre":
                        document.querySelector('#hombreEditar').checked = true;
                        break;
                    case "Mujer":
                        document.querySelector('#mujerEditar').checked = true;
                        break;
                    case "No especificado":
                        document.querySelector('#nodecirEditar').checked = true;
                        break;
                    default:
                        break;
                }
                document.querySelector('#mailEditar').value = document.querySelector('td.mail').innerHTML;
                document.querySelector('#movilEditar').value = document.querySelector('td.movil').innerHTML;
                document.querySelector('#loginEditar').value = document.querySelector('td.login').innerHTML;
                document.querySelector('#passEditar').value = document.querySelector('td.pass').innerHTML;
                switch (document.querySelector('td.estado').innerHTML) {
                    case "activo":
                        document.querySelector('#activoSiEditar').checked = true;
                        break;
                    case "inactivo":
                        document.querySelector('#activoNoEditar').checked = true;
                        break;
                    default:
                        break;
                }
            }
        })
        .catch(err => {
            console.log("Error al realizar la peticion.", err.message);
        });
}

function insertarUsuario(){
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

function guardarInformacion(id_Usuario){
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