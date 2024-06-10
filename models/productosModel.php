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
            $stament = $this->PDO->prepare("SELECT productos.*, categorias.nombre AS nombre_categoria FROM productos INNER JOIN categorias ON categorias.id = productos.id_categoria");
            return ($stament->execute())
                ? $stament->fetchAll()
                : false;
        }

        public function insertar($nombre,$descripcion,$precio,$cantidad,$categoria){
            $stament = $this->PDO->prepare("INSERT INTO productos VALUES (null,:nombre,:descripcion,:precio,:cantidad,:categoria)");

            $stament->bindParam(":nombre",$nombre);
            $stament->bindParam(":descripcion",$descripcion);
            $stament->bindParam(":precio",$precio);
            $stament->bindParam(":cantidad",$cantidad);
            $stament->bindParam(":categoria",$categoria);

            // //Recupera el id
            // $idPersona = $this->PDO->lastInsertId();

            return ($stament->execute()) 
                ? true
                : false;
        }

        public function update($id,$nombre,$descripcion,$precio,$cantidad,$categoria){
            $stament = $this->PDO->prepare("UPDATE productos SET nombre = :nombre, descripcion = :descripcion, precio = :precio, cantidad = :cantidad, id_categoria = :categoria WHERE id = :id");
            $stament->bindParam(":nombre",$nombre);
            $stament->bindParam(":descripcion",$descripcion);
            $stament->bindParam(":precio",$precio);
            $stament->bindParam(":cantidad",$cantidad);
            $stament->bindParam(":categoria",$categoria);
            $stament->bindParam(":id",$id);

            return ($stament->execute())
                ? true
                : false;
        }

        public function delete($id){
            $stament = $this->PDO->prepare("DELETE FROM productos WHERE id = :id");
            $stament->bindParam(":id",$id);

            return ($stament->execute())
                ? true
                : false;
        }

        public function cantProductos(){
            $stament = $this->PDO->prepare("SELECT COUNT(*) AS cantidad FROM productos");

            if ($stament->execute()) {
                $row = $stament->fetch(); // Obtener la primera fila
                return $row['cantidad'];  // Devolver el valor de la columna 'cantidad'
            } else {
                return false;
            }
        }

    }

?>