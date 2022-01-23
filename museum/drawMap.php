<!-- https://medium.com/@nargessmi87/how-to-embede-open-street-map-in-a-webpage-like-google-maps-8968fdad7fe4 -->
<?php
require_once("../connectDB.php");

if(isSet($_SESSION['username'])){
  if(isSet($_SESSION['loginErro']) && $_SESSION['loginErro'] == 0){


  $address = $_GET['address'];
  $location = $_GET['name'];

  $refName = str_replace(' ', '-',$location);
  if(isSet($address)){
  $coords = explode(", ",$address);
  $lat = $coords[0];
  $lng = $coords[1];

?>

<!DOCTYPE html>
        <html>
           <head>
              <title>Map</title>
              <link href="../css/default.css" rel="stylesheet">
              <link rel = "stylesheet" href = "http://cdn.leafletjs.com/leaflet-0.7.3/leaflet.css"/>
              <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css"/>
              <script src="https://kit.fontawesome.com/918c4f4171.js" crossorigin="anonymous"></script>
           </head>
           <body>
             <div class="w3-top orange" style="height:8vh">
               <div class="w3-bar w3-card" style="height:8vh">
                 <a href="../index.php">
                 <img src="../pictures/assets/logo.png" class="w3-bar-item nav-button-img" alt="Logo"> </a>
                 <a href="../profileUser.php">
                 <img class="w3-bar-item nav-button-img w3-padding-large w3-hide-small" src="../pictures/assets/profile.png" width="50" height="50">
                 </a>
                 <a href="../sugestion.php">
                 <img class="w3-bar-item nav-button-img w3-padding-large w3-hide-small" src="../pictures/assets/dice.png" width="50" height="50">
                 </a>
                 <a href="../logout.php">
                 <img class="w3-bar-item nav-button-img w3-padding-large w3-hide-small w3-right" src="../pictures/assets/logout.png" width="50" height="50">
                 </a>
                 <form method="GET" action="../search.php">
                   <button type="submit" class="nav-button-search">
                      <img src="../pictures/assets/search.png"  style="max-widht:5vh; max-height:5vh;">
                  </button>
                 <input type="text" class="w3-bar-item nav-button w3-padding-large w3-hide-small" required name="key" id="search">
                 </form>
               </div>
             </div>
              <div id = "map" style = "position:relative;width: 900px; height: 580px;left:20%;top:10vh"></div>
              <script src = "http://cdn.leafletjs.com/leaflet-0.7.3/leaflet.js"></script>
              <script>
                 // Creating map options
                 var lat = "<?php echo $lat ;?>";
                 var lon = "<?php echo $lng ;?>";
                 var name = "<?php echo $location; ?>";
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
              <div style="position:relative;top:10vh;left:95vh;font-size:150%">
                <form method="POST" action="<?php echo "museum.php?name=".$refName?>">
                  <input type="hidden" value = "<?php  echo $location;?>" name = "name" >
                  <input type="submit" class="w3-button" value="Return" style="position:relative"/>
                </form>
              </div>
           </body>

        </html>
<?php
}
else{

?>
<!DOCTYPE html>
        <html>
           <head>
              <title><?php echo $location; ?> map</title>
              <link href="../css/default.css" rel="stylesheet">
              <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css"/>
              <script src="https://kit.fontawesome.com/918c4f4171.js" crossorigin="anonymous"></script>
           </head>
           <body style="background:#eff4f8">


             <div class="w3-top orange" style="height:8vh">
               <div class="w3-bar w3-card" style="height:8vh">
                 <a href="../index.php">
                 <img src="../pictures/assets/logo.png" class="w3-bar-item nav-button-img" alt="Logo"> </a>
                 <a href="../profileUser.php">
                 <img class="w3-bar-item nav-button-img w3-padding-large w3-hide-small" src="../pictures/assets/profile.png" width="50" height="50">
                 </a>
                 <a href="../sugestion.php">
                 <img class="w3-bar-item nav-button-img w3-padding-large w3-hide-small" src="../pictures/assets/dice.png" width="50" height="50">
                 </a>
                 <a href="../logout.php">
                 <img class="w3-bar-item nav-button-img w3-padding-large w3-hide-small w3-right" src="../pictures/assets/logout.png" width="50" height="50">
                 </a>
                 <form method="GET" action="../search.php">
                   <button type="submit" class="nav-button-search">
                      <img src="../pictures/assets/search.png"  style="max-widht:5vh; max-height:5vh;">
                  </button>
                 <input type="text" class="w3-bar-item nav-button w3-padding-large w3-hide-small" required name="key" id="search">
                 </form>
               </div>
             </div>
             <div class="w3-container w3-content w3-center w3-padding-64"  id="body">
               <br>
                 <footer class="w3-container w3-padding-64 w3-center-align w3-opacity w3-white w3-large" style="width:100%;height:150%">
                   <p style="font-size:150%">Could not display a map with the given address.</p>
                 </footer>
             </div>
             <div style="position:relative;left:95vh;font-size:150%">
               <form method="POST" action="<?php echo "museum.php?name=".$refName?>">
                 <input type="hidden" value = "<?php  echo $location;?>" name = "name" >
                 <input type="submit" class="w3-button" value="Return" style="position:relative"/>
               </form>
             </div>
          </body>


<?php
    }
  }
}else header('Location: http://localhost/LI4/login.php')
 ?>
