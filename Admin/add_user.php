<?php

include("config.php");
	$username = $_POST['username'];
	$password = $_POST['password'];

	$mess = $_POST['mess'];
	$name = $_POST['name'];
	$hostel = $_POST['hostel'];


	$username = stripcslashes($username);
	$password = stripcslashes($password);
	$mess = stripcslashes($mess);
	$name = stripcslashes($name);

	// $hostel = stripcslashes($hostel);



	$username = mysqli_real_escape_string($db,$username);
	$password = mysqli_real_escape_string($db,$password);

	$mess = mysqli_real_escape_string($db,$mess);
	$name = mysqli_real_escape_string($db,$name);
	// $hostel = mysqli_real_escape_string($db,$hostel);




	$password = md5($password);







	// mysqli_connect("localhost","root","");
	// mysqli_select_db("mess_rating");

	$result = mysqli_query($db,"SELECT * FROM students WHERE username = '$username'") or die("Failed".mysqli_error($db));

	$row = mysqli_fetch_array($result, MYSQLI_ASSOC);





	if ($row['username'] == $username){
		echo "There exists a user already with this Roll Number";


		// you are in the wrong page 
	}

	else{



		if (mysqli_query($db, "INSERT INTO students (username, password, mess, next_mess, hostel, name)
VALUES ('$username', '$password', '$mess', '$mess', '$mess', '$name')")) {
		    echo "New record created successfully";
		


		}




	}

	
	?>