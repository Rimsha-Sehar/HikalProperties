<?php

function establishConnection($host, $user, $pass, $dbname) {
    try {
        $con = new mysqli($host, $user, $pass, $dbname);
        if ($con->connect_error) {
            return false;
        }
        return $con;
    } catch (Exception $e) {
        return false;
    }
}

// Attempt to establish primary connection
$primaryConnection = establishConnection('34.234.40.81', 'appuser', 'HIK@2704!@#$db', 'hikalcrm');
// $primaryConnection = establishConnection("34.234.40.81", "laravelappuser", "NjPJvbWETDDZ", "laravelapp");

// If primary connection failed, attempt secondary connection
// if (!$primaryConnection) {
//     $secondaryConnection = establishConnection("localhost", "root", "", "laravelapp");

//     if ($secondaryConnection) {
//         // Secondary connection succeeded, set constants
//         define('DB_HOST', 'localhost');
//         define('DB_USER', 'root');
//         define('DB_PASS', '');
//         define('DB_NAME', 'laravelapp');
//         $con = $secondaryConnection;
//     } else {
//         // Handle both primary and secondary connection failure
//         exit("Failed to connect to both databases.");
//     }
// } else {
    // Primary connection succeeded, set constants
    define('DB_HOST', '34.234.40.81');
    define('DB_USER', 'appuser');
    define('DB_PASS', 'HIK@2704!@#$db');
    define('DB_NAME', 'hikalcrm');
    // define('DB_NAME', 'laravelapp');
    $con = $primaryConnection;
// }
// }

// Check connection
if (mysqli_connect_errno()) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
//   exit();
}

// mysqli_select_db($con, 'pagination');


//Essential Database connection
try
{
  $dbh = new PDO("mysql:host=".DB_HOST.";dbname=".DB_NAME,DB_USER,DB_PASS,array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'utf8'"));
}
catch (PDOException $e)
{
  exit("Error: " . $e->getMessage());
}

$dt = new DateTime("now", new DateTimeZone('Asia/Dubai'));
$now = $dt->format('Y-m-d h:i:s');
?>
