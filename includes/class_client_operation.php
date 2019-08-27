<?php
class clientOperation {
    private $client_data;
    
    public function __construct($ifx_account = '', $email_address = '') {
        if(isset($ifx_account) && !empty($ifx_account)) {
            $this->client_data = $this->set_client_data($ifx_account);
        }
    }
	
    public function authenticate($email = "", $password = "") {
        global $db_handle;
        $email = $db_handle->sanitizePost($email);

        $query = "SELECT pass_salt FROM affiliateuser WHERE email = '$email' or  username = '$email' LIMIT 1";

        $result = $db_handle->runQuery($query);

        if($db_handle->numOfRows($result) == 1) {
            $user = $db_handle->fetchAssoc($result);
            $pass_salt = $user[0]['pass_salt'];
			$pwdver=verify($password,$pass_salt);
			if (strlen($email) > 4 and ($pwdver == 1)){
				$query = "select * from affiliateuser where (user_code='" . $email. "' or email='" . $email. "' or username='" . $email. "') LIMIT 1";
				$result = $db_handle->runQuery($query);
	
				if($db_handle->numOfRows($result) == 1) {
					$found_user = $db_handle->fetchAssoc($result);
					$_SESSION['client_username'] = $found_user[0]['username'];
					$_SESSION['client_unique_code'] = $found_user[0]['user_code'];
        			$_SESSION['signupcode'] = $found_user[0]['signupcode'];
					return $found_user;
				} else {
					return false;
				}
			}
        } else {
            return false;
        }
    }
	
	    // Check whether client has an active status
    public function client_is_active($user_code) {
        global $db_handle;
        
        $query = "SELECT status FROM affiliateuser WHERE user_code = '$user_code'";
        $result = $db_handle->runQuery($query);
        $fetched_data = $db_handle->fetchAssoc($result);
        
        if($fetched_data[0]['status'] == '1') {
			$lastlogin = time();
			$query = "UPDATE affiliateuser SET active='$lastlogin' WHERE user_code = '$user_code'";
			$db_handle->runQuery($query);
            return true;
			
        } else {
            return false;
        }
    }
		
	public function get_state_id_by_state($state_name) {
        global $db_handle;

		$query = "SELECT state_id FROM state WHERE state_name = '$state_name'";
        $result = $db_handle->runQuery($query);
        $fetched_data = $db_handle->fetchAssoc($result);
        $state_id = $fetched_data[0];

        return $state_id ? $state_id : false;
    }
	
	    // Get all the states
    public function get_all_states() {
        global $db_handle;
        
        $query = "SELECT * FROM state ORDER BY state_id ASC";
        $result = $db_handle->runQuery($query);
        $fetched_data = $db_handle->fetchAssoc($result);
        
        if($fetched_data) {
            return $fetched_data;
        } else {
            return false;
        }
    }
	
	    //Get state name by state id
    public function get_state_by_state_id($state_id) {
        global $db_handle;
        
        $query = "SELECT state FROM state WHERE state_id = '$state_id' LIMIT 1";
        $result = $db_handle->runQuery($query);
        $fetched_data = $db_handle->fetchAssoc($result);
        $state = $fetched_data[0]['state'];
        
        return $state;
    }

    public function get_all_countries() {
        global $db_handle;
        
        $query = "SELECT * FROM countries ORDER BY country_id ASC";
        $result = $db_handle->runQuery($query);
        $fetched_data = $db_handle->fetchAssoc($result);
        
        if($fetched_data) {
            return $fetched_data;
        } else {
            return false;
        }
    }
	
	public function get_all_clubs() {
        global $db_handle;
        
        $query = "SELECT * FROM clubs ORDER BY club_name ASC";
        $result = $db_handle->runQuery($query);
        $fetched_data = $db_handle->fetchAssoc($result);
        
        if($fetched_data) {
            return $fetched_data;
        } else {
            return false;
        }
    }
	
    /**
     * @param $account_no
     * @param $full_name
     * @param $email_address
     * @param $phone_number
     * @param $type - 1 if KYC, 2 if ILPR enrolment
     * @return bool|string
     */
    public function new_referral_overflow($sponsor_id, $new_member) {
        global $db_handle;
		$amount = 1;
        $query = "INSERT INTO referraloverflow (sponsor_id, amount, new_member) VALUES ('$sponsor_id', '$amount', '$new_member')";
        $db_handle->runQuery($query);
        return $db_handle->affectedRows() > 0 ? true : false;
	}
	
    public function check_email_exists($email_address=NULL) {
		global $db_handle;
	// Check whether the email is existing
        $query = "SELECT user_code FROM affiliateuser WHERE email = '$email_address' LIMIT 1";
        $result = $db_handle->runQuery($query);
        
        if($db_handle->numOfRows($result) > 0) {
			return true;
        }else{
			return false;
		}
	}
	
	public function check_username_exists($username) {
		global $db_handle;
	// Check whether the email is existing
        $query = "SELECT user_code FROM affiliateuser WHERE username = '$username' LIMIT 1";
        $result = $db_handle->runQuery($query);
        
        if($db_handle->numOfRows($result) > 0) {
			return true;
        }else{
			return false;
		}
	}
	
