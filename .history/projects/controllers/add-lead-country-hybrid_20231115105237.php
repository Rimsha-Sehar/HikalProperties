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
$project = $_GET['Project'];
$leadType = $_GET['LeadType'];
$language = $_GET['Language'];
$leadSource = $_GET['LeadSource'];
$filename = $_GET['Filename'];
$country = $_GET['Country'];

if (isset($_GET['phone']['main']) && !empty($_GET['phone']['main'])) {
    $leadContact = $_GET['phone']['main'];
}
elseif (isset($_GET['phone']['full']) && !empty($_GET['phone']['full'])) {
    $leadContact = $_GET['phone']['full'];
}

if (isset($_GET['leadContact'])) {
    $leadContact = $_GET['leadContact'];
}

$leadEmail = $_GET['LeadEmail1'];
$leadName = $_GET['LeadName1'];
$enquiryType = $_GET['EnquiryRadio1'];
$leadFor = $_GET['LeadForRadio1'];

// $extra = $_GET['PoolRadio1'];
// $enquiryType = $enquiryType . " " . $extra;

// SNAP PIXEL 
if ($leadSource == "Campaign Snapchat") {
    $phone = preg_replace('/[^0-9]/', '', $leadContact);
    $page_url = $_SESSION["page_url"];

    $hashed_ip = hash('sha256', $ip);
    $hashed_email = hash('sha256', $leadEmail);
    $hashed_phone = hash('sha256', $phone);

    date_default_timezone_set('Asia/Dubai');
    $cur_time = time();

    $_SESSION['leadSource'] = $leadSource;
    $_SESSION['fileName'] = $page_url;
    $_SESSION['hashed_email'] = $hashed_email;
    $_SESSION['hashed_phone_number'] = $hashed_phone;
    $_SESSION['hashed_ip'] = $hashed_ip;
    $_SESSION['user_agent'] = $device;

    $url = 'https://staging.hikalcrm.com/api/validate-snap';

    $data = array(
        "pixel_id" => "4992376c-fb59-4050-8c91-bdb468b086d4",
        "timestamp" => (string)$cur_time,
        "event_type" => "SIGN_UP",
        "event_conversion_type" => "WEB",
        "event_tag" => "Hikal Properties",
        "page_url" => (string)$page_url, 
        "hashed_email" => (string)$hashed_email,
        "hashed_phone_number" => (string)$hashed_phone,
        "user_agent" => (string)$device,
        "hashed_ip_address" => (string)$hashed_ip 
    );
    // print_r($data);

    $token = "eyJhbGciOiJIUzI1NiIsImtpZCI6IkNhbnZhc1MyU0hNQUNQcm9kIiwidHlwIjoiSldUIn0.eyJhdWQiOiJjYW52YXMtY2FudmFzYXBpIiwiaXNzIjoiY2FudmFzLXMyc3Rva2VuIiwibmJmIjoxNjk4MTYxMzEwLCJzdWIiOiJkNzUxOGRkOS02YWM0LTQ0YjUtYmY5Ni0xY2JmNWUwZDBmOTR-UFJPRFVDVElPTn5lZjAwYzBiYS03NmQ5LTQwYmUtYmYxNi05NjExZGY5YzM5OWIifQ.bA8_O0hp4eIrg83dCkrKaNm8CZjmPK-E1KzFLmJUBbY";

    $ch = curl_init($url);

    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_HTTPHEADER, array(
        'Content-Type: application/json',
        'Authorization: Bearer ' . $token
    ));

    $response = curl_exec($ch);

    if(curl_errno($ch)){
        // echo 'Error: ' . curl_error($ch);
    }

    curl_close($ch);
}
// SNAP PIXEL END


// if (isset($_SESSION['form_submitted']) && ($_SESSION['form_submitted'] == true)) {
//     header("Location: ../thankyou");
// }

// Check if name and contact fields are empty
if (empty($leadName) || empty($leadContact)) {
    $error = "Please enter name and contact to register!";
} 
else {
    // $_SESSION['form_submitted'] = true;

    $dupq = mysqli_query($con, "SELECT leadName, leadContact, project, language FROM leads ORDER BY id DESC LIMIT 1");
    $dupf = mysqli_fetch_array($dupq);
    if ($dupf['leadName'] == $leadName && $dupf['leadContact'] == $leadContact && $dupf['project'] == $project && $dupf['language'] == $language) {
        // Preventing duplicate form submission
        header("Location: ../thankyou");
    }
    else {
        if (substr($leadContact, 0, 4) === "+971") {
            // if (strpos($leadContact, '+971') === 0)

            $query = mysqli_query($con, "INSERT INTO leads (leadName, leadContact, leadEmail, enquiryType, leadFor, leadType, project, projectName, leadStatus, leadSource, feedback, language, addedBy, filename, ip, device, otp, country) VALUES ('$leadName', '$leadContact', '$leadEmail', '$enquiryType','$leadFor', '$leadType', '$project', '$project', '$leadStatus', '$leadSource', '$feedback', '$language', '$addedBy', '$filename', '$ip', '$device', 'Not Verified', '$country')");

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

            // if (curl_errno($getch)) {
            //     echo json_encode(['success' => false, 'message' => 'Failed to send OTP']);
            // }
            // else {
                $_SESSION['otp'] = true;
                echo json_encode(['otp' => true]);
            // }
            curl_close($getch);
            exit();
        }
        else {
            $_SESSION['otp'] = false;

            $query = mysqli_query($con, "INSERT INTO leads (leadName, leadContact, leadEmail, enquiryType, leadFor, leadType, project, projectName, leadStatus, leadSource, feedback, language, addedBy, filename, ip, device, otp, country) VALUES ('$leadName', '$leadContact', '$leadEmail', '$enquiryType','$leadFor', '$leadType', '$project', '$project', '$leadStatus', '$leadSource', '$feedback', '$language', '$addedBy', '$filename', '$ip', '$device', 'No OTP Used', '$country')");

            if ($query) {
                // $_SESSION['form_submitted'] = false;

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
    }
}

?>