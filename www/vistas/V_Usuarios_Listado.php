<?php
    $usuarios= $datos['usuarios'];
    echo '<div id="tableDiv" class="container-fluid table-responsive">';
    echo '<table class="table container-fluid table-light table-striped table-bordered table-hover">';
    echo '<thead class="thead-dark">';
    echo '<tr>';
    echo '<th scope="col">Nombre</th>';
    echo '<th scope="col">Apellido 1</th>';
    echo '<th scope="col">Apellido 2</th>';
    echo '<th scope="col">Email</th>';
    echo '<th scope="col">Movil</th>';
    echo '<th scope="col">Sexo</th>';
    echo '<th scope="col">Activo</th>';
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
        echo '<td scope="row">'.$fila['nombre'].'</td>';
        echo '<td>'.$fila['apellido_1'].'</td>';
        echo '<td>'.$fila['apellido_2'].'</td>';
        echo '<td>'.$fila['mail'].'</td>';
        echo '<td>'.$fila['movil'].'</td>';
        echo '<td>'.returnGenero($fila).'</td>';
        echo '<td>'.returnEstado($fila).'</td>';
        echo '<td> <button>Editar</button> </td>';
        echo '</tr>';
    }

    echo '</table>';
    echo '</div>';
?>