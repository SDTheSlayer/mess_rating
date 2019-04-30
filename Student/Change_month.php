<?php

	include("../config.php");
	if (session_status() == PHP_SESSION_NONE) {
	    session_start();
	}
	$_SESSION['month']=$_POST['month'];
	$_SESSION['year']=$_POST['year'];
	$_SESSION['tabstudent']=2;
	header("Location: http://{$_SERVER['HTTP_HOST']}/Student/home.php");
	exit();

?>