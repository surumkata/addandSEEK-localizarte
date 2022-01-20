<?php
require_once("../connectDB.php");

$currentpsw = $_POST['currentpsw'];
$newpsw = $_POST['newpsw'];
$newpsw2 = $_POST['newpsw2'];
$error = 0;

if(!($newpsw == $newpsw2)){
  echo "oh seu burro do crl nem escrever a pass 2x consegues.\n";
  $error = 1;
}

if($error == 0){
  $consult = "SELECT password FROM users WHERE username = ('" . $_SESSION['username'] . "')";
  $resultado = mysqli_query($connection,$consult);
  $registo = mysqli_fetch_row($resultado);
  echo $registo[0]."\n";
  echo md5($currentpsw)."\n";
  if(!(md5($currentpsw) == $registo[0])){
    $error = 1;
    echo "oh burro do crl nem escrever a pass atual sabes.\n";
  }
  else{
    $update = "UPDATE password FROM users SET password=('".md5($newpsw)."') WHERE username = ('" . $_SESSION['username'] . "')";
  }
}

echo $currentpsw."\n";
echo $newpsw."\n";
echo $newpsw2."\n";

 ?>
