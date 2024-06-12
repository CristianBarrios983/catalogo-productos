<?php
    require_once 'c://xampp/htdocs/catalogo/controllers/productosController.php';
    $obj = new ProductosController();
    $productos = $obj->index();

    // Devuelve las categorías en formato JSON
    header('Content-Type: application/json');
    echo json_encode($productos);
?>