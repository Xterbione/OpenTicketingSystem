<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

echo 'Before require db.php<br>';
require_once __DIR__ . '/classes/db.php';
echo 'db.php loaded<br>';
