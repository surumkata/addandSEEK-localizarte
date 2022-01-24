<?php

require_once("db/connectDB.php");

if(isSet($_SESSION['username'])){
  if(isSet($_SESSION['loginErro']) && $_SESSION['loginErro'] == 0){


$username = $_SESSION['username'];
$consult = "SELECT preferences FROM users WHERE username = ('" . $_SESSION['username'] . "')";
$resultado = mysqli_query($connection,$consult);
$preferences = mysqli_fetch_row($resultado);
echo $preferences[0]."\n";
if(strpos($preferences[0], ";") != false){
  $preference = explode(";",$preferences[0]);
  $np = count($preference);
  echo $np."\n";
  if(!isSet($preference[0])) $p1 = 0; else $p1 = $preference[0];
  if(!isSet($preference[1])) $p2 = 0; else $p2 = $preference[1];
  if(!isSet($preference[2])) $p3 = 0; else $p3 = $preference[2];

  echo $p1;
  echo $p2;
  echo $p3."\n";

  $buscaMuseus = "SELECT name FROM museums WHERE categories LIKE '%$p1%' OR categories LIKE '%$p2%' OR categories LIKE '%$p3%'";
  $resultadoMuseus = mysqli_query($connection,$buscaMuseus);

  $random = rand(0,mysqli_num_rows($resultadoMuseus)-1);
  echo $random."\n";

  for($i = 0; $i <= $random; $i++){
    $museus = mysqli_fetch_row($resultadoMuseus);
  }

  echo $museus[0];
  $refName = str_replace(' ', '-', $museus[0]);
  header('Location: http://localhost/LI4/src/museum/museum.php?name='.$refName);

}
else{
  $buscaMuseus = "SELECT name FROM museums";
  $resultadoMuseus = mysqli_query($connection,$buscaMuseus);

  $random = rand(0,mysqli_num_rows($resultadoMuseus)-1);
  echo $random."\n";

  for($i = 0; $i <= $random; $i++){
    $museus = mysqli_fetch_row($resultadoMuseus);
  }

  echo $museus[0];
  $refName = str_replace(' ', '-', $museus[0]);
  header('Location: http://localhost/LI4/src/museum/museum.php?name='.$refName);
};

  }
}
else header('Location: http://localhost/LI4/src/authentication/login.php');
?>
