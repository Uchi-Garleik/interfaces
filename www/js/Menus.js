buscarMenus("getMenus");

function buscarMenus(metodo) {
    let opciones = { method: "GET" };
    let parametros = "controlador=Menus&metodo=" + metodo;
    // parametros += "&" + new URLSearchParams(new FormData(document.getElementById("formularioBuscar"))).toString();
    console.log(parametros)
    fetch("controladores/C_Ajax.php?" + parametros, opciones)
        .then(res => {
            if (res.ok) {
                console.log('Respuesta ok');
                return res.text();
            }
        })
        .then(vista => {
            console.log(vista);

        })
        .catch(err => {
            console.log("Error al realizar la peticion.", err.message);
        });
}