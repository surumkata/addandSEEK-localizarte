<?php
require_once("connectDB.php");
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
    <link rel="stylesheet" type="text/css" href="css/request.css">
    <link rel="stylesheet" href="css/default.css">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="css/table.css" rel="stylesheet">
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
</html>

<?php

}else header('Location: http://localhost/LI4/index.php');}else header('Location: http://localhost/LI4/login.php');}else header('Location: http://localhost/LI4/login.php'); ?>
