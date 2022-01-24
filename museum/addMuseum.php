<?php
require_once("../connectDB.php");

if(isSet($_SESSION['username'])){
  if(isSet($_SESSION['loginErro']) && $_SESSION['loginErro'] == 0){


if(true){


  $art = 0;
  $biographical = 0;
  $community = 0;
  $historical = 0;
  $neighborhood = 0;
  $military = 0;
  $science = 0;
  $themed = 0;
/*
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
  }*/

  ?>

    <!DOCTYPE html>
    <html lang="en">
    <head>
      <title>Localizarte</title>
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

      <form action="addupload.php" method="post" enctype="multipart/form-data">

        <div class="w3-container w3-content w3-center w3-padding-64">
          <p>Select image to upload:</p>
          <input type="file" name="fileToUpload" id="fileToUpload"/>
          <?php if(isSet($_SESSION['upload'])){
            echo $_SESSION['upload'];
            unset($_SESSION['upload']);
            }
          ?>
        </div>

        <footer class="w3-container w3-padding-32 w3-opacity w3-white w3-large" style="width:50%;position: relative;left: 25%;height:160%">
          <label for="name">Name:</label>
          <input type="text" class="form-control"  required name="name" />
          <br><br>
          <img src="../pictures/assets/location.png" alt="address" style="width:5%">
          <label for="address">Address:</label>
          <input type="text" class="form-control" required name="address"/>
          <br><br>
          <img src="../pictures/assets/ticket.png" alt="ticket" style="width:4%">
          <label for="price">Price:</label>
          <input type="float" class="form-control" required name="price"/>
          <br><br>
          <img src="../pictures/assets/website.png" alt="site" style="width:4%">
          <label for="website">Site:</label>
          <input type="text" class="form-control" required name="website"/>
          <br><br>
          <img src="../pictures/assets/contact.png" alt="contact" style="width:4%">
          <label for="contact">Contact:</label>
          <input type="text" class="form-control" required name="contact"/>
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
          <br><br>
          <textarea id="w3review" name="w3review" rows="4" cols="50">

          </textarea>


          <br><br>
          <input type="submit" class="w3-button" value="Submit" style="position:relative"/>
        </form>

        <form method="POST"
          <input type="hidden"  name = "name" >
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
else header('Location: http://localhost:8888/login.php');
?>