	public function new_user($username, $password, $full_name, $email_address, $phone, $partner, $club, $country, $ip=NULL) {
        global $db_handle;
		$system_object = new LifeHelpSystem();
		$spill_operation = new spilloverOperation();
		
		//$partner = $_SESSION['lifehelp_gov_ref'];
		$upline_operation = new uplineOperation();
            usercode:
            $user_code = rand_string(11);
            if($db_handle->numRows("SELECT user_code FROM affiliateuser WHERE user_code = '$user_code'") > 0) { goto usercode; };
		
		$new_partner=$spill_operation->check_no_of_direct_downlines($partner,$user_code,$country);
		//$partner = 'johnazuka';
		$partner_det = $this->get_user_by_username($new_partner);
		$partner_id = $partner_det['Id'];
		$partner_code = $partner_det['user_code'];
        
        // Check whether the email is existing
        $query = "SELECT user_code FROM affiliateuser WHERE email = '$email_address' LIMIT 1";
        $result = $db_handle->runQuery($query);
        
        if($db_handle->numOfRows($result) > 0) {
            $fetched_data = $db_handle->fetchAssoc($result);
            $user_code = $fetched_data[0]['user_code'];
           
        } else {
			//$gen_pass = rand_string(7);
			//$pass_salt = generateHash($gen_pass);

			$pass_salt = generateHash($password);

            $full_name = preg_replace("/[^A-Za-z0-9 ]/", '', $full_name);
            $full_name = ucwords(strtolower(trim($full_name)));
            $full_name = explode(" ", $full_name);

            if(count($full_name) == 3) {
                $last_name = $full_name[2];
                if(strlen($full_name[2]) < 3) {
                    $middle_name = $full_name[1];
                    $first_name = $full_name[0];
                } else {
                    $middle_name = $full_name[1];
                    $first_name = $full_name[0];
                }
            } else {
                $last_name = $full_name[1];
                $middle_name = "";
                $first_name = $full_name[0];
            }
			            
            if(empty($middle_name)) {
                $query = "INSERT INTO affiliateuser (user_code, email, mobile, username, sammer_pass, pass_salt, first_name, last_name, referedby, parent_id, origin_aff, clubID, country) VALUES ('$user_code', '$email_address', '$phone', '$username', '$password', '$pass_salt', '$first_name', '$last_name', '$new_partner', '$partner_id', '$partner', '$club', '$country')";
                $db_handle->runQuery($query);
            } else {
                $query = "INSERT INTO affiliateuser (user_code, email, mobile, username, sammer_pass, pass_salt, first_name, middle_name, last_name, referedby, parent_id, origin_aff, clubID, country) VALUES ('$user_code', '$email_address', '$phone', '$username', '$password', '$pass_salt', '$first_name', '$middle_name', '$last_name', '$new_partner', '$partner_id', '$partner', '$club', '$country')";
                $db_handle->runQuery($query);
            }

		//increase the downline count of the upline/receiver
			$tmp_downline = $this->get_user_no_of_temp_downlines($partner)+1;
			$query = "UPDATE affiliateuser SET tmp_downline='$tmp_downline' WHERE username='$new_partner' OR user_code='$partner'";
			$db_handle->runQuery($query);
		
			
        // Send activation link to email
        $subject = "Welcome to Football Fans Network";
        $body = "
Dear " . $first_name . "

Congratulation ! 
You are now a member of Football Fan Network

Hi $username,
Thank You for your interest in this program.
Below is you account information :
Username: $username
Password: $password (please change after login)
Email: $email_address
Login: http://footballfansnetwork.com/login-register

What is my next step?

#Join a Club 
i - Login to your account using the username and password.
ii - Look for Join Club link, select a club and Submit the payment form.
iii - As soon as payment is completed and verified(verification is automatic if payment is online).
iv.  After confirmation, you will be open to all the freebies from FFN. Also refer to earn bigger.


Best Regards,
Football Fans Network Team
www.footballfansnetwork.com";
        
        $system_object->send_email($subject, $body, $email_address, $full_name);	
	/*	$headers = array("From: life@footballfansnetwork.com",
    "Reply-To: support@footballfansnetwork.com",
    "X-Mailer: PHP/" . PHP_VERSION
);
$headers = implode("\r\n", $headers);*/
$headers  = "MIME-Version: 1.0" . "\r\n";
$headers .= "Content-type: text/html; charset=iso-8859-1" . "\r\n";
$headers .= "From: ". $from. "\r\n";
$headers .= "Reply-To: ". $from. "\r\n";
$headers .= "X-Mailer: PHP/" . phpversion();
$headers .= "X-Priority: 1" . "\r\n"; 

$my_mail = "life@footballfansnetwork.com";
$my_replyto = "life@footballfansnetwork.com";


	mail_attachment($my_file, $my_path, $email_address, $my_mail, $my_name, $my_replyto, $subject, $body);
		mail($email_address, $subject, $body, $headers);
		
		
			$query = "INSERT INTO uplines(user_code, level1_referral) VALUES ('$user_code', '$partner_code')";
			$db_handle->runQuery($query);

			$ncurrency =$this->set_user_preferred_currency_based_on_country($country);
			$query = "UPDATE affiliateuser SET preferred_currency='$ncurrency' WHERE user_code='$user_code'";
            $db_handle->runQuery($query);
        }
           
        return "An email was sent to $email_address containing your password and registration information. It might take a while to arrive to your mailbox. If the email is not in your Inbox, please check Spam/Junk box. <br> To login, username: $username <br> Password: $password. <br> Regards.";
    }
	
	
    public function view_participant_info($memb_id) {
		//get registration details for a particular person in one year
        global $db_handle;

        $query = "SELECT * FROM  affiliateuser where user_code = '".$memb_id."' OR  username = '".$memb_id."' OR  email = '".$memb_id."'";

        $result = $db_handle->runQuery($query);
        $fetched_data = $db_handle->fetchAssoc($result);
        $user_details = $fetched_data[0];

        return $user_details ? $user_details : false;
    }
	
	public function level_info($level) {
        global $db_handle;

        $query = "SELECT * FROM level_commissions where level_id = '".$level."'";

        $result = $db_handle->runQuery($query);
        $fetched_data = $db_handle->fetchAssoc($result);
        $var_details = $fetched_data[0];

        return $var_details ? $var_details : false;
    }
	
    public function get_packg_name($pckg_id) {
		//get registration details for a particular person in one year
        global $db_handle;

        $query = "SELECT name FROM packages WHERE id='$pckg_id'";

        $result = $db_handle->runQuery($query);
        $fetched_data = $db_handle->fetchAssoc($result);
        $pckg_details = $fetched_data[0]['name'];

        return $pckg_details ? $pckg_details : false;
    }
	
    public function get_header_settings() {
		//get registration details for a particular person in one year
        global $db_handle;

        $query = "SELECT header from settings where sno=0";

        $result = $db_handle->runQuery($query);
        $fetched_data = $db_handle->fetchAssoc($result);
        $header_det = $fetched_data[0]['header'];

        return $header_det ? $header_det : false;
    }
	
	public function get_my_ebook($my_club) {
		//get registration details for a particular person in one year
        global $db_handle;

        $query = "SELECT book_name from ebooks where clubID='$my_club'";

        $result = $db_handle->runQuery($query);
        $fetched_data = $db_handle->fetchAssoc($result);
        $book_name = $fetched_data[0]['book_name'];

        return $book_name ? $book_name : false;
    }
	
	public function get_settings() {
		//get registration details for a particular person in one year
        global $db_handle;

        $query = "SELECT * from settings where sno=0";

        $result = $db_handle->runQuery($query);
        $fetched_data = $db_handle->fetchAssoc($result);
        $setting_det = $fetched_data[0];

        return $setting_det ? $setting_det : false;
    }
	
    public function get_page_content($page,$block) {
		//get registration details for a particular person in one year
        global $db_handle;

        $query = "SELECT content from dynacontent where page='$page' and block='$block'";

        $result = $db_handle->runQuery($query);
        $fetched_data = $db_handle->fetchAssoc($result);
        $cont_det = $fetched_data[0]['content'];

        return $cont_det ? $cont_det : false;
    }		
	
    public function get_user_by_code($user_code) {
        global $db_handle;

        $query = "SELECT * FROM affiliateuser WHERE user_code = '$user_code' LIMIT 1";

        $result = $db_handle->runQuery($query);

        if($db_handle->numOfRows($result) > 0) {
            $user = $db_handle->fetchAssoc($result);
            $user_details = $user[0];
            return $user_details;
        } else {
            return false;
        }
    }	
	
