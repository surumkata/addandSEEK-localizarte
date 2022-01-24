<?php
  require_once("../db/connectDB.php");
    $today = date("Y-m-d");
    $today = date('Y-m-d',(strtotime ( '-4747 day' , strtotime ( $today) ) ));

 ?>


<!DOCTYPE html>
<html lang="en">
<head>
    <title>Register</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/default.css">
    <link rel="stylesheet" href="https://www.phptutorial.net/app/css/style.css">
    <title>Register</title>
    <script type="text/javascript">
    var check = function() {
      if (document.getElementById('password').value == document.getElementById('confirm_password').value) {
        document.getElementById('message').style.color = 'green';
        document.getElementById('message').innerHTML = 'Matching';
        document.getElementById('sign').disabled = false;
      } else {
        document.getElementById('message').style.color = 'red';
        document.getElementById('message').innerHTML = 'Not matching';
        document.getElementById('sign').disabled = true;
      }
    }
    </script>
</head>
<body>
<main class="regular_text text_black">
    <form action="insertReg.php" method="post">
        <h1 class="bold_text">Sign Up</h1>
        <div>
            <label for="name">Name:</label>
            <input type="name" required name="name">
        </div>
        <div>
            <label for="username">Username:</label>
            <input type="text" required name="username" onkeypress="return event.charCode != 32">
        </div>
        <div>
            <label for="email">Email:</label>
            <input type="email" required name="email">
        </div>

        <div>
              <label for="birthdate">Birth date:</label>
              <input type="date" required name="birthdate" max='<?php echo $today; ?>' min="1920-01-01"><br>
        </div>
        <div>
            <label for="password">Password:</label>
            <input type="password" required name="password" id="password" onkeyup='check();'>
        </div>
        <div>
            <labelfor="password2">Password Again:</label>
            <input type="password" required id="confirm_password" onkeyup='check();' name="password2">
            <span id='message'></span>
        </div>
        <div>
            <label for="agree">
                <input type="checkbox" required name="agree" value="yes"/> <a class="regular_text text_black">I agree
                with the</a>
                <a class="bold_text" style="color:#ff9800" target="_blank" rel="noopener noreferrer" href="https://www.termsofservicegenerator.net/live.php?token=apkS3wlBfNEDkF6vR3MofdAJyG6f9QRt" title="term of services">term of services</a>
            </label>
        </div>
        <?php
          if(isSet($_SESSION['registerError']) && $_SESSION['registerError'] == 1){
            unset($_SESSION);
            ?>
            <p align="center" style="color:#b42828;position:relative">Username/Email already in use.</p>
            <?php
          }
         ?>
        <button class="simple-button" id="sign" style="margin-left:9vh;margin-bottom:2vh;" type="submit">Sign up</button>
        <footer>Already a member? <a style="color:#ff9800" href="login.php">Login here</a></footer>
    </form>
</main>
</body>
</html>
