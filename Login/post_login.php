<?php

include("../config.php");
	    if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

	$username = $_POST['username'];
	$password = $_POST['password'];
	$type = $_POST['type'];

	$username = stripcslashes($username);
	$password = stripcslashes($password);
	$username = mysqli_real_escape_string($db,$username);
	$password = mysqli_real_escape_string($db,$password);
	$type = mysqli_real_escape_string($db,$type);


	$password = md5($password);


	$result = mysqli_query($db,"SELECT * FROM $type WHERE username = '$username' AND password = '$password'") or die("Failed".mysqli_error($db));

	$row = mysqli_fetch_array($result, MYSQLI_ASSOC);

	if ($row['username'] == $username && $row['password'] == $password){
		$_SESSION['user'] =  $username;
		$_SESSION['type'] =  $type;
		 if($type== 'students')
		{	echo "YEs";
			 header("Location: http://{$_SERVER['HTTP_HOST']}/Student/home.php");
			exit();
		}
		//else
		// {
		// 	header("Location : Student/home.php");
		// }
	}
	else{
		echo "Login Failed";
	}


	?>