<?php 
  include 'db.php';
  $db = new db();
  include 'session.php';
  session::init();

  if (isset($_POST['loginval'])) {
    $pass = $_POST['loginval'];
    $query = "SELECT * FROM admin WHERE pass = '$pass'";
    $result = $db->pdo->query($query);
    $row = $result->rowCount();
    if ($row > 0) {
      session::set("login", true);
      echo "loged in";
    }else{
      echo "failed";
    }
  }
?>