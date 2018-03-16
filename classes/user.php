<?php
class user{
      private $_db,
              $_data,
              $_sessionid,
              $_session_user,
              $_isLoggedIn;

      public function __construct($user = null){
          $this->_db = db::getInstance();

          $this->_sessionid = config::get('session/session_id');
          $this->_session_user = config::get('session/session_username');



          if (!$user) {
            if (session::exists($this->_sessionid)) {
              $user = session::get($this->_sessionid);

              if ($this->find($user)) {
                $this->_isLoggedIn = true;
              } else {
                //process logout
              }
            }
          } else {
            $this->find($user);
          }
      }




      public function create($fields = array()){
        if (!$this->_db->insert('Users', $fields)) {
              throw new Exception('er is een onverwachte fout opgetreden, je account kon niet worden aangemaakt. :( ');
        }
      }


      public function find($user = null) {

        if ($user) {
          $field = (is_numeric($user)) ? 'User_ID' : 'UserName' ;
          $data = $this->_db->get('Users', array($field, '=', $user));

          if ($data->count()) {
            $this->_data = $data->first();
            return true;
          } 
        }
      }


      public function login ($username = null, $password = null) {

        $user = $this->find($username);

      if ($user) {
        if ($this->data()->password === hash::make($password, $this->data()->salt)) {
          if ($this->_db->insert('Login_History', $fields = array('user_id' => $this->data()->User_ID,'LastLoginDate' => date('Y-m-d H:i:s') ))) {
            # code...
          }
          session::put($this->_sessionid, $this->data()->User_ID );
          session::put($this->_session_user, $this->data()->UserName );

          return true;
        }
      }
    return false;
    }

    public function logout() {
      session::delete($this->_sessionid);
      session::delete($this->_session_user);

    }


    public function data(){
      return $this->_data;

    }

    public function isloggedin() {
      return $this->_isLoggedIn;

    }


    public function getallformanager()
    {
        $data = $this->_db->get('Users', array(1, '=', 1));
        // print_r($data->results());
        if ($data->count() !== 0) {
            foreach ($data->results() as $key) {
$groupnum = $key->Groupnum;


        echo "

        <tr>
          <td><i class='material-icons mdl-list__item-avatar'>person</i></td>
          <td class='mdl-data-table__cell--non-numeric'>".htmlspecialchars($key->MailAddress, ENT_QUOTES)."</td>
          <td class='mdl-data-table__cell--non-numeric'>".htmlspecialchars($key->UserName, ENT_QUOTES)."</td>
          <td class='mdl-data-table__cell--non-numeric'>".htmlspecialchars($key->name, ENT_QUOTES)."</td>
          <td class='mdl-data-table__cell--non-numeric'>".htmlspecialchars($key->DateOfCreation, ENT_QUOTES)."</td>
          <td>
            <select name='carlist' form='carform'>
              <option value='1' "; if ($groupnum == '1') {echo 'selected';}
            echo ">beheerder (1)</option>
              <option value='0' "; if ($groupnum == '0') {echo 'selected';}
            echo ">gebruiker(0)</option>
            </select>
          </td>
          <td>".htmlspecialchars($key->User_ID, ENT_QUOTES)."</td>
          <td><button class='mdl-button mdl-js-button mdl-button--raised mdl-button--accent'>toepassen</button></td>
          <form class='' action='peruserticketview.php' method='post'>
          <input type='hidden' name='vuid' value='".htmlspecialchars($key->User_ID, ENT_QUOTES)."'>
          <td><button class='mdl-button mdl-js-button mdl-button--raised mdl-button--accent'>tickets</button></td>
          </form>
          <td><button class='mdl-button mdl-js-button mdl-button--raised mdl-button--accent'>wachtwoord aanpassen</button></td>
        </tr>
          ";
            }
        } else {
            echo "<p style='color:black; margin-left: 45%;'>er zijn geen tickets A.T.M.</p>";
        }
    }
}




 ?>
