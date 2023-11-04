<?php
session_start();
include('includes/dbhybrid.php');

// IP AND DEVICE
$ip = $_SERVER['REMOTE_ADDR'];
$device = $_SERVER['HTTP_USER_AGENT']; 

// DEFAULT DATA FIELD
$leadSource = "Campaign";
$leadStatus = "New";
$feedback = "New";
$addedBy = "101";

// RETRIEVE FORM DATA
$project = $_POST['Project'];
$leadType = $_POST['LeadType'];
$language = $_POST['Language'];
$leadSource = $_POST['LeadSource'];
$filename = $_POST['Filename'];
$country = $_POST['Country'];

// $phone = $_POST['phone']['main'];
if ($_POST['phone']['full'] == "") {
    $leadContact = $_POST['phone']['main'];
}
else {
    $leadContact = $_POST['phone']['full'];
}
// $leadContact = $_POST['phone'];

$leadEmail = $_POST['LeadEmail1'];
$leadName = $_POST['LeadName1'];
$enquiryType = $_POST['EnquiryRadio1'];
$leadFor = $_POST['LeadForRadio1'];

$extra = $_POST['PoolRadio1'];
$enquiryType = $enquiryType . " " . $extra;

if (isset($_SESSION['form_submitted'])) {
    // Redirect or display an error message to the user
    // Preventing duplicate form submission
    header("Location: thankyou.php");
}

// Check if name and contact fields are empty
if (empty($leadName) || empty($leadContact)) {
    $error = "Please enter name and contact to register!";
} 
else {
    // Set the session variable to mark the form as submitted
    $_SESSION['form_submitted'] = true;
    

    // Process the form data or perform additional validation
    // $blockq = mysqli_query($con, "SELECT byIP FROM is_blocked WHERE (byIP IS NOT NULL OR byIP != '') AND status = 1");
    // while ($blockf = mysqli_fetch_array($blockq)) {
    //     $blocked = $blockf['byIP'];
    //     if ($ip == $blocked) {
    //         // DO NOTHING
    //     }
    //     else {
            $dupq = mysqli_query($con, "SELECT leadName, leadContact, project, language FROM leads ORDER BY id DESC LIMIT 1");
            $dupf = mysqli_fetch_array($dupq);
            if ($dupf['leadName'] == $leadName && $dupf['leadContact'] == $leadContact && $dupf['project'] == $project && $dupf['language'] == $language) {
                // Preventing duplicate form submission
                header("Location: thankyou.php");
            }
            else {
                // if ($con) {
                    $query = mysqli_query($con, "INSERT INTO leads (leadName, leadContact, leadEmail, enquiryType, leadFor, leadType, project, projectName, leadStatus, leadSource, feedback, language, addedBy, filename, ip, device, otp, country) VALUES ('$leadName', '$leadContact', '$leadEmail', '$enquiryType','$leadFor', '$leadType', '$project', '$project', '$leadStatus', '$leadSource', '$feedback', '$language', '$addedBy', '$filename', '$ip', '$device', 'No OTP Used', '$country')");
                // }

                if ($query || $query_BH) {
                    // Clear the session variable after successful form submission
                    $_SESSION['form_submitted'] = false;
        
                    if ($language == "English") {
                        header("Location: en-thankyou.php");
                    }
                    elseif ($language == "Arabic") {
                        header("Location: ar-thankyou.php");
                    }
                    elseif ($language == "French") {
                        header("Location: fr-thankyou.php");
                    }
                    elseif ($language == "Hebrew") {
                        header("Location: he-thankyou.php");
                    }
                    elseif ($language == "Chinese") {
                        header("Location: cn-thankyou.php");
                    }
                    else {
                        header("Location: thankyou.php");
                    }
                    exit("here");
                }
            }
            
    //     }
    // }
}

?>