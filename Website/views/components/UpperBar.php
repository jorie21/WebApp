<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
?>

<div class="Upper-Bar">
    <div class="Left-Side">
        <img style="height: 70px;" src="../public/images/cdm-logo.png" alt="">
        <h2 style="font-size: 32px;">Colegio de Montalban’s <br><span style="font-size: 20px;">Class Scheduling System</span></h2>
    </div>
    
    <div class="Right-Side">
        <h2 style="color: #FFFFFF; font-size: 32px;">
            <?php
            if(isset($_SESSION['user_type'])) {
                if($_SESSION['user_type'] == 'instructor' && isset($_SESSION['instructorNo'])) {
                    echo $_SESSION['instructorNo'];
                } elseif($_SESSION['user_type'] == 'student' && isset($_SESSION['studentNo'])) {
                    echo $_SESSION['studentNo'];
                }
            }
            ?>
        </h2>
        <form method="post">
            <button type="submit" class="Logout-Button" name="logout">LOGOUT</button>
        </form>
    </div>
</div>
