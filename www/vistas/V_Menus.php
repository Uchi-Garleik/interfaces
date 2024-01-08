<?php

$menus = $datos['menus'];
$json = "{\"opciones\": [";
foreach ($menus as $menu) {
    // if ($menu["ID_PADRE"] = 0) {}

    if ($menu["PUBLICO"] == "0") {
        if (isset($_SESSION['usuario'])) {
            $json .=
                "{
                \"id\": \"" . $menu["ID"] . "\",
                \"nombre\": \"" . $menu["NOMBRE"] . "\",
                \"orden\": \"" . $menu["ORDEN"] . "\",
                \"accion\": \"" . $menu["ACCION"] . "\",
                \"idPadre\": \"" . $menu["ID_PADRE"] . "\"
            },";
        }
    } else {
        $json .=
            "{
            \"id\": \"" . $menu["ID"] . "\",
            \"nombre\": \"" . $menu["NOMBRE"] . "\",
            \"orden\": \"" . $menu["ORDEN"] . "\",
            \"accion\": \"" . $menu["ACCION"] . "\",
            \"idPadre\": \"" . $menu["ID_PADRE"] . "\"
        },";
    }
}
$json = substr($json, 0, -1);
$json .= "]}";


echo $json;


//{"opciones":[{"nombre":Usuarios},{"nombre":CRUD},{"nombre":Productos},]}

// <li class="nav-item dropdown">
//     <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown" aria-expanded="false">Menús</a>
//     <ul class="dropdown-menu">
//         <li><a class="dropdown-item" onclick="getVistaMenuSeleccionado('Usuarios', 'getVistaUsuarios')">Usuarios</a></li>
//     </ul>
//</li>

/*
{"opciones":
    [
        {
            "nombre": "Usuarios",
            "orden": "1000",
            "accion": "desplegar",
            "idPadre": "0"
        },
        {
            "nombre": "CRUD",
            "orden": "1100",
            "accion": "buscarUsuarios("busqueda")",
            "idPadre": "1"
        }
    ]
}


array(3) {
  [0]=>
  array(6) {
    ["ID"]=>
    string(1) "1"
    ["NOMBRE"]=>
    string(8) "Usuarios"
    ["ORDEN"]=>
    string(4) "1000"
    ["ACCION"]=>
    string(9) "desplegar"
    ["ID_PADRE"]=>
    string(1) "0"
    ["PUBLICO"]=>
    string(1) "1"
  }
  [1]=>
  array(6) {
    ["ID"]=>
    string(1) "2"
    ["NOMBRE"]=>
    string(4) "CRUD"
    ["ORDEN"]=>
    string(4) "1100"
    ["ACCION"]=>
    string(26) "buscarUsuarios("busqueda")"
    ["ID_PADRE"]=>
    string(1) "1"
    ["PUBLICO"]=>
    string(1) "1"
  }
  [2]=>
  array(6) {
    ["ID"]=>
    string(1) "3"
    ["NOMBRE"]=>
    string(9) "Productos"
    ["ORDEN"]=>
    string(4) "2000"
    ["ACCION"]=>
    string(9) "desplegar"
    ["ID_PADRE"]=>
    string(1) "0"
    ["PUBLICO"]=>
    string(1) "0"
  }
}*/