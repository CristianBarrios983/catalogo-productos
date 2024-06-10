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

        public function insertar($nombre,$descripcion){
            $stament = $this->PDO->prepare("INSERT INTO categorias VALUES (null,:nombre,:descripcion)");

            $stament->bindParam(":nombre",$nombre);
            $stament->bindParam(":descripcion",$descripcion);

            // //Recupera el id
            // $idPersona = $this->PDO->lastInsertId();

            return ($stament->execute()) 
                ? true
                : false;
        }

        public function show($id){
            $stament = $this->PDO->prepare("SELECT * FROM categorias WHERE id = :id");

            $stament->bindParam(":id", $id);

            return($stament->execute()) 
                ? $stament->fetch()
                : false ;
        }

        public function update($id,$nombre,$descripcion){
            $stament = $this->PDO->prepare("UPDATE categorias SET nombre = :nombre, descripcion = :descripcion WHERE id = :id");
            $stament->bindParam(":nombre",$nombre);
            $stament->bindParam(":descripcion",$descripcion);
            $stament->bindParam(":id",$id);

            return ($stament->execute())
                ? true
                : false;
        }


        public function delete($id){
            $stament = $this->PDO->prepare("DELETE FROM categorias WHERE id = :id");
            $stament->bindParam(":id",$id);

            return ($stament->execute())
                ? true
                : false;
        }

        public function cantCategorias(){
            $stament = $this->PDO->prepare("SELECT COUNT(*) AS cantidad FROM categorias");

            if ($stament->execute()) {
                $row = $stament->fetch(); // Obtener la primera fila
                return $row['cantidad'];  // Devolver el valor de la columna 'cantidad'
            } else {
                return false;
            }
        }

        public function categorias(){
            $stament = $this->PDO->prepare("SELECT id, nombre FROM categorias");

            if ($stament->execute()) {
                $categorias = $stament->fetchAll();

                return $categorias;  // Devolver los valores en un array
            } else {
                return false;
            }
        }
    }

?>