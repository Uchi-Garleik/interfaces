<?php

class PaginationService {
    //public static function getPaginationData($currentPage, $totalItems, $itemsPerPage) {
    public static function getPaginationData($currentPage, $itemsPerPage, $arrayToPaginationData=array()) {
        $totalItems = count($arrayToPaginationData);
        $pageFirstResult = ($currentPage - 1) * $itemsPerPage;
        $resultadosPagina = $totalItems / $itemsPerPage;

        echo "<hr> MATH PROBLEM:<br>";
        echo "($currentPage-1)*$itemsPerPage";

        echo "<hr> FIRST PAGE RESULT<br>";
        var_dump($pageFirstResult);
        echo "<hr> CURRENT PAGE<br>";
        var_dump($currentPage);
        echo "<hr> ITEMS PER PAGE<br>";
        var_dump($itemsPerPage);

        $numberOfPages = ceil($totalItems / $itemsPerPage);
        echo "<h1>NUMERO DE PAGINAS</h1> $numberOfPages";
        echo "<h1>NUMERO DE PAGINAS</h1> $totalItems";
        echo "<h1>NUMERO DE PAGINAS</h1> $itemsPerPage";
        // Return relevant pagination data
        return [
            'currentPage' => $currentPage,
            'totalItems' => $totalItems,
            'itemsPerPage' => $itemsPerPage,
            'pageFirstResult' => $pageFirstResult,
            'numberOfPages' => $numberOfPages,
        ];
    }
}

?>
