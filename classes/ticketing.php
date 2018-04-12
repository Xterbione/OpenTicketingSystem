  <?php
class ticketing
{
    public function __construct()
    {
        $this->_db = db::getInstance();
    }


    public function getsubjects()
    {
        $data = $this->_db->get('onderwerpen', array('enabled', '=', 1));
        // print_r($data->results());
        if ($data->count() !== 0) {
            foreach ($data->results() as $key) {
                echo '<li class="btnround" style="overflow: visible; width: auto; height: auto; padding: 12px 15px; float: left; cursor: pointer; display: flex; flex-wrap: no-wrap;" data-filter=".' . htmlspecialchars($key->onderwerptitel, ENT_QUOTES) . '"> <span>' .htmlspecialchars($key->onderwerptitel, ENT_QUOTES). '
                <div style="display: inline-block; max-width: 1px; max-height: 1px;"><div style="min-height: 25px; min-width: 25px; border-radius: 100%; background-color: red; position: relative; top: -20px; left: 10px; display: flex; justify-content: center; align-items: center;">X</div></span></li>';
            }
        } else {
            echo "<p style='color:black;'> u heeft nog geen onderwerpen toegevoegd </p>";
        }
    }






    public function getsubjectsselect()
    {
        $data = $this->_db->get('onderwerpen', array('enabled', '=', 1));
        // print_r($data->results());
        if ($data->count() !== 0) {
            foreach ($data->results() as $key) {
                echo '<option value="'.htmlspecialchars($key->onderwerptitel, ENT_QUOTES).'">'.htmlspecialchars($key->onderwerptitel, ENT_QUOTES) .'</option>';
            }
        } else {
            echo "<p style='color:black;'> er zijn nog geen items toegevoegd </p>";
        }
    }








    public function getsubjectsreturnarray()
    {
        $data = $this->_db->get('onderwerpen', array('enabled', '=', 1));
        // print_r($data->results());
        if ($data->count() !== 0) {
          $subjects = array();
            foreach ($data->results() as $key) {
              array_push($subjects, $key->onderwerptitel);
            }
            return $subjects;
        } else {
            echo "<p style='color:black;'> u heeft nog geen onderwerpen toegevoegd </p>";
        }
    }

    public function getallsubjects()
    {
        $data = $this->_db->get('onderwerpen', array(1, '=', 1));
        // print_r($data->results());
        if ($data->count() !== 0) {
            foreach ($data->results() as $key) {
                echo '<li class="btnround" style="width: auto; height: auto; padding: 12px 15px; float: left; cursor: pointer;" data-filter=".' . htmlspecialchars($key->onderwerptitel, ENT_QUOTES) . '"> <span>' .htmlspecialchars($key->onderwerptitel, ENT_QUOTES). '</span></li>';
            }
        } else {
            echo "<p style='color:black;'> u heeft nog geen onderwerpen toegevoegd </p>";
        }
    }


    public function createsubject($fields = array())
    {
        if (!$this->_db->insert('onderwerpen', $fields)) {
            throw new Exception('er is een onverwachte fout opgetreden, je onderwerp kon niet worden toegevoegd. :( vardump:');
            print_r($fields);
        }
    }




