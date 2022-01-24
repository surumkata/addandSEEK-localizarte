<?php
require_once("../connectDB.php");

if(isSet($_SESSION['username'])){
  if(isSet($_SESSION['loginErro']) && $_SESSION['loginErro'] == 0){

$museum = str_replace('-', ' ',$_GET['name']);
$_SESSION['museum'] = $museum;

$visited = 0; //not visited
$r = mysqli_query($connection,"SELECT * FROM history WHERE museum ='$museum' AND username = '".$_SESSION['username']."' ");
if(mysqli_num_rows($r) > 0){
    $visited = 1; //visited
}


if(isSet($museum)){
  $consult = "SELECT * FROM museums WHERE (LOWER( name ) = LOWER('".$museum."'))";
  $resultado = mysqli_query($connection,$consult);
  $registo = mysqli_fetch_row($resultado);
  if(mysqli_num_rows($resultado) > 0){
    $name = str_replace(' ', '_',$registo[0]);
    $namepng= $name.".png";
    $image="../pictures/museums/".$namepng;
    if (!file_exists($image)) {
      $image = "../pictures/museums/museum_default.png";
      $namepng = "museum_default.png";
    }

    if (!function_exists('str_contains')) {
function str_contains($haystack, $needle) {
    return $needle !== '' && mb_strpos($haystack, $needle) !== false;
}
}

$preferences = "";

$behind = 0;

if(str_contains($registo[3],"1")){
$preferences = "Art";
$behind = 1;
}
if(str_contains($registo[3],"2")){
if($behind == 1) $preferences = $preferences." Biographical";
else {
$preferences = $preferences."Biographical";
$behind = 1;
}
}
if(str_contains($registo[3],"3")){
if($behind == 1) $preferences = $preferences." Community";
else {
$preferences = $preferences."Community";
$behind = 1;
}
}
if(str_contains($registo[3],"4")){
if($behind == 1) $preferences = $preferences." Historical";
else {
$preferences = $preferences."Historical";
$behind = 1;
}
}
if(str_contains($registo[3],"5")){
if($behind == 1) $preferences = $preferences." Neighborhood";
else {
$preferences = $preferences."Neighborhood";
$behind = 1;
}
}
if(str_contains($registo[3],"6")){
if($behind == 1) $preferences = $preferences." Military";
else {
$preferences = $preferences."Military";
$behind = 1;
}
}
if(str_contains($registo[3],"7")){
if($behind == 1) $preferences = $preferences." Science";
else {
$preferences = $preferences."Science";
$behind = 1;
}
}
if(str_contains($registo[3],"8")){
if($behind == 1) $preferences = $preferences." Themed";
else {
$preferences = $preferences."Themed";
$behind = 1;
}
}
$havecoords = 0;
if($registo[7] != ""){
  $coords = explode(",",$registo[7]);
  $lat = $coords[0];
  $lng = $coords[1];
  $havecoords = 1;
}

$horarios = explode(";",$registo[8]);

      ?>

    <!DOCTYPE html>
    <html lang="en">
    <head>
      <title>Localizarte-<?php echo $museum ;?></title>
      <link href="../css/default.css" rel="stylesheet">
      <link href="../css/table.css" rel="stylesheet">
      <link href="../css/preferencesOnly.css" rel="stylesheet">
      <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css"/>
      <link rel = "stylesheet" href = "http://cdn.leafletjs.com/leaflet-0.7.3/leaflet.css"/>
      <script src="https://kit.fontawesome.com/918c4f4171.js" crossorigin="anonymous"></script>
      <script type="text/javascript">
    function chk() {
      var elem = document.getElementsByName('visit');
      if(elem[0].checked==true ){
        window.location = 'http://stackoverflow.com';
      }
        }
      }
  </script>
    </head>
    <head>
      <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    </head>
    <body>
      <?php if($_SESSION['type'] == "user"){
        ?>
        <div class="w3-top orange">
          <div class="w3-bar w3-card" style="max-height:7vh;">
            <a href="../index.php">
            <img src="../pictures/assets/logo.png" class="w3-bar-item nav-button-img" alt="Logo" style="max-height:7vh;"> </a>
            <a href="../profileUser.php">
            <img class="w3-bar-item nav-button-img w3-padding-large w3-hide-small" src="../pictures/assets/profile.png" style="max-height:7vh;">
            </a>
            <a href="../sugestion.php">
            <img class="w3-bar-item nav-button-img w3-padding-large w3-hide-small" src="../pictures/assets/dice.png" style="max-height:7vh;">
            </a>
            <a href="../logout.php">
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
     <?php
     }else{
     ?>
     <div class="w3-top orange">
       <div class="w3-bar w3-card" style="max-height:7vh;">
         <a href="../index.php">
         <img src="../pictures/assets/logo.png" class="w3-bar-item nav-button-img" alt="Logo" style="max-height:7vh;"> </a>
         <a href="../profileUser.php">
         <img class="w3-bar-item nav-button-img w3-padding-large w3-hide-small" src="../pictures/assets/profile.png" style="max-height:7vh;">
         </a>
         <a href="../sugestion.php">
         <img class="w3-bar-item nav-button-img w3-padding-large w3-hide-small" src="../pictures/assets/dice.png" style="max-height:7vh;">
         </a>
         <a href="../requests.php">
         <img class="w3-bar-item nav-button-img w3-padding-large w3-hide-small" src="../pictures/assets/requests.png" style="max-height:7vh;">
         </a>
         <a href="../logout.php">
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
     <?php
     }
     ?>

    <div class= "w3-display-container w3-center"
            style="background-image:url('http://localhost/Li4/pictures/museums/<?php echo $namepng;?>');
                width: 100%;
                height: 66vh;
                background-position:center center;
                background-size:cover;">
    </div>
    <center>
    <div class="bold_text text_black large_text" style="padding-top:2vh;padding-bottom:2vh">
      <?php echo $registo[0]; ?>
    </div>
    </center>
    <div class="text_black regular_text w3-container" style="max-width:100%;" id="body">
        <div class="w3-container w3-white w3-padding-32 medium_text" style="width:100%;height: 100%;border-radius: 8vh;">
          <div class="w3-half">
          <div>
            <img src="../pictures/assets/location.png" alt="address" class="iconmuseum">
            <a class="bold_text large_text">Address: </a><a class="thin_text"><?php echo $registo[1];?> </a>
          </div>


          <div>
            <img src="../pictures/assets/ticket.png" alt="ticket" class="iconmuseum">
            <a class="bold_text large_text">Price: </a><?php echo $registo[2]; ?> $</a>
          </div>


          <div>
            <img src="../pictures/assets/website.png" alt="site" class="iconmuseum">
            <a class="bold_text large_text">Site: </a><a href = <?php echo $registo[5]; ?>> Visit <?php echo $registo[0]; ?></a>
          </div>

          <div>
            <img src="../pictures/assets/contact.png" alt="contact" class="iconmuseum">
            <a class="bold_text large_text">Contact: </a><?php echo $registo[4]; ?></a>
          </div>

          <div>
            <img src="../pictures/assets/category.png" alt="categories" class="iconmuseum">
            <a class="bold_text large_text">Categories: </a><?php echo $preferences ?></a>
          </div>

          <div>
            <ul class="ks-cboxtags" style="padding:0vh;margin:0vh">
              <img src="../pictures/assets/visited.png" alt="categories" class="iconmuseum">
              <a class="bold_text large_text">Have you ever visited this museum?</a>
            <?php if($visited == 0){ ?> <li><input type="checkbox" id="checkboxOne" name="visit" onclick='window.location.assign("insertVisited.php")'><label for="checkboxOne">Visited</label></li>
            <?php }else{ ?> <li><input type="checkbox" id="checkboxOne" name="visit"  checked onclick='window.location.assign("deleteVisited.php")'><label for="checkboxOne">Visited</label></li> <?php  } ?>
            </ul>
          </div>



          <div>
            <img src="../pictures/assets/Description.png" alt="categories" class="iconmuseum">
            <a class="bold_text large_text">Description: </a>
            <div class="w3-container w3-padding-16 medium_text" style="width:90%;height: 100%;margin-left: 3vh;margin-top: 1vh;padding: 3vh;border-radius: 5vh;background-color:#EFF4F8">
              <?php echo $registo[6]; ?></a>
            </div>
          </div>
          </div>
            <div class="w3-half">
              <?php if($havecoords == 1){ ?><div id = "map" style = "position:relative;width: 90%; height: 65vh;border-radius:5vh"></div>
              <?php }else{ ?> <p style="font-size:150%">Could not display a map with the given address.</p> <?php } ?>
              <script src = "http://cdn.leafletjs.com/leaflet-0.7.3/leaflet.js"></script>
              <script>
                 // Creating map options
                 var lat = "<?php echo $lat ;?>";
                 var lon = "<?php echo $lng ;?>";
                 var name = "<?php echo $museum; ?>";
                 var mapOptions = {
                    center: [lat, lon],
                    zoom: 18
                 }

                 // Creating a map object
                 var map = new L.map('map', mapOptions);

                 // Creating a Layer object
                 var layer = new L.TileLayer('http://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png');
                 L.marker([lat, lon]).addTo(map)
                  .bindPopup('Here is ' + name)
                  .openPopup();
                 // Adding layer to the map
                 map.addLayer(layer);
              </script>

          </div>
        </div>

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
            <td><?php if(isSet($horarios[0]) && $horarios[0]!="" && $horarios[0]!="-,-"){ echo $horarios[0]; }else { echo "Encerrado";}?></td>
            <td><?php if(isSet($horarios[1]) && $horarios[1]!="" && $horarios[1]!="-,-"){ echo $horarios[1]; }else { echo "Encerrado";}?></td>
            <td><?php if(isSet($horarios[2]) && $horarios[2]!="" && $horarios[2]!="-,-"){ echo $horarios[2]; }else { echo "Encerrado";}?></td>
            <td><?php if(isSet($horarios[3]) && $horarios[3]!="" && $horarios[3]!="-,-"){ echo $horarios[3]; }else { echo "Encerrado";}?></td>
            <td><?php if(isSet($horarios[4]) && $horarios[4]!="" && $horarios[4]!="-,-"){ echo $horarios[4]; }else { echo "Encerrado";}?></td>
            <td><?php if(isSet($horarios[5]) && $horarios[5]!="" && $horarios[5]!="-,-"){ echo $horarios[5]; }else { echo "Encerrado";}?></td>
            <td><?php if(isSet($horarios[6]) && $horarios[6]!="" && $horarios[6]!="-,-"){ echo $horarios[6]; }else { echo "Encerrado";}?></td>
          </tbody>
        </table>
      </div>

      <div>
        <form method="POST" action="museumEdit.php" style="position:relative;left:75%">
          <a class="align-center">Did you see any wrong information?</a>
          <input type="hidden" value = "<?php  echo $registo[0];?>" name = "name" ></input>
          <input type="submit" class="text_orange w3-button" value="edit" style="height:1%;"></input>
        </form>
      </div>

    </div>
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
    echo "museum not found";
  }
}
}
}
else header('Location: http://localhost/LI4/login.php');

/*
     $going= 'Indore, MP 452001';
    $address =$going; // Google HQ
    $prepAddr = str_replace(' ','+',$address);
    $apiKey = 'AIzaSyD9wpDRjXQU1JeKfzGgv0VzVIJYhLhJrnI'; // Google maps now requires an API key.

    $geocode=file_get_contents('https://maps.googleapis.com/maps/api/geocode/json?address='.urlencode($address).'&sensor=false&key='.$apiKey);

    print_r($geocode);

    $output= json_decode($geocode);
    $latitude = $output->results[0]->geometry->location->lat;
    $longitude = $output->results[0]->geometry->location->lng;
    */
?>
