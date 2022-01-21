<?php
require_once("connectDB.php");

//get 5 last visited places order by datetime
$result = mysqli_query($connection,"SELECT museum FROM history WHERE username='".$_SESSION['username']."' ORDER BY datetime DESC LIMIT 5 ");
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	  <link rel="stylesheet" type="text/css" href="css/searchPage.css">
    <link rel="stylesheet" href="css/default.css">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <style>
    body {font-family: "Lato", sans-serif}
    .mySlides {display: none}
    </style>
  </head>
  <body>

    <div class="w3-top">
      <div class="w3-bar w3-orange w3-card">
        <img href="index.php" src="pictures/assets/logo.png" class="w3-bar-item w3-button" alt="Logo" style="width:11%">
        <a class="w3-bar-item w3-button w3-padding-large w3-hide-medium w3-hide-large w3-right" href="javascript:void(0)" onclick="myFunction()" title="Toggle Navigation Menu"><i class="fa fa-bars"></i></a>
        <a href="profileUser.php" class="w3-bar-item w3-button w3-padding-large w3-hide-small">PROFILE</a>
        <a href="sugestion.php" class="w3-bar-item w3-button w3-padding-large w3-hide-small">SUGESTION</a>
        <a href="logout.php" class="w3-bar-item w3-button w3-padding-large w3-hide-small">LOGOUT</a>
        <form method="GET" action="search.php">
          <input type="text" class="w3-right" required name="key" id="search" style="margin-top:0.58%">
        <button type="submit" class="w3-padding-large w3-button w3-hide-small w3-right"><i class="fa fa-search"></i></button>
      </form>
      </div>
    </div>

    <div class="container">
       <div class="container-table">
         <table>
           <?php
              while(($row = mysqli_fetch_assoc($result)) ){
                $textName = ucfirst($row["museum"]);
                $refName = str_replace(' ', '-', $row["museum"]);
                echo "<tr>";
                echo "<td class=title><a href=museum/museum.php?name=".$refName .">".$textName." </a> </td>";
                echo "</tr>";
              }?>

          </table>

        </div>

    </div>

  </body>
</html>
