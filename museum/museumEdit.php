<?php
require_once("../connectDB.php");

if(isSet($_SESSION['username'])){
  if(isSet($_SESSION['loginErro']) && $_SESSION['loginErro'] == 0){


if(isSet($_POST['name'])){
  $museum = $_POST['name'];
  $consult = "SELECT * FROM museums WHERE (LOWER( name ) = LOWER('".$museum."'))";
  $resultado = mysqli_query($connection,$consult);
  $registo = mysqli_fetch_row($resultado);
  $name = str_replace(' ', '_',$registo[0]);
  $refName = str_replace(' ', '-',$registo[0]);
  $image = $string = "../pictures/museums/".$name.".png";
  $horarios = explode(';',$registo[8]);
  if (!file_exists($image)) {
    $image = "../pictures/museums/museum_default.png";
  }

  if (!function_exists('str_contains')) {
    function str_contains($haystack, $needle) {
        return $needle !== '' && mb_strpos($haystack, $needle) !== false;
    }
  }

  $preferences = $registo[3];


  $art = 0;
  $biographical = 0;
  $community = 0;
  $historical = 0;
  $neighborhood = 0;
  $military = 0;
  $science = 0;
  $themed = 0;

  if(str_contains($preferences,"1")){
    $art = 1;
  }
  if(str_contains($preferences,"2")){
    $biographical = 1;
  }
  if(str_contains($preferences,"3")){
    $community = 1;
  }
  if(str_contains($preferences,"4")){
    $historical = 1;
  }
  if(str_contains($preferences,"5")){
    $neighborhood = 1;
  }
  if(str_contains($preferences,"6")){
    $military = 1;
  }
  if(str_contains($preferences,"7")){
    $science = 1;
  }
  if(str_contains($preferences,"8")){
    $themed = 1;
  }

    ?>

    <!DOCTYPE html>
    <html lang="en">
    <head>
      <title>Localizarte-<?php echo $museum ;?></title>
      <link href="../css/preferencesOnly.css" rel="stylesheet">
      <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css"/>
      <script src="https://kit.fontawesome.com/918c4f4171.js" crossorigin="anonymous"></script>
      <script type="text/javascript">
    function chk(j) {
      var total=0;
      var elem = document.getElementsByName('preferences[]');
      for(var i=0; i < elem.length; i++){
        if(elem[i].checked==true){
          total =total +1;}
      }
    } </script>
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
          <p style="font-size:150%"><?php echo $registo[0]; ?> <p/>
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
          <img src="../pictures/assets/category.png" alt="category" style="width:4%">
          <label class="labels">Categories:</label>
                    <ul class="ks-cboxtags">
                      <?php if($art == 0){ ?> <li><input type="checkbox" id="checkboxOne" name="preferences[]" value="1" onclick='chk(0)'><label for="checkboxOne">Art</label></li>
                    <?php }else{ ?> <li><input type="checkbox" id="checkboxOne" name="preferences[]" value="1" checked><label for="checkboxOne">Art</label></li> <?php  } ?>
                      <?php if($biographical == 0){ ?> <li><input type="checkbox" id="checkboxTwo" name="preferences[]" value="2" onclick='chk(1)'><label for="checkboxTwo">Biographical</label></li>
                    <?php }else{ ?> <li><input type="checkbox" id="checkboxTwo" name="preferences[]" value="2" checked><label for="checkboxTwo">Biographical</label></li> <?php  } ?>
                      <?php if($community == 0){ ?> <li><input type="checkbox" id="checkboxThree" name="preferences[]" value="3" onclick='chk(2)'><label for="checkboxThree">Community</label></li>
                    <?php }else{ ?> <li><input type="checkbox" id="checkboxThree" name="preferences[]" value="3" checked><label for="checkboxThree">Community</label></li> <?php  } ?>
                      <?php if($historical == 0){ ?> <li><input type="checkbox" id="checkboxFour" name="preferences[]" value="4" onclick='chk(3)'><label for="checkboxFour">Historical</label></li>
                    <?php }else{ ?> <li><input type="checkbox" id="checkboxFour" name="preferences[]" value="4" checked><label for="checkboxFour">Historical</label></li> <?php  } ?>
                      <?php if($neighborhood == 0){ ?> <li><input type="checkbox" id="checkboxFive" name="preferences[]" value="5" onclick='chk(4)'><label for="checkboxFive">Neighborhood</label></li>
                    <?php }else{ ?> <li><input type="checkbox" id="checkboxFive" name="preferences[]" value="5" checked><label for="checkboxFive">Neighborhood</label></li> <?php  } ?>
                      <?php if($military == 0){ ?> <li><input type="checkbox" id="checkboxSix" name="preferences[]" value="6" onclick='chk(5)'><label for="checkboxSix">Military</label></li>
                    <?php }else{ ?> <li><input type="checkbox" id="checkboxSix" name="preferences[]" value="6" checked><label for="checkboxSix">Military</label></li> <?php  } ?>
                      <?php if($science == 0){ ?> <li><input type="checkbox" id="checkboxSeven" name="preferences[]" value="7" onclick='chk(6)'><label for="checkboxSeven">Science</label></li>
                    <?php }else{ ?> <li><input type="checkbox" id="checkboxSeven" name="preferences[]" value="7" checked><label for="checkboxSeven">Science</label></li> <?php  } ?>
                      <?php if($themed == 0){ ?> <li><input type="checkbox" id="checkboxEight" name="preferences[]" value="8" onclick='chk(7)'><label for="checkboxEight">Themed</label></li>
                    <?php }else{ ?> <li><input type="checkbox" id="checkboxEight" name="preferences[]" value="8" checked><label for="checkboxEight">Themed</label></li> <?php  } ?>
                    </ul>
          <br><br>
          <label for="description"><strong>Description:</strong></label>
          <input type="text" class="form-control" required name="description" value="<?php echo $registo[6]; ?>" />
          <br><br>

          <div class="stickout orange">
              <div  text_black style="margin-top:6vh;" >
                <div class="bold_text align-center" style="margin-top:-2vh;">Schedule</div>
                <input id="date" type="time" name = "date[]" value="<?php echo str_replace('-',':',explode(',', $horarios[0])[0]); ?>">
                <input id="date" type="time" name = "date[]" value="<?php echo str_replace('-',':',explode(',', $horarios[0])[1]); ?>">
                <label>Sunday</label>
                <br><br>

                <input id="date" type="time" name = "date[]" value="<?php echo str_replace('-',':',explode(',', $horarios[1])[0]); ?>">
                <input id="date" type="time" name = "date[]" value="<?php echo str_replace('-',':',explode(',', $horarios[1])[1]); ?>">
                <label>Monday</label>

                <br><br>
                <input id="date" type="time" name = "date[]" value="<?php echo str_replace('-',':',explode(',', $horarios[2])[0]); ?>">
                <input id="date" type="time" name = "date[]" value="<?php echo str_replace('-',':',explode(',', $horarios[2])[1]); ?>">
                <label>Tuesday</label>
                <br><br>

                <input id="date" type="time" name = "date[]" value="<?php echo str_replace('-',':',explode(',', $horarios[3])[0]); ?>">
                <input id="date" type="time" name = "date[]" value="<?php echo str_replace('-',':',explode(',', $horarios[3])[1]); ?>">
                <label>Wednesday</label>
                <br><br>

                <input id="date" type="time" name = "date[]" value="<?php echo str_replace('-',':',explode(',', $horarios[4])[0]); ?>">
                <input id="date" type="time" name = "date[]" value="<?php echo str_replace('-',':',explode(',', $horarios[4])[1]); ?>">
                <label>Tahursday</label>
                <br><br>

                <input id="date" type="time" name = "date[]" value="<?php echo str_replace('-',':',explode(',', $horarios[5])[0]); ?>">
                <input id="date" type="time" name = "date[]" value="<?php echo str_replace('-',':',explode(',', $horarios[5])[1]); ?>">
                <label>Friday</label>
                <br><br>

                <input id="date" type="time" name = "date[]" value="<?php echo str_replace('-',':',explode(',', $horarios[6])[0]); ?>">
                <input id="date" type="time" name = "date[]" value="<?php echo str_replace('-',':',explode(',', $horarios[6])[1]); ?>">
                <label>Saturday</label>
              </div><br>

          </div>


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
    }
  }
else header('Location: http://localhost/LI4/login.php');
?>
