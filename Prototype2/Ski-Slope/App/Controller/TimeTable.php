<?php
    class TimeTable extends Controller {
        /* 
        * Class to controll all interfaces and models that relate to the
        * TimeTable functionality.
        */
        public $user;
        public $user_permissions;
        public $sessionList;
        
        public function __construct()
        {   
            /*
            * Function to determine if the user has been authenticated and can
            * access the other views of this page.
            */
            
            if (isset($_SESSION['firstName']) && isset($_SESSION['lastName'])) {
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
        
        public function index($userDetails=false)
        {   
            /*
            * Function to retrieve the different sessions back from the database
            * and return them back and send them to the corresponding view based off
            * the returned result.
            */
            
            // Initialises a database connection.
            $conn = new dbConnect;
            $this->dbConn = $conn->connect();
            
            // Initialises a new Sessions model.
            $sessionList = new Sessions;
            
            // Check if searchSessions button has been pressed.
            if (isset($_GET['searchSessions'])) {
                /*
                * Starts by setting values to all search variables, to correct format
                * before being passed back to this controller.
                */
                // Determine sessionsId is valid.
                $sessionsId = $_GET['sessionsId'] ?: '';
                
                $date = $_GET['date'] ?: '';
                if ($date != '') {
                    $dateFragments = explode("-", $date);
                    // Iterates through date and outputs in correct format. Otherwise defaults null.
                    if (count($dateFragments) == 3){
                        if (checkdate($dateFragments[1], $dateFragments[0], $dateFragments[2])) {
                            $date = $dateFragments[2]."-".$dateFragments[1]."-".$dateFragments[0];
                            print_r($date);
                        } else {
                            $date = "";
                        }
                    } else {
                        $date = "";
                    } 
                }
                
                // Determines startTime is valid.
                if (isset($_GET['startTime'])){
                    $startTime = strtotime($_GET['startTime']);
                } else {
                    $startTime = '';
                }
                
                // Determines endTime is valid.
                if (isset($_GET['endTime'])){
                    $endTime = $_GET['endTime'];
                } else {
                    $endTime = '';
                }

                // Determines type is valid.
                if (isset($_GET['type'])){
                    $type = $_GET['type'];
                } else {
                    $type = '';
                }
                
                // Determines instructor is valid.
                $instructor = $_GET['instructor'] ?: '';
                
                // Formats array of data in which to query the database.
                $params = [
                    'sessionsId' => $sessionsId,
                    'date' => $date,
                    'type' => $type,
                    'startTime' => $startTime,
                    'endTime' => $endTime,
                    'instructor' => $instructor
                ];
                
                // Get array of sessions using the passed parameters.
                $_REQUEST['sessions'] = $sessionList->filterSessionList($this->dbConn, $params);
                
            } else {
                // Returns list of all sessions from the database as default.
                $_REQUEST['sessions'] = $sessionList->getSessionList($this->dbConn);
            }
            
            /*
            * Includes all the views that can be displayed. This is based on the conditions
            * of a user being logged in or not.
            */
            
            include($_SERVER['DOCUMENT_ROOT']."/App/View/_Shared/_Meta.php");
            include($_SERVER['DOCUMENT_ROOT'].'/Public/Styles/_bundles.php');
            
            if (!$userDetails)
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