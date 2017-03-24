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
            $conn = new dbConnect;
            $this->dbConn = $conn->connect();
            
            $sessionList = new Sessions;
            if (isset($_GET['searchSessions'])) {
                $sessionsId = $_GET['sessionsId'] ?: '';
                
                $date = $_GET['date'] ?: '';
                if ($date != '') {
                    $dateFragments = explode("-", $date);
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
                
                if (isset($_GET['startTime'])){
                    $startTime = strtotime($_GET['startTime']);
                    echo($startTime);
                } else {
                    $startTime = '';
                }
                
                if (isset($_GET['endTime'])){
                    $endTime = $_GET['endTime'];
                } else {
                    $endTime = '';
                }

                if (isset($_GET['type'])){
                    $type = $_GET['type'];
                } else {
                    $type = '';
                }
                
                $instructor = $_GET['instructor'] ?: '';
                
                $params = [
                    'sessionsId' => $sessionsId,
                    'date' => $date,
                    'type' => $type,
                    'startTime' => $startTime,
                    'endTime' => $endTime,
                    'instructor' => $instructor
                ];
                
                $_REQUEST['sessions'] = $sessionList->filterSessionList($this->dbConn, $params);
                
            } else {
                $_REQUEST['sessions'] = $sessionList->getSessionList($this->dbConn);
            }
            
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