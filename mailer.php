<?php
error_reporting(0);
require 'core/init.php';


function sendmail($mailto, $mailsub, $mailmessage){

$_headermail = "<img src='https://www.brainconsultant.nl/wp-content/themes/brainconsultant/images/logo2.png' alt='logo'><h1 style='color: #FF0082'>  Ticketing system  </h1><br>";
$_greetings = "<br> <p> m.v.g. BrainConsultant </p>";
$_footermail = "<div style='width: 100%; height 20px; background-color: #FF0082; margin:0; text-align:center;'><p>als u op dit mail adres reageert, sturen wij geen reactie</p></div>";
require_once 'phpmailer/PHPMailerAutoload.php';
require_once 'phpmailer/class.phpmailer.php';
$mail = new PHPMailer();
$mail->IsSMTP();                                      // Set mailer to use SMTP
$mail->Host = 'mail.axc.nl';                 // Specify main and backup server
$mail->Port = 465;                                    // Set the SMTP port
$mail->SMTPAuth = true;                               // Enable SMTP authentication
$mail->Username = 'ticketing@brain-tech.nl';                // SMTP username
$mail->Password = 'MkKyPlNnsc';                  // SMTP password
$mail->SMTPSecure = 'ssl';                            // Enable encryption, 'ssl' also accepted

$mail->From = 'ticketing@brain-tech.nl';
$mail->FromName = 'Ticketing System';
$mail->AddAddress($mailto);  // Add a recipient

$mail->IsHTML(true);                                  // Set email format to HTML

$mail->Subject = $mailsub;
$mail->Body    = $_headermail . $mailmessage . $_greetings . $_footermail;
$mail->AltBody = $mailmessage;

if(!$mail->Send()) {
   echo 'Message could not be sent.';
   echo 'Mailer Error: ' . $mail->ErrorInfo;
   exit;
}

echo 'Message has been sent';
}
 ?>
