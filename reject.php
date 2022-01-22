<?php
require_once("connectDB.php");

if(isSet($_SESSION['username'])){
  if(isSet($_SESSION['loginErro']) && $_SESSION['loginErro'] == 0){
    if($_SESSION['type'] == "admin"){


    $id = str_replace('-', ' ', $_POST["reqID"]);

    mysqli_query($connection,"DELETE FROM requests WHERE id = '$id'");
    header('Location: http://localhost/LI4/requests.php');
    }else{
      echo "Permition Denied";
    }
  }
}else header('Location: http://localhost/LI4/login.php');

?>
