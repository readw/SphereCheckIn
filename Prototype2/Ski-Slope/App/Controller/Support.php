<?php    
    class Support extends Controller {
        
        public function __construct(){

        }
        
        public function index(){
            include($_SERVER['DOCUMENT_ROOT']."/App/View/_Shared/_Meta.php");
            include($_SERVER['DOCUMENT_ROOT'].'/Public/Styles/_bundles.php');
            include($_SERVER['DOCUMENT_ROOT']."/App/View/Support/_Layout.php");
            include($_SERVER['DOCUMENT_ROOT'].'/App/View/_Shared/_Footer.php');
            include($_SERVER['DOCUMENT_ROOT'].'/Public/Scripts/_bundles.php');
        }
    }
?>