<?php
    class ProductosModel {
        private $PDO;
        public function __construct()
        {
            require_once("c://xampp/htdocs/catalogo/config/db.php");
            $con = new db();
            $this->PDO = $con->conexion();
        }

        public function index(){
            $stament = $this->PDO->prepare("SELECT * FROM productos");
            return ($stament->execute())
                ? $stament->fetchAll()
                : false;
        }
    }

?>