<?php
class uplineOperation {
    private $client_data;
    
    public function __construct($ifx_account = '', $email_address = '') {
        if(isset($ifx_account) && !empty($ifx_account)) {
            $this->client_data = $this->set_client_data($ifx_account);
        }
    }
	
    public function processupline($query, $level, $user_code, $country='') {
		echo $query;
        global $db_handle;
   		$client_operation = new clientOperation();
		$result = $db_handle->runQuery($query);		
		if($db_handle->numRows($query) > 0) {
            $fetched_data = $db_handle->fetchAssoc($result);
            $upline = $fetched_data[0]['referedby'];
        }
		
			$user_details = $client_operation->view_participant_info($upline);
			echo $COMMISSION = $client_operation->level_info($level)['commission'];
			$upline_user_code =  $user_details['user_code'];
			$new_account_balance = $user_details['account_balance'] + $COMMISSION;	
			$query2 = "UPDATE affiliateuser SET account_balance='$new_account_balance' WHERE username='".$upline."'"; 
			$db_handle->runQuery($query2);
		
		$query = "SELECT * FROM uplines where user_code='$user_code'";
		$levelcolumn = "level".$level."_referral";

		$result = $db_handle->runQuery($query);		
		if($db_handle->numRows($query) > 0) {
			$query = "UPDATE uplines SET $levelcolumn = '$upline_user_code' WHERE user_code = '$user_code' LIMIT 1";
        	$db_handle->runQuery($query);
        } else {		
			
        	$query = "INSERT INTO uplines (user_code, level1_referral) VALUES ('$user_code', '$upline_user_code')";
			$db_handle->runQuery($query);
		}
		$upline = "";
	}
	
	public function pay_level_upline($username, $user_code){
		global $db_handle;
		$client_operation = new clientOperation();
		$upline_operation = new uplineOperation();

			$upline_operation->processupline($upline_operation->level1upline($username),'1',$user_code);
			$upline_operation->processupline($upline_operation->level2upline($username),'2',$user_code);
			$upline_operation->processupline($upline_operation->level3upline($username),'3',$user_code);
			$upline_operation->processupline($upline_operation->level4upline($username),'4',$user_code);
			$upline_operation->processupline($upline_operation->level5upline($username),'5',$user_code);
			$upline_operation->processupline($upline_operation->level6upline($username),'6',$user_code);
			$upline_operation->processupline($upline_operation->level7upline($username),'7',$user_code);
			$upline_operation->processupline($upline_operation->level8upline($username),'8',$user_code);
			$upline_operation->processupline($upline_operation->level9upline($username),'9',$user_code);

		//check for participants that have no referrer in the system and assign them one

	}
	
	public function level1upline($username) {

		$query="SELECT * FROM affiliateuser where username = '$username'"; 
	  //$result = mysqli_query($db_handle,$query);
		
	  	return $query ? $query : 0;
	}

    public function level2upline($username) {
      global $db_handle;
	  $totalrefear=0;
	  $query="SELECT * FROM affiliateuser where username = '$username'"; 
	  $result = $db_handle->runQuery($query);
	  
		while($row = mysqli_fetch_array($result)){
		 $countusername=$row["referedby"];
		 $query22="SELECT * FROM  affiliateuser where username = '$countusername'"; 
		 //$result22 = mysqli_query($db_handle,$query22);
		}		
		return $query22 ? $query22 : 0;
	}

    public function level3upline($username) {
        global $db_handle;
  		$client_operation = new clientOperation();
		$query="SELECT * FROM affiliateuser where username = '$username'"; 
	  	$result = $db_handle->runQuery($query);
		 //$ac="$row[active]";
		 $countusername=$row["referedby"];
		while($row = mysqli_fetch_array($result)){
		 //$ac="$row[active]";
		 $countusername=$row["referedby"];
		   $query22="SELECT * FROM affiliateuser where username = '$countusername'"; 
		   $result22 = $db_handle->runQuery($query22);
		   
			  while($row22 = mysqli_fetch_array($result22)){
		 		//$ac="$row22[active]";
				 $countusername2=$row22["referedby"];
				 $query33="SELECT * FROM  affiliateuser where username = '$countusername2'"; 
			  
			   }
		   }
	  return $query33 ? $query33 : 0;
	}
	
