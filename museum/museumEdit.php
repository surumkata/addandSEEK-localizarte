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
  if(isSet($registo[8])) $horarios = explode(';',$registo[8]);

  if(isSet($horarios[0]) && $horarios[0] != "_") {
    $domingo = explode(",",$horarios[0]);
    if(isSet($domingo[0])) $hora_manha_domingo = explode("-",$domingo[0]);
    if(isSet($domingo[1])) $hora_tarde_domingo = explode("-",$domingo[1]);
  }

  if(isSet($horarios[1]) && $horarios[1] != "_") {
    $segunda = explode(",",$horarios[0]);
    if(isSet($segunda[0])) $hora_manha_segunda = explode("-",$segunda[0]);
    if(isSet($segunda[1])) $hora_tarde_segunda = explode("-",$segunda[1]);
  }
  if(isSet($horarios[2]) && $horarios[2] != "_") {
    $terca = explode(",",$horarios[0]);
    if(isSet($terca[0])) $hora_manha_terca = explode("-",$terca[0]);
    if(isSet($terca[1])) $hora_tarde_terca = explode("-",$terca[1]);
  }
  if(isSet($horarios[3]) && $horarios[3] != "_") {
    $quarta = explode(",",$horarios[0]);
    if(isSet($quarta[0])) $hora_manha_quarta = explode("-",$quarta[0]);
    if(isSet($quarta[1])) $hora_tarde_quarta = explode("-",$quarta[1]);
  }
  if(isSet($horarios[4]) && $horarios[4] != "_") {
    $quinta = explode(",",$horarios[0]);
    if(isSet($quinta[0])) $hora_manha_quinta = explode("-",$quinta[0]);
    if(isSet($quinta[1])) $hora_tarde_quinta = explode("-",$quinta[1]);
  }
  if(isSet($horarios[5]) && $horarios[5] != "_") {
    $sexta = explode(",",$horarios[0]);
    if(isSet($sexta[0])) $hora_manha_sexta = explode("-",$sexta[0]);
    if(isSet($sexta[1])) $hora_tarde_sexta = explode("-",$sexta[1]);
  }
  if(isSet($horarios[6]) && $horarios[6] != "_") {
    $sabado = explode(",",$horarios[0]);
    if(isSet($sabado[0])) $hora_manha_sabado = explode("-",$sabado[0]);
    if(isSet($sabado[1])) $hora_tarde_sabado = explode("-",$sabado[1]);
  }


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

      <div class= "w3-display-container w3-center"
              style="background-image:url('http://localhost/Li4/pictures/museums/<?php echo $name.'.png';?>');
                  width: 100%;
                  height: 66vh;
                  background-position:center center;
                  background-size:cover;">
      </div>

    <div class="w3-container w3-padding-16 regular_text" style="max-width:100%;" id="body">

      <form action="upload.php" method="post" enctype="multipart/form-data">
        <input type="hidden" name="oldName" value="<?php echo $museum ?>">
        <h1 class="w3-wide w3-center bold_text text_black">
          <p style="font-size:150%"><?php echo $registo[0]; ?> <p/>
        </h1>

        <div class="w3-container w3-padding-16 w3-white w3-large" style="width:50%;position: relative;left: 25%;height:150%;border-radius:5vh;">
          <div class="w3-container w3-content w3-center w3-padding-64">
            <p><b>Want to edit image?</b> Select image to upload:</p>
            <input type="file" name="fileToUpload" id="fileToUpload"/>
            <?php if(isSet($_SESSION['upload'])){
              echo $_SESSION['upload'];
              unset($_SESSION['upload']);
              }
            ?>
          </div>
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

          <div>
              <div class="text_black w3-center" style="margin-top:6vh;" >
                <div class="bold_text" style="margin-top:-2vh;">Schedule</div>
                <table style="margin:auto">
                  <thead>
                  <th class="align-center"> 1º Openning </th>
                  <th class="align-center"> 2º Openning </th>
                  <th class="align-center"> Day of the Week </th>
                </thead>
                <tbody>
                  <tr>
                <td><input id="date" type="time" name = "date[]" value="<?php if(isSet($hora_manha_domingo[0])){ echo $hora_manha_domingo[0]; } else { echo ""; }?>">
                <input id="date" type="time" name = "date[]" value="<?php if(isSet($hora_manha_domingo[1])){ echo $hora_manha_domingo[1]; } else { echo ""; }?>"></td>
                <td><input id="date" type="time" name = "date[]" value="<?php if(isSet($hora_tarde_domingo[0])){ echo $hora_tarde_domingo[0]; } else { echo ""; }?>">
                <input id="date" type="time" name = "date[]" value="<?php if(isSet($hora_tarde_domingo[1])){ echo $hora_tarde_domingo[1]; } else { echo ""; }?>"></td>
                <div class="align-center"><td class="align-center">Sunday</td></div></tr>
