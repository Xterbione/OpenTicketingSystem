<?php
class session {
  public static function exists($name)
  {
    //if statement checking if session exists, returning true if yes and false if no
      return (isset($_SESSION[$name])) ? true : false;
  }
    //creating a session with the input var in the method accessed by :: cuz its static
  public static function put($name, $value)
  {
      //return returns the created session:
      return $_SESSION[$name] = $value;
  }
  public static function get($name){
    return $_SESSION[$name];
  }



    public static function delete($name){
      //using predeclared method checking if the session exists. using self to refer to a static method in the same class
      if (self::exists($name)) {
        unset($_SESSION[$name]);
      }

    }
    public static function flash($name, $string = '') {
      if(self::exists($name)){
        $session = self::get($name);
        self::delete($name);
        return $session;
      } else {
        self::put($name, $string);
      }

    }

}


 ?>