 public function level4upline($username) {
        global $db_handle;
  		$client_operation = new clientOperation();
	$query="SELECT * FROM affiliateuser where username = '$username'"; 
	 $result = $db_handle->runQuery($query);

	  while($row = mysqli_fetch_array($result))
	  {
		 //$ac="$row[active]";
		 $countusername=$row["referedby"];
	   $query22="SELECT * FROM affiliateuser where username = '$countusername'"; 
	   $result22 = $db_handle->runQuery($query22);
	   
		  while($row22 = mysqli_fetch_array($result22)){
		 //$ac="$row22[active]";
		 $countusername2=$row22["referedby"];
		   $query33="SELECT * FROM affiliateuser where username = '$countusername2'"; 
		   $result33 = $db_handle->runQuery($query33);
			   while($row33 = mysqli_fetch_array($result33)){
		// $ac="$row33[active]";
		 $countusername3=$row33["referedby"];
				   $query44="SELECT * FROM affiliateuser where username = '$countusername3'"; 
			  
			   }
		   }
	   }
		return $query44 ? $query44 : 0;
	}
		
		
	public function level5upline($username) {
        global $db_handle;
  		$client_operation = new clientOperation();
	$query="SELECT * FROM affiliateuser where username = '$username'"; 
  	$result = $db_handle->runQuery($query);

	  while($row = mysqli_fetch_array($result)){
		 //$ac="$row[active]";
		 $countusername=$row["referedby"];
	   $query22="SELECT * FROM affiliateuser where username = '$countusername'"; 
	   $result22 = $db_handle->runQuery($query22);
	   
		  while($row22 = mysqli_fetch_array($result22)){
		 $countusername2=$row22["referedby"];
		   $query33="SELECT * FROM affiliateuser where username = '$countusername2'"; 
		   $result33 = $db_handle->runQuery($query33);
			   while($row33 = mysqli_fetch_array($result33)){
		 $countusername3=$row33["referedby"];
			   $query44="SELECT * FROM affiliateuser where username = '$countusername3'"; 
			   $result44 = $db_handle->runQuery($query44);
				   while($row44 = mysqli_fetch_array($result44)){
		 $countusername4=$row44["referedby"];
				   $query55="SELECT * FROM  affiliateuser where username = '$countusername4'"; 
				  // $result55 = mysqli_query($con,$query55);
				  
				  }
			   }
		   }
	   }
		return $query55 ? $query55 : 0;
	}
	
	public function level6upline($username) {
        global $db_handle;
  		$client_operation = new clientOperation();
	$query="SELECT * FROM affiliateuser where username = '$username'"; 
	 $result = $db_handle->runQuery($query);
	
	  while($row = mysqli_fetch_array($result)){
		 //$ac="$row[active]";
		 $countusername=$row["referedby"];
	   $query22="SELECT * FROM affiliateuser where username = '$countusername'"; 
	   $result22 = $db_handle->runQuery($query22);
	   
			while($row22 = mysqli_fetch_array($result22)){
		 //$ac="$row[active]";
		 $countusername2=$row22["referedby"];
			 $query33="SELECT * FROM affiliateuser where username = '$countusername2'"; 
			 $result33 = $db_handle->runQuery($query33);
				 while($row33 = mysqli_fetch_array($result33)){
		 //$ac="$row[active]";
		 $countusername3=$row33["referedby"];
				 $query44="SELECT * FROM affiliateuser where username = '$countusername3'"; 
				 $result44 = $db_handle->runQuery($query44);
					 while($row44 = mysqli_fetch_array($result44)){
		 //$ac="$row[active]";
		 $countusername4=$row44["referedby"];
					 $query55="SELECT * FROM affiliateuser where username = '$countusername4'"; 
					 $result55 = $db_handle->runQuery($query55);
						 while($row55 = mysqli_fetch_array($result55)){
		 //$ac="$row[active]";
		 $countusername5=$row55["referedby"];
						$query66="SELECT * FROM  affiliateuser where username = '$countusername5'"; 
						// $result66 = mysqli_query($con,$query66);
						 }
					}
				 }
			 }
		   }
		return $result66 ? $result66 : 0;
	}
	
