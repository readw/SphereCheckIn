<?php
    include "ForgotMemNoModel.php";
    
    class ForgotMemNoController{
        
        function __construct(){
            $this->ForgotMemNoModel = new ForgotMemNoModel;
            
            $this->inputEmail = $inputEmail;
            $this->inputPhone = $inputPhone;
            
            $this->success = $this->CheckContact();
            
            echo $this->success;
        }
        
        function CheckContact(){
            if ($this->ForgotMemNoModel->ExtractEmail($this->inputEmail) == $this->inputEmail){
                return "true";
            }
            else {
                if ($this->ForgotMemNoModel->ExtractPhone($this->inputPhone) == $this->inputPhone){
                    return "true";
                }
                else {
                    return "false";
                }
            }

        }
    }
    
    $ForgotMemNoController = new ForgotMemNoController("job@bill.com", "07951904675");
    
?>