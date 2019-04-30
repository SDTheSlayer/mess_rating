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

	
$result1 = mysqli_query($db,"SELECT * FROM mess_manager WHERE username = '$username' AND mess <> '$mess'") or die("Failed".mysqli_error($db));

	$row1 = mysqli_fetch_array($result1, MYSQLI_ASSOC);

	



	if ($row1['username'] == $username){
		echo "There already exist this username";


		// you are in the wrong page 
	}

	else{



		if (mysqli_query($db, "UPDATE  mess_manager SET username = '$username', password = '$password', name = '$name' WHERE mess = '$mess'")) {
		    echo "Record Updated Successfully ";
		
		} 

	}

	
	?>