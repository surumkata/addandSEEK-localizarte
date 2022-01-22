<!DOCTYPE html>
<?php
require_once("../connectDB.php");


if(isSet($_SESSION['username'])){
  if(isSet($_SESSION['loginErro']) && $_SESSION['loginErro'] == 0){

$username = $_SESSION['username'];
$profileImg = "../pictures/users/" . $username . ".png";
if (!file_exists($profileImg)) {
  $profileImg = "../pictures/users/pattern.jpg";
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>Localizarte</title>
</head>
<head>
    <meta charset="UTF-8">
</head>
<body>
<main>
  <img src=<?php echo $profileImg; ?>>
  <form action="upload.php" method="post" enctype="multipart/form-data">
    Select image to upload:
    <input type="file" required name="fileToUpload" id="fileToUpload">
    <input type="submit" value="Upload Image" name="submit">
    <?php if(isSet($_SESSION['upload'])){
      echo $_SESSION['upload'];
      unset($_SESSION['upload']);
      }
    ?>
  </form>
</main>
</body>
<?php }
}
else header('Location: http://localhost/LI4/login.php');
?>
