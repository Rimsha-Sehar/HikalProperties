<?php
session_start();
error_reporting(0);
include ('../../dbconfig/dbhybrid.php');

$ip = $_SERVER['REMOTE_ADDR'];
$device = $_SERVER['HTTP_USER_AGENT'];
?>

<?php

$protocol = isset ($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? 'https://' : 'http://';
$host = $_SERVER['HTTP_HOST'];
$uri = $_SERVER['REQUEST_URI'];

$fullUrl = $protocol . $host . $uri;
$_SESSION["page_url"] = $fullUrl;

$params = parse_url($fullUrl, PHP_URL_QUERY);
$_SESSION["params"] = $params;
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Hikal Real Estate Properties | Empire Estates</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
</head>

<body>
    HELLO
</body>

</html>
