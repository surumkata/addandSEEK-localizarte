<?php
require_once("../connectDB.php");
$museum = $_SESSION['museum'];
unset($_SESSION['museum']);
$del = "DELETE FROM history WHERE username ='".$_SESSION['username']."' AND museum='$museum' ";
$result = mysqli_query($connection,$del);

header('Location: http://localhost:8888/museum/museum.php?name='.$museum);




?>
