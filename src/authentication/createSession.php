<?php

require_once("../db/connectDB.php");





if(isSet($_POST['credential']) && isSet($_POST['password'])){
      $consult = "SELECT * FROM users WHERE (LOWER(username) = LOWER('" . $_POST['credential'] . "') OR LOWER(email)=LOWER('" . $_POST['credential'] . "') ) AND password = '" . md5($_POST['password']) . "'";
      $resultado = mysqli_query($connection,$consult);
      $registo = mysqli_fetch_row($resultado);

     if(mysqli_num_rows($resultado) > 0){
       $_SESSION['username'] = $registo[0];
       $_SESSION['type'] = $registo[5];
       if($registo[5] == 1){
           $_SESSION['type'] = "admin";
       }else{
           $_SESSION['type'] = "user";
     }
     $_SESSION['loginErro'] = 0;
     echo "sessao iniciada";
     header('Location: http://localhost/LI4/src/index.php');
   }else{
     $_SESSION['loginErro'] = 1;
     header('Location: http://localhost/LI4/src/authentication/login.php');
   }
}
?>
