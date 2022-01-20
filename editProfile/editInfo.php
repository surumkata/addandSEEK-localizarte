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
$profileImg = "../pictures/users/" . $username . ".png";
if (!file_exists($profileImg)) {
  $profileImg = "../pictures/users/pattern.jpg";
}
$today = date("Y-m-d");
$today = date('Y-m-d',(strtotime ( '-4747 day' , strtotime ( $today) ) ));
?>


<html lang="en">
<link rel="stylesheet" href="https://www.phptutorial.net/app/css/style.css">
<head>
  <title><?php echo $name; ?>'s profile</title>
</head>
<head>
    <link href="../css/profileUser.css" rel="stylesheet" id="profileUser-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <meta charset="UTF-8">
</head>
<body>
<!-- Include the above in your HEAD tag ---------->

<div class="container">
    <div class="main-body">

          <!-- Breadcrumb -->
          <nav aria-label="breadcrumb" class="main-breadcrumb">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="index.php">Home</a></li>
            </ol>
          </nav>
          <!-- /Breadcrumb -->

          <div class="row gutters-sm">

            <div class="col-md-4 mb-3">
              <div class="card">
                <div class="card-body">
                  <div class="d-flex flex-column align-items-center text-center">
                    <img src=<?php echo $profileImg; ?> alt="Admin" class="rounded-circle" width="150">
                    <form method="POST" target="__blank" action="editImage.php">
                    <input type="submit" value="Edit Profile Picture"/>
                  </form>
                  </div>
                </div>
              </div>
            </div>

            <div class="col-md-8">
              <div class="card mb-3">
                <form action="changeInfo.php" method="post">
                <div class="card-body">

                  <div class="row">
    								<div class="col-sm-3">
    									<h6 class="mb-0">Name</h6>
    								</div>
    								<div class="col-sm-9 text-secondary">
    									<input type="text" class="form-control" required name="name" value="<?php echo $name; ?>">
    								</div>
    							</div>

                  <hr>

                  <div class="row">
    								<div class="col-sm-3">
    									<h6 class="mb-0">Email</h6>
    								</div>
    								<div class="col-sm-9 text-secondary">
    									<input type="text" class="form-control" required name="email" value="<?php echo $email; ?>">
    								</div>
    							</div>

                  <hr>

                  <div class="row">
    								<div class="col-sm-3">
    									<h6 class="mb-0">Birthdate</h6>
    								</div>
    								<div class="col-sm-9 text-secondary">
    									<input type="date" class="form-control" required name="birthdate" value="<?php echo $birthdate; ?>" max="<?php echo $today ?>">
    								</div>
    							</div>

                  <hr>


    							<div class="row">
    								<div class="col-sm-3"></div>

    								<div class="col-sm-9 text-secondary">
    									<input type="submit" class="btn btn-primary px-4" value="Save Changes">
    								</div>

                  <hr>

                </div>
              </div>
              </form>
              <form action="../profileUser.php" method="post">
                <div class="card-body">
                <div class="row">
                  <div class="col-sm-3"></div>
                    <div class="col-sm-9 text-secondary">
                      <input type="submit" class="btn btn-primary px-4" value="Return">
                  </div>
              </div>
            </div>
            </form>
            </div>
          </div>

        </div>
    </div>
      </body>
