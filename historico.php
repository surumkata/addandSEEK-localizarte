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
  </head>
  <body>

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
