<?php
include $_SERVER['DOCUMENT_ROOT'] . '/settings.conf';


$dbinfo = new mysqli($servername, $username, $password, $dbname);

if ($dbinfo->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


?>
