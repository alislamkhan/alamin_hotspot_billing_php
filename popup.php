<?php 
  include 'db.php';
  $db = new db();
  $popupid = $_POST['popupid'];
  if ($popupid == -1) {
    $query = "SELECT * FROM data WHERE status = 'cash' ORDER BY id DESC LIMIT 1";
    $result = $db->pdo->query($query);
    $check = $result->rowCount();
    if ($check==0) {
      echo "not found";
    }else {
      $query2 = "SELECT * FROM data WHERE status = 'cash' ORDER BY id DESC LIMIT 1";
      $result2 = $db->pdo->query($query2);
      $data2 = $result2->fetch(PDO::FETCH_ASSOC);
      ?>
      <div class="popupbox">
        <div class="popupclose"><img src="close.png" alt=""></div>
        <div class="popupcol">
          <div class="popupcolleft">Name</div>
          <div class="popupcolcenter" id="popupname"><?php echo $data2['name'] ?></div>
          <div class="popupcolright popupnamecopy"><img src="copy.png" alt="c"></div>
        </div>
        <div class="popupcol">
          <div class="popupcolleft">Mobile</div>
          <div class="popupcolcenter" id="popupmobile"><?php echo $data2['mobile'] ?></div>
          <div class="popupcolright popupmobilecopy"><img src="copy.png" alt="c"></div>
        </div>
        <div class="popupcol">
          <div class="popupcolleft">Zone</div>
          <div class="popupcolcenter" id="popupzone"><?php echo $data2['zone'] ?></div>
          <div class="popupcolright popupzonecopy"><img src="copy.png" alt="c"></div>
        </div>
        <div class="popupcol">
          <div class="popupcolleft">Username</div>
          <div class="popupcolcenter" id="popupusername"><?php echo $data2['username'] ?></div>
          <div class="popupcolright popupusernamecopy"><img src="copy.png" alt="c"></div>
        </div>
        <div class="popupcol">
          <div class="popupcolleft">Password</div>
          <div class="popupcolcenter" id="popuppassword"><?php echo $data2['password'] ?></div>
          <div class="popupcolright popuppasswordcopy"><img src="copy.png" alt="c"></div>
        </div>
      </div>
      <?php
    }
  }elseif ($popupid == 01) {
    $query = "SELECT * FROM data WHERE status = 'due' ORDER BY id DESC LIMIT 1";
    $result = $db->pdo->query($query);
    $check = $result->rowCount();
    if ($check==0) {
      echo "not found";
    }else {
      $query2 = "SELECT * FROM data WHERE status = 'due' ORDER BY id DESC LIMIT 1";
      $result2 = $db->pdo->query($query2);
      $data2 = $result2->fetch(PDO::FETCH_ASSOC);
      ?>
      <div class="popupbox">
        <div class="popupclose"><img src="close.png" alt=""></div>
        <div class="popupcol">
          <div class="popupcolleft">Name</div>
          <div class="popupcolcenter" id="popupname"><?php echo $data2['name'] ?></div>
          <div class="popupcolright popupnamecopy"><img class="a" src="copy.png" alt="c"></div>
        </div>
        <div class="popupcol">
          <div class="popupcolleft">Mobile</div>
          <div class="popupcolcenter" id="popupmobile"><?php echo $data2['mobile'] ?></div>
          <div class="popupcolright popupmobilecopy"><img src="copy.png" alt="c"></div>
        </div>
        <div class="popupcol">
          <div class="popupcolleft">Zone</div>
          <div class="popupcolcenter" id="popupzone"><?php echo $data2['zone'] ?></div>
          <div class="popupcolright popupzonecopy"><img src="copy.png" alt="c"></div>
        </div>
        <div class="popupcol">
          <div class="popupcolleft">Username</div>
          <div class="popupcolcenter" id="popupusername"><?php echo $data2['username'] ?></div>
          <div class="popupcolright popupusernamecopy"><img src="copy.png" alt="c"></div>
        </div>
        <div class="popupcol">
          <div class="popupcolleft">Password</div>
          <div class="popupcolcenter" id="popuppassword"><?php echo $data2['password'] ?></div>
          <div class="popupcolright popuppasswordcopy"><img src="copy.png" alt="c"></div>
        </div>
      </div>
    <?php
    }
  }else{
    $query2 = "SELECT * FROM data WHERE id = '$popupid'";
    $result2 = $db->pdo->query($query2);
    $data2 = $result2->fetch(PDO::FETCH_ASSOC);
    ?>
    <div class="popupbox">
      <div class="popupclose"><img src="close.png" alt=""></div>
      <div class="popupcol">
        <div class="popupcolleft">Name</div>
        <div class="popupcolcenter" id="popupname"><?php echo $data2['name'] ?></div>
        <div class="popupcolright popupnamecopy"><img src="copy.png" alt="c"></div>
      </div>
      <div class="popupcol">
        <div class="popupcolleft">Mobile</div>
        <div class="popupcolcenter" id="popupmobile"><?php echo $data2['mobile'] ?></div>
        <div class="popupcolright popupmobilecopy"><img src="copy.png" alt="c"></div>
      </div>
      <div class="popupcol">
        <div class="popupcolleft">Zone</div>
        <div class="popupcolcenter" id="popupzone"><?php echo $data2['zone'] ?></div>
        <div class="popupcolright popupzonecopy"><img src="copy.png" alt="c"></div>
      </div>
      <div class="popupcol">
        <div class="popupcolleft">Username</div>
        <div class="popupcolcenter" id="popupusername"><?php echo $data2['username'] ?></div>
        <div class="popupcolright popupusernamecopy"><img src="copy.png" alt="c"></div>
      </div>
      <div class="popupcol">
        <div class="popupcolleft">Password</div>
        <div class="popupcolcenter" id="popuppassword"><?php echo $data2['password'] ?></div>
        <div class="popupcolright popuppasswordcopy"><img src="copy.png" alt="c"></div>
      </div>
    </div>

    <?php
  }

?>