<?php
    $usuarios= $datos['usuarios'];
    echo '<div id="tableDiv" class="container-fluid table-responsive">';
    echo '<table class="table container-fluid table-light table-striped table-bordered table-hover">';
    echo '<thead class="thead-dark">';
    echo '<tr>';
    echo '<th scope="col">Id</th>';
    echo '<th scope="col">Nombre</th>';
    echo '<th scope="col">Apellido 1</th>';
    echo '<th scope="col">Apellido 2</th>';
    echo '<th scope="col">Email</th>';
    echo '<th scope="col">Movil</th>';
    echo '<th scope="col">Sexo</th>';
    echo '<th scope="col">Activo</th>';
    echo '<th scope="col">Login</th>';
    echo '<th scope="col">Pass</th>';
    echo '<th scope="col">Editar</th>';
    echo '</tr>';
    echo '</thead>';

    function returnEstado($fila){
        if ($fila['activo'] == 'S') {
            return "activo";
        }else{
            return "inactivo";
        }
    }

    function returnGenero($fila){
        if ($fila['sexo'] == 'H') {
            return "Hombre";
        }
        if ($fila['sexo'] == "M") {
            return "Mujer";
        }else{
            return "No especificado";
        }
    }

    foreach($usuarios as $fila){
        echo '<tr>';
        echo '<td scope="row" class="id_Usuario">'.$fila['id_Usuario'].'</td>';
        echo '<td scope="row" class="nombre">'.$fila['nombre'].'</td>';
        echo '<td class="apellido_1">'.$fila['apellido_1'].'</td>';
        echo '<td class="apellido_2">'.$fila['apellido_2'].'</td>';
        echo '<td class="mail">'.$fila['mail'].'</td>';
        echo '<td class="movil">'.$fila['movil'].'</td>';
        echo '<td class="genero">'.returnGenero($fila).'</td>';
        echo '<td class="estado">'.returnEstado($fila).'</td>';
        echo '<td class="login">'.$fila['login'].'</td>';
        echo '<td class="pass">'.$fila['pass'].'</td>';
//        echo '<td> <button onclick="guardarInformacion('.$fila['id_Usuario'].')">Editar</button> </td>';
        echo '<td> <button class="buttonEditUser">Editar</button> </td>';
        echo '</tr>';
    }
    echo '</table>';
    echo '</div>';
?>