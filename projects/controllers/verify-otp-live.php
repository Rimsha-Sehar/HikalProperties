<?php
session_start();
include('../dbconfig/dbhybrid.php');

// IP AND DEVICE
$ip = $_SERVER['REMOTE_ADDR'];
$device = $_SERVER['HTTP_USER_AGENT']; 

// RETRIEVE FORM DATA
$leadContact = $_GET['phone_number'];
$otp = $_GET['otp'];

// CALL VERIFY OTP API 
$getOTP = 'https://staging.hikalcrm.com/api/verify-otp';

$otpData = array(
    'phone_number' => (string)$leadContact,
    'otp' => $otp,
);

// Initialize cURL session
$getch = curl_init($getOTP);

// Set cURL options
curl_setopt($getch, CURLOPT_POST, 1);
curl_setopt($getch, CURLOPT_POSTFIELDS, $otpData);
curl_setopt($getch, CURLOPT_RETURNTRANSFER, true);

$response = curl_exec($getch);

$responseData = json_decode($response, true);

if (isset($responseData['message'])) {
    $message = $responseData['message'];

    $query = mysqli_query($con, "UPDATE leads SET otp = 'Verified' WHERE leadContact = '$leadContact'");

    if ($query) {
        echo json_encode(['otp' => true]);
    }
    else {
        echo json_encode(['otp' => false]);
    }
}    
elseif (isset($responseData['error'])) {
    echo json_encode(['otp' => false]);
}
curl_close($getch);
exit();

?>