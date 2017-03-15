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
                Registration happens here
                <form action="<?php  ?>" method="POST">
                    <button id="login" type="submit" class="btn btn-info" name="register">Register</a>
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </form>
            </div>
        </div>
    </div>
</div>