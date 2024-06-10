<?php
    class CategoriasController {
        private $model;
        public function __construct()
        {
            require_once("c://xampp/htdocs/catalogo/models/categoriasModel.php");
            $this->model = new CategoriasModel();
        }

        public function index(){
            return ($this->model->index())
                ? $this->model->index()
                : false;
        }

        public function guardar($nombre,$descripcion){

            if($this->model->insertar($nombre,$descripcion) !== false){
                echo "<script language='Javascript'>alert('Registro exitoso :)');location.href = 'categorias.php';</script>`;";
            }else{
                echo "<script language='Javascript'>alert('No se pudo registrar :(');location.href = 'categorias.php';</script>`;";
            }

            // return ($this->model->insertar($nombre,$descripcion) != false) 
            //     ? "<script language='Javascript'>alert('Registro exitoso :)');location.href = 'categorias.php';</script>`;"
            //     : "<script language='Javascript'>alert('No se pudo registrar :(');location.href = 'categorias.php';</script>`;";
        }


        public function show($id){
            return($this->model->show($id) !== false) 
                ? $this->model->show($id)
                : header("Location: index.php");
        }


        public function update($id,$nombre,$descripcion){

            if($this->model->update($id,$nombre,$descripcion) !== false){
                echo "<script language='Javascript'>alert('Actualizado correctamente :)');location.href = 'categorias.php';</script>`;";
            }else{
                echo "<script language='Javascript'>alert('No se pudo actualizar :(');location.href = 'categorias.php';</script>`;";
            }
            
            // return ($this->model->update($id,$nombre,$descripcion) != false)
            //     ? header("Location: show.php?id=".$id)
            //     : header("Location: index.php");
        }


        public function delete($id){

            if($this->model->delete($id) !== false){
                echo "<script language='Javascript'>alert('Eliminado correctamente :)');location.href = 'categorias.php';</script>`;";
            }else{
                echo "<script language='Javascript'>alert('No se pudo eliminar :(');location.href = 'categorias.php';</script>`;";
            }

            // return ($this->model->delete($id))
            //     ? header("Location: index.php")
            //     : header("Location: show.php?id=".$id);
        }


        public function cantCategorias() {
            $cantidad = $this->model->cantCategorias();
        
            return $cantidad !== false ? $cantidad : false;
        }

        public function categorias() {
            $categorias = $this->model->categorias();
        
            return $categorias !== false ? $categorias : [];
        }
        
    }
?>