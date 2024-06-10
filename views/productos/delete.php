<?php
    require_once("c://xampp/htdocs/catalogo/controllers/productosController.php");
    $id = $_GET['id'];

    $obj = new ProductosController();
    $obj->delete($id);
?>