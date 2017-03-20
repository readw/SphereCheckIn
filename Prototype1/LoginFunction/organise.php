<?php

    function checkLogin(){
        
        session_start();
        
        
        $inid = $_POST["inputId"];
        $indob = $_POST["inputDOB"];
        
        if (checkMem($inid)[0] != "NA"){
            
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
    
    function checkRecovery($inemail, $inphone){
        
        if (checkEmailPhone($inemail, $inphone) != false){
            return true;
        }
        else {
            return false;
        }
    }
    
    
    
?>