<?php
require_once("connectDB.php");
$_SESSION['loginErro'] = 0;
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>Localizarte</title>
</head>
<head>
    <meta charset="UTF-8">
</head>
<body>
<main>
  <?php if(!isSet($_SESSION['username'])){ // not logged
    ?>

  <form method="POST" action="login.php">
   <input type="submit" value="Login"/>
 </form>

 <form method="POST" action="register.php">
   <input type="submit" value="Register"/>
 </form>
 <?php
}else{ //logged in

  if($_SESSION['type'] == "user"){
    ?>


  <form method="POST" action="profileUser.php">
   <input type="submit" value="Profile"/>
 </form>


 <form method="POST" action="sugestion.php">
  <input type="submit" value="Sugestion"/>
</form>


  <form method="GET" action="search.php">
    <input type="text" name="key" id="search">
    <?php // TODO: runlo mete condicao de procurar alguma coisa
          // antes de redirecionar no Search ?>
    <button type="submit">Search</button>
 </form>


  <form method="POST" action="logout.php">
   <input type="submit" value="Log out"/>
 </form>
 <?php
}else{
 ?>
 <form method="POST" action="requests.php">
  <input type="submit" value="Requests"/>
</form>


<form method="POST" action="logout.php">
  <input type="submit" value="Log out"/>
</form>
 <?php
}
?>
 <?php
}
?>
</main>
</body>
