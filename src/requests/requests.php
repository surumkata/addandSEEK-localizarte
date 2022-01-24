<?php
require_once("../db/connectDB.php");
if(isSet($_SESSION['username'])){
  if(isSet($_SESSION['loginErro']) && $_SESSION['loginErro'] == 0){
    if($_SESSION['type'] == "admin"){
$consult = "SELECT id FROM requests";
$result = mysqli_query($connection,$consult);
$rowNumb = mysqli_num_rows($result);
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="../css/request.css">
    <link rel="stylesheet" href="../css/default.css">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="../css/table.css" rel="stylesheet">
  </head>


  <div class="w3-top orange">
    <div class="w3-bar w3-card" style="max-height:7vh;">
      <a href="../index.php">
      <img src="../../pictures/assets/logo.png" class="w3-bar-item nav-button-img" alt="Logo" style="max-height:7vh;"> </a>
      <a href="../profile/profileUser.php">
      <img class="w3-bar-item nav-button-img w3-padding-large w3-hide-small" src="../pictures/assets/profile.png" style="max-height:7vh;">
      </a>
      <a href="../sugestion.php">
      <img class="w3-bar-item nav-button-img w3-padding-large w3-hide-small" src="../pictures/assets/dice.png" style="max-height:7vh;">
      </a>
      <a href="requests.php">
      <img class="w3-bar-item nav-button-img w3-padding-large w3-hide-small" src="../pictures/assets/requests.png" style="max-height:7vh;">
      </a>
      <a href="../authentication/logout.php">
      <img class="w3-bar-item nav-button-img w3-padding-large w3-hide-small w3-right" src="../pictures/assets/logout.png" style="max-height:7vh;">
      </a>
      <form method="GET" action="../search.php" style="margin-top:0vh">
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
        <div class="col-md-6 text-center mb-5">
        </div>
      </div>
          <div class="w3-center">
            <table class="table table-hover col-sm-2">
              <thead class="thead-custom">
                <th class="align-center">Museum Name</th>
                <th class="align-center">Username</th>
              </thead>
              <tbody class="table-custom">
                <?php
                 if($rowNumb>0){
                     while($row = mysqli_fetch_assoc($result)){
                       $names = explode(";",$row["id"]);
                       $refName = str_replace(' ','-',$names[0]);
                       $museuName = $names[0];
                       $userName = $names[1];
                     ?>
                     <tr onclick="window.location.assign('requestVal.php?m=<?php echo $refName .'&u='.$userName; ?>')">
                        <td class="align-center"><?php echo $museuName;  ?></td>                                                  <!--coluna do museu-->
                        <td class="align-center"><?php echo $userName;   ?></td>                                                    <!--coluna do username-->
                     </tr> <?php }}else{?>
                        <td>No submissions...</td>
                        <td></td>
                  <?php
                     }
                     ?>
              </tbody>
            </table>
          </div>
    </div>
  </section>
  <script src="js/jquery.min.js"></script>
  <script src="js/popper.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/main.js"></script>
  </body>
  <footer class="w3-center footerorange">
    <div class="small_text thin_text text_black" style="padding-top:2vh;padding-bottom:0.3vh;">University of Minho, Engineering School, <a href="https://www.eng.uminho.pt/pt" target="_blank" class="regular_text text_black">@uminho</a></div>
    <img src="../pictures/assets/eng.png" class="w3-round" alt="Tiago Silva" style="width:10%">
    <div class="small_text thin_text text_black paddingfooter">Any doubts please contact us at localizarte@outlook.pt</div>
    <div class="small_text thin_text text_black paddingfooter"><a href="https://www.termsofservicegenerator.net/live.php?token=apkS3wlBfNEDkF6vR3MofdAJyG6f9QRt" target="_blank" class="regular_text text_black">Terms of conditions</a> © 2022 Localizarte</div>
    <div class="small_text thin_text text_black" style="padding-top:0.3vh;padding-bottom:2vh;">This web application was done for Laboratórios de Informática IV, subject of MIEI at University of Minho.</a></div>
  </footer>
</html>

<?php

}else header('Location: http://localhost/LI4/src/index.php');}else header('Location: http://localhost/LI4/src/authentication/login.php');}else header('Location: http://localhost/LI4/src/authentication/login.php'); ?>
