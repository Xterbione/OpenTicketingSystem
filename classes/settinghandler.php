<?php
class settinghandler {
           private $_UserID,
                   $_db;

       public function __construct(){
               $this->_db = db::getInstance();

         }



         public function GetMailHost()
         {
             $data = $this->_db->get('settings', array('SettingName', '=', 'MailHost'));
             // print_r($data->results());
             if ($data->count() !== 0) {
                 foreach ($data->results() as $key) {
                     return $key->SettingValue;
                 }
             } else {

             }
         }
         public function GetMailPort()
         {
             $data = $this->_db->get('settings', array('SettingName', '=', 'MailPort'));
             // print_r($data->results());
             if ($data->count() !== 0) {
                 foreach ($data->results() as $key) {
                     return $key->SettingValue;
                 }
             } else {

             }
         }

         public function GetMailSMTPauthentication()
         {
             $data = $this->_db->get('settings', array('SettingName', '=', 'MailSMTPauthentication'));
             // print_r($data->results());
             if ($data->count() !== 0) {
                 foreach ($data->results() as $key) {
                     return $key->SettingValue;
                 }
             } else {

             }
         }

         public function GetMailUser()
         {
             $data = $this->_db->get('settings', array('SettingName', '=', 'MailUser'));
             // print_r($data->results());
             if ($data->count() !== 0) {
                 foreach ($data->results() as $key) {
                     return $key->SettingValue;
                 }
             } else {

             }
         }
         public function GetMailDomain()
         {
             $data = $this->_db->get('settings', array('SettingName', '=', 'MailDomain'));
             // print_r($data->results());
             if ($data->count() !== 0) {
                 foreach ($data->results() as $key) {
                     return $key->SettingValue;
                 }
             } else {

             }
         }

         public function GetMailPassword()
         {
             $data = $this->_db->get('settings', array('SettingName', '=', 'MailPassword'));
             // print_r($data->results());
             if ($data->count() !== 0) {
                 foreach ($data->results() as $key) {
                     return $key->SettingValue;
                 }
             } else {

             }
         }

         public function GetSMTPSecure()
         {
             $data = $this->_db->get('settings', array('SettingName', '=', 'SMTPSecure'));
             // print_r($data->results());
             if ($data->count() !== 0) {
                 foreach ($data->results() as $key) {
                     return $key->SettingValue;
                 }
             } else {

             }
         }

         public function GetMailFromName()
         {
             $data = $this->_db->get('settings', array('SettingName', '=', 'MailFromName'));
             // print_r($data->results());
             if ($data->count() !== 0) {
                 foreach ($data->results() as $key) {
                     return $key->SettingValue;
                 }
             } else {

             }
         }

         public function GetLogoLink()
         {
             $data = $this->_db->get('settings', array('SettingName', '=', 'LogoLink'));
             // print_r($data->results());
             if ($data->count() !== 0) {
                 foreach ($data->results() as $key) {
                     return $key->SettingValue;
                 }
             } else {

             }
         }
         public function GetBrandCollor()
         {
             $data = $this->_db->get('settings', array('SettingName', '=', 'BrandCollor'));
             // print_r($data->results());
             if ($data->count() !== 0) {
                 foreach ($data->results() as $key) {
                     return $key->SettingValue;
                 }
             } else {

             }
         }
         public function GetBrandCollor2()
         {
             $data = $this->_db->get('settings', array('SettingName', '=', 'BrandCollor2'));
             // print_r($data->results());
             if ($data->count() !== 0) {
                 foreach ($data->results() as $key) {
                     return $key->SettingValue;
                 }
             } else {

             }
         }
         public function GetCompanyName()
         {
             $data = $this->_db->get('settings', array('SettingName', '=', 'CompanyName'));
             // print_r($data->results());
             if ($data->count() !== 0) {
                 foreach ($data->results() as $key) {
                     return $key->SettingValue;
                 }
             } else {

             }
         }
         public function GetMenuCustom()
         {
             $data = $this->_db->get('settings', array('SettingName', '=', 'MenuCustomize'));
             // print_r($data->results());
             if ($data->count() !== 0) {
                 foreach ($data->results() as $key) {
                     return $key->SettingValue;
                 }
             } else {

             }
         }

         public function GetSettingHistory()
         {
           $user = new user();
             $data = $this->_db->get('settings', array(1, '=', 1));
             // print_r($data->results());
             if ($data->count() !== 0) {
                 foreach ($data->results() as $key) {
                    $user->find($key->LastEditBy);


             echo "

             <tr>
               <td class='mdl-data-table__cell--non-numeric'>" . $key->SettingName . "</td>
               <td class='mdl-data-table__cell--non-numeric'>".htmlspecialchars($user->data()->name, ENT_QUOTES)."</td>
               <td class='mdl-data-table__cell--non-numeric'>".htmlspecialchars($key->LastEditOn, ENT_QUOTES)."</td>
              </tr>
               ";
                 }
             } else {
                 echo "<p style='color:black; margin-left: 45%;'>er zijn geen tickets A.T.M.</p>";
             }
         }


         public function updatesetting($uid, $settingname, $settingvalue)
         {
           $now = date('Y-m-d H:i:s');
             if (!$this->_db->updatesetting('settings', $settingname, array('SettingValue' => $settingvalue))) {
                 throw new Exception('er is een onverwachte fout opgetreden, je ticket kon niet worden gesloten. :(');
                 print_r($fields);
             }
             if (!$this->_db->updatesetting('settings', $settingname, array('LastEditBy' => $uid))) {
                 throw new Exception('er is een onverwachte fout opgetreden, je ticket kon niet worden gesloten. :(');
                 print_r($fields);
             }
             if (!$this->_db->updatesetting('settings', $settingname, array('LastEditOn' => $now))) {
                 throw new Exception('er is een onverwachte fout opgetreden, je ticket kon niet worden gesloten. :(');
                 print_r($fields);
             }
         }
}







         ?>
