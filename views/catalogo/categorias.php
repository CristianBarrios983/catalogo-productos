<?php
    require_once 'c://xampp/htdocs/catalogo/controllers/categoriasController.php';
    $obj = new CategoriasController();
    $categorias = $obj->categorias();

    // Devuelve las categorías en formato JSON
    header('Content-Type: application/json');
    echo json_encode($categorias);
?>