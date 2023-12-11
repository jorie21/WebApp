<?php
$servername = "localhost";
$username = "educativo";
$password = "026.3aG[Z*iGCmaD";
$db_name = "userdb";

// Create connection
$conn = new mysqli($servername, $username, $password, $db_name);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
