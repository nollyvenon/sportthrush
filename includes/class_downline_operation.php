<?php
class downlineOperation {
    private $client_data;
    
    public function __construct($ifx_account = '', $email_address = '') {
        if(isset($ifx_account) && !empty($ifx_account)) {
            $this->client_data = $this->set_client_data($ifx_account);
        }
    }
	
    public function level1downline($username) {
	  $totalrefear=0;
	  $query="SELECT * FROM affiliateuser where referedby = '$username'"; 
	  //$result = mysqli_query($db_handle,$query);
	  return $query ? $query : 0;
	}

    public function level2downline($username) {
        global $db_handle;
	  $totalrefear=0;
	  $query="SELECT * FROM affiliateuser where referedby = '$username'"; 
	  $result = $db_handle->runQuery($query);
	  
		while($row = mysqli_fetch_array($result)){
		 $ac="$row[active]";
		 $countusername=$row["username"];
		 $query22="SELECT * FROM  affiliateuser where referedby = '$countusername'"; 
		 //$result22 = mysqli_query($db_handle,$query22);
		}
		$numrows = $db_handle->numRows($query22);
		
		return $query22 ? $query22 : 0;
	}

    public function level3downline($username) {
        global $db_handle;
		$query="SELECT * FROM affiliateuser where referedby = '$username'"; 
	  	$result = $db_handle->runQuery($query);
		while($row = mysqli_fetch_array($result)){
		 $countusername=$row["username"];
		   $query22="SELECT * FROM affiliateuser where referedby = '$countusername'"; 
		   $result = $db_handle->runQuery($query22);
		   
			  while($row22 = mysqli_fetch_array($result22)){
		 		   $countusername2=$row22["username"];
				   $query33="SELECT * FROM  affiliateuser where referedby = '$countusername2'"; 
			  
			   }
		   }
	  return $query33 ? $query33 : 0;
	}
	
 public function level4downline($username) {
        global $db_handle;
	$query="SELECT * FROM affiliateuser where referedby = '$username'"; 
	 $result = $db_handle->runQuery($query);

	  while($row = mysqli_fetch_array($result))
	  {
		 $countusername=$row["username"];
	   $query22="SELECT * FROM affiliateuser where referedby = '$countusername'"; 
	   $result22 = $db_handle->runQuery($query22);
	   
		  while($row22 = mysqli_fetch_array($result22)){
		 	$countusername2=$row22["username"];
		   $query33="SELECT * FROM affiliateuser where referedby = '$countusername2'"; 
		   $result33 = $db_handle->runQuery($query33);
			   while($row33 = mysqli_fetch_array($result33)){
		 			$countusername3=$row33["username"];
				   $query44="SELECT * FROM affiliateuser where referedby = '$countusername3'"; 
			  
			   }
		   }
	   }
		return $query44 ? $query44 : 0;
	}
		
		
	public function level5downline($username) {
        global $db_handle;
	$query="SELECT * FROM affiliateuser where referedby = '$username'"; 
  	$result = $db_handle->runQuery($query);

	  while($row = mysqli_fetch_array($result)){
		 $countusername=$row["username"];
	   $query22="SELECT * FROM affiliateuser where referedby = '$countusername'"; 
	   $result22 = $db_handle->runQuery($query22);
	   
		  while($row22 = mysqli_fetch_array($result22)){
		 $countusername2=$row22["username"];
		   $query33="SELECT * FROM affiliateuser where referedby = '$countusername2'"; 
		   $result33 = $db_handle->runQuery($query33);
			   while($row33 = mysqli_fetch_array($result33)){
		 		$countusername3=$row33["username"];
			   $query44="SELECT * FROM affiliateuser where referedby = '$countusername3'"; 
			   $result44 = $db_handle->runQuery($query44);
				   while($row44 = mysqli_fetch_array($result44)){
				   $countusername4=$row44["username"];
				   $query55="SELECT * FROM  affiliateuser where referedby = '$countusername4'"; 
				  // $result55 = mysqli_query($con,$query55);
				  
				  }
			   }
		   }
	   }
		return $query55 ? $query55 : 0;
	}
	
