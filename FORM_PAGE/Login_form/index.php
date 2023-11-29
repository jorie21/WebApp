<?php
  session_start();
  if(!isset($_SESSION['userlogin'])){
    header ("Location: login.php");
  }
  if(isset($_GET['logout'])){
    sleep(2);
    session_destroy();
    unset($_SESSION);
    header("Location: login.php");
    exit();
  }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="outline.css">
</head>
<body>
    <div class="banner">
        <div class="banner-title">
                <!-- <img src="" alt=""> -->
                <h1>EDUCATIVO</h1>
        </div>
        <nav>
            <div class="banner-selection">
                <a href="#">Home</a>
                <a href="#">Courses</a>
                <a href="#aboutus">About Us</a>
            </div>
        </nav>
        <div class="users">
            <a href="index.php?logout=true"><button>Logout</button></a>
        </div>
    </div>
<div class="whole-container">
    <div class="left-container">

          <h1  data-text="anywhere and anytime">Improve your knowledge <br></h1>
          <p> Embodies the essence of enlightenment and knowledge. It signifies a journey of discovery, growth, and the pursuit of intellectual development. In the realm of Educativo, individuals engage in a dynamic process of acquiring insights, skills, and wisdom that not only expand their minds but also empower them to contribute meaningfully to the world.</p>
          <button>Join Class Now!</button>
    </div>
    <div class="right-container">
          <img src="Image/educ_page-removebg-preview.png" alt="">
    </div>
    </div>
    <div class="bottom">
    <div class="aboutus"> 
          <h1 id="aboutus">About Us</h1>
          <div class="about-us-container">
            
          <p>Welcome to EDUCATIVO!, we are dedicated to fostering a passion for learning and providing quality education that empowers individuals to reach their full potential. With a commitment to academic excellence, innovation, and inclusivity, our team of experienced educators strives to create a dynamic and engaging learning environment for students 
          <p>Whether you're a curious learner, a dedicated student, or a lifelong scholar, our diverse range of educational programs and resources are designed to inspire and equip you with the knowledge and skills needed to navigate an ever-changing world. Join us on a journey of discovery, where education goes beyond the classroom, and together, we build a brighter future through the power of knowledge.</p></div>
          
    </div>
    <div class="photo">
        <img src="image/404970693_1006356280470012_1616781361438574168_n.png" alt="">

    </div>
  </div>
  <div class="contact-info-container">
        <div class="contact-info">
          <h1>CONTACT INFO</h1>
        </div>
        <div class="contact-logo">
              <a href=""><img class="facebook" src="image/facebook.svg" alt=""></a>
              <a href="#"><img class="google" src="image/google.svg" alt=""></a>
              <a href="#"><img class="instagram" src="image/instagram.svg" alt=""></a>
              <a href="#"><img class="github" src="image/square-github.svg" alt=""></a>
        </div>
            
  </div>
  <div class="copyright-container">
              <p>© Copyright 2023 EDUCATIVO. All rights reserved.</p>
            </div>

</body>
</html>
