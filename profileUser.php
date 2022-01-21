<?php
require_once("connectDB.php");

$consult = "SELECT * FROM users WHERE username = ('" . $_SESSION['username'] . "')";
$resultado = mysqli_query($connection,$consult);
$registo = mysqli_fetch_row($resultado);

$username = $_SESSION['username'];
$name = $registo[1];
$email = $registo[3];
$birthdate = $registo[4];
$preferences = $registo[6];
$profileImg = "pictures/users/" . $username . ".png";
if (!file_exists($profileImg)) {
  $profileImg = "pictures/users/pattern.jpg";
}


$consult = "SELECT preferences FROM users WHERE username = ('" . $_SESSION['username'] . "')";
$resultado = mysqli_query($connection,$consult);
$pfs = mysqli_fetch_row($resultado);

if (!function_exists('str_contains')) {
    function str_contains($haystack, $needle) {
        return $needle !== '' && mb_strpos($haystack, $needle) !== false;
    }
}

$preferences = "";

$behind = 0;

if(str_contains($pfs[0],"1")){
  $preferences = "Art";
  $behind = 1;
}
if(str_contains($pfs[0],"2")){
  if($behind == 1) $preferences = $preferences." Biographical";
  else {
    $preferences = $preferences."Biographical";
    $behind = 1;
  }
}
if(str_contains($pfs[0],"3")){
  if($behind == 1) $preferences = $preferences." Community";
  else {
    $preferences = $preferences."Community";
    $behind = 1;
  }
}
if(str_contains($pfs[0],"4")){
  if($behind == 1) $preferences = $preferences." Historical";
  else {
    $preferences = $preferences."Historical";
    $behind = 1;
  }
}
if(str_contains($pfs[0],"5")){
  if($behind == 1) $preferences = $preferences." Neighborhood";
  else {
    $preferences = $preferences."Neighborhood";
    $behind = 1;
  }
}
if(str_contains($pfs[0],"6")){
  if($behind == 1) $preferences = $preferences." Military";
  else {
    $preferences = $preferences."Military";
    $behind = 1;
  }
}
if(str_contains($pfs[0],"7")){
  if($behind == 1) $preferences = $preferences." Science";
  else {
    $preferences = $preferences."Science";
    $behind = 1;
  }
}
if(str_contains($pfs[0],"8")){
  if($behind == 1) $preferences = $preferences." Themed";
  else {
    $preferences = $preferences."Themed";
    $behind = 1;
  }
}
?>

<html lang="en">
<head>
    <link href="css/profileUser.css" rel="stylesheet" id="profileUser-css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-alpha1/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-alpha1/dist/js/bootstrap.bundle.min.js"> </script>
    <script href="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"> </script>
    <meta charset="UTF-8">
</head>
<body>
  <div class="w3-top">
    <div class="w3-bar w3-orange w3-card">
      <a href="index.php">
      <img src="pictures/assets/logo.png" class="w3-bar-item w3-button" alt="Logo" style="width:11%"> </a>
      <a class="w3-bar-item w3-button w3-padding-large w3-hide-medium w3-hide-large w3-right" href="javascript:void(0)" onclick="myFunction()" title="Toggle Navigation Menu"><i class="fa fa-bars"></i></a>
      <a href="profileUser.php" class="w3-bar-item w3-button w3-padding-large w3-hide-small">PROFILE</a>
      <a href="sugestion.php" class="w3-bar-item w3-button w3-padding-large w3-hide-small">SUGESTION</a>
      <a href="logout.php" class="w3-bar-item w3-button w3-padding-large w3-hide-small">LOGOUT</a>
      <form method="GET" action="search.php">
        <input type="text" class="w3-right" required name="key" id="search" style="margin-top:0.58%">
      <button type="submit" class="w3-padding-large w3-button w3-hide-small w3-right"><i class="fa fa-search"></i></button>
    </form>
    </div>
  </div>
  <br><br>

<div class="container rounded bg-white mt-5 mb-5">
    <div class="row">
        <div class="col-md-3 border-right">
            <div class="d-flex flex-column align-items-center text-center p-3 py-5"><img class="rounded-circle mt-5" width="60%" height="60%" src="<?php echo $profileImg; ?>"><br><span class="font-weight-bold"><?php echo $name; ?></span><span class="text-black-50"><?php echo $username; ?></span><span> </span></div>
        </div>
        <div class="col-md-9 border-right">
            <div class="p-3 py-5">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h4 class="text-right"><?php echo $name; ?>'s Profile</h4>
                </div>
                <div class="row mt-2">
                    <div class="col-md-6"><label class="labels">Email</label><h6><?php echo $email ?></h6></div>
                    <div class="col-md-6"><label class="labels">Birth Date</label><h6><?php echo $birthdate ?></h6></div>
                  </div>
                  <div class="row mt-2">
                    <div class="col-md-6">
                      <label class="labels">Preferences</label><h6><?php echo $preferences ?></h6>
                    </div>
                  </div>
                  <div class="row mt-3">
                    <div class="col-md-3">
                      <a href="editProfile/editInfo.php" class="btn btn-primary profile-button" type="button">Edit Information</a>
                  </div>
                    <div class="col-md-3">
                      <a href="historico.php" class="btn btn-primary profile-button" type="button">View History</a>
                  </div>
                  <div class="col-md-3">
                    <a href="editProfile/changePassword.php" class="btn btn-primary profile-button" target="_blank" rel="noopener noreferrer" type="button">Change Password</a>
                </div>
                </div>
              </div>
            </div>
        </div>
    </div>
</div>
</div>
</div>
</body>
