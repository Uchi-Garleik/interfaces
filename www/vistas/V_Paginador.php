<?php

require_once 'modelos/DAO.php';


$modelo = '';

$modelo = new DAO();
$query = "SELECT COUNT(id) as total_rows FROM tu_tabla";
$queri = $modelo -> actualizar($query);
$limit = 5; // Número de elementos por página

$output = '';

// Construye los enlaces de paginación
for ($i = 1; $i <= $total_pages; $i++) {
    $output .= '<span class="pagination-link" style="cursor:pointer;" data-page="'.$i.'">'.$i.'</span>';
}

// Devuelve los enlaces de paginación al script JS
echo $output;

?>