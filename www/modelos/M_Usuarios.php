<?php
    require_once 'Modelo.php';
    require_once 'DAO.php';
    class M_Usuarios extends Modelo{
        public $DAO;

        public function __construct(){
            parent::__construct();
            $this->DAO = new DAO();
        }

        public function buscarUsuarios($filtros=array()){
            $id_Usuario='';
            $nombre='';
            $mail='';
            $movil='';
            $usuario = '';
            $pass = '';
            extract($filtros);
            
            $SQL="SELECT * FROM usuarios WHERE 1=1 ";
            
            if($usuario != '' && $pass != ''){
                $usuario = addslashes($usuario);
                $pass = addslashes($pass);
                $SQL.= " AND login = '$usuario' AND pass = MD5('$pass') ";
            }else{
                if($id_Usuario!=''){
                    $aTexto=explode(' ',$id_Usuario);
                    $SQL.=" AND (1=2 ";
                    foreach ($aTexto as $palabra){
                        $SQL.=" OR id_Usuario LIKE $palabra";
                    }
                    $SQL.=" ) ";
                }
                if($nombre!=''){
                    $aTexto=explode(' ', $nombre);
                    $SQL.=" AND (1=2 ";
                    foreach ($aTexto as $palabra){
                        $SQL.=" OR nombre LIKE '%$palabra%' OR apellido_1 LIKE '%$palabra%' OR apellido_2 LIKE '%$palabra%'";
                    }
                    $SQL.=" ) ";
                }
                if($mail!=''){
                    $aTexto=explode(' ', $mail);
                    $SQL.=" AND (1=2 ";
                    foreach ($aTexto as $palabra){
                        $SQL.=" OR mail LIKE '%$palabra%'";
                    }
                    $SQL.=" ) ";
                }
                if($movil!=''){
                    $aTexto=explode(' ', $movil);
                    $SQL.=" AND (1=2 ";
                    foreach ($aTexto as $palabra){
                        $SQL.=" OR movil LIKE '%$palabra%'";
                    }
                    $SQL.=" ) ";
                }
            }
            // echo $SQL;
            $usuarios=$this->DAO->consultar($SQL);
            return $usuarios;
        }

        public function insertarUsuario($filtros=array()){
            extract($filtros);

            if ($nombre == "") {
                $nombre = " ";
            }

            if ($apellido_1 == "") {
                $apellido_1 = " ";
            }
            
            if ($apellido_2 == "") {
                $apellido_2 = " ";
            }
            
            if ($sexo == "") {
                $sexo = " ";
            }
            
            if ($movil == "") {
                $movil = " ";
            }


            $SQL = "INSERT INTO usuarios (nombre, apellido_1, apellido_2, sexo, fecha_Alta, mail, movil, login, pass, activo) VALUES (";
            $SQL .= "'$nombre', '$apellido_1', '$apellido_2', '$sexo', NOW(), '$mail', '$movil', '$login', MD5('$pass'), '$activo');";
            echo $SQL;
            $this->DAO->insertar($SQL);
        }
        public function editarUsuario($filtros=array()){
            extract($filtros);
            //var_dump($filtros);
            if ($nombre == "") {
                $nombre = " ";
            }

            if ($apellido_1 == "") {
                $apellido_1 = " ";
            }
            
            if ($apellido_2 == "") {
                $apellido_2 = " ";
            }
            
            if ($sexoEditar == "") {
                $sexoEditar = " ";
            }

            if($mail == ""){
                $mail = "";
            }
            
            if ($movil == "") {
                $movil = " ";
            }
            if ($login == "") {
                $login = " ";
            }

            if ($pass == "") {
                $pass = " ";
            }

            if ($activoEditar == "") {
                $activoEditar = " ";
            }
            
            
            $SQL = "UPDATE usuarios SET nombre ='$nombre', apellido_1 = '$apellido_1', apellido_2 = '$apellido_2', sexo = '$sexoEditar', mail = '$mail', movil = '$movil', login = '$login', pass =MD5('$pass'), activo = '$activoEditar' WHERE id_Usuario = $id_Usuario";
            echo $SQL;
            $this->DAO->actualizar($SQL);
        }
    }
?>