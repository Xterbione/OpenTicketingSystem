<?php
require_once 'core/init.php';
$uidedit = Input::get('uidedit');
$user = new user();
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
  if ($ustatus == 1) {
  $user->changepass($uidedit, $passwordraw);
  $user->find($uidedit);
  $mailto = $user->data()->MailAddress;
  $mailsub = 'wachtwoord gewijzicht';
  $mailmessage = "uw wachtwoord voor BrainConsultant ticketing system is gewijzicht naar: ". $passwordraw ."<br> uw gebruikersnaam is: ". $user->data()->UserName ."<br> met deze gegevens kunt u inloggen bij brainconsultant ticketing system.";
  sendmail($mailto, $mailsub, $mailmessage);
  redirect::to('dashboard_gebruikers.php');
  }else {
    redirect::to('dashboard_home_c.php');
  }
}
else {
  foreach ($validate->errors() as $error) {
      echo $error , '<br>';
      ?>
      <input type="hidden" name="uidedit" value="<?php $uidedit ?>">
      <?php
        redirect::to('edituserpasswd.php?mismatch=1');
  }
}

?>
