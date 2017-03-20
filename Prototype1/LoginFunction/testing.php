<?php
    
    class LoginTest{
        
        function __construct(){
            $this->testOne = $this->ValidLoginTest();
            $this->testTwo = $this->InvalidLoginTest();
            
            if ($this->testOne == true && $this->testTwo == true){
                $this->testSuccess = "true";
            }
            else {
                $this->testSuccess = "false";
            }
            
            echo $this->testSuccess;
        }
        
        function ValidLoginTest(){
            /* Code in here to test when the login should work*/
             return true;
        }
        
        function InvalidLoginTest(){
            /* Code in here to test when the login should not work*/
            return true;
        }
    }
    
    class ForMemTest{
        
        function __construct(){
            $this->testOne = $this->ValidRecoveryTest();
            $this->testTwo = $this->InvalidRecoveryTest();
            
            if ($this->testOne == true && $this->testTwo == true){
                $this->testSuccess = "true";
            }
            else {
                $this->testSuccess = "false";
            }
            
            echo $this->testSuccess;
        }
        
        function ValidRecoveryTest(){
            /* Code in here*/
             return true;
        }
        
        function InvalidRecoveryTest(){
            /* Code in here*/
            return true;
        }
    }
    
    class RedRegTest{
        
        function __construct(){
            $this->testOne = $this->ValidRedirectTest();
            $this->testTwo = $this->InvalidRedirectTest();
            
            if ($this->testOne == true && $this->testTwo == true){
                $this->testSuccess = "true";
            }
            else {
                $this->testSuccess = "false";
            }
            
            echo $this->testSuccess;
        }
        
        function ValidRedirectTest(){
            /* Code in here*/
             return true;
        }
        
        function InvalidRedirectTest(){
            /* Code in here to test when the login should not work*/
            return true;
        }
    }
    
    
    $LGT = new LoginTest;
    $FMT = new ForMemTest;
    $RDT = new RedRegTest;
?>