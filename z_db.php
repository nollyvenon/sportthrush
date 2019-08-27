<?php
error_reporting(E_ALL); ini_set('display_errors', 1);
// Initialize session
if(!isset($_SESSION)){
    session_start();
}

$con = new mysqli("localhost", "root", "", "footballfansnetwork");
if ($con->connect_errno) {
    echo "Failed to connect to MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
}

$forum_con = new mysqli("localhost", "root", "", "footballfansnetwork_talkpoint");
if ($forum_con->connect_errno) {
    echo "Failed to connect to MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
}

$IP = $_SERVER['HTTP_HOST'];        // Obtains the IP address
if ($IP=="::1"){
	$IP = 'localhost';
}

defined('DB_SERVER') ? null : define("DB_SERVER", "localhost");
defined('DB_USER')   ? null : define("DB_USER", "root");
defined('DB_PASS')   ? null : define("DB_PASS", "");

defined('DB_NAME')   ? null : define("DB_NAME", "footballfansnetwork");

defined('DB_USER')   ? null : define("DB_USER2", "root");
defined('DB_PASS')   ? null : define("DB_PASS2", "");
defined('DB_NAME')   ? null : define("DB_NAME2", "footballfansnetwork_talkpoint");


defined('DS') ? NULL : define('DS', DIRECTORY_SEPARATOR);
defined('SITE_ROOT') ? NULL : define('SITE_ROOT', 'C:'.DS.'wamp'.DS.'www'.DS.'footballfannetwork');
defined('LIB_PATH') ? NULL : define('LIB_PATH', SITE_ROOT.DS.'includes');
defined('SITE_URL') ? NULL : define('SITE_URL', "http://".$IP."/footballfannetwork");

require_once("includes/class_database.php");
//require_once("includes/class_system.php");
require_once("includes/malek_func_library_1.0.0.php");
require_once("includes/functions.php");
include_once ("includes/class_client_operation.php");
//include_once ("includes/class_downline_operation.php");
//include_once ("includes/class_upline_operation.php");
include_once ("includes/class_spillover_operation.php");
require_once("includes/PHPMailer/PHPMailerAutoload.php");
require_once("includes/session_client.php");
//require_once("includes/class_admin.php");require_once("includes/session_admin.php");

$user_code=$_SESSION['client_unique_code'];
$client_operation = new clientOperation();
$user_detail = $client_operation->view_participant_info($user_code);
extract($user_detail);
$fname = $first_name.' '.$middle_name.' '.$last_name;
//$pkname = $client_operation->get_packg_name($pcktaken);
$header = $client_operation->get_header_settings();
$settings = $client_operation->get_settings();
$spill_operation = new spilloverOperation();
//$upline_operation = new uplineOperation();
$site_name = "Football Fans Network";
?>