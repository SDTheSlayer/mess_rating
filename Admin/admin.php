<?php
    if (session_status() == PHP_SESSION_NONE) {
      session_start();
    }

	include("config.php");
    // $rollno=$_SESSION['user'];
    // $result = mysqli_query($db,"SELECT * FROM students WHERE username = '$rollno' ") or die("Failed".mysqli_error($db));
    // $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
    // $current_mess=$row['mess'];
    // $next_mess=$row['next_mess'];
    // $password=$row['password'];
    // $name=$row['name'];
    // $hostel = $row['hostel'];
    // $msg='';
    $msg="";
    if(isset($_SESSION['msg']))
    {
      $msg = $_SESSION['msg'];
      unset($_SESSION['msg']);
    }


    $tabindex=0;
    if(isset($_SESSION['tabadmin']))
    {
      $tabindex=$_SESSION['tabadmin'];
      unset($_SESSION['tabadmin']);
    }

    // $month = date("m");
    // $year=date("Y");
    // $result_feedback= mysqli_query($db,"SELECT * FROM feedback WHERE rollno = '$rollno' AND month = '$month' AND year = '$year' ") or die("Failed".mysqli_error($db));
    // $feedbackrow = mysqli_fetch_array($result_feedback, MYSQLI_ASSOC);
    // $feedback= $feedbackrow['text'];
    // $tabindex=0;
    // // if(isset($_SESSION['tabstudent']))
    // {
    //   $tabindex=$_SESSION['tabstudent'];
    //   unset($_SESSION['tabstudent']);
    // }
?>




<html>


<style>
body {font-family: Arial;}
/* Style the tab */
.tab {
  overflow: hidden;
  border: 1px solid #ccc;
  background-color: #f1f1f1;
}

/* Style the buttons inside the tab */
.tab button {
  background-color: inherit;
  float: left;
  border: none;
  outline: none;
  cursor: pointer;
  padding: 14px 16px;
  transition: 0.3s;
  font-size: 17px;
}

/* Change background color of buttons on hover */
.tab button:hover {
  background-color: #ddd;
}

/* Create an active/current tablink class */
.tab button.active {
  background-color: #ccc;
}

/* Style the tab content */
.tabcontent {
  display: none;
  padding: 6px 12px;
  border: 1px solid #ccc;
  border-top: none;
}
/* Style the tab */
.tab {
  overflow: hidden;
  border: 1px solid #ccc;
  background-color: #f1f1f1;
}

/* Style the buttons inside the tab */
.tab button {
  background-color: inherit;
  float: left;
  border: none;
  outline: none;
  cursor: pointer;
  padding: 14px 16px;
  transition: 0.3s;
  font-size: 17px;
}

/* Change background color of buttons on hover */
.tab button:hover {
  background-color: #ddd;
}

/* Create an active/current tablink class */
.tab button.active {
  background-color: #ccc;
}

/* Style the tab content */
.tabcontent {
  display: none;
  padding: 6px 12px;
  border: 1px solid #ccc;
  border-top: none;
}
</style>


<body onload="defaultload()">


  <h4><?php echo $msg; ?></h4>




<div class="tab">
  <button class="tablinks" onclick="openCity(event, 'London')">Add User</button>
  <button class="tablinks" onclick="openCity(event, 'Paris')">Remove User</button>
  <button class="tablinks" onclick="openCity(event, 'Tokyo')">Add Mess</button>
  <button class="tablinks" onclick="openCity(event, 'Delhi')">Update Mess</button>
  <button class="tablinks" onclick="openCity(event, 'Mumbai')">Key Words</button>
</div>





<!-- Tab contents -->



<div id="London" class="tabcontent">
  <h3>Add User</h3>
  <!-- we will allow name, hostel, roll no, password  -->
 
  <form method="POST" action="add_user.php">
	  <div >
	    <label>Name</label>
	    <input type="text" name="name" placeholder="Name" required>
	  </div>
	  <div >
	    <label>Mess</label>


	  <?php

		echo '<select name="mess">';
			$result = mysqli_query($db,"SELECT mess FROM  mess_manager ") or die("Failed".mysqli_error($db));

			while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC))
			{
				echo '<option value="' . htmlspecialchars($row['mess']) . '">' 
		        . htmlspecialchars($row['mess']) 
		        . '</option>';
			}
			
		echo '</select>';

	  ?>
      </div>



	  <div >
	    <label>Roll No</label>
	    <input type="number" name="username" step="1"  min="100000000" max="999999999" maxlength="9" placeholder="Roll No" required>
	  </div>
	  <div class="form-group">
	    <label>Password</label>
	    <input type="password" name="password"  placeholder="Password" required>
	  </div>

	  <button type="submit" name="submit" >Create User</button>
  </form>
  
