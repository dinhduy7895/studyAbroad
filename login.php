<?php require 'connect.php'; ?>
<?php 
	session_start();
	$email = $_POST['email'];
	$password = md5($_POST['pass']);
	

?>