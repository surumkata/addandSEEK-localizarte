<?php
require_once("connectDB.php");

$id = str_replace('-', ' ', $_POST["reqID"]);

mysqli_query($connection,"DELETE FROM requests WHERE id = '$id'");
header('Location: http://localhost/LI4/requests.php');

?>
