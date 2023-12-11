<?php
session_start();
require('config.php');

$username = $_POST['username'];
$password = $_POST['password'];

// Use a prepared statement with placeholders
$sql = "SELECT UserName, Email, Password FROM users WHERE UserName = ? OR Email = ? LIMIT 1";
$stmtselect = $conn->prepare($sql);

$stmtselect->bindParam(1, $username);
$stmtselect->bindParam(2, $username);

// Execute the statement with the parameters
$result = $stmtselect->execute();

if ($result) {
    // Fetch the result as an associative array
    $row = $stmtselect->fetch(PDO::FETCH_ASSOC);

    // Check if there is a row with the given username
    if ($row) {
        // Verify the password using password_verify
        if (password_verify($password, $row['Password'])) {
            $_SESSION['userlogin'] = $username;
            echo 'Login successfully';
            // Redirect to the index page or perform further actions
            // header("Location: index.php");
            // exit();
        } else {
            echo 'Incorrect password';
        }
    } else {
        echo 'User not found';
    }
} else {
    echo 'There were errors in your data';
}
?>