	public function get_user_by_id($Id) {
        global $db_handle;

        $query = "SELECT * FROM affiliateuser WHERE Id = '$Id' LIMIT 1";

        $result = $db_handle->runQuery($query);

        if($db_handle->numOfRows($result) > 0) {
            $user = $db_handle->fetchAssoc($result);
            $user_details = $user[0];
            return $user_details;
        } else {
            return false;
        }
    }	

    public function get_user_by_username($username) {
        global $db_handle;

        $query = "SELECT * FROM affiliateuser WHERE username = '$username' OR user_code = '$username' LIMIT 1";

        $result = $db_handle->runQuery($query);

        if($db_handle->numOfRows($result) > 0) {
            $user = $db_handle->fetchAssoc($result);
            $user_details = $user[0];
            return $user_details;
        } else {
            return false;
        }
    }	
	
	public function get_club_by_id($club_id) {
        global $db_handle;

        $query = "SELECT * FROM clubs WHERE club_id='$club_id'";
        $result = $db_handle->runQuery($query);
        $fetched_data = $db_handle->fetchAssoc($result);

        $club_id = $fetched_data[0];
        return $club_id ? $club_id : false;
    }
	
	function curPageName() {
	 	return substr($_SERVER["SCRIPT_NAME"],strrpos($_SERVER["SCRIPT_NAME"],"/")+1);
	}
	
	    // set a new bank account
    public function new_donation_transaction($user_code, $payee_user_code, $level, $Payment_paybank, $Payment_currency, $Payment_amount, $Payment_name, $Payment_acctno, $Payment_slip,$currency_used) {
        global $db_handle;
		$tran_id = generateHash(rand_string(11));
       
//        $query = "SELECT user_rec_code FROM donation_trans WHERE amount = '$Payment_amount' AND user_rec_code='$user_code' AND user_sender_code='$payee_user_code' AND (`created_time`>DATE_SUB(NOW(), INTERVAL 70 MINUTE))";//if duplicate data has been entered by the same person to same person in the last 24hours
     //   $query = "SELECT * FROM donation_trans WHERE amount = '$Payment_amount' AND user_rec_code='$user_code' AND user_sender_code='$payee_user_code' AND TIME_TO_SEC(TimeDiff(now(),created_time)) < 160 ";//if duplicate data has been entered by the same person to same person in the last 24hours
        $query = "SELECT * FROM donation_trans WHERE amount = '$Payment_amount' AND user_rec_code='$user_code' AND user_sender_code='$payee_user_code' AND created_time BETWEEN DATE_SUB( NOW() , INTERVAL 1 HOUR) AND NOW()";//if duplicate data has been entered by the same person to same person in the last 24hours
     //   $query = "SELECT * FROM donation_trans WHERE amount = '$Payment_amount' AND user_rec_code='$user_code' AND user_sender_code='$payee_user_code' AND (FROM_UNIXTIME(donation_trans.created_time,'%Y-%m-%d %h:%i:%s') > DATE_SUB(NOW(), INTERVAL 1 day))";//if duplicate data has been entered by the same person to same person in the last 24hours
		$latesttime= date('Y-m-d H:i:s',time()-3*60*60*24);
//        $query = "SELECT * FROM donation_trans WHERE amount = '$Payment_amount' AND user_rec_code='$payee_user_code' AND user_sender_code='$user_code' AND pop='$Payment_slip' AND (created_time > DATE_FORMAT('$latesttime','%Y-%m-%d %H:%i:%s'))";//if duplicate data has been entered by the same person to same person in the last 24hours
        $result = $db_handle->runQuery($query);
        
        if($db_handle->numRows($query) > 0) {
			$status = "Record added recently. If in error contact admin via the Support Page.<br>";
		}else{
			$query = "INSERT INTO donation_trans (transaction_id, user_rec_code, user_sender_code, receiver_acct_name, receiver_acct_no, receiver_bank,level,amount,pop,currency_used,trans_status) VALUES
				('$tran_id', '$payee_user_code', '$user_code', '$Payment_name', '$Payment_acctno', '$Payment_paybank', '$level', '$Payment_amount', '$Payment_slip', '$currency_used', '1')";
			$db_handle->runQuery($query);
	
			$payer_det = $this->get_user_by_code($user_code);
			$payer_username = $payer_det['username'];
	
			$payee_det = $this->get_user_by_code($payee_user_code);
			$payee_username = $payee_det['username'];
			$payee_email = $payee_det['email'];
			$payee_first_name = $payee_det['first_name'];
			$payee_last_name = $payee_det['last_name'];
			$payee_middle_name = $payee_det['middle_name'];
			$payee_fullname = $payee_first_name.' '.$payee_middle_name.' '.$payee_last_name;
			
			$subject = "New Donation Added from Football Fan Network";
			$body = "
			Dear " . $payee_first_name . "
			
			Hi $payee_username,
			
			$payer_username just made a payment to the following account viz:- 
			Acct Name: $Payment_name
			Acct Number: $Payment_acctno
			Amount: $Payment_amount
			
			Kindly confirm urgently if it has been received.
			
			Best Regards,
			Football Fans Network Team
			www.footballfansnetwork.com";
					
			$my_mail = "life@footballfansnetwork.com";
			$my_replyto = "life@footballfansnetwork.com";
			
			$headers  = "MIME-Version: 1.0" . "\r\n";
			$headers .= "Content-type: text/html; charset=iso-8859-1" . "\r\n";
			$headers .= "From: ". $my_mail. "\r\n";
			$headers .= "Reply-To: ". $my_replyto. "\r\n";
			$headers .= "X-Mailer: PHP/" . phpversion();
			$headers .= "X-Priority: 1" . "\r\n"; 
	
		mail_attachment($my_file, $my_path, $payee_email, $my_mail, $payee_fullname, $my_replyto, $subject, $body);
			mail($payee_email, $subject, $body, $headers);	
			
			$status = true;
		}
		return $status;
    }
	

    public function restartusercycle($user_code) {
		//the user restart the cycle
		$session_client = new SessionClient();
        global $db_handle;
		$user_detail = $this->view_participant_info($user_code);
		extract($user_detail);
            usercode:
            $user_code1 = rand_string(11);
            if($db_handle->numRows("SELECT user_code FROM affiliateuser WHERE user_code = '$user_code1'") > 0) { goto usercode; };
		
		//a restarter pays to Admin		
		$query1 = "SELECT * FROM admin_bank_details WHERE country='$country' AND note='local' AND status='2' ORDER by RAND() LIMIT 1"; 
		$numQuery = $db_handle->numRows($query1);
		if ($numQuery1 > 0){}else{
		$query = "SELECT * FROM admin_bank_details WHERE user_code=''";
		}
		 $result1 = $db_handle->runQuery($query1);
		 $fetched_data = $db_handle->fetchAssoc($result1);
		 $partner = $fetched_data[0]['username'];
		$partner_det = $this->get_user_by_username($partner);
		$partner_id = $partner_det['Id'];
		$partner_code = $partner_det['user_code'];

		$recycles = $recycles + 1;
		$ddate= date('Y-m-d H:i:s');

		//create a new record for the ended cycle
		$query = "INSERT INTO recycledusers( user_code, username,first_name,last_name,email,referedby,recycles,parent_id,level,dline,doj ) select user_code, username,first_name,last_name,email,referedby,recycles,parent_id,level,dline,doj from affiliateuser where user_code='$user_code'";
        $db_handle->runQuery($query);
		
		//start the new cycle
		$query = "UPDATE affiliateuser SET recycles = '$recycles',user_code = '$user_code1',parent_id = '$partner_id',referedby = '$partner',level='0',dline='0',doj='$ddate' WHERE user_code = '$user_code' LIMIT 1";
        $db_handle->runQuery($query);
		
		$query = "INSERT INTO uplines(user_code, level1_referral) VALUES ('$user_code', '$partner_code')";
		$db_handle->runQuery($query);

		$session_client->logout();
		$session_client->check_login();
        return $numQuery ? $numQuery : 0;
		
    }				
	
