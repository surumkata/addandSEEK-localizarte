<?php
require_once("db/connectDB.php");

if(isSet($_SESSION['username'])){
  if(isSet($_SESSION['loginErro']) && $_SESSION['loginErro'] == 0){

$searchkey = str_replace('+',' ',mb_strtolower($_GET['key']));


$_SESSION['searchKey'] = $searchkey;


$query = "SELECT * FROM museums WHERE name LIKE '%$searchkey%'";
$searchBySubString = mysqli_query($connection,$query);
$rowNumb = mysqli_num_rows ( $searchBySubString );
?>

<!doctype html>
<html lang="en">
  <head>
  	<title>search</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="css/default.css">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link href='https://fonts.googleapis.com/css?family=Roboto:400,100,300,700' rel='stylesheet' type='text/css'>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="css/table.css">

	</head>
	<body style="background-color: #eff4f8">
    <?php if($_SESSION['type'] == "user"){
      ?>
      <div class="w3-top orange">
        <div class="w3-bar w3-card" style="max-height:7vh;">
          <a href="index.php">
          <img src="pictures/assets/logo.png" class="w3-bar-item nav-button-img" alt="Logo" style="max-height:7vh;"> </a>
          <a href="profile/profileUser.php">
          <img class="w3-bar-item nav-button-img w3-padding-large w3-hide-small" src="pictures/assets/profile.png" style="max-height:7vh;">
          </a>
          <a href="sugestion.php">
          <img class="w3-bar-item nav-button-img w3-padding-large w3-hide-small" src="pictures/assets/dice.png" style="max-height:7vh;">
          </a>
          <a href="authentication/logout.php">
          <img class="w3-bar-item nav-button-img w3-padding-large w3-hide-small w3-right" src="pictures/assets/logout.png" style="max-height:7vh;">
          </a>
          <form method="GET" action="search.php" style="margin-top:0vh">
            <button type="submit" class="nav-button-search" style="max-width:14vh; max-height:14vh!important;margin-top:1vh !important;border-radius:5vh;">
               <img src="pictures/assets/search.png"  style="max-width:11vh; max-height:6vh;padding-bottom:0.4vh;">
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
       <a href="index.php">
       <img src="pictures/assets/logo.png" class="w3-bar-item nav-button-img" alt="Logo" style="max-height:7vh;"> </a>
       <a href="profile/profileUser.php">
       <img class="w3-bar-item nav-button-img w3-padding-large w3-hide-small" src="pictures/assets/profile.png" style="max-height:7vh;">
       </a>
       <a href="sugestion.php">
       <img class="w3-bar-item nav-button-img w3-padding-large w3-hide-small" src="pictures/assets/dice.png" style="max-height:7vh;">
       </a>
       <a href="requests/requests.php">
       <img class="w3-bar-item nav-button-img w3-padding-large w3-hide-small" src="pictures/assets/requests.png" style="max-height:7vh;">
       </a>
       <a href="authentication/logout.php">
       <img class="w3-bar-item nav-button-img w3-padding-large w3-hide-small w3-right" src="pictures/assets/logout.png" style="max-height:7vh;">
       </a>
       <form method="GET" action="search.php" style="margin-top:0vh">
         <button type="submit" class="nav-button-search" style="max-width:14vh; max-height:14vh!important;margin-top:1vh !important;border-radius:5vh;">
            <img src="pictures/assets/search.png"  style="max-width:11vh; max-height:6vh;padding-bottom:0.4vh;">
        </button>
       <input type="text" class="w3-bar-item w3-hide-small" required name="key" id="search" style="max-width:20vh; max-height:5vh;margin-top:1vh;border-radius:5vh;">
       </form>
     </div>
   </div>
   <?php
   }
   ?>
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
                <th class="align-center">Picture</th>
                <th class="align-center">Museum</th>
                <th class="align-center">Address</th>
						  </thead>

						  <tbody class="table-custom">
                <?php
                 if($rowNumb>0){

                   while($row = mysqli_fetch_assoc($searchBySubString)){
                     $refName = str_replace(' ', '-', $row["name"]);
                     $imgName = str_replace(' ', '_', $row["name"]);
                     $imgName = $imgName.".png";
                     $textName = ucfirst($row["name"]);
                     $url = "museum/museum.php?name=".$refName;
                     ?>
                     <tr onclick="window.location.assign('<?php echo $url; ?>')">
                     <th scope="row" class="align-center img" style="background-image:url('http://localhost:8888/pictures/museums/<?php echo$imgName; ?>');
                         width: 40vh;
                         height: 17vh;
                         background-position:center center;
                         background-size:cover;
                         border-radius:0%"> </th>
                     <td class="align-center"><?php echo $textName; ?></td>
                     <td class="align-center"><?php echo $row["address"]; ?></td>
                     </tr>
                     <?php
                   }
                 }else{?>
                        <td>No results...</td>
                        <td></td>
                        <td></td>

             <?php
                   }
                ?>

						      <!--<th scope="row">1</th>-->
						  </tbody>
						</table>
					</div>
				</div>
			</div>
      <div class="medium_text regular_text text_black" style="padding-top:2vh;padding-bottom:0.3vh;">If you didn't find the museum you were looking for, please request <a href="museum/addMuseum.php"  class="bold_text text_orange">here</a>.</div>
		</div>
	</section>

	<script src="js/jquery.min.js"></script>
  <script src="js/popper.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/main.js"></script>

	</body>
  <footer class="w3-container w3-center footerorange">
    <div class="small_text thin_text text_black" style="padding-top:2vh;padding-bottom:0.3vh;">University of Minho, Engineering School, <a href="https://www.eng.uminho.pt/pt" target="_blank" class="regular_text text_black">@uminho</a></div>
    <img src="pictures/assets/eng.png" class="w3-round" alt="Tiago Silva" style="width:10%">
    <div class="small_text thin_text text_black paddingfooter">Any doubts please contact us at localizarte@outlook.pt</div>
    <div class="small_text thin_text text_black paddingfooter"><a href="https://www.termsofservicegenerator.net/live.php?token=apkS3wlBfNEDkF6vR3MofdAJyG6f9QRt" target="_blank" class="regular_text text_black">Terms of conditions</a> © 2022 Localizarte</div>
    <div class="small_text thin_text text_black" style="padding-top:0.3vh;padding-bottom:2vh;">This web application was done for Laboratórios de Informática IV, subject of MIEI at University of Minho.</a></div>
  </footer>
</html>
<?php
  }
}
else header('Location: http://localhost:8888/authentication/login.php');
?>
