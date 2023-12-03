<?php

class PaginationService {
    public static function getPaginationData($currentPage, $itemsPerPage, $arrayToPaginationData=array()) {
        $totalItems = count($arrayToPaginationData);
        $numberOfPages = ceil($totalItems / $itemsPerPage);

        if($currentPage <= 0){
            $currentPage = 1;
        }

        if($currentPage > $numberOfPages){
            $currentPage = $numberOfPages;
        }


        $pageFirstResult = ($currentPage - 1) * $itemsPerPage;
        $resultadosPagina = $totalItems / $itemsPerPage;

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
