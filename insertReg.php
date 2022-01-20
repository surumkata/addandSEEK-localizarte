<?php

require_once("connectDB.php");

$username = $_POST['username'];
$name = $_POST['name'];
$email = $_POST['email'];
$birthdate = strtotime($_POST["birthdate"]);
$birthdate = date('Y-m-d', $birthdate);
$psw =  md5($_POST['password']);

$checkName = mysqli_query($connection,"SELECT name FROM users WHERE name='$username' ");
$sql = "INSERT INTO users (username,name,password,email,birthdate,admin,preferences) values('$username','$name','$psw','$email','$birthdate','0','')";

if(mysqli_num_rows($checkName) > 0){
    echo "Name already exists";
}else{
  if (mysqli_query($connection,$sql) === TRUE) {
    header('Location: http://localhost/LI4/login.php');
  } else {
    echo "Error: " . $sql . "<br>" . mysqli_connect_error();
  }
}
?>
