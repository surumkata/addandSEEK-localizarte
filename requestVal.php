<?php
require_once("connectDB.php");


if(isSet($_SESSION['username'])){
  if(isSet($_SESSION['loginErro']) && $_SESSION['loginErro'] == 0){
    if($_SESSION['type'] == "admin"){


$aux = $_GET["m"];
$user = $_GET["u"];

$museu = str_replace('-', ' ', $aux);
$museuImg = str_replace(' ', '_', $museu);
$id = $museu.";".$user;
$postID = str_replace(' ','-',$id);

$consult = "SELECT * FROM requests WHERE id = '$id' ";
$result = mysqli_query($connection,$consult);
$row = mysqli_fetch_assoc($result);

$image = "pictures/submissions/".$museuImg.";".$user.".png";
$imageOrg = "pictures/museums/".$museuImg.".png";


$preferences = "";

$behind = 0;

if (!function_exists('str_contains')) {
    function str_contains($haystack, $needle) {
        return $needle !== '' && mb_strpos($haystack, $needle) !== false;
    }
}

if(str_contains($row['categories'],"1")){
  $preferences = "Art";
  $behind = 1;
}
if(str_contains($row['categories'],"2")){
  if($behind == 1) $preferences = $preferences." - Biographical";
  else {
    $preferences = $preferences."Biographical";
    $behind = 1;
  }
}
if(str_contains($row['categories'],"3")){
  if($behind == 1) $preferences = $preferences." - Community";
  else {
    $preferences = $preferences."Community";
    $behind = 1;
  }
}
if(str_contains($row['categories'],"4")){
  if($behind == 1) $preferences = $preferences." - Historical";
  else {
    $preferences = $preferences."Historical";
    $behind = 1;
  }
}
if(str_contains($row['categories'],"5")){
  if($behind == 1) $preferences = $preferences." - Neighborhood";
  else {
    $preferences = $preferences."Neighborhood";
    $behind = 1;
  }
}
if(str_contains($row['categories'],"6")){
  if($behind == 1) $preferences = $preferences." - Military";
  else {
    $preferences = $preferences."Military";
    $behind = 1;
  }
}
if(str_contains($row['categories'],"7")){
  if($behind == 1) $preferences = $preferences." - Science";
  else {
    $preferences = $preferences."Science";
    $behind = 1;
  }
}
if(str_contains($row['categories'],"8")){
  if($behind == 1) $preferences = $preferences." - Themed";
  else {
    $preferences = $preferences."Themed";
    $behind = 1;
  }
}


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
    <link href="css/table.css" rel="stylesheet"
  </head>

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

  <body style="background-color: #eff4f8">
    <section class="ftco-section">
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-md-10 text-center mb-5">
          </div>
        </div>
            <div class="w3-center col-sm-11">
              <table class="table table-hover col-sm-2">
                <!--vertical-align: middle-->
                <thead class="thead-custom">
                  <tr>
                    <th class="vertical-align: middle">Museum Name</th>
                    <th class="vertical-align: middle"><?php echo $museu; ?></th>
                  </tr>
                </thead>
                <tbody class="table-custom">
                  <?php
                   echo "<tr>";
                   echo "<th>"."Address"." </th>";
                   echo "<td class=title>".$row["address"]." </td>";
                   echo "</tr>";

                   echo "<tr>";
                   echo "<th>"."Price"." </th>";
                   echo "<td class=title>".$row["price"]." </td>";
                   echo "</tr>";

                   echo "<tr>";
                   echo "<th>"."Categories"." </th>";
                   echo "<td class=title>".$preferences." </td>";
                   echo "</tr>";

                   echo "<tr>";
                   echo "<th>"."Contact"." </th>";
                   echo "<td class=title>".$row["contact"]." </td>";
                   echo "</tr>";

                   echo "<tr>";
                   echo "<th>"."Website"." </th>";
                   echo "<td class=title>".$row["website"]." </td>";
                   echo "</tr>";

                   echo "<tr>";
                   echo "<th>"."Picture"." </th>";
                   if($row['picture'] == 0) { ?>
                      <td class=title><img alt="No image available" size=40% src='<?php echo $imageOrg; ?>'> </td>
                    <?php }else { ?>
                       <td class=title><img alt="No image available" size=40% src='<?php echo $image; ?>'> </td>
                     <?php }
                   echo "<tr>";
                   echo "<th>"."Description"." </th>";
                   echo "<td class=title>".$row["description"]." </td>";
                   echo "</tr>";
                  ?>

                </tbody>
              </table>

              <div class="p-1 py-1 ">
                    <div class="row mt-1">
                      <div class="col-md-6">
                        <form action="approve.php" method="post">
                          <input type="hidden" name="reqID" value=<?php echo $postID; ?>>
                          <input type="image" alt="Approve" class="center" src="pictures/assets/yes.png"/>
                        </form>
                      </div>
                      <div class="col-md-6">
                        <form action="reject.php" method="post">
                            <input type="hidden" name="reqID" value=<?php echo $postID; ?>>
                            <input type="image" alt="Reject" class="center" src="pictures/assets/no.png"/>
                        </form>
                      </div>
                  </div>
              </div>
            </div>
      </div>
    </section>


  </body>
</html>

<?php
}else{
  echo "Permition Denied";
}
}
}else header('Location: http://localhost/LI4/login.php');
?>
