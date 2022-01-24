<?php

require_once("../db/connectDB.php");

if(isSet($_SESSION['username'])){
  if(isSet($_SESSION['loginErro']) && $_SESSION['loginErro'] == 0){

$target_dir = "../pictures/users/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$imageFileType = mb_strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
$target_file = $target_dir . $_SESSION['username'] . "." . $imageFileType;

// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {
  $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
  if($check !== false) {
    $uploadOk = 1;
  } else {
    echo "File is not an image.\n";
    $uploadOk = 0;
  }
}

// Check file size
if ($_FILES["fileToUpload"]["size"] > 500000) {
  $error = "Sorry, your file is too large.\n";
  $uploadOk = 0;
}

// Allow certain file formats
if($imageFileType != "png") {
  $error = "Sorry, only PNG files are allowed.\n";
  $uploadOk = 0;
}

// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
  $_SESSION['upload'] = $error;
  header('Location: http://localhost:8888/profile/editImage.php');
} else {
  if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
    header('Location: http://localhost:8888/profile/profileUser.php');
  } else {
      $_SESSION['upload'] = "Sorry, there was an error uploading your file.\n";
      header('Location: http://localhost:8888/profile/editImage.php');
  }
}
}
}
else header('Location: http://localhost:8888/authentication/login.php');
?>