    public function getallopen()
    {
        $data = $this->_db->get('tickets', array('Status', '=', 'open'));
        // print_r($data->results());
        if ($data->count() !== 0) {
            foreach ($data->results() as $key) {


        echo "
              <div class='mix ".  htmlspecialchars($key->onderwerp, ENT_QUOTES) ." ticketcontainer row'>
                <div class='circleimage column row'></div>
                <div class='column row' style='margin-left: 30px;' class='textwrapperticketwindow'>
                  <h3 class=''>onderwerp:</h3> <p style='color: black;' class='dash'> ".  htmlspecialchars($key->onderwerp, ENT_QUOTES) ."</p>
                </div>
                <div class='column' style='margin-left: 30px;'  class='textwrapperticketwindow'>
                    <h3>aangemaakt op: </h3> <p style='color: black;'> " .  htmlspecialchars($key->aanmaakdatum, ENT_QUOTES) . " </p> <h3>titel: </h3> <p>".  htmlspecialchars($key->Titel, ENT_QUOTES) ."</p>
                </div>
                <div class='column' style='margin-left: 30px;'  class='textwrapperticketwindow'>
                   <h3>status:</h3><p style='color: black;'>".   htmlspecialchars($key->Status, ENT_QUOTES) ."</p>
                </div>
                 <a href='ticketview.php?ticketid=". htmlspecialchars($key->Ticket_ID, ENT_QUOTES)."' <button class='mdl-button mdl-js-button mdl-button--raised mdl-button--accent' style='position: relative; top: 50px;'> naar ticket
                 </button></a>
               </div>
          ";
            }
        } else {
            echo "<p style='color:black; margin-left: 45%;'>er zijn geen tickets A.T.M.</p>";
        }
    }

    public function getallfromuser($uid)
    {
        $data = $this->_db->get('tickets', array('Creator_ID  ', '=', $uid));
        // print_r($data->results());
        if ($data->count() !== 0) {
            foreach ($data->results() as $key) {


        echo "
            <div class='container'>
              <div class='mix ".  htmlspecialchars($key->onderwerp, ENT_QUOTES) ." ticketcontainer row'>
                <div class='circleimage column row'></div>
                <div class='column row' style='margin-left: 30px;' class='textwrapperticketwindow'>
                  <h3 class=''>onderwerp:</h3> <p style='color: black;' class='dash'> ".  htmlspecialchars($key->onderwerp, ENT_QUOTES) ."</p>
                </div>
                <div class='column' style='margin-left: 30px;'  class='textwrapperticketwindow'>
                    <h3>aangemaakt op: </h3> <p style='color: black;'> " .  htmlspecialchars($key->aanmaakdatum, ENT_QUOTES) . " </p> <h3>titel: </h3> <p>". $key->Titel ."</p>
                </div>
                <div class='column' style='margin-left: 30px;'  class='textwrapperticketwindow'>
                   <h3>status:</h3><p style='color: black;'>".   htmlspecialchars($key->Status, ENT_QUOTES) ."</p>
                </div>
                 <a href='ticketview.php?ticketid=". htmlspecialchars($key->Ticket_ID, ENT_QUOTES)."' <button class='mdl-button mdl-js-button mdl-button--raised mdl-button--accent' style='position: relative; top: 50px;'> naar ticket
                 </button></a>
               </div>
              </div>";
            }
        } else {
            echo "<p style='color:black; margin: 0 auto;'>er zijn mogelijk nog geen tickets aangemaakt</p>";
        }
    }

    public function getallfromcurrent()
    {
        $data = $this->_db->get('tickets', array('Creator_ID  ', '=', $_SESSION['UID']));
        // print_r($data->results());
        if ($data->count() !== 0) {
            foreach ($data->results() as $key) {


        echo "
            <div class='container'>
              <div class='mix ".  htmlspecialchars($key->onderwerp, ENT_QUOTES) ." ticketcontainer row'>
                <div class='circleimage column row'></div>
                <div class='column row' style='margin-left: 30px;' class='textwrapperticketwindow'>
                  <h3 class=''>onderwerp:</h3> <p style='color: black;' class='dash'> ".  htmlspecialchars($key->onderwerp, ENT_QUOTES) ."</p>
                </div>
                <div class='column' style='margin-left: 30px;'  class='textwrapperticketwindow'>
                    <h3>aangemaakt op: </h3> <p style='color: black;'> " .  htmlspecialchars($key->aanmaakdatum, ENT_QUOTES) . " </p> <h3>titel: </h3> <p>".  htmlspecialchars($key->Titel, ENT_QUOTES) ."</p>
                </div>
                <div class='column' style='margin-left: 30px;'  class='textwrapperticketwindow'>
                   <h3>status:</h3><p style='color: black;'>".   htmlspecialchars($key->Status, ENT_QUOTES) ."</p>
                </div>
                 <a href='ticketview.php?ticketid=". htmlspecialchars($key->Ticket_ID, ENT_QUOTES)."' <button class='mdl-button mdl-js-button mdl-button--raised mdl-button--accent' style='position: relative; top: 50px;'> naar ticket
                 </button></a>
               </div>
              </div>";
            }
        } else {
            echo "<p style='color:black; margin: 0 auto;'>er zijn mogelijk nog geen tickets aangemaakt</p>";
        }
    }



