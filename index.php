


<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>ticketing systeem - BrainConsultant</title>
      <script src='https://code.jquery.com/jquery-3.1.0.min.js'></script>
    <link href='http://fonts.googleapis.com/css?family=Roboto:400' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="/css/stylesheet-login.css">

  </head>
  <body>

    <header>
    </header>


    <div class="loginwindow">

      <div class="contentlw">
        <div class="circleimage"></div>
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
                    echo 'excuses, inloggen mislukt!';
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


        <form name="loginform" action="" method="post">
          <label for="UserName">gebruikersnaam</label>
          <input id="UserName" placeholder="Gebruikersnaam" name="UserName" type="text" autocomplete="off">
          <label for="Password">wachtwoord</label>
          <input id="password" name="password" placeholder="Wachtwoord" type="password" autocomplete="off">
          <input type="hidden" name="token" value="<?php echo token::generate(); ?>">
          <input type="submit" name="submit" value="inloggen"></input>
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
      <p>copyright©bryan</p>
    </footer>

  </body>
</html>
