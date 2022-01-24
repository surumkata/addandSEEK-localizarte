<?php
require_once("../db/connectDB.php");


if(isSet($_SESSION['username'])){
  if(isSet($_SESSION['loginErro']) && $_SESSION['loginErro'] == 0){
    if($_SESSION['type'] == "admin"){


$aux = $_GET["m"];
$user = $_GET["u"];

$museu = str_replace('-', ' ', $aux);
$museuImg = str_replace(' ', '_', $museu);
$id = $museu.";".$user;

$consult = "SELECT * FROM requests WHERE id = '$id' ";
$result = mysqli_query($connection,$consult);
$row = mysqli_fetch_assoc($result);

$image = $museuImg.";".$user.".png";
$imageOrg = $museuImg.".png";
$horarios = explode(";",$row['schedule']);

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
    <link rel="stylesheet" href="../css/default.css">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="../css/table.css" rel="stylesheet"
  </head>

  <div class="w3-top orange">
    <div class="w3-bar w3-card" style="max-height:7vh;">
      <a href="index.php">
      <img src="../pictures/assets/logo.png" class="w3-bar-item nav-button-img" alt="Logo" style="max-height:7vh;"> </a>
      <a href="profileUser.php">
      <img class="w3-bar-item nav-button-img w3-padding-large w3-hide-small" src="../pictures/assets/profile.png" style="max-height:7vh;">
      </a>
      <a href="sugestion.php">
      <img class="w3-bar-item nav-button-img w3-padding-large w3-hide-small" src="../pictures/assets/dice.png" style="max-height:7vh;">
      </a>
      <a href="requests.php">
      <img class="w3-bar-item nav-button-img w3-padding-large w3-hide-small" src="../pictures/assets/requests.png" style="max-height:7vh;">
      </a>
      <a href="logout.php">
      <img class="w3-bar-item nav-button-img w3-padding-large w3-hide-small w3-right" src="../pictures/assets/logout.png" style="max-height:7vh;">
      </a>
      <form method="GET" action="search.php" style="margin-top:0vh">
        <button type="submit" class="nav-button-search" style="max-width:14vh; max-height:14vh!important;margin-top:1vh !important;border-radius:5vh;">
           <img src="../pictures/assets/search.png"  style="max-width:11vh; max-height:6vh;padding-bottom:0.4vh;">
       </button>
      <input type="text" class="w3-bar-item w3-hide-small" required name="key" id="search" style="max-width:20vh; max-height:5vh;margin-top:1vh;border-radius:5vh;">
      </form>
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
                     <th scope="row" class="align-center img" style="background-image:url('http://localhost:8888/../pictures/museums/<?php echo$imageOrg; ?>');
                         width: 80vh;
                         height: 40vh;
                         background-position:center center;
                         background-size:cover;
                         border-radius:0%"> </th>
                    <?php }else { ?>
                      <th scope="row" class="align-center img" style="background-image:url('http://localhost:8888/../pictures/submissions/<?php echo$image; ?>');
                          width: 80vh;
                          height: 40vh;
                          background-position:center center;
                          background-size:cover;
                          border-radius:0%"> </th>
                     <?php }
                   echo "<tr>";
                   echo "<th>"."Description"." </th>";
                   echo "<td class=title>".$row["description"]." </td>";
                   echo "</tr>";
                  ?>

                </tbody>
              </table>
              <div class="text_black regular_text w3-container" style="max-width:100%;margin-top:3vh;" id="body">
                <div>
                  <img src="../pictures/assets/schedule.png" alt="schedule" style="width:4%" class="iconmuseum">
                  <a class="bold_text large_text">Schedule:</a>
                </div>
                <table class="table table-hover table-bordered">
                  <thead class="thead-custom align-center">
                    <th>Domingo</th>
                    <th>Segunda</th>
                    <th>Terça</th>
                    <th>Quarta</th>
                    <th>Quinta</th>
                    <th>Sexta</th>
                    <th>Sábado</th>
                  </thead>
                  <tbody class="table-custom align-center">
                    <td><?php if(isSet($horarios[0]) && $horarios[0]!="" && $horarios[0]!="_"){ echo $horarios[0]; }else { echo "Encerrado";}?></td>
                    <td><?php if(isSet($horarios[1]) && $horarios[1]!="" && $horarios[1]!="_"){ echo $horarios[1]; }else { echo "Encerrado";}?></td>
                    <td><?php if(isSet($horarios[2]) && $horarios[2]!="" && $horarios[2]!="_"){ echo $horarios[2]; }else { echo "Encerrado";}?></td>
                    <td><?php if(isSet($horarios[3]) && $horarios[3]!="" && $horarios[3]!="_"){ echo $horarios[3]; }else { echo "Encerrado";}?></td>
                    <td><?php if(isSet($horarios[4]) && $horarios[4]!="" && $horarios[4]!="_"){ echo $horarios[4]; }else { echo "Encerrado";}?></td>
                    <td><?php if(isSet($horarios[5]) && $horarios[5]!="" && $horarios[5]!="_"){ echo $horarios[5]; }else { echo "Encerrado";}?></td>
                    <td><?php if(isSet($horarios[6]) && $horarios[6]!="" && $horarios[6]!="_"){ echo $horarios[6]; }else { echo "Encerrado";}?></td>
                  </tbody>
                </table>
              </div>

              <div class="p-1 py-1 ">
                    <div class="row mt-1">
                      <div class="col-md-6">
                        <form action="approve.php" method="post">
                          <input type="hidden" name="reqID" value="<?php echo $id; ?>">
                          <input type="image" alt="Approve" class="center" src="../pictures/assets/yes.png"/>
                        </form>
                      </div>
                      <div class="col-md-6">
                        <form action="reject.php" method="post">
                            <input type="hidden" name="reqID" value="<?php echo $id; ?>">
                            <input type="image" alt="Reject" class="center" src="../pictures/assets/no.png"/>
                        </form>
                      </div>
                  </div>
              </div>
            </div>
      </div>
    </section>


  </body>
  <footer class="w3-container w3-center footerorange">
    <div class="small_text thin_text text_black" style="padding-top:2vh;padding-bottom:0.3vh;">University of Minho, Engineering School, <a href="https://www.eng.uminho.pt/pt" target="_blank" class="regular_text text_black">@uminho</a></div>
    <img src="../pictures/assets/eng.png" class="w3-round" alt="Tiago Silva" style="width:10%">
    <div class="small_text thin_text text_black paddingfooter">Any doubts please contact us at localizarte@outlook.pt</div>
    <div class="small_text thin_text text_black paddingfooter"><a href="https://www.termsofservicegenerator.net/live.php?token=apkS3wlBfNEDkF6vR3MofdAJyG6f9QRt" target="_blank" class="regular_text text_black">Terms of conditions</a> © 2022 Localizarte</div>
    <div class="small_text thin_text text_black" style="padding-top:0.3vh;padding-bottom:2vh;">This web application was done for Laboratórios de Informática IV, subject of MIEI at University of Minho.</a></div>
  </footer>
</html>

<?php
}else{
  header('Location: http://localhost:8888/index.php');
}
}
}else header('Location: http://localhost:8888/authentication/login.php');
?>
