<html>
  <head>
    <meta charset="utf-8">
    <title>ticketing systeem - BrainConsultant</title>
      <script src='https://code.jquery.com/jquery-3.1.0.min.js'></script>
    <link href='http://fonts.googleapis.com/css?family=Roboto:400' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="css/material.min.css">
    <script src="script/material.min.js"></script>
    <link rel="stylesheet" href="css/material-extends.css">
        <link rel="shortcut icon" type="image/png" href="icons/favicon.png"/>
                 <link rel="shortcut icon" type="image/png" href="icons/favicon.png"/>

  </head>
  <body>

    <header>
      <div class="headr">

      </div>
    </header>


  <div class="demo-card-wide mdl-card mdl-shadow--2dp registerwindow" style="">
        <div class="circleimage" style="margin: 0 auto;"></div>

        <h1 style="padding-top: 30px;">REGISTER</h1>
        <p>log <a href="index.php">hier</a> in</p><br><br>
        <p style="color:#FF0082;">











<?php require_once 'core/init.php';
//grabbing token from inputfield witch is set to the session aswell, user submit form and token check checks if a session exists and check input with session



if (Input::exists()) {
    if (token::check(Input::get('token'))) {
        $validate = new validate();
        $validate = $validate->check($_POST, array(


    'UserName' => array(
      'required' => true,
      'min'      => 2,
      'max'      => 150,
      'unique'   => 'Users'
    ),
    'name' => array(
      'required' => true,
      'min'      => 1,
      'max'      => 150,

    ),
    'MailAddress' => array(

      'required' => true,
      'min'      => 6,
      'max'      => 150,
      'unique'   => 'Users'
    ),
    'password' => array(
      'required' => true,
      'min'      => 4,
      'max'      =>254
    ),
    'password_again' => array(
      'required' => true,
      'min'      => 4,
      'max'      => 254,
      'matches'  => 'password'
    )
  ));
        if ($validate->passed()) {
            $user = new user();
            $salt = hash::salt(32);
            try {
                $user->create(array(
                'UserName'           => Input::get('UserName'),
                'name'               => Input::get('name'),
                'MailAddress'        => Input::get('MailAddress'),
                'password'           => hash::make(Input::get('password'), $salt),
                'salt'               => $salt,
                'Groupnum'           => 0,
                'DateOfCreation'     => date('Y-m-d H:i:s')
                ));
            } catch (Exception $e) {
                die($e->getMessage());
            }
            session::flash('geslaagd', 'u bent geregistreerd!');
            redirect::to('index.php');
        } else {
            foreach ($validate->errors() as $error) {
                echo $error , '<br>';
            }
        }
    }
}
?>





</p>
          <form action="" method="post">
            <div class="inputholder">
                <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
            <label class="mdl-textfield__label" for="UserName">gebruikersnaam...</label>
             <input class="mdl-textfield__input" type="text" name="UserName" id="UserName" value="<?php echo escape(Input::get('UserName'));?>" autocomplete="off"></input><br>
              </div>

              <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
             <label class="mdl-textfield__label" for="name">naam + achternaam</label>
             <input class="mdl-textfield__input" type="text" name="name" id="name" value="<?php echo escape(Input::get('name'));?>"></input><br>
             </div>
             <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
             <label class="mdl-textfield__label" for="MailAddress">email adress</label><br>
             <input class="mdl-textfield__input" type="email" name="MailAddress" id="MailAddress" value="<?php echo escape(Input::get('email'));?>"></input><br>
             </div>
           </div>
            <div class="inputholder">
              <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
             <label class="mdl-textfield__label" for="password">wachtwoord</label><br>
             <input class="mdl-textfield__input" type="password" name="password" id="password"></input><br>
              </div>
              <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
             <label class="mdl-textfield__label" for="password_again">herhaal wachtwoord</label><br>
             <input class="mdl-textfield__input" type="password" name="password_again" id="password_again"></input><br>
              </div>

              <input type="hidden" name="token" id="token" value="<?php echo token::generate();?>"/>
              <input type="submit" value="Register"/>
            </div>
          </form>
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
