<?php
require_once("../db/connectDB.php");

if(isSet($_SESSION['username'])){
  if(isSet($_SESSION['loginErro']) && $_SESSION['loginErro'] == 0){
    if($_SESSION['type'] == "admin"){



$id = $_POST["reqID"];
echo $id;
$nameM = explode(";",$id);



$consult = "SELECT * FROM requests WHERE id = '$id'";
echo $consult."\n";
$result = mysqli_query($connection,$consult);
$row = mysqli_fetch_assoc($result);



$address = $row["address"];
$price = $row["price"];
$categories = $row["categories"];
$contact = $row["contact"];
$website = $row["website"];
$description = $row["description"];
$horarios = $row["schedule"];

if($row["picture"]==1){
  $museuImgAux = str_replace(' ', '_', $_POST["reqID"]);
  $museuImg = "../pictures/submissions/".$museuImgAux.".png";


  $nameMaux = explode(";",$museuImgAux);
  $lowNameM = mb_strtolower($nameMaux[0]);
  $museuImgMove = "../pictures/museums/".$lowNameM.".png";


  //moves and overwrite if there is already one
  rename($museuImg,$museuImgMove);
}


$checkSubType = "SELECT * FROM museums WHERE name = '$nameM[0]'";
echo $checkSubType;
$result = mysqli_query($connection,$checkSubType);


//if exists update
if(mysqli_num_rows($result) > 0){
  $upd = "UPDATE museums SET address = '$address',
                             price = '$price',
                             categories = '$categories',
                             contact = '$contact',
                             website = '$website',
                             description = '$description',
                             schedule  = '$horarios'
                             WHERE name = '$nameM[0]'";


    mysqli_query($connection,$upd);

    mysqli_query($connection,"DELETE FROM requests WHERE id = '$id'");
    $row = mysqli_fetch_assoc($result);
    $coords = explode(",",$row['coords'] );

  header('Location: http://localhost/LI4/src/museum/addCords.php?n='.$nameM[0]."&d=".$address."&lat=".$coords[0]."&lon=".$coords[1]);

}else{
  //insert
  $upd = "INSERT INTO museums values('$nameM[0]','$address','$price','$categories','$contact','$website','$description','','$horarios')";
  echo $upd;
  mysqli_query($connection,$upd);

  mysqli_query($connection,"DELETE FROM requests WHERE id = '$id'");


 header('Location: http://localhost/LI4/src/museum/addCords.php?n='.$nameM[0]."&d=".$address);

}

}else{
  echo "Permition Denied";
}
}
}else header('Location: http://localhost/LI4/src/authentication/login.php');
?>
