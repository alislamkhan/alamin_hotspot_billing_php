<?php 
  include 'db.php';
  $db = new db();
  if (isset($_POST['id'])) {
    $id = $_POST['id'];
    echo $id;
     $query = "DELETE FROM data WHERE id = $id";
     $result = $db->pdo->query($query);
  }
?>