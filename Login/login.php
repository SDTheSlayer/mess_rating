<html>
<head>
</head>

<body>

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
</body>
</html>