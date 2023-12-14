<?php
require_once 'Controlador.php';
require_once 'vistas/Vista.php';
require_once 'modelos/M_Menus.php';
require_once 'paginador/PaginationService.php';

class C_Menus extends Controlador
{
    private $modelo;
    public function __construct()
    {
        parent::__construct();
        $this->modelo = new M_Menus();
    }

    public function getMenus(){
        $menus = $this->modelo->getMenus();
        Vista::render("V_Menus.php",array('menus' => $menus));
    }



}
