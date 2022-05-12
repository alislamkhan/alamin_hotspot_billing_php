<?php 
  include 'db.php';
  $db = new db();

  $query = "SELECT * FROM data WHERE status = 'available' ORDER BY id ASC LIMIT 1";
  $result = $db->pdo->query($query);
  $check = $result->rowCount();
  if ($check==0) {
    echo "not found";
  }else {
    date_default_timezone_set("Asia/Dhaka");
    $customername=$_POST["customername"];
    $customermobile=$_POST["customermobile"];
    $customerzone=$_POST["customerzone"];
    $customeramount=$_POST["customeramount"];
    $selldate= date("Y-m-d");
    $selltime= date("H:i:s");
    $paidstatus=$_POST["paidstatus"];

    $query2 = "UPDATE data SET 
    name = '$customername',
    mobile = '$customermobile',
    zone = '$customerzone',
    amount = '$customeramount',
    sell_date = '$selldate',
    sell_time = '$selltime',
    status = '$paidstatus',
    function = 'on'
    WHERE status = 'available' ORDER BY id ASC LIMIT 1";
    $result2 = $db->pdo->query($query2);
  }
?>