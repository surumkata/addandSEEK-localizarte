<?php

require_once("../connectDB.php");

$art = 0;
$biographical = 0;
$community = 0;
$historical = 0;
$neighborhood = 0;
$military = 0;
$science = 0;
$themed = 0;

$consult = "SELECT preferences FROM users WHERE username = ('" . $_SESSION['username'] . "')";
$resultado = mysqli_query($connection,$consult);
$preferences = mysqli_fetch_row($resultado);
if (!function_exists('str_contains')) {
    function str_contains($haystack, $needle) {
        return $needle !== '' && mb_strpos($haystack, $needle) !== false;
    }
}

if(str_contains($preferences[0],"1")){
  $art = 1;
}
if(str_contains($preferences[0],"2")){
  $biographical = 1;
}
if(str_contains($preferences[0],"3")){
  $community = 1;
}
if(str_contains($preferences[0],"4")){
  $historical = 1;
}
if(str_contains($preferences[0],"5")){
  $neighborhood = 1;
}
if(str_contains($preferences[0],"6")){
  $military = 1;
}
if(str_contains($preferences[0],"7")){
  $science = 1;
}
if(str_contains($preferences[0],"8")){
  $themed = 1;
}
 ?>


<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<script type="text/javascript">
function chk(j) {
var total=0;
var elem = document.getElementsByName('preferences[]');
for(var i=0; i < elem.length; i++){
if(elem[i].checked==true){
total =total +1;}
if(total > 3){
elem[j].checked = false ;
return false;
}
}
} </script>
</head>
<body>


<h2>My Preferences (Máx. 3)</h2>

<form action="changePreferencesDb.php" method="post">

  <?php if($art == 0){
    ?>
  <input type="checkbox" id="preferences" name="preferences[]" value="1" onclick='chk(0)';>
  <label for="art">Art</label><br><br>
<?php }else{ ?>
  <input type="checkbox" id="preferences" name="preferences[]" value="1" checked onclick='chk(0)';>
  <label for="art">Art</label><br><br>
<?php  } ?>
<?php if($biographical == 0){
  ?>
  <input type="checkbox" id="preferences" name="preferences[]" value="2" onclick='chk(1)';>
  <label for="biographical">Biographical</label><br><br>
<?php }else{ ?>
  <input type="checkbox" id="preferences" name="preferences[]" value="2" checked onclick='chk(1)';>
  <label for="biographical">Biographical</label><br><br>
<?php  } ?>
<?php if($community == 0){
  ?>
  <input type="checkbox" id="preferences" name="preferences[]" value="3" onclick='chk(2)';>
  <label for="community">Community</label><br><br>
<?php }else{ ?>
  <input type="checkbox" id="preferences" name="preferences[]" value="3" checked onclick='chk(2)';>
  <label for="community">Community</label><br><br>
<?php  } ?>
<?php if($historical == 0){
  ?>
  <input type="checkbox" id="preferences" name="preferences[]" value="4" onclick='chk(3)';>
  <label for="historical">Historical</label><br><br>
<?php }else{ ?>
  <input type="checkbox" id="preferences" name="preferences[]" value="4" checked onclick='chk(3)';>
  <label for="historical">Historical</label><br><br>
<?php  } ?>
<?php if($neighborhood == 0){
  ?>
  <input type="checkbox" id="preferences" name="preferences[]" value="5" onclick='chk(4)';>
  <label for="neighborhood">Neighborhood</label><br><br>
<?php }else{ ?>
  <input type="checkbox" id="preferences" name="preferences[]" value="5" checked onclick='chk(4)';>
  <label for="neighborhood">Neighborhood</label><br><br>
<?php  } ?>
<?php if($military == 0){
  ?>
  <input type="checkbox" id="preferences" name="preferences[]" value="6" onclick='chk(5)';>
  <label for="military">Military</label><br><br>
<?php }else{ ?>
  <input type="checkbox" id="preferences" name="preferences[]" value="6" checked onclick='chk(5)';>
  <label for="military">Military</label><br><br>
<?php  } ?>
<?php if($science == 0){
  ?>
  <input type="checkbox" id="preferences" name="preferences[]" value="7" onclick='chk(6)';>
  <label for="science">Science</label><br><br>
<?php }else{ ?>
  <input type="checkbox" id="preferences" name="preferences[]" value="7" checked onclick='chk(6)';>
  <label for="science">Science</label><br><br>
<?php  } ?>
<?php if($themed == 0){
  ?>
  <input type="checkbox" id="preferences" name="preferences[]" value="8" onclick='chk(7)';>
  <label for="themed">Themed</label><br><br>
<?php }else{ ?>
  <input type="checkbox" id="preferences" name="preferences[]" value="8" checked onclick='chk(7)';>
  <label for="themed">Themed</label><br><br>
<?php  } ?>
  <input type="submit" value="Submit">
</form>

</body>
</html>
