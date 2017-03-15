<?php
    //TODO: Change routing for navigation between pages.
    //TODO: Enable connection to the database.
    //TODO: Set up .js timetable.
    //TODO: Display error codes on errors.

    class TimeTable extends Controller {
        // Set main model in which to invoke
        public $user;
        public $user_permissions;
        public $sessionList;
        
        public function __construct()
        {   
            
        }
        
        public function index($name='')
        {   
            $conn = new dbConnect;
            $this->dbConn = $conn->connect();
            
            $_REQUEST['user'] = "William Read";
            $_REQUEST['user_permission'] = 3;
            
            $sessionList = new Sessions;
            $_REQUEST['sessions'] = $sessionList->getSessionList($this->dbConn);
            
            include($_SERVER['DOCUMENT_ROOT']."/App/View/_Shared/_Meta.php");
            include($_SERVER['DOCUMENT_ROOT'].'/Public/Styles/_bundles.php');
            
            if ($name == '')
            {
                include($_SERVER['DOCUMENT_ROOT']."/App/View/Home/_Layout.php");
            } else {
                include($_SERVER['DOCUMENT_ROOT']."/App/View/_Shared/_Navigation.php");
                include($_SERVER['DOCUMENT_ROOT']."/App/View/Timetable/_Layout.php");
            }
            include($_SERVER['DOCUMENT_ROOT'].'/App/View/_Shared/_Footer.php');
            include($_SERVER['DOCUMENT_ROOT'].'/Public/Scripts/_bundles.php');
        }
    }

?>