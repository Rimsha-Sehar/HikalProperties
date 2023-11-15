<?php
session_start();
include('../dbconfig/dbhybrid.php');

// $lead_name = mysqli_real_escape_string($con, $_SESSION['lead_name']);
// $lead_contact = mysqli_real_escape_string($con, $_SESSION['lead_contact']);
// $lead_email = mysqli_real_escape_string($con, $_SESSION['lead_email']);
// $lead_ip = mysqli_real_escape_string($con, $_SESSION['lead_ip']);

$ip = $_SERVER['REMOTE_ADDR'];
$device = $_SERVER['HTTP_USER_AGENT'];

$lead_name = $_SESSION['lead_name'];
$lead_contact = $_SESSION['lead_contact'];
$lead_email = $_SESSION['lead_email'];
$lead_ip = $_SESSION['lead_ip'];
$note = $_SESSION['note'];
$start_time = $_SESSION['start_time'];

$checkq = mysqli_query($con, "SELECT meet_link FROM leads WHERE leadName = '$lead_name' AND leadContact = '$lead_contact' AND leadEmail = '$lead_email' AND ip = '$lead_ip' AND coldcall = 10");

$checkf = mysqli_fetch_array($checkq);

if ($checkf['meet_link'] == null || $checkf['meet_link'] == "" || $checkf['meet_link'] == "null") {
    // No meet_link available yet
    echo 'not_available';
} else {
    // Meet link is available
    echo $checkf['meet_link'];
}
?>
