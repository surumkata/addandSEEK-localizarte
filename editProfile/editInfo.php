<?php
require_once("../connectDB.php");
$consult = "SELECT * FROM users WHERE username = ('" . $_SESSION['username'] . "')";
$resultado = mysqli_query($connection,$consult);
$registo = mysqli_fetch_row($resultado);

$username = $_SESSION['username'];
$name = $registo[1];
$email = $registo[3];
$birthdate = $registo[4];
$preferences = $registo[6];
if (!function_exists('str_contains')) {
    function str_contains($haystack, $needle) {
        return $needle !== '' && mb_strpos($haystack, $needle) !== false;
    }
}

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

$profileImg = "../pictures/users/" . $username . ".png";
if (!file_exists($profileImg)) {
  $profileImg = "../pictures/users/pattern.jpg";
}
$today = date("Y-m-d");
$today = date('Y-m-d',(strtotime ( '-4747 day' , strtotime ( $today) ) ));
?>

<html lang="en">
<head>
    <title>Edit profile</title>
    <link rel="stylesheet" href="../css/default.css">
    <link href="../css/profileUser.css" rel="stylesheet" id="profileUser-css">
    <link href="../css/preferencesOnly.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-alpha1/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://kit.fontawesome.com/918c4f4171.js" crossorigin="anonymous"></script>
    <script href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-alpha1/dist/js/bootstrap.bundle.min.js"> </script>
    <script href="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"> </script>
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
    <meta charset="UTF-8">

</head>
<body>
  <div class="w3-top orange" style="height:8vh">
    <div class="w3-bar w3-card" style="height:8vh">
      <a href="../index.php">
      <img src="../pictures/assets/logo.png" class="w3-bar-item nav-button-img" alt="Logo"> </a>
      <a href="../profileUser.php">
      <img class="w3-bar-item nav-button-img w3-padding-large w3-hide-small" src="../pictures/assets/profile.png" width="50" height="50">
      </a>
      <a href="../sugestion.php">
      <img class="w3-bar-item nav-button-img w3-padding-large w3-hide-small" src="../pictures/assets/dice.png" width="50" height="50">
      </a>
      <a href="../logout.php">
      <img class="w3-bar-item nav-button-img w3-padding-large w3-hide-small w3-right" src="../pictures/assets/logout.png" width="50" height="50">
      </a>
      <form method="GET" action="../search.php">
        <button type="submit" class="nav-button-search">
           <img src="../pictures/assets/search.png"  style="max-widht:5vh; max-height:5vh;">
       </button>
      <input type="text" class="w3-bar-item nav-button w3-padding-large w3-hide-small" required name="key" id="search">
      </form>
    </div>
  </div>
  <br><br>

