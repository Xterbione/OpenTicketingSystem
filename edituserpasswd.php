<?php
require_once 'core/init.php';
$user = new user();
$ustatus = $user->data()->Groupnum;
$uidedit = Input::get('uidedit');
if ($ustatus == 1) {
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
</head>
  <body>

    <div class="demo-card mdl-card mdl-shadow--2dp popupwindow2">
      <h3>wachtwoord wijzigen</h3>
      <?php if (Input::get('mismatch') == 1) {
        echo "<p style='color:red;'>controlleer invoer</p>";
      } ?>
      <form action="edituserpasswdprocess.php" method="post">

      <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label" style="margin: 0 auto;">
       <input class="mdl-textfield__input" name="password" type="password" id="password" autocomplete="off">
       <label class="mdl-textfield__label" for="password">nieuwe wachtwoord</label>
     </div>
     <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label" style="margin: 0 auto;">
      <input class="mdl-textfield__input" type="password" name="password_again" id="password_again" autocomplete="off">
      <label class="mdl-textfield__label" for="password_again">wachtwoord herhalen</label>
    </div>
      <input type="hidden" name="uidedit" value="<?php echo $uidedit ?>">
    <button type="submit" class="mdl-button mdl-js-button mdl-button--primary">
     doorvoeren
   </button>
 </form>
   <a href="dashboard_gebruikers.php">    <button class="mdl-button mdl-js-button mdl-button--primary">
        terug
      </button></a>
    </div>
  </body>
</html>
<?php
} else {
  redirect::to('dashboard_home.php');
}

 ?>
