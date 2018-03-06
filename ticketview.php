
<?php
  require_once 'core/init.php';
    session_start();
    include 'functionlists/accountinfofunctionlist.php';
    $uid = $_SESSION['UID'];
    $user = new user();
    $notifyer = new notify();
    $date = date('Y-m-d H:i:s');
    $tid = Input::get('ticketid');
    $filter = new ticketing();
    $ustatus = $user->data()->Groupnum;
    $cuid = $filter->getticketcreatorbyid($tid);
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
           <span class="mdl-layout-title" >Brainconsultant Ticketing system</span>
           <!-- Add spacer, to align navigation to the right -->
           <div class="mdl-layout-spacer"></div>
           <!-- Navigation. We hide it in small screens. -->
           <nav class="mdl-navigation mdl-layout--large-screen-only">
           </nav>
           <!-- notify inbox icon -->
           <div class="material-icons mdl-badge mdl-badge--overlap notify " data-badge="<?php $notifyer->countnotify($uid); ?>">account_box </div>
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



              <?php include "includes/components/notifydrawer.php";




              $ticketing = new ticketing();
              $ticketing->viewticketbyid($tid);


?>












<?php
$tstatus = $filter->getticketstatusbyid($tid);
if ($tstatus == 'open') {?>


      <div class="demo-card-wide mdl-card mdl-shadow--2dp" style="padding: 25px; margin-bottom: 30px  ;">
        <form class="" action="createcomment.php" method="post">

        <h3>Reageren:</h3>
        <textarea name="comment" id="comment" rows="4" cols="50"></textarea><br>
        <input type="hidden" name="ticketid" id="ticketid" value="<?php echo $tid; ?>">
        <button type="submit" class="mdl-button mdl-js-button mdl-button--raised">
          plaatsen
        </button>
      </form>
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
