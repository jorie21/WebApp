<?php

sleep(2);
if(isset($_POST['logout'])) {
    $_SESSION = array();
    session_destroy();
    header("Location: authentication.php"); 
    exit;
}
?>