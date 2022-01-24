<?php
require_once("connectDB.php");

if(isSet($_SESSION['username'])){
//get 5 last visited places order by datetime

$query = "SELECT museum,datetime FROM history WHERE username='" . $_SESSION['username'] . "' ORDER BY datetime DESC ";
$result = mysqli_query($connection,$query);
$rowNumb = mysqli_num_rows($result);
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <title>History</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	  <link rel="stylesheet" type="text/css" href="css/searchPage.css">
    <link rel="stylesheet" href="css/default.css">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link href='https://fonts.googleapis.com/css?family=Roboto:400,100,300,700' rel='stylesheet' type='text/css'>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="css/table.css">
    <style>
    body {font-family: "Lato", sans-serif}
    .mySlides {display: none}
    </style>
  </head>
  <body style="background-color: #eff4f8">

    <div class="w3-top orange" style="height:8vh">
      <div class="w3-bar w3-card" style="height:8vh">
        <a href="index.php">
        <img src="pictures/assets/logo.png" class="w3-bar-item nav-button-img" alt="Logo"> </a>
        <a href="profileUser.php">
        <img class="w3-bar-item nav-button-img w3-padding-large w3-hide-small" src="pictures/assets/profile.png" width="50" height="50">
        </a>
        <a href="sugestion.php">
        <img class="w3-bar-item nav-button-img w3-padding-large w3-hide-small" src="pictures/assets/dice.png" width="50" height="50">
        </a>
        <a href="logout.php">
        <img class="w3-bar-item nav-button-img w3-padding-large w3-hide-small w3-right" src="pictures/assets/logout.png" width="50" height="50">
        </a>
        <form method="GET" action="search.php">
          <button type="submit" class="nav-button-search">
             <img src="pictures/assets/search.png"  style="max-widht:5vh; max-height:5vh;">
         </button>
        <input type="text" class="w3-bar-item nav-button w3-padding-large w3-hide-small" required name="key" id="search">
        </form>
      </div>
    </div>

  	<section class="ftco-section">
  		<div class="container">
  			<div class="row justify-content-center">
  				<div class="col-md-6 text-center mb-5">
  				</div>
  			</div>
  			<div class="row">
  				<div class="col-md-12">
  					<div>
  						<table class="table table-bordered table-hover">
  						  <thead class="thead-custom" >
                  <th class="align-center">Museum</th>
                  <th class="align-center">Date</th>
  						  </thead>

  						  <tbody class="table-custom">
                  <?php
                   if($rowNumb>0){
                        while($row = mysqli_fetch_assoc($result)){
                            $textName = ucfirst($row["museum"]);
                            $date = new DateTime($row['datetime']);
                            $refName = str_replace(' ', '-', $row["museum"]);

                            $url = "museum/museum.php?name=".$refName;
                            ?>
                            <tr  onclick="window.location.assign('<?php echo $url; ?>')">
                              <td class="align-center"><?php echo $textName ?> </td>
                              <td class="align-center"> <?php echo $date->format('d-m-Y H:i'); ?> </td>
                            </tr>
                            <?php
                          }
                   }else{
                     ?>
                          <td>Empty.</td>
                          <td></td>
               <?php
                     }
                  ?>

  						  </tbody>
  						</table>
  					</div>
  				</div>
  			</div>
  		</div>
  	</section>

  	<script src="js/jquery.min.js"></script>
    <script src="js/popper.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/main.js"></script>

  	</body>



  </body>
</html>
<?php
}
  else header('Location: http://localhost/LI4/login.php');
?>
