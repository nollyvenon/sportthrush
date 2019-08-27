<?php
include_once("z_db.php");
require_once('recaptcha-php/recaptchalib.php');
require_once("includes/class_system.php");
require_once("includes/session_client.php");
require_once("includes/class_forum_operation.php");
require_once("includes/class_forum_operation.php");
require_once("talkpoint/includes/functions.inc.php");
include_once ("includes/class_upline_operation.php");
$client_operation = new clientOperation();
$spill_operation = new spilloverOperation();

$forum_settings = $forum_operation->get_forum_settings();
$main_status = $client_operation->check_maintenance_status();
$system_object = new LifeHelpSystem();
$privatekey = "6LckovsSAAAAAA4kpjVGMnf57369dhOqheZZCLQ2";
        //get verify response data
        $verifyResponse = file_get_contents('https://www.google.com/recaptcha/api/siteverify?secret='.$privatekey.'&response='.$_POST['g-recaptcha-response']);
        $responseData = json_decode($verifyResponse);

if ($session_client->is_logged_in()) {
    //redirect_to("xpanel/dashboard");
}


if ((isset($_POST['login_submit']) && !empty($_POST['login_submit']))) {
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
  
 /* if(isset($_POST['g-recaptcha-response']) && !empty($_POST['g-recaptcha-response'])) {
		  if($responseData->success){
				$status= "OK"; 
		   }else{
				$status= "NOTOK";
				$msg = "The reCAPTCHA wasn't entered correctly. Go back and try it again. (reCAPTCHA said: " . $resp->error .=")";
		   }
  
		  if($status=="OK"){*/
		  
			  // Check database to see if username/password exist.
			  $found_client = $client_operation->authenticate($username, $password);
			  
			  if($found_client) {
				  $user_code = $found_client[0]['user_code'];
				  if($client_operation->client_is_active($user_code)) {
					  $found_client = $found_client[0];
					  $session_client->login($found_client);
							$result = mysqli_query($forum_con,"SELECT user_id, user_name, user_pw, user_type, UNIX_TIMESTAMP(last_login) AS last_login, UNIX_TIMESTAMP(last_logout) AS last_logout, thread_order, user_view, sidebar, fold_threads, thread_display, category_selection, auto_login_code, activate_code, language, time_zone, time_difference, theme, tou_accepted, dps_accepted FROM mlf2_userdata WHERE lower(user_name) = '$username'");
							$feld = mysqli_fetch_array($result);

							$auto_login_code = random_string(50);
							$auto_login_code_cookie = $auto_login_code . intval($feld['user_id']);
							setcookie('mlf2_auto_login', $auto_login_code_cookie, TIMESTAMP + (3600 * 24 * 30));
							$save_auto_login = true;
							$user_id = $feld["user_id"];
							$user_name = $feld["user_name"];
							$user_type = $feld["user_type"];
							$usersettings['newtime'] = $feld['last_logout'];
							$usersettings['user_view'] = $feld['user_view'];
							$usersettings['thread_order'] = $feld['thread_order'];
							$usersettings['sidebar'] = $feld['sidebar'];
							$usersettings['fold_threads'] = $feld['fold_threads'];
							$usersettings['thread_display'] = $feld['thread_display'];
							$usersettings['page'] = 1;
							$usersettings['category'] = 0;
							$usersettings['latest_postings'] = 1;
							if (!is_null($feld['category_selection'])) {
								$category_selection = explode(',',$feld['category_selection']);
								$usersettings['category_selection'] = $category_selection;
							}
					  
					  	if (!is_null($feld['category_selection'])) {
						$category_selection = explode(',',$feld['category_selection']);
						$usersettings['category_selection'] = $category_selection;
					}
					if($feld['language'] != '') {
						$languages = get_languages();
						if (isset($languages) && in_array($feld['language'], $languages)) {
							$usersettings['language'] = $feld['language'];
							$language_update = $feld['language'];
						}
					}
					if (empty($language_update)) $language_update = '';

					if ($feld['theme'] != '') {
						$themes = get_themes();
						if (isset($themes) && in_array($feld['theme'], $themes)) {
							$usersettings['theme'] = $feld['theme'];
							$theme_update = $feld['theme'];
						}
					}
					if (empty($theme_update)) $theme_update = '';

					if ($feld['time_zone'] != '') {
						if (function_exists('date_default_timezone_set') && $time_zones = get_timezones()) {
							if (in_array($feld['time_zone'], $time_zones)) {
								$usersettings['time_zone'] = $feld['time_zone'];
								$time_zone_update = $feld['time_zone'];
							}
						}
					}
					if (empty($time_zone_update)) $time_zone_update = '';

					if (!empty($feld['time_difference'])) $usersettings['time_difference'] = $feld['time_difference'];

					if (isset($read)) $read_before_logged_in = $read; // get read postings from cookie (read before logged in)

					  	 print_r($forum_settings['session_prefix']);
							$_SESSION['mlf2_user_id'] = $user_id;
							$_SESSION['mlf2_user_name'] = $user_name;
							$_SESSION['mlf2_user_type'] = $user_type;
							$_SESSION['mlf2_usersettings'] = $usersettings;
					  

							@mysqli_query($forum_con, "UPDATE mlf2_userdata SET logins = logins + 1, last_login = NOW(), last_logout = NOW(), user_ip = '".$_SERVER['REMOTE_ADDR'] ."', auto_login_code = '$auto_login_code', pwf_code = '', language = '". $language_update ."', time_zone = '". $time_zone_update ."', theme = '". $theme_update ."' WHERE user_id = ". intval($user_id));
					  
					 

						if ($db_settings['useronline_table'] != "") {
							@mysqli_query($forum_con, "DELETE FROM mlf2_useronline WHERE ip = '". $_SERVER['REMOTE_ADDR'] ."'");
						}
					 // header('Location: talkpoint/index');
					
					  if (is_localhost()) {
						  redirect_to("xpanel/dashboard.php");
					  }else{
						  redirect_to("https://footballfansnetwork.com/xpanel/dashboard");
					  }
				  } else {
					  $message_error = "Your profile is currently inactive or suspended, please contact support for assistance.";
				  }
			  } else {
				  // username/password combo was not found in the database
				  $message_error = "Username and password combination do not match.";
			  }
		/*  }else{
				  $message_error = "Error in your submission.<br>$msg";
		  }
		}else{
				  $message_error = "Error in your submission.<br>Enter the reCAPTCHA";			
		}*/

		  
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

if(isset($_POST['register_submit']))
{
    foreach($_POST as $key => $value) {
        $_POST[$key] = $db_handle->sanitizePost(trim($value));
    }
	extract($_POST);

	//validation starts
	// if userid is less than 6 char then status is not ok
	if(!isset($register_username) or strlen($register_username) <6){
		$message_error .= "Username Should Contain Minimum 6 CHARACTERS.<BR>";
	}									
	
	if ( strlen($register_password) < 6 || !ctype_alnum($register_password)){
	  $message_error .= "Username must be more than 5 characters and contains alphanumeric Characters only ";
	  $status= "NOTOK";
	}

	if($client_operation->check_email_exists($register_email)){
	$message_error .="Email already registered.";
	}	

	if($client_operation->check_username_exists($register_username)){
	$message_error .="Username already exists. Please Try Another One.";
		}

	if ( $register_password <> $register_repassword ){
		$message_error .= "Both Passwords are not matching.<BR>";
	}			

/*
$rrr=mysqli_query($con,"SELECT COUNT(*) FROM affiliateuser WHERE mobile = '$mobile'");
$r3 = mysqli_fetch_row($rrr);
$nr3 = $r3[0];
if($nr3==1){
$msg=$msg."Mobile Number Already Registered.<BR>";
$status= "NOTOK";
}	

$result = mysqli_query($con,"SELECT count(*) FROM  affiliateuser where username = '$ref'");
$row = mysqli_fetch_row($result);
$numrows = $row[0];
if ($numrows==0)
{
$msg=$msg."Sponsor/Referral Username Not Found..<BR>";
$status= "NOTOK";
}*/

if ( $country == "" ){
	$message_error .= "Please Enter Your Country Name.<BR>";
}	

//Test if it is a shared client
if (!empty($_SERVER['HTTP_CLIENT_IP'])){
  $ip=$_SERVER['HTTP_CLIENT_IP'];
//Is it a proxy address
}elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])){
  $ip=$_SERVER['HTTP_X_FORWARDED_FOR'];
}else{
  $ip=$_SERVER['REMOTE_ADDR'];
}
	  //The value of $ip at this point would look something like: "192.0.34.166"
	  $ip = ip2long($ip);	  
	  
	if(isset($_POST['g-recaptcha-response']) && !empty($_POST['g-recaptcha-response'])) {
				/*if($responseData->success){
					  $status= "OK"; 
				 }else{
					  $status= "NOTOK";
					  $message_error = "The reCAPTCHA wasn't entered correctly. Go back and try it again. (reCAPTCHA said: " . $resp->error .=")";
				 }	*/  
		 $status= "OK"; 
			if ($status=="OK" and $message_error=="") 
			{	//echo $referral;
				 $result = $client_operation->new_user($register_username, $register_password, $register_name, $register_email, $register_phone, $referral, $club, $country, $ip);
				if($result) {
					$message_success =  "<b>Congratulation $username!</b><br>Registration Successful.";
					$success = '1';
					$default_view = intval($forum_settings['default_view']) != "" ? intval($forum_settings['default_view']) : 0;
					$fold_threads = intval($forum_settings['fold_threads']) != "" ? intval($forum_settings['fold_threads']) : 0;
					$default_email_contact = intval($forum_settings['default_email_contact']) != "" ? intval($forum_settings['default_email_contact']) : 0;
					$pw_hash = generate_pw_hash($register_password); 
					$remote_addr = $_SERVER["REMOTE_ADDR"];
					$sql = "INSERT INTO mlf2_userdata (user_type, user_name, user_real_name, user_pw, user_email, user_hp, user_location, signature, profile, email_contact, last_login, last_logout, user_ip, registered, user_view, fold_threads, user_lock, auto_login_code, pwf_code, activate_code, tou_accepted, dps_accepted) VALUES (0, '$register_username', '', '$pw_hash', '$register_email', '', '', '', '', '$default_email_contact', NULL, NOW(), '$remote_addr', NOW(), '$default_view', '$fold_threads', '$user_lock', '', '', '', '1', '1')";
					$forum_con->query($sql);
					//mysqli_query($forum_con, $sql);
				} else {
					$message_error = "An error occurred, the registration could not be completed.";
				}
			}else{
					$message_error .= "An error occurred, the registration could not be saved.";
			}
		}else{
				  $message_error .= "Error in your submission.<br>Enter the reCAPTCHA";			
		}
	  

	}
	
	if(isset($_GET["ref"])){
			$ref=mysqli_real_escape_string($con,$_GET["ref"]);
			$_SESSION['lifehelp_gov_ref'] = $ref;
			
	}
