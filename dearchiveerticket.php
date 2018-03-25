<?php
require_once 'core/init.php';
error_reporting(E_ALL);
ini_set('display_errors', 1);
$user = new user();
$ticketing = new ticketing();

$tid = Input::get('tid');
echo $tid;
if ($user->isloggedin()) {
  if ($user->data()->Groupnum == 1 OR $user->data()->User_ID == $ticketing->getticketcreatorbyid($tid)) {
    $ticketing->dearchiveticket($tid);
    session::setflash('gedearchiveerd','Dearchiveren van ticket: '.$tid.' geslaacht');
    redirect::to('dashboard_archive.php');
}else {
      session::flash('gedearchiveerd','Dearchiveren van ticket: '.$tid.' geslaacht');
    redirect::to('dashboard_archive.php');
    }
}else {
      session::flash('gedearchiveerd','Dearchiveren van ticket: '.$tid.' geslaacht');
    redirect::to('dashboard_archive.php');
    }


 ?>
