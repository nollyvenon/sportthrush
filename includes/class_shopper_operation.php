<?php
class shopperOperation {
    private $client_data;
    
    public function __construct($ifx_account = '', $email_address = '') {
        if(isset($ifx_account) && !empty($ifx_account)) {
            $this->client_data = $this->set_client_data($ifx_account);
        }
    }
	
    public function get_content_by_id($id) {
        global $db_handle;

        $query = "SELECT * FROM content WHERE id = '$id' LIMIT 1";
        $result = $db_handle->runQuery($query);
        $fetched_data = $db_handle->fetchAssoc($result);
        $info = $fetched_data[0];

        return $info ? $info : false;
    }

	public function new_unique_id($table,$id,int $length=NULL){
		global $db_handle;
		unique:
            if($length==""){
				$opcode = rand_string(20);
			}else{
				$opcode = rand_string($length);
			}
            if($db_handle->numRows("SELECT $id FROM $table WHERE $id = '$opcode'") > 0) { goto unique; };
		return $opcode;
	}
	
	public function new_withdrawal($user_code,$amount, $currency, $pay_account){
		global $db_handle;
		$cur_time = date('Y-m-d H:i:s');
		$sess_code = $this->new_unique_id('withdrawals','sess_code','6');
		
		$query = "INSERT INTO withdrawals (sess_code, amount, user_code, trans_time, currency, pay_account) VALUES "
                . "('$sess_code', '$amount', '$user_code', '$cur_time', '$currency', '$pay_account')";
        $db_handle->runQuery($query);
        return true;
	}
	
	public function approve_withdrawal($withdrawal_id){
		global $db_handle;
		$query = "UPDATE withdrawals SET status='7' WHERE withd_id='".$withdrawal_id."'";
        $db_handle->runQuery($query);
	
}

		public function decline_withdrawal($withdrawal_id){
		global $db_handle;
		$query = "UPDATE withdrawals SET status='6' WHERE withd_id='".$withdrawal_id."'";
        $db_handle->runQuery($query);
	
		}

	public function new_payment($sess_code,$amount, $email,$fullname=NULL, $currency){
		global $db_handle;
		
		$query = "INSERT INTO carrrt (sess_code, amount, email, fullname, currency) VALUES "
                . "('$sess_code', '$amount', '$email', '$fullname', '$currency')";
        $db_handle->runQuery($query);
        return true;
	}
	
	public function get_payment_info($sess_code) {
        global $db_handle;

        $query = "SELECT * FROM carrrt WHERE (sess_code='$sess_code' OR id='$sess_code') ORDER by sess_code LIMIT 1";
        $result = $db_handle->runQuery($query);
        $fetched_data = $db_handle->fetchAssoc($result);

        return $fetched_data[0] ? $fetched_data[0] : false;
    }

    public function get_currency_info($currency_code) {
        global $db_handle;

        $query = "SELECT * FROM currency WHERE (currency_code='$currency_code' OR id='$currency_code') ORDER by id LIMIT 1";
        $result = $db_handle->runQuery($query);
        $fetched_data = $db_handle->fetchAssoc($result);

        return $fetched_data[0] ? $fetched_data[0] : false;
    }

	public function pay_for_club_ebook($user_code){
		global $db_handle;
		$client_operation = new clientOperation();
		$user_details = $client_operation->view_participant_info($user_code);
			$account_balance = (int)$user_details['account_balance'];
		if ($account_balance>=20){
			$new_account_balance = $account_balance - 20;
			$query = "UPDATE affiliateuser SET ebook_bought='1',account_balance='$new_account_balance' WHERE user_code='".$user_code."'";
        	$db_handle->runQuery($query);
			$_SESSION['message_success'] = 'Ebook purchase was successful.';
			return true;
		}else{
			$_SESSION['message_error'] = 'You have insufficient balance to claim the ebook.';
			return false;
		}
	}
			
	public function routed_payment($reference,$trxref, $status, $amount, $email, $unique_id=NULL, $club=NULL){
		global $db_handle;
		$client_operation = new clientOperation();
		$upline_operation = new uplineOperation();
		$user_details = $client_operation->view_participant_info($email);
			$referedby = $user_details['referedby'];
			$user_code = $user_details['user_code'];
			$username = $user_details['username'];
		$new_account_balance = $user_details['account_balance'] + 20;
		if ($status==1){//verified payment
			$query = "UPDATE affiliateuser SET level='1', account_balance='$new_account_balance', clubID='$club' WHERE email='".$email."'";
        	$db_handle->runQuery($query);
			
			$new_referedby_dline = $client_operation->get_user_no_of_downlines($referedby)+1;
			
			$query1 = "INSERT INTO payments SET ref_no='".$reference."', transactionID='".$trxref."',  status='$status', amount='".$amount."',email='".$email."', userID='".$user_code."', sessionID='".$unique_id."', clubID='".$club."'";
			$db_handle->runQuery($query1);
			
			$query2 = "UPDATE affiliateuser SET dline='$new_referedby_dline' WHERE username='".$referedby."'"; //Iincrease the downline count of the upline
        	$db_handle->runQuery($query2);
			
		}else{//unverified payment
			$query1 = "INSERT INTO payments SET ref_no='".$reference."', transactionID='".$trxref."',  status='$status', amount='".$amount."', email='".$email."', userID='".$user_code."', sessionID='".$unique_id."', clubID='".$club."'";
			$db_handle->runQuery($query1);
		}
		
		$query = "UPDATE carrrt SET ordered='1' where code='$unique_id'";
        $db_handle->runQuery($query);
		
		$upline_operation->pay_level_upline($username, $user_code);
        return true;
	}
	


}//end class

