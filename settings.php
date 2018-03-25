<?php
    require_once 'core/init.php';
    $uid = $_SESSION['UID'];
    $ticket = new ticketing();
    $user = new user();
    $settinghandler = new settinghandler();
    $notifyer = new notify();
      if ($user->isloggedin()) {
if ($user->data()->Groupnum == 1) {
 ?>



 <!DOCTYPE html>
 <html>
   <head>
     <meta charset="utf-8">
     <title>ticketing system</title>
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
           <span class="mdl-layout-title" ><?php echo $settinghandler->GetCompanyName();  ?> T.S.</span>

           <!-- Add spacer, to align navigation to the right -->
           <div class="mdl-layout-spacer"></div>
           <!-- Navigation. We hide it in small screens. -->
           <nav class="mdl-navigation mdl-layout--large-screen-only">
           </nav>
           <!-- notify inbox icon -->
          <!-- logout button -->
          <?php if ($user->data()->Groupnum == 1) {?>
          <!-- notify inbox icon -->
          <div class="material-icons mdl-badge mdl-badge--overlap notify " data-badge="<?php $notifyer->countnotify($uid); ?>">account_box </div>
     <?php      } ?>
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

        </button>
        </a>
       </div>
       <main class="mdl-layout__content">
         <div class="page-content">

                                  <?php include "includes/components/notifydrawer.php"; ?>


           <div class="demo-card-wide mdl-card mdl-shadow--2dp profilewindow wrapperprofile" style="padding: 20px;">
             <div class="profilecontainer">
               <div class="item1profile">
                <h1 style="text-align:center; color: #FF0082;">Mail Instellingen</h1>
                <p><?php echo session::flash('smelding'); ?></p>
                <!-- <span>MailSMTPauth</span> <form action="#"> -->

              <form action="updatemailer.php" method="POST">
                <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                  <input class="mdl-textfield__input" name="MailHost" type="text" id="sample3" value="<?php echo $settinghandler->GetMailHost(); ?>">
                  <label class="mdl-textfield__label" for="sample3">MailHost</label>
                </div>
                <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                  <input class="mdl-textfield__input" name="MailPort" type="text" pattern="-?[0-9]*(\.[0-9]+)?" value="<?php echo $settinghandler->GetMailPort(); ?>" id="sample4">
                  <label class="mdl-textfield__label" for="sample4">Mail Poort</label>
                  <span class="mdl-textfield__error">Input Moet Een Nummer zijn!</span>
                </div>
              <!-- <p>MailSMTPauthentication</p>
              <select>
                <option disabled selected>true</option>
                <option disabled>false</option>
              </select><br> -->
              <p>SMTPSecurity</p>
              <select name="SMTPSecure">
                <?php if ($settinghandler->GetSMTPSecure() == 'SSL'): ?>
                  <option value="SSL" selected>SSL</option>
                  <option value="TLS">TLS</option>
                  <option value="none">none</option>
                </select><br>
                <?php endif; ?>
                <?php if ($settinghandler->GetSMTPSecure() == 'TLS'): ?>
                  <option value="SSL">SSL</option>
                  <option value="TLS" selected>TLS</option>
                  <option value="none">none</option>
                </select><br>
                <?php endif; ?>
                <?php if ($settinghandler->GetSMTPSecure() == 'none'): ?>
                  <option value="SSL">SSL</option>
                  <option value="TLS">TLS</option>
                  <option value="none" selected>none</option>
                </select><br>
                <?php endif; ?>
              <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                <input class="mdl-textfield__input" name="DisplayName" type="text" id="sample3" value="<?php echo $settinghandler->GetMailFromName(); ?>">
                <label class="mdl-textfield__label" for="sample3">DisplayNaam afzender:</label>
              </div>
              <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                <input class="mdl-textfield__input" type="text" name="MailDomain" id="sample3" value="<?php echo $settinghandler->GetMailDomain(); ?>">
                <label class="mdl-textfield__label" for="sample3">MailServer Domein</label>
              </div>
              <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                <input class="mdl-textfield__input" type="text" id="sample3" name="MailUser" value="<?php echo $settinghandler->GetMailUser(); ?>">
                <label class="mdl-textfield__label" for="sample3">MailServer user</label>
              </div>
              <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                <label class="mdl-textfield__label" for="sample3">MailServer User Password</label>
                <input type="password" name="Password" class="mdl-textfield__input" type="text" id="sample3" value="<?php echo $settinghandler->GetMailPassword(); ?>">
              </div><br>
              <button type="submit" class="mdl-button mdl-js-button mdl-button--primary">
              doorvoeren
            </button>
              </form>
          </div>
          <div class="item2profile" style="text-align: center;">
              <h1 style="text-align:center; color: #FF0082;">Display Instellingen</h1>
              <p><?php echo session::flash('Dmelding'); ?></p>
              <form action="updatedisplay.php" method="POST">
                <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                  <input class="mdl-textfield__input" name="LogoLink" type="text" value="<?php echo $settinghandler->GetLogoLink(); ?>" id="sample3">
                  <label class="mdl-textfield__label" for="sample3">link naar bedrijfslogo</label>
                </div>
                <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                  <input class="mdl-textfield__input" type="text" name="BrandCollor" id="sample3" value="<?php echo $settinghandler->GetBrandCollor(); ?>">
                  <label class="mdl-textfield__label" for="sample3">Kleurcode BrandCollor</label>
                </div>
                <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                  <input class="mdl-textfield__input" name="CompanyName" type="text" id="sample3" value="<?php echo $settinghandler->GetCompanyName(); ?>">
                  <label class="mdl-textfield__label" for="sample3">BedrijfsNaam</label>
                </div><br>
                <button type="submit" class="mdl-button mdl-js-button mdl-button--primary">
                doorvoeren
              </button>
              </form>
          </div>
          <div class="item3profile" style="text-align:center;">
            <h1 style="color: #FF0082;">setting change geschiedenis</h1>
                <div class="scrolldiv3" style="height: 55%; overflow-y: scroll; margin: 10px; border: 1px solid grey; overflow-x: none; ">
                  <table  class="mdl-data-table mdl-js-data-table mdl-shadow--2dp zui-table" style="width: 100%; text-align: center; overflow-x: none;">
                    <thead>
                      <tr>
                        <th style="text-align: center;">naam Instelling</th>
                        <th style="text-align: center;">laats aangepast door</th>
                        <th style="text-align: center;">op datum en tijd</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php $settinghandler->GetSettingHistory(); ?>
                    </tbody>
                  </table>
                </div><br><br>
                <p>als u merkt dat deze gegevens niet kloppen, raden wij u aan het wachtwoord van de bron-account te wijzigen.</p>
              </div>
                <div class="footerribon" style="width: 100%; float: left; margin-left: -20px; margin-top: 300px;"></div>
              </div>
            </div>

       </main>
     </div>




   </div>

           </div>
          </main>
        </div>
      </body>
    </html>
    <script type="text/javascript" src="script/jquery.js"></script>
    <script  src="script/dashboard_new.js"></script>
     <?php
   } else {
       redirect::to('index.php');
   }
 } else {
  redirect::to('index.php');
} ?>
