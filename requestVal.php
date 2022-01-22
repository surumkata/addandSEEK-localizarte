<?php
require_once("connectDB.php");

$aux = $_GET["m"];
$user = $_GET["u"];

$museu = str_replace('-', ' ', $aux);
$id = $museu.";".$user;
$postID = str_replace(' ','-',$id);

$consult = "SELECT * FROM requests WHERE id = '$id' ";
$result = mysqli_query($connection,$consult);
$row = mysqli_fetch_assoc($result);

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

    <div>
       <div>
         <table>
           <?php
            echo "<tr>";
            echo "<td class=title>".$museu." </td>";
            echo "</tr>";

            echo "<tr>";
            echo "<td class=title>".$row["address"]." </td>";
            echo "</tr>";

            echo "<tr>";
            echo "<td class=title>".$row["price"]." </td>";
            echo "</tr>";

            echo "<tr>";
            echo "<td class=title>".$row["categories"]." </td>";
            echo "</tr>";

            echo "<tr>";
            echo "<td class=title>".$row["contact"]." </td>";
            echo "</tr>";

            echo "<tr>";
            echo "<td class=title>".$row["website"]." </td>";
            echo "</tr>";

            echo "<tr>";
            echo "<td class=title>".$row["picture"]." </td>";
            echo "</tr>";

            echo "<tr>";
            echo "<td class=title>".$row["newName"]." </td>";
            echo "</tr>";

            echo "<tr>";
            echo "<td class=title>".$row["description"]." </td>";
            echo "</tr>";


           ?>

          </table>

          <form action="approve.php" method="post">
            <input type="hidden" name="reqID" value=<?php echo $postID; ?>>
            <input type="image" id="image" alt="Approve" src="pictures/assets/yes.png"/>
          </form>

          <form action="reject.php" method="post">
              <input type="hidden" name="reqID" value=<?php echo $postID; ?>>
              <input type="image" id="image" alt="Reject" src="pictures/assets/no.png"/>
          </form>




        </div>

    </div>

  </body>
</html>
