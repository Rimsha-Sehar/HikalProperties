<?php

// Define the global variable to hold the connection object
global $con;

function establishConnectionAsync($host, $user, $pass, $dbname, $callback) {
    $streamContext = stream_context_create([
        'mysql' => [
            'host' => $host,
            'user' => $user,
            'password' => $pass,
            'database' => $dbname
        ]
    ]);

    // Open MySQL connection asynchronously
    $stream = stream_socket_client("mysql:host=$host", $errno, $errstr, 30, STREAM_CLIENT_CONNECT | STREAM_CLIENT_ASYNC_CONNECT, $streamContext);

    if (!$stream) {
        // Connection failed
        $callback(null, "Failed to connect to MySQL: $errstr");
        return;
    }

    // Set stream to non-blocking mode
    stream_set_blocking($stream, 0);

    // Set callback for when the connection is established
    stream_set_read_buffer($stream, 0);
    stream_set_write_buffer($stream, 0);

    // Set timeout for connection attempt (5 seconds)
    $timeout = time() + 5;

    // Wait for connection or timeout
    while (!feof($stream)) {
        $info = stream_get_meta_data($stream);
        if ($info['eof']) {
            // Connection failed
            fclose($stream);
            $callback(null, "Failed to connect to MySQL: End of file reached");
            return;
        }
        if ($info['timed_out']) {
            // Connection timed out
            fclose($stream);
            $callback(null, "Failed to connect to MySQL: Connection timed out");
            return;
        }
        if (stream_select($read = [$stream], $write = [], $except = [], 0)) {
            // Connection established
            $callback($stream, null);
            return;
        }
        if (time() > $timeout) {
            // Timeout reached
            fclose($stream);
            $callback(null, "Failed to connect to MySQL: Timeout reached");
            return;
        }
        usleep(1000); // Sleep for 1 millisecond to avoid high CPU usage
    }
}

// Establish MySQL connection asynchronously
establishConnectionAsync('34.234.40.81', 'appuser', 'HIK@2704!@#$db', 'hikalcrm', function ($stream, $error) {
    if ($error) {
        echo $error;
        return;
    }

    // Connection succeeded, set constants
    define('DB_HOST', '34.234.40.81');
    define('DB_USER', 'appuser');
    define('DB_PASS', 'HIK@2704!@#$db');
    define('DB_NAME', 'hikalcrm');

    // Assign the connection object to the global variable
    global $con;
    $con = $stream;

    // Essential Database connection
    try {
        $dbh = new PDO("mysql:host=".DB_HOST.";dbname=".DB_NAME,DB_USER,DB_PASS,array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'utf8'"));
    } catch (PDOException $e) {
        exit("Error: " . $e->getMessage());
    }

    $dt = new DateTime("now", new DateTimeZone('Asia/Dubai'));
    $now = $dt->format('Y-m-d h:i:s');
});
?>
