<?php
require_once("../connectDB.php");
?>

<html lang="en">
<head>
  <title>Change password</title>
</head>
<head>
    <link rel="stylesheet" href="../css/password.css">
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-alpha1/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script type="text/javascript">
      $(document).ready(function(){
        $('.pass_show').append('<span class="ptxt">Show</span>');
      });


      $(document).on('click','.pass_show .ptxt', function(){
        $(this).text($(this).text() == "Show" ? "Hide" : "Show");
        $(this).prev().attr('type', function(index, attr){return attr == 'password' ? 'text' : 'password'; });
      });
    </script>
    <meta charset="UTF-8">
</head>
<body>
<div class="container rounded bg-white mt-5 mb-5" style="width:30%">
  	<div class="row" style="width: 100%">
        <form method="POST" action="changePasswordDb.php">
          <br>
  		    <label>Current Password</label>
  		    <div class="form-group pass_show">
                  <input type="password" name="currentpsw" value="" required class="form-control" placeholder="Current Password">
              </div>
  		       <label>New Password</label>
              <div class="form-group pass_show">
                  <input type="password" name="newpsw" value="" required class="form-control" placeholder="New Password">
              </div>
  		       <label>Confirm Password</label>
              <div class="form-group pass_show">
                  <input type="password" name="newpsw2" value="" required class="form-control" placeholder="Confirm Password">
              </div>
              <?php if( isSet( $_SESSION['error'] )) {?> <p style="color:red"> <?php echo $_SESSION['error']; ?> </p> <?php unset($_SESSION['error']);} ?>
              <div class="mt-5 text-center">
                <input type="submit" class="btn btn-primary px-4" value="Save Changes">
              </div>
        </form>
  	</div>
  </div
</body>
