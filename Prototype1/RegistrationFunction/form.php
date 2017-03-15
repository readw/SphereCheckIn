<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
    <title> Register </title>
    <br>
    <fieldset>
    <legend> Login Details: </legend>
        Username:
        <br><input type="text" name="user">
        <span class="error"> <?php if ($_SERVER["REQUEST_METHOD"] == "POST") {
        echo "*" . $usr->userErr;} ?></span>
        <br>
        
        Password:
        <br><input type="password" name="pass">
        <span class="error"> <?php if ($_SERVER["REQUEST_METHOD"] == "POST") {
        echo "*" . $usr->passErr;} ?></span>
        <br>
        
        Retype Password:
        <br><input type="password" name="repass">
        <span class="error"> <?php if ($_SERVER["REQUEST_METHOD"] == "POST") {
        echo "*" . $usr->repassErr;} ?></span>
        <br>
    </fieldset>
    <br>
    <fieldset>
    <legend> Personal Information: </legend>
        First name:
        <br><input type="text" name="firstname">
        <span class="error"> <?php if ($_SERVER["REQUEST_METHOD"] == "POST") {
        echo "*" . $usr->firstnameErr;} ?></span>
        <br>
        
        Surname:
        <br><input type="text" name="surname">
        <span class="error"> <?php if ($_SERVER["REQUEST_METHOD"] == "POST") {
        echo "*" . $usr->surnameErr;} ?></span>
        <br>
        
        Email:
        <br><input type="email" name="email">
        <span class="error"> <?php if ($_SERVER["REQUEST_METHOD"] == "POST") {
        echo "*" . $usr->emailErr;} ?></span>
        <br>
        
        Date of birth:
        <br><input type="date" name="dob" max="2009-01-01">
        <span class="error"> <?php if ($_SERVER["REQUEST_METHOD"] == "POST") {
        echo "*" . $usr->dobErr;} ?></span>
        <br>
        
        Telephone number:
        <br><input type="number" name="phone" minlength="7" maxlength="11">
        <span class="error"> <?php if ($_SERVER["REQUEST_METHOD"] == "POST") {
        echo "*" . $usr->phoneErr;} ?></span>
        <br>
        
        Address:
        <br><input type="text" name="address">
        <span class="error"> <?php if ($_SERVER["REQUEST_METHOD"] == "POST") {
        echo "*" . $usr->addressErr;} ?></span>
        <br>
    </fieldset>
    <br><input type="submit" value="Register">
    <input type="reset">
</form>