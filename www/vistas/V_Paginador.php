<?php

$paginationData = $datos['paginationData'];

echo "<div class=\"justify-content-center align-items-center d-flex flex-column\">";
echo "<div class=\"pagination\">";

if ($paginationData['currentPage'] > 1) {
    echo "<div class=\"page-item\">";
    echo "<span class=\"page-link\" onclick=\"buscarUsuarios(null," . $paginationData['numberOfPages'] - $paginationData['numberOfPages'] . ",'buscarUsuarios','buscarTodos')\">First</span>";
    echo "</div>";

    echo "<div class=\"page-item\">";
    echo "<span class=\"page-link\" onclick=\"buscarUsuarios(null," . $paginationData['currentPage'] - 2 . ",'buscarUsuarios', 'buscarTodos')\"><span aria-hidden=\"true\">&laquo;</span><span class=\"sr-only\">Anterior</span></span>";
    echo "</div>";
} else {
    echo "<div class=\"page-item disabled\">";
    echo "<span class=\"page-link\">First</span>";
    echo "</div>";
}


echo "<div class=\"page-item\">";
echo "<span class=\"page-link\" onclick=\"buscarUsuarios(null," . $paginationData['currentPage'] - 1 . ",'buscarUsuarios','buscarTodos')\">" . $paginationData['currentPage'] . "</span>";
echo "</div>";

if ($paginationData['currentPage'] < $paginationData['numberOfPages']) {
    echo "<div class=\"page-item\">";
    echo "<span class=\"page-link\" onclick=\"buscarUsuarios(null," . $paginationData['currentPage'] . ",'buscarUsuarios','buscarTodos')\"><span aria-hidden=\"true\">&raquo;</span><span class=\"sr-only\">Siguiente</span></span>";
    echo "</div>";

    echo "<div class=\"page-item\">";
    echo "<span class=\"page-link\" onclick=\"buscarUsuarios(null," . $paginationData['numberOfPages'] - 1 . ",'buscarUsuarios','buscarTodos')\">Last</span>";
    echo "</div>";
} else {
    echo "<div class=\"page-item disabled\">";
    echo "<span class=\"page-link\">Last</span>";
    echo "</div>";
}
echo "</div>";

echo "<div>Saltar a una pagina: <input type=\"number\" onchange=\"buscarUsuarios(null, this.value-1, 'buscarUsuarios', 'buscarTodos')\"></input></div>";
echo "<br><span> Se han encontrado " . $paginationData['totalItems'] . " resultados diferentes. Con un total de " . $paginationData['numberOfPages'] . " páginas</span>";
echo "</div>";