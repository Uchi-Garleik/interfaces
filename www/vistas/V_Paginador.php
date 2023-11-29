<?php

$paginationData = $datos['paginationData'];
echo "<br><br><br> PAGINATION DATA IN V_PAGINADOR";
var_dump($paginationData);

// for ($i=0; $i < $paginationData['numberOfPages'] ; $i++) {
//     echo "<span class=\"pagina$i\" onclick=\"buscarUsuarios(null, $i)\">". $i+1 ."...</span>";
// }

echo "<div class=\"pagination\">";


    // BEGINNING
    echo "<div class=\"page-item\">";
        echo "<span class=\"page-link\" onclick=\"buscarUsuarios(null,". $paginationData['numberOfPages']-$paginationData['numberOfPages'] .",'buscarUsuarios','buscarTodos')\">First</span>";
    echo "</div>";


    // CURRENT MINUS ONE
    // ONLY IF PAGE IS GREATER THAN 1
    echo "<div class=\"page-item\">";
        echo "<span class=\"page-link\" onclick=\"buscarUsuarios(null,". $paginationData['currentPage']-2 .",'buscarUsuarios', 'buscarTodos')\">{". $paginationData['currentPage']-1 ."}</span>";
    echo "</div>";

    // CURRENT PAGE
    echo "<div class=\"page-item\">";
        echo "<span class=\"page-link\" onclick=\"buscarUsuarios(null,". $paginationData['currentPage']-1 .",'buscarUsuarios','buscarTodos')\">[". $paginationData['currentPage'] ."]</span>";
    echo "</div>";

    // CURRENT PLUS ONE
    // WHILE PAGE IS LOWER THAN MAX
    echo "<div class=\"page-item\">";
        echo "<span class=\"page-link\" onclick=\"buscarUsuarios(null,". $paginationData['currentPage'] .",'buscarUsuarios','buscarTodos')\">(". $paginationData['currentPage']+1 .")</span>";
    echo "</div>";

    // END
    echo "<div class=\"page-item\">";
        echo "<span class=\"page-link\" onclick=\"buscarUsuarios(null,". $paginationData['currentPage'] .",'buscarUsuarios','buscarTodos')\">Last</span>";
    echo "</div>";

echo "</div>";

?>
