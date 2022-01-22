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
	  <link rel="stylesheet" type="text/css" href="css/searchPage.css">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <style>
    body {font-family: "Lato", sans-serif}
    .mySlides {display: none}
    </style>
  </head>
  <body style="background-color: #eff4f8">

    <div class="container">
       <div class="container-table">
         <table>
           <?php
            if($rowNumb>0){
              while($row = mysqli_fetch_assoc($result)){
                $names = explode(";",$row["id"]);
                $refName = str_replace(' ', '-', $names[0]);
                $museuName = $names[0];
                $userName = $names[1];
                echo "<tr>";
                echo "<td class=title><a href=requestVal.php?m=".$refName ."&u=".$userName ."> Submission from ".$userName ." to ".$museuName."</a> </td>";
                echo "</tr>";
              }
            }
            else{
                echo "<h1 class=notFound>No requests...</h1>";
            }
              ?>

          </table>

        </div>

    </div>

  </body>
</html>
