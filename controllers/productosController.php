<?php
    class ProductosController {
        private $model;
        public function __construct()
        {
            require_once("c://xampp/htdocs/catalogo/models/productosModel.php");
            $this->model = new ProductosModel();
        }

        public function index(){
            return ($this->model->index())
                ? $this->model->index()
                : false;
        }

        public function guardar($nombre,$descripcion,$precio,$cantidad,$categoria){

            if($this->model->insertar($nombre,$descripcion,$precio,$cantidad,$categoria) !== false){
                echo "<script language='Javascript'>alert('Registro exitoso :)');location.href = 'productos.php';</script>`;";
            }else{
                echo "<script language='Javascript'>alert('No se pudo registrar :(');location.href = 'productos.php';</script>`;";
            }

        }

        public function update($id,$nombre,$descripcion,$precio,$cantidad,$categoria){

            if($this->model->update($id,$nombre,$descripcion,$precio,$cantidad,$categoria) !== false){
                echo "<script language='Javascript'>alert('Actualizado correctamente :)');location.href = 'productos.php';</script>`;";
            }else{
                echo "<script language='Javascript'>alert('No se pudo actualizar :(');location.href = 'productos.php';</script>`;";
            }
            
            // return ($this->model->update($id,$nombre,$descripcion) != false)
            //     ? header("Location: show.php?id=".$id)
            //     : header("Location: index.php");
        }

        public function delete($id){

            if($this->model->delete($id) !== false){
                echo "<script language='Javascript'>alert('Eliminado correctamente :)');location.href = 'productos.php';</script>`;";
            }else{
                echo "<script language='Javascript'>alert('No se pudo eliminar :(');location.href = 'productos.php';</script>`;";
            }

            // return ($this->model->delete($id))
            //     ? header("Location: index.php")
            //     : header("Location: show.php?id=".$id);
        }

        public function cantProductos() {
            $cantidad = $this->model->cantProductos();
        
            return $cantidad !== false ? $cantidad : false;
        }
    }
?>