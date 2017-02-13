<?php
    include_once($_SERVER['DOCUMENT_ROOT']."/Controller/MainController.php");
    $controller = new MainController();
    $controller -> invoke();
?>