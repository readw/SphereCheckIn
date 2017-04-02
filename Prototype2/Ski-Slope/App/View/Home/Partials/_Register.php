<div class="modal fade" id="registerModal" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h3 class="modal-title" id="myModalLabel"><u>Register</u></h3>
            </div>
            <div class="modal-body">
                <form class="registerForm" method="POST" action="/Home/Register">
                    <h4>Login Details:</h4>
                    <div class="form-group">
                        <input class="form-control" type="text" name="memno" placeholder="membership no. *" value="<?php if(isset($_POST['memno'])){echo $_POST['memno'];} ?>" />
                    </div>

                    <div class="form-group">
                        <input class="form-control" type="email" name="dob" placeholder="D.O.B. *" value="<?php if(isset($_POST['dob'])){echo $_POST['dob'];} ?>" />
                    </div>

                    <h4>Personal Information:</h4>
                    <div class="row">
                        <div class="form-group col-xs-6">
                            <input class="form-control" type="text" name="firstname" placeholder="first name *" value="<?php if(isset($_POST['firstname'])){echo $_POST['firstname'];} ?>" />
                        </div>

                        <div class="form-group col-xs-6">
                            <input class="form-control" type="text" name="surname" placeholder="surname *" value="<?php if(isset($_POST['surname'])){echo $_POST['surname'];} ?>" />
                        </div>
                    </div>

                    <div class="form-group">
                        <input class="form-control" type="email" name="email" placeholder="email *" value="<?php if(isset($_POST['email'])){echo $_POST['email'];} ?>" />
                    </div>


                    <div class="form-group">
                        <input class="form-control" type="phone" name="phone" placeholder="telephone *" minlength="7" maxlength="11" value="<?php if(isset($_POST['phone'])){echo $_POST['phone'];} ?>" />
                    </div>

                    <div class="form-group">
                        <input class="form-control" type="text" name="address" placeholder="address" value="<?php if(isset($_POST['address'])){echo $_POST['address'];} ?>" />
                    </div>
                    
                    <div class="form-group">
                        <input class="form-control" type="text" name="postcode" placeholder="postcode" value="<?php if(isset($_POST['postcode'])){echo $_POST['postcode'];} ?>" />
                    </div>
                    
                    <div class="row">
                        <div class="form-group col-xs-12">
                            <button id="register" type="submit" class="btn btn-info btn-lg btn-block" name="register">Register</button>
                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="form-group col-xs-offset-8 col-xs-4">
                            <button id="reset" type="reset" class="btn btn-danger btn-sm btn-block" name="reset">Clear</button>
                        </div>
                    </div>
                    
                </form>
            </div>
            <div class="modal-footer">
                <div class="form-group">
                    <a class="btn btn-link" name="loginModal">login</a>
                </div>
                <div class="form-group">
                    <a class="btn btn-link" name="forgot" href='.'>forgotten membership no.</a>
                </div>
            </div>
        </div>
    </div>
</div>