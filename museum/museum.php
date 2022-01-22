<?php
require_once("../connectDB.php");


$museum = str_replace('-', ' ',$_GET['name']);

//add to history
mysqli_query($connection,"INSERT INTO history (museum,username) values('$museum','".$_SESSION['username']."') ");

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

      ?>

    <!DOCTYPE html>
    <html lang="en">
    <head>
      <title>Localizarte-<?php echo $museum ;?></title>
      <link rel="stylesheet" href="../css/museumPage.css?ts=<?=time()?>">
      <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
      <script src="https://kit.fontawesome.com/918c4f4171.js" crossorigin="anonymous"></script>
    </head>
    <head>
      <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
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
        <h1 class="w3-wide"><?php echo $registo[0]; ?></h1>
        <div style="padding:3%">
          <img src=<?php echo $image;?> class="w3-image" alt="Museum" style="width:70%">
        </div>
        <footer class="w3-container w3-padding-64 w3-left-align w3-opacity w3-white w3-large" style="width:100%;height:150%">
          <a href="drawMap.php?address=<?php echo $registo[1];?>&name=<?php echo $museum; ?>">
            <img src="../pictures/assets/location.png" alt="address" style="width:5%">
          </a>
          <a>Adress: <?php echo $registo[1];?> </a>
          <br><br>
          <img src="../pictures/assets/ticket.png" alt="ticket" style="width:4%">
          <a>Price: <?php echo $registo[2]; ?> $</a>
          <br><br>
          <img src="../pictures/assets/website.png" alt="site" style="width:4%">
          <a>Site:  <a href = <?php echo $registo[5]; ?>> Visit <?php echo $registo[0]; ?></a>
          <br><br>
          <img src="../pictures/assets/contact.png" alt="contact" style="width:4%">
          <a>Contact: <?php echo $registo[4]; ?></a>
          <br><br>
          <img src="../pictures/assets/category.png" alt="categories" style="width:4%">
          <a>Categories:<?php echo $preferences ?></a>
           <br><br>
           <a><strong>Description:</strong><p><?php echo $registo[6]; ?></p></a>

           <form method="POST" action="museumEdit.php">
             <input type="hidden" value = "<?php  echo $registo[0];?>" name = "name" >
             <input type="submit" class="w3-button" value="Edit" style="position:relative;left:90%"/>
           </form>
        </footer>

    </div>
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