</div>

<!-- This is the place to remove user -->








<div id="Paris" class="tabcontent">
	<h3>Remove User</h3>
	<form method="POST" action="remove_user.php">


		<div >
		    <label>Roll No</label>
		    <input type="number" name="username" step="1"  min="100000000" max="999999999" maxlength="9" placeholder="Roll No" required>
		 </div>

	  <button type="submit" name="remove" >Remove User</button>
	</form>

</div>




<div id="Tokyo" class="tabcontent">
  <h3>Add Mess</h3>
  	<form method="POST" action="add_mess.php">


	<div >
	    <label>Caterer's Name</label>
	    <input type="text" name="name" placeholder="Caterer's Name" required>
	</div>  

	<div >
	    <label>Mess Name</label>
	    <input type="text" name="mess" placeholder="Mess Name" required>
	</div>  

    <div >
	    <label>Username</label>
	    <input type="username" name="username"  placeholder="Username" required>
	</div>
	
    <div class="form-group">
	    <label>Password</label>
	    <input type="password" name="password"  placeholder="Password" required>
	 </div>

  <button type="submit" name="add_mess" >Add Mess</button>

	</form>

</div>







<!-- Update mess manager info and Caterer's Nmae -->

<div id="Delhi" class="tabcontent">

  	<form method="POST" action="update_mess.php">





    <div >
	    <label>Mess</label>


	  <?php


		echo '<select name="mess">';
			$result = mysqli_query($db,"SELECT mess FROM  mess_manager ") or die("Failed".mysqli_error($db));

			while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC))
			{
				echo '<option value="' . htmlspecialchars($row['mess']) . '">' 
		        . htmlspecialchars($row['mess']) 
		        . '</option>';
			}
			
		echo '</select>';

	  ?>
    </div>

	<div >
	    <label>Caterer's Name</label>
	    <input type="text" name="name" placeholder="Caterer's Name" required>
	</div>  


    <div >
	    <label>New Username</label>
	    <input type="username" name="username"  placeholder="Username" required>
	</div>


	
    <div class="form-group">
	    <label>New Password</label>
	    <input type="password" name="password"  placeholder="Password" required>
	</div>


  <button type="submit" name="update_mess" >Update Mess</button>



	</form>


</div>






<div id="Mumbai" class="tabcontent">
	<h3>Key Words</h3>
	<form method="POST" action="add_word.php">


		<div >

		    <label>Word</label>
		    <input type="text" name="word"  placeholder="Word" required>
		    <label>Value</label>
		    <input type="number" name="points" step="1" min="0" max="10" placeholder="0" required>
		  <button type="submit" name="add" >Add Word</button>
	

		 </div>

	</form>




	    <div >
	    <label>Words</label>


	  <?php


		
			$result = mysqli_query($db,"SELECT * FROM  keyword ") or die("Failed".mysqli_error($db));


			while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC))
			{
				echo '<form method=POST action="delete_word.php'.'">'.' Word:'.htmlspecialchars($row['word']).'<br> Score:'.htmlspecialchars($row['points']).'<button type="submit" name="delete"'.' value='.htmlspecialchars($row['word']).'>Delete Word</button>'.'</form>';
			}


			
			
		echo '</select>';

	  ?>
    </div>





</div>

</body>








<script>
function openCity(evt, cityName) {
  var i, tabcontent, tablinks;
  tabcontent = document.getElementsByClassName("tabcontent");
  for (i = 0; i < tabcontent.length; i++) {
    tabcontent[i].style.display = "none";
  }
  tablinks = document.getElementsByClassName("tablinks");
  for (i = 0; i < tablinks.length; i++) {
    tablinks[i].className = tablinks[i].className.replace(" active", "");
  }
  document.getElementById(cityName).style.display = "block";
  evt.currentTarget.className += " active";
}

 function defaultload() {
            document.getElementsByClassName('tablinks')[<?php echo $tabindex ?>].click()
        }
</script>

</html>
