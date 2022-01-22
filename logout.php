<?php
  require_once("connectDB.php");
  session_destroy();
  header('Location: http://localhost:8888/index.php');
 ?>
