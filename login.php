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
  <style>
    html,body{
    margin: 0;
    padding: 0;
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100%;
    width: 100%;
    background: #e3d8ff;
    }
  </style>
  <link rel="stylesheet" href="style.css">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login</title>
</head>
<body>
  <div class="loginform">
      <input type="password" name="pass" id="pass" class="logininput" placeholder="Enter password">
      <div class="loginbtn">Log in</div>
  </div>
  <div class="notification" id="notification"><img src="tick.png" alt=""><div class="notititle">Id send successfully.</div></div>
  <script src="jquery.min.js"></script>
  <script>
    $(window).ready(function(){
      $(document).keydown(function(event) {
        if (event.which === 13){
          loginval = $("#pass").val();
          $.ajax({
            url:"loggingsettings.php",
            type:"POST",
            data:{loginval:loginval},
            success:function (data){
              console.log(data);
              location.reload();
            }
          })
          event.preventDefault();
        }
      });
        //login settings
      $(document).on("click",".loginbtn",function () {
        loginval = $("#pass").val();
        $.ajax({
          url:"loggingsettings.php",
          type:"POST",
          data:{loginval:loginval},
          success:function (data){
            location.reload();
            if (data == "failed") {
              alert("Login failed.");
            }
            console.log(data);
          }
        })
      })
    })
  </script>
</body>
</html>