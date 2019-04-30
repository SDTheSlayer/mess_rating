<?php

   if (session_status() == PHP_SESSION_NONE) {
      session_start();
    }


include("config.php");
	
	$word = $_POST['delete'] ;


$_SESSION['tabadmin']=4;


	mysqli_query($db,"DELETE FROM keyword WHERE word = '$word'") or die("Failed".mysqli_error($db));


    $_SESSION['msg']="Deleted Successfully";
	header("Location: http://{$_SERVER['HTTP_HOST']}/mess_rating/Admin/admin.php");
	exit();


	
	?>