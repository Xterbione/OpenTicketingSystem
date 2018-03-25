<?php
require_once 'core/init.php';
error_reporting(E_ALL);
ini_set('display_errors', 1);
$categorie = Input::get('categorie');
$titel =  htmlspecialchars(Input::get('titel'), ENT_QUOTES);
$beschrijving =  htmlspecialchars(Input::get('beschrijving'), ENT_QUOTES);
$ticketing = new ticketing();
$ticketid = hash::makemd5(date('Y-m-d H:i:s'));
$now = date('Y-m-d H:i:s');
$cid = $_SESSION['UID'];
$subjectarray = $ticketing->getsubjectsreturnarray();


// echo $categorie . "<br>" . $titel . "<br>" . $beschrijving . "<br>" . $ticketid . "<br>" . $now . "<br>" . $cid ;
// print_r($subjectarray);


    if (token::check(Input::get('token'))) {
if (in_array($categorie,$subjectarray)) {
  if (strlen($titel) <=  20 AND strlen($titel) > 1 ) {
      if (strlen($beschrijving) >  3) {

    $ticketing->createticket(array(
    'Ticket_ID'  => $ticketid,
    'onderwerp'  => $categorie,
    'aanmaakdatum' => $now,
    'titel' => $titel,
    'content' => $beschrijving,
    'status' => 'open',
    'Creator_ID' => $cid
));

    session::setflash('createticket','Ticket aangemaakt!');


    redirect::to('dashboard_home.php');
  }else {
     redirect::to('dashboard_create.php?f=1');
 }
} else {
      session::setflash('incimp','Invoer onjuist. controlleer alle velden');
      redirect::to('dashboard_create.php');
  }
} else {
        session::setflash('incimp','Invoer onjuist. controlleer alle velden');
  redirect::to('dashboard_create.php');
}
} else {
        session::setflash('incimp','Invoer onjuist. controlleer alle velden');
  redirect::to('dashboard_create.php');
}


 ?>
