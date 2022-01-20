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



?>


<!---
<!DOCTYPE html>

<html lang="en">
<link rel="stylesheet" href="https://www.phptutorial.net/app/css/style.css">
<head>
  <title><?php echo $name; ?>'s profile</title>
</head>
<head>
    <h1>User Profile</h1>
    <meta charset="UTF-8">
</head>
<body>
<main>
  <form method="POST" action="editProfile/editImage.php">
  <h2>Profile Picture: </h2>
  <img src=<?php echo $profileImg; ?>>
   <input type="submit" value="Edit Profile Picture"/>
   </form>
   <form method="POST" action="editProfile/editInfo.php">
   <h2>Name: <?php echo $name; ?> </h2>
   <h2>Username: <?php echo $username; ?> </h2>
   <h2>Email: <?php echo $email; ?> </h2>
   <h2>Birth date: <?php echo $birthdate; ?> </h2>
   <input type="submit" value="Edit Info"/>
 </form>
</main>
</body>
--->

<html lang="en">
<link rel="stylesheet" href="https://www.phptutorial.net/app/css/style.css">
<head>
  <title><?php echo $name; ?>'s profile</title>
</head>
<head>
    <link href="css/profileUser.css" rel="stylesheet" id="profileUser-css">
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
                  </div>
                </div>
              </div>
            </div>

            <div class="col-md-8">
              <div class="card mb-3">
                <div class="card-body">

                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Name</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                      <?php echo $name; ?>
                    </div>
                  </div>

                  <hr>

                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Username</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                      <?php echo $username; ?>
                    </div>
                  </div>

                  <hr>

                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Email</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                      <?php echo $email; ?>
                    </div>
                  </div>

                  <hr>

                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Birth date</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                      <?php echo $birthdate; ?>
                    </div>
                  </div>

                  <hr>

                  <div class="row">
                    <div class="col-sm-12">
                      <a class="btn btn-info " href="editProfile/editInfo.php">Edit Info</a>
                    </div>
                    <div class="col-sm-12">
                      <a class="btn btn-info " href="editProfile/changePassword.php">Change Password</a>
                    </div>
                  </div>

                </div>
              </div>
            </div>

          </div>

        </div>
    </div>
      </body>