    public function getticketbyid($tid)
    {
        $data = $this->_db->get('tickets', array('Ticket_ID', '=', $tid));
        // print_r($data->results());
        if ($data->count() !== 0) {
            foreach ($data->results() as $key) {



        echo "
        <div class='mix ". htmlspecialchars($key->onderwerp, ENT_QUOTES) ." ticketcontainer row'>
            <div class='container'>
                <div class='circleimage column row'></div>
                <div class='column row' style='margin-left: 30px;' class='textwrapperticketwindow'>
                  <h3 class=''>onderwerp:</h3> <p style='color: black;' class='dash'> ". htmlspecialchars($key->onderwerp, ENT_QUOTES) ."</p>
                </div>
                <div class='column' style='margin-left: 30px;'  class='textwrapperticketwindow'>
                    <h3>aangemaakt op: </h3> <p style='color: black;'> " . htmlspecialchars($key->aanmaakdatum, ENT_QUOTES) . " </p> <h3>titel: </h3> <p>". htmlspecialchars($key->Titel, ENT_QUOTES) ."</p>
                </div>
                <div class='column' style='margin-left: 30px;'  class='textwrapperticketwindow'>
                   <h3>status:</h3><p style='color: black;'>".  htmlspecialchars($key->Status, ENT_QUOTES) ."</p>
                </div>
                 <a href='ticketview.php?ticketid=".htmlspecialchars($key->Ticket_ID, ENT_QUOTES)."' <button class='mdl-button mdl-js-button mdl-button--raised mdl-button--accent' style='position: relative; top: 50px;'> naar ticket
                 </button></a>
               </div>
              </div>";
            }
        } else {
            echo "<p style='color:black; margin: 0 auto;'>er zijn mogelijk nog geen tickets aangemaakt</p>";
        }
    }




