<?php
require_once("../connectDB.php");

if(isSet($_SESSION['username'])){
  if(isSet($_SESSION['loginErro']) && $_SESSION['loginErro'] == 0){
    if($_SESSION['type'] == "admin"){
      if(isSet($_GET['n']) && isSet($_GET['d']) ){

          ?>
              <!DOCTYPE html>
              <html lang="en">
                <head>
                  <meta charset="utf-8">
                </head>
                <body>
                  <form action="uploadCords.php" method="post">
                    <h1>Submited adress:<?php echo $_GET['d'] ?>
                      <h1>Cordinates</h1>
                      <input type="hidden" name="name" value ='<?php echo $_GET['n']?>'>
                      <label>Latitude</label>
                      <input type="text" required name="lat" >
                      <br><br>
                      <label>Longitude</label>
                      <br><br>
                      <input type="text" required name="long" >
                      <br>
                      <input type="submit" value="Submit">

                    </form>
                  </body>
                  </html>

<?php
    }else{
          header('Location: http://localhost/LI4/index.php');
        }
      }else{
        echo "Permition Denied";
      }
    }
}else header('Location: http://localhost/LI4/login.php');
 ?>
