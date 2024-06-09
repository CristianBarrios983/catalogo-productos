<?php
    require_once("c://xampp/htdocs/catalogo/controllers/categoriasController.php");

    $nombre = $_POST['nombre'];
    $descripcion = $_POST['descripcion'];

    $obj = new CategoriasController();
    $obj->guardar($nombre,$descripcion);
?>