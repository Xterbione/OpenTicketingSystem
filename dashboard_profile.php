

<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

  require_once 'core/init.php';
    session_start();
    include 'functionlists/accountinfofunctionlist.php';
    $uid = $_SESSION['UID'];
    $user = new user();
    $notifyer = new notify();
    $ticketing = new ticketing;
        $settinghandler = new settinghandler();
    if ($user->isloggedin()) {
        ?>
 <!DOCTYPE html>
 <html>
   <head>
     <meta charset="utf-8">
     <title>Ticketing system</title>
     <link rel="stylesheet" href="css/material.min.css">
     <script src="script/material.min.js"></script>
     <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
     <link rel="stylesheet" href="https://code.getmdl.io/1.3.0/material.pink-light_blue.min.css" />
         <link rel="shortcut icon" type="image/png" href="icons/favicon.png"/>
     <link rel="stylesheet" href="css/material-extends.css">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
   </head>
   <body>
     <style>
     .demo-card-wide.mdl-card {
       width: 100%;
       max-width: 800px;
       margin: auto;
       margin-top: 3%;
     }
     .demo-card-wide > .mdl-card__menu {
       color: #fff;
     }
     </style>
     <!-- menu div -->
     <div class="mdl-layout mdl-js-layout mdl-layout--fixed-header">
       <header class="mdl-layout__header">
         <div class="mdl-layout__header-row">
           <!-- Title -->
           <span class="mdl-layout-title" ><?php echo $settinghandler->GetCompanyName(); ?> T.S.</span>
           <!-- Add spacer, to align navigation to the right -->
           <div class="mdl-layout-spacer"></div>
           <!-- Navigation. We hide it in small screens. -->
           <nav class="mdl-navigation mdl-layout--large-screen-only">
           </nav>
           <!-- notify inbox icon -->
           <?php if ($ustatus == 1) {
            ?>
           <div class="material-icons mdl-badge mdl-badge--overlap notify " data-badge="<?php $notifyer->countnotify($uid); ?>">account_box </div>
         <?php
        } ?>
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



                       <?phpif ($ustatus == 1) { include "includes/components/notifydrawer.php";} ?>



           <div class="demo-card-wide mdl-card mdl-shadow--2dp profilewindow wrapperprofile" style="padding: 20px;">
             <div class="profilecontainer">
               <div class="item1profile">

               <div class="circleimageBIG" style="margin: 0 auto;"></div><br>
                 <div style="width:300px; margin: 0 auto;">
                   <!--<button class="mdl-button mdl-js-button mdl-button--raised mdl-button--accent">wijzigen</button>-->
                   <h3>user ID: </h3><h4 style="font-weight: 800;"><?php echo $user->data()->User_ID; ?></h4>
                   <P>naam : </P><p style="font-weight: 800;"><?php echo $user->data()->name; ?></p>
                   <p>gebruikersnaam: </p><p style="font-weight: 800;"><?php echo $user->data()->UserName ?></p>
                   <hr style="width: 300px; margin: 0 auto; margin-top: 25px; margin-bottom: 25px;">
                   <a  href="changemypassword.php" style="margin: 0 auto; margin-bottom: 20px;">

                  <button class="mdl-button mdl-js-button mdl-button--raised mdl-button--accent">wachtwoord wijzigen</button>
               </a><br>


               <form class="" action="changemymail.php" method="post">

                <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label" style="" >
                  <input class="mdl-textfield__input" name="newmail" type="text" value="<?php echo $user->data()->MailAddress; ?>" id="sample3">
                  <label class="mdl-textfield__label" for="sample3">email</label>
                </div><br>
              <a href="#">

              <button type="submit" class="mdl-button mdl-js-button mdl-button--raised mdl-button--accent"> Wijziging doorvoeren</button>
            </a>
          </form>
          </div>
          </div>
          <div class="item2profile" style="text-align: center;">
            <p style="color:red;"><?php echo session::flash('melding'); ?></p>
            <h3 style="color: #FF0082;">totaal aantal tickets</h3>
            <h1 style="font-weight: 400;"><?php echo $ticketing->getticketcountbyid($user->data()->User_ID); ?></h1>
            <h3 style="color: #FF0082">totaal aantal comments</h3>
            <h1 style="font-weight: 400;"><?php echo $ticketing->getcommentcountbyid($user->data()->User_ID); ?></h1>
          </div>
          <div class="item3profile" style="text-align:center;">
            <h1 style="color: #FF0082;">login geschiedenis</h1>
                <div class="scrolldiv3" style="height: 50%; overflow-y: scroll; margin: 10px; border: 1px solid grey; overflow-x: none;">
                  <table  class="mdl-data-table mdl-js-data-table mdl-shadow--2dp zui-table" style="width: 100%; text-align: center;">
                    <thead>
                      <tr>
                        <th style="text-align: center;">datum en tijd</th>
                      </tr>
                    </thead>
                    <tbody>

                      <?php

                    $user->gethistorybyid($user->data()->User_ID);
                    ?>

                    </tbody>
                  </table>
                </div><br><br>
                <p>als u merkt dat deze gegevens niet kloppen, raden wij u aan uw wachtwoord te wijzigen.
                u kunt maximaal 50 log-ins terug zien</p>
              </div>
                <div class="footerribon" style="width: 100%; float: left; margin-left: -20px; margin-top: 300px;"></div>
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
