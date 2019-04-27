<?php

include("config.php");
	$username = $_POST['username'];
	$password = $_POST['password'];
	$type = $_POST['type'];

	$username = stripcslashes($username);
	$password = stripcslashes($password);
	$username = mysqli_real_escape_string($db,$username);
	$password = mysqli_real_escape_string($db,$password);
	$type = mysqli_real_escape_string($db,$type);


	$password = md5($password);


	// mysqli_connect("localhost","root","");
	// mysqli_select_db("mess_rating");

	$result = mysqli_query($db,"SELECT * FROM $type WHERE username = '$username' AND password = '$password'") or die("Failed".mysqli_error($db));

	$row = mysqli_fetch_array($result, MYSQLI_ASSOC);

	if ($row['username'] == $username && $row['password'] == $password){
		echo "Login Success wlecome ".$row['name'];
	}
	else{
		echo "Login Failed";
	}


	?>