<tr>
                <td><input id="date" type="time" name = "date[]" value="<?php if(isSet($hora_manha_segunda[0])){ echo $hora_manha_segunda[0]; } else { echo ""; }?>">
                <input id="date" type="time" name = "date[]" value="<?php if(isSet($hora_manha_segunda[1])){ echo $hora_manha_segunda[1]; } else { echo ""; }?>"></td>
                <td><input id="date" type="time" name = "date[]" value="<?php if(isSet($hora_tarde_segunda[0])){ echo $hora_tarde_segunda[0]; } else { echo ""; }?>">
                <input id="date" type="time" name = "date[]" value="<?php if(isSet($hora_tarde_segunda[1])){ echo $hora_tarde_segunda[1]; } else { echo ""; }?>"></td>
                <td class="align-center">Monday</td></tr>
<tr>
                <td><input id="date" type="time" name = "date[]" value="<?php if(isSet($hora_manha_terca[0])){ echo $hora_manha_terca[0]; } else { echo ""; }?>">
                <input id="date" type="time" name = "date[]" value="<?php if(isSet($hora_manha_terca[1])){ echo $hora_manha_terca[1]; } else { echo ""; }?>"></td>
                <td><input id="date" type="time" name = "date[]" value="<?php if(isSet($hora_tarde_terca[0])){ echo $hora_tarde_terca[0]; } else { echo ""; }?>">
                <input id="date" type="time" name = "date[]" value="<?php if(isSet($hora_tarde_terca[1])){ echo $hora_tarde_terca[1]; } else { echo ""; }?>"></td>
                <td class="align-center">Tuesday</td></tr>
<tr>
                <td><input id="date" type="time" name = "date[]" value="<?php if(isSet($hora_manha_quarta[0])){ echo $hora_manha_quarta[0]; } else { echo ""; }?>">
                <input id="date" type="time" name = "date[]" value="<?php if(isSet($hora_manha_quarta[1])){ echo $hora_manha_quarta[1]; } else { echo ""; }?>"></td>
                <td><input id="date" type="time" name = "date[]" value="<?php if(isSet($hora_tarde_quarta[0])){ echo $hora_tarde_quarta[0]; } else { echo ""; }?>">
                <input id="date" type="time" name = "date[]" value="<?php if(isSet($hora_tarde_quarta[1])){ echo $hora_tarde_quarta[1]; } else { echo ""; }?>"></td>
                <td class="align-center">Wednesday</td></tr>
<tr>
                <td><input id="date" type="time" name = "date[]" value="<?php if(isSet($hora_manha_quinta[0])){ echo $hora_manha_quinta[0]; } else { echo ""; }?>">
                <input id="date" type="time" name = "date[]" value="<?php if(isSet($hora_manha_quinta[1])){ echo $hora_manha_quinta[1]; } else { echo ""; }?>"></td>
                <td><input id="date" type="time" name = "date[]" value="<?php if(isSet($hora_tarde_quinta[0])){ echo $hora_tarde_quinta[0]; } else { echo ""; }?>">
                <input id="date" type="time" name = "date[]" value="<?php if(isSet($hora_tarde_quinta[1])){ echo $hora_tarde_quinta[1]; } else { echo ""; }?>"></td>
                <td class="align-center">Thursday</td></tr>
<tr>
                <td><input id="date" type="time" name = "date[]" value="<?php if(isSet($hora_manha_sexta[0])){ echo $hora_manha_sexta[0]; } else { echo ""; }?>">
                <input id="date" type="time" name = "date[]" value="<?php if(isSet($hora_manha_sexta[1])){ echo $hora_manha_sexta[1]; } else { echo ""; }?>"></td>
                <td><input id="date" type="time" name = "date[]" value="<?php if(isSet($hora_tarde_sexta[0])){ echo $hora_tarde_sexta[0]; } else { echo ""; }?>">
                <input id="date" type="time" name = "date[]" value="<?php if(isSet($hora_tarde_sexta[1])){ echo $hora_tarde_sexta[1]; } else { echo ""; }?>"></td>
                <td class="align-center">Friday</td></tr>
<tr>
                <td><input id="date" type="time" name = "date[]" value="<?php if(isSet($hora_manha_sabado[0])){ echo $hora_manha_sabado[0]; } else { echo ""; }?>">
                <input id="date" type="time" name = "date[]" value="<?php if(isSet($hora_manha_sabado[1])){ echo $hora_manha_sabado[1]; } else { echo ""; }?>"></td>
                <td><input id="date" type="time" name = "date[]" value="<?php if(isSet($hora_tarde_sabado[0])){ echo $hora_tarde_sabado[0]; } else { echo ""; }?>">
                <input id="date" type="time" name = "date[]" value="<?php if(isSet($hora_tarde_sabado[1])){ echo $hora_tarde_sabado[1]; } else { echo ""; }?>"></td>
                <td class="align-center">Saturday</td></tr>
              </tbody>
              </table>
              </div><br>

          </div>


          <input type="submit" class="w3-button" value="Save" style="position:relative"/>
        </form>

        <form method="POST" action="<?php echo "museum.php?name=".$refName?>">
          <input type="hidden" value = "<?php  echo $registo[0];?>" name = "name" >
          <input type="submit" class="w3-button" value="Return" style="position:relative"/>
        </form>


      </div>
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
