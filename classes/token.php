<?php
class token
{
    public static function generate() {
      //creating a session with the token name defined in the init.php and generating a random md5 string with a uniqueid as parameter for the session value
      return session::put(config::get('session/token_name'), hash('sha512' ,uniqid()));
    }




    public static function check($token) {
      //setting var equal to the token name defined in the init.php
      $tokenName = config::get('session/token_name');
        //using class session to check existment of the session, and checking of the token equals the token of the client's session against highjackers
      if (session::exists($tokenName) && $token === session::get($tokenName))  {
        //if this equals true, the session gets deleted and true gets returned
        session::delete($tokenName);
        return true;
      }else {
        return false;
      }

    }


}




 ?>
