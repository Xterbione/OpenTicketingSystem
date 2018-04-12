<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
ini_set('safe_mode', 'off');
echo "start <br>";
require_once 'core/init.php';
$files     =   new File();
$ItemID    =   Input::get('itemID');
$user      =   new user();

if ($ItemID !== "") {
if ($user->isloggedin()) {
  if ($user->data()->Groupnum == 1) {
        $filelocation     =   $files->getFilelocation($ItemID);
        $filename         =   $files->getfilenamebyid($ItemID);
        $filenamelocation =   $filelocation . $filename;
        $files->deletekennisitemfromdb($ItemID);
                 echo $filenamelocation .'<br>';
        if (!unlink($filenamelocation)) {
            echo "PROCESSING: error @ file deletion! is your folder permission configured correctly?";
        } else {
           echo "PROCESS: Done!";
           session::setflash('melding','KennisItem verwijderd!');
           redirect::to('dashboard_kennisitems.php');
        }
} else {
  echo "ERROR: you do not have permission to execute this function";
}
} else {
  redirect::to('index.php');
}
}else {
  session::setflash('melding','gegevens kloppen niet. is er met de input getempert?');
  redirect::to('dashboard_kennisitems.php');
}





 ?>