    public function viewticketbyid($tid)
    {
        $data = $this->_db->get('tickets', array('Ticket_ID', '=', $tid));
        // print_r($data->results());
        $files = new File();
        if ($data->count() !== 0) {
            foreach ($data->results() as $key) {
              $creatorid = $key->Creator_ID;
                $user = new user();
               $user->find($creatorid);
              $koppelarray = $this->getticketkoppelingenbyid($tid);

        echo "
        <div class='demo-card-wide mdl-card mdl-shadow--2dp'>
         <div class='mdl-card__title'>
           <h2 class='mdl-card__title-text'>Ticket: </h2><span>". htmlspecialchars($key->Ticket_ID, ENT_QUOTES). "</span>
         </div>
         <div class='circleimage'>
         </div>
         <!-- Deletable Chip -->
         <div class='mdl-card__supporting-text'>
             <span>gemaakt door:</span>
             <span class='mdl-chip mdl-chip' style=' width: auto; '>
               <span style='padding-left: 5px; padding-right: 5px;' class='mdl-chip__text'>". htmlspecialchars($user->data()->name, ENT_QUOTES)."</span>
             </span>
         </div>
         <div class='mdl-card__supporting-text'>
            <span>categorie:</span>
            <span class='mdl-chip mdl-chip' style=' width: auto;'>
              <span style='padding-left: 5px; padding-right: 5px;' class='mdl-chip__text'>". htmlspecialchars($key->onderwerp, ENT_QUOTES)."</span>
            </span><br><br>
            <span>gekoppelde beheerders:</span>";
              foreach ($koppelarray as $arraykey) {

                echo "<span class='mdl-chip mdl-chip' style='width: auto; margin-left: 5px;'>
                   <img class='mdl-chip__contact' style='margin-left: -10%;' src='icons/userpin.jpg'></img>
                              <span style='padding-left: 5px; padding-right: 5px;' class='mdl-chip__text'>
                              ";

              $user->find($arraykey);
                echo $user->data()->name. ' ';

                  echo "</span>
                  </span>";

              }
              echo "
            <br>
            <h3>". htmlspecialchars($key->Titel, ENT_QUOTES)."</h3>
            <hr></hr>

            <p style='white-space: pre-wrap; color:black;'>". htmlspecialchars($key->content, ENT_QUOTES)."</p>
            <hr/>
            ";
            $status = $key->Status;
            if ($status == 'open' OR $status == 'behandelen') {

            echo "
            <form class='' action='closeticket.php' method='post'>
            <input type='hidden' name='tid' value='". $key->Ticket_ID ."'>
            <button type='submit' style='margin-left:0px;' class='mdl-button mdl-js-button mdl-button--raised'>Ticket opgelost</button>
            </form>
            ";
          }
            echo "
            <p style='float:right;'>". htmlspecialchars($key->aanmaakdatum, ENT_QUOTES)."</p>
            <p> gekoppelde items:</p>";
            $files->getticketitemkoppeling($tid);
          echo  "
          </div>
        <div class='mdl-card__menu'>
      </div>
    </div>


            ";
            $this->viewcommentsbyid($tid);
            }

        } else {
            echo "<p class='comment' style='color:black; margin: 0 auto;'>er zijn mogelijk nog geen tickets aangemaakt</p>";
        }
    }




    public function viewcommentsbyid($tid)
    {
        $data = $this->_db->get('Ticket_Comments', array('Ticket_ID', '=', $tid));
        // print_r($data->results());

        if ($data->count() !== 0) {
            foreach ($data->results() as $key) {
              $creatorid = $key->User_ID;
                $user = new user();

               $user->find($creatorid);
        echo "
        <div class='demo-card-wide mdl-card mdl-shadow--2dp'>
        <div class='circleimage'>
        </div>
        <!-- Deletable Chip -->
        <div class='mdl-card__supporting-text'>
          <span>reactie door:</span>
          <span class='mdl-chip mdl-chip' style='width: auto; '>
            <span style='padding-left: 5px; padding-right: 5px;' class='mdl-chip__text'>". htmlspecialchars($user->data()->name, ENT_QUOTES) ."</span>
          </span>
        </div>
        <div class='mdl-card__supporting-text'>
          <p style='white-space: pre-wrap; color:black;'>". htmlspecialchars($key->Comment, ENT_QUOTES) ." </p>
<hr></hr>
<p style='float:right;'>". htmlspecialchars($key->PostDatum, ENT_QUOTES) ."</p>
        </div>
      <div class='mdl-card__menu'></div>
      </div>";
            }
        } else {

        }
    }





    public function createcomment($fields = array())
    {
        if (!$this->_db->insert('Ticket_Comments', $fields)) {
            throw new Exception('er is een onverwachte fout opgetreden, je onderwerp kon niet worden toegevoegd. :( vardump:');
            print_r($fields);
        }
    }




    public function getticketcreatorbyid($tid)
    {
        $data = $this->_db->get('tickets', array('Ticket_ID', '=', $tid));
        // print_r($data->results());
        if ($data->count() !== 0) {
            foreach ($data->results() as $key) {



        return htmlspecialchars($key->Creator_ID, ENT_QUOTES);

            }
        } else {
            echo "<p style='color:black;'>er is iets fout gegaan</p>";
        }
    }

