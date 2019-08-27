  <?php
//AT THE POINT OF THE NEW REFERRAL PAYMENT, THE SYSTEM SHOULD GIVE THE BONUS TO THE SPONSOR OR ALLOCATED SPONSOR AS THE CASE MAYBE
class spilloverOperation {
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
		
    public function check_no_of_direct_downlines($sponsor_id='',$user_code='',$country='') {
		//check no of direct downlines before adding user as referral
        global $db_handle;
		$client_operation = new clientOperation();
		$spon_level = $client_operation->get_member_level($sponsor_id);

			if (empty($sponsor_id)|| $sponsor_id==""){//no result, get a downline randomly
				$referral = $this->make_random_sponsor();
			}else{
				$tmp_downline = $client_operation->get_user_no_of_temp_downlines($sponsor_id);
				$downline_count = $client_operation->get_user_no_of_downlines($sponsor_id);
				$client_operation->new_referral_overflow($sponsor_id, $user_code);//let the sponsor get his referral commission
				if ($downline_count >= 3 and $sponsor_id != "johnzuka"){//get a downline if the sponsor has up to 3 direct downlines
					//if more than 3 downlines spillover to the user's next downline
					$referral = $this->do_spillover($sponsor_id);
				}else{
					$referral = $sponsor_id;//make it the same as the former
				}
			}
        return $referral ? $referral : false;
    }
	
	public function do_spillover($sponsor_id) {
		global $db_handle;
	   $query = "SELECT * FROM affiliateuser WHERE referedby='".$sponsor_id."' AND level = 1 ORDER BY RAND()";
	   $result = $db_handle->runQuery($query); 
	   //$new_sponsor = array();
		   //if($dline >= 3) {		 # It has children, let's get them.
				while( $row = mysqli_fetch_array($result) ) {
				  	$fetched_data = $db_handle->fetchAssoc($result);
					$dline = $fetched_data[0]["dline"];	
					if ($dline < 3){
						$new_sponsor = $row['username'];
						goto spill_complete;
					}else{
						$new_sponsor[$row['username']] = $this->do_spillover($row['username']);# Add the child to the list of children, and get its subchildren
					}
			   }
			   //check if the value($new_sponsor) is empty, that is all the downline are filled, if yes. Let the system re-assign to another member
				if (functionallyEmpty($new_sponsor) == true ){
					$this->make_random_sponsor();	
				}
		   //}
	   spill_complete:	
	   return $new_sponsor;
	 }
	
	function make_random_sponsor($except = '') {
        global $db_handle;
		$latesttime= date('Y-m-d H:i:s',time()-2*60*60*24);
        $query = "SELECT * FROM affiliateuser WHERE level = 1 and dline < 3 ORDER BY RAND() LIMIT 1";
       // $query = "SELECT * FROM affiliateuser WHERE level != 0 and dline < 5 ORDER BY Id ASC LIMIT 1";
       // $query = "SELECT * FROM affiliateuser WHERE level = 0 AND tmp_downline < 3 AND lastdown_assign_time < DATE_FORMAT('$latesttime','%Y-%m-%d %H:%i:%s') AND status='1'";//get with someone who joined less than 3days ago
        $result = $db_handle->runQuery($query);
        $fetched_data = $db_handle->fetchAssoc($result);
        $referral = $fetched_data[0]['username'];
		
		return $referral;
	}

	function new_make_random_sponsor($except = '') {
        global $db_handle;
        global $conf;
        $sponsor = '';
        srand((double)microtime() * 10000000);
		$latesttime= time()-4*60*60*24; //4days ago
        $query = "SELECT * FROM affiliateuser WHERE level = 1 and dline < 3 ORDER BY Id ASC LIMIT 1";
        $result = $db_handle->runQuery($query);
        $fetched_data = $db_handle->fetchAssoc($result);
        $username = $fetched_data[0]['username'];
         $doj = strtotime($fetched_data[0]['doj']);
		echo $random = FLOOR(RAND()*($latesttime-$doj+1))+$doj;
		
		//$query = "SELECT username from affiliateuser WHERE level = 1 and tmp_downline < 3 ORDER BY TIMESTAMPADD(SECOND, FLOOR(RAND() * TIMESTAMPDIFF(SECOND, $doj, $latesttime)), $doj)";
		$query = "SELECT username from affiliateuser WHERE level = 1 and dline < 3 ORDER BY random LIMIT 1";
        $fetched_data = $db_handle->fetchAssoc($result);
      echo  $referral = $fetched_data[0]['username'];
		
		return $referral;
	}
	
	function clear_up_redundant_downline($except = '') {// do this for accounts with dormant downlines and yet their status=1
        global $db_handle;
		$latesttime= date('Y-m-d H:i:s',time()-4*60*60*24);
        $query = "SELECT * FROM affiliateuser WHERE level = 0 AND doj < DATE_FORMAT('$latesttime','%Y-%m-%d %H:%i:%s') AND status='1'";//get with someone who joined less than 3days ago
        $result = $db_handle->runQuery($query);
		while( $row = mysqli_fetch_array($result) ) {
		  		echo  $user_code = $row['user_code'];
				$referral = $row['referedby'];
	
				//$query = "UPDATE affiliateuser SET referred_by='',status=0 WHERE user_code='$user_code'";
				$query = "DELETE FROM affiliateuser WHERE user_code='$user_code'";
				$db_handle->runQuery($query);
				$query = "DELETE FROM uplines WHERE user_code='$user_code'";
				$db_handle->runQuery($query);
				
				$tmp_downline = $this->calculate_user_no_of_tempdownlines($referral);//create a space for new downlines
				echo $downline = $this->calculate_user_no_of_downlines($referral);//create a space for new downlines
				//$tot_downline = $tmp_downline + $downline;
				
				$query = "UPDATE affiliateuser SET tmp_downline='$tmp_downline',dline='$downline' WHERE username='$referral'";
				$db_handle->runQuery($query);
				
				$downline =0;
				$tmp_downline =0;
			
			//return $referral;
		}
	}
	
	public function calculate_user_no_of_downlines($username) {
	//this show the no of confirmed direct downlines
        global $db_handle;
       $query = "SELECT * FROM affiliateuser WHERE referedby='$username' AND level>0 AND status='1'";
        $dline = $db_handle->numRows($query);
        return $dline ? $dline : 0;
	}		

	public function calculate_user_no_of_tempdownlines($username) {
	//this show the no of unconfirmed direct downlines
        global $db_handle;
       $query = "SELECT * FROM affiliateuser WHERE referedby='$username' AND status='1'";
        $tdline = $db_handle->numRows($query);
        return $tdline ? $tdline : 0;
	}		
	
	function recalculate_all_downlines($except = '') {// do this for accounts with dormant downlines and yet their status=1
        global $db_handle;
        $query = "SELECT * FROM affiliateuser WHERE level > 0 AND status='1'";//get with someone who joined less than 3days ago
        $result = $db_handle->runQuery($query);
		while( $row = mysqli_fetch_array($result) ) {
		  		$user_code = $row['user_code'];
			echo	$username = $row['username'];
				$referral = $row['referedby'];
	
				$tmp_downline = $this->calculate_user_no_of_tempdownlines($username);//create a space for new downlines
				echo $downline = $this->calculate_user_no_of_downlines($username);//create a space for new downlines
				//$tot_downline = $tmp_downline + $downline;
				
				$query = "UPDATE affiliateuser SET tmp_downline='$tmp_downline',dline='$downline' WHERE username='$username'";
				$db_handle->runQuery($query);
				
				$downline =0;
				$tmp_downline =0;
			
			//return $referral;
		}
	}
}

?>