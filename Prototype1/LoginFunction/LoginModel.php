<?php
    
    class LoginModel{
        
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
        
        function ExtractMemNo($memno){
            $sql = "SELECT * FROM Users WHERE userId=$memno";
            $result = $this->conn->query($sql);
            
            
            if ($result->num_rows > 0) {
                
                return "true";
                
            }
            else {
                return "false";
            }
            
            return $return;
        }
        
        function ExtractDOB($memno){
            $sql = "SELECT * FROM Users WHERE userId=$memno";
            $result = $this->conn->query($sql);
            
            if ($result->num_rows > 0) {
    
                while($row = $result->fetch_assoc()) {
                    
                    return $row["dateOfBirth"];
                    
                }
                
                
            } else {
                return "false";
            }
        }
    }
?>