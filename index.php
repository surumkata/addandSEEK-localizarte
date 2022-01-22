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

<div class="w3-top orange">
  <div class="w3-bar w3-card">
    <a href="index.php">
    <img src="pictures/assets/logo.png" class="w3-bar-item nav-button-img" alt="Logo"> </a>
    <a class="w3-bar-item w3-button w3-padding-large w3-hide-medium w3-hide-large w3-right" href="javascript:void(0)" onclick="myFunction()" title="Toggle Navigation Menu"><i class="fa fa-bars"></i></a>
    <a href="login.php">
    <img class="w3-bar-item nav-button-img w3-padding-large w3-hide-small w3-right" src="pictures/assets/login.png" width="50" height="50">
    </a>
    <a href="register.php">
    <img class="w3-bar-item nav-button-img w3-padding-large w3-hide-small w3-right" src="pictures/assets/register.png" width="50" height="50">
    </a>
  </div>
</div>
<?php
}else{ //logged in

 if($_SESSION['type'] == "user"){
   ?>
   <div class="w3-top orange">
     <div class="w3-bar w3-card">
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
<?php
}else{
?>
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
<?php
}}
?>

<!-- Page content -->
<div class="w3-content" style="max-width:2000px;margin-top:46px">

  <!-- Automatic Slideshow Images -->
  <div class="mySlides w3-display-container w3-center">
    <img src="pictures/museums/museu_louvre.png" style="width:100%">
    <div class="w3-display-bottommiddle w3-container w3-text-white w3-padding-32 w3-hide-small">
      <h3>Louvre Museum </h3>
      <p><b>Paris - France</b></p>
    </div>
  </div>
  <div class="mySlides w3-display-container w3-center">
    <img src="pictures/museums/museu_prado.png" style="width:100%">
    <div class="w3-display-bottommiddle w3-container w3-text-white w3-padding-32 w3-hide-small">
      <h3>Prado Museum</h3>
      <p><b>Madrid - Spain</b></p>
    </div>
  </div>
  <div class="mySlides w3-display-container w3-center">
    <img src="pictures/museums/museu_coches.png" style="width:100%">
    <div class="w3-display-bottommiddle w3-container w3-text-white w3-padding-32 w3-hide-small">
      <h3>Coach Museum </h3>
      <p><b>Lisbon - Portugal</b></p>
    </div>
  </div>

  <!-- The Band Section -->
  <div class="w3-container w3-content w3-center w3-padding-64" style="max-width:800px" id="band">
    <h2 class="w3-wide">LOCALIZARTE</h2>
    <p class="w3-opacity"><i>Find your art with a click!</i></p>
    <p class="w3-justify">Localizarte is a web-based application that allows you searching information about museums and recommends to you options according with your preferences. </p>
    <p class="w3-center"><b>Developers</b> </p>
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
  <p>This project was done in the course Informatic Laboratories IV in University of Minho.</a></p>
  <img src="pictures/assets/eng.png" class="w3-round w3-margin-bottom" alt="Tiago Silva" style="width:15%">
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
