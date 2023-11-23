function crearPaginado(){
    console.log('€');
    const resultadosPorPagina = document.querySelector('#numResultadosPagina');

    let opciones = { method: "GET" };
    let parametros = "controlador=Usuarios&metodo=buscarUsuarios";
    parametros += "&" + new URLSearchParams(new FormData(document.getElementById("formularioBuscar"))).toString();

    fetch("controladores/C_Ajax.php?" + parametros, opciones)
        .then(res => {
            if (res.ok) {
                console.log('Respuesta ok');
                return res.text();
            }
        })
        .then(vista => {
            
        })
        .catch(err => {
            console.log("Error al realizar la peticion.", err.message);
        });


}