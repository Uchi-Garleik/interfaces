<?php

$paginationData = $datos['paginationData'];
echo "<br><br><br>";
var_dump($paginationData);

// for ($i=0; $i < $paginationData['numberOfPages'] ; $i++) {
//     echo "<span class=\"pagina$i\" onclick=\"buscarUsuarios(null, $i)\">". $i+1 ."...</span>";
// }

//BACKWARDS
echo "<span class=\"sidepaginator\" onclick=\"buscarUsuarios(null,". ($paginationData['numberOfPages']-$paginationData['numberofPages'])+1 .  ")\"> \<\< </span>";

//NUMBERS
echo "<span class=\"numberPaginator\" onclick=\"buscarUsuarios(null,". $paginationData['currentPage']-2 .")\">". $paginationData['currentPage']-2 ."...</span>";
echo "<span class=\"numberpaginator\" onclick=\"buscarUsuarios(null,". $paginationData['currentPage']-1 .")\">". $paginationData['currentPage']-1 ."...</span>";
echo "<span class=\"numberpaginator\" onclick=\"buscarUsuarios(null,". $paginationData['currentPage']+1 .")\">". $paginationData['currentPage']+1 ."...</span>";

// FRONTWARDS
echo "<span class=\"sidepaginator\" onclick=\"buscarUsuarios(null,". $paginationData['numberOfPages'] .  ")\"> \>\> </span>";

?>
