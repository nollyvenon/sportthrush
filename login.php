<?php
include_once("z_db.php");
require_once('recaptcha-php/recaptchalib.php');
require_once("includes/class_system.php");
require_once("includes/session_client.php");
$client_operation = new clientOperation();
$main_status = $client_operation->check_maintenance_status();
$system_object = new LifeHelpSystem();
$privatekey = "6Ld1FBMUAAAAAKg9kSO46NOauAwsy1EuXo15Mi-7";
        //get verify response data
        $verifyResponse = file_get_contents('https://www.google.com/recaptcha/api/siteverify?secret='.$privatekey.'&response='.$_POST['g-recaptcha-response']);
        $responseData = json_decode($verifyResponse);

if ((isset($_POST['submit']) && !empty($_POST['submit'])) || ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['username']))) {
   $status = "OK"; //initial status
  $msg="";

   $username = strip_tags(trim($_POST['username']));
    $password = strip_tags(trim($_POST['password']));
    
  if ( strlen($username) < 6 ){
  $msg=$msg."Username must be more than 5 char length<BR>";
  $status= "NOTOK";}
  
  if ( strlen($password) < 6 ){ //checking if password is greater then 8 or not
  $msg=$msg."Password must be more than 5 char length<BR>";
  $status= "NOTOK";}
  
  if(isset($_POST['g-recaptcha-response']) && !empty($_POST['g-recaptcha-response'])) {
		  if($responseData->success){
				$status= "OK"; 
		   }else{
				$status= "NOTOK";
				$msg = "The reCAPTCHA wasn't entered correctly. Go back and try it again. (reCAPTCHA said: " . $resp->error .=")";
		   }
  
		  if($status=="OK"){
		  
			  // Check database to see if username/password exist.
			  $found_client = $client_operation->authenticate($username, $password);
			  
			  if($found_client) {
				  $user_code = $found_client[0]['user_code'];
				  if($client_operation->client_is_active($user_code)) {
					  $found_client = $found_client[0];
					  $session_client->login($found_client);
					  if (is_localhost()) {
					  redirect_to("xpanel/dashboard.php");
					  }else{
						  redirect_to("xpanel/dashboard");
					  }
				  } else {
					  $message_error = "Your profile is currently inactive or suspended, please contact support for assistance.";
				  }
			  } else {
				  // username/password combo was not found in the database
				  $message_error = "Username and password combination do not match.";
			  }
		  }else{
				  $message_error = "Error in your submission.<br>$msg";
		  }
		}else{
				  $message_error = "Error in your submission.<br>Enter the reCAPTCHA";			
		}

		  
} else { // Form has not been submitted.
    $email = "";
    $password = "";
}

if(isset($_GET['logout'])) {
    $logout_code = $_GET['logout'];
    switch ($logout_code) {
        case 1:
            $message_success = "You have logged out";
            break;
        case 2:
            $message_success = "You have been auto-logged out due to inactivity";
            break;
    }
}


?><!DOCTYPE html>
<html dir="ltr" lang="en-US">
<head>

	<meta http-equiv="content-type" content="text/html; charset=utf-8" />
	<meta name="author" content="Onyx Data Systems" />

	<!-- Stylesheets
	============================================= -->
	<link href="https://fonts.googleapis.com/css?family=Lato:300,400,400i,700|Raleway:300,400,500,600,700|Crete+Round:400i" rel="stylesheet" type="text/css" />
	<link rel="stylesheet" href="css/bootstrap.css" type="text/css" />
	<link rel="stylesheet" href="style.css" type="text/css" />
	<link rel="stylesheet" href="css/dark.css" type="text/css" />
	<link rel="stylesheet" href="css/font-icons.css" type="text/css" />
	<link rel="stylesheet" href="css/animate.css" type="text/css" />
	<link rel="stylesheet" href="css/magnific-popup.css" type="text/css" />

	<link rel="stylesheet" href="css/responsive.css" type="text/css" />
	<meta name="viewport" content="width=device-width, initial-scale=1" />

	<!-- Document Title
	============================================= -->
	<title>Login - Football Fans Network</title>

</head>

<body class="stretched">

	<!-- Document Wrapper
	============================================= -->
	<div id="wrapper" class="clearfix">

		<!-- Content
		============================================= -->
		<section id="content">

			<div class="content-wrap nopadding">

				<div class="section nopadding nomargin" style="width: 100%; height: 100%; position: absolute; left: 0; top: 0; background: url('images/parallax/home/1.jpg') center center no-repeat; background-size: cover;"></div>

				<div class="section nobg full-screen nopadding nomargin">
					<div class="container-fluid vertical-middle divcenter clearfix">

						<div class="center">
							<a href="index"><img src="images/logo-dark.png" alt="Canvas Logo"></a>
						</div>

						<div class="card divcenter noradius noborder" style="max-width: 400px; background-color: rgba(255,255,255,0.93);">
							<div class="card-body" style="padding: 40px;">
								<form id="login-form" name="login-form" class="nobottommargin" action="#" method="post">
									<h3>Login to your Account</h3>
									                       <?php require_once 'layouts/feedback_message.php'; ?>


									<div class="col_full">
										<label for="login-form-username">Username:</label>
										<input type="text" id="username" name="username" value="" class="form-control not-dark" />
									</div>

									<div class="col_full">
										<label for="login-form-password">Password:</label>
										<input type="password" name="password" id="password"  value="" class="form-control not-dark" />
									</div>

									<div class="col_full nobottommargin">
										<button class="button button-3d button-black nomargin" id="login-form-submit" name="login-form-submit" value="login">Login</button>
										<a href="forgotpassword" class="fright">Forgot Password?</a>
									</div>
								</form>

								<div class="line line-sm"></div>

								<div class="center">
									<h4 style="margin-bottom: 15px;">or Login with:</h4>
									<a href="#" class="button button-rounded si-facebook si-colored">Facebook</a>
									<span class="d-none d-md-block">or</span>
									<a href="#" class="button button-rounded si-twitter si-colored">Twitter</a>
								</div>
							</div>
						</div>

						<div class="center dark"><small>Copyrights &copy; All Rights Reserved by Football Fans Network</small></div>

					</div>
				</div>

			</div>

		</section><!-- #content end -->

	</div><!-- #wrapper end -->

	<!-- Go To Top
	============================================= -->
	<div id="gotoTop" class="icon-angle-up"></div>

	<!-- External JavaScripts
	============================================= -->
	<script src="js/jquery.js"></script>
	<script src="js/plugins.js"></script>

	<!-- Footer Scripts
	============================================= -->
	<script src="js/functions.js"></script>

</body>
</html>