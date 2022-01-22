<?php
require_once("connectDB.php");

if(isSet($_SESSION['username'])){
  if(isSet($_SESSION['loginErro']) && $_SESSION['loginErro'] == 0){



$searchkey = str_replace('+',' ',strtolower($_GET['key']));
$_SESSION['searchKey'] = $searchkey;

$searchByName = mysqli_query($connection,"SELECT * FROM museums WHERE name = '$searchkey'");
$searchBySubString = mysqli_query($connection,"SELECT * FROM museums WHERE name LIKE '%$searchkey%' ");
$rowNumb = mysqli_num_rows ( $searchBySubString );
?>

<!doctype html>
<html lang="en">
  <head>
  	<title>search</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="css/default.css">
    <link rel="stylesheet" href="css/searchPage.css">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link href='https://fonts.googleapis.com/css?family=Roboto:400,100,300,700' rel='stylesheet' type='text/css'>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<link href="css/style.css?ts=<?=time()?>" rel="stylesheet" >

	</head>
  <div class="w3-top orange">
    <div class="w3-bar w3-card">
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

	<body style="background-color: #eff4f8">
	<section class="ftco-section">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-md-6 text-center mb-5">
				</div>
			</div>
			<div class="row">
				<div class="col-md-12">
					<div class="table-wrap">
						<table class="table table-bordered table-dark table-hover">
						  <thead >
                <th class="align-center">Results</th>

						  </thead>
						  <tbody>
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
                     <th scope="row"><img alt="No image available"width="70vh" height="70vh" src="pictures/museums/<?php echo $imgName;?>"> </th>
                     <td class=title><?php echo $textName; ?></td>
                     <td class=adress><?php echo $row["adress"]; ?></td>
                     </tr>
                     <?php
                   }
                 }else{?>
                        <td>No results...</td>


             <?php
                   }
                ?>

						      <!--<th scope="row">1</th>-->
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
</html>
<?php
  }
}
else header('Location: http://localhost/LI4/login.php');
?>
