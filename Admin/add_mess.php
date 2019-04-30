<?php

include("config.php");
	$username = $_POST['username'];
	$password = $_POST['password'];

	$mess = $_POST['mess'];
	$name = $_POST['name'];


	$username = stripcslashes($username);
	$password = stripcslashes($password);
	$mess = stripcslashes($mess);
	$name = stripcslashes($name);




	$username = mysqli_real_escape_string($db,$username);
	$password = mysqli_real_escape_string($db,$password);

	$mess = mysqli_real_escape_string($db,$mess);
	$name = mysqli_real_escape_string($db,$name);



	$password = md5($password);







	// mysqli_connect("localhost","root","");
	// mysqli_select_db("mess_rating");

	$result = mysqli_query($db,"SELECT * FROM mess_manager WHERE mess = '$mess'") or die("Failed".mysqli_error($db));

	$row = mysqli_fetch_array($result, MYSQLI_ASSOC);

$result1 = mysqli_query($db,"SELECT * FROM mess_manager WHERE username = '$username'") or die("Failed".mysqli_error($db));

	$row1 = mysqli_fetch_array($result1, MYSQLI_ASSOC);




	if ($row1['username'] == $username){
		echo "There already exist this username";


		// you are in the wrong page 
	}

	else if ($row['mess'] == $mess){
		echo "There already exists a mess already with the mess name";

	}
	else{



		if (mysqli_query($db, "INSERT INTO mess_manager (username, password, mess, name)
VALUES ('$username', '$password', '$mess', '$name')")) {
		    echo "New record created successfully";
		
		} 
	}

	
	?>