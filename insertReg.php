<?php

require_once("connectDB.php");

$username = $_POST['username'];
$psw =  $_POST['password'];

$checkName = mysqli_query($connection,"SELECT name FROM users WHERE name='$username' ");
$sql = "INSERT INTO users (name,password) values('$username','$psw')";

if(mysqli_num_rows($checkName) > 0){
    echo "Name already exists";
}else{
  if (mysqli_query($connection,$sql) === TRUE) {
    echo "New record created successfully";
  } else {
    echo "Error: " . $sql . "<br>" . mysqli_connect_error();
  }
}
?>
