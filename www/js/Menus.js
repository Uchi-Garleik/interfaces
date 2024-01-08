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
            const arrayListOpciones = [];

            const jsonMenu = JSON.parse(vista);
            console.log(jsonMenu);
            jsonMenu["opciones"].forEach(element => {
                console.log("test");
                const opcion = document.createElement("li");
                const opcionLanzador = document.createElement("a");

                opcion.setAttribute("idBBDD", element["id"]);
                opcion.setAttribute("idPadre", element["idPadre"]);
                opcionLanzador.setAttribute("href", "#");

                opcionLanzador.textContent = element["nombre"];
                opcion.append(opcionLanzador);

                arrayListOpciones.push(opcion);
                console.log("array list opciones")
                console.log(arrayListOpciones)
                const parentElement = arrayListOpciones.find(elementAux => elementAux.getAttribute("idBBDD") === element["idPadre"]);
                // const hasparentElement = arrayListOpciones.some(elementAux => elementAux.getAttribute("idBBDD") === element["idPadre"]);
                if (parentElement) {
                    let checkUL = false;
                    console.log("wtf");
                    console.log(parentElement);

                    console.log(parentElement["childNodes"].forEach(child => {console.log(child)}))

                    for (let index = 0; index < parentElement["childNodes"].length; index++) {
                        console.log("wtf");
                        checkUL = (parentElement["childNodes"][index]["nodeName"] === "UL") ? true : false;
                        console.log(checkUL);
                    }

                    parentElement.classList.add("dropdown");
                    parentElement["childNodes"][0].classList.add("dropdown-toggle");
                    parentElement["childNodes"][0].setAttribute("data-bs-toggle", "dropdown");
                    const dropdownList = document.createElement("ul");
                    dropdownList.classList.add("dropdown-menu");
                    dropdownList.append(opcion)
                    parentElement.append(dropdownList);
                    opcionLanzador.setAttribute("onclick", element["accion"]);
                    opcionLanzador.classList.add("dropdown-item");
                } else {
                    opcion.classList.add("nav-item");
                    // opcion.classList.add("dropdown");
                    opcionLanzador.classList.add("nav-link");
                    //opcionLanzador.classList.add("dropdown-toggle");
                    opcionLanzador.setAttribute("aria-expanded", "false");
                    document.querySelector("#navbarsExample04 ul.navbar-nav").append(opcion);
                }
            });

            console.log(arrayListOpciones);
            document.querySelector('#content').innerHTML = vista;
        })
        .catch(err => {
            console.log("Error al realizar la peticion.", err.message);
        });
}