<?php
require_once("db/connectDB.php");
$_SESSION['loginErro'] = 0;
?>


<!DOCTYPE html>
<html lang="en">
<title>Home</title>
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
    <div class="w3-bar w3-card" style="max-height:7vh;">
      <a href="index.php">
      <img src="pictures/assets/logo.png" class="w3-bar-item nav-button-img" alt="Logo" style="max-height:7vh;"> </a>
      <a href="authentication/login.php">
      <img class="w3-bar-item nav-button-img w3-padding-large w3-hide-small w3-right" src="pictures/assets/login.png" style="max-height:7vh;">
      </a>
      <a href="authentication/register.php">
      <img class="w3-bar-item nav-button-img w3-padding-large w3-hide-small w3-right" src="pictures/assets/register.png" style="max-height:7vh;">
      </a>
    </div>
  </div>
<?php
}else{ //logged in

 if($_SESSION['type'] == "user"){
   ?>
   <div class="w3-top orange">
     <div class="w3-bar w3-card" style="max-height:7vh;">
       <a href="index.php">
       <img src="pictures/assets/logo.png" class="w3-bar-item nav-button-img" alt="Logo" style="max-height:7vh;"> </a>
       <a href="profile/profileUser.php">
       <img class="w3-bar-item nav-button-img w3-padding-large w3-hide-small" src="pictures/assets/profile.png" style="max-height:7vh;">
       </a>
       <a href="sugestion.php">
       <img class="w3-bar-item nav-button-img w3-padding-large w3-hide-small" src="pictures/assets/dice.png" style="max-height:7vh;">
       </a>
       <a href="authentication/logout.php">
       <img class="w3-bar-item nav-button-img w3-padding-large w3-hide-small w3-right" src="pictures/assets/logout.png" style="max-height:7vh;">
       </a>
       <form method="GET" action="search.php" style="margin-top:0vh">
         <button type="submit" class="nav-button-search" style="max-width:14vh; max-height:14vh!important;margin-top:1vh !important;border-radius:5vh;">
            <img src="pictures/assets/search.png"  style="max-width:11vh; max-height:6vh;padding-bottom:0.4vh;">
        </button>
       <input type="text" class="w3-bar-item w3-hide-small" required name="key" id="search" style="max-width:20vh; max-height:7vh;margin-top:1vh;border-radius:5vh;">
       </form>
     </div>
   </div>
<?php
}else{
?>
<div class="w3-top orange">
  <div class="w3-bar w3-card" style="max-height:7vh;">
    <a href="index.php">
    <img src="pictures/assets/logo.png" class="w3-bar-item nav-button-img" alt="Logo" style="max-height:7vh;"> </a>
    <a href="profile/profileUser.php">
    <img class="w3-bar-item nav-button-img w3-padding-large w3-hide-small" src="pictures/assets/profile.png" style="max-height:7vh;">
    </a>
    <a href="sugestion.php">
    <img class="w3-bar-item nav-button-img w3-padding-large w3-hide-small" src="pictures/assets/dice.png" style="max-height:7vh;">
    </a>
    <a href="requests/requests.php">
    <img class="w3-bar-item nav-button-img w3-padding-large w3-hide-small" src="pictures/assets/requests.png" style="max-height:7vh;">
    </a>
    <a href="authentication/logout.php">
    <img class="w3-bar-item nav-button-img w3-padding-large w3-hide-small w3-right" src="pictures/assets/logout.png" style="max-height:7vh;">
    </a>
    <form method="GET" action="search.php" style="margin-top:0vh">
      <button type="submit" class="nav-button-search" style="max-width:14vh; max-height:14vh!important;margin-top:1vh !important;border-radius:5vh;">
         <img src="pictures/assets/search.png"  style="max-width:11vh; max-height:6vh;padding-bottom:0.4vh;">
     </button>
    <input type="text" class="w3-bar-item w3-hide-small" required name="key" id="search" style="max-width:20vh; max-height:7vh;margin-top:1vh;border-radius:5vh;">
    </form>
  </div>
</div>
<?php
}}
?>