    public function getticketcountbycategorie()
    {
      $returnvalue = array();
      $subjects = array();
      $current = date('Y-m-d H:i:s');
      $weekago =  date('Y-m-d', strtotime("$current -10 days"));
      $subjects = $this->getsubjectsreturnarray();
      foreach($subjects as $subject) {
        $data = $this->_db->get('tickets', array('onderwerp', '=', $subject));
                $counter = 0;
                foreach($data->results() as $dat) {
                  if ($dat->aanmaakdatum > $weekago) {
                    $counter++;
                  }
                }
                  $pushable = array($subject, $counter);
                  array_push($returnvalue, $pushable);
                }
      return json_encode($returnvalue);
    }

    public function getticketstatusbyid($tid)
    {
        $data = $this->_db->get('tickets', array('Ticket_ID', '=', $tid));
        // print_r($data->results());
        if ($data->count() !== 0) {
            foreach ($data->results() as $key) {



        return htmlspecialchars($key->Status, ENT_QUOTES);

            }
        } else {
            echo "<p style='color:black;'>er is iets fout gegaan</p>";
        }
    }

    public function opschonen()
    {
      $myDate = date("Y-m-d", strtotime( date( "Y-m-d", strtotime( date("Y-m-d") ) ) . "-36 month" ) );
        if (!$this->_db->delete('tickets', array('aanmaakdatum', '<=', $myDate))) {
            throw new Exception('er is een onverwachte fout opgetreden, kan opschonen niet uitvoeren. :( @stage1');

        } else {
          if (!$this->_db->delete('Ticket_Comments', array('PostDatum', '<=', $myDate))) {
              throw new Exception('er is een onverwachte fout opgetreden, kan opschonen van comments niet voltooien. :( @stage2');
              print_r($fields);
          }
           else {
             if (!$this->_db->delete('Login_History', array('LastLoginDate', '<=', $myDate))) {
                 throw new Exception('er is een onverwachte fout opgetreden, kan opschonen van comments niet voltooien. :( @stage3');
                 print_r($fields);
             }
             else {
               return true;
             }
          }
        }
    }

    public function createticket($fields = array())
    {
        if (!$this->_db->insert('tickets', $fields)) {
            throw new Exception('er is een onverwachte fout opgetreden, je onderwerp kon niet worden toegevoegd. :( vardump:');
            print_r($fields);
        }
    }

    public function closeticket($tid)
    {
        if (!$this->_db->updateticket('tickets', $tid, array('Status' => 'gesloten'))) {
            throw new Exception('er is een onverwachte fout opgetreden, je ticket kon niet worden gesloten. :(');
            print_r($fields);
        }
    }
    public function archiveticket($tid)
    {
        if (!$this->_db->updateticket('tickets', $tid, array('gearchiveerd' => '1'))) {
            throw new Exception('er is een onverwachte fout opgetreden, je ticket kon niet worden gesloten. :(');
            print_r($fields);
        }
    }
    public function dearchiveticket($tid)
    {
        if (!$this->_db->updateticket('tickets', $tid, array('gearchiveerd' => '0'))) {
            throw new Exception('er is een onverwachte fout opgetreden, je ticket kon niet worden gesloten. :(');
            print_r($fields);
        }
    }

    public function archiveerticket($tid)
    {
        if (!$this->_db->updateticket('tickets', $tid, array('Status' => 'gearchiveerd'))) {
            throw new Exception('er is een onverwachte fout opgetreden, je ticket kon niet worden gesloten. :(');
            print_r($fields);
        }
    }


    public function getticketcountbyid($tid)
    {
        $data = $this->_db->get('tickets', array('Creator_ID', '=', $tid));
        // print_r($data->results());
          return $data->count();
    }

    public function getcommentcountbyid($tid)
    {
        $data = $this->_db->get('Ticket_Comments', array('User_ID', '=', $tid));
        // print_r($data->results());
          return $data->count();
    }



