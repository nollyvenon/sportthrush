<?php
require_once("../z_db.php");
    define('_HOST_NAME', 'localhost');
	define('_DATABASE_USER_NAME', 'root');
	define('_DATABASE_PASSWORD', '');
	define('_DATABASE_NAME', 'lifehelpclub');
 
	 function do_spillover($sponsor_id) {
 $con=mysqli_connect("localhost",_DATABASE_USER_NAME,_DATABASE_PASSWORD,_DATABASE_NAME);
	   $s = "SELECT * FROM affiliateuser WHERE referedby='".$sponsor_id."' AND level != '0' ORDER BY Id ASC";
	   $r = mysqli_query($con,$s);
	   $row55 = mysqli_fetch_assoc($r);
	   $dline = $row55["dline"];
	   $children = array();
		   if($dline > 4) {		 # It has children, let's get them.
			   while($row = mysqli_fetch_array($r)) {
				  $children[$row['Id']] = do_spillover($row['username']);		   # Add the child to the list of children, and get its subchildren
				  $dline = $row["dline"];
				  if ($dline < 5){
					  $sponsor_id = $row['username'];
						break ;goto end; 
			//echo $row['username'].'<br>';
				  }
			   }
		   }
		   end:
	   return $sponsor_id;
	 }
	 
	//echo do_spillover("nollyvenon");
	
	
	 ?>