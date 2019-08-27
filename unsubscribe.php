<?php
ob_start();
if(isset($_POST['unsubscribe'])){
	$email=$_POST['email'];
	if (!empty ($email)) {
		$to="robpete1958@gmail.com";
		$subject= 'newsletter unsubscribe';
		//$body=$name; 
		$header='From:'.$email; 
		if (mail($to, $subject,"New subscription from $email.",$header)) {
			header('location:http://advocaat-law.com.ng/unsubscribe.php'); 
			$message_error =  "Unsubscription successful";
		}else{
			$message_error =  'you are yet to unsubscribe ';
		}
	}else{
		$message_error = "Enter subscription email";
	}
}
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
</head>

<body>
	<?php echo $message_error;?>
	<form action="" method="post">
		<input type="text" name="email">
		<input name="unsubscribe" type ="submit" value ="Unsubscribe">
	</form>
</body>
</html>