    public function delete_user_ecurrency($user_code,$type) {
        global $db_handle;

        $query = "UPDATE ecurrency_accounts SET $type='' WHERE user_code='$user_code'";
        $result = $db_handle->runQuery($query);

        return $result ? true : false;
    }	
	
    // Get ecurrency details of a particular user
    public function get_user_ecurrency($user_code) {
        global $db_handle;

        $query = "SELECT * FROM ecurrency_accounts WHERE user_code='$user_code'";
        $result = $db_handle->runQuery($query);
        $ecurr_details = $db_handle->fetchAssoc($result);

       // $bank_details = $fetched_data[0];
        return $ecurr_details[0] ? $ecurr_details[0] : false;
    }	
	
	// set a new bank account
    public function set_user_ecurrency($user_code,$type,$value){
        global $db_handle;

		$query = "SELECT * FROM ecurrency_accounts WHERE user_code='$user_code'";
		$numQuery = $db_handle->numRows($query);
		if ($numQuery > 0){
			$query = "UPDATE ecurrency_accounts SET $type='$value' WHERE user_code='$user_code'";
			$result = $db_handle->runQuery($query);			
		}else{		
			$query = "INSERT INTO ecurrency_accounts (user_code, $type) VALUES ('$user_code', '$value')";
			$db_handle->runQuery($query);
		}

        return $db_handle->affectedRows() > 0 ? true : false;
    }

	// set a new bank account
    public function set_bank_account($user_code, $bank_acct_name, $bank_acct_number, $bank_id, $note) {
        global $db_handle;

        $query = "INSERT INTO user_bank (user_code, bank_acct_name, bank_acct_no, bank_name, note) VALUES
            ('$user_code', '$bank_acct_name', '$bank_acct_number', '$bank_id', '$note')";
        $db_handle->runQuery($query);

        return $db_handle->affectedRows() > 0 ? true : false;
    }
	
    // Get the bank details of a particular user
    public function get_user_bank_account($user_code) {
        global $db_handle;

        $query = "SELECT * FROM user_bank WHERE user_code='$user_code'";
        $result = $db_handle->runQuery($query);
        $bank_details = $db_handle->fetchAssoc($result);

       // $bank_details = $fetched_data[0];
        return $bank_details ? $bank_details : false;
    }
	
	// Get the no of bank account of a particular user
    public function no_of_user_bank_account($user_code) {
        global $db_handle;

        $query = "SELECT * FROM user_bank WHERE user_code='$user_code'";
		$numQuery = $db_handle->numRows($query);
        return $numQuery ? $numQuery : 0;
    }
	
    // Get the bank details by bank id
    public function get_user_bank_account_by_id($user_bank_id) {
        global $db_handle;

        $query = "SELECT * FROM user_bank WHERE user_bank_id='$user_bank_id'";
        $result = $db_handle->runQuery($query);
        $fetched_data = $db_handle->fetchAssoc($result);

        $bank_details = $fetched_data[0];
        return $bank_details ? $bank_details : false;
    }	
	
    // Get the bank details of a particular user
    public function delete_user_bank_account($user_bank_id) {
        global $db_handle;

        $query = "DELETE FROM user_bank WHERE user_bank_id='$user_bank_id'";
        $result = $db_handle->runQuery($query);

       // $bank_details = $fetched_data[0];
        return $result ? true : false;
    }	

    // Get the admin details of a particular user
    public function get_admin_bank_account($country=NULL) {
        global $db_handle;

        $query = "SELECT * FROM admin_bank_details WHERE country='$country' AND note='local' AND status='2' ORDER by RAND() LIMIT 1";
		$numQuery = $db_handle->numRows($query);
		if ($numQuery > 0){}else{
        $query = "SELECT * FROM admin_bank_details WHERE user_code=''";
		}
        $result = $db_handle->runQuery($query);
        $bank_details = $db_handle->fetchAssoc($result);
        return $bank_details ? $bank_details : false;
    }
	
    public function get_default_admin($country=NULL) {
        global $db_handle;

        $query = "SELECT * FROM admin_bank_details WHERE country='$country' AND note='local' AND status='2' ORDER by RAND() LIMIT 1";
		$numQuery = $db_handle->numRows($query);
		if ($numQuery > 0){}else{
        $query = "SELECT * FROM admin_bank_details WHERE user_code=''";
		}
	    $result = $db_handle->runQuery($query);
	    $fetched_data = $db_handle->fetchAssoc($result);
	    $admin_code = $fetched_data[0]['user_code'];
        return $admin_code ? $admin_code : false;
    }	
	
    public function update_user_bank_account_details($user_code, $bank_acct_name, $bank_acct_number, $bank_name, $note, $user_bank_id) {
		//update a user's bank details status
        global $db_handle;

        $query = "UPDATE user_bank SET bank_acct_name = '$bank_acct_name',bank_acct_no = '$bank_acct_number',bank_name = '$bank_name',note = '$note' WHERE user_bank_id = '$user_bank_id' AND user_code = '$user_code' LIMIT 1";
        $db_handle->runQuery($query);

        return $db_handle->affectedRows() > 0 ? true : false;
    }
	
    public function update_user_bank_account_status($user_bank_id, $bank_account_status, $user_code) {
		//update a user's bank details status
        global $db_handle;

        $query = "UPDATE user_bank SET status = '$bank_account_status' WHERE user_bank_id = '$user_bank_id' AND user_code = '$user_code' LIMIT 1";
        $db_handle->runQuery($query);

        return $db_handle->affectedRows() > 0 ? true : false;
    }
	
    public function update_bank_account_status($user_bank_id, $bank_account_status) {
        global $db_handle;

        $query = "UPDATE user_bank SET status = '$bank_account_status' WHERE user_bank_id = '$user_bank_id' LIMIT 1";
        $db_handle->runQuery($query);

        return $db_handle->affectedRows() > 0 ? true : false;
    }
		
