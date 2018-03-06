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


    <div class="registerwindow" >
      <div class="contentregister">
        <div class="circleimage"></div>

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
      'max'      => 50,
      'unique'   => 'Users'
    ),
    'name' => array(
      'required' => true,
      'min'      => 1,
      'max'      => 50,

    ),
    'MailAddress' => array(

      'required' => true,
      'min'      => 6,
      'max'      => 50,
    ),
    'password' => array(
      'required' => true,
      'min'      => 4
    ),
    'password_again' => array(
      'required' => true,
      'min'      => 4,
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
             <label for="UserName">Gebruikersnaam</label><br>
             <input type="text" name="UserName" id="UserName" value="<?php echo escape(Input::get('UserName'));?>" autocomplete="off"></input><br>



             <label for="name">naam + achternaam</label><br>
             <input type="text" name="name" id="name" value="<?php echo escape(Input::get('name'));?>"></input><br>

             <label for="MailAddress">email adress</label><br>
             <input type="email" name="MailAddress" id="MailAddress" value="<?php echo escape(Input::get('email'));?>"></input><br>
           </div>
            <div class="inputholder">
             <label for="password">wachtwoord</label><br>
             <input type="password" name="password" id="password"></input><br>

             <label for="password_again">herhaal wachtwoord</label><br>
             <input type="password" name="password_again" id="password_again"></input><br>


              <input type="hidden" name="token" id="token" value="<?php echo token::generate();?>"/>
              <input type="submit" value="Register"/>
            </div>
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
