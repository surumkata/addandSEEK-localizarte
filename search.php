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
    <link href="css/default.css" rel="stylesheet">
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
    <div class="w3-top orange" style="height:8vh">
      <div class="w3-bar w3-card" style="height:8vh">
        <a href="index.php">
        <img src="pictures/assets/logo.png" class="w3-bar-item nav-button-img" alt="Logo"> </a>
        <a href="profileUser.php">
        <img class="w3-bar-item nav-button-img w3-padding-large w3-hide-small" src="pictures/assets/profile.png" width="50" height="50">
        </a>
        <a href="sugestion.php">
        <img class="w3-bar-item nav-button-img w3-padding-large w3-hide-small" src="pictures/assets/dice.png" width="50" height="50">
        </a>
        <a href="logout.php">
        <img class="w3-bar-item nav-button-img w3-padding-large w3-hide-small w3-right" src="pictures/assets/logout.png" width="50" height="50">
        </a>
        <form method="GET" action="search.php">
          <button type="submit" class="nav-button-search">
             <img src="pictures/assets/search.png"  style="max-widht:5vh; max-height:5vh;">
         </button>
        <input type="text" class="w3-bar-item nav-button w3-padding-large w3-hide-small" required name="key" id="search">
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
