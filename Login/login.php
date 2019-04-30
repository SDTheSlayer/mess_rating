<?php
    if (session_status() == PHP_SESSION_NONE) {
      session_start();
    }
    include("../config.php");
    $msg='';
    if(isset($_SESSION['msg']))
    {
      $msg = $_SESSION['msg'];
      unset($_SESSION['msg']);
    }
?>

<html>
<head>

  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>

<body>
  <h1>Hello</h1>
  <h4><?php echo $msg; ?></h4>
  <form method="POST" action="post_login.php">
  <div >
    <label>Username</label>
    <input type="text" name="username" placeholder="Username" required>
  </div>
  <div class="form-group">
    <label>Password</label>
    <input type="password" name="password" placeholder="Password" required>
  </div>
    <div class="form-group">
    <label>Type</label><br>
  <input type="radio" name="type" value="students" checked> Student<br>
  <input type="radio" name="type" value="mess_manager"> Mess Manager<br>
  </div>
  <button type="submit" name="submit" >Sign In</button>
</form>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>

</html>