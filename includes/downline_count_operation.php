<?php
class downlinecountOperation {
  /*    public $Id = "";
      public $parentId  = "";
      public $amount = "";
      public $otherinfo = "";*/

	public function active_downline_count($username,$con) {
       global $db_handle;
		 $activedownline = 1;
		
		//GET HIS DOWNLINES
	  	$query="SELECT * FROM  affiliateuser where referedby = '$username' AND referedby<>'' and level='1'"; 
	   	$result = mysqli_query($con,$query);
	  while($row = mysqli_fetch_array($result)){
		  $countusername=$row['username'];
	   	  $activedownline++;
	   $query22="SELECT * FROM  affiliateuser where referedby = '$countusername' AND referedby<>'' and level='1'"; 
	   $result22 = mysqli_query($con,$query22);
		  while($row22 = mysqli_fetch_array($result22)){
			  $countusername2=$row22['username'];
	   		$activedownline++;

		   $query33="SELECT * FROM  affiliateuser where referedby = '$countusername2' AND referedby<>'' and level='1'"; 
		   $result33 = mysqli_query($con,$query33);
		   while($row33 = mysqli_fetch_array($result33))
		  {
			   $countusername3=$row33['username'];
		    $activedownline++;

		   $query44="SELECT * FROM  affiliateuser where referedby = '$countusername3' AND referedby<>'' and level='1'"; 
		   $result44 = mysqli_query($con,$query44);
		   while($row44 = mysqli_fetch_array($result44))
		  {
			   $countusername4=$row44['username'];
		   $activedownline++;
		   $query55="SELECT * FROM  affiliateuser where referedby = '$countusername4' AND referedby<>'' and level='1'"; 
		   $result55 = mysqli_query($con,$query55);
			 while($row55 = mysqli_fetch_array($result55)){
				 $countusername5=$row55['username'];
				 $activedownline++;
				$query66="SELECT * FROM  affiliateuser where referedby = '$countusername5' AND referedby<>'' and level='1'"; 
				 $result66 = mysqli_query($con,$query66);
				 while($row66 = mysqli_fetch_array($result66)){
					 $countusername6=$row66['username'];
					 $activedownline++;
					 $query77="SELECT * FROM  affiliateuser where referedby = '$countusername6' AND referedby<>'' and level='1'"; 
					 $result77 = mysqli_query($con,$query77);
				 while($row77 = mysqli_fetch_array($result77)){
					 $countusername7=$row77['username'];
					$activedownline++;
					 $query88="SELECT * FROM  affiliateuser where referedby = '$countusername7' AND referedby<>'' and level='1'"; 
					 $result88 = mysqli_query($con,$query88);
					   while($row88 = mysqli_fetch_array($result88)){
						   $countusername8=$row88['username'];
						   $activedownline++;
						 $query99="SELECT * FROM  affiliateuser where referedby = '$countusername8' AND referedby<>'' and level='1'"; 
					  } 
					}
				  }
			  }
		  }
		   }
		   }
	   }
	
		return ($activedownline);
	}
	
	public function inactive_downline_count($username,$con) {
       global $db_handle;
		 $activedownline = 1;
		
		//GET HIS DOWNLINES
	  	$query="SELECT * FROM  affiliateuser where referedby = '$username' AND referedby<>'' and level='0'"; 
	   	$result = mysqli_query($con,$query);
	  while($row = mysqli_fetch_array($result)){
		  $countusername=$row['username'];
	   	  $activedownline++;
	   $query22="SELECT * FROM  affiliateuser where referedby = '$countusername' AND referedby<>'' and level='0'"; 
	   $result22 = mysqli_query($con,$query22);
		  while($row22 = mysqli_fetch_array($result22)){
			  $countusername2=$row22['username'];
	   		$activedownline++;

		   $query33="SELECT * FROM  affiliateuser where referedby = '$countusername2' AND referedby<>'' and level='0'"; 
		   $result33 = mysqli_query($con,$query33);
		   while($row33 = mysqli_fetch_array($result33))
		  {
			   $countusername3=$row33['username'];
		    $activedownline++;

		   $query44="SELECT * FROM  affiliateuser where referedby = '$countusername3' AND referedby<>'' and level='0'"; 
		   $result44 = mysqli_query($con,$query44);
		   while($row44 = mysqli_fetch_array($result44))
		  {
			   $countusername4=$row44['username'];
		   $activedownline++;
		   $query55="SELECT * FROM  affiliateuser where referedby = '$countusername4' AND referedby<>'' and level='0'"; 
		   $result55 = mysqli_query($con,$query55);
			 while($row55 = mysqli_fetch_array($result55)){
				 $countusername5=$row55['username'];
				 $activedownline++;
				$query66="SELECT * FROM  affiliateuser where referedby = '$countusername5' AND referedby<>'' and level='0'"; 
				 $result66 = mysqli_query($con,$query66);
				 while($row66 = mysqli_fetch_array($result66)){
					 $countusername6=$row66['username'];
					 $activedownline++;
					 $query77="SELECT * FROM  affiliateuser where referedby = '$countusername6' AND referedby<>'' and level='0'"; 
					 $result77 = mysqli_query($con,$query77);
				 while($row77 = mysqli_fetch_array($result77)){
					 $countusername7=$row77['username'];
					$activedownline++;
					 $query88="SELECT * FROM  affiliateuser where referedby = '$countusername7' AND referedby<>'' and level='0'"; 
					 $result88 = mysqli_query($con,$query88);
					   while($row88 = mysqli_fetch_array($result88)){
						   $countusername8=$row88['username'];
						   $activedownline++;
						 $query99="SELECT * FROM  affiliateuser where referedby = '$countusername8' AND referedby<>'' and level='0'"; 
					  } 
					}
				  }
			  }
		  }
		   }
		   }
	   }
	
		return ($activedownline);
	}
}

