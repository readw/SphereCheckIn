<?php

    function checkLogin(){
        
        session_start();
        
        
        $inid = $_POST["inputId"];
        $indob = $_POST["inputDOB"];
        
        if (checkMem($_POST["inputId"])[0] != "NA"){
            
            if (checkDOB($inid, $indob) == True) {
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
    
    
    
?>