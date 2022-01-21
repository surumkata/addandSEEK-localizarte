<?php
require_once("connectDB.php");
$searchkey = strtolower($_POST['search']);
$_SESSION['searchKey'] = strtolower($_POST['search']);
$searchByName = mysqli_query($connection,"SELECT * FROM museums WHERE name = '$searchkey'");
//TODO : fazer outras queries de pesquisa

?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	  <link rel="stylesheet" type="text/css" href="search.css">
  </head>
  <body>

    <div class="container">
       <div class="container-table">
         <table>
           <?php
              while($row = mysqli_fetch_assoc($searchByName)){
                $refName = str_replace(' ', '-', $row["name"]);
                $textName = ucfirst($row["name"]);
                echo "<tr>";
                echo "<td class=title><a href=museum/museum.php?name=".$refName .">".$textName." </a> </td>";
                echo "<td class=adress>".$row["adress"]." </td>";
                echo "</tr>";

              }?>

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
