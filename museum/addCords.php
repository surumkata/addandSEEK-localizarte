<?php
require_once("../connectDB.php");

if(isSet($_SESSION['username'])){
  if(isSet($_SESSION['loginErro']) && $_SESSION['loginErro'] == 0){
    if($_SESSION['type'] == "admin"){
      if(isSet($_GET['n']) && isSet($_GET['d']) ){
        ?>
        <html>
         <head>
            <title>Set coordinates</title>
            <link href="../css/default.css" rel="stylesheet">
            <link rel = "stylesheet" href = "http://cdn.leafletjs.com/leaflet-0.7.3/leaflet.css"/>
            <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css"/>
            <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-alpha1/dist/css/bootstrap.min.css">

         </head>
         <body>
        <div class="w3-center w3-container w3-white  " style="margin-top:10vh;height:80vh; margin-left:40vh; margin-right:40vh;border-radius:5vh;">
          <div class="w3-half" >
              <div id = "map" style = "position:relative;width: 60vh; height: 60vh;margin-top:10vh; margin-left:10vh; border-radius:2vh;"></div>
          </div>
          <div class="w3-half">
           <form action="uploadCords.php" method="post"style="margin-top:16vh; margin-left:10vh; ">
             <div class="bold_text large_text text_black " style="margin-bottom:4vh">Set coordinates</div>
           <label class="regular_text medium_text text_black ">Latitude:</label>
           <br>
           <input type="text" class="thin_text medium_text text_black " required name="lat" id="lat" onchange="redraw()" style="padding-left:2vh; border-style: solid;border-radius:3vh;margin-top:1vh; max-width:30vh;">
           <br><br>
           <label class="regular_text medium_text text_black ">Longitude:</label>
           <br>
            <input type="text" class="thin_text medium_text text_black " required name="lon" id="lon" onchange="redraw()" style="padding-left:2vh; border-style: solid;border-radius:3vh;margin-top:1vh; max-width:30vh;">
           <br><br>
           <input type="submit" class="simple-button" value="Set" style="width:18vh;">

           </form>
           </div>

        </div>
            <script src = "http://cdn.leafletjs.com/leaflet-0.7.3/leaflet.js"></script>
            <script>
               // Creating map options
               //cafe gonçalves
               var lat = 41.57385696214442;
               var lon = -8.266621002173164;
               var mapOptions = {
                  center: [lat, lon],
                  zoom: 18
               }
               // Creating a map object
               var map = new L.map('map', mapOptions);

               // Creating a Layer object
               var layer = new L.TileLayer('http://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png');
               // Adding layer to the map
               map.addLayer(layer);

               function redraw(){
                 // Creating a map object
                map.panTo(new L.LatLng(document.getElementById("lat").value, document.getElementById("lon").value));

               }

            </script>


         </body>

      </html>




<?php
    }else{
          header('Location: http://localhost:8888/index.php');
        }
      }else{
        echo "Permition Denied";
      }
    }
}else header('Location: http://localhost:8888/login.php');
 ?>
