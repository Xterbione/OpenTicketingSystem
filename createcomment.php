<?php
require_once 'core/init.php';
  session_start();
  $uid = $_SESSION['UID'];
  $date = date('Y-m-d H:i:s');
  $tid = Input::get('ticketid');
  $notify = new notify();
  $user = new user();
  $filter = new ticketing();
          $input = '';
          $input = Input::get('comment');
          print_r($input);
          if (Input::exists()) {
            if (Input::get('comment') != '') {
          try {
              $filter->createcomment(array(
                  'Ticket_ID'  => $tid,
                  'User_ID'  => $uid,
                  'PostDatum' => $date,
                  'Comment' => $input
                  ));


                    $notify->notifyprocessforticketing($tid);

                    $cid = $notify->getcreatorid($tid);
                    $uid = $_SESSION['UID'];
                  if ($uid != $cid) {
                    $user->find($creatorid);
                    $mailto = $user->data()->MailAddress;
                    $mailsub = 'nieuwe reactie op uw ticket!';
                    $mailmessage = "er is een reactie toegevoegd aan een van uw tickets. ID:(" . $tid . ")";
                    sendmail($mailto, $mailsub, $mailmessage);
                  }



          redirect::to('ticketview.php?ticketid=' . $tid);
          } catch (Exception $e) {
              die($e->getMessage());
          }
} else {
    redirect::to('ticketview.php?ticketid=' . $tid);
    }
} else {
  redirect::to('ticketview.php?ticketid=' . $tid);
}

   ?>
