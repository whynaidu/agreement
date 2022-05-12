<?php

if ($_SERVER["REQUEST_METHOD"] == "POST")){
 //header("location:../samples/login.php");


use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';
require 'PHPMailer/src/Exception.php';

if(isset($_POST['signup'])){
  $email_no=$_POST['email'];
   $to=$email_no;
 
 $mail = new PHPMailer(true);
 try {
  //Server settings
  $mail->SMTPDebug = SMTP::DEBUG_SERVER; 
  $mail->SMTPDebug = 0;   
  $mail->isSMTP();                             
  $mail->Host       = 'smtp.hostinger.com';      
  $mail->SMTPAuth   = true;                             
  $mail->Username   = "vedant.naidu@tectignis.in";           
  $mail->Password   = 'Vedant@123';                          
  $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;          
  $mail->Port       = 465;                             

  //Recipients
  $mail->setFrom('vedant.naidu@tectignis.in', 'Tectignis It Solution');
  $mail->addAddress($email_no,"");    
  
  //Content
  $mail->isHTML(true);                               
  $mail->Subject = 'Welcome to Tectignis IT Solution';
  $mail->Body    = '<h1>Welcome '.$email_no.'</h1><br><hr><br><h3>We are thrilled to invite you to start 30 days free trials click the link below to visit the Tectignis It Solution<br><br><br><a style="color:white;background:blue;width:30px;height:20px;font-size:15px;" href="tec.tectignis.in">Link</a><br><br><br><hr><br><br>Tectignis IT Solution<br><br>Aashiyana CHS Shop No 05,<br> Sector 11, Plot No 29, <br>Kamothe, Navi Mumbai, <br>Maharashtra 410206</h3>';

  if($mail->send()){

    $sql=mysqli_query($conn,"INSERT INTO `collectuseremail`(`email`) VALUES ('$email_no')");
    if($sql=1){
      echo "<script>alert('Thank You ');</script>";
      //header("location:index.php");
    }
    else{
      echo "<script>alert('Something Wrong');</script>";
    }
  }
} catch (Exception $e) {
  echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}
}
}
?>