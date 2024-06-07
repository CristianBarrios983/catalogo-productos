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
    }
?>