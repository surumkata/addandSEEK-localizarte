<?php
  require_once("../db/connectDB.php");
  session_destroy();
  header('Location: http://localhost:8888/index.php');
 ?>
