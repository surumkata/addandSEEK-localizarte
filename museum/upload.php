<?php

require_once("../connectDB.php");

$newName = $_POST['museumName'];
$newImage = str_replace(' ', '_',$newName);

if(isSet($_FILES["fileToUpload"])){
  $target_dir = "../pictures/submissions/";
  $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
  $notUpload = 0;
  $uploadOk = 1;
  $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
  $target_file = $target_dir . $newImage . "." . $imageFileType;
  unset($_SESSION['museum_image']);
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
}else{echo "entrei";
  $notUpload = 1;
  $uploadOk = 1;
}

echo $notUpload;

if ($uploadOk == 0) {
  $_SESSION['upload'] = $error;
  //header
} else{
  if(!($notUpload == 1)){
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
  } else {
      $notUpload = 1;
      $_SESSION['upload'] = "Sorry, there was an error uploading your file.";
        //header
  }
}
  if($notUpload == 1) $picture = 0;
  else  $picture = 1;


  $address = $_POST['address'];
  $price = $_POST['price'];
  $site = $_POST['website'];
  $contact = $_POST['contact'];
  $categories = $_POST['categories'];
  $description = $_POST['description'];
  $oldName = $_POST['oldName'];

  $id = $oldName .";".$_SESSION['username'];
  $consult = "SELECT * FROM requests WHERE (LOWER( id ) = LOWER('".$id."'))";
  $resultado = mysqli_query($connection,$consult);
  $registo = mysqli_fetch_row($resultado);

  if(mysqli_num_rows($resultado) > 0){
    $query = "UPDATE requests SET address=('" . $address . "'),price=('" . $price . "'),website=('" . $site . "'),contact=('" . $contact . "'),picture=('" . $picture . "'),newName=('" . $newName . "'),description=('" . $description . "') WHERE id=('" . $id . "')";
    echo "<br>";
    if(mysqli_query($connection,$query)===true){
      echo "atualizado com sucesso";
    }else{
      echo " nao conseguiu atualizar";
    }
  }else{
    echo "<br>";
    $query = "INSERT INTO requests (id,address,price,categories,contact,website,picture,newName,description) values('$id','$address','$price','$categories','$contact','$site','$picture','$newName','$description')";
    if(mysqli_query($connection,$query)===true){
      echo "inseriu com sucesso";
    }else{
      echo " nao conseguiu inserir";
    }
  }
  header('Location: http://localhost/LI4/museum/museum.php');

}
?>
