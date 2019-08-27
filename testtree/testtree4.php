<?php
    define('_HOST_NAME', 'localhost');
	define('_DATABASE_USER_NAME', 'root');
	define('_DATABASE_PASSWORD', '');
	define('_DATABASE_NAME', 'lifehelpclub');
 
$connect = mysql_connect(_HOST_NAME, _DATABASE_USER_NAME, _DATABASE_PASSWORD);
mysql_select_db(_DATABASE_NAME);
function categoryChild($id) {
 $s = "SELECT * FROM affiliateuser WHERE parent_id='".$id."' ORDER BY Id";
 $r = mysql_query($s);
 $children = array();
   if(mysql_num_rows($r) > 0) {
   # It has children, let's get them.
	 while($row = mysql_fetch_array($r)) {
	 # Add the child to the list of children, and get its subchildren
     	$children[$row['Id']] = categoryChild($row['Id']);
  echo $row['username'].'<br>';
  
	 }
   }
 return $children;
 }
 
 // print_r(categoryChild(5));
$categoryChild = categoryChild(5);
 foreach($categoryChild as $key => $value){
			echo $value['username'].'<br>';
		}
 ?>