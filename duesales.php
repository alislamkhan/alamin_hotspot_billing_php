<?php 
  include 'db.php';
  $db = new db();

  $duesalesidsearch = $_POST["duesalesidsearch"];
  $duefrom = $_POST["duefrom"];
  $dueto = $_POST["dueto"];
  if ($duesalesidsearch == " ") {
    $query = "SELECT * FROM data WHERE 
    sell_date BETWEEN '$duefrom' AND '$dueto' AND status = 'due' ORDER BY sell_date DESC, sell_time DESC";
    $result = $db->pdo->query($query);
    $no = 1;
    while ($data = $result->fetch(PDO::FETCH_ASSOC)) {
    ?>
        <div class="duesalesidcol">
          <div class="duesalesidcolgrid"><?php echo $no ?></div>
          <div class="duesalesidcolgrid"><?php echo $data['name'] ?></div>
          <div class="duesalesidcolgrid"><?php echo $data['mobile'] ?></div>
          <div class="duesalesidcolgrid"><?php echo $data['username'] ?></div>
          <div class="duesalesidcolgrid"><?php echo $data['password'] ?></div>
          <div class="duesalesidcolgrid"><?php echo date('h:i A', strtotime($data['sell_time'])) ." ". date('d-M-Y', strtotime($data['sell_date']))?></div>
          <div class="duesalesidcolgrid"><?php echo $data['amount'] ?></div>
          <div class="duesalesidcolgridimg"><img src="update.png" alt="" id="updatedue" data-id="<?php echo $data['id'] ?>"><img src="delete.png" alt="" id="delete" data-id="<?php echo $data['id'] ?>"></div>
        </div>
    <?php
    $no = $no+1;
    }
  }else{
    $query = "SELECT * FROM data WHERE 
    sell_date BETWEEN '$duefrom' AND '$dueto' AND status = 'due' AND name LIKE '%$duesalesidsearch%' OR 
    sell_date BETWEEN '$duefrom' AND '$dueto' AND status = 'due' AND mobile LIKE '%$duesalesidsearch%' OR 
    sell_date BETWEEN '$duefrom' AND '$dueto' AND status = 'due' AND username LIKE '%$duesalesidsearch%' OR 
    sell_date BETWEEN '$duefrom' AND '$dueto' AND status = 'due' AND password LIKE '%$duesalesidsearch%' ORDER BY sell_date DESC, sell_time DESC";
    $result = $db->pdo->query($query);
    $no = 1;
    while ($data = $result->fetch(PDO::FETCH_ASSOC)) {
    ?>
        <div class="duesalesidcol">
          <div class="duesalesidcolgrid"><?php echo $no ?></div>
          <div class="duesalesidcolgrid"><?php echo $data['name'] ?></div>
          <div class="duesalesidcolgrid"><?php echo $data['mobile'] ?></div>
          <div class="duesalesidcolgrid"><?php echo $data['username'] ?></div>
          <div class="duesalesidcolgrid"><?php echo $data['password'] ?></div>
          <div class="duesalesidcolgrid"><?php echo date('h:i A', strtotime($data['sell_time'])) ." ". date('d-M-Y', strtotime($data['sell_date']))?></div>
          <div class="duesalesidcolgrid"><?php echo $data['amount'] ?></div>
          <div class="duesalesidcolgridimg"><img src="update.png" alt="" id="updatedue" data-id="<?php echo $data['id'] ?>"><img src="delete.png" alt="" id="delete" data-id="<?php echo $data['id'] ?>"></div>
        </div>
    <?php
    $no = $no+1;
    }
  }
?>

