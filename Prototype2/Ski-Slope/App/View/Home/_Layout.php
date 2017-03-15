<?php
    include($_SERVER['DOCUMENT_ROOT']."/App/View/Home/Partials/_Login.php");
    include($_SERVER['DOCUMENT_ROOT']."/App/View/Home/Partials/_Register.php");
?>

<div class="container">
    <div class="row margin-top-50">
        <center>
            <img class="home-logo" alt="SkiSlopeLogo" src="/Public/Media/Images/logo.png" />
            <h1>Sphere Slopes</h1>
        </center>
    </div>
    
    <div class="row">
        <div class="col-sm-6 margin-bottom-5">
            <button type="button" data-toggle="modal" data-target="#loginModal" class="btn btn-default btn-block btn-lg">
                Login
            </button>
        </div>
        
        <div class="col-sm-6">
            <button type="button" data-toggle="modal" data-target="#registerModal" class="btn btn-info btn-block btn-lg">
                Register
            </button>
        </div>
    </div>
</div>
