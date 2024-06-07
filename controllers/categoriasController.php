<?php
    class CategoriasController {
        private $model;
        public function __construct()
        {
            require_once("c://xampp/htdocs/catalogo/models/categoriasModel.php");
            $this->model = new ProductosModel();
        }

        public function index(){
            return ($this->model->index())
                ? $this->model->index()
                : false;
        }
    }
?>