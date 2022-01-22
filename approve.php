<?php
require_once("connectDB.php");

$id = str_replace('-', ' ', $_POST["reqID"]);
$nameM = explode(";",$id);

$consult = "SELECT* FROM requests WHERE id = '$id'";
$result = mysqli_query($connection,$consult);
$row = mysqli_fetch_assoc($result);


$address = $row["address"];
$price = $row["price"];
$categories = $row["categories"];
$contact = $row["contact"];
$website = $row["website"];
$description = $row["description"];
$newName = $row["newName"];

$upd = "UPDATE museums SET name = '$newName',
                           adress = '$address',
                           price = '$price',
                           categories = '$categories',
                           contact = '$contact',
                           website = '$website',
                           description = '$description' WHERE name = '$name[0]'";

mysqli_query($connection,$upd);

mysqli_query($connection,"DELETE FROM requests WHERE id = '$id'");

header('Location: http://localhost/LI4/requests.php');

?>
