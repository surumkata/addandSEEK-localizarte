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
    <title>Localizarte-<?php echo $museum ;?></title>
    <link href="../css/default.css" rel="stylesheet">
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


    <?php if($_SESSION['type'] == "user"){
      ?>
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
          <form method="GET" action="../search.php" style="margin-top:0vh">
            <button type="submit" class="nav-button-search" style="max-width:14vh; max-height:14vh!important;margin-top:1vh !important;border-radius:5vh;">
               <img src="../pictures/assets/search.png"  style="max-width:11vh; max-height:6vh;padding-bottom:0.4vh;">
           </button>
          <input type="text" class="w3-bar-item w3-hide-small" required name="key" id="search" style="max-width:20vh; max-height:5vh;margin-top:1vh;border-radius:5vh;">
          </form>
        </div>
      </div>
   <?php
   }else{
   ?>
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
       <a href="../requests.php">
       <img class="w3-bar-item nav-button-img w3-padding-large w3-hide-small" src="../pictures/assets/requests.png" style="max-height:7vh;">
       </a>
       <a href="../logout.php">
       <img class="w3-bar-item nav-button-img w3-padding-large w3-hide-small w3-right" src="../pictures/assets/logout.png" style="max-height:7vh;">
       </a>
       <form method="GET" action="../search.php" style="margin-top:0vh">
         <button type="submit" class="nav-button-search" style="max-width:14vh; max-height:14vh!important;margin-top:1vh !important;border-radius:5vh;">
            <img src="../pictures/assets/search.png"  style="max-width:11vh; max-height:6vh;padding-bottom:0.4vh;">
        </button>
       <input type="text" class="w3-bar-item w3-hide-small" required name="key" id="search" style="max-width:20vh; max-height:5vh;margin-top:1vh;border-radius:5vh;">
       </form>
     </div>
   </div>
   <?php
   }
   ?>

  <div class="w3-container regular_text" style="max-width:100%; padding-top: 15vh;" id="body">

    <form action="addUpload.php" method="post" enctype="multipart/form-data">

      <div class="w3-container w3-white w3-large w3-center" style="width:50%;position: relative;left: 25%;height:150%;border-radius:5vh;padding-top:5vh;">
        <label for="address">Museum's Name:</label>
        <br>
        <textarea class="" name="name" required style="border-radius:3vh;padding-left:1vh;padding-top: 0.5vh;width:30vh;height:5vh;resize:none;overflow: hidden;"></textarea><br><br>

        <div class="w3-container w3-center" style="margin-bottom:5vh;">
          <p>Museum's picture: (Select image to upload)</p>
          <input type="file" required name="fileToUpload" id="fileToUpload"/>
          <?php if(isSet($_SESSION['upload'])){
            echo $_SESSION['upload'];
            unset($_SESSION['upload']);
            }
          ?>
        </div>
        <img src="../pictures/assets/location.png" alt="address" style="width:5%;padding-bottom:1vh;">
        <label for="address">Address:</label>
        <br>
        <textarea class="" name="address" required style="border-radius:3vh;padding-left:1vh;padding-top: 0.5vh;width:30vh;height:5vh;resize:none;overflow: hidden;"></textarea><br><br>
        <img src="../pictures/assets/ticket.png" alt="ticket" style="width:5%;padding-bottom:1vh;">
        <label for="price">Price:</label><br>
        <textarea class="" name="price" required style="border-radius:3vh;padding-left:1vh;padding-top: 0.5vh;width:30vh;height:5vh;resize:none;overflow: hidden;"></textarea><br><br>
        <img src="../pictures/assets/website.png" alt="site" style="width:5%;padding-bottom:1vh;">
        <label for="website">Site:</label><br>
        <textarea class="" name="website" style="border-radius:3vh;padding-left:1vh;padding-top: 0.5vh;width:30vh;height:5vh;resize:none;overflow: hidden;"></textarea><br><br>
        <img src="../pictures/assets/contact.png" alt="contact" style="width:5%;padding-bottom:1vh;">
        <label for="contact">Contact:</label><br>
        <textarea class="" name="contact" style="border-radius:3vh;padding-left:1vh;padding-top: 0.5vh;width:30vh;height:5vh;resize:none;overflow: hidden;"></textarea><br><br>
        <img src="../pictures/assets/category.png" alt="category" style="width:5%;padding-bottom:1vh;">
        <label class="labels">Categories:</label>
                  <ul class="ks-cboxtags" style="margin:0vh;">
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


        <img src="../pictures/assets/description.png" alt="description" style="width:5%;padding-bottom:1vh;">
        <label for="description">Description:</label><br>
        <textarea class="form-control" name="description" style="border-radius:3vh;padding-left:1vh;padding-top: 1vh;width:50vh;height:15vh;"></textarea><br><br>
        <br><br>

        <div>
            <div class="text_black w3-center">
              <div class="regular_text" style="margin-top:-8vh;">
                <img src="../pictures/assets/schedule.png" alt="schedule" style="width:5%;padding-bottom:1vh;">Schedule</div>
              <table style="margin:auto">
                <thead>
                <th class="align-center"> 1º Openning </th>
                <th class="align-center"> 2º Openning </th>
                <th class="align-center"> Day of the Week </th>
              </thead>
              <tbody>
                <tr>
              <td><input id="date" type="time" name = "date[]" value="">
              <input id="date" type="time" name = "date[]" value=""></td>
              <td><input id="date" type="time" name = "date[]" value="">
              <input id="date" type="time" name = "date[]" value=""></td>
              <div class="align-center"><td class="align-center">Sunday</td></div></tr>
