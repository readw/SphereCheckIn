<?php

    class CheckIn extends Controller {
        
        public function __construct(){
            if (isset($_SESSION['firstName']) || isset($_SESSION['lastName'])) {
                $_REQUEST['user'] = $_SESSION['firstName']." ".$_SESSION['lastName'];
            } else {
                 $this->redirect("/Home");
            }
            
            if (isset($_SESSION['permissions'])) {
                $_REQUEST['user_permission'] = $_SESSION['permissions'];
            } else {
                $this->redirect("/Home");
            }
        }
        
        public function index(){
            include($_SERVER['DOCUMENT_ROOT']."/App/View/_Shared/_Meta.php");
            include($_SERVER['DOCUMENT_ROOT'].'/Public/Styles/_bundles.php');
            include($_SERVER['DOCUMENT_ROOT']."/App/View/_Shared/_Navigation.php");
            include($_SERVER['DOCUMENT_ROOT']."/App/View/CheckIn/_Layout.php");
            include($_SERVER['DOCUMENT_ROOT'].'/App/View/_Shared/_Footer.php');
            include($_SERVER['DOCUMENT_ROOT'].'/Public/Scripts/_bundles.php');
        }
        
    }

?>