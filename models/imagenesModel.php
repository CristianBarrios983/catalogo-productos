<?php
    class ImagenesModel {
        private $PDO;
        public function __construct()
        {
            require_once("c://xampp/htdocs/catalogo/config/db.php");
            $con = new db();
            $this->PDO = $con->conexion();
        }

        // public function index(){
        //     $stament = $this->PDO->prepare("SELECT * FROM imagenes");
        //     return ($stament->execute())
        //         ? $stament->fetchAll()
        //         : false;
        // }

        public function insertar($rutaFinal,$id){
            $stament = $this->PDO->prepare("INSERT INTO imagenes VALUES (null,:ruta,:producto)");

            $stament->bindParam(":ruta",$rutaFinal);
            $stament->bindParam(":producto",$id);


            return ($stament->execute()) 
                ? true
                : false;
        }

        public function show($id){
            $stament = $this->PDO->prepare("SELECT * FROM imagenes WHERE producto = :id");

            $stament->bindParam(":id", $id);

            return($stament->execute()) 
                ? $stament->fetchAll()
                : false ;
        }

        public function update($id,$rutaFinal){
            $ruta=$this->obtenerRutaImagen($id);

            $stament = $this->PDO->prepare("UPDATE imagenes SET url = :ruta WHERE id = :id");
            $stament->bindParam(":ruta",$rutaFinal);
            $stament->bindParam(":id",$id);

            if($stament->execute()){
                $removerImagen = unlink($ruta);

                return ($removerImagen)
                ? true
                : false;
            }
        }


        public function delete($id){
            $ruta=$this->obtenerRutaImagen($id);

            $stament = $this->PDO->prepare("DELETE FROM imagenes WHERE id = :id");
            $stament->bindParam(":id",$id);

            if($stament->execute()){
                $removerImagen = unlink($ruta);

                return ($removerImagen)
                ? true
                : false;
            }
        }

        public function obtenerRutaImagen($id){
            $stament = $this->PDO->prepare("SELECT url FROM imagenes WHERE id = :id");
            $stament->bindParam(":id",$id);
            $stament->execute();

            return $stament->fetch()[0];
        }

    }

?>