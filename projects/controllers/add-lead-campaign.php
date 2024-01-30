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
$otpText = "No OTP used";

// APIS 
$api_snapchat = "https://staging.hikalcrm.com/api/validate-snap";
$api_sendEmail = "https://staging.hikalcrm.com/api/newEmail";
$api_addLead = "https://staging.hikalcrm.com/api/create-lead";
$api_sendOtp = "https://staging.hikalcrm.com/api/otp";

// RETRIEVE FORM DATA
$leadSource = $_POST['LeadSource'];
$filename = $_POST['Filename'];
$country = $_POST['Country'];

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

    $api_snapchat = 'https://staging.hikalcrm.com/api/validate-snap';

    $data = array(
        "pixel_id" => "4992376c-fb59-4050-8c91-bdb468b086d4",
            "timestamp" => (string)$cur_time,
    "client_dedup_id" => (string) round((time() * 1000) * (rand() / getrandmax())),
        "event_type" => "SIGN_UP",
        "event_conversion_type" => "WEB",
        "event_tag" => "Live Consultation",
        "page_url" => (string)$page_url, 
        "hashed_email" => (string)$hashed_email,
        "hashed_phone_number" => (string)$hashed_phone,
        "user_agent" => (string)$device,
        "hashed_ip_address" => (string)$hashed_ip 
    );
    // print_r($data);

    $token = "eyJhbGciOiJIUzI1NiIsImtpZCI6IkNhbnZhc1MyU0hNQUNQcm9kIiwidHlwIjoiSldUIn0.eyJhdWQiOiJjYW52YXMtY2FudmFzYXBpIiwiaXNzIjoiY2FudmFzLXMyc3Rva2VuIiwibmJmIjoxNjk4MTYxMzEwLCJzdWIiOiJkNzUxOGRkOS02YWM0LTQ0YjUtYmY5Ni0xY2JmNWUwZDBmOTR-UFJPRFVDVElPTn5lZjAwYzBiYS03NmQ5LTQwYmUtYmYxNi05NjExZGY5YzM5OWIifQ.bA8_O0hp4eIrg83dCkrKaNm8CZjmPK-E1KzFLmJUBbY";

    $ch = curl_init($api_snapchat);

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

