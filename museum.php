
<?php
require_once("connectDB.php");


$museum = "museu do prado";

if(isSet($museum)){
  $consult = "SELECT * FROM museums WHERE (LOWER( name ) = LOWER('".$museum."'))";
  $resultado = mysqli_query($connection,$consult);
  $registo = mysqli_fetch_row($resultado);

    ?>

    <!DOCTYPE html>
    <html lang="en">
    <head>
      <title>Localizarte-<?php echo $museum ;?></title>
      <link rel="stylesheet" href="css/museumPage.css">
    </head>
    <head>
      <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    </head>

    <body>
    <main>
      <form method="POST" action="search.php">
        <input type="submit" value="Return"/>
      </form>

      <form method="POST" action="logout.php">
        <input type="submit" value="Log out"/>
      </form>

      <h1>
        <?php echo $registo[0]; ?>
      </h1>
      <img src=<?php echo $registo[4]; ?> alt="MuseumImage">
      <h2>
        <?php
        echo $registo[1];
        ?>
      </h2>
      <h3>
        <div id = "ticketPrice">
        <img src="pictures/assets/ticket.png" alt="ticket">
        Price: <?php echo $registo[2]; ?> $
      </div>
      </h3>
      <h4>
        <div class="webSite">

          Site: <?php echo $registo[6]; ?>

        </div>
      </h4>

      <h5>
        <div class="contact">
          Contact: <?php echo $registo[5]; ?>
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

        </div>
      </h6>


      <form method="POST" action="logout.php">
        <input type="submit" value="Edit"/>
      </form>

    </main>
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
