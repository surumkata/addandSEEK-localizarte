<?php
require_once("connectDB.php");
$searchkey = str_replace('+',' ',strtolower($_GET['key']));
$_SESSION['searchKey'] = $searchkey;

$searchByName = mysqli_query($connection,"SELECT * FROM museums WHERE name = '$searchkey'");
$searchBySubString = mysqli_query($connection,"SELECT * FROM museums WHERE name LIKE '%$searchkey%' ");
$rowNumb = mysqli_num_rows ( $searchBySubString );
//TODO : fazer outras queries de pesquisa
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
    <div class="w3-top">
      <div class="w3-bar w3-orange w3-card">
        <img href="index.php" src="pictures/assets/logo.png" class="w3-bar-item w3-button" alt="Logo" style="width:11%">
        <a class="w3-bar-item w3-button w3-padding-large w3-hide-medium w3-hide-large w3-right" href="javascript:void(0)" onclick="myFunction()" title="Toggle Navigation Menu"><i class="fa fa-bars"></i></a>
        <a href="profileUser.php" class="w3-bar-item w3-button w3-padding-large w3-hide-small">PROFILE</a>
        <a href="sugestion.php">
        <img class="w3-bar-item w3-button w3-padding-large w3-hide-small" src="pictures/assets/dice.png" width="50" height="50">
        </a>
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
            if($rowNumb>0){
              while($row = mysqli_fetch_assoc($searchBySubString)){
                $refName = str_replace(' ', '-', $row["name"]);
                $textName = ucfirst($row["name"]);
                echo "<tr>";
                echo "<td class=title><a href=museum/museum.php?name=".$refName .">".$textName." </a> </td>";
                echo "<td class=adress>".$row["adress"]." </td>";
                echo "</tr>";
              }
            }else{
                  echo "<h1 class=notFound>No results...</h1>";
              }
              ?>

          </table>

        </div>

    </div>

  </body>
</html>

<!---
<div class="container-footer">
    <ul class="pagination">
      <li><a href="#">«</a></li>
      <li><a href="#">1</a></li>
      <li><a class="active" href="#">2</a></li>
      <li><a href="#">3</a></li>
      <li><a href="#">4</a></li>
      <li><a href="#">5</a></li>
      <li><a href="#">6</a></li>
      <li><a href="#">7</a></li>
      <li><a href="#">»</a></li>
    </ul>
</div>->
