<!DOCTYPE html>
<html lang="en">
  <?php
  session_start();

  if (isset($_SESSION['email'])) {
    header('Location: Pages/home.php');
    exit;
  }
  // ?>

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Login</title>
  <link rel="icon" type="image/x-icon" href="images/favicon-32x32.png">
  <link href="https://fonts.googleapis.com/css?family=Karla:400,700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.materialdesignicons.com/4.8.95/css/materialdesignicons.min.css">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
  <link rel="stylesheet" href="css/login.css">
</head>

<body>
  <main class="d-flex align-items-center min-vh-100 py-3 py-md-0">
    <div class="container">
      <div class="card login-card">
        <div class="row no-gutters">
          <div class="col-md-5">
            <img src="images/messi.webp" style="object-fit: cover;" alt="login" class="login-card-img">
          </div>
          <div class="col-md-7">
            <div class="card-body">
              <div class="brand-wrapper">
                <img src="images/logo1.png" alt="logo" class="logo">
              </div>
              <p class="login-card-description">Sign into your account</p>
              <form id="login-form" method="post" action="php/login.php">
                <div class="form-group">
                  <label for="email" class="sr-only">Email</label>
                  
                  <input type="email" name="email" id="email" class="form-control" placeholder="Email address*" value="<?php echo isset($_COOKIE["login_email"])?$_COOKIE["login_email"]:"" ?>">
                </div>
                <div class="form-group mb-4">
                  <label for="password" class="sr-only">Password</label>
                  <input type="password" name="password" id="password" class="form-control"
                    placeholder="Enter your Password*" value="<?php echo isset($_COOKIE["login_password"])?$_COOKIE["login_password"]:"" ?>">
                </div>
                <input type="submit" name="login" id="login" class="btn btn-block login-btn mb-4" type="button"
                  value="Login">
                <a href="forgotpass.php" class="forgot-password-link">Forgot password?</a>
                <br><br>
                <div class="custom-control custom-checkbox login-card-check-box">
                  <input name="remember_me" type="checkbox" class="custom-control-input" id="customCheck1">
                  <label class="custom-control-label" for="customCheck1">Remember me</label>
                </div> <br>
              </form>

              <p class="login-card-footer-text">Don't have an account? <a href="Pages/signup.html" class="text-reset">
                  Register here</a></p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </main>
  <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
  <script src="js/alert_script.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
  <script src="https://www.socialintents.com/api/chat/socialintents.1.3.js#2c9fa6c388035f5301880809acee052f" async="async"></script>


  <!-- <script>
  document.addEventListener('DOMContentLoaded', function() {
  var emailCookie = getCookie("email");
  var passwordCookie = getCookie("password");
  if (emailCookie && passwordCookie) {
    document.getElementById("email").value = emailCookie;
    document.getElementById("password").value = passwordCookie;
  }
});

function getCookie(name) {
  var value = "; " + document.cookie;
  var parts = value.split("; " + name + "=");
  if (parts.length == 2) {
    return parts.pop().split(";").shift();
  }
}
      
  </script> -->
  <script>
    $(document).ready(function () {
      $('#login').click(function (e) {
        e.preventDefault();
        var formData = $('#login-form').serialize();
        $.ajax({
          type: 'POST',
          url: 'php/login.php',
          data: formData,
          success: function (response) {
            if (response == "ok-fan") {
              window.location.href = "Pages/home.php";
            }
            else if (response == "ok-manager") {
              window.location.href = "Pages/manager.php"
            }
            else if (response == "no-email") {
              myAlert('Email not registered with us', 'Pages/signup.html', 'Sign up');
            }
            else if (response == "incorrect") {
              myAlert('Email and Password do not match', 'index.php', 'Try again');
            }
            else if (response == "nothing") {
              myAlert('Please fill all fields', 'index.php', 'OK');
            }
          }
        });
      });
    });
  </script>
</body>

</html>