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
                echo '<li class="btnround" style="width: auto; height: auto; padding: 12px 15px; float: left; cursor: pointer;" data-filter=".' . htmlspecialchars($key->onderwerptitel, ENT_QUOTES) . '"> <span>' .htmlspecialchars($key->onderwerptitel, ENT_QUOTES). '</span></li>';
            }
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
            echo "<p style='color:black;'>er zijn mogelijk nog geen tickets aangemaakt</p>";
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
            echo "<p style='color:black;'>er zijn mogelijk nog geen tickets aangemaakt</p>";
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
            echo "<p style='color:black;'>er zijn mogelijk nog geen tickets aangemaakt</p>";
        }
    }




    public function viewticketbyid($tid)
    {
        $data = $this->_db->get('tickets', array('Ticket_ID', '=', $tid));
        // print_r($data->results());

        if ($data->count() !== 0) {
            foreach ($data->results() as $key) {
              $creatorid = $key->Creator_ID;
                $user = new user();

               $user->find($creatorid);


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
            </span>
            <br>
            <h3>". htmlspecialchars($key->Titel, ENT_QUOTES)."</h3>
            <hr></hr>

            <p style='white-space: pre-wrap; color:black;'>". htmlspecialchars($key->content, ENT_QUOTES)."</p>
            <hr/>
            ";

            if ($key->Status == 'open') {

            echo "
            <form class='' action='closeticket.php' method='post'>
            <input type='hidden' name='tid' value='". $key->Ticket_ID ."'>
            <button style='margin-left:30px;' class='mdl-button mdl-js-button mdl-button--raised'>Ticket Sluiten</button>
            </form>";
          }
            echo "
            <p style='float:right;'>". htmlspecialchars($key->aanmaakdatum, ENT_QUOTES)."</p>
          </div>
        <div class='mdl-card__menu'>
      </div>
    </div>


            ";
            $this->viewcommentsbyid($tid);
            }

        } else {
            echo "<p style='color:black;'>er zijn mogelijk nog geen tickets aangemaakt</p>";
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

    public function closeticket($tid)
    {
        if (!$this->_db->updateticket('tickets', $tid, array('Status' => 'gesloten'))) {
            throw new Exception('er is een onverwachte fout opgetreden, je ticket kon niet worden gesloten. :(');
            print_r($fields);
        }
    }

      // public function addnotifybyarray ($tid)
      // {
      //   $data = $this->_db->get('tickets', array('Ticket_ID', '=', $tid));
      //   // print_r($data->results());
      //   if ($data->count() !== 0) {
      //       foreach ($data->results() as $key1) {
      //         $arrayraw = $key1->betrokkenen;
      //       }
      //     }
      //
      //     $array = json_decode($arrayraw);
      //
      //       $data = $this->_db->get('Ticket_Comments', array('Ticket_ID', '=', $tid));
      //       // print_r($data->results());
      //
      //       if ($data->count() !== 0) {
      //           foreach ($data->results() as $key) {
      //             $array = $key->betrokkenen;
      //
      //
      //             if (!in_array($key->User_ID,  ) {
      //               # code...
      //             }
      //
      //
      //
      //
      //
      //
      //
      //
      //             // $creatorid = $key->User_ID;
      //             //   $user = new user();
      //             //  $user->find($creatorid);
      //       } else {
      //
      //       }
      //   }
      //
      //
      //
      // }


}
