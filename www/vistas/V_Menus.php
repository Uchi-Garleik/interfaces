<?php

$menus = $datos['menus'];

foreach($menus as $menu){
    if ($menu["ID_PADRE"] = 0) {
        
    }
    echo "<li class=\"nav-item dropdown\">";
        echo "<a class=\"nav-link dropdown-toggle\" href=\"#\" data-bs-toggle=>".$menu["NOMBRE"]."</a>";
    echo "</li>";
}


// <li class="nav-item dropdown">
//     <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown" aria-expanded="false">Menús</a>
//     <ul class="dropdown-menu">
//         <li><a class="dropdown-item" onclick="getVistaMenuSeleccionado('Usuarios', 'getVistaUsuarios')">Usuarios</a></li>
//     </ul>
//</li>