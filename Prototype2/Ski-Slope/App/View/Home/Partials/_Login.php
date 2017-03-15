<!-- Euan's Functionality -->
<div class="modal fade" id="loginModal" tabindex="-1" role="dialog" aria-labelledby="loginModal">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="loginModal">User Login</h4>
            </div>
            <div class="modal-body">
                <form action="login" method="POST">
                    <div class="form-group">
                        <input type="mem" name="memno" class="form-control login-input" placeholder="membership no." size="60" maxlength="6">
                    </div>

                    <div class="form-group col-md-4">
                        <input type="dob" class="dob form-control col-xs-4" name="day" placeholder="DD" maxlength="2">
                    </div>
                    
                    <div class="form-group col-md-4">
                        <input type="dob" class="dob form-control col-xs-4" name="month" placeholder="MM" maxlength="2">
                    </div>
                    
                    <div class="form-group col-md-4">
                        <input type="dob" class="dob form-control col-xs-4" name="year" placeholder="YYYY" maxlength="4">
                    </div>
    
                    <div class="form-group buttons">
                        <div class="row">
                            <button id="login" type="submit" class="btn btn-info col-xs-offset-8 col-xs-4" name="login">LOGIN</a>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <div class="form-group">
                    <a class="btn" name="register" href='.'>register</a>
                </div>
                <div class="form-group">
                    <a class="btn" name="forgot" href='.'>forgotten membership no.</a>
                </div>
            </div>
        </div>
    </div>
</div>