<?php
    $servername = "localhost";
    $username = "root";
    $password = "test";
    $database = "Sphere-Slopes";

    // Create connection
    $conn = mysqli_connect($servername, $username, $password, $database);

    // Check connection
    if (mysqli_connect_errno()) {
        die("Connection failed: " . mysqli_connect_error());
    }
?>