    public function check_maintenance_status() {
        global $db_handle;

        $query = "SELECT maintain FROM  settings WHERE sno=0";
        $result = $db_handle->runQuery($query);
        $fetched_data = $db_handle->fetchAssoc($result);
        $main_status = $fetched_data[0]['maintain'];

	if($main_status==2 || $main_status==3)
	{
	echo "
				<script language='javascript'>
					window.location = 'maintain.php';
				</script>
			";
	}
        return $main_status ? $main_status : false;
    }	

    public function get_footer() {
        global $db_handle;

        $query = "SELECT footer FROM  settings WHERE sno=0";
        $result = $db_handle->runQuery($query);
        $fetched_data = $db_handle->fetchAssoc($result);
        $footer = $fetched_data[0]['footer'];

        return $footer ? $footer : false;
    }	

    public function get_user_current_level($user_code) {
		//get the participant's current level
        global $db_handle;

        $query = "SELECT level FROM affiliateuser WHERE user_code='$user_code'";
        $result = $db_handle->runQuery($query);
        $fetched_data = $db_handle->fetchAssoc($result);
        $level = $fetched_data[0]["level"];
		
        return $level ? $level : 0;
    }

    public function get_level_payee($level,$user_code) {
		//get the person the participant is supposed to pay at this level
        global $db_handle;
		$levelcheck = 'level'.$level.'_referral';

        $query = "SELECT $levelcheck FROM uplines WHERE user_code='$user_code'";
        $result = $db_handle->runQuery($query);
        $fetched_data = $db_handle->fetchAssoc($result);
        $duepayee = $fetched_data[0]["$levelcheck"];
		
		if ($duepayee == ""){
			$duepayee = "FFN";
		}

        return $duepayee ? $duepayee : false;
    }	

    public function get_level_upline($level,$user_code) {
		//get the downlines at this level
        global $db_handle;
		$levelcheck = 'level'.$level.'_referral';

        $query = "SELECT user_code FROM uplines WHERE $levelcheck='$user_code'";
        $result = $db_handle->runQuery($query);
        $fetched_data = $db_handle->fetchAssoc($result);
        $duepayee = $fetched_data[0]["user_code"];

        return $duepayee ? $duepayee : false;
    }
	
    public function get_total_no_of_subscribers() {
		//get the no of downlines at this level
        global $db_handle;
		$levelcheck = 'level'.$level.'_referral';

        $query = "SELECT * FROM affiliateuser";
        $result = $db_handle->numRows($query);
		
        return $result ? $result : 0;
    }
		
    public function get_no_of_level_upline($level,$user_code) {
		//get the no of downlines at this level
        global $db_handle;
		$levelcheck = 'level'.$level.'_referral';

        $query = "SELECT user_code FROM uplines WHERE $levelcheck='$user_code'";
        $result = $db_handle->numRows($query);
		
        return $result ? $result : 0;
    }
	
    public function get_no_of_alllevel_upline($user_code) {
 		//get the no of downlines at all levels by this participant
       global $db_handle;
		$levelcheck = 'level'.$level.'_referral';

        $query = "SELECT * FROM uplines WHERE (level1_referral='$user_code' OR level2_referral='$user_code' OR level3_referral='$user_code' OR level4_referral='$user_code' OR level5_referral='$user_code' OR level6_referral='$user_code' OR level7_referral='$user_code' OR level8_referral='$user_code' OR level9_referral='$user_code' OR level10_referral='$user_code' OR level11_referral='$user_code' OR level12_referral='$user_code' OR level13_referral='$user_code' OR level14_referral='$user_code' OR level15_referral='$user_code')";
        $result = $db_handle->numRows($query);
		
        return $result ? $result : 0;
    }
	
	public function get_alllevel_upline($user_code) {
 		//get the no of downlines at all levels by this participant
       global $db_handle;
		$levelcheck = 'level'.$level.'_referral';

        $query = "SELECT DISTINCT affiliateuser.* FROM uplines INNER JOIN affiliateuser ON (uplines.user_code=affiliateuser.user_code OR uplines.level1_referral=affiliateuser.user_code OR uplines.level2_referral=affiliateuser.user_code OR uplines.level3_referral=affiliateuser.user_code OR uplines.level4_referral=affiliateuser.user_code ) WHERE (level1_referral='$user_code' OR level2_referral='$user_code' OR level3_referral='$user_code' OR level4_referral='$user_code' OR level5_referral='$user_code' OR level6_referral='$user_code' OR level7_referral='$user_code' OR level8_referral='$user_code' OR level9_referral='$user_code' OR level10_referral='$user_code' OR level11_referral='$user_code' OR level12_referral='$user_code' OR level13_referral='$user_code' OR level14_referral='$user_code' OR level15_referral='$user_code') ";
        return $query ? $query : false;
    }
    public function view_direct_downlines($memb_id) {
		//get registration details for a particular person in one year
        global $db_handle;

        //$query = "SELECT * FROM affiliateuser where referedby = '$memb_id' AND referedby<>''";
        $query = "SELECT * FROM affiliateuser,uplines where affiliateuser.user_code=uplines.user_code AND uplines.user_code = '$memb_id' AND affiliateuser.user_code<>'' AND affiliateuser.referred_by<>''";

        $result = $db_handle->runQuery($query);
        $fetched_data = $db_handle->fetchAssoc($result);
        $user_details = $fetched_data[0];

        return $user_details ? $user_details : false;
    }
	
    public function get_member_level($memb_id) {
		//get registration details for a particular person in one year
        global $db_handle;

        //$query = "SELECT * FROM affiliateuser where referedby = '$memb_id' AND referedby<>''";
        $query = "SELECT level FROM affiliateuser WHERE (user_code='$memb_id' OR username='$memb_id')";

        $result = $db_handle->runQuery($query);
        $fetched_data = $db_handle->fetchAssoc($result);
        $user_level = $fetched_data[0]['level'];

        return $user_level ? $user_level : false;
    }	

    public function show_direct_downlines($user_code) {
		//get registration details for a particular person in one year
        global $db_handle;

        //$query = "SELECT * FROM affiliateuser where referedby = '$memb_id' AND referedby<>''";
        $query = "SELECT affiliateuser.* FROM affiliateuser,uplines where affiliateuser.user_code=uplines.user_code AND uplines.level1_referral='$user_code' AND affiliateuser.user_code<>'' AND affiliateuser.referedby<>''";

        return $query ? $query : false;
    }

    public function get_level_downline($level,$user_code) {
		//get the downlines at this level
        global $db_handle;
		$reflevel = 'level'.$level.'_referral';

        $query = "SELECT affiliateuser.user_code AS user_code,affiliateuser.username AS username,affiliateuser.first_name AS first_name,affiliateuser.middle_name AS middle_name,affiliateuser.last_name AS last_name,affiliateuser.email AS email,affiliateuser.mobile AS mobile,affiliateuser.doj AS doj,affiliateuser.level AS level,affiliateuser.expiry AS expiry FROM affiliateuser,uplines WHERE uplines.user_code=affiliateuser.user_code AND $reflevel='$user_code'";
        return $query ? $query : false;

    }
	
