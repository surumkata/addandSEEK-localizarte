<?php
require_once("connectDB.php");

$consult = "SELECT id FROM requests";
$result = mysqli_query($connection,$consult);
$rowNumb = mysqli_num_rows($result);

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="css/request.css">
    <link rel="stylesheet" href="css/default.css">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <style>
    body {font-family: "Lato", sans-serif}
    .mySlides {display: none}
    </style>
  </head>
  <body style="background-color: #eff4f8">
    <div class="w3-top orange">
      <div class="w3-bar w3-card">
        <a href="index.php">
        <img src="pictures/assets/logo.png" class="w3-bar-item nav-button-img" alt="Logo"> </a>
        <a href="profileUser.php">
        <a class="w3-bar-item w3-button w3-padding-large w3-hide-medium w3-hide-large w3-right" href="javascript:void(0)" onclick="myFunction()" title="Toggle Navigation Menu"><i class="fa fa-bars"></i></a>
        <a href="requests.php">
        <img class="w3-bar-item nav-button-img w3-padding-large w3-hide-small" src="pictures/assets/requests.png" width="50" height="50">
        </a>
        <a href="logout.php">
        <img class="w3-bar-item nav-button-img w3-padding-large w3-hide-small w3-right" src="pictures/assets/logout.png" width="50" height="50">
        </a>
      </div>
    </div>

    <div class="container">
       <div class="container-table">
         <table>
           <tr>
                <th class="align-center">Submissions</th>
           </tr>

           <?php
            if($rowNumb>0){
              while($row = mysqli_fetch_assoc($result)){
                $names = explode(";",$row["id"]);
                $refName = str_replace(' ', '-', $names[0]);
                $museuName = $names[0];
                $userName = $names[1];
                echo "<tr>";
                echo "<td class=title ><a href=requestVal.php?m=".$refName ."&u=".$userName ."> Submission from ".$userName ." to ".$museuName."</a> </td>";
                echo "</tr>";
              }
            }
            else{
              ?>
              <tr>
                   <th>No requests...</th>
              </tr>
              <?php
            }
              ?>
          </table>

        </div>

    </div>

  </body>
</html>
