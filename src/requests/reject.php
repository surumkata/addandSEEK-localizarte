<?php
require_once("../db/connectDB.php");

if(isSet($_SESSION['username'])){
  if(isSet($_SESSION['loginErro']) && $_SESSION['loginErro'] == 0){
    if($_SESSION['type'] == "admin"){


    $id = str_replace('-',' ', $_POST["reqID"]);
    $idImg = str_replace('-', '_', $_POST["reqID"]);
    $img = "../pictures/submissions/".$idImg.".png";

    mysqli_query($connection,"DELETE FROM requests WHERE id = '$id'");

    //talvez verificar se havia uma submissão de imag
    //mas provavelmente n vale a pena
    unlink($img);

    header('Location: http://localhost/LI4/src/requests/requests.php');
    }else{
      echo "Permition Denied";
    }
  }
}else header('Location: http://localhost/LI4/src/authentication/login.php');

?>