    public function get_currencies() {
        global $db_handle;
       $query = "SELECT * FROM currency";
        $result = $db_handle->runQuery($query);
        $fetched_data = $db_handle->fetchAssoc($result);
        return $fetched_data ? $fetched_data : 0;
	}
	
	public function get_user_preferred_currency($user_code) {
        global $db_handle;
       $query = "SELECT preferred_currency FROM affiliateuser WHERE user_code='$user_code'";
        $result = $db_handle->runQuery($query);
        $fetched_data = $db_handle->fetchAssoc($result);
        $preferred_currency = $fetched_data[0]["preferred_currency"];
		if (empty($preferred_currency)){
			$preferred_currency = 'USD';
		}
        return $preferred_currency ? $preferred_currency : 0;
	}

    public function set_user_preferred_currency_based_on_usercode($user_code) {
        global $db_handle;
       $query = "SELECT currency.symbol FROM affiliateuser,currency WHERE currency.country=affiliateuser.country AND affiliateuser.user_code='$user_code'";
        $result = $db_handle->runQuery($query);
        $fetched_data = $db_handle->fetchAssoc($result);
        $chosen_currency_symbol = $fetched_data[0]["symbol"];
		if (empty($chosen_currency_symbol)){
			$chosen_currency_symbol = 'USD';
		}
        return $chosen_currency_symbol ? $chosen_currency_symbol : 0;
	}
	
    public function set_user_preferred_currency_based_on_country($country) {
        global $db_handle;
       $query = "SELECT currency.symbol FROM affiliateuser,currency WHERE currency.country=affiliateuser.country AND affiliateuser.country='$country'";
        $result = $db_handle->runQuery($query);
        $fetched_data = $db_handle->fetchAssoc($result);
        $chosen_currency_symbol = $fetched_data[0]["symbol"];
		if (empty($chosen_currency_symbol)){
			$chosen_currency_symbol = 'USD';
		}
        return $chosen_currency_symbol ? $chosen_currency_symbol : 0;
	}	

    public function get_user_country($user_code) {
        global $db_handle;
       $query = "SELECT country FROM affiliateuser WHERE user_code='$user_code'";
        $result = $db_handle->runQuery($query);
        $fetched_data = $db_handle->fetchAssoc($result);
        $country = $fetched_data[0]["country"];
		if (empty($country)){
			$country = 'Nigeria';
		}
        return $country ? $country : 0;
	}
	
	public function get_user_club($user_code) {
        global $db_handle;
       $query = "SELECT clubs.club_name AS club_name FROM affiliateuser 
	   INNER JOIN clubs ON clubs.club_id=affiliateuser.clubID 
	   WHERE affiliateuser.user_code='$user_code'";
        $result = $db_handle->runQuery($query);
        $fetched_data = $db_handle->fetchAssoc($result);
        $club_name = $fetched_data[0]["club_name"];
        return $club_name ? $club_name : 'No Club yet';
	}
	
    public function get_user_no_of_downlines($user_code) {
	//this show the no of confirmed direct downlines
        global $db_handle;
       $query = "SELECT dline FROM affiliateuser WHERE user_code='$user_code' OR username='$user_code'";
        $result = $db_handle->runQuery($query);
        $fetched_data = $db_handle->fetchAssoc($result);
        $dline = $fetched_data[0]["dline"];
        return $dline ? $dline : 0;
	}	
	
    public function get_user_no_of_temp_downlines($user_code) {
	//this show the no of confirmed direct downlines
        global $db_handle;
       $query = "SELECT tmp_downline FROM affiliateuser WHERE user_code='$user_code' OR username='$user_code'";
        $result = $db_handle->runQuery($query);
        $fetched_data = $db_handle->fetchAssoc($result);
        $tmp_downline = $fetched_data[0]["tmp_downline"];
        return $tmp_downline ? $tmp_downline : 0;
	}		
	
	public function get_currency_equivalent($desired_currency,$current_currency,$amount) {
		//get the amount of level payment received at that level for the user
        global $db_handle;
		
        $query = "SELECT exchange FROM currency WHERE symbol='$current_currency'";
        $result = $db_handle->runQuery($query);
        $fetched_data = $db_handle->fetchAssoc($result);
        $current_exchange = $fetched_data[0]["exchange"];

        $query = "SELECT exchange FROM currency WHERE symbol='$desired_currency'";
        $result = $db_handle->runQuery($query);
        $fetched_data = $db_handle->fetchAssoc($result);
        $desired_exchange = $fetched_data[0]["exchange"];
		
		$desired_amount = ($desired_exchange*$amount)/$current_exchange;

        return $desired_amount ? $desired_amount : false;
    
	}
	
    public function assign_a_sponsor($user_code) {
		//check for participants that have no referrer in the system and assign them one
        global $db_handle;
		$spill_operation = new spilloverOperation();
		$new_sponsor=$spill_operation->make_random_sponsor();
		$query = "UPDATE affiliateuser SET referedby='$new_sponsor' WHERE user_code='$user_code' AND status='1'";
		$result = $db_handle->runQuery($query);

		return $result ? $result : false;

    }			

    public function get_level_payee_details($level,$user_code) {
		//check if upline qualifies to receive donation, if not admin takes donation
        global $db_handle;
		
		$next_level_payee = $this->get_level_payee($level,$user_code); //whom to pay
		$user_details = $this->view_participant_info($user_code);//get whom to pay details

        return $user_details ? $user_details : false;
    }		

     public function get_site_setting() {
        global $db_handle;

        $query = "SELECT * FROM setting WHERE sno=0";
        $result = $db_handle->runQuery($query);
        $fetched_data = $db_handle->fetchAssoc($result);
        $details = $fetched_data[0];

        return $details ? $details : false;

	 }
	
	public function uploadnews($title=NULL, $newfilename=NULL, $category_name=NULL, $newsdate=NULL, $excerpts,$content, $you_tube=NULL, $admin=NULL) {
        global $db_handle;
        $newsdate = date('Y-m-d H:i:s');
        $query = "INSERT INTO news(news_title, news_cat, excerpts, news_date, news_image, image_url,  news_content, video_url, admin) VALUES ('$title','$category_name','$excerpts','$newsdate','$newfilename', '$newfilename', '$content','$you_tube', '$admin')";
        $news_id = $db_handle->runQuery($query);
		
		$news_id = $db_handle->insertedId();
		
		$query = "INSERT INTO gallery(news_id, title, image_url) VALUES ('$news_id','$title','$newfilename')";
        $db_handle->runQuery($query);
		
        return 'News was successfully uploaded';
		
    }
	
