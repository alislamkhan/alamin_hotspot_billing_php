<?php 
  include 'db.php';
  $db = new db();
  $cashsalesidsearch = $_POST["cashsalesidsearch"];
  $cashfrom = $_POST["cashfrom"];
  $cashto = $_POST["cashto"];

  if ($cashsalesidsearch==" ") {
    $query = "SELECT * FROM data WHERE 
    sell_date BETWEEN '$cashfrom' AND '$cashto' AND status = 'cash' ORDER BY sell_date DESC, sell_time DESC";
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
    sell_date BETWEEN '$cashfrom' AND '$cashto' AND status = 'cash' AND name LIKE '%$cashsalesidsearch%' OR 
    sell_date BETWEEN '$cashfrom' AND '$cashto' AND status = 'cash' AND mobile LIKE '%$cashsalesidsearch%' OR 
    sell_date BETWEEN '$cashfrom' AND '$cashto' AND status = 'cash' AND username LIKE '%$cashsalesidsearch%' OR 
    sell_date BETWEEN '$cashfrom' AND '$cashto' AND status = 'cash' AND password LIKE '%$cashsalesidsearch%' ORDER BY sell_date DESC, sell_time DESC";
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