<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
require_once 'core/init.php';
$user             =     new user();
$settinghandler   =     new settinghandler();
$uid              =     $_SESSION['UID'];
$LogoLink         =     Input::get('LogoLink');
$BrandCollor      =     Input::get('BrandCollor');
$CompanyName      =     Input::get('CompanyName');


if ($user->isloggedin()){
  echo "Stage1: OK!" ."<br>";
  if ($user->data()->Groupnum == 1) {
    echo "Stage2: OK!". "<br>";
    if ($LogoLink !== "" AND $BrandCollor !== "" AND $CompanyName !== "") {
      echo "stage3: OK!". "<br>";
      if ($LogoLink !== $settinghandler->GetLogoLink()) {
        if (!$settinghandler->updatesetting($uid, 'LogoLink', $LogoLink)) {
          echo "<br>"."LogoLinkEdit: OK!";
        } else {
          echo "<br>"."LogoLinkEdit: NOT OK!";
          die();
        }
      }
      if ($BrandCollor !== $settinghandler->GetBrandCollor()) {
        if (!$settinghandler->updatesetting($uid, 'BrandCollor', $BrandCollor)) {
          echo "<br>"."BrandCollorEdit: OK!";
        } else {
          echo "<br>"."BrandCollorEdit: NOT OK!";
          die();
        }
      }
      if ($CompanyName !== $settinghandler->GetCompanyName()) {
        if (!$settinghandler->updatesetting($uid, 'CompanyName', $CompanyName)) {
          echo "<br>"."CompanyNameEdit: OK!";
        } else {
          echo "CompanyNameEdit: NOT OK!";
          die();
        }
      }
      session::setflash('Dmelding','wijzigingen zijn doorgevoerd');
      redirect::to('settings.php');

    } else {
      session::setflash('Dmelding','Invoer incorrect @ MailSettings');
      redirect::to('settings.php');
    }
  } else {
  redirect::to('index.php');
  }
} else {
  redirect::to('index.php');
}
 ?>
