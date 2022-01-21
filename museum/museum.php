<?php
require_once("../connectDB.php");


$museum = "museu do prado";
$search = $_SESSION['searchKey'];

if(isSet($museum)){
  $consult = "SELECT * FROM museums WHERE (LOWER( name ) = LOWER('".$museum."'))";
  $resultado = mysqli_query($connection,$consult);
  $registo = mysqli_fetch_row($resultado);
  if(mysqli_num_rows($resultado) > 0){
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
      <link rel="stylesheet" href="../css/museumPage.css?ts=<?=time()?>">
    </head>
    <head>
      <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    </head>

    <body>
    <main>
      <header>
        <nav class = "nav">
            <div id = "returnButton">
              <form method="POST" action="../search.php">
                <input type="hidden" name = 'search' value="<?php echo $search; ?>"/>
                <input type="submit" value="Return" class = "button"/>
              </form>
            </div>
            <div id = "logOutButton">
              <form method="POST" action="../logout.php">
                <input type="submit" value="Log out" class = "button"/>
              </form>
          </div>
        </nav>
      </header>
      <div class="mainbody">
        <div id = "museumTitle">
          <p><?php echo $registo[0]; ?></p>
        </div>
        <div id = "museumImage">
              <img src=<?php echo $image; ?> alt="MuseumImage">
        </div>

        <h2>
          <?php
          echo $registo[1];
          ?>

        </h2>
        <h3>
          <div id = "ticketPrice">
          <img src="../pictures/assets/ticket.png" alt="ticket">
          Price: <?php echo $registo[2]; ?> $
        </div>
        </h3>
        <h4>
          <div class="webSite">
            Site: <a href = <?php echo $registo[5]; ?>> Visit <?php echo $registo[0]; ?></a>

          </div>
        </h4>

        <h5>
          <div class="contact">
            Contact: <?php echo $registo[4]; ?>
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

        <h6>
          <div class="description">
            Description: <?php echo $registo[6]; ?>
          </div>
        </h6>


        <form method="POST" action="museumEdit.php">
          <input type="hidden" value = "<?php  echo $registo[0];?>" name = "name" >
          <input type="submit" value="Edit"/>
        </form>
      </div>
    </main>
    </body>


    <?php
  }else{
    echo "museum not found";
  }
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
