<?php

// Define your database connection parameters
define('DB_HOST', '34.234.40.81');
define('DB_USER', 'appuser');
define('DB_PASS', 'HIK@2704!@#$db');
define('DB_NAME', 'hikalcrm');

// Function to establish a database connection asynchronously
function establishConnection($host, $user, $pass, $dbname, $callback) {
    try {
        $con = new mysqli($host, $user, $pass, $dbname);
        if ($con->connect_error) {
            $callback(false); // Call the callback function with the connection status
        } else {
            $callback($con); // Call the callback function with the database connection
        }
    } catch (Exception $e) {
        // Handle any exceptions that occur during the connection attempt
        $callback(false);
    }
}

// Asynchronously establish the database connection
establishConnection(DB_HOST, DB_USER, DB_PASS, DB_NAME, function($connection) {
    if ($connection === false) {
        // Connection failed, handle error (you can log or output an error message here)
        exit("Failed to connect to the database.");
    } else {
        // Connection succeeded, set the database connection as a session variable or handle as needed
        $_SESSION['db_connection'] = $connection;
    }
});
