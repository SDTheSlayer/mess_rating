

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





<div class="tab">
  <button class="tablinks" onclick="openCity(event, 'London')">Add User</button>
  <button class="tablinks" onclick="openCity(event, 'Paris')">Remove User</button>
  <button class="tablinks" onclick="openCity(event, 'Tokyo')">Add Mess</button>
  <button class="tablinks" onclick="openCity(event, 'Delhi')">Update Mess</button>
  <button class="tablinks" onclick="openCity(event, 'Mumbai')">Update Mess</button>
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

		include("config.php");

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
<!-- 
	  <div>


	    <label>Hostel</label>
		<select name = "hostel">
			<option value ="Umiam">Umiam</option>
			<option value ="Kameng">Kameng</option>
			<option value ="Barak">Barak</option>
			<option value ="Manas">Manas</option>
			<option value ="Dihing">Dihing</option>
			<option value ="Brahmaputra">Brahmaputra</option>
			<option value ="Lohit">Lohit</option>
			<option value ="Siang">Siang</option>
			<option value ="Kapili">Kapili</option>
			<option value ="Dibang">Dibang</option>
			<option value ="Subansiri">Subansiri</option>
			<option value ="Dhansiri">Dhansiri</option>

		</select>
	    

	  </div>
 -->




	  <div >
	    <label>Roll No</label>
	    <input type="number" name="username" maxlength="9" placeholder="Roll No" required>
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
		    <input type="number" name="username" maxlength="9" placeholder="Roll No" required>
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
	<h3>Remove User</h3>
	<form method="POST" action="add_word.php">


		<div >

		    <label>Word</label>
		    <input type="text" name="word"  placeholder="Word" required>
		    <label>Value</label>
		    <input type="number" name="value" min="0" max="10" placeholder="0" required>
		  <button type="submit" name="add" >Add Word</button>
	

		 </div>

	</form>




	    <div >
	    <label>Words</label>


	  <?php


		
			$result = mysqli_query($db,"SELECT * FROM  keyword ") or die("Failed".mysqli_error($db));

			while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC))
			{
				echo '<form action="delete_word.php?delete='.htmlspecialchars($row['word']).'">'.' Word:'.htmlspecialchars($row['word']).'<br> Score:'.htmlspecialchars($row['points']).'<button type="submit" name="delete">Delete Word</button></form>';
			}
			
		echo '</select>';

	  ?>
    </div>





</div>








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
</script>
