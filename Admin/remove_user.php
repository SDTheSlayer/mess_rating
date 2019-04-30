<?php
include("config.php");

	$username = $_POST['username'];
	$username = stripcslashes($username);
	$username = mysqli_real_escape_string($db,$username);
	

	$result = mysqli_query($db,"SELECT * FROM students WHERE username = '$username'") or die("Failed".mysqli_error($db));

	$row = mysqli_fetch_array($result, MYSQLI_ASSOC);

	if ($row['username'] == $username){

		if (mysqli_query($db, "DELETE FROM students WHERE username = '$username'")) {
		    echo "Record Deleted Successfuly";
		


		} 
	}

	else{




		echo "There exists no user with this roll number";




	}




?>