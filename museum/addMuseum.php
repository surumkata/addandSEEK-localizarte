<?php
require_once("../connectDB.php");

if(isSet($_SESSION['username'])){
  if(isSet($_SESSION['loginErro']) && $_SESSION['loginErro'] == 0){


  $art = 0;
  $biographical = 0;
  $community = 0;
  $historical = 0;
  $neighborhood = 0;
  $military = 0;
  $science = 0;
  $themed = 0;
  ?>

    <!DOCTYPE html>
    <html lang="en">
    <head>
      <title>Localizarte</title>
      <link href="../css/preferencesOnly.css" rel="stylesheet">
      <link href="../css/default.css" rel="stylesheet">
      <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css"/>
      <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
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
      <div class="w3-top orange">
        <div class="w3-bar w3-card" style="max-height:7vh;">
          <a href="../index.php">
          <img src="../pictures/assets/logo.png" class="w3-bar-item nav-button-img" alt="Logo" style="max-height:7vh;"> </a>
          <a href="../profileUser.php">
          <img class="w3-bar-item nav-button-img w3-padding-large w3-hide-small" src="../pictures/assets/profile.png" style="max-height:7vh;">
          </a>
          <a href="../sugestion.php">
          <img class="w3-bar-item nav-button-img w3-padding-large w3-hide-small" src="../pictures/assets/dice.png" style="max-height:7vh;">
          </a>
          <a href="../logout.php">
          <img class="w3-bar-item nav-button-img w3-padding-large w3-hide-small w3-right" src="../pictures/assets/logout.png" style="max-height:7vh;">
          </a>
          <form method="GET" action="search.php" style="margin-top:0vh">
            <button type="submit" class="nav-button-search" style="max-width:14vh; max-height:14vh!important;margin-top:1vh !important;border-radius:5vh;">
               <img src="../pictures/assets/search.png"  style="max-width:11vh; max-height:6vh;padding-bottom:0.4vh;">
           </button>
          <input type="text" class="w3-bar-item w3-hide-small" required name="key" id="search" style="max-width:20vh; max-height:7vh;margin-top:1vh;border-radius:5vh;">
          </form>
        </div>
      </div>


    <div class="w3-container w3-white align-center" style="margin-top:15vh;width:50%;position: relative;left: 25%;border-radius:4%;">

        <div class="bold_text align-center large_text text_black" style="margin-top:8vh;">Submisson: new museum</div>
        <form action="addUpload.php" method="post" enctype="multipart/form-data" class="regular_text" style="margin-top:8vh;height:130vh;position:relative;">
          <div class="stickout orange">
              <div  text_black style="margin-top:6vh;" >
                <div class="bold_text align-center" style="margin-top:-2vh;">Schedule</div>
                <br>
                <input id="date" type="time" name = "date[]">
                <input id="date" type="time" name = "date[]">
                <label>Sunday</label>
                <br><br>

                <input id="date" type="time" name = "date[]">
                <input id="date" type="time" name = "date[]">
                <label>Monday</label>

                <br><br>
                <input id="date" type="time" name = "date[]">
                <input id="date" type="time" name = "date[]">
                <label>Tuesday</label>
                <br><br>

                <input id="date" type="time" name = "date[]">
                <input id="date" type="time" name = "date[]">
                <label>Wednesday</label>
                <br><br>

                <input id="date" type="time" name = "date[]">
                <input id="date" type="time" name = "date[]">
                <label>Tahursday</label>
                <br><br>

                <input id="date" type="time" name = "date[]">
                <input id="date" type="time" name = "date[]">
                <label>Friday</label>
                <br><br>

                <input id="date" type="time" name = "date[]">
                <input id="date" type="time" name = "date[]">
                <label>Saturday</label>
              </div><br>

          </div>
          <img src="../pictures/assets/museumicon.png" alt="address" class="iconmuseum">
          <label for="name">Name:</label>
          <input type="text" class="thin_text medium_text text_black"  required name="name" style="margin-left:2vh;" />
          <br><br>
          <img src="../pictures/assets/location.png" alt="address" class="iconmuseum">
          <label for="address">Address:</label>
          <input type="text" class="thin_text medium_text text_black" required name="address"/>
          <br><br>
          <img src="../pictures/assets/ticket.png" alt="ticket" class="iconmuseum">
          <label for="price">Price:</label>
          <input type="float" class="thin_text medium_text text_black"  required name="price" style="margin-left:3vh;"/>
          <br><br>
          <img src="../pictures/assets/website.png" alt="site" class="iconmuseum" style="margin-left:5vh;">
          <label for="website" style="margin-right:4vh;">Site:</label>
          <input type="text" class="thin_text medium_text text_black"  required name="website" style="margin-right:2vh;"/>
          <br><br>
          <img src="../pictures/assets/contact.png" alt="contact" class="iconmuseum">
          <label for="contact">Contact:</label>
          <input type="text" class="thin_text medium_text text_black"  required name="contact" />
          <br><br>
          <div class=" w3-center"style="margin-top:2vh;" >
            <a class="regular_text"> Select image to upload:<br></a>
            <label class="custom-file-upload">
            <input type="file" required name="fileToUpload" id="fileToUpload"/>
            <?php if(isSet($_SESSION['upload'])){
              echo $_SESSION['upload'];
              unset($_SESSION['upload']);
              }
            ?>
            <label>
          </div>
          <div style="margin-top:5vh;">
          <img src="../pictures/assets/category.png " alt="category" class="iconmuseum">
          <label class="labels" >Categories:</label>
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
            </div>
          <br><br>
          <label ><strong>Description:</strong></label>
          <br><br>
          <textarea id="w3review" maxlength = "500" name="description" rows="4" cols="50" style="resize:none;">

          </textarea>


          <br><br>
          <input type="submit" class="simple-button orange" value="Submit"  />
        </form>

        <form method="POST" style="margin-bottom:5vh;">
          <input type="hidden"  name = "name" >
          <input type="submit" class="simple-button orange" value="Return"/>
        </form>



      </div>

    </body>
    <footer class="w3-container w3-center footerorange" style="margin-top:5vh;">
      <div class="small_text thin_text text_black" style="padding-top:2vh;padding-bottom:0.3vh;">University of Minho, Engineering School, <a href="https://www.eng.uminho.pt/pt" target="_blank" class="regular_text text_black">@uminho</a></div>
      <img src="../pictures/assets/eng.png" class="w3-round" alt="logo engenharia" style="width:10%">
      <div class="small_text thin_text text_black paddingfooter">Any doubts please contact us at localizarte@outlook.pt</div>
      <div class="small_text thin_text text_black paddingfooter"><a href="https://www.termsofservicegenerator.net/live.php?token=apkS3wlBfNEDkF6vR3MofdAJyG6f9QRt" target="_blank" class="regular_text text_black">Terms of conditions</a> © 2022 Localizarte</div>
      <div class="small_text thin_text text_black" style="padding-top:0.3vh;padding-bottom:2vh;">This web application was done for Laboratórios de Informática IV, subject of MIEI at University of Minho.</a></div>
    </footer>




    <?php

    }
  }
else header('Location: http://localhost/LI4/login.php');
?>
