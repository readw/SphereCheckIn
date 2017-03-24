<?php
    session_start();

    // Models
    require_once($_SERVER['DOCUMENT_ROOT']."/App/Model/Database.php");
    require_once($_SERVER['DOCUMENT_ROOT']."/App/Model/Sessions.php");
    require_once($_SERVER['DOCUMENT_ROOT']."/App/Model/Auth.php");
    require_once($_SERVER['DOCUMENT_ROOT']."/App/Model/Logout.php");

    // App Classes
    require_once($_SERVER['DOCUMENT_ROOT']."/App/Core/App.php");
    require_once($_SERVER['DOCUMENT_ROOT']."/App/Core/Controller.php");
?>