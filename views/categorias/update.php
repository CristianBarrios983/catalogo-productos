<?php
    require_once("c://xampp/htdocs/catalogo/controllers/categoriasController.php");

    $id = $_POST['id'];
    $nombre = $_POST['nombre'];
    $descripcion = $_POST['descripcion'];

    $obj = new CategoriasController();
    $obj->update($id,$nombre,$descripcion);
?>