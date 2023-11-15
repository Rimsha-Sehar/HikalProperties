<?php
session_start();
include('../dbconfig/dbhybrid.php');

// IP AND DEVICE
$ip = $_SERVER['REMOTE_ADDR'];
$device = $_SERVER['HTTP_USER_AGENT']; 

// DEFAULT DATA FIELD
$leadSource = "Campaign";
$leadStatus = "New";
$feedback = "New";
$addedBy = "101";

// RETRIEVE FORM DATA
$leadContact = $_POST['phone_number'];
$otp = $_POST['otp'];

$project = $_POST['project_name'];
$leadType = $_POST['lead_type'];
$language = $_POST['lang'];
$leadSource = $_POST['lead_source'];
$filename = $_POST['file_name'];
$country = $_POST['country_name'];

$leadEmail = $_POST['lead_email'];
$leadName = $_POST['lead_name'];
$enquiryType = $_POST['enquiry_type'];
$leadFor = $_POST['lead_for'];

// $extra = $_POST['PoolRadio1'];
// $enquiryType = $enquiryType . " " . $extra;

$dupq = mysqli_query($con, "SELECT leadContact FROM leads WHERE leadContact = '$leadContact' ORDER BY id DESC");

// $dupf = mysqli_fetch_array($dupq);
if (mysqli_num_rows($dupq) > 0) {
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

    // if (curl_errno($getch)) {
    //     echo json_encode(['success' => false, 'message' => 'Failed to send OTP']);
    // }
    // else {
        // $_SESSION['otp'] = true;
        // echo json_encode(['otp' => true]);
    // }

    $responseData = json_decode($response, true);

    if (isset($responseData['message'])) {
        $message = $responseData['message'];

        $query = mysqli_query($con, "UPDATE leads SET otp = 'Verified' WHERE leadContact = '$leadContact'");

        if ($query) {
            if ($language == "English") {
                header("Location: ../thankyou/en");
            }
            elseif ($language == "Arabic") {
                header("Location: ../thankyou/ar");
            }
            elseif ($language == "French") {
                header("Location: ../thankyou/fr");
            }
            elseif ($language == "Hebrew") {
                header("Location: ../thankyou/he");
            }
            elseif ($language == "Chinese") {
                header("Location: ../thankyou/cn");
            }
            else {
                header("Location: ../thankyou");
            }
            exit("here");
        }
        else {
            header("Location: ../thankyou");
        }
    }    
    if (isset($responseData['error'])) {
        if ($language == "English") {
            header("Location: ../thankyou/en");
        }
        elseif ($language == "Arabic") {
            header("Location: ../thankyou/ar");
        }
        elseif ($language == "French") {
            header("Location: ../thankyou/fr");
        }
        elseif ($language == "Hebrew") {
            header("Location: ../thankyou/he");
        }
        elseif ($language == "Chinese") {
            header("Location: ../thankyou/cn");
        }
        else {
            header("Location: ../thankyou");
        }
        exit("here");
    }
    curl_close($getch);
    exit();

}
else {
    $query = mysqli_query($con, "INSERT INTO leads (leadName, leadContact, leadEmail, enquiryType, leadFor, leadType, project, projectName, leadStatus, leadSource, feedback, language, addedBy, filename, ip, device, otp, country) VALUES ('$leadName', '$leadContact', '$leadEmail', '$enquiryType','$leadFor', '$leadType', '$project', '$project', '$leadStatus', '$leadSource', '$feedback', '$language', '$addedBy', '$filename', '$ip', '$device', 'No OTP Used', '$country')");

    if ($query) {

        if ($language == "English") {
        header("Location: ../thankyou/en");
        }
        elseif ($language == "Arabic") {
            header("Location: ../thankyou/ar");
        }
        elseif ($language == "French") {
            header("Location: ../thankyou/fr");
        }
        elseif ($language == "Hebrew") {
            header("Location: ../thankyou/he");
        }
        elseif ($language == "Chinese") {
            header("Location: ../thankyou/cn");
        }
        else {
            header("Location: ../thankyou");
        }
        exit("here");
    }
    else {
        header("Location: ../thankyou");
    }
}
?>