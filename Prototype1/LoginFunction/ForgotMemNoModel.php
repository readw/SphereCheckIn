<?php
    
    class ForgotMemNoModel{
        
        function __construct(){
            $servername = getenv('IP');
            $username = getenv('C9_USER');
            $password = "";
            $database = "c9";
            $dbport = 3306;
            
            $return = array();
        
            // Create connection
            $this->conn = mysqli_connect($servername, $username, $password, $database, $dbport);
            
            // Check connection
            if (!$this->conn) {
                die("Connection failed: " . mysqli_connect_error() );
            }
        }
        
        function ExtractEmail($email){
            $sql = "SELECT * FROM Users WHERE email='".$email."'";
            $result = $this->conn->query($sql);
            
            if ($result->num_rows > 0) {
                return $email;
            }
            else {
                return "false";
            }
        }
        
        function ExtractPhone($phone){
            $sql = "SELECT * FROM Users WHERE telephone='".$phone."'";
            $result = $this->conn->query($sql);
            
            if ($result->num_rows > 0) {
                return $phone;
            }
            else {
                return "false";
            }
        }
    }
    
    
?>