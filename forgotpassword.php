<?php
include_once("z_db.php");
include_once ("includes/class_client_operation.php");

if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['femail']))
{

$email=mysqli_real_escape_string($con,$_POST['femail']);
$status=1;
if($status==1){

$status = "OK";
$msg="";
//checking constraints
if ( strlen($email) < 1 ){
$msg=$msg."Please Enter Your Email Id.<BR>";
$status= "NOTOK";}

/*if (!eregi("^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$", $email)){
$msg=$msg."Email Id Not Valid, Please Enter The Correct Email Id .<BR>";
$status= "NOTOK";
}*/


$result = mysqli_query($con,"SELECT count(*) FROM  participants where email = '$email'");
$row = mysqli_fetch_row($result);
$numrows = $row[0];

if(($numrows) == 0) {
$msg=$msg."Your account not found or your account is inactive. Please contact your administrator.<BR>";
$status= "NOTOK";}

$sqlquery="SELECT wlink FROM settings where sno=0"; //fetching website from databse
$rec2=mysqli_query($con,$sqlquery);
$row2 = mysqli_fetch_row($rec2);
$wlink=$row2[0]; //assigning website address
}

//$newpassword = substr(str_shuffle('abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789@#$%^&*') , 0 , 14 );
$gen_pass = rand_string(7);
$pass_salt = generateHash($gen_pass);
			
if ( strlen($gen_pass) < 6 ){
$msg=$msg."Password Can not generated, system error. Try again.<BR>";
$status= "NOTOK";}


if($status=="OK")
{
$sqlquery111="SELECT etext FROM emailtext where code='FORGOTPASSWORD'"; //fetching website from databse
$rec2111=mysqli_query($con,$sqlquery111);
$row2111 = mysqli_fetch_row($rec2111);
$emailtext=$row2111[0]; //assigning email text for email


$re = mysqli_query($con,"update participants set sammer_pass = '$gen_pass',pass_salt = '$pass_salt' where email = '$email'");
if($re)
{

$message=$emailtext;
$to=$email;
$headers = "MIME-Version: 1.0" . "\r\n";
$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
$headers .= 'From: Football Fans Network Admin <no-reply@footballfansnetwork.com>' . "\r\n";
$subject="Password Request";
$message.="This is your new password : <b> $gen_pass </b><br><br>";
mail($to,$subject,$message,$headers);

	$message_error = "<br><center>Your password has been sent to your registered email. Please check your junk or spam folder if you do not find in your inbox. <br>";
}else{
 	$message_error = "<center><br>We have found some technical glitch and unable to process your request. Please Ask Admin or try again after some time.<br>";
}
//updating status if validation passes

}else{
	$message_error = $msg; //priting error if found in validation

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
<script src='https://www.google.com/recaptcha/api.js'></script>

	<!-- Document Title
	============================================= -->
	<title>Forgot Password | Football Fans Network</title>

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
					<li class="breadcrumb-item active" aria-current="page">Forgot Password</li>
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

						<div class="acctitle"><i class="acc-closed icon-lock3"></i><i class="acc-open icon-unlock"></i>Login to your Account</div>
						<div class="acc_content clearfix">
							<form class="form-horizontal form-material" id="loginform" action="" method="post">
							<?php require_once 'layouts/feedback_message.php'; ?>
								<h3 class="box-title m-b-20">Recover Password</h3>
								<div class="form-group">
								  <div class="col-xs-12">
									<input class="form-control" type="text" required="" id="femail" name="femail" placeholder="Email">
								  </div>
								</div>
								<div class="form-group text-center m-t-20">
								  <div class="col-xs-12">
									<button class="btn btn-info btn-lg btn-block text-uppercase waves-effect waves-light" type="submit">Reset</button>
								  </div>
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