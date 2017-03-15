<?php
    $servername = "localhost";
    $username = "root";//"206CTLogin";
    $password = "root";//"databaselogin";
    $database = "SSEngDB";//"Sphere-Slopes";
    // Create connection
    $conn = mysqli_connect($servername, $username, $password, $database);
    // Check connection
    if (mysqli_connect_errno()) {
        die("Connection failed: " . mysqli_connect_error());
    }
?>