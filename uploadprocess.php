<?php
require_once 'core/init.php';
error_reporting(E_ALL);
ini_set('display_errors', 1);
$files = new File();
$itemname = Input::get('itemname');
  if (token::check(Input::get('token'))) {
    if ($files->checkfiletype($_FILES['file'])) {
      if ($files->checkfilesize($_FILES['file'])) {
        if ($itemname !== "") {

      $uploadfile = $_FILES['file'];
      $newname = $files->uploadfile($_FILES['file']);
        // if ($files->checkfiletype('/uploads/kennisitems'.$newname)) {
      $files->additemtodb(array(
          'FileName'  => $newname,
          'FLNum'  => 1,
          'Item_Name'  => $itemname
        ));
      session::setflash('melding','Item Aangemaakt');
      redirect::to('dashboard_kennisitems.php');
    }else {
      session::setflash('melding','geen naam aangegeven');
      redirect::to('dashboard_kennisitems.php');
    }
      } else {
        session::setflash('melding','bestand is te groot');
        redirect::to('dashboard_kennisitems.php');
      }
} else {
  session::setflash('melding','bestand niet ondersteund of geen bestand geselecteerd');
  redirect::to('dashboard_kennisitems.php');
}
} else {
  session::setflash('melding','security token mismatch!');
  redirect::to('dashboard_kennisitems.php');
}


 ?>
