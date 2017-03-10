<?php
    session_start();
    
    include 'connect.php';
    
    
    $_SESSION["inputId"] = "000001";
    $_SESSION["inputDOB"] = "1983-04-05";
    $in = $_SESSION["inputId"];
    $in2 = $_SESSION["inputDOB"];
    
    echo checkDOB("000001", "1983-04-05");
    
    echo checkDOB($in, $in2);
?>