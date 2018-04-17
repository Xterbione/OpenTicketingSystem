<?php
require_once 'core/init.php';
  session_start();
  $uid = $_SESSION['UID'];
  $date = date('Y-m-d H:i:s');
  $tid = Input::get('ticketid');
  $notify = new notify();
  $user = new user();
  $files = new File();
  $ticketing = new ticketing();
  if ($user->isloggedin()) {
    if ($user->data()->Groupnum == 1 OR $user->data()->User_ID == $ticketing->getticketcreatorbyid($tid)) {
      # code...
          $input = '';
          $input = Input::get('comment');
          $kennisitem = '';
          $kennisitem = Input::get('kennisitem');
          print_r($input);
          if (Input::exists()) {
            if (Input::get('comment') != '') {
              if ($kennisitem !== "") {
                if ($files->checkitem($kennisitem)) {
                  if ($user->data()->Groupnum == 1) {
                    echo "kennisitemcheck OK! <br>";
                  } else {
                    echo "permissioncheck not ok, removing kennisitem from input";
                  $kennisitem = 0;
                  }
                } else {
                  echo "kennisitemcheck not ok, removing kennisitem from input";
                  $kennisitem = 0;
                }
              }
          try {
              $ticketing->createcomment(array(
                  'Ticket_ID'  => $tid,
                  'User_ID'  => $uid,
                  'PostDatum' => $date,
                  'Comment' => $input,
                  'Item_ID' => $kennisitem
                  ));


                    $notify->notifyprocessforticketing($tid);

                    $cid = $notify->getcreatorid($tid);
                    $uid = $_SESSION['UID'];
                  if ($uid != $cid) {
                    if ($ticketing->checkkoppeling($tid, $uid)) {
                        //aanmaken notificatie
                      $content = "u bent gekoppeld aan ticket: <a href='ticketview.php?ticketid=" . $tid ."'> " . $tid. "</a>";

                          $notify->createnotify(array(
                          'User_ID'  => $uid,
                          'Notify_title' => 'Koppeling gemaakt',
                          'Notify_content' => $content
                          ));

                          //aanmaken melding

                      echo $tid. "<br>". $uid;
                      echo "<br>". "OK!";
                              $ticketing->createkoppeling(array(
                              'Ticket_ID'  => htmlspecialchars($tid, ENT_QUOTES),
                              'user_id'  => htmlspecialchars($uid, ENT_QUOTES)
                              ));
                              $ticketing->progressticket($tid);
                          }
                    $user->find($cid);
                    $mailto = $user->data()->MailAddress;
                    $mailsub = 'nieuwe reactie op uw ticket!';
                    $mailmessage = "beste " . $user->data()->name . "<br>er is een reactie toegevoegd aan een van uw tickets. ID:(" . $tid . ")";
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
}else {
  redirect::to('ticketview.php?ticketid=' . $tid);
}
}else {
  redirect::to('ticketview.php?ticketid=' . $tid);
}

   ?>
