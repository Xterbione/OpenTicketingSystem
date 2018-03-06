<?php
require 'core/init.php';
$ticket = new ticketing();
$user = new user();
$vuid = Input::get('vuid');
?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>Brainconsultant - ticketing system</title>
  <link rel="stylesheet" href="css/material.min.css">
  <script src="script/material.min.js"></script>
  <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
  <link rel="stylesheet" href="https://code.getmdl.io/1.3.0/material.pink-light_blue.min.css" />
  <link rel="stylesheet" href="css/material-extends.css">
</head>
  <body>

    <div class="demo-card mdl-card mdl-shadow--2dp popupwindow3">
      <a href="dashboard_gebruikers.php">
        <button class="mdl-button mdl-js-button mdl-button--raised">
  back
</button>
</a>
      <h3>ticketview User: <?php $user->find($vuid); echo $user->data()->name; ?></h3>

      <div class=" demo-card-wide mdl-card mdl-shadow--2dp" style="box-shadow: none;">
         <div class="scrolldiv2">
           <div class="container" >
              <?php $ticket->getallfromuser($vuid); ?>


   `      </div>
         </div>
       </div>

    </div>
  </body>
</html>
