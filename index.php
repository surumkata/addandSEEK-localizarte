<?php
require_once("connectDB.php");
$_SESSION['loginErro'] = 0;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
</head>
<body>
<main>
  <form method="POST" action="login.php">
   <input type="submit" value="Login"/>
 </form>

 <form method="POST" action="register.php">
   <input type="submit" value="Register"/>
 </form>
</main>
</body>
