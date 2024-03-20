<?php

function establishConnection($host, $user, $pass, $dbname) {
    try {
        $con = new mysqli($host, $user, $pass, $dbname);
        if ($con->connect_error) {
            throw new Exception("Failed to connect to MySQL: " . $con->connect_error);
        }
        return $con;
    } catch (Exception $e) {
        // Log or handle the exception
        error_log("Connection Error: " . $e->getMessage());
        return false;
    }
}

// Attempt to establish primary connection
$primaryConnection = establishConnection('34.234.40.81', 'appuser', 'HIK@2704!@#$db', 'hikalcrm');

if (!$primaryConnection) {
    exit("Failed to establish MySQL connection.");
}

// Define database connection constants
define('DB_HOST', '34.234.40.81');
define('DB_USER', 'appuser');
define('DB_PASS', 'HIK@2704!@#$db');
define('DB_NAME', 'hikalcrm');

//Essential Database connection
try {
    $dbh = new PDO("mysql:host=".DB_HOST.";dbname=".DB_NAME, DB_USER, DB_PASS, array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'utf8'"));
} catch (PDOException $e) {
    // Log or handle the exception
    error_log("PDO Connection Error: " . $e->getMessage());
    exit("Error: " . $e->getMessage());
}

// Current date and time
$dt = new DateTime("now", new DateTimeZone('Asia/Dubai'));
$now = $dt->format('Y-m-d h:i:s');
?>
