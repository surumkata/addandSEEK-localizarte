<?php
require_once("../db/connectDB.php");
$museum = $_SESSION['museum'];
unset($_SESSION['museum']);
$in = "INSERT INTO history (username,museum) values('".$_SESSION['username']."','$museum')";
$result = mysqli_query($connection,$in);

header('Location: http://localhost:8888/museum/museum.php?name='.$museum);




?>
