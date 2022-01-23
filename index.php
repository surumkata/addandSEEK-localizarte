<?php
require_once("connectDB.php");
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

  <div class="mySlides w3-display-container w3-center"
          style="background-image:url('http://localhost/Li4/pictures/museums/museu_dos_coches.png');
              width: 100%;
              height: 66vh;
              background-position:center center;
              background-size:cover; ">
              <a href="http://localhost/Li4/museum/museum.php?name=Museu-dos-Coches" style="display:block; width:100%; height:100%;"></a>
                <div class="w3-display-bottommiddle w3-container w3-text-white w3-padding-32 w3-hide-small">
                  <div class="bold_text text_black large_text">Museu dos Coches
                    </div>
                  <div class="regular_text text_black medium_text">Lisbon - Portugal
                    </div>
            </div>
  </div>
  <div class="mySlides w3-display-container w3-center"
          style="background-image:url('http://localhost/Li4/pictures/museums/mus%C3%A9e_du_louvre.png');
              width: 100%;
              height: 66vh;
              background-position:center center;
              background-size:cover; ">
              <a href="http://localhost/Li4/museum/museum.php?name=Mus%C3%A9e-du-Louvre" style="display:block; width:100%; height:100%;"></a>
                <div class="w3-display-bottommiddle w3-container w3-text-white w3-padding-32 w3-hide-small">
                  <div class="bold_text text_black large_text">Musée du Louvre
                    </div>
                  <div class="regular_text text_black medium_text">Paris - France
                    </div>
            </div>
  </div>
  <div class="mySlides w3-display-container w3-center"
          style="background-image:url('http://localhost/Li4/pictures/museums/anacostia_community_museum.png');
              width: 100%;
              height: 66vh;
              background-position:center center;
              background-size:cover; ">
              <a href="http://localhost/Li4/museum/museum.php?name=Anacostia-Community-Museum" style="display:block; width:100%; height:100%;"></a>
                <div class="w3-display-bottommiddle w3-container w3-text-white w3-padding-32 w3-hide-small">
                  <div class="bold_text text_black large_text">Museu dos Coches
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
<footer class="w3-container w3-padding-64 w3-center w3-opacity w3-light-grey w3-xlarge">
  <p class="regular_text medium_text">This web application was done for <b>Laboratórios de Informática IV</b>, subject of <b>MIEI</b> at <b>University of Minho</b>.</a></p>
  <img src="pictures/assets/eng.png" class="w3-round w3-margin-bottom" alt="Tiago Silva" style="width:15%">
  <p class="w3-medium regular_text">University of Minho, Engineering School, <a href="https://www.eng.uminho.pt/pt" target="_blank" class="bold_text">@uminho</a></p>
  <p class="w3-medium regular_text">Any doubts please contact us at <b>localizarte@outlook.pt</b></p>
  <p class="w3-medium regular_text"><a href="https://www.termsofservicegenerator.net/live.php?token=apkS3wlBfNEDkF6vR3MofdAJyG6f9QRt" target="_blank" class="bold_text">Terms of conditions</a></p>
  <p class="w3-medium bold_text">© 2022 Localizarte</p>
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
