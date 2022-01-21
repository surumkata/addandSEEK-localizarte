<?php
require_once("../connectDB.php");


$museum = $_POST['name'];

if(isSet($museum)){
  $consult = "SELECT * FROM museums WHERE (LOWER( name ) = LOWER('".$museum."'))";
  $resultado = mysqli_query($connection,$consult);
  $registo = mysqli_fetch_row($resultado);
  $name = str_replace(' ', '_',$registo[0]);
  $image = $string = "../pictures/museums/".$name.".png";
  if (!file_exists($image)) {
    $image = "../pictures/museums/museum_default.png";
  }

    ?>

    <!DOCTYPE html>
    <html lang="en">
    <head>
      <title>Localizarte-<?php echo $museum ;?></title>
      <link rel="stylesheet" href="../css/museumPage.css">
    </head>
    <head>
      <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    </head>

    <body>
    <main>
    <form action="upload.php" method="post" enctype="multipart/form-data">
      <input type="hidden" name="oldName" value="<?php echo $museum ?>">
      <h1>
        <input type="text" class="form-control" required name="museumName" value="<?php echo $registo[0]; ?>" $
      </h1>

      <h3 id = "museumImage">
      <div  >
            <img src=<?php echo $image; ?> alt="MuseumImage" name = 'image' width="20%" height="20%">
            Select image to upload:
            <input type="file" name="fileToUpload" id="fileToUpload">
            <?php if(isSet($_SESSION['upload'])){
              echo $_SESSION['upload'];
              unset($_SESSION['upload']);
              }
            ?>
      </div>
    </h3>

      <h2>
        <div >
        <label for="address">Address:</label>
        <input type="text" class="form-control" required name="address" value="<?php echo $registo[1]; ?>"/>
      </div>
      </h2>

      <h3 id = "ticketPrice">
        <div >
        <img src="../pictures/assets/ticket.png" alt="ticket">
        <label for="price">Price:</label>
        <input type="float" class="form-control" required name="price" value="<?php echo $registo[2]; ?>" />

      </div>
      </h3>
      <h4>
        <div class="webSite">

          <label for="website">Site:</label>
          <input type="text" class="form-control" required name="website" value="<?php echo $registo[5]; ?>" />

        </div>

        </div>
      </h4>

      <h5>
        <div class="contact">
          <label for="contact">Contact:</label>
          <input type="text" class="form-control" required name="contact" value="<?php echo $registo[4]; ?>" />

        </div>
      </h5>

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

      <h4>
        <div class="description">

          <label for="description">Description:</label>
          <input type="text" class="form-control" required name="description" value="<?php echo $registo[6]; ?>" />

        </div>

        </div>
      </h4>


        <input type="submit" value="Save"/>
      </form>

      <form action="museum.php" method="post">
        <input type="submit" value="Return"/>
      </form>

    </main>
    </body>

    <script>

    function changeImage()
    {
    var img = document.getElementById("image");
    img.src="images/test2";
    return false;
    }

    </script>



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
