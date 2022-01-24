<?php

require_once("../db/connectDB.php");
unset($_SESSION['registerError']);
$username = $_POST['username'];
$name = $_POST['name'];
$email = $_POST['email'];
$birthdate = strtotime($_POST["birthdate"]);
$birthdate = date('Y-m-d', $birthdate);
$psw =  md5($_POST['password']);
$checkCredential = mysqli_query($connection,"SELECT name FROM users WHERE (LOWER(username) = LOWER('$username') OR LOWER(email)=LOWER('$email') )");
$sql = "INSERT INTO users (username,name,password,email,birthdate,admin,preferences) values('$username','$name','$psw','$email','$birthdate','0','')";



if(mysqli_num_rows($checkCredential) > 0){
    $_SESSION['registerError'] = 1;
    header('Location: http://localhost:8888/register.php');
}else{
  if (mysqli_query($connection,$sql) === TRUE) {
    header('Location: http://localhost:8888/login.php');
  } else {
    echo "Error: " . $sql . "<br>" . mysqli_connect_error();
  }
}
?>
