<?php session_start();
    $getPost=array_merge($_POST,$_GET,$_FILES);

    if(isset($_GET['pagina'])){
        $_GET['pagina'] = $_GET['pagina']+1;
    }

    if(isset($getPost['controlador'])){
        $controlador= 'C_' .$getPost['controlador'];
        if(isset($getPost['metodo'])){
            $metodo= $getPost['metodo'];
            if(file_exists($controlador.'.php')){
                require_once $controlador.'.php';
                $objControlador= new $controlador();
                if(method_exists($objControlador, $metodo)){
                    $objControlador->$metodo($getPost);
                }else{
                    echo 'Error AX-04';
                }
            }else{
                echo 'Error AX-03';
            }
        }else{
            echo 'Error AX-02';
        }
    }else{
        echo 'Error AX-01';
    }
