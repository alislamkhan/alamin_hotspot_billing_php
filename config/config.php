<?php 
  include '../db.php';
  $db = new db();
  $query = "UPDATE data SET function = 'off' ORDER BY id ASC";
  $result = $db->pdo->query($query);
?>
