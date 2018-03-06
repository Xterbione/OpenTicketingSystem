<?php
require_once 'core/init.php';
  session_start();
  $uid = $_SESSION['UID'];
  $date = date('Y-m-d H:i:s');
  $tid = Input::get('ticketid');
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
