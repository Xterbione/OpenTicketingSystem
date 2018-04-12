<?php
class File {

  public function __construct()
  {
      $this->_db = db::getInstance();
  }

  private $_SupportedFormats = ['PPTX','pdf','txt','odp','ods','png', 'jpeg', 'jpg', 'gif', 'docx','doc','pdf','pptx', 'txt', 'odt', 'zip','dotx','docm','xls','xlt','xlsx','ppt','ico','icon'],
          $_SupportedMimetypes = ['application/pdf','text/plain','application/vnd.openxmlformats-officedocument.presentationml.presentation','application/vnd.oasis.opendocument.presentation','application/vnd.oasis.opendocument.spreadsheet','application/vnd.oasis.opendocument.text','application/msword', 'application/vnd.openxmlformats-officedocument.wordprocessingml.document', 'application/vnd.openxmlformats-officedocument.wordprocessingml.template', 'application/vnd.ms-word.document.macroEnabled.12', 'application/vnd.ms-excel','application/vnd.ms-excel','application/vnd.openxmlformats-officedocument.spreadsheetml.sheet','application/vnd.ms-powerpoint', 'image/gif', 'image/jpeg', 'image/png','image/vnd.microsoft.icon'];



  public function checkfiletype($file){
  $filename = $file['name'];
  $filesize = $file['size'];
  $filetmp  = $file['tmp_name'];
      $filetype = pathinfo($filename, PATHINFO_EXTENSION);
    if (in_array($filetype, $this->_SupportedFormats)) {
        if (in_array(mime_content_type($file['tmp_name']), $this->_SupportedMimetypes)) {
          return true;
        } else {
          return false;
        }
    } else {
    return false;
    }
  }

  public function secondstagefilecheck($filelocation){
        if (in_array(mime_content_type($filelocation), $this->_SupportedMimetypes)) {
          return true;
        } else {
          return false;
        }
  }


  public function checkfilesize($file){
  $filename = $file['name'];
  $filesize = $file['size'];
  $filetmp  = $file['tmp_name'];
  $filetype = pathinfo($filename, PATHINFO_EXTENSION);
    if ($filesize > 100000000) {
    return false;
    } else {
    return true;
    }
  }



  public function uploadfile($file){
    $currentdate = date('Y-m-d H:i:s');
    $filename = $file['name'];
    $filesize = $file['size'];
    $filetmp  = $file['tmp_name'];
    $filetype = pathinfo($filename, PATHINFO_EXTENSION);
    hash::make($filename, $currentdate);
    $newfilename = Hash::make($file['name'], $currentdate);
    $newname = $newfilename.".".$filetype;
    echo "application: Stage 1, OK! <br>";
    move_uploaded_file($file['tmp_name'],'uploads/kennisitems/'.$newname );
    echo "File Upload Completed! saved as: ".$newname."";
    return $newname;
    }


    public function additemtodb($fields = array())
    {
        if (!$this->_db->insert('KennisItems', $fields)) {
            throw new Exception('er is een onverwachte fout opgetreden, het kennisitem kon niet worden toegevoegd. :( vardump:');
            print_r($fields);
        }
    }

    public function additemkoppeling($fields = array())
    {
        if (!$this->_db->insert('Item_CommentLink', $fields)) {
            throw new Exception('er is een onverwachte fout opgetreden, het kennisitem kon niet worden gekoppeld. :( vardump:');
            print_r($fields);
        }
    }

    public function getallkennisitems()
    {
        $data = $this->_db->get('KennisItems', array(1, '=', 1));
        // print_r($data->results());
        if ($data->count() !== 0) {
            foreach ($data->results() as $key) {
               echo "<tr>
                 <td class='mdl-data-table__cell--non-numeric'>".htmlspecialchars($key->Item_ID, ENT_QUOTES)."</td>
                 <td class='mdl-data-table__cell--non-numeric'>".htmlspecialchars($key->Item_Name, ENT_QUOTES)."</td>
                 <td class='mdl-data-table__cell--non-numeric'> <a style='color: blue;' href='uploads/kennisitems/".htmlspecialchars($key->FileName, ENT_QUOTES)."'>".htmlspecialchars($key->FileName, ENT_QUOTES)."</a></td>
                  <td class='mdl-data-table__cell--non-numeric'>
                  <form action='deletekennisitem.php' method='POST'>
                      <input type='hidden' name='itemID' value='".$key->Item_ID."'>
                  <button type='submit' class='mdl-button mdl-js-button mdl-button--primary'>Delete</button>
                  </form>
                  </td>
                 </tr>";
            }
        } else {
            echo "<p style='color:black; text-align: center;'> u heeft nog geen KennisItems toegevoegd </p>";
        }
    }

    public function deletekennisitemfromdb($IID){
      if (!$this->_db->delete('KennisItems', array('Item_ID', '=', $IID))) {
          throw new Exception('kan kennisitem niet wissen, ERROR @ DB');
          print_r($fields);
      }
  }

    public function getallkennisitemName()
    {

          $data = $this->_db->get('KennisItems', array(0 , '=', 0));
          // print_r($data->results());
          if ($data->count() !== 0) {
              foreach ($data->results() as $key) {
                  echo '<option value="'.htmlspecialchars($key->Item_ID, ENT_QUOTES).'">'.htmlspecialchars($key->Item_Name, ENT_QUOTES) .'</option>';
              }
          } else {
              echo "<p style='color:black;'> er zijn nog geen items toegevoegd </p>";
          }
      }

      public function getFilelocation($IID)
      {

            $data = $this->_db->get('KennisItems', array('Item_ID' , '=', $IID));
            // print_r($data->results());
            if ($data->count() !== 0) {
                foreach ($data->results() as $key) {

                              $data = $this->_db->get('File_Locations', array('FLNum' , '=', $key->FLNum));
                              // print_r($data->results());
                              if ($data->count() !== 0) {
                                  foreach ($data->results() as $key2) {
                                    return $key2->location;
                                  }
                                } else {
                                  echo "ERROR: File Location Not In DB";
                                }

                }
            } else {
                echo "<p style='color:black;'> ERROR @ getting file location  </p>";
            }
        }


        public function getfilenamebyid($IID)
        {
            $data = $this->_db->get('KennisItems', array('Item_ID' , '=', $IID));
            // print_r($data->results());
            if ($data->count() !== 0) {
                foreach ($data->results() as $key) {
                return $key->FileName;
                }
            } else {
                echo "<p style='color:black; text-align: center;'> ERROR @ Getting file name </p>";
            }
        }



        public function checkitem($IID){
          $data = $this->_db->get('KennisItems', array('Item_ID' , '=', $IID));
          // print_r($data->results());
          if ($data->count() !== 0) {
              return true;
          } else {
              return false;
          }
        }


        public function getticketitemkoppeling($tid)
        {

              $data = $this->_db->get('Item_CommentLink', array('Ticket_ID' , '=', $tid));
              // print_r($data->results());
              if ($data->count() !== 0) {
                  foreach ($data->results() as $key) {
                    $IID = $key->Item_ID;
                    $data2 = $this->_db->get('KennisItems', array('Item_ID' , '=', $IID));
                    // print_r($data->results());
                    if ($data2->count() !== 0) {
                      foreach ($data2->results() as $key2) {
                        echo "<a href='uploads/kennisitems/".$key2->FileName."'>".$key2->Item_Name."</a><br>";
                      }
                    } else {
                      echo "het gekoppelde item is mogelijk verwijderd<br>";
                    }
                  }
              } else {
                  echo "<p style='color:black;'></p>";
              }
          }


}


 ?>
