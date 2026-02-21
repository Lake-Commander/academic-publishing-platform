<?php
ob_start();
session_start();

//set timezone
date_default_timezone_set('Europe/London');

//database credentials
define('DBHOST','');
define('DBUSER','');
define('DBPASS','');
define('DBNAME','');

try {

	//create PDO connection
$db = new PDO("mysql:host=localhost;dbname=dbname_here;charset=utf8", "username_here", "password_here");
	$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

} catch(PDOException $e) {
	//show error
    echo '<p class="bg-danger">'.$e->getMessage().'</p>';
    exit;
}

?>
