<?php
require_once("../connectDB.php");
if(isSet($_POST['lat']) && isSet($_POST['lon']) && isSet($_POST['name'])){
  $coords = $_POST['lat'].",".$_POST['lon'];
  $name = $_POST['name'];

  $upd = "UPDATE museums SET coords = '$coords' WHERE name = '$name' ";

  mysqli_query($connection,$upd);

 header('Location: http://localhost/LI4/requests.php');
}else {
  header('Location: http://localhost/LI4/index.php');
}





 ?>
