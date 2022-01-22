<?php

require_once("../connectDB.php");

if(isSet($_SESSION['username'])){
  if(isSet($_SESSION['loginErro']) && $_SESSION['loginErro'] == 0){


$name = $_POST['name'];
$email = $_POST['email'];
$birthdate = strtotime($_POST["birthdate"]);
$birthdate = date('Y-m-d', $birthdate);

$preferences = "";
$behind = 0;

foreach ($_POST['preferences'] as $preference) {
     if($behind == 1) $preferences = $preferences . ";" . $preference;
     else {
       $preferences = $preference;
       $behind = 1;
     }
 }


$query = "UPDATE users SET name=('" . $name . "'),email=('" . $email . "'),birthdate=('" . $birthdate . "'),preferences=('".$preferences."') WHERE username=('" . $_SESSION['username'] . "')";
$update = mysqli_query($connection,$query);

header('Location: http://localhost/Li4/profileUser.php');

}
}
else header('Location: http://localhost/LI4/login.php');
?>
