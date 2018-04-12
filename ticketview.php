
<?php
  require_once 'core/init.php';
    session_start();
    include 'functionlists/accountinfofunctionlist.php';
    $uid = $_SESSION['UID'];
    $user = new user();
    $notifyer = new notify();
    $date = date('Y-m-d H:i:s');
    $tid = Input::get('ticketid');
    $ticketing = new ticketing();
    $ustatus = $user->data()->Groupnum;
    $settinghandler = new settinghandler();
    $files = new File();
    $cuid = $ticketing->getticketcreatorbyid($tid);
    if ($user->isloggedin()) {
      if ($uid == $cuid OR $ustatus == 1) {
       ?>
 <!DOCTYPE html>
 <html>
   <head>
     <meta charset="utf-8">
     <title></title>
     <link rel="stylesheet" href="css/material.min.css">
     <script src="script/material.min.js"></script>
     <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
     <link rel="stylesheet" href="https://code.getmdl.io/1.3.0/material.pink-light_blue.min.css" />
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <link rel="stylesheet" href="css/material-extends.css">
         <link rel="shortcut icon" type="image/png" href="icons/favicon.png"/>
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
           <span class="mdl-layout-title" ><?php echo $settinghandler->GetCompanyName();  ?> T.S.</span>
           <!-- Add spacer, to align navigation to the right -->
           <div class="mdl-layout-spacer"></div>
           <!-- Navigation. We hide it in small screens. -->
           <nav class="mdl-navigation mdl-layout--large-screen-only">
                     <?php if ($ustatus == 1) {?>
             <div style="background-color: grey; padding-left: 5px; padding-right: 5px;">
               <p><?php echo session::flash('melding'); ?></p>
             </div>
                     <?php   } ?>
              <?php if ($ustatus == 1) {
                ?>
                <div style="padding: 10px; z-index: 999;">
                  <form name="createkoppeling" action="createkoppeling.php" method="post">
                    <select name="uid">
                      <option value="" disabled selected>koppeling maken</option>
                      <?php $user->getalladminselect(); ?>
                    </select>
                    <input type="hidden" name="ticketid" value="<?php echo $tid; ?>">
                    <button type="submit" name="button">
                      <img src="icons/koppellen.png" alt="Koppeling Maken" style="height:30px;">
                    </button>
                  </form>
                </div>
              <?php   } ?>
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


           <div style="margin-top: 50px;">

              <?php
              if ($ustatus == 1)
              {
              include "includes/components/notifydrawer.php";
              }



              $ticketing = new ticketing();
              $ticketing->viewticketbyid($tid);


                ?>

            </div>











<?php
$tstatus = $ticketing->getticketstatusbyid($tid);
if ($tstatus == 'open' OR $tstatus == 'behandelen') {?>


      <div class="demo-card-wide mdl-card mdl-shadow--2dp" style="padding: 25px; margin-bottom: 30px  ;">
        <form class="" action="createcomment.php" method="post">

        <h3>Reageren:</h3>
        <textarea name="comment" id="comment" rows="4" cols="50"></textarea><br>
        <input type="hidden" name="ticketid" id="ticketid" value="<?php echo $tid; ?>">
        <?php if ($user->data()->Groupnum == '1') {
          ?>
          <select name="kennisitem">
            <option value="none" selected disabled>selecteer kennisitem</option>
            <?php $File = new File(); $File->getallkennisitemName(); ?>
          </select>
          <?php
        } ?>
        <button type="submit" id="formsubmit" class="formsubmit mdl-button mdl-js-button mdl-button--raised">
          plaatsen
        </button>
      </form>
      <div id="p2" class="formloader mdl-progress mdl-js-progress mdl-progress__indeterminate" style="margin-top: 20px;">
        <div class="formloader">
          <br>  <p> loading.... </p>
        </div>

    </div>


    <?php
  }

  ?>


        </div>
       </main>
     </div>
   </body>
 </html>
 <script type="text/javascript" src="script/jquery.js"></script>
 <script  src="script/dashboard_new.js"></script>
<?php }
else {
  redirect::to('dashboard_home.php');
}
} else {
  redirect::to('index.php');
} ?>