	public function upload_weekly_highlights($title=NULL, $newfilename=NULL, $category_name=NULL, $excerpts=NULL,$content=NULL, $you_tube=NULL, $admin=NULL) {
        global $db_handle;
        $newsdate = date('Y-m-d H:i:s');
        $query = "INSERT INTO whighlights(whl_title, whl_cat, excerpts, whl_image, image_url, whl_content, video_url, admin) VALUES ('$title', '$category_name', '$excerpts', '$newfilename', '$newfilename', '$content', '$you_tube', '$admin')";
        $news_id = $db_handle->runQuery($query);
		
		$news_id = $db_handle->insertedId();
		
		$query = "INSERT INTO gallery(news_id, title, image_url) VALUES ('$news_id','$title','$newfilename')";
        $db_handle->runQuery($query);
		
        return true;
		
    }
	
	public function uploadvideo($title, $video,$excerpts) {
        global $db_handle;
        
        $query = "INSERT INTO videos(adminname,title,video,description) VALUES ('$adminname','$title','$video','$excerpts')";
        $db_handle->runQuery($query);
        return true;
    }

	public function uploadcontent($page_name, $page_location, $page_category, $title, $postedValue, $entrydate) {
        global $db_handle;
        
        $query = "INSERT INTO content(page_name,page_location,page_category, title,info,entrydate) VALUES ('$page_name','$page_location', '$page_category', '$title','$postedValue','$entrydate')";
        $db_handle->runQuery($query);
        return 'Content was successfully uploaded';
    }
	 
	 public function add_support_query($email, $phone, $subject, $category, $message) {
        global $db_handle;

		$headers  = "MIME-Version: 1.0" . "\r\n";
		$headers .= "Content-type: text/html; charset=iso-8859-1" . "\r\n";
		$headers .= "From: ". $from. "\r\n";
		$headers .= "Reply-To: ". $from. "\r\n";
		$headers .= "X-Mailer: PHP/" . phpversion();
		$headers .= "X-Priority: 1" . "\r\n"; 
		
		$site_email = $this->get_site_setting()['email'];
		
		mail($to,$subject,$message,$headers);
				
        $query = "INSERT INTO support_queries (email, phone, subject, category, message) VALUES
            ('$email', '$phone', '$subject', '$category', '$message')";
        $db_handle->runQuery($query);

        return $db_handle->affectedRows() > 0 ? true : false;
    }		

    public function get_support_team_details($country=NULL) {
		//get the contact details of support
        global $db_handle;
		
        $query = "SELECT * FROM support_details LIMIT 1";
        $result = $db_handle->runQuery($query);
        $fetched_data = $db_handle->fetchAssoc($result);
        $su_details = $fetched_data[0];

        return $su_details ? $su_details : false;
    }


	public function get_category_name() {
        global $db_handle;

        $query = "SELECT * FROM news_categories ORDER by cat_id";
        $result = $db_handle->runQuery($query);
        $fetched_data = $db_handle->fetchAssoc($result);

        return $fetched_data ? $fetched_data : false;
    }
	
	public function get_page_location() {
        global $db_handle;

        $query = "SELECT * FROM pageslocation WHERE status = '1' GROUP by page_location ORDER by page_id";
        $result = $db_handle->runQuery($query);
        $fetched_data = $db_handle->fetchAssoc($result);

        return $fetched_data ? $fetched_data : false;
    }
	
	public function get_page_info($page_name) {
        global $db_handle;

        $query = "SELECT * FROM pageslocation WHERE status = '1' AND (page_name='$page_name' OR page_id='$page_name') ORDER by page_id LIMIT 1";
        $result = $db_handle->runQuery($query);
        $fetched_data = $db_handle->fetchAssoc($result);

        return $fetched_data[0] ? $fetched_data[0] : false;
    }
	
	public function updatecontent($id, $page_name, $page_location, $title, $postedValue, $entrydate) {
        global $db_handle;
        
        $query = "UPDATE content SET page_name='$page_name',page_location='$page_location',title='$title',info='$postedValue',entrydate='$entrydate' where id='$id'";
        $db_handle->runQuery($query);
        return 'Content was successfully updated';
    }

    public function updatepage($id, $page_name, $page_alias, $page_category, $admin_id=NULL) {
        global $db_handle;
        
        $query = "UPDATE pages SET page_name='$page_name',page_alias='$page_alias',page_category='$page_category',admin_id='$admin_id' where page_id='$id'";
        $db_handle->runQuery($query);
        return 'Page was successfully updated';
    }
	
	public function deletepage($id) {
        global $db_handle;
        
        $query = "DELETE FROM pages where page_id='$id'";
        $db_handle->runQuery($query);
        return 'Page was successfully deleted';
    }
	
	public function del_page_location($location_id) {
        global $db_handle;
        
        $query = "DELETE FROM pageslocation where page_location_id='$location_id'";
        $db_handle->runQuery($query);
        return 'Page location was successfully deleted';
    }
	
	public function del_news($news_id) {
        global $db_handle;
        
        $query = "DELETE FROM news where news_id='$news_id'";
        $db_handle->runQuery($query);
        return 'News was successfully deleted';
    }
	
	public function del_whls($news_id) {
        global $db_handle;
        
        $query = "DELETE FROM whighlights where whl_id='$news_id'";
        $db_handle->runQuery($query);
        return true;
    }
	
	public function del_content($content_id) {
        global $db_handle;
        
        $query = "DELETE FROM content where id='$content_id'";
        $db_handle->runQuery($query);
        return 'Content was successfully deleted';
    }
	
	public function del_admin($admin_id) {
        global $db_handle;
        
        $query = "DELETE FROM admin where admin_id='$admin_id'";
        $db_handle->runQuery($query);
        return 'Admin was successfully deleted';
    }
	
	public function get_content_by_page_location($page,$loc) {
        global $db_handle;

        $query = "SELECT * FROM content WHERE page_name = '$page' AND page_location = '$loc' ORDER by id DESC LIMIT 1";
        $result = $db_handle->runQuery($query);
        $fetched_data = $db_handle->fetchAssoc($result);
        $info = $fetched_data[0]['info'];

        return $info ? $info : false;
    }
	
	public function get_page_info_by_id($page_id) {
        global $db_handle;

        $query = "SELECT * FROM pageslocation WHERE page_name = '$page_id' OR page_id = '$page_id'";
        $result = $db_handle->runQuery($query);
        $fetched_data = $db_handle->fetchAssoc($result)[0];

        return $fetched_data ? $fetched_data : false;
    }
	
	public function get_category_pages($pagecat){
		global $db_handle;
		$query = "SELECT * FROM pages WHERE page_category = '$pagecat'";
        $result = $db_handle->runQuery($query);
        $fetched_data = $db_handle->fetchAssoc($result);

        return $fetched_data ? $fetched_data : false;
	}
	
