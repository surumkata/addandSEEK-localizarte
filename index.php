<?php
require_once("connectDB.php");
$_SESSION['loginErro'] = 0;
?>


<!DOCTYPE html>
<html lang="en">
<title>W3.CSS Template</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="css/default.css">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
body {font-family: "Lato", sans-serif}
.mySlides {display: none}
</style>
<body>

<!-- Navbar -->
<?php if(!isSet($_SESSION['username'])){ // not logged
  ?>

<div class="w3-top">
  <div class="w3-bar w3-orange w3-card">
    <img href="index.php" src="pictures/assets/logo.png" class="w3-bar-item w3-button" alt="Logo" style="width:11%">
    <a class="w3-bar-item w3-button w3-padding-large w3-hide-medium w3-hide-large w3-right" href="javascript:void(0)" onclick="myFunction()" title="Toggle Navigation Menu"><i class="fa fa-bars"></i></a>
    <a href="login.php" class="w3-bar-item w3-button w3-padding-large w3-hide-small">LOGIN</a>
    <a href="register.php" class="w3-bar-item w3-button w3-padding-large w3-hide-small">REGISTER</a>
  </div>
</div>
<?php
}else{ //logged in

 if($_SESSION['type'] == "user"){
   ?>
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
<?php
}else{
?>
<div class="w3-top">
  <div class="w3-bar w3-orange w3-card">
    <img href="index.php" src="pictures/assets/logo.png" class="w3-bar-item w3-button" alt="Logo" style="width:11%">
    <a class="w3-bar-item w3-button w3-padding-large w3-hide-medium w3-hide-large w3-right" href="javascript:void(0)" onclick="myFunction()" title="Toggle Navigation Menu"><i class="fa fa-bars"></i></a>
    <a href="requests.php" class="w3-bar-item w3-button w3-padding-large w3-hide-small">REQUESTS</a>
    <a href="logout.php" class="w3-bar-item w3-button w3-padding-large w3-hide-small">LOGOUT</a>
  </div>
</div>
<?php
}}
?>

<!-- Page content -->
<div class="w3-content" style="max-width:2000px;margin-top:46px">

  <!-- Automatic Slideshow Images -->
  <div class="mySlides w3-display-container w3-center">
    <img src="pictures/museums/museu_do_prado.png" style="width:100%">
    <div class="w3-display-bottommiddle w3-container w3-text-white w3-padding-32 w3-hide-small">
      <h3>Los Angeles</h3>
      <p><b>We had the best time playing at Venice Beach!</b></p>
    </div>
  </div>
  <div class="mySlides w3-display-container w3-center">
    <img src="pictures/museums/museu_do_prado.png" style="width:100%">
    <div class="w3-display-bottommiddle w3-container w3-text-white w3-padding-32 w3-hide-small">
      <h3>Museu do Prado</h3>
      <p><b>The atmosphere in New York is lorem ipsum.</b></p>
    </div>
  </div>
  <div class="mySlides w3-display-container w3-center">
    <img src="pictures/museums/museu_do_prado.png" style="width:100%">
    <div class="w3-display-bottommiddle w3-container w3-text-white w3-padding-32 w3-hide-small">
      <h3>Chicago</h3>
      <p><b>Thank you, Chicago - A night we won't forget.</b></p>
    </div>
  </div>

  <!-- The Band Section -->
  <div class="w3-container w3-content w3-center w3-padding-64" style="max-width:800px" id="band">
    <h2 class="w3-wide">LOCALIZARTE</h2>
    <p class="w3-opacity"><i>slogan bacano</i></p>
    <p class="w3-justify">Meter aqui ganda informçao do localizarte!</p>
    <div class="w3-row w3-padding-32">
      <div class="w3-quarter">
        <img src="pictures/assets/braz.png" class="w3-round w3-margin-bottom" alt="Gonçalo Braz" style="width:60%">
        <p>Gonçalo Braz</p>
        <p>a93178</p>
      </div>
      <div class="w3-quarter">
        <img src="pictures/assets/pereira.png" class="w3-round w3-margin-bottom" alt="Gonçalo Pereira" style="width:60%">
        <p>Gonçalo Pereira</p>
        <p>a93168</p>
      </div>
      <div class="w3-quarter">
        <img src="pictures/assets/cunha.png" class="w3-round w3-margin-bottom" alt="Simão Cunha" style="width:60%">
        <p>Simão Cunha</p>
        <p>a93262</p>
      </div>
      <div class="w3-quarter">
        <img src="pictures/assets/silva.png" class="w3-round w3-margin-bottom" alt="Tiago Silva" style="width:60%">
        <p>Tiago Silva</p>
        <p>a93277</p>
      </div>
    </div>
  </div>


<!-- End Page Content -->
</div>

<!-- Footer -->
<footer class="w3-container w3-padding-64 w3-center w3-opacity w3-light-grey w3-xlarge">
  <p>localizarte@outlook.pt</a><p>
  <p>"o cunha fica de mudar este texto"</a></p>
</footer>

<script>
// Automatic Slideshow - change image every 4 seconds
var myIndex = 0;
carousel();

function carousel() {
  var i;
  var x = document.getElementsByClassName("mySlides");
  for (i = 0; i < x.length; i++) {
    x[i].style.display = "none";
  }
  myIndex++;
  if (myIndex > x.length) {myIndex = 1}
  x[myIndex-1].style.display = "block";
  setTimeout(carousel, 4000);
}


// When the user clicks anywhere outside of the modal, close it
var modal = document.getElementById('ticketModal');
window.onclick = function(event) {
  if (event.target == modal) {
    modal.style.display = "none";
  }
}
</script>

</body>
</html>
