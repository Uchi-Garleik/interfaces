<?php
    require_once 'Controlador.php';
    require_once 'vistas/Vista.php';
    require_once 'modelos/M_Usuarios.php';

    class C_Usuarios extends Controlador{
        private $modelo;
        public function __construct(){
            parent::__construct();
            $this->modelo = new M_Usuarios();
        }

        public function validarUsuario($filtros){
            $valido='N';
            $usuarios=$this->modelo->buscarUsuarios($filtros);
            if (!empty($usuarios)) {
                $valido = 'S';
                $_SESSION['usuario'] = $usuarios[0]['login'];
            }
            return $valido;
        }

        public function getVistaUsuarios(){
            Vista::render('V_Usuarios.php');
        }
        public function buscarUsuarios($filtros=array()){
            $usuarios=$this->modelo->buscarUsuarios($filtros);
            Vista::render('V_Usuarios_Listado.php', 
                            array('usuarios'=>$usuarios));
        }
    }
?>