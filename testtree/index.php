<?php
include_once ("../xpanel/z_db.php");
$user_code=$_SESSION['client_unique_code'];
if (!$session_client->is_logged_in()) {
    redirect_to("../login-register");
}
$client_operation = new clientOperation();
$user_detail = $client_operation->view_participant_info($user_code);
extract($user_detail);	
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<style type="text/css">
.web{
	font-family:tahoma;
	size:10px;
	top:10%;
	border:1px solid #CDCDCD;
	border-radius:10px;
	padding:10px;
	width:45%;
	margin:auto;
	height:100%;
}
h1{
	margin:3px 0;
	font-size:13px;
	text-decoration:underline;
}
.tLink{
	font-family:tahoma;
	size:10px;
	padding-left:10px;
	text-align:center;
}
.success{
	color:#009900;
}
.error{
	color:#FF0000;
}
.talign_right{
	text-align:right;
}
.username_availability_result{
	display:block;
	width:auto;
	float:left;
	padding-left:10px;
}
.input{
	float:left;
}
</style>
</head>
<body>

<div class='web'>
	<?php 
		$categoryList = categoryParentChildTree($Id); //use the user's ID
		foreach($categoryList as $key => $value){
			echo $value['username'].'<br>';
		}
		//print_r($categoryList);
	?>
</div>
</body>
</html>