	public function level6downline($username) {
        global $db_handle;
	$query="SELECT * FROM affiliateuser where referedby = '$username'"; 
	 $result = $db_handle->runQuery($query);
	
	  while($row = mysqli_fetch_array($result)){
		 $countusername=$row["username"];
	   $query22="SELECT * FROM affiliateuser where referedby = '$countusername'"; 
	   $result22 = $db_handle->runQuery($query22);
	   
			while($row22 = mysqli_fetch_array($result22)){
			 $countusername2=$row22["username"];
		 $query33="SELECT * FROM affiliateuser where referedby = '$countusername2'"; 
			 $result33 = $db_handle->runQuery($query33);
				 while($row33 = mysqli_fetch_array($result33)){
				 $countusername3=$row33["username"];
				 $query44="SELECT * FROM affiliateuser where referedby = '$countusername3'"; 
				 $result44 = $db_handle->runQuery($query44);
					 while($row44 = mysqli_fetch_array($result44)){
					 $countusername4=$row44["username"];
					 $query55="SELECT * FROM affiliateuser where referedby = '$countusername4'"; 
					 $result55 = $db_handle->runQuery($query55);
						 while($row55 = mysqli_fetch_array($result55)){
						$countusername5=$row55["username"];
						$query66="SELECT * FROM  affiliateuser where referedby = '$countusername5'"; 
						// $result66 = mysqli_query($con,$query66);
						 }
					}
				 }
			 }
		   }
		return $result66 ? $result66 : 0;
	}
	
	public function level7downline($username) {
	        global $db_handle;
	  $query="SELECT * FROM affiliateuser where referedby = '$username'"; 
	   $result = $db_handle->runQuery($query);
	  
	  while($row = mysqli_fetch_array($result)) {
	   	$countusername=$row["username"];
		$query22="SELECT * FROM affiliateuser where referedby = '$countusername'"; 
	   $result22 = $db_handle->runQuery($query22);
	   
	  while($row22 = mysqli_fetch_array($result22))
	  {
	    $countusername2=$row22["username"];
		$query33="SELECT * FROM affiliateuser where referedby = '$countusername2'"; 
	   $result33 = $db_handle->runQuery($query33);
	   while($row33 = mysqli_fetch_array($result33))
	  {
		  		 $countusername3=$row33["username"];
	   $query44="SELECT * FROM affiliateuser where referedby = '$countusername3'"; 
	   $result44 = $db_handle->runQuery($query44);
	   while($row44 = mysqli_fetch_array($result44))
	  {
		 $countusername4=$row44["username"];
	   $query55="SELECT * FROM affiliateuser where referedby = '$countusername4'"; 
	   $result55 = $db_handle->runQuery($query55);
	   while($row55 = mysqli_fetch_array($result55))
	  {
		 $countusername55=$row55["username"];		  
	  $query66="SELECT * FROM  affiliateuser where referedby = '$countusername5'"; 
	   $result66 = $db_handle->runQuery($query66);
	   while($row66 = mysqli_fetch_array($result66))
	  {
	  $countusername6=$row66["username"];
	  $ac6="$row66[active]";
	   $query77="SELECT * FROM  affiliateuser where referedby = '$countusername6'"; 
		}
		}
	  }
	   }
	   }
	   }
		return $query77 ? $query77 : 0;
	}
		
		
public function level8downline($username) {
        global $db_handle;
	  $query="SELECT * FROM  affiliateuser where referedby = '$username'"; 
	   
	   
	   $result = mysqli_query($con,$query);
	  
	  while($row = mysqli_fetch_array($result))
	  {
	   $ac="$row[active]";
	   $countusername="$row[username]";
	   $query22="SELECT * FROM  affiliateuser where referedby = '$countusername'"; 
	   $result22 = mysqli_query($con,$query22);
	   
	  while($row22 = mysqli_fetch_array($result22))
	  {
	   $ac2="$row22[active]";
	   $countusername2="$row22[username]";
	   $fname22="$row22[fname]";
	   
	   $query33="SELECT * FROM  affiliateuser where referedby = '$countusername2'"; 
	   $result33 = mysqli_query($con,$query33);
	   while($row33 = mysqli_fetch_array($result33))
	  {
	  $ac3="$row33[active]";
	   $countusername3="$row33[username]";
	   
	   $query44="SELECT * FROM  affiliateuser where referedby = '$countusername3'"; 
	   $result44 = mysqli_query($con,$query44);
	   while($row44 = mysqli_fetch_array($result44))
	  {
	   $ac4="$row44[active]";
	   $countusername4="$row44[username]";
	   $query55="SELECT * FROM  affiliateuser where referedby = '$countusername4'"; 
	   $result55 = mysqli_query($con,$query55);
		 while($row55 = mysqli_fetch_array($result55)){
			$ac5="$row55[active]";
			 $countusername5="$row55[username]";
			$query66="SELECT * FROM  affiliateuser where referedby = '$countusername5'"; 
			 $result66 = mysqli_query($con,$query66);
			 while($row66 = mysqli_fetch_array($result66)){
			
				$ac6="$row66[active]";
				 $countusername6="$row66[username]";
				 $query77="SELECT * FROM  affiliateuser where referedby = '$countusername6'"; 
				 $result77 = mysqli_query($con,$query77);
				 while($row77 = mysqli_fetch_array($result77)){
						$countusername7="$row77[username]";
					$query88="SELECT * FROM  affiliateuser where referedby = '$countusername7'";  
				}
			  }
		  }
	  }
	   }
	   }
	   }
		return $query88; 
	}
	
