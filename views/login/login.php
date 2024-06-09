<?php
    require_once("c://xampp/htdocs/catalogo/controllers/authController.php");

    $obj = new AuthController();
    $obj->login($_POST["usuario"],$_POST["pass"]);
?>