<div class="container rounded bg-white mt-5 mb-5">
    <div class="row">
        <div class="col-md-3 border-right">
          <center><div class="bold_text large_text text_black" style="margin-top:6.5vh;">User's Image</div></center>
            <div class="zoomin d-flex flex-column align-items-center text-center p-3 py-5">
              <a href="editImage.php" target="_blank" rel="noopener noreferrer">
              <img class="mt-5 rounded-circle" width="150vh" height="150vh" src="<?php echo $profileImg; ?>">
              <br>
            </a>
          </div>
        </div>
        <!---->
        <div class="col-md-9 border-right">
          <form action="changeInfo.php" method="post">
            <div class="p-3 py-5">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <div class="bold_text large_text text_black">Edit Profile</div>
                </div>
                <div class="row mt-2">
                    <div class="col-md-6"><label class="bold_text small_text text_black">Name</label><input type="text" class="thin_text medium_text text_black form-control" required name="name" value="<?php echo $name; ?>" style="margin-top:1vh;"></div>
                  </div><br>
                <div class="row mt-2">
                    <div class="col-md-6"><label class="bold_text small_text text_black">Email</label><input type="text" class="thin_text medium_text text_black form-control" required name="email" value="<?php echo $email; ?>" style="margin-top:1vh;"></div>
                  </div><br>
                  <div class="row mt-2">
                    <div class="col-md-6"><label class="bold_text small_text text_black">Birth Date</label><input type="date" class="thin_text medium_text text_black form-control" required name="birthdate" value="<?php echo $birthdate; ?>" max="<?php echo $today ?>" style="margin-top:1vh;"></div>
                  <div class="row mt-2">
                  </div><br>
                    <label class="bold_text small_text text_black">Preferences</label>
                    <ul class="ks-cboxtags">
                      <?php if($art == 0){ ?> <li><input type="checkbox" id="checkboxOne" name="preferences[]" value="1" onclick='chk(0)'><label for="checkboxOne">Art</label></li>
                    <?php }else{ ?> <li><input type="checkbox" id="checkboxOne" name="preferences[]" value="1" onclick='chk(0)' checked><label for="checkboxOne">Art</label></li> <?php  } ?>
                      <?php if($biographical == 0){ ?> <li><input type="checkbox" id="checkboxTwo" name="preferences[]" value="2" onclick='chk(1)'><label for="checkboxTwo">Biographical</label></li>
                    <?php }else{ ?> <li><input type="checkbox" id="checkboxTwo" name="preferences[]" value="2" onclick='chk(1)' checked><label for="checkboxTwo">Biographical</label></li> <?php  } ?>
                      <?php if($community == 0){ ?> <li><input type="checkbox" id="checkboxThree" name="preferences[]" value="3" onclick='chk(2)'><label for="checkboxThree">Community</label></li>
                    <?php }else{ ?> <li><input type="checkbox" id="checkboxThree" name="preferences[]" value="3" onclick='chk(2)' checked><label for="checkboxThree">Community</label></li> <?php  } ?>
                      <?php if($historical == 0){ ?> <li><input type="checkbox" id="checkboxFour" name="preferences[]" value="4" onclick='chk(3)'><label for="checkboxFour">Historical</label></li>
                    <?php }else{ ?> <li><input type="checkbox" id="checkboxFour" name="preferences[]" value="4" onclick='chk(3)' checked><label for="checkboxFour">Historical</label></li> <?php  } ?>
                      <?php if($neighborhood == 0){ ?> <li><input type="checkbox" id="checkboxFive" name="preferences[]" value="5" onclick='chk(4)'><label for="checkboxFive">Neighborhood</label></li>
                    <?php }else{ ?> <li><input type="checkbox" id="checkboxFive" name="preferences[]" value="5" onclick='chk(4)' checked><label for="checkboxFive">Neighborhood</label></li> <?php  } ?>
                      <?php if($military == 0){ ?> <li><input type="checkbox" id="checkboxSix" name="preferences[]" value="6" onclick='chk(5)'><label for="checkboxSix">Military</label></li>
                    <?php }else{ ?> <li><input type="checkbox" id="checkboxSix" name="preferences[]" value="6" onclick='chk(5)' checked><label for="checkboxSix">Military</label></li> <?php  } ?>
                      <?php if($science == 0){ ?> <li><input type="checkbox" id="checkboxSeven" name="preferences[]" value="7" onclick='chk(6)'><label for="checkboxSeven">Science</label></li>
                    <?php }else{ ?> <li><input type="checkbox" id="checkboxSeven" name="preferences[]" value="7" onclick='chk(6)' checked><label for="checkboxSeven">Science</label></li> <?php  } ?>
                      <?php if($themed == 0){ ?> <li><input type="checkbox" id="checkboxEight" name="preferences[]" value="8" onclick='chk(7)'><label for="checkboxEight">Themed</label></li>
                    <?php }else{ ?> <li><input type="checkbox" id="checkboxEight" name="preferences[]" value="8" onclick='chk(7)' checked><label for="checkboxEight">Themed</label></li> <?php  } ?>
                    </ul>
                  </div>
                  <div class="row mt-3">
                    <div class="mt-5 text-center">
                      <input type="submit" class="simple-button" value="Save Changes">
                  </div>
                </div>
              </div>
              </form>
            </div>
          <!---->
        </div>
    </div>
</div>
</div>
</div>
</body>
