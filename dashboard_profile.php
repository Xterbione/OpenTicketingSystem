

<?php
  require_once 'core/init.php';
    session_start();
    include 'functionlists/accountinfofunctionlist.php';
    $uid = $_SESSION['UID'];
    $user = new user();
    $notifyer = new notify();
    if ($user->isloggedin()) {
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
         <link rel="shortcut icon" type="image/png" href="icons/favicon.png"/>
   </head>
   <body>

     <div class="mdl-layout mdl-js-layout mdl-layout--fixed-header">
       <header class="mdl-layout__header">
         <div class="mdl-layout__header-row">
           <!-- Title -->
           <span class="mdl-layout-title" >Brainconsultant Ticketing system</span>
           <!-- Add spacer, to align navigation to the right -->
           <div class="mdl-layout-spacer"></div>
           <!-- Navigation. We hide it in small screens. -->
           <nav class="mdl-navigation mdl-layout--large-screen-only">
           </nav>
           <!-- notify inbox icon -->
           <?php if ($ustatus == 1) { ?>
           <div class="material-icons mdl-badge mdl-badge--overlap notify " data-badge="<?php $notifyer->countnotify($uid); ?>">account_box </div>
         <?php } ?>
          <!-- logout button -->
          <a href="logout.php"><button class="mdl-button mdl-js-button mdl-button--raised mdl-button--accent">
              logout
          </button>
          </a>

         </div>
       </header>
       <div class="mdl-layout__drawer" >
         <div class="circleimage" style="display: inline-block;"></div>
         <span class="mdl-layout-title" style="display: block;"><?php echo $user->data()->name; ?></span>
         <hr/>
         <nav class="mdl-navigation">
          <?php include 'includes/components/menu-links.inc.php'; ?>
         </nav>
       </div>
       <main class="mdl-layout__content">
         <div class="page-content">



                       <?phpif ($ustatus == 1) { include "includes/components/notifydrawer.php";} ?>



           <div class="demo-card-wide mdl-card mdl-shadow--2dp profilewindow mix DETA" style="padding:15px;">
               <div class="circleimage"></div>
                <span> wachtwoord wijzigen <br></span>

                <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label " >
                  <input class="mdl-textfield__input" type="text" id="sample3">
                  <label class="mdl-textfield__label" for="sample3">wachtwoord</label>
                </div>
                <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                  <input class="mdl-textfield__input" type="text" id="sample3">
                  <label class="mdl-textfield__label" for="sample3">herhaal het wachtwoord</label>
                </div>
                <div class="footerribon" style="left: 0;"></div>
            </div>

            <div class="demo-card-wide mdl-card mdl-shadow--2dp profilewindow">
            <p class="blacktext" id="acstatstoptext">Account statistics<br></p>
             <div class="scrolldiv3" style="height: 300px; overflow: scroll; width:180px;">
               <table  class="mdl-data-table mdl-js-data-table mdl-shadow--2dp zui-table" style="">
                 <thead>
                     <tr>
                         <th>Login History</th>
                     </tr>
                 </thead>
                 <tbody>
                   <?php

                     getloginhistory($uid); ?>

                 </tbody>
               </table>
              </div>
             <div style="" class="footerribon"></div>
           </div>


         </div>
       </main>
     </div>




     <script type="text/javascript" src="script/jquery.js"></script>
    <script src="/script/mixitup.min.js"></script>
     <script  src="script/dashboard_new.js"></script>
     <script type="text/javascript">
     var mixer = mixitup('.container');
     var mixer = mixitup(containerEl);

     var mixer = mixitup(containerEl, {
     selectors: {
         target: '.blog-item'
     },
     animation: {
         duration: 300
     }
     });
     </script>
   </body>
 </html>

 <?php
    } else {
     redirect::to('index.php');
 }

 ?>
