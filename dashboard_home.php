

<?php
  require_once 'core/init.php';
    session_start();
    include 'functionlists/accountinfofunctionlist.php';
    $uid = $_SESSION['UID'];
    $user = new user();
    $notifyer = new notify();
    $ticketing = new ticketing();
    $ustatus = $user->data()->Groupnum;
    if ($user->isloggedin()) {
        if ($ustatus == 1) {
        if (Input::exists()) {
            if (token::check(Input::get('token'))) {
            if (Input::get('onderwerptitel') != '') {

                $input = '';
                $input = Input::get('onderwerptitel');
                $input = str_replace(' ', '', $input);
                $filter = new ticketing();
                try {
                    $filter->createsubject(array(
        'onderwerptitel'  => $input,
        'enabled'  => 1
        ));

                    unset($_GET['onderwerptitel']);
                } catch (Exception $e) {
                    die($e->getMessage());
                }
            }
          }
        } ?>
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
     <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
     <meta property="og:image" content="https://www.brainconsultant.nl/wp-content/uploads/2016/11/favicon.png">
         <link rel="shortcut icon" type="image/png" href="icons/favicon.png"/>
     <script type="text/javascript">
         // Load Charts and the corechart and barchart packages.
         google.charts.load('current', {'packages':['corechart']});
         // Draw the pie chart and bar chart when Charts is loaded.
         google.charts.setOnLoadCallback(drawChart);

         function drawChart() {

           var data = new google.visualization.DataTable();
           data.addColumn('string', 'Topping');
           data.addColumn('number', 'Slices');
           data.addRows(

            <?php echo $ticketing->getticketcountbycategorie(); ?>

           );

           var piechart_options = {title:'Taartdiagram: ticket aandeel per onderwerp',
                           width:350, height:300};
           var piechart = new google.visualization.PieChart(document.getElementById('piechart_div'));
           piechart.draw(data, piechart_options);

           var barchart_options = {title:'Staafdiagram: ticket aandeel per onderwerp',
                          width:350,
                          height:300,
                          hAxis : { textStyle : { fontSize: 10} },
vAxis : { textStyle : { fontSize: 10} },
                          legend: 'none'};
           var barchart = new google.visualization.BarChart(document.getElementById('barchart_div'));
           barchart.draw(data, barchart_options);
         }
         </script>
   </head>
   <body>
     <div class="loader" style="height: 100%; width: 100%; background: white; position: absolute; z-index: 999; text-align: center; ">
       <img src="icons/brainlogo.png" class="brainlogoload" style="" alt="">
       <div class="loadercomponent" style="text-aling:center;margin: 0 auto; width: 500px; margin-top: 25%;">
         <p>loading...</p><br>
         <p>als de pagina niet laad, gebruik dan aub een andere ondersteunde browser, zoals chrome.</p>
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





          <div class="homewindow demo-card-wide mdl-card mdl-shadow--2dp">
            <button class="mdl-button mdl-js-button mdl-button--primary ticketfilter datafilterselector"> Kies DataFilter</button>
            <h3 style="height: 100px; margin: auto;">Recent aangemaakte tickets</h3>
             <div class="scrolldiv2">
               <div class="ticketinfodrawer">
                 <p style="color: white; text-align: center; padding-top: 15px;"> Openstaande tickets</p>
               </div>
  <div class='container' style="padding-bottom: 60px;">
                <?php $ticketing->getallopen(); ?>
                    </div>
             </div>
             <div class="footerribon"></div>
           </div>
           <div class="demo-card-wide mdl-card mdl-shadow--2dp homewindow1">
             <h3>Ticket rapportage</h3>
               <div class="chart_div">
                 <div id="piechart_div" class="chart row" style=" width: 350px !important; position: absolute; left: 0;"></div>
                 <div id="barchart_div" class="chart row" style="width: 350px !important;position: absolute; right: 0;"></div>
               </div>
             <div class="footerribon"></div>
           </div>

           <div class="demo-card-wide mdl-card mdl-shadow--2dp homewindow2">
             <h3 style="">Ticket control tool</h3>
             <h3 style="">onderwerp toevoegen:</h3><br>
             <form name="insertonderwerp" class="" action="" method="post">
                 <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label " >
                   <input class="mdl-textfield__input" type="text" name="onderwerptitel" id="onderwerptitel">
                   <label class="mdl-textfield__label" for="onderwerp">onderwerp</label>
                       <input type="hidden" name="token" id="token" value="<?php echo token::generate();?>"/>
                 </div>
                 <button class="mdl-button mdl-js-button mdl-button--raised mdl-button--accent" style="">
                   invoeren
                 </button>
               </form>
               <p>verwijder alle tickets ouder dan 3 jaar</p>
                <a style="all: none; margin-top: -10px !important;" href="opschonen.php">
                 <button class="mdl-button mdl-js-button mdl-button--raised mdl-button--accent" style="position: relative; top: 0px;">

                   applicatie opschonen
                 </button>
               </a>
                 <div class="footerribon"></div>
            </div>



           <div class="demo-card-wide mdl-card mdl-shadow--2dp  popupwindow1">
             <h3 class="closepopupwindow1" style="float: left; font-size: 30px; margin-left: 20px; cursor: pointer;">✖</h3>
             <h2 style="text-align: center;">selecteer een filter</h2>
              <div class="scrolldifi">
                  <ul style="list-style: none;  width: 100%;    height: auto;  overflow: hidden; margin-left: -29px;">
                  <li class="btnround" style="width: auto; height: auto; padding: 12px 15px; float: left; cursor: pointer;" data-filter="all"> <span> alles weergeven</span></li>
                   <?php $filter = new ticketing();
                   $filter->getsubjects(); ?>
                  </ul>
             </div>
           </div>

         </div>
       </main>
     </div>




     <script type="text/javascript" src="script/jquery.js"></script>
    <script src="script/mixitup.min.js"></script>
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

  }else {
     redirect::to('index.php');
 }

 ?>
