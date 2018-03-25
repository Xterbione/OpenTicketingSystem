<a class="mdl-navigation__link" href="dashboard_home.php"><img class="navicon" src="icons/home.png" alt="settings icon">Home</a>
<?php
$uid = $_SESSION['UID'];
$user = new user();
  $ustatus = $user->data()->Groupnum;
if ($ustatus == 1) { ?>
<a class="mdl-navigation__link" href="dashboard_gebruikers.php"><img class="navicon" src="icons/tickets.svg" alt="settings icon" >Gebruikers</a>
<a class="mdl-navigation__link" href="dashboard_koppelingen.php"><img class="navicon" src="icons/koppeling.png" alt="settings icon" >Gekoppeld</a>
<!--<a class="mdl-navigation__link" href="#" ><img class="navicon" src="icons/chart.png" alt="settings icon" >Rapporten (N/A)</a>-->
<a class="mdl-navigation__link" href="settings.php"><img class="navicon" src="icons/appsettings.svg" alt="settings icon">APP instellingen</a>
<?php }
if ($ustatus == 0) { ?>
  <a class="mdl-navigation__link" href="dashboard_archive.php"><img class="navicon" src="icons/archive.png" alt="settings icon" >archief  </a>

<?php } ?>
<a class="mdl-navigation__link" href="dashboard_profile.php"><img class="navicon" src="icons/profile2.png" alt="settings icon" >Deze gebruiker  </a>
