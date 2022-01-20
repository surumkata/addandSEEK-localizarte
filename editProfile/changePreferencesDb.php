<?php

require_once("../connectDB.php");

$toupdate = "";
$behind = 0;

foreach ($_POST['preferences'] as $preferences) {
     if($behind == 1) $toupdate = $toupdate . ";" . $preferences;
     else {
       $toupdate = $preferences;
       $behind = 1;
     }
 }



/*
if(isSet($_POST['art'])){
  $preferences = "1";
  $behind = 1;
}
if(isSet($_POST['biographical'])){
  if($behind == 1) $preferences = $preferences.";2";
  else {
    $preferences = $preferences."2";
    $behind = 1;
  }
}
if(isSet($_POST['community'])){
  if($behind == 1) $preferences = $preferences.";3";
  else {
    $preferences = $preferences."3";
    $behind = 1;
  }
}
if(isSet($_POST['historical'])){
  if($behind == 1) $preferences = $preferences.";4";
  else {
    $preferences = $preferences."4";
    $behind = 1;
  }
}
if(isSet($_POST['neighborhood'])){
  if($behind == 1) $preferences = $preferences.";5";
  else {
    $preferences = $preferences."5";
    $behind = 1;
  }
}
if(isSet($_POST['military'])){
  if($behind == 1) $preferences = $preferences.";6";
  else {
    $preferences = $preferences."6";
    $behind = 1;
  }
}
if(isSet($_POST['science'])){
  if($behind == 1) $preferences = $preferences.";7";
  else {
    $preferences = $preferences."7";
    $behind = 1;
  }
}
if(isSet($_POST['themed'])){
  if($behind == 1) $preferences = $preferences.";8";
  else {
    $preferences = $preferences."8";
    $behind = 1;
  }
}

*/
$update = "UPDATE users SET preferences=('".$toupdate."') WHERE username = ('" . $_SESSION['username'] . "')";
$update = mysqli_query($connection,$update);
header('Location: http://localhost/Li4/profileUser.php');


?>
