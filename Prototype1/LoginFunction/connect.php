<?php
    
    function checkMem($inputId){
        $servername = getenv('IP');
        $username = getenv('C9_USER');
        $password = "";
        $database = "c9";
        $dbport = 3306;
        
        $return = array();
    
        // Create connection
        $conn = mysqli_connect($servername, $username, $password, $database, $dbport);
        
        // Check connection
        if (!$conn) {
            die("Connection failed: " . mysqli_connect_error() );
        }
        
        $sql = "SELECT * FROM Users WHERE userId=$inputId";
        $result = $conn->query($sql);
        
        
        if ($result->num_rows > 0) {

            while($row = $result->fetch_assoc()) {
                array_push($return, $row["dateOfBirth"], $row["firstName"]);
            }
        } else {
            array_push($return, "NA");
        }
        
        $conn->close();
        return($return);
        
    } 
    
    function checkDOB($memno, $inputDOB){
        $servername = getenv('IP');
        $username = getenv('C9_USER');
        $password = "";
        $database = "c9";
        $dbport = 3306;
        
        $result = False;
    
        // Create connection
        $conn = mysqli_connect($servername, $username, $password, $database, $dbport);
        
        // Check connection
        if (!$conn) {
            die("Connection failed: " . mysqli_connect_error() );
        }
        
        $sql = "SELECT * FROM Users WHERE userId=$memno";
        $result = $conn->query($sql);
        
        
        
        if ($result->num_rows > 0) {

            while($row = $result->fetch_assoc()) {
                
                $tmp = $row["dateOfBirth"];
                
                if ($inputDOB == $tmp){
                    $return = True;
                }
                
            }
        }
        
        $conn->close();
        return($return);
        
    }
    
?>