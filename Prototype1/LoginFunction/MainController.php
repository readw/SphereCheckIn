<?php
    
    include "LoginController.php";
    include "ForgotMemNoController.php";
    
    class MainController{
        
        function __construct(){
            $this->LoginController = new LoginController;
            $this->ForgotMemNoController = new ForgotMemNoController;
        }

    }

?>