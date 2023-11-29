<?php
require_once 'Controlador.php';
require_once 'vistas/Vista.php';
require_once 'modelos/M_Usuarios.php';
require_once 'services/PaginationService.php';

class C_Usuarios extends Controlador
{
    private $modelo;
    public function __construct()
    {
        parent::__construct();
        $this->modelo = new M_Usuarios();
    }

    public function getVistaUsuariosConPaginacion($currentPage)
    {
        $filtros = array(); // You can add filters if needed
        $usuarios = $this->modelo->buscarUsuarios($filtros);

        // Assuming 10 items per page, adjust this based on your requirement
        $itemsPerPage = 10;

        $paginationData = PaginationService::getPaginationData($currentPage, count($usuarios), $itemsPerPage);

        // Get only the records for the current page
        $usuariosSubset = array_slice($usuarios, $paginationData['pageFirstResult'], $itemsPerPage);

        Vista::render('V_Usuarios_Listado.php', array('usuarios' => $usuariosSubset));
        Vista::render('V_Paginador.php', array('paginationData' => $paginationData));
    }

    public function vistaUsuariosPaginacion($currentPage, $itemsPerPage)
    {
        $usuarios =  $this->modelo->buscarUsuarios();
        $paginationData = PaginationService::getPaginationData($currentPage, $itemsPerPage, $usuarios);
        $usuariosPaginado = array_slice($usuarios, $paginationData['pageFirstResult'], $itemsPerPage);
        Vista::render('V_Paginador.php', array('paginationData' => $paginationData));
        Vista::render('V_Usuarios_Listado.php', array('usuarios' => $usuariosPaginado));
    }

    public function validarUsuario($filtros)
    {
        $valido = 'N';
        $usuarios = $this->modelo->buscarUsuarios($filtros);
        if (!empty($usuarios)) {
            $valido = 'S';
            $_SESSION['usuario'] = $usuarios[0]['login'];
        }
        echo $valido;
        return $valido;
    }

    public function getVistaUsuarios()
    {
        Vista::render('V_Usuarios.php');
        //$this->buscarUsuarios();
        //$this->vistaUsuariosPaginacion();
        //$this->vistaUsuariosPaginacion(1,3);

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
                    $usuarios = $this->modelo->buscarUsuarios($filtros);
                    if (isset($_GET['pagina'])) {
                        //$_GET['pagina'] = $_GET['pagina']+1;
                        $this->vistaUsuariosPaginacion($_GET['pagina'], 4);
                    } else {
                        $this->vistaUsuariosPaginacion(1, 4);
                    }
                    break;
                default:
                    $usuarios = $this->modelo->buscarUsuarios($filtros);
                    Vista::render('V_Usuarios_Listado.php', array('usuarios' => $usuarios));
                    break;
            }
        } else {
            $usuarios = $this->modelo->buscarUsuarios($filtros);
            if (isset($_GET['pagina'])) {
                //$_GET['pagina'] = $_GET['pagina']+1;
                $this->vistaUsuariosPaginacion($_GET['pagina'], 4);
            } else {
                $this->vistaUsuariosPaginacion(1, 4);
            }
            //Vista::render('V_Usuarios_Listado.php', array('usuarios'=>$usuarios));
        }
    }

    public function insertarUsuario($filtros = array())
    {
        $usuarios = $this->modelo->insertarUsuario($filtros);
    }

    public function editarUsuario($filtros = array())
    {
        $this->modelo->editarUsuario($filtros);
    }
}
