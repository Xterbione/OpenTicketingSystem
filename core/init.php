<?php
session_start();
function getconfig() {

return array(
  'mysql' => array(
    'host'=> '127.0.0.1',
    'username' => 'root',
    'password' => 'Bk1996zs',
    'db' => 'DatabaseWebApp'
  ),
  'remember' => array(
    'cookie_name' => 'hash',
    'cookie_expiry' => 2629743

  ),
  'session' => array(
    'session_id' => 'UID',
    'session_username' => 'username',
    'token_name' => 'token'
  )
);
}

spl_autoload_register(

  function($class)
  {
    require_once 'classes/' . $class . '.php';

  }
); //runs every time a class is accessed.

require_once 'functionlists/sanitize.php';
require_once 'mailer.php';



 ?>
