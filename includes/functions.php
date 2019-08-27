<?php

require_once 'functions_validation.php';
require_once 'functions_status_messages.php';

// Reporting E_NOTICE can be good too (to report uninitialized
// variables or catch variable name misspellings ...)
//error_reporting( E_ERROR | E_WARNING | E_PARSE );

// Set the custom Error handler
set_error_handler("customError");

/**
 * String zeros from date
 * @param type $marked_string
 * @return type mixed $clean_string
 */
function strip_zeros_from_date( $marked_string="" ) {
  // first remove the marked zeros
  $no_zeros = str_replace('*0', '', $marked_string);
  // then remove any remaining marks
  $cleaned_string = str_replace('*', '', $no_zeros);
  return $cleaned_string;
}

/**
 * Redirects to a specified location
 * @param type $location
 */
function redirect_to( $location = NULL ) {
  if ($location != NULL) {
    header("Location: {$location}");
    exit;
  }
}

/**
 * 
 * @param type $message
 * @return string
 */
function output_message($message="") {
  if (!empty($message)) { 
    return "<p class=\"message\">{$message}</p>";
  } else {
    return "";
  }
}

/**
 * 
 * @param type $class_name
 */
function __autoload($class_name) {
    $class_name = strtolower($class_name);
    $path = LIB_PATH.DS."{$class_name}.php";
    if(file_exists($path)) {
    require_once($path);
  } else { 
      die("The file {$class_name}.php could not be found."); 
      }
}

/**
 * 
 * @param type $action
 * @param type $message
 */
function log_action($action, $message="") {
    $logfile = SITE_ROOT.DS.'admin-logs'.DS.'log.txt';
    $new = file_exists($logfile) ? false : true;
    if($handle = fopen($logfile, 'a')) { // append
        $timestamp = strftime("%Y-%m-%d %H:%M:%S", time());
        $content = "{$timestamp} | {$action}: {$message}\n";
        fwrite($handle, $content);
        fclose($handle);
        if($new) { chmod($logfile, 0755); }
    } else {
        echo "Could not open log file for writing.";
    }
}

/**
 * 
 * @param type $datetime
 * @return type
 */
function datetime_to_text($datetime="") {
  $unixdatetime = strtotime($datetime);
  return strftime("%B %d, %Y at %I:%M %p", $unixdatetime);
}

function datetime_to_text2($datetime="") {
  $unixdatetime = strtotime($datetime);
  return strftime("%B %d, %Y", $unixdatetime);
}

function date_to_text($datetime="") {
  $unixdatetime = strtotime($datetime);
  return strftime("%B %d, %Y", $unixdatetime);
}


// calculate time since an action occured
function time_since($since) {
    $since = time() - strtotime($since);
    $chunks = array(
        array(31536000, 'year'), //60 * 60 * 24 * 365
        array(2592000, 'month'), //60 * 60 * 24 * 30
        array(604800, 'week'), //60 * 60 * 24 * 7
        array(86400, 'day'), //60 * 60 * 24
        array(3600, 'hour'), //60 * 60
        array(60, 'minute'),
        array(1, 'second')
    );

    for ($i = 0, $j = count($chunks); $i < $j; $i++) {
        $seconds = $chunks[$i][0];
        $name = $chunks[$i][1];
        if (($count = floor($since / $seconds)) != 0) {
            break;
        }
    }

    $print = ($count == 1) ? '1 '.$name : "$count {$name}s";
    $print = $print . " ago";
    return $print;
}

function feedback_message($action_outcome) {
    if(is_bool($action_outcome) && $action_outcome === true) {
        $feedback = "<p class=\"form_msg\">";
        $feedback .= "<img src=\"../../public/images/okay.png\" />";
        $feedback .= " Good. The performed operation was successful.";
        $feedback .= "</p>";
        return $feedback;
    } elseif (is_array($action_outcome)) {
        $feedback = "<p class=\"form_err\">";
        $feedback .= "<img src=\"../../public/images/error.png\" />";
        $feedback .= " Oops! The performed operation failed. Details below.";
        require_once ('interpret_error.php');
        
        foreach($action_outcome as $values) {
            if(array_key_exists($values, $error_list)) {
                $feedback .= " <br /> -- " . $error_list[$values];
            }
        }
        
        $feedback .= "</p>";
        return $feedback;
    }
}

/**
 * This function prepares a custome error message
 * It has been set with the set_error_handler function in the
 * initialize.php file.
 * 
 * @param type $errno
 * @param type $errstr
 * @param type $errfile
 * @param type $errline
 */
