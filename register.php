<?php
  require_once("connectDB.php");
    $today = date("Y-m-d");
    $today = date('Y-m-d',(strtotime ( '-4747 day' , strtotime ( $today) ) ));

 ?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://www.phptutorial.net/app/css/style.css">
    <title>Register</title>
</head>
<body>
<main>
    <form action="insertReg.php" method="post">
        <h1>Sign Up</h1>
        <div>
            <label for="name">Name:</label>
            <input type="name" required name="name" id="name">
        </div>
        <div>
            <label for="username">Username:</label>
            <input type="text" required name="username" id="username">
        </div>
        <div>
            <label for="email">Email:</label>
            <input type="email" required name="email" id="email">
        </div>

        <div>
              <label for="birthdate">Birth date:</label>
              <input type="date" id="birthdate" required name="birthdate" max='<?php echo $today; ?>' min="1920-01-01"><br>
        </div>
        <div>
            <label for="password">Password:</label>
            <input type="password" required name="password" id="password">
        </div>
        <div>
            <label for="password2">Password Again:</label>
            <input type="password" required name="password2" id="password2">
        </div>
        <div>
            <label for="agree">
                <input type="checkbox" required name="agree" id="agree" value="yes"/> I agree
                with the
                <a href="#" title="term of services">term of services</a>
            </label>
        </div>
        <?php
          if(isSet($_SESSION['registerError']) && $_SESSION['registerError'] == 1){
            ?>
            <p align="center" style="color:red;position:relative">Username/Email already in use.</p>
            <?php
          }
         ?>
        <button type="submit">Register</button>
        <footer>Already a member? <a href="login.php">Login here</a></footer>
    </form>
</main>
</body>
</html>
