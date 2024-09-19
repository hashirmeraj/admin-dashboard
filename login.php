<?php

// Initialize error flags
$emailError = false;
$passwordError = false;

// Check if login error parameters are set in the URL
if (isset($_GET['login']) && $_GET['login'] == 'false') {
  // Decode the error message from the URL
  $errorMessage = urldecode($_GET['error']);
  // Set error flags based on the error message
  if ($errorMessage == "Invalid Email") {
    $emailError = true;
  } elseif ($errorMessage == "Invalid password") {
    $passwordError = true;
  }
}
?>



<!doctype html>
<html class="no-js" lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <title>Login | Quiz Arcade</title> <!-- Combined and updated title -->
  <meta name="description" content="">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Favicon -->
  <link rel="shortcut icon" type="image/png" href="img/logosn2.png">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Roboto:100,300,400,700,900" rel="stylesheet">

  <!-- CSS Files -->
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <link rel="stylesheet" href="css/font-awesome.min.css">
  <link rel="stylesheet" href="css/owl.carousel.css">
  <link rel="stylesheet" href="css/owl.theme.css">
  <link rel="stylesheet" href="css/owl.transitions.css">
  <link rel="stylesheet" href="css/animate.css">
  <link rel="stylesheet" href="css/normalize.css">
  <link rel="stylesheet" href="css/meanmenu.min.css">
  <link rel="stylesheet" href="css/main.css">
  <link rel="stylesheet" href="css/morrisjs/morris.css">
  <link rel="stylesheet" href="css/scrollbar/jquery.mCustomScrollbar.min.css">
  <link rel="stylesheet" href="css/metisMenu/metisMenu.min.css">
  <link rel="stylesheet" href="css/metisMenu/metisMenu-vertical.css">
  <link rel="stylesheet" href="css/calendar/fullcalendar.min.css">
  <link rel="stylesheet" href="css/calendar/fullcalendar.print.min.css">
  <link rel="stylesheet" href="css/alerts.css">
  <link rel="stylesheet" href="css/form/all-type-forms.css"> <!-- Added from second <head> -->
  <link rel="stylesheet" href="style.css">
  <link rel="stylesheet" href="css/responsive.css">

  <!-- Modernizr JS -->
  <script src="js/vendor/modernizr-2.8.3.min.js"></script>
</head>

<body>
  <!--[if lt IE 8]>
    <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
  <![endif]-->

  <div class="color-line"></div>

  <!-- Displaying alerts for login errors -->
  <?php
  // Display error message for invalid password
  if ($passwordError) {
    echo '
      <div class="closeAlert alert alert-danger alert-mg-b alert-success-style4 alert-st-bg3">
        <button type="button" class="close sucess-op" data-dismiss="alert" aria-label="Close">
        </button>
        <i class="fa fa-times adminpro-danger-error admin-check-pro admin-check-pro-clr3" aria-hidden="true"></i>
        <p><strong>Invalid password.</strong> Please enter a valid password to continue.</p>
      </div>
    ';
  }

  // Display error message for invalid email
  if ($emailError) {
    echo '
      <div class="closeAlert alert alert-danger alert-mg-b alert-success-style4 alert-st-bg3">
        <button type="button" class="close sucess-op" data-dismiss="alert" aria-label="Close">
        </button>
        <i class="fa fa-times adminpro-danger-error admin-check-pro admin-check-pro-clr3" aria-hidden="true"></i>
        <p><strong>Invalid email address.</strong> Please enter a valid email to continue.</p>
      </div>
    ';
  }
  ?>

  <div class="container-fluid" style="margin-top: 1.5rem; color: #ffffff;">
    <div class="row">
      <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12"></div>
      <div class="col-md-4 col-md-4 col-sm-4 col-xs-12">
        <div class="text-center m-b-md custom-login">
          <h3>Log In to Explore</h3>
          <p>Unlock the full range of features available to you!</p>
        </div>
        <div class="hpanel">
          <div class="panel-body">
            <form action="./particles/handleLogin.php" id="loginForm" method="post">
              <div class="form-group">
                <label class="control-label" for="username">Email</label>
                <input type="email" placeholder="example@gmail.com" title="Please enter your email" required=""
                  value="" name="loginEmail" id="username" class="form-control">
                <span class="help-block small">Your unique email to app</span>
              </div>
              <div class="form-group">
                <label class="control-label" for="password">Password</label>
                <input type="password" title="Please enter your password" placeholder="******" required="" value=""
                  name="loginPassword" id="password" class="form-control">
                <span class="help-block small">Your strong password</span>
              </div>
              <button class="btn btn-primary btn-block loginbtn">Login</button>
              <a class="btn btn-default btn-block" href="./register.php">Register</a>
            </form>
          </div>
        </div>
      </div>
      <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12"></div>
    </div>

    <!-- jQuery -->
    <script src="js/vendor/jquery-1.11.3.min.js"></script>
    <!-- Bootstrap JS -->
    <script src="js/bootstrap.min.js"></script>
    <!-- Other JS files -->
    <script src="js/wow.min.js"></script>
    <script src="js/jquery-price-slider.js"></script>
    <script src="js/jquery.meanmenu.js"></script>
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/jquery.sticky.js"></script>
    <script src="js/jquery.scrollUp.min.js"></script>
    <script src="js/scrollbar/jquery.mCustomScrollbar.concat.min.js"></script>
    <script src="js/scrollbar/mCustomScrollbar-active.js"></script>
    <script src="js/metisMenu/metisMenu.min.js"></script>
    <script src="js/metisMenu/metisMenu-active.js"></script>
    <script src="js/tab.js"></script>
    <script src="js/icheck/icheck.min.js"></script>
    <script src="js/icheck/icheck-active.js"></script>
    <script src="js/plugins.js"></script>
    <script src="js/main.js"></script>
    <script>
      // Fade out alerts when the close button is clicked
      $(document).ready(function() {
        $('.close').click(function() {
          $('.closeAlert').fadeOut();
        });
      });
    </script>
</body>

</html>