    public function getallfromuserarchive($uid)
    {
        $data = $this->_db->get('tickets', array('Creator_ID', '=', $uid));
        // print_r($data->results());
        $count = 0;
        if ($data->count() !== 0) {
            foreach ($data->results() as $key) {
              if ($key  ->gearchiveerd == 1) {
                $count++;

        echo "
        <div class='container'>
          <div class='mix ".  htmlspecialchars($key->onderwerp, ENT_QUOTES) ." ticketcontainer row'>
            <div class='circleimage column row'></div>
            <div class='column row' style='margin-left: 30px; width: 80px;' class='textwrapperticketwindow'>
              <h3 class=''>onderwerp:</h3> <p style='color: black;' class='dash'> ".  htmlspecialchars($key->onderwerp, ENT_QUOTES) ."</p>
            </div>
            <div class='column' style='margin-left: 30px; width: 160px;'  class='textwrapperticketwindow'>
                <h3>aangemaakt op: </h3> <p style='color: black;'> " .  htmlspecialchars($key->aanmaakdatum, ENT_QUOTES) . " </p> <h3>titel: </h3> <p>". $key->Titel ."</p>
            </div>
            <div class='column' style='margin-left: 30px; padding-bottom: 10px; width: 60px;'  class='textwrapperticketwindow'>
               <h3>status:</h3><p style='color: black;'>".   htmlspecialchars($key->Status, ENT_QUOTES) ."</p>
            </div>
             <a style='margin-bottom: 6px; margin-top: 40px; margin-left: 15px;' href='ticketview.php?ticketid=". htmlspecialchars($key->Ticket_ID, ENT_QUOTES)."' <button class='mdl-button mdl-js-button mdl-button--raised mdl-button--accent' style='position: relative; top: 50px;'> naar ticket
             </button></a>
             <a style=' margin-left: 15px; margin-bottom: 15px;' href='dearchiveerticket.php?tid=". htmlspecialchars($key->Ticket_ID, ENT_QUOTES)."' <button class='mdl-button mdl-js-button mdl-button--raised mdl-button--accent' style='position: relative; top: 50px;'> dearchiveren
             </button></a>
           </div>
          </div>";
              }
            }
        }
        if ($count < 1)  {
            echo "<p style='color:black; margin: 0 auto; text-align:center;'>er zijn geen gearchiveerde tickets gevonden</p>";
        }
    }

    public function getallfromusernoarchive($uid)
    {


        $data = $this->_db->get('tickets', array('Creator_ID', '=', $uid));
        // print_r($data->results());
          $count = 0;
        if ($data->count() !== 0) {
            foreach ($data->results() as $key) {
              if ($key->gearchiveerd == 0) {

                  $count++;
        echo "
            <div class='container'>
              <div class='mix ".  htmlspecialchars($key->onderwerp, ENT_QUOTES) ." ticketcontainer row'>
                <div class='circleimage column row'></div>
                <div class='column row' style='margin-left: 30px; width: 80px;' class='textwrapperticketwindow'>
                  <h3 class=''>onderwerp:</h3> <p style='color: black;' class='dash'> ".  htmlspecialchars($key->onderwerp, ENT_QUOTES) ."</p>
                </div>
                <div class='column' style='margin-left: 30px; width: 160px;'  class='textwrapperticketwindow'>
                    <h3>aangemaakt op: </h3> <p style='color: black;'> " .  htmlspecialchars($key->aanmaakdatum, ENT_QUOTES) . " </p> <h3>titel: </h3> <p>". $key->Titel ."</p>
                </div>
                <div class='column' style='margin-left: 30px; padding-bottom: 10px; width: 60px;'  class='textwrapperticketwindow'>
                   <h3>status:</h3><p style='color: black;'>".   htmlspecialchars($key->Status, ENT_QUOTES) ."</p>
                </div>
                 <a style='margin-bottom: 6px; margin-top: 40px; margin-left: 15px;' href='ticketview.php?ticketid=". htmlspecialchars($key->Ticket_ID, ENT_QUOTES)."' <button class='mdl-button mdl-js-button mdl-button--raised mdl-button--accent' style='position: relative; top: 50px;'> naar ticket
                 </button></a>
                 ";
                 if ($key->Status == 'gesloten') {
                 echo "
                 <a style=' margin-left: 15px;' href='archiveerticket.php?tid=". htmlspecialchars($key->Ticket_ID, ENT_QUOTES)."' <button class='mdl-button mdl-js-button mdl-button--raised mdl-button--accent' style='position: relative; top: 50px;'> archiveren
                 </button></a>";
               }

                 echo "
               </div>
              </div>";
              }
            }
        }   if ($count < 1)  {
            echo "<p style='color:black; text-align:center;'>er zijn mogelijk nog geen tickets aangemaakt</p>";
        }
    }

