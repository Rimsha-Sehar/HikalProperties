<?php

function establishConnection($host, $user, $pass, $dbname) {
    try {
        // Create a connection to the MySQL server
        $con = mysqli_connect($host, $user, $pass, $dbname);
        if ($con->connect_error) {
            return false;
        }
        return $con;
    } catch (Exception $e) {
        return false;
    }
}

// Attempt to establish primary connection
    // Primary connection succeeded, set constants
    define('DB_HOST', '34.234.40.81');
    define('DB_USER', 'appuser');
    define('DB_PASS', 'HIK@2704!@#$db');
    define('DB_NAME', 'hikalcrm');
    $con = establishConnection(DB_HOST, DB_USER, DB_PASS, DB_NAME,);

// Check connection
if (mysqli_connect_errno()) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
//   exit();
}

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