<tr>
  <td><input id="date" type="time" name = "date[]" value="">
  <input id="date" type="time" name = "date[]" value=""></td>
  <td><input id="date" type="time" name = "date[]" value="">
  <input id="date" type="time" name = "date[]" value=""></td>
              <td class="align-center">Monday</td></tr>
<tr>
  <td><input id="date" type="time" name = "date[]" value="">
  <input id="date" type="time" name = "date[]" value=""></td>
  <td><input id="date" type="time" name = "date[]" value="">
  <input id="date" type="time" name = "date[]" value=""></td>
              <td class="align-center">Tuesday</td></tr>
<tr>
  <td><input id="date" type="time" name = "date[]" value="">
  <input id="date" type="time" name = "date[]" value=""></td>
  <td><input id="date" type="time" name = "date[]" value="">
  <input id="date" type="time" name = "date[]" value=""></td>
              <td class="align-center">Wednesday</td></tr>
<tr>
  <td><input id="date" type="time" name = "date[]" value="">
  <input id="date" type="time" name = "date[]" value=""></td>
  <td><input id="date" type="time" name = "date[]" value="">
  <input id="date" type="time" name = "date[]" value=""></td>
              <td class="align-center">Thursday</td></tr>
<tr>
  <td><input id="date" type="time" name = "date[]" value="">
  <input id="date" type="time" name = "date[]" value=""></td>
  <td><input id="date" type="time" name = "date[]" value="">
  <input id="date" type="time" name = "date[]" value=""></td>
              <td class="align-center">Friday</td></tr>
<tr>
  <td><input id="date" type="time" name = "date[]" value="">
  <input id="date" type="time" name = "date[]" value=""></td>
  <td><input id="date" type="time" name = "date[]" value="">
  <input id="date" type="time" name = "date[]" value=""></td>
              <td class="align-center">Saturday</td></tr>
            </tbody>
            </table>
            </div><br>

        </div>


        <input type="submit" class="w3-button" value="Save" style="position:relative;margin-bottom:2vh;"/>
      </form>

    </div>
    </div>




  </body>
  <footer class="w3-container w3-center footerorange" style="margin-top:8vh;">
    <div class="small_text thin_text text_black" style="padding-top:2vh;padding-bottom:0.3vh;">University of Minho, Engineering School, <a href="https://www.eng.uminho.pt/pt" target="_blank" class="regular_text text_black">@uminho</a></div>
    <img src="../pictures/assets/eng.png" class="w3-round" alt="Tiago Silva" style="width:10%">
    <div class="small_text thin_text text_black paddingfooter">Any doubts please contact us at localizarte@outlook.pt</div>
    <div class="small_text thin_text text_black paddingfooter"><a href="https://www.termsofservicegenerator.net/live.php?token=apkS3wlBfNEDkF6vR3MofdAJyG6f9QRt" target="_blank" class="regular_text text_black">Terms of conditions</a> © 2022 Localizarte</div>
    <div class="small_text thin_text text_black" style="padding-top:0.3vh;padding-bottom:2vh;">This web application was done for Laboratórios de Informática IV, subject of MIEI at University of Minho.</a></div>
  </footer>
</html>





    <?php

    }
  }
else header('Location: http://localhost/LI4/login.php');
?>