    public function getallfromkoppeling($uid)
    {
        $data = $this->_db->get('koppelingen', array('user_id', '=', $uid));
        // print_r($data->results());
        $counter = 0;
        if ($data->count() !== 0) {
            foreach ($data->results() as $key_first) {
            $tid = $key_first->Ticket_ID;
            $koppel_ID = $key_first->Koppeling_ID;
            if ($key_first->hide == 0) {

                $data2 = $this->_db->get('tickets', array('Ticket_ID', '=', $tid));
                    foreach ($data2->results() as $key) {

                      $counter++;
        echo "

        <tr>
          <td><i class='material-icons mdl-list__item-avatar'>person</i></td>
          <td class='mdl-data-table__cell--non-numeric'>".htmlspecialchars($key->Ticket_ID, ENT_QUOTES)."</td>
          <td class='mdl-data-table__cell--non-numeric'>".htmlspecialchars($key->onderwerp, ENT_QUOTES)."</td>
          <td class='mdl-data-table__cell--non-numeric'>".htmlspecialchars($key->aanmaakdatum, ENT_QUOTES)."</td>
          <td class='mdl-data-table__cell--non-numeric'>".htmlspecialchars($key->Titel, ENT_QUOTES)."</td>
          <td class='mdl-data-table__cell--non-numeric'>".htmlspecialchars($key->Status, ENT_QUOTES)."</td>
            <td class='mdl-data-table__cell--non-numeric'>".htmlspecialchars($key->Creator_ID, ENT_QUOTES)."</td>
          <td>
          <a style='margin-bottom: 6px; margin-top: 40px; margin-left: 15px;' href='ticketview.php?ticketid=". htmlspecialchars($key->Ticket_ID, ENT_QUOTES)."' <button class='mdl-button mdl-js-button mdl-button--raised mdl-button--accent' style='position: relative; top: 50px;'> naar ticket
          </button></a>
          </td>
          <td>
          <a style='margin-bottom: 6px; margin-top: 40px; margin-left: 15px;' href='hidekoppeling.php?koppel_ID=". htmlspecialchars($koppel_ID, ENT_QUOTES)."' <button class='mdl-button mdl-js-button mdl-button--raised mdl-button--accent' style='position: relative; top: 50px;'> Koppeling verbergen
          </button></a>
          </td>
        </tr>
          ";
              }
            }
          }
        }
        if ($counter == 0) {

            echo "<p style='color:black; margin-left: 45%;'>er zijn geen koppelingen gevonden</p>";
        }
    }

