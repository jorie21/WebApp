<?php 
  session_start();
  if(isset($_SESSION['userlogin'])){
    header ("Location: index.php");
  }
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../css/Style.css">
  <title>EDUCATIVO Login</title>
</head>
<body>
  <div class="whole-container">
  <div class="left-container">
    <h1>EDUCATIVO</h1>
    <img src="../../image/educ_page-removebg-preview.png">
  </div>
  <div class="right-container">
    
  <form class="Login-form" action="" method="POST">
  <h1>Login to your account</h1>
    <label for="">Username/Email:</label>
    <input type="text" id="username" name="username" placeholder="Enter Username">
    <div class="pass">
    <label for="">Password:</label>
    <input type="password" id="password" name="password" placeholder="Enter Password">
    </div>
    <label><input type="checkbox">Remember Me</label>
    <input type="submit" class="button" id="login" value="LOGIN" name="login">
    <p id="signup-message">Doesn't have an account yet?<a href="../User-interface/Registration_form/registration.php" id="signup-link">Sign up</a></p>
  </form>
  </div>
  </div>
        
  <script>
  document.addEventListener("DOMContentLoaded", function() {
    // Set the delay in milliseconds (e.g., 3000 milliseconds = 3 seconds)
    var delayInMilliseconds = 1000;

    // Function to redirect to another page after the specified delay
    function redirectToSignup() {
      window.location.href = "../Registration_form/registration.php";
    }

    // Add a click event listener to the signup link
    document.getElementById("signup-link").addEventListener("click", function(event) {
      // Prevent the default link behavior
      event.preventDefault();

      // After the delay, call the function to redirect
      setTimeout(redirectToSignup, delayInMilliseconds);
    });
  });
</script>



  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>
  <script type="text/javascript"> 
    $(function(){
        $('#login').click(function(e){

            var valid = this.form.checkValidity();

            if(valid){

            var username = $('#username').val();
            var password  = $('#password').val();
            
                e.preventDefault(); 

                $.ajax({
                    type: 'POST',
                    url: 'jslogin.php',
                    data: {username: username, password: password},
                    success: function(data){
                      Swal.fire(data);
                              if ($.trim(data) === "Login successfully") {
                                  // Use setTimeout with an anonymous function
                                  setTimeout(function() {
                                    window.location.href = "index.php";
                                  }, 2000);
                              } 
                    },
                    error: function(data){
                        Swal.fire({
                                'title': 'Errors',
                                'text': 'There were errors while processing your request.',
                                'type': 'error'
                                })
                    }
                });
            }
        });
    });
</script>

  
</body>
</html>