	public function level7upline($username) {
	        global $db_handle;
  		$client_operation = new clientOperation();
	  $query="SELECT * FROM affiliateuser where username = '$username'"; 
	   $result = $db_handle->runQuery($query);
	  
	  while($row = mysqli_fetch_array($result)) {
		 $countusername=$row["referedby"];
	   $query22="SELECT * FROM affiliateuser where username = '$countusername'"; 
	   $result22 = $db_handle->runQuery($query22);
	   
	  while($row22 = mysqli_fetch_array($result22))
	  {
		 $countusername2=$row22["referedby"];
	   $query33="SELECT * FROM affiliateuser where username = '$countusername2'"; 
	   $result33 = $db_handle->runQuery($query33);
	   while($row33 = mysqli_fetch_array($result33))
	  {
		 $countusername3=$row33["referedby"];
	   $query44="SELECT * FROM affiliateuser where username = '$countusername3'"; 
	   $result44 = $db_handle->runQuery($query44);
	   while($row44 = mysqli_fetch_array($result44))
	  {
		 $countusername4=$row44["referedby"];
	   $query55="SELECT * FROM affiliateuser where username = '$countusername4'"; 
	   $result55 = $db_handle->runQuery($query55);
	   while($row55 = mysqli_fetch_array($result55))
	  {
		 $countusername5=$row55["referedby"];
	  $query66="SELECT * FROM  affiliateuser where username = '$countusername5'"; 
	   $result66 = $db_handle->runQuery($query66);
	   while($row66 = mysqli_fetch_array($result66))
	  {
	  
		 $countusername6=$row66["referedby"];
	  //$ac6="$row66[active]";
	   $query77="SELECT * FROM  affiliateuser where username = '$countusername6'"; 
		}
		}
	  }
	   }
	   }
	   }
		return $query77 ? $query77 : 0;
	}
		
		
public function level8upline($username) {
        global $db_handle;
  		$client_operation = new clientOperation();
	  $query="SELECT * FROM  affiliateuser where username = '$username'"; 
	   $result = mysqli_query($con,$query);
	  
	  while($row = mysqli_fetch_array($result))
	  {
	   //$ac="$row[active]";
	   $countusername="$row[referedby]";
	   $query22="SELECT * FROM  affiliateuser where username = '$countusername'"; 
	   $result22 = mysqli_query($con,$query22);
	   
	  while($row22 = mysqli_fetch_array($result22))
	  {
	  // $ac2="$row22[active]";
	   $countusername2="$row22[referedby]";
	  // $fname22="$row22[fname]";
	   
	   $query33="SELECT * FROM  affiliateuser where username = '$countusername2'"; 
	   $result33 = mysqli_query($con,$query33);
	   while($row33 = mysqli_fetch_array($result33))
	  {
	  //$ac3="$row33[active]";
	   $countusername3="$row33[referedby]";
	   
	   $query44="SELECT * FROM  affiliateuser where username = '$countusername3'"; 
	   $result44 = mysqli_query($con,$query44);
	   while($row44 = mysqli_fetch_array($result44))
	  {
	   //$ac4="$row44[active]";
	   $countusername4="$row44[referedby]";
	   $query55="SELECT * FROM  affiliateuser where username = '$countusername4'"; 
	   $result55 = mysqli_query($con,$query55);
		 while($row55 = mysqli_fetch_array($result55)){
		//	$ac5="$row55[active]";
			 $countusername5="$row55[referedby]";
			$query66="SELECT * FROM  affiliateuser where username = '$countusername5'"; 
			 $result66 = mysqli_query($con,$query66);
			 while($row66 = mysqli_fetch_array($result66)){
			
			//	$ac6="$row66[active]";
				 $countusername6="$row66[referedby]";
				 $query77="SELECT * FROM  affiliateuser where username = '$countusername6'"; 
				 $result77 = mysqli_query($con,$query77);
				 while($row77 = mysqli_fetch_array($result77)){
						$countusername7="$row77[referedby]";
					$query88="SELECT * FROM  affiliateuser where username = '$countusername7'";  
				}
			  }
		  }
	  }
	   }
	   }
	   }
		return $query88; 
	}
	
