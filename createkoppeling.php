<?php
require_once 'core/init.php';
  session_start();
  $uid = Input::get('uid');
  $tid = Input::get('ticketid');
  $notify = new notify();
  $user = new user();
  $ticketing = new ticketing();
  if ($uid != "") {
  if ($user->isloggedin()) {
    if ($user->data()->Groupnum == 1) {
      echo $tid. $uid;
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
                $user->find($uid);
                $mailto = $user->data()->MailAddress;
                $mailsub = 'koppeling gemaakt.';
                $mailmessage = "beste " . $user->data()->name . "<br>er is een koppeling gemaakt aan uw account en een ticket. ID:(" . $tid . ")";
                sendmail($mailto, $mailsub, $mailmessage);





            session::setflash('melding','koppelen voltooid');
            redirect::to('ticketview.php?ticketid=' . $tid);
            } else {
              session::setflash('melding','koppeling bestaat al');
          redirect::to('ticketview.php?ticketid=' . $tid);
        }
      } else {
        session::setflash('melding','U heeft geen rechten om deze actie uit te voeren');
    redirect::to('ticketview.php?ticketid=' . $tid);
    }
  } else {
redirect::to('index.php');
}
}else {
  session::setflash('melding','invoercheck mislukt');
redirect::to('ticketview.php?ticketid=' . $tid);
}

   ?>
