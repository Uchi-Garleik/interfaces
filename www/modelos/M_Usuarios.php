<?php
require_once 'Modelo.php';
require_once 'DAO.php';
class M_Usuarios extends Modelo
{
    public $DAO;

    public function __construct()
    {
        parent::__construct();
        $this->DAO = new DAO();
    }

    public function buscarUsuarios($filtros = array())
    {
        $id_Usuario = '';
        $nombre = '';
        $mail = '';
        $movil = '';
        $usuario = '';
        $pass = '';
        $filtro = '';
        $login = '';
        extract($filtros);
        $SQL = "SELECT * FROM usuarios WHERE 1=1 ";



        if ($filtro == 'validarUsuario' || $usuario != '' && $pass != '') {
            $usuario = addslashes($usuario);
            $pass = addslashes($pass);
            $SQL .= " AND login = '$usuario' AND pass = MD5('$pass') ";
        } elseif ($filtro == 'insertUsuario') {
            $login = addslashes($login);
            $mail = addslashes($mail);
            $SQL .= " AND login = '$login' OR mail = '$mail' ";
        } else {
            if ($id_Usuario != '') {
                $aTexto = explode(' ', $id_Usuario);
                $SQL .= " AND (1=2 ";
                foreach ($aTexto as $palabra) {
                    $SQL .= " OR id_Usuario LIKE $palabra";
                }
                $SQL .= " ) ";
            }
            if ($nombre != '') {
                $aTexto = explode(' ', $nombre);
                $SQL .= " AND (1=2 ";
                foreach ($aTexto as $palabra) {
                    $SQL .= " OR nombre LIKE '%$palabra%' OR apellido_1 LIKE '%$palabra%' OR apellido_2 LIKE '%$palabra%'";
                }
                $SQL .= " ) ";
            }

            if ($login != '') {
                $aTexto = explode(' ', $login);
                $SQL .= " AND (1=2 ";
                foreach ($aTexto as $palabra) {
                    $SQL .= " OR login LIKE '%$palabra%'";
                }
                $SQL .= " ) ";
            }

            if ($mail != '') {
                $aTexto = explode(' ', $mail);
                $SQL .= " AND (1=2 ";
                foreach ($aTexto as $palabra) {
                    $SQL .= " OR mail LIKE '%$palabra%'";
                }
                $SQL .= " ) ";
            }
            if ($movil != '') {
                $aTexto = explode(' ', $movil);
                $SQL .= " AND (1=2 ";
                foreach ($aTexto as $palabra) {
                    $SQL .= " OR movil LIKE '%$palabra%'";
                }
                $SQL .= " ) ";
            }
        }

        $usuarios = $this->DAO->consultar($SQL);

        return $usuarios;
    }

    public function insertarUsuario($filtros = array())
    {
        $id_Usuario = '';
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

        if ($mail == "") {
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

        if ($activo == "") {
            $activo = " ";
        }

        if ($activo == 'activo') {
            $activo = 'S';
        } else {
            $activo = 'N';
        }

        if ($id_Usuario != '') {
            // $SQL = "UPDATE usuarios SET nombre ='$nombre', apellido_1 = '$apellido_1', apellido_2 = '$apellido_2', sexo = '$sexo', mail = '$mail', movil = '$movil', login = '$login', pass =MD5('$pass'), activo = '$activo' WHERE id_Usuario = $id_Usuario";
            $SQL = "UPDATE usuarios SET nombre ='$nombre', apellido_1 = '$apellido_1', apellido_2 = '$apellido_2', sexo = '$sexo', mail = '$mail', movil = '$movil', login = '$login', activo = '$activo' WHERE id_Usuario = $id_Usuario";
            echo $SQL;
            $this->DAO->actualizar($SQL);
        } else {
            $usuarios = $this->buscarUsuarios(array("login" => $login, "mail" => $mail, "filtro" => "insertUsuario"));
            if (sizeof($usuarios) > 0) {
                echo "{ \"mensaje\": \"Ya existe un usuario con ese nombre\", \"codigo\": 1}";
            } else {
                $SQL = "INSERT INTO usuarios (nombre, apellido_1, apellido_2, sexo, fecha_Alta, mail, movil, login, pass, activo) VALUES (";
                $SQL .= "'$nombre', '$apellido_1', '$apellido_2', '$sexo', NOW(), '$mail', '$movil', '$login', MD5('$pass'), '$activo');";
                $this->DAO->insertar($SQL);
                echo "{ \"mensaje\": \"Usuario Introducido Correctamente\", \"codigo\": 0}";
            }

        }
    }

}
