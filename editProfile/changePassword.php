<?php
require_once("../connectDB.php");




?>


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
<div class="container">
	<div class="row">
		<div class="col-sm-4">
      <form method="POST" action="changePasswordDb.php">
		    <label>Current Password</label>
		    <div class="form-group pass_show">
                <input type="password" name = "currentpsw" value="" required class="form-control" placeholder="Current Password">
            </div>
		       <label>New Password</label>
            <div class="form-group pass_show">
                <input type="password" name= "newpsw" value="" required class="form-control" placeholder="New Password">
            </div>
		       <label>Confirm Password</label>
            <div class="form-group pass_show">
                <input type="password" name = "newpsw2" value="" required class="form-control" placeholder="Confirm Password">
            </div>

            <div class="col-sm-9 text-secondary">
              <input type="submit" class="btn btn-primary px-4" value="Save Changes">
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
</body>
