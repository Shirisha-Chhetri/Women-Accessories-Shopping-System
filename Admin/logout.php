<?php
	session_start();
	//session related to username from login
	if (isset($_SESSION['user'])){
		session_destroy();
		header("location:../admin/login.php");
	}
?>