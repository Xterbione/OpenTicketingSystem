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
                  echo  htmlspecialchars($key->Notify_content, ENT_QUOTES);
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

}


 ?>
