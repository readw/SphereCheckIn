<?php
    class Controller 
    {
        public function model($model){
            require_once($_SERVER['DOCUMENT_ROOT'].'/App/Model/'.$model.".php");
            return new $model();
        }
        
        public function view($view, $data){
            require_once($_SERVER['DOCUMENT_ROOT']."/App/View/".$view.'/_Layout.php');
        }
    }
?>