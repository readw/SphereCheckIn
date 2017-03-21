<?php
    
    class LoginView{
        
        function __construct(){
            
            $this->LoadPage();
        }
        
        
        function LoadPage(){
            ?>
            
            
            <?php
            if (isset($_POST['memno'])){
                $this->inputId = $_POST['memno'];
                $this->inputDOB = $_POST['year'] . '-' . $_POST['month'] . '-' . $_POST['day'];
            }
            ?>
            
            
            
            <html>
    
                <head>
                <meta charset="UTF-8">
                <title> Sphere Slopes Login </title>
                <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
                <!-- Optional theme -->
                <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
                <link rel="stylesheet" type="text/css" href="style.css">
                <!-- Latest compiled and minified JavaScript -->
                
                
                </head>
                    
                <body class="login container">
                <h1>LOGIN</h1>
                
                
                <form action="index.php" method="POST">
                    <div class="row">
                        <div class="form-group">
                            <input type="mem" name="memno" class="form-control login-input" placeholder="membership no." size="60" maxlength="6">
                        </div>
                    </div>
                    
                    <div class="row" name="dobInput">
                        <div class="form-group col-md-3 col-offset-md-1">
                            <input type="dob" class="dob form-control login-input col-md-4" name="day" placeholder="dd" maxlength="2">
                        </div>
                        <div class="form-group col-md-3 col-offset-md-1">
                            <input type="dob" class="dob form-control login-input col-md-4" name="month" placeholder="mm" maxlength="2">
                        </div>
                        <div class="form-group col-md-3 col-offset-md-1">
                            <input type="dob" class="dob form-control login-input col-md-4" name="year" placeholder="yyyy" maxlength="4">
                        </div>
                        
                        <div class="form-group">
                            <button class="btn btn-login btn-block" href = "http://www.google.co.uk" type="submit" name="submit">LOGIN</button>
                        </div>
                    </div>
                </form>
                
                <div class="bottom-block">
                    <a href="register.php" class="btn" name="register">register</a>
                </div>
                
                <div>
                    <a href="forgotmemno.php" class="btn" name="forgot">forgotten membership no.</a>
                </div>
                
                </body>
                <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
                </html>
            <?php
            
        }
        
        function ValidLoginTest(){
            
        }
        
        function InvalidLoginTest(){
            
        }
    }
?>