function customError($errno, $errstr, $errfile, $errline) {
    $errno = error_report_levels($errno);
    $log = "Error: [$errno] $errstr \n [$errline] $errfile";
    //error_log($log, 1, "John Azuka<onyxdatasystems@gmail.com>", "From: Instafxng <support@instafxng.com>");
} 

// This function adds some user friendlyness
// Gives the previous call date a green color if the date is today's
// date, i.e. the client has been called today, it makes it easy to
// know where the User stopped if by chance he leaves his desk, this
// makes it easy to quickly locate where he stopped.
function color_code($date) {
    $today = date('Y-m-d');
    if ($date == $today) {
        $css = "style=\"color: #007A29; font-weight: bold;\"";
    } else {
        $css = "style=\"color: #990000;\"";
    }
    return $css;    
}

$key = 'bRuD5WYw5wd0rdHR9yLlM6wt2vteuiniQBqE70nAuhU=';

function encrypt($data, $key=NULL){
   // Remove the base64 encoding from our key
    $encryption_key = base64_decode($key);
    // Generate an initialization vector
    $iv = openssl_random_pseudo_bytes(openssl_cipher_iv_length('aes-256-cbc'));
    // Encrypt the data using AES 256 encryption in CBC mode using our encryption key and initialization vector.
    $encrypted = openssl_encrypt($data, 'aes-256-cbc', $encryption_key, 0, $iv);
    // The $iv is just as important as the key for decrypting, so save it with our encrypted data using a unique separator (::)
    return base64_encode($encrypted . '::' . $iv);
}

function decrypt($data, $key=NULL){
    // Remove the base64 encoding from our key
    $encryption_key = base64_decode($key);
    // To decrypt, split the encrypted data from our IV - our unique separator used was "::"
    list($encrypted_data, $iv) = explode('::', base64_decode($data), 2);
    return openssl_decrypt($encrypted_data, 'aes-256-cbc', $encryption_key, 0, $iv);
}

/// check the below functions much later

function is_odd($n){
    return (boolean) ($n % 2);
}
//echo is_odd(5);
function limit_text($text, $limit) {
      if (str_word_count($text, 0) > $limit) {
          $words = str_word_count($text, 2);
          $pos = array_keys($words);
          $text = substr($text, 0, $pos[$limit]) . '...';
      }
      return $text;
    }
	
function secondsToTime($seconds) {
    $dtF = new DateTime("@0");
    $dtT = new DateTime("@$seconds");
    //return $dtF->diff($dtT)->format('%a days, %h hours, %i minutes and %s seconds');
	return $dtF->diff($dtT)->format('%a days, %h hours, %i minutes');
	
}
	

function madSafety($string) {
    $string = stripslashes($string);
    $string = strip_tags($string);
    $string = mysql_real_escape_string($string);
    return $string;
}

function mail_attachment($filename, $path, $mailto, $from_mail, $from_name, $replyto, $subject, $message) {
    $file = $path.$filename;
    $file_size = filesize($file);
    $handle = fopen($file, "r");
    $content = fread($handle, $file_size);
    fclose($handle);
    $content = chunk_split(base64_encode($content));
    $uid = md5(uniqid(time()));
    $name = basename($file);
    $header = "From: ".$from_name." <".$from_mail.">\r\n";
    $header .= "Reply-To: ".$replyto."\r\n";
    $header .= "MIME-Version: 1.0\r\n";
    $header .= "Content-Type: multipart/mixed; boundary=\"".$uid."\"\r\n\r\n";
//(THIS ENTIRE LINE HAS BEEN REMOVED)
    $nmessage = "--".$uid."\r\n";
    $nmessage .= "Content-type:text/plain; charset=iso-8859-1\r\n";
    $nmessage .= "Content-Transfer-Encoding: 7bit\r\n\r\n";
    $nmessage .= $message."\r\n\r\n";
    $nmessage .= "--".$uid."\r\n";
    $nmessage .= "Content-Type: application/octet-stream; name=\"".$filename."\"\r\n"; 
    $nmessage .= "Content-Transfer-Encoding: base64\r\n";
    $nmessage .= "Content-Disposition: attachment; filename=\"".$filename."\"\r\n\r\n";
    $nmessage .= $content."\r\n\r\n";
    $nmessage .= "--".$uid."--";
error_reporting(E_ALL);
    if (mail($mailto, $subject, $nmessage, $header)) {
       // echo "Mail Sent Successfully to " . $mailto ."<br/>"; // or use booleans here
    } else {
       // echo "Mail NOT Sent to " .$mailto ."<br/>";
    }
}

