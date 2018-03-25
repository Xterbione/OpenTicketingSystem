<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
require_once 'core/init.php';
$user = new user();
$ticketing = new ticketing();
$kid = int;
$uid = int;
$kid = Input::get('koppel_ID');
$uid = $_SESSION['UID'];
echo $kid. '<br>' .$uid. '<br>';
if ($user->isloggedin()){
  echo "stage 1" . '<br>';
  if ($user->data()->Groupnum == 1) {
    echo "stage 2".'<br>';
    if ($ticketing->checkkoppelingowner($kid, $uid)) {
      echo "stage 3";
      $ticketing->hidekoppeling($kid);
      echo "stage 4";
      session::setflash('melding','koppeling verborgen');
      redirect::to('dashboard_koppelingen.php');
    }
  }
}


 ?>
