<?php

include("../config.php");
	    if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

	$username=$_SESSION['user'];
	$old_password = $_POST['old_password'];
	$new_password = $_POST['new_password'];

	$old_password = stripcslashes($old_password);
	$new_password = stripcslashes($new_password);
	$old_password = mysqli_real_escape_string($db,$old_password);
	$new_password = mysqli_real_escape_string($db,$new_password);

	$old_password = md5($old_password);
	$new_password = md5($new_password);

	$result = mysqli_query($db,"SELECT * FROM mess_manager WHERE username = '$username' AND password = '$old_password'") or die("Failed".mysqli_error($db));

	$row = mysqli_fetch_array($result, MYSQLI_ASSOC);

	if ($row['username'] == $username && $row['old_password'] == $password){
		mysqli_query($db,"UPDATE mess_manager SET password = '$new_password' WHERE username = '$username'") or die("Failed".mysqli_error($db));
		$_SESSION['msg']="Password Updated";
	}	
	else{
		$_SESSION['msg']="Old Password is incorrect";
	}
	$_SESSION['tabmess']=2;
	header("Location: http://{$_SERVER['HTTP_HOST']}/MessManager/home.php");
	exit();

?>