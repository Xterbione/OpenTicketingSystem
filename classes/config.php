<?php
class config {

      public static function get($path = null) {
        if($path) {
          $config = $GLOBALS['config'];
          $path = explode('/', $path); //converts the string to an array. / is the seperator fo going deeper


          //print_r($path);
          foreach($path as $bit) {

            //getting back every item inserted into the array. foreach wil get echoed to bit.
            if (isset($config[$bit]))//checks if $bit isset
            $config = $config[$bit]; //putting the array item behind the var


          }  //going over all the items in the array
        }
        return $config;
      }
}

 ?>
