<?php
    require_once("c://xampp/htdocs/catalogo/controllers/categoriasController.php");
    $id = $_GET['id'];

    $obj = new CategoriasController();
    $obj->delete($id);
?>