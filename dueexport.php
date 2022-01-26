<?php 
  include 'db.php';
  $db = new db();
  $duesalesidsearch = $_POST["duesalesidsearch"];
  $duefrom = $_POST["duefrom"];
  $dueto = $_POST["dueto"];

  if ($duesalesidsearch==" ") {
    $query = "SELECT * FROM data WHERE 
    sell_date BETWEEN '$duefrom' AND '$dueto' AND status = 'due' ORDER BY sell_date DESC, sell_time DESC";
    $result = $db->pdo->query($query);
    $file = fopen("export.csv", "w");
    $headers = array("id","name","mobile","username","password","sell date","sell time","amount","status");
    fputcsv($file,$headers);
    $id = 1;
    while ($data = $result->fetch(PDO::FETCH_ASSOC)) {
      $name=$data['name'];
      $mobile=$data['mobile'];
      $username=$data['username'];
      $password=$data['password'];
      $selldate=$data['sell_date'];
      $selltime=$data['sell_time'];
      $amount=$data['amount'];
      $status=$data['status'];
      $inputs=array(
        "id" => $id,
        "name" => $name,
        "mobile" => $mobile,
        "username" => $username,
        "password" => $password,
        "sell date" => $selldate,
        "sell time" => $selltime,
        "amount" => $amount,
        "status" => $status,
      );
      fputcsv($file,$inputs);
      $id=$id+1;
    }
    fclose($file);
  }else{
    $query = "SELECT * FROM data WHERE 
    sell_date BETWEEN '$duefrom' AND '$dueto' AND status = 'due' AND name LIKE '%$duesalesidsearch%' OR 
    sell_date BETWEEN '$duefrom' AND '$dueto' AND status = 'due' AND mobile LIKE '%$duesalesidsearch%' OR 
    sell_date BETWEEN '$duefrom' AND '$dueto' AND status = 'due' AND username LIKE '%$duesalesidsearch%' OR 
    sell_date BETWEEN '$duefrom' AND '$dueto' AND status = 'due' AND password LIKE '%$duesalesidsearch%' ORDER BY sell_date DESC, sell_time DESC";
    $result = $db->pdo->query($query);
    $file = fopen("export.csv", "w");
    $headers = array("id","name","mobile","username","password","sell date","sell time","amount","status");
    fputcsv($file,$headers);
    $id = 1;
    while ($data = $result->fetch(PDO::FETCH_ASSOC)) {
      $name=$data['name'];
      $mobile=$data['mobile'];
      $username=$data['username'];
      $password=$data['password'];
      $selldate=$data['sell_date'];
      $selltime=$data['sell_time'];
      $amount=$data['amount'];
      $status=$data['status'];
      $inputs=array(
        "id" => $id,
        "name" => $name,
        "mobile" => $mobile,
        "username" => $username,
        "password" => $password,
        "sell date" => $selldate,
        "sell time" => $selltime,
        "amount" => $amount,
        "status" => $status,
      );
      fputcsv($file,$inputs);
      $id=$id+1;
    }
    fclose($file);
  }

?>