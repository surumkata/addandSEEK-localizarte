<?php
require_once("../connectDB.php");

$currentpsw = $_POST['currentpsw'];
$newpsw = $_POST['newpsw'];
$newpsw2 = $_POST['newpsw2'];
$error = 0;

if(!($newpsw == $newpsw2)){
  $error = 1;
}

if($error == 0){
  $consult = "SELECT password FROM users WHERE username = ('" . $_SESSION['username'] . "')";
  $resultado = mysqli_query($connection,$consult);
  $password = mysqli_fetch_row($resultado);
  echo $password[0]."\n";
  echo md5($currentpsw)."\n";
  if(!(md5($currentpsw) == $password[0])){
    $error = 1;
    $_SESSION['error'] = "Invalid current password!\n";
    header('Location: http://localhost/Li4/editProfile/changePassword.php');
  }
  else{
    $update = "UPDATE users SET password=('".md5($newpsw)."') WHERE username = ('" . $_SESSION['username'] . "')";
    $update = mysqli_query($connection,$update);
    header('Location: http://localhost/Li4/profileUser.php');
  }
}
else{
  $_SESSION['error'] = "Passwords don't match!\n";
  header('Location: http://localhost/Li4/editProfile/changePassword.php');
}



 ?>
