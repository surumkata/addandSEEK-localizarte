<?php
require_once("../connectDB.php");


$museum = $_POST['name'];

if(isSet($museum)){
  $consult = "SELECT * FROM museums WHERE (LOWER( name ) = LOWER('".$museum."'))";
  $resultado = mysqli_query($connection,$consult);
  $registo = mysqli_fetch_row($resultado);
  $name = str_replace(' ', '_',$registo[0]);
  $refName = str_replace(' ', '-',$registo[0]);
  $image = $string = "../pictures/museums/".$name.".png";
  if (!file_exists($image)) {
    $image = "../pictures/museums/museum_default.png";
  }

    ?>

    <!DOCTYPE html>
    <html lang="en">
    <head>
      <title>Localizarte-<?php echo $museum ;?></title>
      <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css"/>
    </head>
    <head>
      <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    </head>

    <body style="background-color:#eff4f8">
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



    <div class="w3-container w3-content w3-center w3-padding-64" style="max-width:100%" id="body">

      <form action="upload.php" method="post" enctype="multipart/form-data">
        <input type="hidden" name="oldName" value="<?php echo $museum ?>"/>
        <h1 class="w3-wide">
          <input type="text" class="form-control" required name="museumName" value="<?php echo $registo[0]; ?>" />
        </h1>

        <div class="w3-container w3-content w3-center w3-padding-64">
          <img src=<?php echo $image; ?> class="w3-image" alt="MuseumImage" name = 'image' style="width:80%"/>
          <p>Select image to upload:</p>
          <input type="file" name="fileToUpload" id="fileToUpload"/>
          <?php if(isSet($_SESSION['upload'])){
            echo $_SESSION['upload'];
            unset($_SESSION['upload']);
            }
          ?>
        </div>

        <footer class="w3-container w3-padding-32 w3-opacity w3-white w3-large" style="width:50%;position: relative;left: 25%;height:150%">
          <img src="../pictures/assets/location.png" alt="address" style="width:5%">
          <label for="address">Address:</label>
          <input type="text" class="form-control" required name="address" value="<?php echo $registo[1]; ?>"/>
          <br><br>
          <img src="../pictures/assets/ticket.png" alt="ticket" style="width:4%">
          <label for="price">Price:</label>
          <input type="float" class="form-control" required name="price" value="<?php echo $registo[2]; ?>" />
          <br><br>
          <img src="../pictures/assets/website.png" alt="site" style="width:4%">
          <label for="website">Site:</label>
          <input type="text" class="form-control" required name="website" value="<?php echo $registo[5]; ?>" />
          <br><br>
          <img src="../pictures/assets/contact.png" alt="contact" style="width:4%">
          <label for="contact">Contact:</label>
          <input type="text" class="form-control" required name="contact" value="<?php echo $registo[4]; ?>" />
          <br><br>
          <h6>
            <div class="categories">
              <?php
                $categories = explode(";",$registo[3]);
                foreach ($categories as &$value) {
                  echo $value;
                }
               ?>
               <input type="hidden" name="categories" value="<?php echo $registo[3] ?>">
            </div>
          </h6>
          <br><br>
          <label for="description"><strong>Description:</strong></label>
          <input type="text" class="form-control" required name="description" value="<?php echo $registo[6]; ?>" />

          <br><br>
          <input type="submit" class="w3-button" value="Save" style="position:relative"/>
        </form>

        <form method="POST" action="<?php echo "museum.php?name=".$refName?>">
          <input type="hidden" value = "<?php  echo $registo[0];?>" name = "name" >
          <input type="submit" class="w3-button" value="Return" style="position:relative"/>
        </form>


        </footer>
      </div>




    </body>



    <?php
  }else{
    echo "museum not found";
  }





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
