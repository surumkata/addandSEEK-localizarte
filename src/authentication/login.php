<?php require_once("../db/connectDB.php"); ?>


<!DOCTYPE html>
<html lang="en">
<head>
    <title>Login</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/default.css">
    <link rel="stylesheet" href="https://www.phptutorial.net/app/css/style.css">
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script type="text/javascript">
    function loginError(){
        Swal.fire({
        title: 'Error!',
        text: 'Wrong credentials',
        icon: 'error',
        confirmButtonText: 'Ok',
        confirmButtonColor: '#ff9800',
        focusConfirm: false
      });
    }
    </script>
    <title>Login</title>
</head>
<body>
<main class="regular_text text_black">
    <form action="createSession.php" method="post">
        <h1 class="bold_text">Sign in</h1>
        <div style="padding-top:1.3vh">
            <label for="credential">Username or email:</label>
            <input type="text" name="credential" id="credential">
        </div>
        <?php
          if(isSet($_SESSION['loginErro']) && $_SESSION['loginErro'] == 1){
            $_SESSION['loginErro'] = 0;
            ?>
            <script type="text/javascript">
              loginError();
            </script>
            <?php
          }

         ?>
        <div>
            <label for="password">Password:</label>
            <input type="password" name="password" id="password">
        </div>
        <button class="simple-button" style="margin-left:9vh;margin-bottom:2vh;" type="submit">Sign in</button>
        <footer>Don’t have the account yet? <a style="color:#ff9800" href="register.php">Sign up</a></footer>
    </form>
</main>
</body>
</html>