if ($_POST['Consultation'] == "Register for later") {
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

// EMAIL DATA
$send_to = "leads@hikalagency.ae";
$notification = "common";
$title = "Live Call New Lead Alert | Hikal CRM";
$emailBody = "<h1>Live Call Alert</h1><p>Lead Name: $leadName</p><p>Contact Number: $leadContact</p><p>Email address: $leadEmail</p><p>Language: $language</p><br /><p>Consultation: $note</p><br /><p>Source: $leadSource</p><p>IP Address: $ip</p><p>Devie: $device</p>";
$style = "span{font-weight: bold; color: #1245A8;}";

// SEND EMAIL 
$emailData = array(
    "email" => $send_to, 
    "notification" => $notification,
    "title" => $title,  
    "message" => $emailBody,
    "style" => $style,
);
$emailDataJson = json_encode($emailData);
$sech = curl_init($api_sendEmail);
curl_setopt($sech, CURLOPT_RETURNTRANSFER, true);
curl_setopt($sech, CURLOPT_POST, true);
curl_setopt($sech, CURLOPT_POSTFIELDS, $emailDataJson);
curl_setopt($sech, CURLOPT_HTTPHEADER, array("Content-Type: application/json"));
$emailResponse = curl_exec($sech);
curl_close($sech);
// SEND EMAIL END 

if ($dupf['leadName'] == $leadName && $dupf['leadContact'] == $leadContact && $dupf['language'] == $language) {
    header("Location: ../thankyou");
}
else {
    // LIVE CALL CONSULTATION 
    if ($note == "Live Video Call Meeting") {
        // ADD NEW LEAD 
        $leadData = array(
            "leadName" => (string)$leadName, 
            "leadContact" => (string)$leadContact, 
            "leadEmail" => (string)$leadEmail, 
            "leadStatus" => (string)$leadStatus, 
            "leadSource" => (string)$leadSource, 
            "feedback" => (string)$feedback, 
            "language" => (string)$language, 
            "country" => (string)$country,
            "addedBy" => $addedBy, 
            "filename" => (string)$filename, 
            "ip" => (string)$ip, 
            "device" => (string)$device, 
            "otp" => (string)$otpText, 
            "notes" => (string)$note,
            "coldcall" => $coldcall
        );

        $leadDataJson = json_encode($leadData);
        $clch = curl_init($api_addLead);
        curl_setopt($clch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($clch, CURLOPT_POST, true);
        curl_setopt($clch, CURLOPT_POSTFIELDS, $leadDataJson);
        curl_setopt($clch, CURLOPT_HTTPHEADER, array("Content-Type: application/json"));
        $leadResponse = curl_exec($clch);
        $leadResponseData = json_decode($leadResponse, true);
        if (isset($leadResponseData['status']) && $leadResponseData['status'] === true) {
            $lead_id = $leadResponseData['lead']['id'];
            $_SESSION['lead_id'] = $lead_id;
            curl_close($clch);

            if ($language == "Arabic") {
                $_SESSION['triggerAction'] = true;
                header("Location: ../consultation/ar/waiting");
                // header("Location: ../consultation/ar/waiting/index.php");

                // SEND SMS NOTIFICATION 
                $otpData = array(
                    'phone_number' => "+971585556605",
                    'senderAddr' => "AD-HIKAL",
                    'message' => "Live Call Lead Alert! Name: $leadName, Language: $language",
                    'type' => "sms"
                );

                $soch = curl_init($api_sendOtp);
                curl_setopt($soch, CURLOPT_POST, 1);
                curl_setopt($soch, CURLOPT_POSTFIELDS, $otpData);
                curl_setopt($soch, CURLOPT_RETURNTRANSFER, true);
                $otpResponse = curl_exec($soch);
                $otpResponseData = json_decode($otpResponse, true);

                if (isset($otpResponseData['message'])) {
                    $message = $otpResponseData['message'];
                    echo json_encode(['otp' => true]);
                    exit();
                }
                // SEND SMS NOTIFICATION END 
            }
            else {
                $_SESSION['triggerAction'] = true;
                header("Location: ../consultation/en/waiting");
                // header("Location: ../consultation/en/waiting/index.php");

                // SEND SMS NOTIFICATION 
                $otpData = array(
                    'phone_number' => "+971585556605",
                    'senderAddr' => "AD-HIKAL",
                    'message' => "Live Call Lead Alert! Name: $leadName, Language: $language",
                    'type' => "sms"
                );

                $soch = curl_init($api_sendOtp);
                curl_setopt($soch, CURLOPT_POST, 1);
                curl_setopt($soch, CURLOPT_POSTFIELDS, $otpData);
                curl_setopt($soch, CURLOPT_RETURNTRANSFER, true);
                $otpResponse = curl_exec($soch);
                $otpResponseData = json_decode($otpResponse, true);

                if (isset($otpResponseData['message'])) {
                    $message = $otpResponseData['message'];
                    echo json_encode(['otp' => true]);
                    exit();
                }
                // SEND SMS NOTIFICATION END 
            }
            exit();
        }
        // ADD NEW LEAD END 
        else {
            $query = mysqli_query($con, "INSERT INTO leads (leadName, leadContact, leadEmail, leadStatus, leadSource, feedback, language, addedBy, filename, ip, device, coldcall, notes, otp, country) VALUES ('$leadName', '$leadContact', '$leadEmail','$leadStatus', '$leadSource', '$feedback', '$language', '$addedBy', '$filename', '$ip', '$device', '$coldcall', '$note', '$otpText', '$country')");
        
            if ($query) {
                if ($language == "Arabic") {
                    $_SESSION['triggerAction'] = true;
                    header("Location: ../consultation/ar/waiting");
                    // header("Location: ../consultation/ar/waiting/index.php");

                    // SEND SMS NOTIFICATION 
                    $otpData = array(
                        'phone_number' => "+971585556605",
                        'senderAddr' => "AD-HIKAL",
                        'message' => "Live Call Lead Alert! Name: $leadName, Language: $language",
                        'type' => "sms"
                    );

                    $soch = curl_init($api_sendOtp);
                    curl_setopt($soch, CURLOPT_POST, 1);
                    curl_setopt($soch, CURLOPT_POSTFIELDS, $otpData);
                    curl_setopt($soch, CURLOPT_RETURNTRANSFER, true);
                    $otpResponse = curl_exec($soch);
                    $otpResponseData = json_decode($otpResponse, true);

                    if (isset($otpResponseData['message'])) {
                        $message = $otpResponseData['message'];
                        echo json_encode(['otp' => true]);
                        exit();
                    }
                    // SEND SMS NOTIFICATION END 
                }
                else {
                    $_SESSION['triggerAction'] = true;
                    header("Location: ../consultation/en/waiting");
                    // header("Location: ../consultation/en/waiting/index.php");

                    // SEND SMS NOTIFICATION 
                    $otpData = array(
                        'phone_number' => "+971585556605",
                        'senderAddr' => "AD-HIKAL",
                        'message' => "Live Call Lead Alert! Name: $leadName, Language: $language",
                        'type' => "sms"
                    );

                    $soch = curl_init($api_sendOtp);
                    curl_setopt($soch, CURLOPT_POST, 1);
                    curl_setopt($soch, CURLOPT_POSTFIELDS, $otpData);
                    curl_setopt($soch, CURLOPT_RETURNTRANSFER, true);
                    $otpResponse = curl_exec($soch);
                    $otpResponseData = json_decode($otpResponse, true);

                    if (isset($otpResponseData['message'])) {
                        $message = $otpResponseData['message'];
                        echo json_encode(['otp' => true]);
                        exit();
                    }
                    // SEND SMS NOTIFICATION END 
                }
                exit();
            }
        }
    }
    // WHATSAPP CONSULTATION 
    elseif ($note == "WhatsApp Consultation") {
        // ADD NEW LEAD 
        $leadData = array(
            "leadName" => (string)$leadName, 
            "leadContact" => (string)$leadContact, 
            "leadEmail" => (string)$leadEmail, 
            "leadStatus" => (string)$leadStatus, 
            "leadSource" => (string)$leadSource, 
            "feedback" => (string)$feedback, 
            "language" => (string)$language, 
            "country" => (string)$country,
            "addedBy" => $addedBy, 
            "filename" => (string)$filename, 
            "ip" => (string)$ip, 
            "device" => (string)$device, 
            "otp" => (string)$otpText, 
            "notes" => (string)$note,
            "coldcall" => $coldcall
        );

        $leadDataJson = json_encode($leadData);
        $clch = curl_init($api_addLead);
        curl_setopt($clch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($clch, CURLOPT_POST, true);
        curl_setopt($clch, CURLOPT_POSTFIELDS, $leadDataJson);
        curl_setopt($clch, CURLOPT_HTTPHEADER, array("Content-Type: application/json"));
        $leadResponse = curl_exec($clch);
        $leadResponseData = json_decode($leadResponse, true);
        if (isset($leadResponseData['status']) && $leadResponseData['status'] === true) {
            $lead_id = $leadResponseData['lead']['id'];
            $_SESSION['lead_id'] = $lead_id;
            curl_close($clch);
            
            header("Location: https://wa.me/971585556605");
            exit();
        }
        // ADD NEW LEAD END 
        else {
            $query = mysqli_query($con, "INSERT INTO leads (leadName, leadContact, leadEmail, leadStatus, leadSource, feedback, language, addedBy, filename, ip, device, coldcall, notes, otp, country) VALUES ('$leadName', '$leadContact', '$leadEmail', '$leadStatus', '$leadSource', '$feedback', '$language', '$addedBy', '$filename', '$ip', '$device', '$coldcall', '$note', '$otpText', '$country')");
        
            if ($query) {
                header("Location: https://wa.me/971585556605");
                exit();
            }
        }
    } 
    // REGISTER FOR LATER 
    else {
        if (substr($leadContact, 0, 4) === "+971") {
            $otpText = "Not Verified";

            // ADD NEW LEAD 
            $leadData = array(
                "leadName" => (string)$leadName, 
                "leadContact" => (string)$leadContact, 
                "leadEmail" => (string)$leadEmail, 
                "leadStatus" => (string)$leadStatus, 
                "leadSource" => (string)$leadSource, 
                "feedback" => (string)$feedback, 
                "language" => (string)$language, 
                "country" => (string)$country,
                "addedBy" => $addedBy, 
                "filename" => (string)$filename, 
                "ip" => (string)$ip, 
                "device" => (string)$device, 
                "otp" => (string)$otpText, 
                "notes" => (string)$note,
                "coldcall" => $coldcall
            );

            $leadDataJson = json_encode($leadData);
            $clch = curl_init($api_addLead);
            curl_setopt($clch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($clch, CURLOPT_POST, true);
            curl_setopt($clch, CURLOPT_POSTFIELDS, $leadDataJson);
            curl_setopt($clch, CURLOPT_HTTPHEADER, array("Content-Type: application/json"));
            $leadResponse = curl_exec($clch);
            $leadResponseData = json_decode($leadResponse, true);
            if (isset($leadResponseData['status']) && $leadResponseData['status'] === true) {
                $lead_id = $leadResponseData['lead']['id'];
                $_SESSION['lead_id'] = $lead_id;
                curl_close($clch);
                // ADD NEW LEAD END 

                // SEND OTP
                $otpData = array(
                    'phone_number' => (string)$leadContact,
                    'senderAddr' => "AD-HIKAL",
                    'message' => "The OTP for verification is: "
                );
                $getch = curl_init($api_sendOtp);
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

                $_SESSION['requireOTP'] = true;
                header("Location: ../verifyOTP");
                exit();
                // SEND OTP END 
            }
            else {
                $query = mysqli_query($con, "INSERT INTO leads (leadName, leadContact, leadEmail, leadStatus, leadSource, feedback, language, addedBy, filename, ip, device, coldcall, notes, otp, country) VALUES ('$leadName', '$leadContact', '$leadEmail', '$leadStatus', '$leadSource', '$feedback', '$language', '$addedBy', '$filename', '$ip', '$device', '$coldcall', '$note', '$otpText', '$country')");

                if ($query) {
                    // SEND OTP
                    $otpData = array(
                        'phone_number' => (string)$leadContact,
                        'senderAddr' => "AD-HIKAL",
                        'message' => "The OTP for verification is: "
                    );

                    // Initialize cURL session
                    $getch = curl_init($api_sendOtp);

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

                    $_SESSION['requireOTP'] = true;
                    header("Location: ../verifyOTP");
                    exit();
                }
            }
        }
        else {
            // ADD NEW LEAD 
            $leadData = array(
                "leadName" => (string)$leadName, 
                "leadContact" => (string)$leadContact, 
                "leadEmail" => (string)$leadEmail, 
                "leadStatus" => (string)$leadStatus, 
                "leadSource" => (string)$leadSource, 
                "feedback" => (string)$feedback, 
                "language" => (string)$language, 
                "country" => (string)$country,
                "addedBy" => $addedBy, 
                "filename" => (string)$filename, 
                "ip" => (string)$ip, 
                "device" => (string)$device, 
                "otp" => (string)$otpText, 
                "notes" => (string)$note,
                "coldcall" => $coldcall
            );

            $leadDataJson = json_encode($leadData);
            $clch = curl_init($api_addLead);
            curl_setopt($clch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($clch, CURLOPT_POST, true);
            curl_setopt($clch, CURLOPT_POSTFIELDS, $leadDataJson);
            curl_setopt($clch, CURLOPT_HTTPHEADER, array("Content-Type: application/json"));
            $leadResponse = curl_exec($clch);
            $leadResponseData = json_decode($leadResponse, true);
            if (isset($leadResponseData['status']) && $leadResponseData['status'] === true) {
                $lead_id = $leadResponseData['lead']['id'];
                $_SESSION['lead_id'] = $lead_id;
                curl_close($clch);
                // ADD NEW LEAD END 

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
            else {
                $query = mysqli_query($con, "INSERT INTO leads (leadName, leadContact, leadEmail, leadStatus, leadSource, feedback, language, addedBy, filename, ip, device, coldcall, notes, otp, country) VALUES ('$leadName', '$leadContact', '$leadEmail', '$leadStatus', '$leadSource', '$feedback', '$language', '$addedBy', '$filename', '$ip', '$device', '$coldcall', '$note', '$otpText', '$country')");
        
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
                    exit();
                }
            }
        }
    }
}
?>