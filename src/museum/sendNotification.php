<?php


require_once("../db/connectDB.php");

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require '../extra/PHPMailer/PHPMailer/src/Exception.php';
require '../extra/PHPMailer/PHPMailer/src/PHPMailer.php';
require '../extra/PHPMailer/PHPMailer/src/SMTP.php';


if(isSet($_SESSION['username'])){
  if(isSet($_SESSION['loginErro']) && $_SESSION['loginErro'] == 0){


    function sendNotification($username,$museum){
      $mail = new PHPMailer();
      $mail->IsSMTP();
      $mail->Mailer = "smtp";

      $mail->SMTPDebug  = 1;
      $mail->SMTPAuth   = TRUE;
      $mail->SMTPSecure = "tls";
      $mail->Port       = 587;
      $mail->Host       = "smtp-mail.outlook.com";
      $mail->Username   = "localizarte@outlook.pt";
      $mail->Password   = "Locaziarte_2022";

      $mail->IsHTML(true);
      $mail->AddAddress("localizarte@outlook.pt", "localizarte");
      $mail->SetFrom("localizarte@outlook.pt", "localizarte");
      $mail->Subject = "A submission has been made to edit a museum's page";
      $content = "<p>Request from: ".$username."</p><p>Subject: ".$museum."</p>";
      $mail->MsgHTML($content);
      if(!$mail->Send()) {
        echo "Error while sending Email.";
      } else {
        echo "Email sent successfully";
      }

    }
  }
}else header('Location: http://localhost:8888/authentication/login.php');

 ?>
