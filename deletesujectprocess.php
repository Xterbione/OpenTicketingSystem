<?php

require_once 'core/init.php';
error_reporting(E_ALL);
ini_set('display_errors', 1);
$user = new user();
$ticketing = new ticketing();
$SID = Input::get('SID');
echo $SID;
if ($user->isloggedin()) {
  if ($user->data()->Groupnum == 1) {

    $ticketing->remsubject($SID);

    session::setflash('melding','verwijderen van onderwerp geslaacht');
    redirect::to('dashboard_home.php');
}else {
    redirect::to('dashboard_home_C.php');
    }
}else {
    redirect::to('index.php');
}




 ?>