<!-- Page content -->
<div class="w3-content" style="max-width:2000px;margin-top:46px">

  <!-- Automatic Slideshow Images -->

  <div class="mySlides w3-display-container w3-center"
          style="background-image:url('http://localhost/LI4/src/pictures/museums/museu_dos_coches.png');
              width: 100%;
              height: 66vh;
              background-position:center center;
              background-size:cover; ">
              <a href="http://localhost/LI4/src/museum/museum.php?name=Museu-dos-Coches" style="display:block; width:100%; height:100%;"></a>
                <div class="w3-display-bottommiddle w3-container w3-text-white w3-padding-32 w3-hide-small">
                  <div class="bold_text text_black large_text">Museu dos Coches
                    </div>
                  <div class="regular_text text_black medium_text">Lisbon - Portugal
                    </div>
            </div>
  </div>
  <div class="mySlides w3-display-container w3-center"
          style="background-image:url('http://localhost/LI4/src/pictures/museums/mus%C3%A9e_du_louvre.png');
              width: 100%;
              height: 66vh;
              background-position:center center;
              background-size:cover; ">
              <a href="http://localhost/LI4/src/museum/museum.php?name=Mus%C3%A9e-du-Louvre" style="display:block; width:100%; height:100%;"></a>
                <div class="w3-display-bottommiddle w3-container w3-text-white w3-padding-32 w3-hide-small">
                  <div class="bold_text text_black large_text">Musée du Louvre
                    </div>
                  <div class="regular_text text_black medium_text">Paris - France
                    </div>
            </div>
  </div>
  <div class="mySlides w3-display-container w3-center"
          style="background-image:url('http://localhost/LI4/src/pictures/museums/anacostia_community_museum.png');
              width: 100%;
              height: 66vh;
              background-position:center center;
              background-size:cover; ">
              <a href="http://localhost/LI4/src/museum/museum.php?name=Anacostia-Community-Museum" style="display:block; width:100%; height:100%;"></a>
                <div class="w3-display-bottommiddle w3-container w3-text-white w3-padding-32 w3-hide-small">
                  <div class="bold_text text_black large_text">Anacostia Community Museum
                    </div>
                  <div class="regular_text text_black medium_text">Washington - USA
                    </div>
            </div>
  </div>

  <!-- The Band Section -->
  <div class="w3-container w3-content w3-center w3-padding-64" style="max-width:800px" id="band">
    <img src="pictures/assets/logo.png" alt="Logo" style="width:50%">
    <p class="w3-opacity regular_text">Art is just a click away</p>
    <p class="w3-justify regular_text">Localizarte is a web-based application that allows you searching information about museums and recommends to you options according with your preferences. </p>
    <p class="w3-center"><b>Developers</b> </p>
    <div class="w3-row w3-padding-32">
      <div class="w3-quarter regular_text">
        <img src="pictures/assets/braz.png" class="w3-round w3-margin-bottom" alt="Gonçalo Braz" style="width:60%">
        <p>Gonçalo Braz</p>
        <p>a93178
        <a href="https://github.com/brazafonso">
        <img class="w3-center" src="pictures/assets/github.png" width="20" height="20">
        </a>
        </p>
      </div>
      <div class="w3-quarter regular_text">
        <img src="pictures/assets/pereira.png" class="w3-round w3-margin-bottom" alt="Gonçalo Pereira" style="width:60%">
        <p>Gonçalo Pereira</p>
        <p>a93168
        <a href="https://github.com/realRunlo">
        <img class="w3-center" src="pictures/assets/github.png" width="20" height="20">
        </a>
        </p>
      </div>
      <div class="w3-quarter regular_text">
        <img src="pictures/assets/cunha.png" class="w3-round w3-margin-bottom" alt="Simão Cunha" style="width:60%">
        <p>Simão Cunha</p>
        <p>a93262
        <a href="https://github.com/simaocunha71">
        <img class="w3-center" src="pictures/assets/github.png" width="20" height="20">
        </a>
        </p>

      </div>
      <div class="w3-quarter regular_text">
        <img src="pictures/assets/silva.png" class="w3-round w3-margin-bottom" alt="Tiago Silva" style="width:60%">
        <p>Tiago Silva</p>
        <p>a93277
        <a href="https://github.com/Surumkata">
        <img class="w3-center" src="pictures/assets/github.png" width="20" height="20">
        </a>
        </p>
      </div>
    </div>
  </div>


<!-- End Page Content -->
</div>

<!-- Footer -->
<footer class="w3-container w3-center footerorange">
  <div class="small_text thin_text text_black" style="padding-top:2vh;padding-bottom:0.3vh;">University of Minho, Engineering School, <a href="https://www.eng.uminho.pt/pt" target="_blank" class="regular_text text_black">@uminho</a></div>
  <img src="pictures/assets/eng.png" class="w3-round" alt="Tiago Silva" style="width:10%">
  <div class="small_text thin_text text_black paddingfooter">Any doubts please contact us at localizarte@outlook.pt</div>
  <div class="small_text thin_text text_black paddingfooter"><a href="https://www.termsofservicegenerator.net/live.php?token=apkS3wlBfNEDkF6vR3MofdAJyG6f9QRt" target="_blank" class="regular_text text_black">Terms of conditions</a> © 2022 Localizarte</div>
  <div class="small_text thin_text text_black" style="padding-top:0.3vh;padding-bottom:2vh;">This web application was done for Laboratórios de Informática IV, subject of MIEI at University of Minho.</a></div>
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
