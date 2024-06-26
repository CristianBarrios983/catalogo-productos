<?php
    require_once("c://xampp/htdocs/catalogo/controllers/imagenesController.php");

    $id = $_POST['id'];
    $nombreImg=$_FILES['imagen']['name'];
    $rutaAlmacenamiento=$_FILES['imagen']['tmp_name'];
    $carpeta='../../imagenes/';
    $rutaFinal=$carpeta.$nombreImg;

    $obj = new ImagenesController();
    $obj->guardar($id,$rutaAlmacenamiento,$rutaFinal);
?>