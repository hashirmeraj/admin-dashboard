<?php
// Initialize error flags
$successSingupAlert = false;
$passError = false;
$emailError = false;

// Check if the signup was successful or not
if (isset($_GET['singupsuccess']) && $_GET['singupsuccess'] == 'true') {
  $successSingupAlert = true;
} elseif (isset($_GET['singupsuccess']) && $_GET['singupsuccess'] == 'false') {
  // Decode the error message from the URL
  $errorMessage = urldecode($_GET['error']);

  // Set error flags based on the message
  if ($errorMessage == 'Email already exists') {
    $emailError = true;
  } elseif ($errorMessage == 'Passwords do not match') {
    $passError = true;
  }
}
?>

<!DOCTYPE html>
<html class="no-js" lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <title>Register | hashir - Material Admin Template</title>
  <meta name="description" content="">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="style.css">
  <link rel="stylesheet" href="./css/alerts.css">
  <link rel="stylesheet" href="./css/bootstrap.min.css">

  <!-- Favicon -->
  <link rel="shortcut icon" type="image/x-icon" href="img/favicon.ico">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Roboto:100,300,400,700,900" rel="stylesheet">

  <!-- CSS Files -->
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
  <link rel="stylesheet" href="style.css">
  <link rel="stylesheet" href="css/responsive.css">

  <!-- Modernizr JS -->
  <script src="js/vendor/modernizr-2.8.3.min.js"></script>
</head>

<body>

  <!-- Color line for design -->
  <div class="color-line"></div>

  <!-- Showing Different Alerts -->
  <?php
  // Display success alert if signup was successful
  if ($successSingupAlert) {
    echo '
            <div class="closeAlert alert alert-success alert-success-style1 alert-st-bg">
                <button type="button" class="close sucess-op" data-dismiss="alert" aria-label="Close">
                    <span class="icon-sc-cl" aria-hidden="true">×</span>
                </button>
                <i class="fa fa-check adminpro-checked-pro admin-check-pro admin-check-pro-clr" aria-hidden="true"></i>
                <p><strong>Congratulations!</strong> Your account has been created successfully.</p>
            </div>
        ';
  }
  // Display password error alert
  if ($passError) {
    echo '
            <div class="closeAlert alert alert-danger alert-mg-b alert-success-style4 alert-st-bg3">
                <button type="button" class="close sucess-op" data-dismiss="alert" aria-label="Close">
                    <span class="icon-sc-cl" aria-hidden="true">×</span>
                </button>
                <i class="fa fa-times adminpro-danger-error admin-check-pro admin-check-pro-clr3" aria-hidden="true"></i>
                <p><strong>Passwords do not match.</strong> Please ensure both passwords are identical.</p>
            </div>
        ';
  }
  // Display email error alert
  if ($emailError) {
    echo '
            <div class="closeAlert alert alert-danger alert-mg-b alert-success-style4 alert-st-bg3">
                <button type="button" class="close sucess-op" data-dismiss="alert" aria-label="Close">
                    <span class="icon-sc-cl" aria-hidden="true">×</span>
                </button>
                <i class="fa fa-times adminpro-danger-error admin-check-pro admin-check-pro-clr3" aria-hidden="true"></i>
                <p>This email address is already associated with an existing account. Please use a different email.</p>
            </div>
        ';
  }
  ?>

  <div class="container-fluid" style="margin-top: 1.5rem; color: #ffffff;">
    <div class="row mt-2">
      <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12 mt-2"></div>
      <div class="col-md-6 col-md-6 col-sm-6 col-xs-12">
        <div class="text-center custom-login">
          <h3>Register Now</h3>
          <p>Start your journey with us and experience a sleek, aesthetically pleasing platform.</p>
        </div>
        <div class="hpanel">
          <div class="panel-body">
            <!-- Registration Form -->
            <form action="./particles/handleSingup.php" id="loginForm" method="post">
              <div class="row">
                <div class="form-group col-lg-6">
                  <label>Username</label>
                  <input class="form-control" placeholder="User Name" name="Sing_username" required>
                </div>
                <div class="form-group col-lg-6">
                  <label>Email Address</label>
                  <input class="form-control" type="email" name="Sing_email" placeholder="Email">
                </div>
                <div class="form-group col-lg-6">
                  <label>Password</label>
                  <input type="password" class="form-control" placeholder="Password" name="Sing_password">
                </div>
                <div class="form-group col-lg-6">
                  <label>Repeat Password</label>
                  <input type="password" class="form-control" name="Sing_ConPassword">
                </div>
              </div>
              <div class="text-center">
                <button class="btn btn-primary loginbtn" type="submit">Register</button>
              </div>
            </form>
            <div class="text-center custom-login" style="color: #ffffff;">
              <p>Already have an account? <a href="./login.php" style="color: #ffffff;"><strong>Login here</strong></a></p>
            </div>
          </div>
        </div>
      </div>
      <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12"></div>
    </div>
  </div>



  <!-- JavaScript Files -->
  <script src="js/vendor/jquery-1.11.3.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
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
  <script src="./js/main.js"></script>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script>
    $(document).ready(function() {
      // Close alert boxes when the close button is clicked
      $('.close').click(function() {
        $('.closeAlert').fadeOut();
      });
    });
  </script>
</body>

</html>