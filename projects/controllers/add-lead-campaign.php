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
$coldcall = 6;

// RETRIEVE FORM DATA
$leadSource = $_POST['LeadSource'];
$filename = $_POST['Filename'];
// $leadType = $_POST['LeadType'];
// $country = $_POST['Country'];

// FORM DATA
$leadName = $_POST['Name'];
$leadEmail = $_POST['Email'];

if (isset($_POST['phone']['full']) && ($_POST['phone']['full'] != "")) {
    $leadContact = $_POST['phone']['full'];
}
else if (isset($_POST['phone']['main']) && ($_POST['phone']['main'] != "")) {
    $leadContact = $_POST['phone']['main'];
}

if (isset($_POST['leadContact']) && ($_POST['leadContact'] != "")) {
    $leadContact = $_POST['leadContact'];
}

// $project = $_POST['Project'];

$project = "";
$language = $_POST['Language'];
$note = $_POST['Consultation'];

if ($note == "Register for later") {
    $note = $_POST['Schedule'];

    $dateTime = new DateTime($note);
    $formattedDateTime = $dateTime->format("Y-m-d h:i A");

    $note = "Scheduled for " . $formattedDateTime;
}

// STORE LEAD DETAILS IN SESSION
$_SESSION['lead_name'] = $leadName;
$_SESSION['lead_contact'] = $leadContact;
$_SESSION['lead_email'] = $leadEmail;
$_SESSION['language'] = $language;
$_SESSION['lead_ip'] = $ip;
$_SESSION['note'] = $note;
$_SESSION['start_time'] = time();

$dupq = mysqli_query($con, "SELECT leadName, leadContact, project, language FROM leads ORDER BY id DESC LIMIT 1");
$dupf = mysqli_fetch_array($dupq);

if ($dupf['leadName'] == $leadName && $dupf['leadContact'] == $leadContact && $dupf['project'] == $project && $dupf['language'] == $language) {
    // Preventing duplicate form submission
    header("Location: ../thankyou");
}
else {
    // SEND OTP 
    if (substr($leadContact, 0, 4) === "+971") {
        $query = mysqli_query($con, "INSERT INTO leads (leadName, leadContact, leadEmail, project, projectName, leadStatus, leadSource, feedback, language, addedBy, filename, ip, device, coldcall, notes, otp) VALUES ('$leadName', '$leadContact', '$leadEmail', '$project', '$project', '$leadStatus', '$leadSource', '$feedback', '$language', '$addedBy', '$filename', '$ip', '$device', '$coldcall', '$note', 'Not Verified')");

        if ($query) {
            // CALL GENERATE OTP API 
            $getOTP = 'https://staging.hikalcrm.com/api/otp';

            $otpData = array(
                'phone_number' => (string)$leadContact,
                'senderAddr' => "AD-HIKAL",
                'message' => "The OTP for verification is: "
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

                $_SESSION['otp'] = true;
            }
            else {
                $_SESSION['otp'] = false;
            }
            curl_close($getch);

            if ($note == "Live Video Call Meeting") {
                if ($language == "Arabic") {
                    header("Location: ../consultation/ar/waiting");
                }
                else {
                    header("Location: ../consultation/en/waiting");
                }
                exit();
            }
            else {
                $_SESSION['requireOTP'] = true;
                header("Location: ../verifyOTP");
                exit();
            }
        }
    }
    else {
        $query = "INSERT INTO leads (leadName, leadContact, leadEmail, project, projectName, leadStatus, leadSource, feedback, language, addedBy, filename, ip, device, coldcall, notes, otp) VALUES ('$leadName', '$leadContact', '$leadEmail', '$project', '$project', '$leadStatus', '$leadSource', '$feedback', '$language', '$addedBy', '$filename', '$ip', '$device', '$coldcall', '$note', 'No OTP Used')";
        $runquery = mysqli_query($con, $query);
        
        if ($runquery) {

            if ($note == "Live Video Call Meeting") {
                if ($language == "Arabic") {
                    header("Location: ../consultation/ar/waiting");
                }
                else {
                    header("Location: ../consultation/en/waiting");
                }
                exit();
            }
            else {
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
                exit();
            }
        }

    }
}

?>