	public function level9upline($username) {
        global $db_handle;
	  $query="SELECT * FROM  affiliateuser where username = '$username'"; 
	   
	   
	   $result = mysqli_query($con,$query);
	  
	  while($row = mysqli_fetch_array($result))
	  {
	   //$ac="$row[active]";
	   $countusername="$row[referedby]";
	   $query22="SELECT * FROM  affiliateuser where username = '$countusername'"; 
	   $result22 = mysqli_query($con,$query22);
	   
	  while($row22 = mysqli_fetch_array($result22))
	  {
	//   $ac2="$row22[active]";
	   $countusername2="$row22[referedby]";
	  // $fname22="$row22[fname]";
	   
	   $query33="SELECT * FROM  affiliateuser where username = '$countusername2'"; 
	   $result33 = mysqli_query($con,$query33);
	   while($row33 = mysqli_fetch_array($result33))
	  {
	  //$ac3="$row33[active]";
	   $countusername3="$row33[referedby]";
	   
	   $query44="SELECT * FROM  affiliateuser where username = '$countusername3'"; 
	   $result44 = mysqli_query($con,$query44);
	   while($row44 = mysqli_fetch_array($result44))
	  {
	   //$ac4="$row44[active]";
	   $countusername4="$row44[referedby]";
	   $query55="SELECT * FROM  affiliateuser where username = '$countusername4'"; 
	   $result55 = mysqli_query($con,$query55);
		 while($row55 = mysqli_fetch_array($result55)){
		//	$ac5="$row55[active]";
			 $countusername5="$row55[referedby]";
			$query66="SELECT * FROM  affiliateuser where username = '$countusername5'"; 
			 $result66 = mysqli_query($con,$query66);
			 while($row66 = mysqli_fetch_array($result66)){
			
			//	$ac6="$row66[active]";
				 $countusername6="$row66[referedby]";
				 $query77="SELECT * FROM  affiliateuser where username = '$countusername6'"; 
				 $result77 = mysqli_query($con,$query77);
				 while($row77 = mysqli_fetch_array($result77)){
						$countusername7="$row77[referedby]";
					$query88="SELECT * FROM  affiliateuser where username = '$countusername7'"; 
				 $result88 = mysqli_query($con,$query88);
				   while($row88 = mysqli_fetch_array($result88)){
					  
				   $countusername8="$row88[referedby]";
					 $query99="SELECT * FROM  affiliateuser where username = '$countusername8'"; 
				  } 
				}
			  }
		  }
	  }
	   }
	   }
	   }
 		return $query99;
	}
	
	public function level10upline($username) {	
        global $db_handle;
$query="SELECT * FROM  affiliateuser where username = '$username'"; 
 
 
 $result = mysqli_query($con,$query);

while($row = mysqli_fetch_array($result))
{
 //$ac="$row[active]";
 $countusername="$row[referedby]";
 $query22="SELECT * FROM  affiliateuser where username = '$countusername'"; 
 $result22 = mysqli_query($con,$query22);
 
while($row22 = mysqli_fetch_array($result22))
{
// $ac2="$row22[active]";
 $countusername2="$row22[referedby]"; 
 $query33="SELECT * FROM  affiliateuser where username = '$countusername2'"; 
 $result33 = mysqli_query($con,$query33);
 while($row33 = mysqli_fetch_array($result33))
{
//$ac3="$row33[active]";
 $countusername3="$row33[referedby]";
 
 $query44="SELECT * FROM  affiliateuser where username = '$countusername3'"; 
 $result44 = mysqli_query($con,$query44);
 while($row44 = mysqli_fetch_array($result44))
{
 //$ac4="$row44[active]";
 $countusername4="$row44[referedby]";
 $query55="SELECT * FROM  affiliateuser where username = '$countusername4'"; 
 $result55 = mysqli_query($con,$query55);
 while($row55 = mysqli_fetch_array($result55))
{
//$ac5="$row55[active]";
 $countusername5="$row55[referedby]";
$query66="SELECT * FROM  affiliateuser where username = '$countusername5'"; 
 $result66 = mysqli_query($con,$query66);
 while($row66 = mysqli_fetch_array($result66))
{

//$ac6="$row66[active]";
 $countusername6="$row66[referedby]";
 $query77="SELECT * FROM  affiliateuser where username = '$countusername6'"; 
 $result77 = mysqli_query($con,$query77);
 while($row77 = mysqli_fetch_array($result77))
{
		$countusername7="$row77[referedby]";
	$query88="SELECT * FROM  affiliateuser where username = '$countusername7'"; 
 $result88 = mysqli_query($con,$query88);
 while($row88 = mysqli_fetch_array($result88))
{
	
 $countusername8="$row88[referedby]";
 $query99="SELECT * FROM  affiliateuser where username = '$countusername8'"; 
 $result99 = mysqli_query($con,$query99);
 while($row99 = mysqli_fetch_array($result99))
{
	
 $countusername9="$row99[referedby]";
 $query10="SELECT * FROM  affiliateuser where username = '$countusername9'"; 

} 
}
}
  }
  }
}
 }
 }
 }
		return $query10;
	}

}//end class

