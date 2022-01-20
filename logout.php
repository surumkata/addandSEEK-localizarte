<?php
  require_once("connectDB.php");
  session_destroy();
  header('Location: http://localhost/LI4/index.php');
 ?>
