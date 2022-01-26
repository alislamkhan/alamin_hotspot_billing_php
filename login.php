<?php 
  include 'db.php';
  $db = new db();
  include 'session.php';
  session::init();
  $login = session::get("login");
  if ($login == true) {
    header("Location:index.php");
  }

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <link rel="stylesheet" href="login.css">
  <title>Login</title>
</head>
<body>
  <div class="login">
      <input type="password" name="pass" id="pass">
      <div class="loginbtn">Log in</div>
  </div>
  
  <script src="jquery.min.js"></script>
  <script src="main.js"></script>
</body>
</html>