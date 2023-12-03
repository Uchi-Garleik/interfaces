<?php
require_once 'Controlador.php';
require_once 'vistas/Vista.php';
require_once 'modelos/M_Usuarios.php';
require_once 'paginador/PaginationService.php';

class C_Usuarios extends Controlador
{
    private $modelo;
    public function __construct()
    {
        parent::__construct();
        $this->modelo = new M_Usuarios();
    }

    public function getVistaUsuarios()
    {
        Vista::render('V_Usuarios.php');
    }
    public function buscarUsuarios($filtros = array())
    {
        if (isset($_GET['filtro'])) {
            switch ($_GET['filtro']) {
                case 'login':
                    $valido = 'N';
                    $usuarios = $this->modelo->buscarUsuarios($filtros);
                    if (!empty($usuarios)) {
                        $valido = 'S';
                        $_SESSION['usuario'] = $usuarios[0]['login'];
                    }
                    echo $valido;
                    return $valido;
                    break;
                case 'buscarTodos':
                    if (isset($_GET['pagina'])) {

                        $usuarios = $this->modelo->buscarUsuarios($filtros);

                        $paginationData = PaginationService::getPaginationData($_GET['pagina'], 4, $usuarios);
                        $usuariosPaginado = array_slice($usuarios, $paginationData['pageFirstResult'], 4);

                        Vista::render('V_Usuarios_Listado.php', array('usuarios' => $usuariosPaginado));
                        Vista::render('V_Paginador.php', array('paginationData' => $paginationData));
                    } else {
                        // $this->vistaUsuariosPaginacion(1, 4, $filtros);
                        $usuarios = $this->modelo->buscarUsuarios($filtros);
                        $paginationData = PaginationService::getPaginationData(1, 4, $usuarios);
                        $usuariosPaginado = array_slice($usuarios, $paginationData['pageFirstResult'], 4);
                        Vista::render('V_Usuarios_Listado.php', array('usuarios' => $usuariosPaginado));
                        Vista::render('V_Paginador.php', array('paginationData' => $paginationData));
                    }
                    break;
                default:
                    $usuarios = $this->modelo->buscarUsuarios($filtros);
                    Vista::render('V_Usuarios_Listado.php', array('usuarios' => $usuarios));
                    break;
            }
        } else {

        }
    }

    public function insertarUsuario($filtros = array())
    {
        $usuarios = $this->modelo->insertarUsuario($filtros);
    }

    public function editarUsuario($filtros = array())
    {
        $this->modelo->insertarUsuario($filtros);
    }
}
