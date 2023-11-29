<?php
    require_once ('config.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="Design.css">
  <title>Document</title>
</head>
<body>

  <div class="whole-container">
  <div class="right-container">
        <h2>EDUCATIVO</h2>
        <h1>Welcome to <br>EDUCATIVO</h1>
  </div>
    <div class="left-container">
          <div class="items">
          <h1>Sign Up</h1>
          <p>Create a account to access our latest courses </p>
          </div>
          <form class="signupForm" action="registration.php" method="post">
                  <div class="holder1">
                    <input type="text" id="firstname" name="firstname" placeholder="First Name" required>
                    <input type="text" id="lastname" name="lastname" placeholder="Last Name" required>
                  </div>

                  <div class="holder2"> 
                    <input type="text" id="username" name="username" placeholder="Username" required>
                    <input type="email" id="email" name="Email" placeholder="email" required>
                  </div> 

                  <div class="holder3">
                    <input type="password" id="password" name="password" placeholder="Password" required>
                    <input type="password" id="confirmPassword" name="confirmPassword" placeholder="Confirm Password" required>
                  </div>

                  <div class="holder4">
                    <input type="text" id="gender" name="gender"  list="genderList" placeholder="Gender" required>
                    <datalist id="genderList">
                      <option value="Male">
                      <option value="Female">
                      <option value="Other">
                    </datalist>
                    <label for="bday">Birthday:</label>
                    <input type="date" id="birthday" name="birthday" placeholder="YYYY-MM-DD" required>
                  </div>
          
                  <div class="Terms-condition">
                     <label><input type="checkbox">I've read and agree with <a href="">Terms of Service</a> and our <a href="">Privacy Policy</a></label>
                  </div>
                  <input type="submit" class="button" id="register" value="Sign Up" name="submit">
                  <p id="signin-message">Already have an account?<a href="http://localhost/webapp/FORM_PAGE/Login_form/login.php"  id="signin-link">Login </a></p>
                  </form>
                  <script>
                            document.addEventListener("DOMContentLoaded", function() {
                              // Set the delay in milliseconds (e.g., 3000 milliseconds = 3 seconds)
                              var delayInMilliseconds = 1000;

                              // Function to redirect to another page after the specified delay
                              function redirectToSignin() {
                                window.location.href = "http://localhost/webapp/FORM_PAGE/Login_form/login.php";
                              }

                              // Add a click event listener to the signup link
                              document.getElementById("signin-link").addEventListener("click", function(event) {
                                // Prevent the default link behavior
                                event.preventDefault();

                                // After the delay, call the function to redirect
                                setTimeout(redirectToSignin, delayInMilliseconds);
                              });
                            });
                  </script>

                

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>
<script type="text/javascript">
    $(function () {
        $('#register').click(function (e) {
            var valid = this.form.checkValidity();
            if (valid) {

                var firstname = $('#firstname').val();
                var lastname = $('#lastname').val();
                var username = $('#username').val();
                var email = $('#email').val();
                var password = $('#password').val();
                var confirmPassword = $('#confirmPassword').val();
                var gender = $('#gender').val();
                var birthday = $('#birthday').val();

                e.preventDefault();
                $.ajax({
                    type: 'POST',
                    url: 'process.php',
                    data: {
                        firstname: firstname,
                        lastname: lastname,
                        username: username,
                        email: email,
                        password: password,
                        confirmPassword: confirmPassword,
                        gender: gender,
                        birthday: birthday
                    },

                    success: function (data) {
                        console.log(data);  // Log the response to the console
                        if (data.startsWith('Error')) {
                            Swal.fire({
                                'title': 'Error',
                                'text': data,
                                'type': 'error'
                            });
                        } else {
                            Swal.fire({
                                'title': 'Successful',
                                'text': data,
                                'type': 'success'
                            });
                        }
                    },
                    error: function (xhr, status, error) {
                        console.log(xhr.responseText);  // Log the error response to the console
                        Swal.fire({
                            'title': 'Error',
                            'text': 'There were errors while saving the data.',
                            'type': 'error'
                        });
                    }
                });
            }
        });
    });
</script>


</body>
</html>