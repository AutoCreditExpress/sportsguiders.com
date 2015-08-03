<?php
/**
* Created by PhpStorm.
* User: bslaght123
* Date: 6/27/14
* Time: 12:55 PM
*/

//Asked to add the following line by JSimpson to stop health checks from timing out.
//This may be controlled at the server level now, but this has not been confirmed.
ini_set('default_socket_timeout', 60000);

//Global Variable Declarations
$i = str_replace(":80", "", $_SERVER['HTTP_HOST']);

/**
* Determines if we are local or on live
*/
switch ($i) {
case "sportsguiders.localhost.com":
$docPath = "/wamp/www/sportsguiders.com/";
$webPath = "http://sportsguiders.localhost.com/";

//ACE Dealer Services DB
$dbhost = "localhost";
$dbname = "sportsguiders"; //Main DB Name
$dbuser = "root"; //Main DB User
$dbpass = ""; //main DB Password

break;

    default:
        $docPath = "/home/sglogin/public_html/";
        $webPath = "http://www.sportsguiders.com/";

//ACE Dealer Services DB
        $dbhost = "localhost";
        $dbname = "sportsguiders_main"; //Main DB Name
        $dbuser = "sgfantasy"; //Main DB User
        $dbpass = "*DE5bBPa%.@Z"; //main DB Password
        break;

}
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
//
//                                                 PLEASE NOTE:
//      There are two connection for each database because the code is in transition from mysql_connect() to PDO (BJS)
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////


//PDO DB Connection for modern code
try{
	$db = new PDO('mysql:host=' . $dbhost . ';dbname=' . $dbname . '', '' . $dbuser . '', '' . $dbpass . '');
	$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	$db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
}catch(PDOException $e){
	echo $e;
}

//Checks to see if the class path has been defined
if( !defined('SG_CLASSPATH') ) {
    define('SG_CLASSPATH', '');
}

require_once($docPath.'classes/framework/autoload/Autoloader.php');

$sg_autoloader = new Autoloader($docPath . SG_CLASSPATH);
spl_autoload_register(array($sg_autoloader, 'autoload'));

include('login_config.php');

$login = new Login();
?>