    public function getallfromkoppelingverborgen($uid)
    {
        $data = $this->_db->get('koppelingen', array('user_id', '=', $uid));
        // print_r($data->results());
        $counter = 0;
        if ($data->count() !== 0) {
            foreach ($data->results() as $key_first) {
            $tid = $key_first->Ticket_ID;
            $koppel_ID = $key_first->Koppeling_ID;
            if ($key_first->hide == 1) {

                $data2 = $this->_db->get('tickets', array('Ticket_ID', '=', $tid));
                    foreach ($data2->results() as $key) {

                      $counter++;
        echo "

        <tr>
          <td><i class='material-icons mdl-list__item-avatar'>person</i></td>
          <td class='mdl-data-table__cell--non-numeric'>".htmlspecialchars($key->Ticket_ID, ENT_QUOTES)."</td>
          <td class='mdl-data-table__cell--non-numeric'>".htmlspecialchars($key->onderwerp, ENT_QUOTES)."</td>
          <td class='mdl-data-table__cell--non-numeric'>".htmlspecialchars($key->aanmaakdatum, ENT_QUOTES)."</td>
          <td class='mdl-data-table__cell--non-numeric'>".htmlspecialchars($key->Titel, ENT_QUOTES)."</td>
          <td class='mdl-data-table__cell--non-numeric'>".htmlspecialchars($key->Status, ENT_QUOTES)."</td>
            <td class='mdl-data-table__cell--non-numeric'>".htmlspecialchars($key->Creator_ID, ENT_QUOTES)."</td>
          <td>
          <a style='margin-bottom: 6px; margin-top: 40px; margin-left: 15px;' href='ticketview.php?ticketid=". htmlspecialchars($key->Ticket_ID, ENT_QUOTES)."' <button class='mdl-button mdl-js-button mdl-button--raised mdl-button--accent' style='position: relative; top: 50px;'> naar ticket
          </button></a>
          </td>
          <td>
          <a style='margin-bottom: 6px; margin-top: 40px; margin-left: 15px;' href='showkoppeling.php?koppel_ID=". htmlspecialchars($koppel_ID, ENT_QUOTES)."' <button class='mdl-button mdl-js-button mdl-button--raised mdl-button--accent' style='position: relative; top: 50px;'> Koppeling niet langer verbergen
          </button></a>
          </td>
        </tr>
          ";
              }
            }
          }
        }
        if ($counter == 0) {

            echo "<p style='color:black; margin-left: 45%;'>er zijn geen verborgen koppelingen gevonden</p>";
        }
    }


    public function checkkoppeling($tid, $uid)
    {
        $data = $this->_db->get('koppelingen', array('Ticket_ID', '=', $tid));
        $countchecker = 0;
        if ($data->count() !== 0) {
            foreach ($data->results() as $key) {
              if ($key->user_id == $uid) {
                $countchecker++;
              }
            }
        }
        if ($countchecker < 1) {
          return true;
        } else {
          return false;
        }
    }

    public function createkoppeling($fields = array())
    {
        if (!$this->_db->insert('koppelingen', $fields)) {
            throw new Exception('er is een onverwachte fout opgetreden, je onderwerp kon niet worden toegevoegd. :( vardump:');
            print_r($fields);
        }
    }
    public function progressticket($tid)
    {
        if (!$this->_db->updateticket('tickets', $tid, array('Status' => 'behandelen'))) {
            throw new Exception('er is een onverwachte fout opgetreden, je ticket kon niet worden gesloten. :(');
            print_r($fields);
        }
    }



    public function getticketkoppelingenbyid($tid)
    {
        $data = $this->_db->get('koppelingen', array('Ticket_ID', '=', $tid));
        // print_r($data->results());
        $koppelarray = array();
        if ($data->count() !== 0) {
            foreach ($data->results() as $key) {
                array_push($koppelarray, $key->user_id);
            }
            return $koppelarray;
        } else {

        }
    }

    public function checkkoppelingowner($kid, $uid)
    {
        $data = $this->_db->get('koppelingen', array('Koppeling_ID', '=', $kid));
        // print_r($data->results());
        if ($data->count() !== 0) {
            foreach ($data->results() as $key) {
              if ($key->user_id == $uid) {
                return true;
              }
            }
        } else {
          return false;
        }
    }


    public function hidekoppeling($koppelid)
    {
        if (!$this->_db->updatekoppeling('koppelingen', $koppelid, array('hide' => 1))) {
            throw new Exception('er is een onverwachte fout opgetreden, je ticket kon niet worden gesloten. :(');
        }
    }
    public function showkoppeling($koppelid)
    {
        if (!$this->_db->updatekoppeling('koppelingen', $koppelid, array('hide' => 0))) {
            throw new Exception('er is een onverwachte fout opgetreden, je ticket kon niet worden gesloten. :(');
        }
    }
}
