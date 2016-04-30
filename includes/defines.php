<?php 
#Home path to easily link CSS and JS only but not includes
$_GLOBALS['home'] = 'http://'.$_SERVER['HTTP_HOST'].'/online-bulk-sms';
$home = $_GLOBALS['home']; 

$home_path = $_GLOBALS['root_path'];

#Absolute paths for includes
	#Absolute path to header - C:/wamp/www//includes/header.php 
	$path_to_header = $home_path;
	#$path_to_header = 'http://'.$_SERVER['HTTP_HOST'].'/includes/header.php';
	$path_to_header.= "/includes/header.php";
	#$path_to_header = $_GLOBALS['root'].'/includes/header.php';
	$_GLOBALS['path_to_header'] = $path_to_header;
	$header_path = $_GLOBALS['path_to_header'];
	
	#Absolute path to footer
	$path_to_footer = $home_path;
	$path_to_footer .= "/includes/footer.php";
	$_GLOBALS['path_to_footer'] = $path_to_footer;
	$footer_path = $_GLOBALS['path_to_footer'];
	
	#Absolute path to functions
	$path_to_functions = $home_path;
	$path_to_functions .= "/includes/functions.php";
	$_GLOBALS['path_to_functions'] = $path_to_functions;
	$functions_path = $_GLOBALS['path_to_functions'];
	
	#Absolute path to db_connect
	$path_to_db_connect = $home_path;
	$path_to_db_connect .= "/includes/connect.php";
	$_GLOBALS['path_to_db_connect'] = $path_to_db_connect;
	$db_connect_path = $_GLOBALS['path_to_db_connect'];
?>