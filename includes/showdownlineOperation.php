<?php
class showdownlineOperation {
  /*    public $Id = "";
      public $parentId  = "";
      public $amount = "";
      public $otherinfo = "";*/

	public function downline_display($username,$con) {
       global $db_handle;
		//get the main persons
		$query0 = "SELECT Id, username, parent_id, referedby, account_balance, doj, dline  FROM affiliateuser WHERE username = '$username' AND level>0 LIMIT 1";
        $result0 = $db_handle->runQuery($query0);
		$user0 = $db_handle->fetchAssoc($result0);
		$otherinfo="Downlines: ".$user0[0]['dline'].", Reg Date: ".$user0[0]['doj'];
		$MultiDimArray[] = array ( 'memberId' => intval($user0[0]['Id']), 'username' => $username, parentId => null, 'amount' => $user0[0]['account_balance'], otherInfo => $otherinfo );
		
		//GET HIS DOWNLINES
	  	$query="SELECT Id, username, parent_id, referedby, account_balance, doj, dline FROM  affiliateuser where referedby = '$username' AND level>0 AND referedby<>''"; 
	   	$result = mysqli_query($con,$query);
	  while($row = mysqli_fetch_array($result)){
		   $countusername=$row['username'];
	   	  $otherinfo="Downlines: ".$row['dline'].", Reg Date: ".$row['doj'];
		   //$MultiDimArray[] = array ( 'memberId' => $row['username'], 'parentId' => $row['parent_id'], 'amount' => $row['account_balance'], otherInfo => $otherinfo );
		  if (!in_array(array ( 'memberId' => intval($row['Id']), 'username' => $row['username'], 'parentId' => $row['parent_id'], 'amount' => $row['account_balance'], otherInfo => $otherinfo ), $MultiDimArray)) {
			  $MultiDimArray[] = array ( 'memberId' => intval($row['Id']), 'username' => $row['username'], 'parentId' => intval($row['parent_id']), 'amount' => $row['account_balance'], otherInfo => $otherinfo );
			  
		  }
	   $query22="SELECT * FROM  affiliateuser where referedby = '$countusername' AND level>0 AND referedby<>''"; 
	   $result22 = mysqli_query($con,$query22);
		  while($row22 = mysqli_fetch_array($result22)){
		    $countusername2="$row22[username]";
	   		$otherinfo="Downlines: ".$row22['dline'].", Reg Date: ".$row22['doj'];
		  if (!in_array(array ( 'memberId' => intval($row22['Id']), 'username' => $row22['username'], 'parentId' => $row22['parent_id'], 'amount' => $row22['account_balance'], otherInfo => $otherinfo ), $MultiDimArray)) {
			  $MultiDimArray[] = array ( 'memberId' => intval($row22['Id']), 'username' => $row22['username'], 'parentId' => intval($row22['parent_id']), 'amount' => $row22['account_balance'], otherInfo => $otherinfo );
			  
		  }

		   $query33="SELECT * FROM  affiliateuser where referedby = '$countusername2'AND level>0  AND referedby<>''"; 
		   $result33 = mysqli_query($con,$query33);
		   while($row33 = mysqli_fetch_array($result33))
		  {
		   $countusername3="$row33[username]";
			  $otherinfo="Downlines: ".$row33['dline'].", Reg Date: ".$row33['doj'];
			if (!in_array(array ( 'memberId' => intval($row33['Id']), 'username' => $row33['username'], 'parentId' => $row33['parent_id'], 'amount' => $row33['account_balance'], otherInfo => $otherinfo ), $MultiDimArray)) {
			  $MultiDimArray[] = array ( 'memberId' => intval($row33['Id']), 'username' => $row33['username'], 'parentId' => intval($row33['parent_id']), 'amount' => $row33['account_balance'], otherInfo => $otherinfo );
			  
		    }

		   $query44="SELECT * FROM  affiliateuser where referedby = '$countusername3'AND level>0  AND referedby<>''"; 
		   $result44 = mysqli_query($con,$query44);
		   while($row44 = mysqli_fetch_array($result44))
		  {
		   $countusername4="$row44[username]";
			  $otherinfo="Downlines: ".$row44['dline'].", Reg Date: ".$row44['doj'];
		   if (!in_array(array ( 'memberId' => intval($row44['Id']), 'username' => $row44['username'], 'parentId' => $row44['parent_id'], 'amount' => $row44['account_balance'], otherInfo => $otherinfo ), $MultiDimArray)) {
			  $MultiDimArray[] = array ( 'memberId' => intval($row44['Id']), 'username' => $row44['username'], 'parentId' => $row44['parent_id'], 'amount' => $row44['account_balance'], otherInfo => $otherinfo );
			  
		    }
		   $query55="SELECT * FROM  affiliateuser where referedby = '$countusername4'AND level>0  AND referedby<>''"; 
		   $result55 = mysqli_query($con,$query55);
			 while($row55 = mysqli_fetch_array($result55)){
				 $countusername5="$row55[username]";
				 $otherinfo="Downlines: ".$row55['dline'].", Reg Date: ".$row55['doj'];
			if (!in_array(array ( 'memberId' => intval($row55['Id']), 'username' => $row55['username'], 'parentId' => $row55['parent_id'], 'amount' => $row55['account_balance'], otherInfo => $otherinfo ), $MultiDimArray)) {
			  $MultiDimArray[] = array ( 'memberId' => intval($row55['Id']), 'username' => $row55['username'], 'parentId' => $row55['parent_id'], 'amount' => $row55['account_balance'], otherInfo => $otherinfo );
			  
		    }
				$query66="SELECT * FROM  affiliateuser where referedby = '$countusername5'AND level>0 AND referedby<>''"; 
				 $result66 = mysqli_query($con,$query66);
				 while($row66 = mysqli_fetch_array($result66)){
					 $countusername6="$row66[username]";
					 $otherinfo="Downlines: ".$row66['dline'].", Reg Date: ".$row66['doj'];
		   //$MultiDimArray[] = array ( 'memberId' => $row66['Id'], 'parentId' => $row66['parent_id'], 'amount' => $row66['account_balance'], otherInfo => $otherinfo );
			if (!in_array(array ( 'memberId' => intval($row66['Id']), 'username' => $row66['username'], 'parentId' => $row66['parent_id'], 'amount' => $row66['account_balance'], otherInfo => $otherinfo ), $MultiDimArray)) {
			  $MultiDimArray[] = array ( 'memberId' => intval($row66['Id']), 'username' => $row66['username'], 'parentId' => $row66['parent_id'], 'amount' => $row66['account_balance'], otherInfo => $otherinfo );
			  
		    }
					 $query77="SELECT * FROM  affiliateuser where referedby = '$countusername6'AND level>0  AND referedby<>''"; 
					 $result77 = mysqli_query($con,$query77);
				 while($row77 = mysqli_fetch_array($result77)){
							$countusername7="$row77[username]";
					 		$otherinfo="Downlines: ".$row77['dline'].", Reg Date: ".$row77['doj'];

						 	//$MultiDimArray[] = array ( 'memberId' => $row77['Id'], 'parentId' => $row66['parent_id'], 'amount' => $row66['account_balance'], otherInfo => $otherinfo );
					 if (!in_array(array ( 'memberId' => intval($row77['Id']), 'username' => $row77['username'], 'parentId' => $row77['parent_id'], 'amount' => $row77['account_balance'], otherInfo => $otherinfo ), $MultiDimArray)) {
			  			$MultiDimArray[] = array ( 'memberId' => intval($row77['Id']), 'username' => $row77['username'], 'parentId' => $row77['parent_id'], 'amount' => $row77['account_balance'], otherInfo => $otherinfo );
			  
		    		}
					 $query88="SELECT * FROM  affiliateuser where referedby = '$countusername7'AND level>0  AND referedby<>''"; 
					 $result88 = mysqli_query($con,$query88);
					   while($row88 = mysqli_fetch_array($result88)){
						   $countusername8="$row88[username]";
					 	   $otherinfo="Downlines: ".$row88['dline'].", Reg Date: ".$row88['doj'];
					   		//$MultiDimArray[] = array ( 'memberId' => $row88['Id'], 'parentId' => $row88['parent_id'], 'amount' => $row88['account_balance'], otherInfo => $otherinfo );
						   if (!in_array(array ( 'memberId' => intval($row88['Id']), 'username' => $row88['username'], 'parentId' => $row88['parent_id'], 'amount' => $row88['account_balance'], otherInfo => $otherinfo ), $MultiDimArray)) {
			  				$MultiDimArray[] = array ( 'memberId' => intval($row88['Id']), 'username' => $row88['username'], 'parentId' => $row88['parent_id'], 'amount' => $row88['account_balance'], otherInfo => $otherinfo );
			  
		    				}
						 $query99="SELECT * FROM  affiliateuser where referedby = '$countusername8'AND level>0  AND referedby<>''"; 
					  } 
					}
				  }
			  }
		  }
		   }
		   }
	   }
	
		return ($MultiDimArray);
	}
}

