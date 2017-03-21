<?php
    include "LoginModel.php";
    include "LoginView.php";
    
    class LoginController{
        
        function __construct(){
            $this->loginModel = new LoginModel;
            $this->loginView = new LoginView;
            
            $this->inputMemNo = $inputMemNo;
            $this->inputDOB = $inputDOB;
            
            $this->success = $this->CheckLogin();
            
            echo $this->success;
        }
        
        function CheckLogin(){
            if ($this->loginModel->ExtractMemNo($this->inputMemNo) != "false"){
                
                if ($this->loginModel->ExtractDOB($this->inputMemNo) == $this->inputDOB) {
                    return "true";
                }
                else {
                    return "false";
                }
            }
            else {
                return "false";
            }

        }
        
        function CheckDOB(){
            return $this->loginModel->ExtractDOB($this->inputMemNo);
        }
    }
    
?>