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

// SNAP PIXEL 
if ($leadSource == "Campaign Snapchat") {
    $hashed_ip = hash('sha256', $ip);
    $hashed_email = hash('sha256', $leadEmail);
    $hashed_phone = hash('sha256', $leadContact);

    date_default_timezone_set('Asia/Dubai');
    $cur_time = time();

    $_SESSION['leadSource'] = $leadSource;
    $_SESSION['fileName'] = $filename;
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
        "page_url" => (string)$filename, 
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


if (isset($_SESSION['form_submitted'])) {
    // Redirect or display an error message to the user
    // Preventing duplicate form submission
    header("Location: ../thankyou");
}

// Check if name and contact fields are empty
if (empty($leadName) || empty($leadContact)) {
    $error = "Please enter name and contact to register!";
} 
else {
    $_SESSION['form_submitted'] = true;

    $dupq = mysqli_query($con, "SELECT leadName, leadContact, project, language FROM leads ORDER BY id DESC LIMIT 1");
    $dupf = mysqli_fetch_array($dupq);
    if ($dupf['leadName'] == $leadName && $dupf['leadContact'] == $leadContact && $dupf['project'] == $project && $dupf['language'] == $language) {
        // Preventing duplicate form submission
        header("Location: ../thankyou");
    }
    else {
        $query = mysqli_query($con, "INSERT INTO leads (leadName, leadContact, leadEmail, enquiryType, leadFor, leadType, project, projectName, leadStatus, leadSource, feedback, language, addedBy, filename, ip, device, otp, country) VALUES ('$leadName', '$leadContact', '$leadEmail', '$enquiryType','$leadFor', '$leadType', '$project', '$project', '$leadStatus', '$leadSource', '$feedback', '$language', '$addedBy', '$filename', '$ip', '$device', 'No OTP Used', '$country')");

        if ($query) {
            // Clear the session variable after successful form submission
            $_SESSION['form_submitted'] = false;

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
                header("Location: thankyou.php");
            }
            exit("here");
        }
    }
}

?>