<?php
	// Controller
	class SessionView  
	{
		public function __construct(){
			$this->sessionId = '3';
			$this->membershipNo = "000004";
			
			// START: dbConnect Class - would be seperate in final application
			$this->con = mysqli_connect("localhost", "root", "test", "skislope");

			if (!$this->con){
				die("can not connect: " . mysqli_error());
			}
			// END: dbConnect Class
		}


		public function index(){
			$sql = "SELECT * FROM Session WHERE sessionId=".mysqli_real_escape_string($this->con, $this->sessionId);
			$result = mysqli_query($this->con, $sql);
			$query = new query($this->con, $this->sessionId);
			
			// View Logic
			echo "<h1>Session Details</h1>";
			echo "<dl>";
			while($session=mysqli_fetch_assoc($result)){
				echo "<dt>Session ".$session['sessionId']."</dt>";
				echo "<dt>Session Date: ".$session['sessionDate']."</dt>";
				echo "<dt>Session Times: ".$session['startTime']." to ".$session['endTime']."</dt>";
				echo "<dt>Assigned Instructor: ".$session['assignedInstructor']."</dt>";
			}
			echo "</dl>";
			
			if (in_array($this->membershipNo, $query->search())){
				echo("<button>Delete Booking</button>");
			} else {
				echo("<button>Book Session</button>");
			}
		}
	}
	
	$view = new SessionView();
	$view->index();
	
?>

<?php
	// Model
	class query
	{
		public function __construct($con, $sessionId){
			$this->con = $con;
			$this->sessionId = $sessionId;
			$this->customerIds = array();
			$this->membershipNumbers = array();
		}
		
		public function search(){
			$find = "SELECT * FROM SessionCustomer WHERE sessionId=".mysqli_real_escape_string($this->con, $this->sessionId);
			$results = mysqli_query($this->con, $find);
			while ($row = mysqli_fetch_assoc($results)){
				$this->customerId = $row['customerId'];
				array_push($this->customerIds, $row['customerId']);
			}
			foreach ($this->customerIds as $id) {
				$find = "SELECT * FROM Customers WHERE customerId=".mysqli_real_escape_string($this->con, $id);
				$results = mysqli_query($this->con, $find);
				while ($row = mysqli_fetch_assoc($results)) {
					array_push($this->membershipNumbers, $row['userId']);
				}
			}
			return $this->membershipNumbers;
		}
		
		
	}
?>
<?php
// Additional Function (Not implemented)

// Book Customer
//$search = "SELECT * FROM Customers WHERE membershipId=".mysqli_real_escape_string($con, $customerId);
//$outcome =  mysqli_query($con, $search);
//$insering = "INSERT INTO SessionCustomer(sessionId, customerId) VALUES (".mysqli_real_escape_string($con, $sessionId).",".mysqli_real_escape_string($con, $customerId).")";
//$outcomes =  mysqli_query($con, $inserting);
//$takeaway = "UPDATE Session SET maxUsers=maxUsers-1 WHERE sessionId=".mysqli_real_escape_string($con, $sessionId);
//$last =  mysqli_query($con, $takeaway);

// Delete Customer
//echo($sessionId." ".$customerId);
//$delete = "DELETE FROM SessionCustomer WHERE sessionId=".mysqli_real_escape_string($con, $sessionId)." AND customerId=".mysqli_real_escape_string($con, $customerId);
//$now = mysqli_query($con, $delete);
//$update = "UPDATE Session SET maxUsers=maxUsers+1 WHERE sessionId=".mysqli_real_escape_string($con, $sessionId);
//$done =  mysqli_query($con, $update);