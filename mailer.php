<?php
error_reporting(0);

function sendmail($mailto, $mailsub, $mailmessage){
require_once 'core/init.php';
require_once 'phpmailer/PHPMailerAutoload.php';
require_once 'phpmailer/class.phpmailer.php';
$_headermail = file_get_contents('includes/mailer/mailheader.php');
$_greetings = file_get_contents('includes/mailer/greetings.php');
$_footermail = file_get_contents('includes/mailer/footer.php');
$settinghandler  =   new settinghandler();
$Host            =   (string)$settinghandler->GetMailHost();
$port            =   (int)$settinghandler->GetMailPort();
$SMTPAuth        =   (bool)$settinghandler->GetMailSMTPauthentication();
$MailUser        =   (string)$settinghandler->GetMailUser();
$MailDomain      =   (string)$settinghandler->GetMailDomain();
$password        =   (string)$settinghandler->GetMailPassword();
$SMTPSecure      =   (string)$settinghandler->GetMailSMTPauthentication();
$FromName        =   (string)$settinghandler->GetMailFromName();
$MailAddress     =   $MailUser . '@' . $MailDomain;
$mail = new PHPMailer();
$mail->IsSMTP();                                      // Set mailer to use SMTP
$mail->Host = $Host;                 // Specify main and backup server
$mail->Port = $port;                                    // Set the SMTP port
$mail->SMTPAuth = $SMTPAuth;                               // Enable SMTP authentication
$mail->Username = $MailAddress;                // SMTP username
$mail->Password = $password;
if ($SMTPSecure == 'true') { // SMTP password
  $mail->SMTPSecure = true;                            // Enable encryption, 'ssl' also accepted
} else {
    $mail->SMTPSecure = false;
}

$mail->From = $MailAddress;
$mail->FromName = $FromName;
$mail->AddAddress($mailto);  // Add a recipient

$mail->IsHTML(true);                                  // Set email format to HTML

$mail->Subject = $mailsub;
$mail->Body    = $_headermail . $mailmessage . $_greetings . $_footermail;
$mail->AltBody = $mailmessage;

if(!$mail->Send()) {
   echo 'Message could not be sent.';
   echo 'Mailer Error: ' . $mail->ErrorInfo;
   echo "<br>"."Check de mail instellingen";
   exit;
}

echo 'Message has been sent';
}
 ?>
