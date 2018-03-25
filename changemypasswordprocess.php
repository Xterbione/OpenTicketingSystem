<?php
require_once 'core/init.php';
$user = new user();
$uidedit = $user->data()->User_ID;
$ustatus = $user->data()->Groupnum;
$passwordraw = Input::get('password');
$validate = new validate();
$validate = $validate->check($_POST, array(

'password' => array(
'required' => true,
'min'      => 4
),
'password_again' => array(
'required' => true,
'min'      => 4,
'matches'  => 'password'
)
));
if ($validate->passed()) {
  if ($user->isloggedin()) {
  $user->changepass($uidedit, $passwordraw);
  $mailto = $user->data()->MailAddress;
  $mailsub = 'wachtwoord gewijzicht';
  $mailmessage = "Beste ". $user->data()->name ."<br>uw wachtwoord voor BrainConsultant ticketing system is gewijzicht naar: ". $passwordraw ."<br> uw gebruikersnaam is: ". $user->data()->UserName ."<br> met deze gegevens kunt u inloggen bij brainconsultant ticketing system.";
  sendmail($mailto, $mailsub, $mailmessage);
  redirect::to('dashboard_gebruikers.php');
  }else {
    redirect::to('dashboard_home_c.php');
  }
}
else {
        redirect::to('changemypassword.php?mismatch=1');
}

?>
