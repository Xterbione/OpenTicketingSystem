<?php
require 'core/init.php';


$SID = Input::get('SID');
$user = new user();;
 if ($user->isloggedin()) {
   if ($user->data()->Groupnum == 1) {
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
          <meta name="viewport" content="width=device-width, initial-scale=1.0">
 </head>
   <body>

     <div class="demo-card mdl-card mdl-shadow--2dp popupwindow2">
       <h3>Item verwijderen</h3>
       <p>weet je zeker dat je het onderwerp wilt verwijderen? hierna is het niet meer mogelijk op dit onderwerp te filteren. gebruikers kunnen het onderwerp na verwijderen ook niet meer gebruiken nog zien. het onderwerp word dus volledig uit de database verwijderd.</p>
      <a href="deletesujectprocess.php?SID=<?php echo $SID; ?>">  <button type="submit" class="mdl-button mdl-js-button mdl-button--primary">
      doorvoeren
    </button></a>
    <a href="dashboard_home.php">    <button class="mdl-button mdl-js-button mdl-button--primary">
         terug
       </button></a>
     </div>
   </body>
 </html>
 <?php
 } else {
   redirect::to('dashboard_home.php');
 }
} else {
  redirect::to('dashboard_home_c.php');
}

  ?>
