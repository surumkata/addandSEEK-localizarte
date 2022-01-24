<?php
  require_once("../db/connectDB.php");
  session_destroy();
  header('Location: http://localhost/LI4/src/index.php');
 ?>
