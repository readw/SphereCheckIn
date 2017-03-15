<?php
    class Login 
    {   
        function checkMem($conn, $return) {
            $return = array();
            $sql = "SELECT * FROM Users WHERE userId=".$_POST['inputId'];
            $result = $conn->query($sql);

            if ($result && $result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    array_push($return, $row["dateOfBirth"], $row["firstName"]);
                }
            } else {
                array_push($return, "NA");
            }
            
            return($return);
        }
        
        function checkDob($conn) {
            $sql = "SELECT * FROM Users WHERE userId=".$_POST['inputId'];
            $result = $conn->query($sql);
        
            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                
                    $tmp = $row["dateOfBirth"];
                
                    if ($_POST['inputDOB'] == $tmp){
                        $return = true;
                    }
                
                }
            }
        }
        
        function checkLogin($conn){
            
            $return = array();

            if ($this->checkMem($conn, $return)[0] != "NA"){

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
        
        function init($conn, $hipHip){
            
            $_POST['inputId'] = $hipHip[0];
        
            $date = $hipHip[3] . '-' . $hipHip[2] . '-' . $hipHip[1];
            $_POST['inputDOB'] = $date;
        
            if ($this->checkLogin($conn) == true){ 
?>
<div class="alert alert-success" role="alert">
    <p>Successfully Logged In</p>
</div>
<?php
                return true;
            } else {
                return false;
            }
        }
    }
?>