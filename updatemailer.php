<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
require_once 'core/init.php';
$user             =     new user();
$settinghandler   =     new settinghandler();
$uid              =     $_SESSION['UID'];
$MailHost         =     Input::get('MailHost');
$MailPort         =     Input::get('MailPort');
$SMTPSecure       =     Input::get('SMTPSecure');
$DisplayName      =     Input::get('DisplayName');
$MailDomain       =     Input::get('MailDomain');
$MailUser         =     Input::get('MailUser');
$MailPassword     =     Input::get('Password');

if ($user->isloggedin()){
  echo "Stage1: OK!" ."<br>";
  if ($user->data()->Groupnum == 1) {
    echo "Stage2: OK!". "<br>";
    if ($MailHost !== "" AND $MailPort !== "" AND $SMTPSecure !== "" AND $DisplayName !== "" AND $MailDomain !== "" AND $MailUser !== "" AND $MailPassword !== "") {

      if ($MailHost !== $settinghandler->GetMailHost()) {
        if (!$settinghandler->updatesetting($uid, 'MailHost', $MailHost)) {
          echo "<br>"."MailHostEdit: OK!";
        } else {
          echo "MailHostEdit: NOT OK!";
          die();
        }
      }
      if ($MailPort !== $settinghandler->GetMailPort()) {
        if (!$settinghandler->updatesetting($uid, 'MailPort', $MailPort)) {
          echo "<br>"."MailPortEdit: OK!";
        } else {
          echo "MailPortEdit: NOT OK!";
          die();
        }
      }
      if ($SMTPSecure !== $settinghandler->GetSMTPSecure()) {
        if (!$settinghandler->updatesetting($uid, 'SMTPSecure', $SMTPSecure)) {
          echo "<br>"."SMTPSecurityEdit: OK!";
        } else {
          echo "SMTPSecurityEdit: NOT OK!";
          die();
        }
      }

      if ($DisplayName !== $settinghandler->GetMailFromName()) {
        if (!$settinghandler->updatesetting($uid, 'MailFromName', $DisplayName)) {
          echo "<br>"."MailDisplayNameEdit: OK!";
        } else {
          echo "MailDisplayNameEdit: NOT OK!";
          die();
        }
      }
      if ($MailDomain !== $settinghandler->GetMailDomain()) {
        if (!$settinghandler->updatesetting($uid, 'MailDomain', $MailDomain)) {
          echo "<br>"."MailDomainEdit: OK!";
        } else {
          echo "MailDomainEdit: NOT OK!";
          die();
        }
      }

      if ($MailDomain !== $settinghandler->GetMailUser()) {
        if (!$settinghandler->updatesetting($uid, 'MailUser', $MailUser)) {
          echo "<br>"."MailUserEdit: OK!";
        } else {
          echo "MailUserEdit: NOT OK!";
          die();
        }
      }
      if ($Password !== $settinghandler->GetMailPassword()) {
        if (!$settinghandler->updatesetting($uid, 'MailPassword', $MailPassword)) {
          echo "<br>"."MailPasswordEdit: OK!";
        } else {
          echo "MailPasswordEdit: NOT OK!";
        }
      }
      session::setflash('smelding','wijzigingen zijn doorgevoerd');
      redirect::to('settings.php');

    } else {
      session::setflash('smelding','Invoer incorrect @ MailSettings');
      redirect::to('settings.php');
    }
  } else {
  redirect::to('index.php');
  }
} else {
  redirect::to('index.php');
}
 ?>
