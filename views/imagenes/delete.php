<?php    
    require_once("c://xampp/htdocs/catalogo/controllers/imagenesController.php");
    $id = $_GET['id'];
    $product = $_GET['product'];

    $obj = new ImagenesController();
    $obj->delete($id,$product);

?>