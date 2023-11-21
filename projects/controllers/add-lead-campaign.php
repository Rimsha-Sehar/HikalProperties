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
        "event_tag" => "Live Consultation",
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

// if ($dupf['leadName'] == $leadName && $dupf['leadContact'] == $leadContact && $dupf['project'] == $project && $dupf['language'] == $language) {
    // Preventing duplicate form submission
    // header("Location: ../thankyou");
// }
// else {
    // SEND OTP 
    if ($note == "Live Video Call Meeting") {
        $query = mysqli_query($con, "INSERT INTO leads (leadName, leadContact, leadEmail, project, projectName, leadStatus, leadSource, feedback, language, addedBy, filename, ip, device, coldcall, notes, otp) VALUES ('$leadName', '$leadContact', '$leadEmail', '$project', '$project', '$leadStatus', '$leadSource', '$feedback', '$language', '$addedBy', '$filename', '$ip', '$device', '$coldcall', '$note', 'No OTP Used')");
        
        if ($query) {
            if ($language == "Arabic") {
                $_SESSION['triggerAction'] = true;
                header("Location: ../consultation/ar/waiting");
                // header("Location: ../consultation/ar/waiting/index.php");
            }
            else {
                $_SESSION['triggerAction'] = true;
                header("Location: ../consultation/en/waiting");
                // header("Location: ../consultation/en/waiting/index.php");
            }
            exit();
        }
    }
    else if ($note = "WhatsApp Consultation") {
        $query = mysqli_query($con, "INSERT INTO leads (leadName, leadContact, leadEmail, project, projectName, leadStatus, leadSource, feedback, language, addedBy, filename, ip, device, coldcall, notes, otp) VALUES ('$leadName', '$leadContact', '$leadEmail', '$project', '$project', '$leadStatus', '$leadSource', '$feedback', '$language', '$addedBy', '$filename', '$ip', '$device', '$coldcall', '$note', 'No OTP Used')");
        
        if ($query) {
            header("Location: https://wa.me/971585556605");
            exit();
        }
    } 
    else {
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

                $_SESSION['requireOTP'] = true;
                header("Location: ../verifyOTP");
                exit();
            }
        }
        else {
            $query = mysqli_query($con, "INSERT INTO leads (leadName, leadContact, leadEmail, project, projectName, leadStatus, leadSource, feedback, language, addedBy, filename, ip, device, coldcall, notes, otp) VALUES ('$leadName', '$leadContact', '$leadEmail', '$project', '$project', '$leadStatus', '$leadSource', '$feedback', '$language', '$addedBy', '$filename', '$ip', '$device', '$coldcall', '$note', 'No OTP Used')");
        
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




    // if (substr($leadContact, 0, 4) === "+971") {
    //     $query = mysqli_query($con, "INSERT INTO leads (leadName, leadContact, leadEmail, project, projectName, leadStatus, leadSource, feedback, language, addedBy, filename, ip, device, coldcall, notes, otp) VALUES ('$leadName', '$leadContact', '$leadEmail', '$project', '$project', '$leadStatus', '$leadSource', '$feedback', '$language', '$addedBy', '$filename', '$ip', '$device', '$coldcall', '$note', 'Not Verified')");

    //     if ($query) {
    //         CALL GENERATE OTP API 
    //         $getOTP = 'https://staging.hikalcrm.com/api/otp';

    //         $otpData = array(
    //             'phone_number' => (string)$leadContact,
    //             'senderAddr' => "AD-HIKAL",
    //             'message' => "The OTP for verification is: "
    //         );

    //         // Initialize cURL session
    //         $getch = curl_init($getOTP);

    //         // Set cURL options
    //         curl_setopt($getch, CURLOPT_POST, 1);
    //         curl_setopt($getch, CURLOPT_POSTFIELDS, $otpData);
    //         curl_setopt($getch, CURLOPT_RETURNTRANSFER, true);

    //         $response = curl_exec($getch);

    //         $responseData = json_decode($response, true);

    //         if (isset($responseData['message'])) {
    //             $message = $responseData['message'];

    //             $_SESSION['otp'] = true;
    //         }
    //         else {
    //             $_SESSION['otp'] = false;
    //         }
    //         curl_close($getch);

    //         if ($note == "Live Video Call Meeting") {
    //             if ($language == "Arabic") {
    //                 header("Location: ../consultation/ar/waiting");
    //             }
    //             else {
    //                 header("Location: ../consultation/en/waiting");
    //             }
    //             exit();
    //         }
    //         else {
    //             // $_SESSION['requireOTP'] = true;
    //             // header("Location: ../verifyOTP");
    //             if ($language == "English") {
    //                 header("Location: ../thankyou/en");
    //             }
    //             elseif ($language == "Arabic") {
    //                 header("Location: ../thankyou/ar");
    //             }
    //             elseif ($language == "French") {
    //                 header("Location: ../thankyou/fr");
    //             }
    //             elseif ($language == "Hebrew") {
    //                 header("Location: ../thankyou/he");
    //             }
    //             elseif ($language == "Chinese") {
    //                 header("Location: ../thankyou/cn");
    //             }
    //             else {
    //                 header("Location: ../thankyou");
    //             }
    //             exit();
    //         }
    //     }
    // }
    // else {
    //     $query = "INSERT INTO leads (leadName, leadContact, leadEmail, project, projectName, leadStatus, leadSource, feedback, language, addedBy, filename, ip, device, coldcall, notes, otp) VALUES ('$leadName', '$leadContact', '$leadEmail', '$project', '$project', '$leadStatus', '$leadSource', '$feedback', '$language', '$addedBy', '$filename', '$ip', '$device', '$coldcall', '$note', 'No OTP Used')";
    //     $runquery = mysqli_query($con, $query);
        
    //     if ($runquery) {
    //         if ($note == "Live Video Call Meeting") {
    //             if ($language == "Arabic") {
    //                 header("Location: ../consultation/ar/waiting");
    //             }
    //             else {
    //                 header("Location: ../consultation/en/waiting");
    //             }
    //             exit();
    //         }
    //         else {
    //             if ($language == "English") {
    //                 header("Location: ../thankyou/en");
    //             }
    //             elseif ($language == "Arabic") {
    //                 header("Location: ../thankyou/ar");
    //             }
    //             elseif ($language == "French") {
    //                 header("Location: ../thankyou/fr");
    //             }
    //             elseif ($language == "Hebrew") {
    //                 header("Location: ../thankyou/he");
    //             }
    //             elseif ($language == "Chinese") {
    //                 header("Location: ../thankyou/cn");
    //             }
    //             else {
    //                 header("Location: ../thankyou");
    //             }
    //             exit();
    //         }
    //     }
    // }
// }

?>