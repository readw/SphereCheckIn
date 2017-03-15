<?php
    class Home extends Controller
    {
        public function index() {
            $conn = new dbConnect;
            $this->dbConn = $conn->connect();
            
            include($_SERVER['DOCUMENT_ROOT']."/App/View/_Shared/_Meta.php");
            include($_SERVER['DOCUMENT_ROOT'].'/Public/Styles/_bundles.php');
            include($_SERVER['DOCUMENT_ROOT']."/App/View/Home/_Layout.php");
            include($_SERVER['DOCUMENT_ROOT'].'/App/View/_Shared/_Footer.php');
            include($_SERVER['DOCUMENT_ROOT'].'/Public/Scripts/_bundles.php');
        }
        
        public function login() {
            $conn = new dbConnect;
            $this->dbConn = $conn->connect();
            
            if (isset($_POST['login'])) {
                if (isset($_POST['memno']) && isset($_POST['day']) && isset($_POST['month']) && isset($_POST['year'])) {
                    $hipHip = array($_POST['memno'], $_POST['day'], $_POST['month'], $_POST['year']);
                    $authenticate = new Login;
                    $userDetails = $authenticate->init($this->dbConn, $hipHip);
                    if ($userDetails == true){
                        $this->view('TimeTable', $userDetails);
                    }
                }
?>
<div class="alert alert-danger" role="alert">
    <p><b>WARNING:</b> UserId or Date of Birth isn't correct.</p>
</div>
<?php
            }
            
            $this->index();
            
        }
        
        public function register() {
            //Deans Code here...
        }
    }
?>