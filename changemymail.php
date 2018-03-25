<?php
require_once 'core/init.php';
$user = new user();
$uidedit = $user->data()->User_ID;
$ustatus = $user->data()->Groupnum;
$newmail = Input::get('newmail');
$validate = new validate();
  if ($user->isloggedin()) {
  $user->changemail($uidedit, $newmail);
  $mailto = $user->data()->MailAddress;
  $mailsub = 'wachtwoord gewijzicht';
  $mailmessage = "Beste ". $user->data()->name ."<br>uw Mailaddress voor BrainConsultant ticketing system is gewijzicht naar: ". $newmail ."<br> uw gebruikersnaam is: ". $user->data()->UserName ."<br> met deze gegevens kunt u inloggen bij brainconsultant ticketing system.";
  sendmail($mailto, $mailsub, $mailmessage);
  redirect::to('dashboard_gebruikers.php');
  }else {
    redirect::to('dashboard_home_c.php');
  }
else
{
redirect::to('changemypassword.php?mismatch=1');
}

?>