$countries = $client_operation->get_all_countries();
$clubs = $client_operation->get_all_clubs();

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
<script src='https://www.google.com/recaptcha/api.js'></script>

	<!-- Document Title
	============================================= -->
	<title>Login | | Football Fans Network</title>

</head>

<body class="stretched">

	<!-- Document Wrapper
	============================================= -->
	<div id="wrapper" class="clearfix">

		<!-- Header
		============================================= -->
		<?php include_once('header.php');?>
		<!-- #header end -->

		<!-- Page Title
		============================================= -->
		<section id="page-title">

			<div class="container clearfix">
				<h1>My Account</h1>
				<ol class="breadcrumb">
					<li class="breadcrumb-item"><a href="#">Home</a></li>
					<li class="breadcrumb-item active" aria-current="page">Login/Register</li>
				</ol>
			</div>

		</section><!-- #page-title end -->

		<!-- Content
		============================================= -->
		<section id="content">

			<div class="content-wrap">
				<div class="section nopadding nomargin" style="width: 100%; height: 100%; position: absolute; left: 0; top: 0; background: url('images/parallax/home/1.jpg') center center no-repeat; background-size: cover;"></div>

				<div class="container clearfix">

					<div class="accordion accordion-lg divcenter clearfix card noradius noborder" style="max-width: 550px; background-color: rgba(255,255,255,0.93);">
						<div class="card-body" style="padding: 40px;">
						<?php require_once 'layouts/feedback_message.php'; ?>

						<div class="acctitle"><i class="acc-closed icon-lock3"></i><i class="acc-open icon-unlock"></i>Login to your Account</div>
						<div class="acc_content clearfix">
							<form id="login-form" name="login-form" class="nobottommargin" action="#" method="post">
								<div class="col_full">
									<label for="username">Username:</label>
									<input type="text" id="username" name="username" value="" class="form-control" />
								</div>

								<div class="col_full">
									<label for="password">Password:</label>
									<input type="password" id="password" name="password" value="" class="form-control" />
								</div>
								<div class="g-recaptcha" data-sitekey="6LckovsSAAAAAHuv_vL7rUxLNil-1go3i5gjy5BM"></div>

								<div class="col_full nobottommargin">
									<button class="button button-3d button-black nomargin" id="login_submit" name="login_submit" value="login">Login</button>
									<a href="forgotpassword" class="fright">Forgot Password?</a>
								</div>
							</form>
						</div>

						<div class="acctitle"><i class="acc-closed icon-user4"></i><i class="acc-open icon-ok-sign"></i>New Signup? Register for an Account</div>
						<div class="acc_content clearfix">
							<form id="register-form" name="register-form" class="nobottommargin" action="#" method="post">
								<div class="col_full">
									<label for="register_name">Name:</label>
									<input type="text" id="register_name" name="register_name" value="" class="form-control" />
								</div>

								<div class="col_full">
									<label for="register_email">Email Address:</label>
									<input type="email" pattern="[a-zA-Z0-9!#$%&'*+\/=?^_`{|}~.-]+@[a-zA-Z0-9-]+(\.[a-zA-Z0-9-]+)*" id="register_email" title="Contact's email (format: xxx@xxx.xxx)" name="register_email" value="" class="form-control" />
								</div>

								<div class="col_full">
									<label for="register_username">Choose a Username:</label>
									<input type="text" id="register_username" name="register_username" value="" class="form-control" />
								</div>

								<div class="col_full">
									<label for="register_phone">Phone:</label>
									<input type="text" id="register_phone" name="register_phone" value="" class="form-control" />
								</div>

								<div class="col_full">
									<label for="register_password">Choose Password:</label>
									<input type="password" id="register_password" name="register_password" value="" class="form-control" />
								</div>

								<div class="col_full">
									<label for="register_repassword">Re-enter Password:</label>
									<input type="password" id="register_repassword" name="register_repassword" value="" class="form-control" />
								</div>
								
								<div class="col_full">
									<label>Country</label>
                        			<select name="country" data-required="true" class="form-control" >
										<option value="">Select Country</option>
										<?php 
										foreach($countries as $row2){
										?>
                                    		<option value="<?php echo $row2['country_id'];?>">
													<?php echo $row2['country_name'];?>
												</option>
										<?php } ?>
									</select>
								        
                          </div>
								<div class="col_full">
									<label>Club</label>
									<select data-required="true" class="form-control m-t" name="club" required>
										<option value="">Select Club</option>
										<?php 
										foreach($clubs as $row2){
										?>
                                    		<option value="<?php echo $row2['club_id'];?>">
													<?php echo $row2['club_name'];?>
												</option>
										<?php } ?>
										</select>
								</div>

						<div class="col_full">
                          <label>Sponsor/Referral Username</label>
                          <input type="text" class="form-control" data-required="true" name="referral" value="<?php if (isset($_SESSION['lifehelp_gov_ref'])){
			echo $_SESSION['lifehelp_gov_ref']; } ?>" >                        
                        </div>
								<div class="g-recaptcha" data-sitekey="6LckovsSAAAAAHuv_vL7rUxLNil-1go3i5gjy5BM"></div>

								<div class="col_full nobottommargin">
									<button class="button button-3d button-black nomargin" id="register_submit" name="register_submit" value="register">Register Now</button>
								</div>
							</form>
						</div>

					</div>
					</div>

				</div>

			</div>

		</section><!-- #content end -->

		<!-- Footer
		============================================= -->
		<?php include('footer.php');?>
		<!-- #footer end -->

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