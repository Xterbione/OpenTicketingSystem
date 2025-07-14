<?php
// test-db.php: Test database connection using project classes

// Set error reporting for visibility
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Diagnostic: Confirm file loading

// Set error reporting for visibility as early as possible
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

function diag_echo($msg) {
    echo '<div style="color:blue;">' . htmlspecialchars($msg) . '</div>';
    flush();
}

diag_echo('Loading core/init.php...');
require_once __DIR__ . '/core/init.php';
diag_echo('Loaded core/init.php');

diag_echo('Loading classes/config.php...');
require_once __DIR__ . '/classes/config.php';
diag_echo('Loaded classes/config.php');

diag_echo('Loading classes/db.php...');
require_once __DIR__ . '/classes/db.php';
diag_echo('Loaded classes/db.php');

echo '<h2>Database Connection Test</h2>';

try {
    $db = db::getInstance();
    diag_echo('db::getInstance() succeeded');
    $result = $db->query('SELECT 1');
    diag_echo('Query executed');
    if ($db->error()) {
        echo '<div style="color:red;"><strong>Query error:</strong> Could not execute test query.<br>';
        echo 'Error message: ' . htmlspecialchars($db->errorMessage()) . '<br>';
        var_dump($db->error());
        echo '</div>';
    } else {
        echo '<div style="color:green;"><strong>Success!</strong> Database connection and query succeeded.</div>';
        echo '<pre>'; print_r($result->results()); echo '</pre>';
    }
} catch (Exception $e) {
    echo '<div style="color:red;"><strong>Exception:</strong> ' . htmlspecialchars($e->getMessage()) . '</div>';
    echo '<pre>' . htmlspecialchars($e->getTraceAsString()) . '</pre>';
}

echo '<div style="color:gray;">Script completed.</div>';
