<?php
    $servername = "localhost";
    $username = "educativo";
    $password = "026.3aG[Z*iGCmaD";
    $db_name = "userdb";
    
    // Create connection
    $conn = new PDO("mysql:host=$servername;dbname=$db_name", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
?>
