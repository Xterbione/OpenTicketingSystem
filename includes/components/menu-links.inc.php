<a class="mdl-navigation__link" href="dashboard_home.php"><img class="navicon" src="icons/home.png" alt="settings icon">Home</a>
<?php
$uid = $_SESSION['UID'];
$user = new user();
  $ustatus = $user->data()->Groupnum;
if ($ustatus == 1) { ?>
<a class="mdl-navigation__link" href="dashboard_gebruikers.php"><img class="navicon" src="icons/tickets.svg" alt="settings icon" >Gebruikers</a>
<!--<a class="mdl-navigation__link" href="#" ><img class="navicon" src="icons/chart.png" alt="settings icon" >Rapporten (N/A)</a>
<a class="mdl-navigation__link" href="#"><img class="navicon" src="icons/appsettings.svg" alt="settings icon">APP Settings (N/A)</a> -->
<?php } ?>
<a class="mdl-navigation__link" href="dashboard_profile.php"><img class="navicon" src="icons/profile.svg" alt="settings icon" >Deze gebruiker  </a>
