<?php
require_once("connectDB.php");


if(isSet($_SESSION['username'])){
  if(isSet($_SESSION['loginErro']) && $_SESSION['loginErro'] == 0){
    if($_SESSION['type'] == "admin"){



$id = str_replace('-', ' ', $_POST["reqID"]);
$nameM = explode(";",$id);



$consult = "SELECT * FROM requests WHERE id = '$id'";
$result = mysqli_query($connection,$consult);
$row = mysqli_fetch_assoc($result);


$address = $row["address"];
$price = $row["price"];
$categories = $row["categories"];
$contact = $row["contact"];
$website = $row["website"];
$description = $row["description"];

if($row["picture"]==1){
  $museuImgAux = str_replace('-', '_', $_POST["reqID"]);
  $museuImg = "pictures/submissions/".$museuImgAux.".png";
  echo $museuImg."\n";

  $nameMaux = explode(";",$museuImgAux);
  $lowNameM = mb_strtolower($nameMaux[0]);
  $museuImgMove = "pictures/museums/".$lowNameM.".png";
  echo $museuImgMove."\n";


  //moves and overwrite if there is already one
  rename($museuImg , $museuImgMove);
}






$upd = "UPDATE museums SET adress = '$address',
                           price = '$price',
                           categories = '$categories',
                           contact = '$contact',
                           website = '$website',
                           description = '$description' WHERE name = '$nameM[0]'";

mysqli_query($connection,$upd);

mysqli_query($connection,"DELETE FROM requests WHERE id = '$id'");

header('Location: http://localhost/LI4/requests.php');

}else{
  echo "Permition Denied";
}
}
}else header('Location: http://localhost/LI4/login.php');
?>
