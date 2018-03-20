<?php
error_reporting(0);
require 'core/init.php';


function sendmail($mailto, $mailsub, $mailmessage){

$_headermail = file_get_contents('includes/mailer/mailheader.php');
$_greetings = file_get_contents('includes/mailer/greetings.php');
$_footermail = file_get_contents('includes/mailer/footer.php');
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
