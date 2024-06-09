<?php
    require_once("c://xampp/htdocs/catalogo/controllers/categoriasController.php");
    $id = $_GET['id'];
    echo $id;

    $obj = new CategoriasController();
    $obj->delete($id);
?>