<?php
require_once 'core/init.php';
error_reporting(E_ALL);
ini_set('display_errors', 1);
$user = new user;
$ticketing = new ticketing;
if ($user->data()->Groupnum == 1) {
if (!$ticketing->opschonen()) {
}
else {
  redirect::to('dashboard_home.php');
}
}
else {
  redirect::to('dashboard_home.php');
}

 ?>