function truncate_str($string, $limit) {
	if (strlen($string) <= $limit)
	{
		$string = $string; // Do nothing
	}
 	else
	{
		$string = wordwrap($string, $limit);
		$string = substr($string, 0, strpos($string, "\n"));
		$string .= "...";
	}
	return $string;
}	

function formatMoney($number, $fractional=false) {
    if ($fractional) {
        $number = sprintf('%.2f', $number);
    }
    while (true) {
        $replaced = preg_replace('/(-?\d+)(\d\d\d)/', '$1,$2', $number);
        if ($replaced != $number) {
            $number = $replaced;
        } else {
            break;
        }
    }
    return $number;
}

function generate_sms_code() {
    $template   = '999999';
    $k = strlen($template);
    $sernum = '';
    for ($i = 0; $i < $k; $i++) {
        switch($template[$i]) {
            case 'X': $sernum .= strtolower(chr(rand(65, 90))); break;
            case '9': $sernum .= rand(0, 9); break;
        }
    }
    return $sernum;
}

function generate_content_url($content_title) {
    // Convert to lower case
    $content_title = strtolower($content_title);
    
    // Allow only alphanumeric characters
    $content_title = preg_replace("/[^A-Za-z0-9 ]/", '', $content_title);
    
    // List of filtered words
    $wordlist = array('or', 'and', 'where', 'of', 'at', 'a', 'the', 'in', 'for', 'with', 'to');
    foreach ($wordlist as &$word) {
        $word = '/\b' . preg_quote($word, '/') . '\b/';
    }
    
    // Remove filtered words
    $content_title = preg_replace($wordlist, '', $content_title);
    
    // Remove multiple spaces
    $content_title = preg_replace(array('/\s{2,}/', '/[\t\n]/'), ' ', $content_title);
        
    $limit = 7; // Limit to seven words
    if (str_word_count($content_title, 0) > $limit) {
        $words = str_word_count($content_title, 2);
        $pos = array_keys($words);
        $content_title = substr($content_title, 0, $pos[$limit]);
    }
    
    $content_title = str_replace(' ', '-', trim($content_title));
    
    return $content_title;
}

function toDateTime($unixTimestamp) {
    return date("Y-m-d H:i:s", $unixTimestamp);
}

function generateHash($password) {
    if (defined("CRYPT_BLOWFISH") && CRYPT_BLOWFISH) {
        $salt = '$2y$11$' . substr(md5(uniqid(rand(), true)), 0, 22);
        return crypt($password, $salt);
    }
}

function verify($password, $hashedPassword) {
    return crypt($password, $hashedPassword) == $hashedPassword;
}

function is_localhost() {
    $whitelist = array( '127.0.0.1', '::1' );
    if( in_array( $_SERVER['REMOTE_ADDR'], $whitelist) )
        return true;
}

 function remove_comma($a) {

     if(is_numeric($a)) {

     $a = preg_replace('/[^0-9,]/s', '', $a);
     }

     return $a;

}

function categoryParentChildTree($parent = 0, $spacing = '', $category_tree_array = '') {
	global $db_handle;
	$parent 		= $db_handle->sanitizePost($parent);
	if (!is_array($category_tree_array))
		$category_tree_array = array();
 
	$sqlCategory = "SELECT Id,username,parent_id FROM affiliateuser WHERE parent_id = $parent ORDER BY Id ASC";
	$resCategory=$db_handle->runQuery($sqlCategory);
	
	if ($resCategory->num_rows > 0) {
		while($rowCategories = $resCategory->fetch_assoc()) {
			$category_tree_array[] = array("Id" => $rowCategories['Id'], "username" => $spacing . $rowCategories['username']);
			$category_tree_array = categoryParentChildTree($rowCategories['Id'], '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;'.$spacing . '-->&nbsp;', $category_tree_array);
		}
	}
	return $category_tree_array;
}

function functionallyEmpty($o)
{
  if (empty($o)) return true;
  else if (is_numeric($o)) return false;
  else if (is_string($o)) return !strlen(trim($o)); 
  else if (is_object($o)) return functionallyEmpty((array)$o);

  // If it's an array!
  foreach($o as $element) 
    if (functionallyEmpty($element)) continue; 
    else return false; 

  // all good.
  return true;
}
?>