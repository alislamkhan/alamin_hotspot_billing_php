<?php 
  require 'vendor/autoload.php';

  use PhpOffice\PhpSpreadsheet\Spreadsheet;
  use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

  include 'db.php';
  $db = new db();
  if(isset($_FILES['file'])){
    $allowedext = ['xls','xlsx','csv'];
    $filename = $_FILES['file']['name'];
    $checking = explode(".",$filename);
    $ext = end($checking);
    if (in_array($ext,$allowedext)) {
      $filepath = $_FILES['file']['tmp_name'];
      $spreadsheet = \PhpOffice\PhpSpreadsheet\IOFactory::load($filepath);
      $data = $spreadsheet->getActiveSheet()->toArray();
      foreach ($data as $row) {
        $username = $row['0'];
        $password = $row['1'];
        $query = "INSERT INTO data (username, password, status) 
        VALUES ('$username', '$password', 'available')";
        $result = $db->pdo->query($query);
      }
    }else{
      echo "file formate not support";
    }
  }else{
    echo "file not found";
  }
?>