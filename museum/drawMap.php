<!-- https://medium.com/@nargessmi87/how-to-embede-open-street-map-in-a-webpage-like-google-maps-8968fdad7fe4 -->
<?php

$address = $_GET['address'];
$location = $_GET['name'];
$search_url = "https://nominatim.openstreetmap.org/search?q=".$address."&format=json";

$httpOptions = [
    "http" => [
        "method" => "GET",
        "header" => "User-Agent: Nominatim-Test"
    ]
];

$streamContext = stream_context_create($httpOptions);
$json = file_get_contents($search_url, false, $streamContext);


$decoded = json_decode($json, true);
$lat = $decoded[0]["lat"];
$lng = $decoded[0]["lon"];
$refName = str_replace(' ', '-',$location);

?>

<!DOCTYPE html>
        <html>
           <head>
              <title>OSM and Leaflet</title>
              <link rel = "stylesheet" href = "http://cdn.leafletjs.com/leaflet-0.7.3/leaflet.css"/>
              <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css"/>
              <script src="https://kit.fontawesome.com/918c4f4171.js" crossorigin="anonymous"></script>
           </head>
           <body>
             <div class="w3-top">
               <div class="w3-bar w3-orange w3-card">
                 <img href="../index.php" src="../pictures/assets/logo.png" class="w3-bar-item w3-button" alt="Logo" style="width:11%">
                 <a class="w3-bar-item w3-button w3-padding-large w3-hide-medium w3-hide-large w3-right" href="javascript:void(0)" onclick="myFunction()" title="Toggle Navigation Menu"><i class="fa fa-bars"></i></a>
                 <a href="../profileUser.php" class="w3-bar-item w3-button w3-padding-large w3-hide-small">PROFILE</a>
                 <a href="../sugestion.php" class="w3-bar-item w3-button w3-padding-large w3-hide-small">SUGESTION</a>
                 <a href="../logout.php" class="w3-bar-item w3-button w3-padding-large w3-hide-small">LOGOUT</a>
                 <form method="GET" action="../search.php">
                   <input type="text" class="w3-right" required name="key" id="search" style="margin-top:0.58%">
                 <button type="submit" class="w3-padding-large w3-button w3-hide-small w3-right"><i class="fa fa-search"></i></button>
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
