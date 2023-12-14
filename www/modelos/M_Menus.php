<?php
require_once 'Modelo.php';
require_once 'DAO.php';
class M_Menus extends Modelo
{
    public $DAO;

    public function __construct()
    {
        parent::__construct();
        $this->DAO = new DAO();
    }

    
    public function getMenus(){
        $sql = "SELECT * FROM opcionesmenu WHERE 1 = 1";
        return $this->DAO->consultar($sql);
    }


}
