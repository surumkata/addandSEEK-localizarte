<?php

require_once("../connectDB.php");

if(isSet($_SESSION['username'])){
  if(isSet($_SESSION['loginErro']) && $_SESSION['loginErro'] == 0){



$name  = $_POST['name'];

$checkName = "SELECT * FROM museums WHERE name = '$name' ";
$res = mysqli_query($connection,$checkName);
$row = mysqli_fetch_row($res);

//only add if don't exist
if(mysqli_num_rows($res) == 0){
  $newImage = str_replace(' ', '_',$name).";".$_SESSION['username'];

  if(isSet($_FILES["fileToUpload"]) && strlen($_FILES["fileToUpload"]['name'])>0){
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
  }else{
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

    $name = $_POST['name'];
    $address = $_POST['address'];
    $price = $_POST['price'];
    $site = $_POST['website'];
    $contact = $_POST['contact'];

    $preferences = "";
    $behind = 0;
    foreach ($_POST['preferences'] as $preference) {
         if($behind == 1) $preferences = $preferences . ";" . $preference;
         else {
           $preferences = $preference;
           $behind = 1;
         }
     }

    $description = $_POST['description'];
    $id = $name .";".$_SESSION['username'];
    $consult = "SELECT * FROM requests WHERE (LOWER( id ) = LOWER('".$id."'))";
    $resultado = mysqli_query($connection,$consult);
    $registo = mysqli_fetch_row($resultado);
    $horarios = $_POST['date'];
    $horariosString = "";
    for($dia=0;$dia<7;$dia++){
      $i = $dia*4;
      if($horarios[$i+0] != "" && $horarios[$i+1] != ""){
        if($horariosString == "") {
          $horariosString = $horarios[$i+0]."-".$horarios[$i+1];
        }
        else $horariosString = $horariosString.";".$horarios[$i+0]."-".$horarios[$i+1];
        if($horarios[$i+2] != "" && $horarios[$i+3] != ""){
          $horariosString = $horariosString.",".$horarios[$i+2]."-".$horarios[$i+3];
        }
      }
      else {
        if($horariosString == "") {
          $horariosString = "_";
        }
        else $horariosString = $horariosString.";"."_";
      }
    }
    $notificar = 0;
    if(mysqli_num_rows($resultado) > 0){
      $query = "UPDATE requests SET address=('" . $address . "'),price=('" . $price . "'),categories=('" . $preferences . "'),website=('" . $site . "'),contact=('" . $contact . "'),picture=('" . $picture . "'),description=('" . $description . "'), schedule =('" . $horariosString . "') WHERE id=('" . $id . "')";
      echo "<br>";
      if(mysqli_query($connection,$query)===true){
        echo "atualizado com sucesso";
        $notificar = 1;
      }else{
        echo " nao conseguiu atualizar";
      }
    }else{
      echo "<br>";
      $query = "INSERT INTO requests (id,address,price,categories,contact,website,picture,description,schedule) values('$id','$address','$price','$preferences','$contact','$site','$picture','$description','$horariosString')";
      echo $query;
      if(mysqli_query($connection,$query)===true){
        echo "inseriu com sucesso";
        $notificar = 1;
      }else{
        echo " nao conseguiu inserir";
      }
    }
    if($notificar == 1){ //sending mail to admin
      require("sendNotification.php");
      sendNotification($_SESSION['username'],$name,"A submission has been made to add a museum");
    }
  }
  header('Location: http://localhost/LI4/search.php?key='.$_SESSION['searchKey']);
}


}
}
else header('Location: http://localhost/LI4/login.php');

?>
