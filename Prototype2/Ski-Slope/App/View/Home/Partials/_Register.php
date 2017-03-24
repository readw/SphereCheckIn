<?php
    if (isset($_POST['register'])){
        echo("POST REGISTER");
    }
?>
<div class="modal fade" id="registerModal" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Register</h4>
            </div>
            <div class="modal-body">
                <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
                    <fieldset>
                        <legend> Login Details: </legend>
                        <div class="form-group">
                            <input class="form-control" type="text" name="user" placeholder="Username">
                            <span class="error"> 
                                <?php 
                                    if ($_SERVER["REQUEST_METHOD"] == "POST") {
                                        echo "*" . $usr->userErr;
                                    } 
                                ?>
                            </span>
                        </div>
                        
                        <div class="row">
                            <div class="form-group col-xs-6">
                                <input class="form-control" type="password" name="password" placeholder="Password">
                                <span class="error"> 
                                    <?php 
                                        if ($_SERVER["REQUEST_METHOD"] == "POST") {
                                            echo "*" . $usr->passErr;
                                        } 
                                    ?>
                                </span>
                            </div>

                            <div class="form-group col-xs-6">
                                <input class="form-control" type="password" name="repass" placeholder="Retype Password">
                                <span class="error"> 
                                    <?php 
                                        if ($_SERVER["REQUEST_METHOD"] == "POST") {
                                            echo "*" . $usr->repassErr;
                                        } 
                                    ?>
                                </span>
                            </div>
                        </div>
                    </fieldset>

                    <fieldset>
                        <legend> Personal Information: </legend>
                        <div class="row">
                            <div class="form-group col-xs-6">
                                <input class="form-control" type="text" name="firstname" placeholder="First Name">
                                <span class="error"> 
                                    <?php 
                                        if ($_SERVER["REQUEST_METHOD"] == "POST") {
                                            echo "*" . $usr->firstnameErr;
                                        } 
                                    ?>
                                </span>
                            </div>

                            <div class="form-group col-xs-6">
                                <input class="form-control" type="text" name="surname" placeholder="Surname">
                                <span class="error"> 
                                    <?php 
                                        if ($_SERVER["REQUEST_METHOD"] == "POST") {
                                            echo "*" . $usr->surnameErr;
                                        } 
                                    ?>
                                </span>
                            </div>
                        </div>

                        <div class="form-group">
                            <input class="form-control" type="email" name="email" placeholder="Email">
                            <span class="error"> 
                                <?php 
                                    if ($_SERVER["REQUEST_METHOD"] == "POST") {
                                        echo "*" . $usr->emailErr;
                                    } 
                                ?>
                            </span>
                        </div>

                        <div class="form-group">
                            <input class="form-control" type="email" name="dob" placeholder="D.O.B.">
                            <span class="error"> 
                                <?php 
                                    if ($_SERVER["REQUEST_METHOD"] == "POST") {
                                        echo "*" . $usr->dobErr;
                                    } 
                                ?>
                            </span>
                        </div>

                        <div class="form-group">
                            <input class="form-control" type="email" name="phone" placeholder="Telephone" minlength="7" maxlength="11">
                            <span class="error"> 
                                <?php 
                                    if ($_SERVER["REQUEST_METHOD"] == "POST") {
                                        echo "*" . $usr->phoneErr;
                                    }
                                ?>
                            </span>
                        </div>

                        <div class="form-group">
                            <input class="form-control" type="email" name="address" placeholder="Address">
                            <span class="error"> 
                                <?php 
                                    if ($_SERVER["REQUEST_METHOD"] == "POST") {
                                        echo "*" . $usr->addressErr;
                                    }
                                ?>
                            </span>
                        </div>
                    </fieldset>
                    
                    <div class="row">
                        <div class="form-group col-xs-4">
                            <button id="reset" type="reset" class="btn btn-danger btn-block" name="reset">Reset</button>
                        </div>
                        <div class="form-group col-xs-8">
                            <button id="register" type="submit" class="btn btn-info btn-block" name="register">Register</button>
                        </div>
                    </div>
                    
                </form>
            </div>
            <div class="modal-footer">
                <div class="form-group">
                    <a class="btn btn-link" name="registerModal">register</a>
                </div>
                <div class="form-group">
                    <a class="btn btn-link" name="forgot" href='.'>forgotten membership no.</a>
                </div>
            </div>
        </div>
    </div>
</div>