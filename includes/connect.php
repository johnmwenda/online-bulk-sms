<?php 
$connect = mysqli_connect('localhost','root','phplove');
if(!$connect){
	die('Could not connect to the server'.mysqli_connect_error());
}
$select_db = mysqli_select_db($connect,'online-sms');
if(!$select_db){
	die('Could not connect select database'.mysqli_error());
}
?>