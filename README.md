# OpenTicketingSystem

#to configure, edit the core/init.php to your parameters and add the db files to your db
# $user = db::getInstance()->query("SELECT UserName FROM Users WHERE UserName = ?", array('alex'));
# $user = db::getInstance()->get('Users', array('UserName','=','alex'));
# $userInsert = db::getInstance()->insert('Users', array(
#$UserUpdate = db::getInstance()->update('Users', 3, array('password' => 'newpassword'));
#   'UserName' => 'alex',
#   'name' => 'alex',
#   'MailAddress' => 'alex@mail.com',
#   'password' => 'welkom',
#   'salt' => 'salt',
#   'Groupnum' => '1',
#   'DateOfCreation' => '2014-08-12 11:14:54'
# ));
# if($userInsert){
#   echo 'succes';
# }


# if (!$user->count()){
#   echo 'No user';
# } else {
#
#   echo $user->first()->UserName;
# }
