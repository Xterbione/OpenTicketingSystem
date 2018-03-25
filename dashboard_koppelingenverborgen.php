<?php
  require_once 'core/init.php';
    $uid = $_SESSION['UID'];
    $notifyer = new notify();
    $user = new user();
    $ticketing = new ticketing();
    $ustatus = $user->data()->Groupnum;
    if ($user->isloggedin()) {
      if ($ustatus == 1) {
        if (Input::exists()) {
            if (Input::get('onderwerptitel') != '') {
                $input = '';
                $input = Input::get('onderwerptitel');
                $input = str_replace(' ', '', $input);
                $ticketing = new ticketing();
                try {
        $ticketing->createsubject(array(
        'onderwerptitel'  => $input,
        'enabled'  => 1
        ));

                    unset($_POST);
                } catch (Exception $e) {
                    die($e->getMessage());
                }
            }
        } ?>
 <!DOCTYPE html>
 <html style="margin: 0;">
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
     <div class="loader" style="height: 100%; width: 100%; background: white; position: absolute; z-index: 999; text-align: center; ">
       <img src="icons/brainlogo.png" class="brainlogoload" style="" alt="">
       <div class="loadercomponent" style="text-aling:center;margin: 0 auto; width: 500px; margin-top: 25%;">
         <p>loading...</p>
         <div id="p2" class="mdl-progress mdl-js-progress mdl-progress__indeterminate"></div>
       </div>
     </div>

     <!-- menu div -->
     <div class="mdl-layout mdl-js-layout mdl-layout--fixed-header">
       <header class="mdl-layout__header">
         <div class="mdl-layout__header-row">
           <!-- Title -->
           <span class="mdl-layout-title" >Brainconsultant T.S.</span>
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


                       <?php include "includes/components/notifydrawer.php"; ?>



       <!-- ticket window -->
          <div class="ticketwindow demo-card-wide mdl-card mdl-shadow--2dp">
            <!-- Expandable Textfield -->
            <a href="dashboard_koppelingen.php">
            <button class="mdl-button mdl-js-button mdl-button--primary">
  terug
</button>
</a>
            <p style="text-align: center;"><?php echo session::flash('melding'); ?></p>


            <table class="mdl-data-table mdl-js-data-table mdl-shadow--2dp usertable">

              <thead>
                <tr class="clickable-row" data-href='url://Brainconsultant.nl'>
                  <th></th>
                  <th class="mdl-data-table__cell--non-numeric">Ticket ID</th>
                  <th class="mdl-data-table__cell--non-numeric">Categorie</th>
                  <th class="mdl-data-table__cell--non-numeric">Aanmaakdatum</th>
                  <th class="mdl-data-table__cell--non-numeric">Titel</th>
                  <th class="mdl-data-table__cell--non-numeric">Status</th>
                  <th class="mdl-data-table__cell--non-numeric">creator</th>
                  <th class="mdl-data-table__cell--non-numeric">naar ticket</th>
                  <th>
                </th>
                </tr>
              </thead>
              <tbody>
              <?php   $ticketing->getallfromkoppelingverborgen($uid); ?>
              </tbody>
            </table>
             <div class="footerribon"></div>
           </div>
         </div>
       </main>
     </div>




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

  redirect::to('dashboard_home_c.php');
}


    } else {
     redirect::to('index.php');
 }

 ?>
