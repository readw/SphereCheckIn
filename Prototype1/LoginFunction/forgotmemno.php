<?php
    include 'connect.php';
    include 'organise.php';
    session_start();
    
    
    if (isset($_POST['email']) || isset($_POST['phone'])){

        $inputEmail = $_POST['email'];
        $inputPhone = $_POST['phone'];

        
        if (checkEmailPhone($inputEmail, $inputPhone) == true){ 
?>
            <div class="alert alert-success" role="alert">
                <p>Membership number has been sent</p>
            </div>
        
        <?php
        }
        else {
        ?>
            <div class="alert alert-danger" role="alert">
                <p>FAIL</p>
            </div>
        <?php
        }
    }
    
    
?>

<html>
    
<head>
<meta charset="UTF-8">
<title> Sphere Slopes Recovery </title>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
<link rel="stylesheet" type="text/css" href="style.css">
<!-- Latest compiled and minified JavaScript -->


</head>
    
<body class="login container">
<h1>Forgotten Membership No.</h1>


<form action="forgotmemno.php" method="POST">
    <div class="row">
        <div class="form-group">
            <input type="mem" name="email" class="form-control login-input" placeholder="email" size="60" maxlength="30">
        </div>
    </div>
    
    <div class="row">
        <div class="form-group">
            <input type="mem" name="phone" class="form-control login-input" placeholder="phone number" size="60" maxlength="11">
        </div>
        
    </div>
    
    <div class="row">
        <div class="form-group" class "recoverButton">
            <button class="btn btn-login btn-block" type="submit" name="send">SEND</button>
        </div>
    </div>


</form>



<div class="bottom-block">
    <a href="register.php"class="btn" name="register">register</a>
</div>

<div>
    <a href="login.php" class="btn" name="goback">back to login</a>
</div>

<?php
    
?>


</body>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
</html>