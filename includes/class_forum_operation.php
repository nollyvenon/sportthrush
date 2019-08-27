<?php
class forumOperation {
    private $client_data;
    
    public function __construct($ifx_account = '', $email_address = '') {
        if(isset($ifx_account) && !empty($ifx_account)) {
            $this->client_data = $this->set_client_data($ifx_account);
        }
    }
	
	public function get_forum_settings(){
		global $db_handle2;
		 $query = "SELECT * FROM mlf2_settings";
		$result = $db_handle2->runQuery($query);
        $fetched_data = $db_handle2->fetchArray($result);
        $forum_settings = $fetched_data;
        
        return $forum_settings;
		
	}
	
	
}
$forum_operation = new forumOperation();
