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
$coldcall = 10;

// RETRIEVE FORM DATA
$leadSource = $_POST['LeadSource'];
$filename = $_POST['Filename'];
// $leadType = $_POST['LeadType'];
// $country = $_POST['Country'];

// FORM DATA
$leadName = $_POST['Name'];
$leadEmail = $_POST['Email'];

if ($_POST['phone']['full'] == "") {
    $leadContact = $_POST['phone']['main'];
}
else {
    $leadContact = $_POST['phone']['full'];
}
// $phone = $_POST['phone']['main'];
// $leadContact = $_POST['phone'];

$project = $_POST['Project'];
$language = $_POST['Language'];
$note = $_POST['Consultation'];
$enote = $_POST['Enote'];

// $final_note = $note . " | " . $enote;
// exit($final_note);

if (isset($_SESSION['form_submitted'])) {
    header("Location: ../thankyou");
}

if (empty($leadName) || empty($leadContact)) {
    $error = "Please enter name and contact to register!";
} 
else {
    // Set the session variable to mark the form as submitted
    $_SESSION['form_submitted'] = true;
    
    // STORE LEAD DETAILS IN SESSION
    $_SESSION['lead_name'] = $leadName;
    $_SESSION['lead_contact'] = $leadContact;
    $_SESSION['lead_email'] = $leadEmail;
    $_SESSION['lead_ip'] = $ip;
    $_SESSION['note'] = $note;
    $_SESSION['start_time'] = time();
    
    
    $dupq = mysqli_query($con, "SELECT leadName, leadContact, project, language FROM leads ORDER BY id DESC LIMIT 1");
    $dupf = mysqli_fetch_array($dupq);
    
    if ($dupf['leadName'] == $leadName && $dupf['leadContact'] == $leadContact && $dupf['project'] == $project && $dupf['language'] == $language) {
        // Preventing duplicate form submission
        header("Location: thankyou.php");
    }
    else {
        $query = "INSERT INTO leads (leadName, leadContact, leadEmail, project, projectName, leadStatus, leadSource, feedback, language, addedBy, filename, ip, device, coldcall, notes, otp) VALUES ('$leadName', '$leadContact', '$leadEmail', '$project', '$project', '$leadStatus', '$leadSource', '$feedback', '$language', '$addedBy', '$filename', '$ip', '$device', '$coldcall', '$note', 'No OTP Used')";
        $runquery = mysqli_query($con, $query);
        
        if ($runquery) {
            // Clear the session variable after successful form submission
            $_SESSION['form_submitted'] = false;

            // if ($note == "Live Video Call Meeting") {
                if ($language == "Arabic") {
                    header("Location: ../consultation/ar/waiting");
                }
                else {
                    header("Location: ../consultation/en/waiting");
                }
                exit();
            // }
            // else {
            //     if ($language == "English") {
            //         header("Location: en-thankyou");
            //     }
            //     elseif ($language == "Arabic") {
            //         header("Location: ar-thankyou");
            //     }
            //     elseif ($language == "French") {
            //         header("Location: fr-thankyou");
            //     }
            //     elseif ($language == "Hebrew") {
            //         header("Location: he-thankyou");
            //     }
            //     elseif ($language == "Chinese") {
            //         header("Location: cn-thankyou");
            //     }
            //     else {
            //         header("Location: thankyou");
            //     }
            // }
            // exit();
        }
    }
}

?>