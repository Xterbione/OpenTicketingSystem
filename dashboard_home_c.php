<?php
    require_once 'core/init.php';
    $uid = $_SESSION['UID'];
    $ticket = new ticketing();
    $user = new user();
    $settinghandler = new settinghandler();
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
         <link rel="shortcut icon" type="image/png" href="icons/favicon.png"/>
     <link rel="stylesheet" href="css/material-extends.css">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
   </head>
   <body>
     <div class="loader" style="height: 100%; width: 100%; background: white; position: absolute; z-index: 999; text-align: center; ">
       <img src="<?php echo $settinghandler->GetLogoLink(); ?>" class="brainlogoload" style="" alt="">
       <div class="loadercomponent" style="text-aling:center;margin: 0 auto; width: 500px; margin-top: 25%;">
         <p>loading...</p><br>
         <p>als de pagina niet laad, gebruik dan aub een andere ondersteunde browser, zoals chrome.</p>
         <div id="p2" class="mdl-progress mdl-js-progress mdl-progress__indeterminate"></div>
       </div>
     </div>
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


           <div class="demo-card-wide mdl-card mdl-shadow--2dp" style="heigth: 900px !important; padding: 30px; text-align:center;">
     <h1 style="color: #FF0082;">Home</h1>
     <p style="color: red;">
<?php echo session::flash('tclosed');
  echo session::flash('gearchiveerd');
    echo session::flash('createticket'); ?>
     </p>

                 <a href='dashboard_create.php' style="margin: 0 auto; margin-top: 10px;"> <button class="mdl-button mdl-js-button mdl-button--fab mdl-button--colored">
  <i class="material-icons">add</i>
</button></a>
<div style="text-align: left;">

     <?php $ticket->getallfromusernoarchive($uid); ?>
   </div>
 </div>

           </div>
          </main>
        </div>
      </body>
      <script type="text/javascript" src="script/jquery.js"></script>
      <script  src="script/dashboard_new.js"></script>
    </html>
<?php } else {
  redirect::to('index.php');
} ?>
