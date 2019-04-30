<?php



   if (session_status() == PHP_SESSION_NONE) {
      session_start();
    }

include("config.php");


$_SESSION['tabadmin']=1;





	$username = $_POST['username'];
	$username = stripcslashes($username);
	$username = mysqli_real_escape_string($db,$username);
	

	$result = mysqli_query($db,"SELECT * FROM students WHERE username = '$username'") or die("Failed".mysqli_error($db));

	$row = mysqli_fetch_array($result, MYSQLI_ASSOC);

	if ($row['username'] == $username){

		if (mysqli_query($db, "DELETE FROM students WHERE username = '$username'")) {


		    $_SESSION['msg']="Record Deleted Successfuly";


  header("Location: http://{$_SERVER['HTTP_HOST']}/mess_rating/Admin/admin.php");
  exit();

		


		} 
	}

	else{





		    $_SESSION['msg']="There exists no user with this roll number";


  header("Location: http://{$_SERVER['HTTP_HOST']}/mess_rating/Admin/admin.php");
  exit();

		


	}



  header("Location: http://{$_SERVER['HTTP_HOST']}/mess_rating/Admin/admin.php");
  exit();

	




?>