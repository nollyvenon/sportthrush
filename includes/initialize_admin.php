<?php
if(!isset($_SESSION)){
    session_start();
}
error_reporting(E_ALL); ini_set('display_errors', 1);
$con = new mysqli("localhost", "root", "", "footballfansnetwork");
if ($con->connect_errno) {
    echo "Failed to connect to MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
}

defined('DB_SERVER') ? null : define("DB_SERVER", "localhost");
defined('DB_USER')   ? null : define("DB_USER", "root");
defined('DB_PASS')   ? null : define("DB_PASS", "");

defined('DB_NAME')   ? null : define("DB_NAME", "footballfansnetwork");
// Development settings
defined('DS') ? NULL : define('DS', DIRECTORY_SEPARATOR);
defined('SITE_ROOT') ? NULL : define('SITE_ROOT', 'C:'.DS.'wamp'.DS.'www'.DS.'footballfannetwork');
defined('LIB_PATH') ? NULL : define('LIB_PATH', SITE_ROOT.DS.'includes');

// Load basic functions so that everything after can use them
require_once(LIB_PATH.DS."malek_func_library_1.0.0.php");
require_once(LIB_PATH.DS."functions.php");

// Load core objects
require_once(LIB_PATH.DS."session_admin.php");
require_once(LIB_PATH.DS."class_database.php");
require_once(LIB_PATH.DS."class_system.php");

// Load other assets
require_once(LIB_PATH.DS."PHPMailer".DS."PHPMailerAutoload.php");
include_once (LIB_PATH.DS."class_client_operation.php");
require_once(LIB_PATH.DS."class_admin.php");
$client_operation = new clientOperation();

