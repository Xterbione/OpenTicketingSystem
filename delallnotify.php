<?php
require_once 'core/init.php';

$notify = new notify();
$user = new user();
$uid = $_SESSION['UID'];

if ($user->isloggedin()) {
    $notify->delallnotify($uid);
header('Location: ' . $_SERVER["HTTP_REFERER"] );
} else {
  redirect::to('index.php');
}

 ?>
