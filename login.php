<?php require_once("connectDB.php"); ?>


<!DOCTYPE html>
<html lang="en">
<head>
    <title>Login</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://www.phptutorial.net/app/css/style.css">
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>;
    <script type="text/javascript">
    function loginError(){
        Swal.fire({
        title: 'Error!',
        text: 'Wrong info',
        icon: 'error',
        confirmButtonText: 'Cool'
      });
    }
    </script>
    <title>Login</title>
</head>
<body>
<main>
    <form action="createSession.php" method="post">
        <h1>Sign in</h1>
        <div>
            <label for="credential">Username or email:</label>
            <input type="text" name="credential" id="credential">
        </div>
        <?php
          if($_SESSION['loginErro'] == 1){
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
        <button type="submit">Login</button>
        <footer>Don’t have the account yet? <a href="register.php">Sign up</a></footer>
    </form>
</main>
</body>
</html>
