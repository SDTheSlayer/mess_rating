<?php
    if (session_status() == PHP_SESSION_NONE) {
      session_start();
    }
    include("../config.php");
    if(isset($_SESSION['type']))
    {
      if($_SESSION['type']=='students')
      {
        header("Location: http://{$_SERVER['HTTP_HOST']}/Student/home.php");
        exit();
      }
      
    }
    $username=$_SESSION['user'];

    $result = mysqli_query($db,"SELECT * FROM mess_manager WHERE username = '$username' ") or die("Failed".mysqli_error($db));
    $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
    $mess=$row['mess'];
    $password=$row['password'];
    $name=$row['name'];
    $msg='';
    if(isset($_SESSION['msg']))
    {
      $msg = $_SESSION['msg'];
      unset($_SESSION['msg']);
    }
    $month = date("m");
    $year=date("Y");
    $tabindex=0;
    if(isset($_SESSION['tabmess']))
    {
      $tabindex=$_SESSION['tabmess'];
      unset($_SESSION['tabmess']);
    }
    if(isset($_SESSION['month']))
    {
      $displaymonth=$_SESSION['month'];
      $displayyear=$_SESSION['year'];
    }
    else
    {
      $displaymonth=$month;
      $displayyear=$year;
    }


?>
<html>
<head>
</head>
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
</style>
<body onload="defaultload()" >
     <h2> Hello! <?php echo $name; ?></h2> 
          <h5><a href="../Login/logout.php">Logout</a>
     </h5>
     <h4><?php echo $msg; ?></h4>

  <div class="tab">
    <button class="tablinks" id="defaultOpen" onclick="openTab(event, 'Update')">Profile</button>
    <button class="tablinks" onclick="openTab(event, 'MessRatings')">Mess Ratings</button>
    <button class="tablinks" onclick="openTab(event, 'ChangePassword')">Change Password</button>
  </div>

  <div id="Update" class="tabcontent">
    Name : <?php echo $name; ?><br>
    Username: <?php echo $username; ?><br>
    Mess: <?php echo $mess; ?><br>
  </div>


  <div id="MessRatings" class="tabcontent">
    <h3>Mess Ratings</h3> 
    <form method="POST" action="Change_month.php" >
      Month: <input type="number" max="12" min="1" name="month" step="1" value="<?php echo $displaymonth;?>">
      Year: <input type="number" min="1" name="year" step="1" value="<?php echo $displayyear;?>">
      <button type="submit" name="Go" >GO</button>
    </form>
    <?php
      $all_messes=mysqli_query($db,"SELECT * FROM mess_manager ") or die("Failed".mysqli_error($db));
      while($mess_row=mysqli_fetch_array($all_messes, MYSQLI_ASSOC))
      {
        $cur_mess_rating=$mess_row['mess'];
        $mess_rating=0;
        $mess_count=0;
        $feedbacks_all=mysqli_query($db,"SELECT * FROM feedback WHERE month = '$displaymonth' AND year = '$displayyear' AND mess='$cur_mess_rating' ") or die("Failed".mysqli_error($db));
        while($row = mysqli_fetch_array($feedbacks_all, MYSQLI_ASSOC))
        {
          $review_total=0;
          $review_count=0;
          $words = preg_split("/[\s,_-]+/", strtolower($row['text']));
          foreach ($words as $w)
          {
            $sqlstring="SELECT * FROM keyword WHERE word = '$w'";
            $value_table=mysqli_query($db,$sqlstring);
            while($wordrow = mysqli_fetch_array($value_table, MYSQLI_ASSOC))
            {
              $wordvalue=$wordrow['points'];
              $review_total+=$wordvalue;
              $review_count+=1;
            }
          }
          if($review_count>0)
          {
            $review_rating = $review_total/$review_count;
            $mess_rating*=$mess_count;
            $mess_count+=1;
            $mess_rating+=$review_rating;
            $mess_rating/=$mess_count;
          }

        }
        if($mess_count==0)
        {
          $mess_rating=5;
        }
        echo $cur_mess_rating." : ".$mess_rating."<br>";
      }
    ?>
    <h3>Reviews of <?php echo $mess;?> for Given Month</h3>
    <?php
      $feedbacks_mess=mysqli_query($db,"SELECT * FROM feedback WHERE month = '$displaymonth' AND year = '$displayyear' AND mess='$mess' ") or die("Failed".mysqli_error($db));
      while($review = mysqli_fetch_array($feedbacks_mess, MYSQLI_ASSOC))
      {
        echo $review['text']."<br><br>";
      }
    ?>
  </div>


  <div id="ChangePassword" class="tabcontent">
    <form method="POST" action="Password_Change.php">
      <div >
        <label>Old Password</label>
        <input type="password" name="old_password" placeholder="Old Password" required>
      </div>
      <div class="form-group">
        <label>New Password</label>
        <input type="password" name="new_password" placeholder="New Password" required>
      </div>
        <div class="form-group">
        <label>Retype Password</label>
        <input type="password" name="re_password" placeholder="Retype Password" required>
      </div>
      <button type="submit" name="submit" >Change Password</button>
    </form>
  </div>


  <script>
    function openTab(evt, TabName) {
      var i, tabcontent, tablinks;
      tabcontent = document.getElementsByClassName("tabcontent");
      for (i = 0; i < tabcontent.length; i++) {
        tabcontent[i].style.display = "none";
      }
      tablinks = document.getElementsByClassName("tablinks");
      for (i = 0; i < tablinks.length; i++) {
        tablinks[i].className = tablinks[i].className.replace(" active", "");
      }
      document.getElementById(TabName).style.display = "block";
      evt.currentTarget.className += " active";
    }
    function defaultload() {
            document.getElementsByClassName('tablinks')[<?php echo $tabindex ?>].click()
        }
  </script>
</body>
</html>