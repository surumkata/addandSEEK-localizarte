<?php

require_once("../connectDB.php");

$name = $_POST['name'];
$email = $_POST['email'];
$birthdate = strtotime($_POST["birthdate"]);
$birthdate = date('Y-m-d', $birthdate);




$query = "UPDATE users SET name=('" . $name . "'),email=('" . $email . "'),birthdate=('" . $birthdate . "') WHERE username=('" . $_SESSION['username'] . "')";
$update = mysqli_query($connection,$query);

header('Location: http://localhost/Li4/profileUser.php');


?>
