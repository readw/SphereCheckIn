<?php
    class Home extends Controller
    {
        
        public function __construct()
        {
            $this->authenticate = new Auth;
            $this->conn = new dbConnect;
        }
        
        public function index() {
            $this->dbConn = $this->conn->connect();
            
            
            include($_SERVER['DOCUMENT_ROOT']."/App/View/_Shared/_Meta.php");
            include($_SERVER['DOCUMENT_ROOT'].'/Public/Styles/_bundles.php');
            include($_SERVER['DOCUMENT_ROOT']."/App/View/Home/_Layout.php");
            include($_SERVER['DOCUMENT_ROOT'].'/App/View/_Shared/_Footer.php');
            include($_SERVER['DOCUMENT_ROOT'].'/Public/Scripts/_bundles.php');
        }
        
        public function auth() {
            $this->dbConn = $this->conn->connect();

            if (isset($_POST['login'])) {
                if (isset($_POST['memno']) && isset($_POST['day']) && isset($_POST['month']) && isset($_POST['year'])) {
                    $loginInfo = array($_POST['memno'], $_POST['day'], $_POST['month'], $_POST['year']);
                    $userDetails = $this->authenticate->init($this->dbConn, $loginInfo);
                    if ($userDetails == true){
                        $this->redirect("/TimeTable/Sessions");
                        exit();
                    }
                }
                
?>
<div class="alert alert-danger" role="alert">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
    <p><b>WARNING:</b> UserId or Date of Birth isn't correct.</p>
</div>
<?php
            }
            $this->index();
        }
        
        public function logout(){
            $logout = new Logout();
            $this->redirect("/Home");
        }
    }
?>