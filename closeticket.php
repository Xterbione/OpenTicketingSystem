<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);


require_once 'core/init.php';

$tid = Input::get('tid');
echo $tid;

$ticketing = new ticketing();
//
$ticketing->closeticket($tid);
redirect::to('dashboard_home.php');



 ?>
