<?php
require_once 'core/init.php';
    $uid = $_SESSION['UID'];
    $ticket = new ticketing();
    $user = new user();
      if ($user->isloggedin()) {
 ?>


 <!DOCTYPE html>
 <html>
   <head>
     <meta charset="utf-8">
     <title>Brainconsultant - ticketing system</title>
     <script src="script/material.min.js"></script>
     <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
     <link rel="stylesheet" href="https://code.getmdl.io/1.3.0/material.pink-light_blue.min.css" />
     <link rel="stylesheet" href="css/material-extends.css">
   </head>
   <body>
     <?php $user->getallfromuser($uid); ?>
   </body>
 </html>

<?php } else {
  redirect::to('index.php');
} ?>
