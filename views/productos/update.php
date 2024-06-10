<?php
    require_once("c://xampp/htdocs/catalogo/controllers/productosController.php");

    $id = $_POST['id'];
    $nombre = $_POST['nombre'];
    $descripcion = $_POST['descripcion'];
    $precio = $_POST['precio'];
    $cantidad = $_POST['cantidad'];
    $categoria = $_POST['categoriaEditar'];

    $obj = new ProductosController();
    $obj->update($id,$nombre,$descripcion,$precio,$cantidad,$categoria);
?>