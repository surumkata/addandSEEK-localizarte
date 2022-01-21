<?php
$name = $_POST["image"];
$image = $string = "../pictures/museums/".$name.".png";
if (!file_exists($image)) {
  $image = "../pictures/museums/museum_default.png";
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
  <img src=<?php echo $image; ?> width="20%" height="20%">
  <form action="upload.php" method="post" enctype="multipart/form-data">
    
  </form>
  <form action="museumEdit" method="post" enctype="multipart/form-data">
      <input type="hidden" value="<?php echo $museu; ?>" name = "name"/>
      <input type="submit" value="Return"/>
  </form>
</main>
</body>