	public function level9downline($username) {
        global $db_handle;
	  $query="SELECT * FROM  affiliateuser where referedby = '$username'"; 
	   
	   
	   $result = mysqli_query($con,$query);
	  
	  while($row = mysqli_fetch_array($result))
	  {
	   $ac="$row[active]";
	   $countusername="$row[username]";
	   $query22="SELECT * FROM  affiliateuser where referedby = '$countusername'"; 
	   $result22 = mysqli_query($con,$query22);
	   
	  while($row22 = mysqli_fetch_array($result22))
	  {
	   $ac2="$row22[active]";
	   $countusername2="$row22[username]";
	   $fname22="$row22[fname]";
	   
	   $query33="SELECT * FROM  affiliateuser where referedby = '$countusername2'"; 
	   $result33 = mysqli_query($con,$query33);
	   while($row33 = mysqli_fetch_array($result33))
	  {
	  $ac3="$row33[active]";
	   $countusername3="$row33[username]";
	   
	   $query44="SELECT * FROM  affiliateuser where referedby = '$countusername3'"; 
	   $result44 = mysqli_query($con,$query44);
	   while($row44 = mysqli_fetch_array($result44))
	  {
	   $ac4="$row44[active]";
	   $countusername4="$row44[username]";
	   $query55="SELECT * FROM  affiliateuser where referedby = '$countusername4'"; 
	   $result55 = mysqli_query($con,$query55);
		 while($row55 = mysqli_fetch_array($result55)){
			$ac5="$row55[active]";
			 $countusername5="$row55[username]";
			$query66="SELECT * FROM  affiliateuser where referedby = '$countusername5'"; 
			 $result66 = mysqli_query($con,$query66);
			 while($row66 = mysqli_fetch_array($result66)){
			
				$ac6="$row66[active]";
				 $countusername6="$row66[username]";
				 $query77="SELECT * FROM  affiliateuser where referedby = '$countusername6'"; 
				 $result77 = mysqli_query($con,$query77);
				 while($row77 = mysqli_fetch_array($result77)){
						$countusername7="$row77[username]";
					$query88="SELECT * FROM  affiliateuser where referedby = '$countusername7'"; 
				 $result88 = mysqli_query($con,$query88);
				   while($row88 = mysqli_fetch_array($result88)){
					  
				   $countusername8="$row88[username]";
					 $query99="SELECT * FROM  affiliateuser where referedby = '$countusername8'"; 
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
	
	public function level10downline($username) {	
        global $db_handle;
$query="SELECT * FROM  affiliateuser where referedby = '$username'"; 
 
 
 $result = mysqli_query($con,$query);

while($row = mysqli_fetch_array($result))
{
 $ac="$row[active]";
 $countusername="$row[username]";
 $query22="SELECT * FROM  affiliateuser where referedby = '$countusername'"; 
 $result22 = mysqli_query($con,$query22);
 
while($row22 = mysqli_fetch_array($result22))
{
 $ac2="$row22[active]";
 $countusername2="$row22[username]";
 $fname22="$row22[fname]";
 
 $query33="SELECT * FROM  affiliateuser where referedby = '$countusername2'"; 
 $result33 = mysqli_query($con,$query33);
 while($row33 = mysqli_fetch_array($result33))
{
$ac3="$row33[active]";
 $countusername3="$row33[username]";
 
 $query44="SELECT * FROM  affiliateuser where referedby = '$countusername3'"; 
 $result44 = mysqli_query($con,$query44);
 while($row44 = mysqli_fetch_array($result44))
{
 $ac4="$row44[active]";
 $countusername4="$row44[username]";
 $query55="SELECT * FROM  affiliateuser where referedby = '$countusername4'"; 
 $result55 = mysqli_query($con,$query55);
 while($row55 = mysqli_fetch_array($result55))
{
$ac5="$row55[active]";
 $countusername5="$row55[username]";
$query66="SELECT * FROM  affiliateuser where referedby = '$countusername5'"; 
 $result66 = mysqli_query($con,$query66);
 while($row66 = mysqli_fetch_array($result66))
{

$ac6="$row66[active]";
 $countusername6="$row66[username]";
 $query77="SELECT * FROM  affiliateuser where referedby = '$countusername6'"; 
 $result77 = mysqli_query($con,$query77);
 while($row77 = mysqli_fetch_array($result77))
{
		$countusername7="$row77[username]";
	$query88="SELECT * FROM  affiliateuser where referedby = '$countusername7'"; 
 $result88 = mysqli_query($con,$query88);
 while($row88 = mysqli_fetch_array($result88))
{
	
 $countusername8="$row88[username]";
 $query99="SELECT * FROM  affiliateuser where referedby = '$countusername8'"; 
 $result99 = mysqli_query($con,$query99);
 while($row99 = mysqli_fetch_array($result99))
{
	
 $countusername9="$row99[username]";
 $query10="SELECT * FROM  affiliateuser where referedby = '$countusername9'"; 

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
		
public function level11downline($username) {	
        global $db_handle;
$query="SELECT * FROM  affiliateuser where referedby = '$username'"; 
 
 
 $result = mysqli_query($con,$query);

while($row = mysqli_fetch_array($result))
{
 $ac="$row[active]";
 $countusername="$row[username]";
 $query22="SELECT * FROM  affiliateuser where referedby = '$countusername'"; 
 $result22 = mysqli_query($con,$query22);
 
while($row22 = mysqli_fetch_array($result22))
{
 $ac2="$row22[active]";
 $countusername2="$row22[username]";
 $fname22="$row22[fname]";
 
 $query33="SELECT * FROM  affiliateuser where referedby = '$countusername2'"; 
 $result33 = mysqli_query($con,$query33);
 while($row33 = mysqli_fetch_array($result33))
{
$ac3="$row33[active]";
 $countusername3="$row33[username]";
 
 $query44="SELECT * FROM  affiliateuser where referedby = '$countusername3'"; 
 $result44 = mysqli_query($con,$query44);
 while($row44 = mysqli_fetch_array($result44))
{
 $ac4="$row44[active]";
 $countusername4="$row44[username]";
 $query55="SELECT * FROM  affiliateuser where referedby = '$countusername4'"; 
 $result55 = mysqli_query($con,$query55);
 while($row55 = mysqli_fetch_array($result55))
{
$ac5="$row55[active]";
 $countusername5="$row55[username]";
$query66="SELECT * FROM  affiliateuser where referedby = '$countusername5'"; 
 $result66 = mysqli_query($con,$query66);
 while($row66 = mysqli_fetch_array($result66))
{

$ac6="$row66[active]";
 $countusername6="$row66[username]";
 $query77="SELECT * FROM  affiliateuser where referedby = '$countusername6'"; 
 $result77 = mysqli_query($con,$query77);
 while($row77 = mysqli_fetch_array($result77))
{
		$countusername7="$row77[username]";
	$query88="SELECT * FROM  affiliateuser where referedby = '$countusername7'"; 
 $result88 = mysqli_query($con,$query88);
 while($row88 = mysqli_fetch_array($result88))
{
	
 $countusername8="$row88[username]";
 $query99="SELECT * FROM  affiliateuser where referedby = '$countusername8'"; 
 $result99 = mysqli_query($con,$query99);
 while($row99 = mysqli_fetch_array($result99))
{
	
 $countusername9="$row99[username]";
 $query10="SELECT * FROM  affiliateuser where referedby = '$countusername9'"; 
 $result110 = mysqli_query($con,$query10);
	 while($row110 = mysqli_fetch_array($result110)){
		
	 $countusername10="$row110[username]";
	 $query11="SELECT * FROM  affiliateuser where referedby = '$countusername10'"; 
	
	}
} 
}
}
  }
  }
}
 }
 }
 }
		return $query11;
	}	


public function level12downline($username) {	
        global $db_handle;
$query="SELECT * FROM  affiliateuser where referedby = '$username'"; 
 
 
 $result = mysqli_query($con,$query);

while($row = mysqli_fetch_array($result))
{
 $ac="$row[active]";
 $countusername="$row[username]";
 $query22="SELECT * FROM  affiliateuser where referedby = '$countusername'"; 
 $result22 = mysqli_query($con,$query22);
 
while($row22 = mysqli_fetch_array($result22))
{
 $ac2="$row22[active]";
 $countusername2="$row22[username]";
 $fname22="$row22[fname]";
 
 $query33="SELECT * FROM  affiliateuser where referedby = '$countusername2'"; 
 $result33 = mysqli_query($con,$query33);
 while($row33 = mysqli_fetch_array($result33))
{
$ac3="$row33[active]";
 $countusername3="$row33[username]";
 
 $query44="SELECT * FROM  affiliateuser where referedby = '$countusername3'"; 
 $result44 = mysqli_query($con,$query44);
 while($row44 = mysqli_fetch_array($result44))
{
 $ac4="$row44[active]";
 $countusername4="$row44[username]";
 $query55="SELECT * FROM  affiliateuser where referedby = '$countusername4'"; 
 $result55 = mysqli_query($con,$query55);
 while($row55 = mysqli_fetch_array($result55))
{
$ac5="$row55[active]";
 $countusername5="$row55[username]";
$query66="SELECT * FROM  affiliateuser where referedby = '$countusername5'"; 
 $result66 = mysqli_query($con,$query66);
 while($row66 = mysqli_fetch_array($result66))
{

$ac6="$row66[active]";
 $countusername6="$row66[username]";
 $query77="SELECT * FROM  affiliateuser where referedby = '$countusername6'"; 
 $result77 = mysqli_query($con,$query77);
 while($row77 = mysqli_fetch_array($result77))
{
		$countusername7="$row77[username]";
	$query88="SELECT * FROM  affiliateuser where referedby = '$countusername7'"; 
 $result88 = mysqli_query($con,$query88);
 while($row88 = mysqli_fetch_array($result88))
{
	
 $countusername8="$row88[username]";
 $query99="SELECT * FROM  affiliateuser where referedby = '$countusername8'"; 
 $result99 = mysqli_query($con,$query99);
 while($row99 = mysqli_fetch_array($result99))
{
	
 $countusername9="$row99[username]";
 $query10="SELECT * FROM  affiliateuser where referedby = '$countusername9'"; 
 $result110 = mysqli_query($con,$query10);
	 while($row110 = mysqli_fetch_array($result110)){
		
	 $countusername10="$row110[username]";
	 $query11="SELECT * FROM  affiliateuser where referedby = '$countusername10'"; 
	 $result111 = mysqli_query($con,$query11);
		 while($row111 = mysqli_fetch_array($result111)){
			
		 $countusername11="$row111[username]";
		 $query12="SELECT * FROM  affiliateuser where referedby = '$countusername11'"; 
		
		}
	}
} 
}
}
  }
  }
}
 }
 }
 }
		return $query12;
	}	

public function level13downline($username) {	
        global $db_handle;
$query="SELECT * FROM  affiliateuser where referedby = '$username'"; 
 
 
 $result = mysqli_query($con,$query);

while($row = mysqli_fetch_array($result))
{
 $ac="$row[active]";
 $countusername="$row[username]";
 $query22="SELECT * FROM  affiliateuser where referedby = '$countusername'"; 
 $result22 = mysqli_query($con,$query22);
 
while($row22 = mysqli_fetch_array($result22))
{
 $ac2="$row22[active]";
 $countusername2="$row22[username]";
 $fname22="$row22[fname]";
 
 $query33="SELECT * FROM  affiliateuser where referedby = '$countusername2'"; 
 $result33 = mysqli_query($con,$query33);
 while($row33 = mysqli_fetch_array($result33))
{
$ac3="$row33[active]";
 $countusername3="$row33[username]";
 
 $query44="SELECT * FROM  affiliateuser where referedby = '$countusername3'"; 
 $result44 = mysqli_query($con,$query44);
 while($row44 = mysqli_fetch_array($result44))
{
 $ac4="$row44[active]";
 $countusername4="$row44[username]";
 $query55="SELECT * FROM  affiliateuser where referedby = '$countusername4'"; 
 $result55 = mysqli_query($con,$query55);
 while($row55 = mysqli_fetch_array($result55))
{
$ac5="$row55[active]";
 $countusername5="$row55[username]";
$query66="SELECT * FROM  affiliateuser where referedby = '$countusername5'"; 
 $result66 = mysqli_query($con,$query66);
 while($row66 = mysqli_fetch_array($result66))
{

$ac6="$row66[active]";
 $countusername6="$row66[username]";
 $query77="SELECT * FROM  affiliateuser where referedby = '$countusername6'"; 
 $result77 = mysqli_query($con,$query77);
 while($row77 = mysqli_fetch_array($result77))
{
		$countusername7="$row77[username]";
	$query88="SELECT * FROM  affiliateuser where referedby = '$countusername7'"; 
 $result88 = mysqli_query($con,$query88);
 while($row88 = mysqli_fetch_array($result88))
{
	
 $countusername8="$row88[username]";
 $query99="SELECT * FROM  affiliateuser where referedby = '$countusername8'"; 
 $result99 = mysqli_query($con,$query99);
 while($row99 = mysqli_fetch_array($result99))
{
	
 $countusername9="$row99[username]";
 $query10="SELECT * FROM  affiliateuser where referedby = '$countusername9'"; 
 $result110 = mysqli_query($con,$query10);
	 while($row110 = mysqli_fetch_array($result110)){
		
	 $countusername10="$row110[username]";
	 $query11="SELECT * FROM  affiliateuser where referedby = '$countusername10'"; 
	 $result111 = mysqli_query($con,$query11);
		 while($row111 = mysqli_fetch_array($result111)){
			
		 $countusername11="$row111[username]";
		 $query12="SELECT * FROM  affiliateuser where referedby = '$countusername11'"; 
			 $result112 = mysqli_query($con,$query12);
			 while($row112 = mysqli_fetch_array($result112)){
				
			 $countusername12="$row112[username]";
			 $query13="SELECT * FROM  affiliateuser where referedby = '$countusername12'"; 
			
			}
		}
	}
} 
}
}
  }
  }
}
 }
 }
 }
		return $query13;
	}	
	
	public function level14downline($username) {	
        global $db_handle;
$query="SELECT * FROM  affiliateuser where referedby = '$username'"; 
 
 
 $result = mysqli_query($con,$query);

while($row = mysqli_fetch_array($result))
{
 $ac="$row[active]";
 $countusername="$row[username]";
 $query22="SELECT * FROM  affiliateuser where referedby = '$countusername'"; 
 $result22 = mysqli_query($con,$query22);
 
while($row22 = mysqli_fetch_array($result22))
{
 $ac2="$row22[active]";
 $countusername2="$row22[username]";
 $fname22="$row22[fname]";
 
 $query33="SELECT * FROM  affiliateuser where referedby = '$countusername2'"; 
 $result33 = mysqli_query($con,$query33);
 while($row33 = mysqli_fetch_array($result33))
{
$ac3="$row33[active]";
 $countusername3="$row33[username]";
 
 $query44="SELECT * FROM  affiliateuser where referedby = '$countusername3'"; 
 $result44 = mysqli_query($con,$query44);
 while($row44 = mysqli_fetch_array($result44))
{
 $ac4="$row44[active]";
 $countusername4="$row44[username]";
 $query55="SELECT * FROM  affiliateuser where referedby = '$countusername4'"; 
 $result55 = mysqli_query($con,$query55);
 while($row55 = mysqli_fetch_array($result55))
{
$ac5="$row55[active]";
 $countusername5="$row55[username]";
$query66="SELECT * FROM  affiliateuser where referedby = '$countusername5'"; 
 $result66 = mysqli_query($con,$query66);
 while($row66 = mysqli_fetch_array($result66))
{

$ac6="$row66[active]";
 $countusername6="$row66[username]";
 $query77="SELECT * FROM  affiliateuser where referedby = '$countusername6'"; 
 $result77 = mysqli_query($con,$query77);
 while($row77 = mysqli_fetch_array($result77))
{
		$countusername7="$row77[username]";
	$query88="SELECT * FROM  affiliateuser where referedby = '$countusername7'"; 
 $result88 = mysqli_query($con,$query88);
 while($row88 = mysqli_fetch_array($result88))
{
	
 $countusername8="$row88[username]";
 $query99="SELECT * FROM  affiliateuser where referedby = '$countusername8'"; 
 $result99 = mysqli_query($con,$query99);
 while($row99 = mysqli_fetch_array($result99))
{
	
 $countusername9="$row99[username]";
 $query10="SELECT * FROM  affiliateuser where referedby = '$countusername9'"; 
 $result110 = mysqli_query($con,$query10);
	 while($row110 = mysqli_fetch_array($result110)){
		
	 $countusername10="$row110[username]";
	 $query11="SELECT * FROM  affiliateuser where referedby = '$countusername10'"; 
	 $result111 = mysqli_query($con,$query11);
		 while($row111 = mysqli_fetch_array($result111)){
			
		 $countusername11="$row111[username]";
		 $query12="SELECT * FROM  affiliateuser where referedby = '$countusername11'"; 
			 $result112 = mysqli_query($con,$query12);
			 while($row112 = mysqli_fetch_array($result112)){
				
			 $countusername12="$row112[username]";
			 $query13="SELECT * FROM  affiliateuser where referedby = '$countusername12'"; 
				 $result113 = mysqli_query($con,$query13);
			 while($row113 = mysqli_fetch_array($result113)){
				
			 $countusername13="$row113[username]";
			 $query14="SELECT * FROM  affiliateuser where referedby = '$countusername13'"; 
			
			}		
			}
		}
	}
} 
}
}
  }
  }
}
 }
 }
 }
		return $query14;
	}
	
	
		public function level15downline($username) {	
        global $db_handle;
$query="SELECT * FROM  affiliateuser where referedby = '$username'"; 
 
 
 $result = mysqli_query($con,$query);

while($row = mysqli_fetch_array($result))
{
 $ac="$row[active]";
 $countusername="$row[username]";
 $query22="SELECT * FROM  affiliateuser where referedby = '$countusername'"; 
 $result22 = mysqli_query($con,$query22);
 
while($row22 = mysqli_fetch_array($result22))
{
 $ac2="$row22[active]";
 $countusername2="$row22[username]";
 $fname22="$row22[fname]";
 
 $query33="SELECT * FROM  affiliateuser where referedby = '$countusername2'"; 
 $result33 = mysqli_query($con,$query33);
 while($row33 = mysqli_fetch_array($result33))
{
$ac3="$row33[active]";
 $countusername3="$row33[username]";
 
 $query44="SELECT * FROM  affiliateuser where referedby = '$countusername3'"; 
 $result44 = mysqli_query($con,$query44);
 while($row44 = mysqli_fetch_array($result44))
{
 $ac4="$row44[active]";
 $countusername4="$row44[username]";
 $query55="SELECT * FROM  affiliateuser where referedby = '$countusername4'"; 
 $result55 = mysqli_query($con,$query55);
 while($row55 = mysqli_fetch_array($result55))
{
$ac5="$row55[active]";
 $countusername5="$row55[username]";
$query66="SELECT * FROM  affiliateuser where referedby = '$countusername5'"; 
 $result66 = mysqli_query($con,$query66);
 while($row66 = mysqli_fetch_array($result66))
{

$ac6="$row66[active]";
 $countusername6="$row66[username]";
 $query77="SELECT * FROM  affiliateuser where referedby = '$countusername6'"; 
 $result77 = mysqli_query($con,$query77);
 while($row77 = mysqli_fetch_array($result77))
{
		$countusername7="$row77[username]";
	$query88="SELECT * FROM  affiliateuser where referedby = '$countusername7'"; 
 $result88 = mysqli_query($con,$query88);
 while($row88 = mysqli_fetch_array($result88))
{
	
 $countusername8="$row88[username]";
 $query99="SELECT * FROM  affiliateuser where referedby = '$countusername8'"; 
 $result99 = mysqli_query($con,$query99);
 while($row99 = mysqli_fetch_array($result99))
{
	
 $countusername9="$row99[username]";
 $query10="SELECT * FROM  affiliateuser where referedby = '$countusername9'"; 
 $result110 = mysqli_query($con,$query10);
	 while($row110 = mysqli_fetch_array($result110)){
		
	 $countusername10="$row110[username]";
	 $query11="SELECT * FROM  affiliateuser where referedby = '$countusername10'"; 
	 $result111 = mysqli_query($con,$query11);
		 while($row111 = mysqli_fetch_array($result111)){
			
		 $countusername11="$row111[username]";
		 $query12="SELECT * FROM  affiliateuser where referedby = '$countusername11'"; 
			 $result112 = mysqli_query($con,$query12);
			 while($row112 = mysqli_fetch_array($result112)){
				
			 $countusername12="$row112[username]";
			 $query13="SELECT * FROM  affiliateuser where referedby = '$countusername12'"; 
				 $result113 = mysqli_query($con,$query13);
			 while($row113 = mysqli_fetch_array($result113)){
				
			 $countusername13="$row113[username]";
			 $query14="SELECT * FROM  affiliateuser where referedby = '$countusername13'"; 
			 $result114 = mysqli_query($con,$query14);
			 while($row113 = mysqli_fetch_array($result114)){
				
			 $countusername14="$row114[username]";
			 $query15="SELECT * FROM  affiliateuser where referedby = '$countusername14'"; 
			
			}
			}		
			}
		}
	}
} 
}
}
  }
  }
}
 }
 }
 }
		return $query15;
	}		
	}//end class

