<?php
    class CategoriasModel {
        private $PDO;
        public function __construct()
        {
            require_once("c://xampp/htdocs/catalogo/config/db.php");
            $con = new db();
            $this->PDO = $con->conexion();
        }

        public function index(){
            $stament = $this->PDO->prepare("SELECT * FROM categorias");
            return ($stament->execute())
                ? $stament->fetchAll()
                : false;
        }
    }

?>