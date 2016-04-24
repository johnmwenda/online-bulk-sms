<?php 
#Home path to easily link CSS and JS only but not includes
$_GLOBALS['home'] = 'http://'.$_SERVER['HTTP_HOST'].'/online-bulk-sms';
$home = $_GLOBALS['home']; 

#Absolute paths for includes
	#Absolute path to header - C:/wamp/www//online-bulk-sms/includes/header.php 
	$path_to_header = $_SERVER['DOCUMENT_ROOT'];
	$path_to_header .= "/online-bulk-sms/includes/header.php";
	$_GLOBALS['path_to_header'] = $path_to_header;
	$header_path = $_GLOBALS['path_to_header'];
	
	#Absolute path to footer
	$path_to_footer = $_SERVER['DOCUMENT_ROOT'];
	$path_to_footer .= "/online-bulk-sms/includes/footer.php";
	$_GLOBALS['path_to_footer'] = $path_to_footer;
	$footer_path = $_GLOBALS['path_to_footer'];
	
	#Absolute path to functions
	$path_to_functions = $_SERVER['DOCUMENT_ROOT'];
	$path_to_functions .= "/online-bulk-sms/includes/functions.php";
	$_GLOBALS['path_to_functions'] = $path_to_functions;
	$functions_path = $_GLOBALS['path_to_functions'];
	
	#Absolute path to db_connect
	$path_to_db_connect = $_SERVER['DOCUMENT_ROOT'];
	$path_to_db_connect .= "/online-bulk-sms/includes/connect.php";
	$_GLOBALS['path_to_db_connect'] = $path_to_db_connect;
	$db_connect_path = $_GLOBALS['path_to_db_connect'];
?>