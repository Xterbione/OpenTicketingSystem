


<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>ticketing systeem - BrainConsultant</title>
      <script src='https://code.jquery.com/jquery-3.1.0.min.js'></script>
    <link href='http://fonts.googleapis.com/css?family=Roboto:400' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="css/material.min.css">
    <script src="script/material.min.js"></script>
    <link rel="shortcut icon" type="image/png" href="icons/favicon.png"/>
    <link rel="stylesheet" href="css/material-extends.css">
       <meta name="viewport" content="width=device-width, initial-scale=1.0">

  </head>
  <body>

    <header>
      <div class="headr">

      </div>
    </header>


    <div class="demo-card-wide mdl-card mdl-shadow--2dp loginwindow" style="">
        <div class="circleimage" style="margin: auto;"></div>
        <h1>login</h1>
        <p>registreer je <a href="register.php">hier</a></p>
          <p style="color:#FF0082;">
            <?php
            require_once 'core/init.php';

            if (Input::exists()) {
              if (token::check(Input::get('token'))) {
                $validate = new validate();
                $validation = $validate->check($_POST, array(
                  'UserName' => array('required' => true),
                  'password' => array('required' => true)
                ));
                if ($validation->passed()) {

                  $user = new user();
                  $login =  $user->login( Input::get('UserName') , Input::get('password'));
                  if ($login) {
                    redirect::to('dashboard_home.php');
                    // redirect::to('dashboard.php');
                  } else {
                    echo 'excuses, inloggen mislukt! controlleer uw gegevens';
                  }
                } else {
                  $errors = $validation->errors();

                }
              }
            }




        if (session::exists('geslaagd')) {
          echo session::flash('geslaagd');
        }
        if (isset($errors)) {
          foreach ($errors as $error) {
            echo $error . '<br>';
          }
        }
        ?></p>


        <form name="loginform" action="" method="post" >
          <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
          <label for="UserName" class="mdl-textfield__label">gebruikersnaam</label>
          <input id="UserName" class="mdl-textfield__input"  name="UserName" type="text" autocomplete="off">
        </div>
        <br>
        <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
        <label for="password" class="mdl-textfield__label">password</label>
        <input id="password" class="mdl-textfield__input"  name="password" type="password" autocomplete="off">
      </div><br>
          <input type="hidden" name="token" value="<?php echo token::generate(); ?>">
          <input class="mdl-button mdl-js-button mdl-button--raised mdl-button--accent" type="submit" name="submit" value="inloggen"></input>
        </form>
      </div>
    </div>
<script type="text/javascript">
CapsLock.addListener(function(isOn){
if (isOn){
  alert('Warning: you have turned caps lock on');
}
});

</script>
    <footer>
      <!--copyright©bryan davit koolman-->
    </footer>

  </body>
</html>
