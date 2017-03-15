<?php 
    if (isset($_REQUEST['user'])) {
        echo ("<title>".$_REQUEST['user']."</title>");
    } else {
        echo ("<title>Sphere Check-In</title>");
    }
?>