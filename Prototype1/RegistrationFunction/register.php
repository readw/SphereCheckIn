<!DOCTYPE HTML>
<html>
<style>
    .error {color: #FF0008;}
</style>
<body>

<?php
//Function to sanitise the data input for security reasons.
function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}


class User {
// Define empty variables for data and errors.
    var $user;
    var $pass;
    var $repass;
    var $firstname;
    var $surname;
    var $email;
    var $dob;
    var $phone;
    var $address;
    var $userErr;
    var $passErr;
    var $repassErr;
    var $firstnameErr;
    var $surnameErr;
    var $emailErr;
    var $dobErr;
    var $phoneErr;
    var $addressErr;


    public function __construct() {
        //echo "<br>Beginning authentication of your information.<br>";
    }
    
    
    public function __destruct() {
        //echo "<br>The authentication of your information is complete.";
    }


/** The validation checks for the following:
 *     Are any of the fields empty;
 *     Do the first name and surname contain only alphabetic charcters and whitespaces;
 *     Is the password at least 8 characters long;
 *     Is the date of birth between 1900 and 1999;
 *     Is the telephone number between 8 and 11 characters long;
 *     Do the passwords match;
 *     Is there a valid email address;
 *     Is the username free (not in use);
 *     Is the email free (not in use).
 * If any of the data is incorrect or missing, insert error message into the error variables.
 */
    public function Val() { 
        include "connect.php";
        if (empty($_POST["user"])) {
            $this->userErr = "Username is required.";
        } else {
            $this->user = test_input($_POST["user"]);
        }
        if (empty($_POST["pass"])) {
            $this->passErr = "Password is required.";
        } elseif (strlen($_POST["pass"]) < 8) { 
            $this->passErr = "Your password has to be at least 8 characters long.";
            $this->repassErr = "Your password has to be at least 8 characters long.";
        } elseif ($_POST["pass"] !== $_POST["repass"]) {
            $this->passErr = "Your passwords do not match.";
        } else {
            $this->pass = test_input($_POST["pass"]);
        }
        if (empty($_POST["repass"])) {
            $this->repassErr = "Please retype your password.";
        } elseif ($_POST["pass"] !== $_POST["repass"]) {
            $this->repassErr = "Your passwords do not match.";
        } else {
            $this->repass = test_input($_POST["repass"]);
        }
        if (empty($_POST["firstname"])) {
            $this->firstnameErr = "Your first name is required.";
        } elseif (!preg_match('/^[a-zA-Z\s]+$/', $_POST["firstname"])){
            $this->firstnameErr = "Your name can only contain alphabetic characters.";
        } else {
            $this->firstname = test_input($_POST["firstname"]);
        }
        if (empty($_POST["surname"])) {
            $this->surnameErr = "Your surname is required.";
        } elseif (!preg_match('/^[a-zA-Z\s]+$/', $_POST["surname"])){
            $this->surnameErr = "Your surname can only contain alphabetic characters.";
        } else {
            $this->surname = test_input($_POST["surname"]);
        }
        if (empty($_POST["email"])) {
            $this->emailErr = "Your email address is required.";
        } elseif (!filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)) {
            $this->emailErr = "Please enter a valid email address."; 
        } else {
            $this->email = test_input($_POST["email"]);
        }
        if (empty($_POST["dob"])) {
            $this->dobErr = "Your date of birth is required.";
        } elseif (strtotime($_POST["dob"]) > strtotime('1999-01-01')) {
            $this->dobErr = "You are required to be at least 18 years old.";
        } elseif (strtotime($_POST["dob"]) < strtotime('1900-01-01')) {
            $this->dobErr = "Please enter your date of birth correctly.";
        } else {
            $this->dob = test_input($_POST["dob"]);
        }
        if (empty($_POST["phone"])) {
            $this->phoneErr = "Your telephone number is required.";
        } elseif (strlen($_POST["phone"]) > 11 or strlen($_POST["phone"]) < 8) {
            $this->phoneErr = "Please enter a valid telephone number.";
        } else {
            $this->phone = test_input($_POST["phone"]);
        }
        if (empty($_POST["address"])) {
            $this->addressErr = "Your address is required.";
        } else {
            $this->address = test_input($_POST["address"]);
        }
        if (!$this->userErr) {
            $result = mysqli_query($conn, "SELECT * FROM user_information WHERE Username='$this->user'");
            if (mysqli_num_rows($result) > 0) {
                $this->userErr = "The username '" . $_POST["user"] . "' is already taken."; 
            }
            mysqli_free_result($result);
        }
        if (!$this->emailErr) {
            $result = mysqli_query($conn, "SELECT * FROM user_information WHERE Email='$this->email'");
            if (mysqli_num_rows($result) > 0) {
                $this->emailErr = "The email address '" . $_POST["email"] . "' is already in use."; 
            }
            mysqli_free_result($result);
        }
        mysqli_close($conn);
    }


    public function Ins() {
        if (!$this->userErr and !$this->passErr and !$this->repassErr and !$this->firstnameErr and !$this->surnameErr and !$this->emailErr and !$this->dobErr and !$this->phoneErr and !$this->addressErr and !empty($this->user) and !empty($this->pass) and !empty($this->repass) and !empty($this->firstname) and !empty($this->surname) and !empty($this->email) and !empty($this->dob) and !empty($this->phone) and !empty($this->address)) {
            include "connect.php";
            $sql = "INSERT INTO user_information (First_Name, Surname, Date_of_Birth, Address, Telephone, Email, Username, Password)
            VALUES ('$this->firstname','$this->surname','$this->dob','$this->address','$this->phone','$this->email','$this->user','$this->pass')";
            if ($conn->query($sql) === TRUE) {
            echo "New record created successfully";
            } else {
                  echo "Error: " . $sql . "<br>" . $conn->error;
              }
            $conn->close();
        }
    }

}
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $usr = new User;
    $usr->Val();
    $usr->Ins();
}

include "form.php";
?>