<?php
 class notify {
            private $_notifyID,
                    $_UserID,
                    $_db;

        public function __construct(){
                $this->_db = db::getInstance();

          }



          public function get($user)
          {

            if (isset($user))
            {
              $data = $this->_db->get('Notifications', array('User_ID', '=', $user));
              // print_r($data->results());
              if ($data->count() !== 0) {
            foreach ($data->results() as $key)
            {
                  echo ' <div class="notifycontain" style=" min-height: 90px; margin: 12px; padding-top: 5px; padding-bottom: 20px;">';
                  echo '<p style="margin-bottom: -30px;">'.  htmlspecialchars($key->Notify_title, ENT_QUOTES) . '</p><br><hr></hr><br>';
                  echo  $key->Notify_content;
                  echo '</div>';
                }
              } else {
                echo "<p style='color:black;'> u heeft geen nieuwe notificaties </p>";
              }
            }
          }


          public function countnotify($user)
          {

            if (isset($user))
            {
              $data = $this->_db->get('Notifications', array('User_ID', '=', $user));
              // print_r($data->results());
            echo $data->count();
            }
          }


          public function createnotify($fields = array())
          {
              if (!$this->_db->insert('Notifications', $fields)) {
                  throw new Exception('er is een onverwachte fout opgetreden, je notificatie kon niet worden aangemaakt. :( vardump:');
                  print_r($fields);
              }
          }


          public function notifyprocessforticketing ($tid)
          {
                $array = array();
                  // $array = $this->getbetrokkenen($tid);

                $data = $this->_db->get('Ticket_Comments', array('Ticket_ID', '=', $tid));
                // print_r($data->results());
                    foreach ($data->results() as $key)
                    {
                      $uid = $key->User_ID;
                      if (!in_array($uid, $array))
                      {
                          array_push($array, $uid);
                      }

                    }

                    // $content = 'er is een reactie toegevoegd aan ticket:' . $tid;
                    // $notify = new notify();

                    print_r($array);
                    $content = "new message has been added to:  <a href='ticketview.php?ticketid=" . $tid ."'> " . $tid. "</a>";
                    foreach($array as $value){

                    $this->createnotify(array(
                        'User_ID'  => $uid,
                        'Notify_title' => 'Nieuwe reactie!',
                        'Notify_content' => $content
                        ));
                      }
              }

}


 ?>
