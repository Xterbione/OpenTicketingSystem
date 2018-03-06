<?php
  session_start();
  ini_set('display_errors', 1);
  error_reporting( E_ALL );

  function getloginhistory ($uid)
  {
    include $_SERVER['DOCUMENT_ROOT'] . '/databasehandlers/dbhlogin.php';
    $sql = "SELECT * FROM Login_History WHERE user_id = $uid ORDER BY LastLoginDate DESC";
    foreach ($dbinfo->query($sql) as $row)
    {
      $ldd = $row['LastLoginDate'];
      echo '<tr>  <td> ';
      echo $ldd;
      echo '</td> </tr>';
    }
  }

  function getnotifications ($uid)
  {
    include $_SERVER['DOCUMENT_ROOT'] . '/databasehandlers/dbhlogin.php';
    $sql = "SELECT * FROM Notifications WHERE User_ID ='$uid';"; // /' used to enter '' into the query, akways close query with ; inside '' can use "" but this works faster
    foreach ($dbinfo->query($sql) as $row)
    {
      if($debug)
      {
        print_r($row);
      }
      $title    = $row['Notify_title'];
      $content  = $row['Notify_content'];
      $color    = $row['color'];
      switch ($color)
      {
        case "green":
          echo '<div class="notifycontain" style="background-color:#dcdcdc; min-height: 90px; padding-top: 5px; padding-bottom: 20px;">';
          echo $title , '<br><br>';
          echo $content;
          echo '</div>';
        break;

        case "red":
          echo ' <div class="notifycontain" style="background-color: red;">';
          echo $title , '<br>';
          echo $content;
          echo '</div>';
        break;

        case "blue":
          echo ' <div class="notifycontain" style="background-color: blue;">';
          echo $title , '<br>';
          echo $content;
          echo '</div>';
        break;
      }
    }
    $dbinfo->close();
  }

  function get_client_ip_server()
  {
    $ipaddress = '';
    if ($_SERVER['HTTP_CLIENT_IP'])
    {
      $ipaddress = $_SERVER['HTTP_CLIENT_IP'];
    }
    elseif($_SERVER['HTTP_X_FORWARDED_FOR'])
    {
      $ipaddress = $_SERVER['HTTP_X_FORWARDED_FOR'];
    }
    elseif($_SERVER['HTTP_X_FORWARDED'])
    {
      $ipaddress = $_SERVER['HTTP_X_FORWARDED'];
    }
    elseif($_SERVER['HTTP_FORWARDED_FOR'])
    {
      $ipaddress = $_SERVER['HTTP_FORWARDED_FOR'];
    }
    elseif($_SERVER['HTTP_FORWARDED'])
    {
      $ipaddress = $_SERVER['HTTP_FORWARDED'];
    }
    elseif($_SERVER['REMOTE_ADDR'])
    {
      $ipaddress = $_SERVER['REMOTE_ADDR'];
    }
    else
    {
      $ipaddress = 'UNKNOWN';
    }
    return $ipaddress;
  }

  function delnotify ($nid)
  {
    include $_SERVER['DOCUMENT_ROOT'] . '/databasehandlers/dbhlogin.php';
    $sql = "DELETE FROM Notifications WHERE notify_ID = '$nid';";
    if ($dbinfo->query($sql) === TRUE)
    {
      header("Location: ../dashboard.php");
    }
    else
    {
      echo "Error: " . $sql . "<br>" . $dbinfo->error;
    }
  }

  function delallnotify ($nid)
  {
    include $_SERVER['DOCUMENT_ROOT'] . '/databasehandlers/dbhlogin.php';
    $sql = "DELETE FROM Notifications WHERE User_ID = '$nid';";
    if ($dbinfo->query($sql) === TRUE)
    {
      echo "notifications deleted successfully";
      header("Location: ../dashboard.php");
    }
    else
    {
      echo "Error: " . $sql . "<br>" . $dbinfo->error;
    }
  }

  function addnotification ($nid, $color, $notify_title, $notify_content)
  {
    include $_SERVER['DOCUMENT_ROOT'] . '/databasehandlers/dbhlogin.php';
    $sql = "INSERT INTO Notifications  (User_ID, color, Notify_title, Notify_content) VALUES ('$nid', '$color', '$notify_title' , '$notify_content') ";
    if ($dbinfo->query($sql) === TRUE)
    {
      echo "notifications deleted successfully";
      header("Location: ../dashboard.php");
    }
    else
    {
      echo "Error: " . $sql . "<br>" . $dbinfo->error;
    }
  }

  function getticketsrelclient ($nid)
  {
    include $_SERVER['DOCUMENT_ROOT'] . '/databasehandlers/dbhlogin.php';
    $sql = "SELECT * FROM Notifications WHERE User_ID = $uid";
    foreach ($dbinfo->query($sql) as $row)
    {
      $title    = $row['Notify_title'];
      $content  = $row['Notify_content'];
      $color    = $row['color'];
      $nid      = $row['notify_ID'];
      echo ' <div class="notifycontain" style="background-color: green;">';
    }
  }

  function getticketsall ($nid)
  {
    include $_SERVER['DOCUMENT_ROOT'] . '/databasehandlers/dbhlogin.php';
    $sql = "SELECT * FROM tickets";
    foreach ($dbinfo->query($sql) as $row)
    {
      $title    = $row['Notify_title'];
      $content  = $row['Notify_content'];
      $color    = $row['color'];
      $nid      = $row['notify_ID'];
      echo ' <div class="notifycontain" style="background-color: green;">';
    }
  }

  function getticketsreladmin ($nid)
  {

  }

  function getnotifycount ($uid)
  {
    include $_SERVER['DOCUMENT_ROOT'] . '/databasehandlers/dbhlogin.php';
    $sql      = "SELECT *  FROM Notifications WHERE User_ID = '$uid'";
    $rowcount = $dbinfo->query($sql)->num_rows;
    printf( $rowcount  );
  }

?>
