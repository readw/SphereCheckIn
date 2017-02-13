<?php

    class MainController {
        // Set main model in which to invoke
        public $model;
        
        public function __construct()
        {
            //$this -> model = new Model();
        }
        
        public function invoke()
        {
            include($_SERVER['DOCUMENT_ROOT']."/View/_Layout.php");
            
            if (!isset($_POST['user_id']))
            {
                include($_SERVER['DOCUMENT_ROOT']."/View/Login/_Layout.php");
            }
        }
    }

?>