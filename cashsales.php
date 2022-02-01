<?php 
  include 'db.php';
  $db = new db();

  $cashsalesidsearch = $_POST["cashsalesidsearch"];
  $cashfrom = $_POST["cashfrom"];
  $cashto = $_POST["cashto"];
  if ($cashsalesidsearch == " ") {
    $query = "SELECT * FROM data WHERE 
    sell_date BETWEEN '$cashfrom' AND '$cashto' AND status = 'cash' ORDER BY sell_date DESC, sell_time DESC";
    $result = $db->pdo->query($query);
    $no = 1;
    while ($data = $result->fetch(PDO::FETCH_ASSOC)) {
    ?>
        <div class="cashsalesidcol" data-popupid="<?php echo $data['id']?>">
          <div class="cashsalesidcolgrid"><?php echo $no ?></div>
          <div class="cashsalesidcolgrid"><?php echo $data['name'] ?></div>
          <div class="cashsalesidcolgrid"><?php echo $data['mobile'] ?></div>
          <div class="cashsalesidcolgrid"><?php echo $data['username'] ?></div>
          <div class="cashsalesidcolgrid"><?php echo $data['password'] ?></div>
          <div class="cashsalesidcolgrid"><?php echo date('h:i A', strtotime($data['sell_time'])) ." ". date('d-M-Y', strtotime($data['sell_date']))?></div>
          <div class="cashsalesidcolgrid"><?php echo $data['zone'] ?></div>
          <div class="cashsalesidcolgrid"><?php echo $data['amount'] ?></div>
          <div class="cashsalesidcolgridimg"><img src="update.png" alt="" id="updatecash" data-id="<?php echo $data['id'] ?>"><img src="delete.png" alt="" id="delete" data-id="<?php echo $data['id'] ?>"></div>
        </div>
    <?php
    $no = $no+1;
    }
  }else{
    $query = "SELECT * FROM data WHERE 
    sell_date BETWEEN '$cashfrom' AND '$cashto' AND status = 'cash' AND name LIKE '%$cashsalesidsearch%' OR 
    sell_date BETWEEN '$cashfrom' AND '$cashto' AND status = 'cash' AND mobile LIKE '%$cashsalesidsearch%' OR 
    sell_date BETWEEN '$cashfrom' AND '$cashto' AND status = 'cash' AND username LIKE '%$cashsalesidsearch%' OR 
    sell_date BETWEEN '$cashfrom' AND '$cashto' AND status = 'cash' AND password LIKE '%$cashsalesidsearch%' ORDER BY sell_date DESC, sell_time DESC";
    $result = $db->pdo->query($query);
    $no = 1;
    while ($data = $result->fetch(PDO::FETCH_ASSOC)) {
    ?>
        <div class="cashsalesidcol" data-popupid="<?php echo $data['id']?>">
          <div class="cashsalesidcolgrid"><?php echo $no ?></div>
          <div class="cashsalesidcolgrid"><?php echo $data['name'] ?></div>
          <div class="cashsalesidcolgrid"><?php echo $data['mobile'] ?></div>
          <div class="cashsalesidcolgrid"><?php echo $data['username'] ?></div>
          <div class="cashsalesidcolgrid"><?php echo $data['password'] ?></div>
          <div class="cashsalesidcolgrid"><?php echo date('h:i A', strtotime($data['sell_time'])) ." ". date('d-M-Y', strtotime($data['sell_date']))?></div>
          <div class="cashsalesidcolgrid"><?php echo $data['zone'] ?></div>
          <div class="cashsalesidcolgrid"><?php echo $data['amount'] ?></div>
          <div class="cashsalesidcolgridimg"><img src="update.png" alt="" id="updatecash" data-id="<?php echo $data['id'] ?>"><img src="delete.png" alt="" id="delete" data-id="<?php echo $data['id'] ?>"></div>
        </div>
    <?php
    $no = $no+1;
    }
  }
?>
