<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
echo "initializing and checking.... <br>";
require_once 'core/init.php';
$user = new user();
$uidedit = $user->data()->User_ID;
$ustatus = $user->data()->Groupnum;
$newmail = Input::get('newmail');
$validate = new validate();
  if ($user->isloggedin()) {
    echo "validate user OK!<br>";
    if(filter_var($newmail, FILTER_VALIDATE_EMAIL)) {
      $mailto = $user->data()->MailAddress;
      $mailsub = 'mail gewijzicht';
      $mailmessage = "Beste ". $user->data()->name ."<br>uw Mailaddress voor BrainConsultant ticketing system is gewijzicht naar: ". $newmail ."<br> uw gebruikersnaam is: ". $user->data()->UserName ."<br> met deze gegevens kunt u inloggen bij brainconsultant ticketing system.";
      sendmail($mailto, $mailsub, $mailmessage);
      $user->changemail($uidedit, $newmail);
      session::setflash('melding','geslaagd');
      redirect::to('dashboard_profile.php');
   }
   else {
     echo "invallid mail";
     session::setflash('melding','error: input is geen mail adres');
     redirect::to('dashboard_profile.php');
     }
  }
  else
  {
    redirect::to('index.php');
  }

?>
