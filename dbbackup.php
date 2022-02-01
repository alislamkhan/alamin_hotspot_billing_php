<?php

  include_once('Mysqldump.php');
  $dump = new Ifsnop\Mysqldump\Mysqldump('mysql:host=localhost;dbname=billing', 'alislam', '');
  $dump->start('billing.sql');
?>