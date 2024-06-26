<?php
    class ImagenesController {
        private $model;
        public function __construct()
        {
            require_once("c://xampp/htdocs/catalogo/models/imagenesModel.php");
            $this->model = new ImagenesModel();
        }

        // public function index(){
        //     return ($this->model->index())
        //         ? $this->model->index()
        //         : false;
        // }

        public function guardar($id,$rutaAlmacenamiento,$rutaFinal){

            if(move_uploaded_file($rutaAlmacenamiento, $rutaFinal)){
                if($this->model->insertar($rutaFinal,$id) !== false){
                    echo "<script language='Javascript'>alert('La imagen fue añadida :)');location.href = 'imagenesProducto.php?id=$id';</script>`;";
                }else{
                    echo "<script language='Javascript'>alert('No se pudo añadir la imagen :(');location.href = 'imagenesProducto.php?id=$id';</script>`;";
                }
            }else{
                echo "<script language='Javascript'>alert('No se pudo mover la imagen :(');location.href = 'imagenesProducto.php?id=$id';</script>`;";
            }
        }


        public function show($id){
            return($this->model->show($id) !== false) 
                ? $this->model->show($id)
                // : header("Location: productos.php");
                : false;
        }


        public function update($id,$rutaAlmacenamiento,$rutaFinal,$producto){

            if(move_uploaded_file($rutaAlmacenamiento, $rutaFinal)){
                if($this->model->update($id,$rutaFinal) !== false){
                    echo "<script language='Javascript'>alert('La imagen fue actualizada :)');location.href = 'imagenesProducto.php?id=$producto';</script>`;";
                }else{
                    echo "<script language='Javascript'>alert('No se pudo actualizar la imagen :(');location.href = 'imagenesProducto.php?id=$producto';</script>`;";
                }
            }else{
                echo "<script language='Javascript'>alert('No se pudo mover la imagen :(');location.href = 'imagenesProducto.php?id=$producto';</script>`;";
            }
            
        }


        public function delete($id,$product){

            if($this->model->delete($id) !== false){
                echo "<script language='Javascript'>alert('Eliminado correctamente :)');location.href = 'imagenesProducto.php?id=$product';</script>`;";
            }else{
                echo "<script language='Javascript'>alert('No se pudo eliminar :(');location.href = 'imagenesProducto.php?id=$product';</script>`;";
            }

        }
        
    }
?>