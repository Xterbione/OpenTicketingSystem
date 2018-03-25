<?php
require_once 'core/init.php';
error_reporting(E_ALL);
ini_set('display_errors', 1);
$user = new user();
$ticketing = new ticketing();
$notify = new notify();
$tid = Input::get('tid');
$creatorid = $ticketing->getticketcreatorbyid($tid);
if (isset($_SESSION['UID'])) {
  if ($user->data()->Groupnum == 1 OR $user->data()->User_ID == $creatorid) {
$ticketing->closeticket($tid);
$cid = $notify->getcreatorid($tid);
$uid = $_SESSION['UID'];
// if ($uid != $cid) {
// $user->find($creatorid);
// $mailto = $user->data()->MailAddress;
// $mailsub = 'Ticket gesloten!';
// $mailmessage = "beste " . $user->data()->name . "<br>een van uw tickets is gesloten. Ticket ID:(" . $tid . ")";
// sendmail($mailto, $mailsub, $mailmessage);
// }
echo "OK!";
session::setflash('tclosed','Ticket gesloten');
redirect::to('dashboard_home.php');


}else {
    redirect::to('ticketview.php?ticketid=' . $tid);
    }
}else {
    redirect::to('index.php');
    }


 ?>
