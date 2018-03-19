<?php
require_once 'core/init.php';
$uidedit = Input::get('uidedit');
$user = new user();
$ustat = Input::get('ustat');

$user = new user();
$ustatus = $user->data()->Groupnum;
  if ($ustatus == 1) {
    $user->changestat($uidedit, $ustat);
    redirect::to('dashboard_gebruikers.php');
  }else {
    redirect::to('dashboard_home_c.php');
  }

?>
