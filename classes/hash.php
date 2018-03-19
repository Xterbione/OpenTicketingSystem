<?php
class hash {
  public static function make($string, $salt = ''){

    return hash('sha256', $string . $salt);


  }
  public static function makemd5($string){

    return  md5($string);


  }


  public static function salt($length){
      return utf8_encode(mcrypt_create_iv($length));

  }
  public static function unique() {
    return self::make(uniqid());

  }

}


 ?>
