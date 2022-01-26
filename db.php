<?php
class db {
private $hostname = "localhost";
private $username = "alislam";
private $password = "";
private $dbname = "billing";
public $pdo;
  public function __construct()
  {
    if (!isset($this->pdo)) {
           try {
      $conn = new PDO("mysql:host=".$this->hostname.";dbname=".$this->dbname, $this->username, $this->password);
      // set the PDO error mode to exception
      $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      $conn->exec("SET CHARACTER SET utf8");
      $this->pdo = $conn;
      }catch(PDOException $e) {
        die("Error: " . $e->getMessage());
      }
    }
  }
}
?>
