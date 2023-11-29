function buscarUsuarios(id_Usuario, pagina, filtro){
    let opciones = { method: "GET" };
    let parametros = "controlador=Usuarios&metodo="+filtro;
    parametros += "&" + new URLSearchParams(new FormData(document.getElementById("formularioBuscar"))).toString();
    if ( id_Usuario != null ) {
        parametros += "&id_Usuario=" + id_Usuario;
    }

    if ( pagina != null ) {
        parametros += "&pagina=" + pagina;
    }

    if ( filtro != null ){
        parametros += "&filtro="+filtro;
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
                case "validarUsuario":
                    if(vista == "S"){
                        console.log("Hola");
                        document.location = "/index.php";
                    }else{
                        console.log("adio");
                    }
                    
                    break;
                default:
                    
                    break;
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