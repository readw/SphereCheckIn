<?php
    class Auth 
    {   
        private function checkPermissions($conn, $id){
            $sql = "SELECT empRole FROM Employee WHERE userId=".$id;
            $result = $conn->query($sql);
            $row = $result->fetch_assoc();
            return $row['empRole'];
        }
        
        function checkMem($conn, $return) {
            $return = array();
            $sql = "SELECT * FROM Users WHERE userId=".$_POST['inputId'];
            $result = $conn->query($sql);

            if ($result && $result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    array_push($return, $row["firstName"], $row['lastName']);
                    $_SESSION['firstName'] = $row["firstName"];
                    $_SESSION['lastName'] =  $row['lastName'];
                    $_SESSION['permissions'] = $this->checkPermissions($conn, $row['userId']);
                }
            } else {
                array_push($return, "N/A");
            }
            
            return($return);
        }
        
        function checkDob($conn) {
            $sql = "SELECT * FROM Users WHERE userId=".$_POST['inputId'];
            $result = $conn->query($sql);
            $return = false;
            
            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                
                    $tmp = $row["dateOfBirth"];
                    $tmp2 = $_POST['inputDOB'];
                    if ($tmp2 == $tmp){
                        $return = true;
                    }
                
                }
            }
            return $return;
        }
        
        function checkLogin($conn){
            
            $return = array();

            if ($this->checkMem($conn, $return)[0] != "N/A"){

                if ($this->checkDOB($conn) == true) {
                    return true;
                }
                else {
                    return false;
                }
            }
            else {
                return false;
            }

        }
        
        function init($conn, $loginInfo){
            
            $_POST['inputId'] = $loginInfo[0];
        
            $date = $loginInfo[3] . '-' . $loginInfo[2] . '-' . $loginInfo[1];
            $_POST['inputDOB'] = $date;
        
            if ($this->checkLogin($conn) == true){
                return true;
            } else {
                return false;
            }
        }
    }
?>