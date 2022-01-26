<?php 
  include 'db.php';
  $db = new db();
  $updateid = $_POST["updateid"];

  $query = "UPDATE data  SET
  status = 'due' WHERE id = $updateid";
  $result = $db->pdo->query($query);

?>