	public function add_page($page_name, $page_alias, $page_category, $admin_id=NULL) {
        global $db_handle;
        
        $query = "INSERT INTO pages(page_name, page_alias, page_category, admin_id) VALUES ('$page_name', '$page_alias', '$page_category', '$admin_id')";
        $db_handle->runQuery($query);
        return true;
    }
	public function get_page_names() {
        global $db_handle;

        $query = "SELECT * FROM pages WHERE status = '1' ORDER by page_id";
        $result = $db_handle->runQuery($query);
        $fetched_data = $db_handle->fetchAssoc($result);

        return $fetched_data ? $fetched_data : false;
    }

	public function get_service_page_name() {
        global $db_handle;

        $query = "SELECT * FROM services_page WHERE status = '1' GROUP by page_name ORDER by page_id";
        $result = $db_handle->runQuery($query);
        $fetched_data = $db_handle->fetchAssoc($result);

        return $fetched_data ? $fetched_data : false;
    }
	
	public function add_page_location($page_id=NULL, $page_location=NULL, $admin_id=NULL){
		global $db_handle;
		$query = "INSERT INTO pageslocation (page_id, page_location, admin_id) VALUES ('$page_id', '$page_location', '$admin_id')";
		$db_handle->runQuery($query);
        return $db_handle->affectedRows() > 0 ? true : false;

	}
	
	public function get_content_by_id($id) {
        global $db_handle;

        $query = "SELECT * FROM content WHERE id = '$id' LIMIT 1";
        $result = $db_handle->runQuery($query);
        $fetched_data = $db_handle->fetchAssoc($result);
        $info = $fetched_data[0];

        return $info ? $info : false;
    }
	// add a inbox message
    public function add_notification($notice_no=NULL, $title, $content, $notice_status, $created_by){
        global $db_handle;
		$admin_code = $_SESSION['admin_unique_code'];

			$query = "INSERT INTO notifications (subject, body, read_status, created_by) VALUES ('$title', '$content', '0', '$admin_code')";
			$db_handle->runQuery($query);
        return $db_handle->affectedRows() > 0 ? true : false;
    }

    // Get user notifications
    public function get_notifications($not_id) {
        global $db_handle;
		if ($not_id != ""){
     	   	$query = "SELECT * FROM notifications WHERE id='$not_id'";
			$result = $db_handle->runQuery($query);
			$fetched_data = $db_handle->fetchAssoc($result);
			$fetched_data = $fetched_data[0];
		}else{
			$query = "SELECT * FROM notifications";
			$result = $db_handle->runQuery($query);
			$fetched_data = $db_handle->fetchAssoc($result);
		}
        return $fetched_data ? $fetched_data : false;
    }	

    public function get_desktop_notifications($user_code) {
        global $db_handle;
      	$query = "SELECT * FROM notifications WHERE NOT FIND_IN_SET('$user_code', user_read)";
        $result = $db_handle->runQuery($query);
        $fetched_data = $db_handle->fetchAssoc($result);

        return $fetched_data ? $fetched_data : false;
    }	

    public function marked_as_read_desktop_notifications($user_code,$notify_id) {
        global $db_handle;
		$user_read = $this->get_notifications($notify_id)['user_read'];
		if ($user_read == ""){
			$new_user_read = $user_code;
		}else{
			$new_user_read = $user_read.','.$user_code;
		}
		$query = "UPDATE notifications SET user_read='$new_user_read' WHERE id = '$notify_id'";
		$db_handle->runQuery($query);
    }	

	// add a inbox message
    public function add_inbox_message($user_code, $token, $message){
        global $db_handle;

			$query = "INSERT INTO inbox (user_code, transid, message, read_status) VALUES ('$user_code', '$token', '$message', '0')";
			$db_handle->runQuery($query);
        return $db_handle->affectedRows() > 0 ? true : false;
    }	

    // Get user inbox
    public function get_inbox($user_code, $inbox_id) {
        global $db_handle;
		if ($inbox_id != ""){
     	   $query = "SELECT * FROM inbox WHERE user_code='$user_code' AND inbox_id='$inbox_id'";
		}else{
      	  $query = "SELECT * FROM inbox WHERE user_code='$user_code'";
		}
        $result = $db_handle->runQuery($query);
        $fetched_data = $db_handle->fetchAssoc($result);

       // $fetched_data = $fetched_data[0];
        return $fetched_data ? $fetched_data : false;
    }	

    public function get_unread_inbox($user_code, $limit) {
        global $db_handle;
		if ($limit != ""){
     	   $query = "SELECT * FROM inbox WHERE user_code='$user_code' AND read_status='0' order by inbox_id DESC LIMIT $limit";
		}else{
      	  $query = "SELECT * FROM inbox WHERE user_code='$user_code' WHERE read_status='0'";
		}
        $result = $db_handle->runQuery($query);
        $fetched_data = $db_handle->fetchAssoc($result);

       // $fetched_data = $fetched_data[0];
        return $fetched_data ? $fetched_data : false;
    }	

    public function get_number_of_unread_inbox($user_code) {
        global $db_handle;
      	$val = $db_handle->numRows("SELECT * FROM inbox WHERE user_code='$user_code' AND read_status='0'");
        return $val ? $val : 0;
    }	

	// Get News
    public function get_news($news_id=NULL, $limit=NULL) {
        global $db_handle;
		if ($news_id != ""){
     	   $query = "SELECT * FROM news WHERE news_id='$news_id' ";
		}else{
      	  $query = "SELECT * FROM news ";
		}
		$query .= " ORDER BY news_id DESC";
		if ($limit != ""){
			$query .= " LIMIT $limit";
		}
        $result = $db_handle->runQuery($query);
        $fetched_data = $db_handle->fetchAssoc($result);

        return $fetched_data ? $fetched_data : false;
    }
	
	 public function get_gallery($news_id=NULL, $limit=NULL) {
        global $db_handle;
		if ($news_id != ""){
     	   $query = "SELECT * FROM gallery WHERE news_id='$news_id' ";
		}else{
      	  $query = "SELECT * FROM gallery ";
		}
		$query .= " ORDER BY id DESC";
		if ($limit != ""){
			$query .= " LIMIT $limit";
		}
        $result = $db_handle->runQuery($query);
        $fetched_data = $db_handle->fetchAssoc($result);

        return $fetched_data ? $fetched_data : false;
    }
	
	
	
    public function get_client_verification_status($user_code) {
        global $db_handle;

        $query = "SELECT * FROM user_verification WHERE phone_status = '2' AND user_code = '$user_code' LIMIT 1";
        if($db_handle->numRows($query) > 0) { $level_one = true; }

        $query = "SELECT * FROM user_credential  WHERE doc_status = '111' AND user_code = '$user_code' LIMIT 1";
        if($db_handle->numRows($query) > 0) { $level_two = true; }

        $query = "SELECT * FROM user_bank WHERE is_active = '1' AND status = '2' AND user_code = '$user_code' LIMIT 1";
        if($db_handle->numRows($query) > 0) { $level_three = true; }

        if($level_three) {
            return '3';
        } elseif($level_two) {
            return '2';
        } elseif($level_one) {
            return '1';
        } else {
            return '0';
        }
    }
	
	
}

