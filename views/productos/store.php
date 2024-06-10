<?php
    require_once("c://xampp/htdocs/catalogo/controllers/productosController.php");

    $nombre = $_POST['nombre'];
    $descripcion = $_POST['descripcion'];
    $precio = $_POST['precio'];
    $cantidad = $_POST['cantidad'];
    $categoria = $_POST['categoria'];

    $obj = new ProductosController();
    $obj->guardar($nombre,$descripcion,$precio,$cantidad,$categoria);
?>