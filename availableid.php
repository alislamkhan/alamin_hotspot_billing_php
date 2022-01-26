<?php 
  include 'db.php';
  $db = new db();

  $query = "SELECT * FROM data WHERE 
  status = 'available' ORDER BY id ASC";
  $result = $db->pdo->query($query);
  $no = 1;
  while ($data = $result->fetch(PDO::FETCH_ASSOC)) {?>
      <div class="availableidcol">
        <div class="availableidcolgrid"><?php echo $no ?></div>
        <div class="availableidcolgrid"><?php echo $data['username'] ?></div>
        <div class="availableidcolgrid"><?php echo $data['password'] ?></div>
        <div class="availableidcolgridimg"><img src="delete.png" alt="" id="delete" data-id="<?php echo $data['id'] ?>"></div>
      </div>
  <?php
  $no = $no+1;
  }
?>
