<?php

   if (session_status() == PHP_SESSION_NONE) {
      session_start();
    }


include("config.php");
	
	$word = $_POST['word'] ;

	$points = $_POST['points'] ;


$_SESSION['tabadmin']=4;




	$word = stripcslashes($word);
	$points = stripcslashes($points);



	$word = mysqli_real_escape_string($db,$word);
	$points = mysqli_real_escape_string($db,$points);




	$result = mysqli_query($db,"SELECT * FROM keyword WHERE word = '$word'") or die("Failed".mysqli_error($db));

	$row = mysqli_fetch_array($result, MYSQLI_ASSOC);





	if (strtolower($row['word']) == strtolower($word)){


		 $_SESSION['msg']="There Already exist a word by this name";

	}

	else{



		if (mysqli_query($db, "INSERT INTO keyword (word, points)
VALUES ('$word', '$points')")) {
		    
		 $_SESSION['msg']="Word Added Successfully";


  header("Location: http://{$_SERVER['HTTP_HOST']}/mess_rating/Admin/admin.php");
  exit();

		}

	}

  header("Location: http://{$_SERVER['HTTP_HOST']}/mess_rating/Admin/admin.php");
  exit();
	
	?>