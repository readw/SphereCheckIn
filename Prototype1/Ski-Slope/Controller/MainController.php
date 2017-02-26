<?php
    //TODO: Change routing for navigation between pages.
    //TODO: Enable connection to the database.
    //TODO: Set up .js timetable.
    //TODO: Display error codes on errors.
    include_once($_SERVER['DOCUMENT_ROOT']."/Model/Shared/Database.php");
    include_once($_SERVER['DOCUMENT_ROOT']."/Model/TimeTable/TimeTableModel.php");

    class MainController {
        // Set main model in which to invoke
        public $user;
        public $user_permissions;
        
        public function __construct()
        { 
            //session_start();
            $_REQUEST['user'] = "William Read";
            $_REQUEST['user_permission'] = 4;
            $_REQUEST['dateList'] = [
                ["Session 1", "21-03-2017", "10:00", "11:00", "70", "Euan Campbell"],
                ["Session 2", "21-03-2017", "11:00", "12:00", "10", "Euan Campbell"],
                ["Session 3", "22-03-2017", "12:00", "13:00", "10", "Liam Walsh"],
                ["Session 4", "22-03-2017", "13:00", "14:00", "100", "Liam Walsh"],
                ["Session 5", "24-03-2017", "15:00", "16:00", "10", "Liam Walsh"]
            ];
        }
        
        public function invoke()
        {   
            include($_SERVER['DOCUMENT_ROOT']."/View/_Shared/_Meta.php");
            include($_SERVER['DOCUMENT_ROOT'].'/Styles/_bundles.php');
            
            if (!isset($_REQUEST['user']))
            {
                include($_SERVER['DOCUMENT_ROOT']."/View/Login/_Layout.php");
            } else {
                include($_SERVER['DOCUMENT_ROOT']."/View/_Shared/_Navigation.php");
                include($_SERVER['DOCUMENT_ROOT']."/View/Timetable/_Layout.php");
            }
            include($_SERVER['DOCUMENT_ROOT'].'/Scripts/_bundles.php');
        }
    }

?>