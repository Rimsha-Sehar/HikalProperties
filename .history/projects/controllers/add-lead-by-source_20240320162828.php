<?php
session_start();

include ('../dbconfig/dbhybrid.php');

// IP AND DEVICE
$ip = $_SERVER['REMOTE_ADDR'];
$device = $_SERVER['HTTP_USER_AGENT'];

// SOURCE
if ($$_SESSION["params"]) {
    $params = $_SESSION["params"];
    if (strpos($params, "gclid") === 0) {
        $leadSource = "GoogleAds";
    } elseif (strpos($params, "ttclid") === 0) {
        $leadSource = "TikTok";
    } elseif (strpos($params, "ScCid") === 0) {
        $leadSource = "Snapchat";
    } elseif (strpos($params, "fbclid") === 0) {
        $leadSource = "Facebook";
    } elseif (strpos($params, "twclid") === 0) {
        $leadSource = "Twitter";
    } else {
        $leadSource = "Website";
    }
}
if ($_GET['LeadSource']) {
    $leadSource = $_GET['LeadSource'];
}

// DEFAULT DATA FIELD
$leadStatus = "New";
$feedback = "New";
$addedBy = "101";
$otpText = "No OTP used";

// APIS
$api_snapchat = "https://staging.hikalcrm.com/api/validate-snap";
$api_sendEmail = "https://staging.hikalcrm.com/api/newEmail";
$api_addLead = "https://staging.hikalcrm.com/api/create-lead";
$api_sendOtp = "https://staging.hikalcrm.com/api/otp";

// RETRIEVE FORM DATA
$project = $_GET['Project'];
$leadType = $_GET['LeadType'];
$language = $_GET['Language'];
$filename = $_GET['Filename'];

$callTime = "";
$country = "";
$leadEmail = "";


if (isset ($_GET['phone']['main']) && !empty ($_GET['phone']['main'])) {
    $leadContact = $_GET['phone']['main'];
} elseif (isset ($_GET['phone']['full']) && !empty ($_GET['phone']['full'])) {
    $leadContact = $_GET['phone']['full'];
}

if (isset ($_GET['leadContact'])) {
    $leadContact = $_GET['leadContact'];
}
if (isset ($_GET['time'])) {
    $callTime = $_GET['time'];
}
if (isset ($_GET['AttendanceNote'])) {
    $callTime = "Event Day: " . $_GET['AttendanceNote'];
}
if (isset ($_GET['LeadEmail1'])) {
    $leadEmail = $_GET['LeadEmail1'];
}
if (isset ($_GET['Country'])) {
    $country = $_GET['Country'];
}

// USER DATA
$leadName = $_GET['LeadName1'];
$leadFor = $_GET['LeadForRadio1'];
$enquiryType = $_GET['EnquiryRadio1'];
if (isset ($_GET['EnquiryType']) && $_GET['EnquiryType'] !== "") {
    $enquiryType = $_GET['EnquiryType'];
}

// SNAP PIXEL
// if ($leadSource == "Campaign Snapchat") {
//     $phone = preg_replace('/[^0-9]/', '', $leadContact);
//     $page_url = $_SESSION["page_url"];

//     $hashed_ip = hash('sha256', $ip);
//     $hashed_email = hash('sha256', $leadEmail);
//     $hashed_phone = hash('sha256', $phone);

//     date_default_timezone_set('Asia/Dubai');
//     $cur_time = time();

//     $_SESSION['leadSource'] = $leadSource;
//     $_SESSION['fileName'] = $page_url;
//     $_SESSION['hashed_email'] = $hashed_email;
//     $_SESSION['hashed_phone_number'] = $hashed_phone;
//     $_SESSION['hashed_ip'] = $hashed_ip;
//     $_SESSION['user_agent'] = $device;

//     $data = array(
//         "pixel_id" => "4992376c-fb59-4050-8c91-bdb468b086d4",
//             "timestamp" => (string)$cur_time,
//     "client_dedup_id" => (string) round((time() * 1000) * (rand() / getrandmax())),
//         "event_type" => "SIGN_UP",
//         "event_conversion_type" => "WEB",
//         "event_tag" => "Hikal Properties",
//         "page_url" => (string)$page_url,
//         "hashed_email" => (string)$hashed_email,
//         "hashed_phone_number" => (string)$hashed_phone,
//         "user_agent" => (string)$device,
//         "hashed_ip_address" => (string)$hashed_ip
//     );
//     // print_r($data);

//     $token = "eyJhbGciOiJIUzI1NiIsImtpZCI6IkNhbnZhc1MyU0hNQUNQcm9kIiwidHlwIjoiSldUIn0.eyJhdWQiOiJjYW52YXMtY2FudmFzYXBpIiwiaXNzIjoiY2FudmFzLXMyc3Rva2VuIiwibmJmIjoxNjk4MTYxMzEwLCJzdWIiOiJkNzUxOGRkOS02YWM0LTQ0YjUtYmY5Ni0xY2JmNWUwZDBmOTR-UFJPRFVDVElPTn5lZjAwYzBiYS03NmQ5LTQwYmUtYmYxNi05NjExZGY5YzM5OWIifQ.bA8_O0hp4eIrg83dCkrKaNm8CZjmPK-E1KzFLmJUBbY";

//     $ch = curl_init($api_snapchat);

//     curl_setopt($ch, CURLOPT_POST, true);
//     curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
//     curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
//     curl_setopt($ch, CURLOPT_HTTPHEADER, array(
//         'Content-Type: application/json',
//         'Authorization: Bearer ' . $token
//     ));

//     $response = curl_exec($ch);

//     if(curl_errno($ch)){
//         // echo 'Error: ' . curl_error($ch);
//     }

//     curl_close($ch);
// }
// SNAP PIXEL END

// Check if name and contact fields are empty
if (empty ($leadName) || empty ($leadContact)) {
    $error = "Please enter name and contact to register!";
} else {
    $dupq = mysqli_query($con, "SELECT leadName, leadContact, project, language FROM leads ORDER BY id DESC LIMIT 1");
    $dupf = mysqli_fetch_array($dupq);

    // EMAIL DATA
    $send_to = "leads@hikalagency.ae";
    $notification = "common";
    $title = "New Lead Alert | Hikal CRM";
    $emailBody = "<p>Lead Name: $leadName</p><p>Contact Number: $leadContact</p><p>Email address: $leadEmail</p><p>Language: $language</p><br /><p>Project Name: $project</p><p>Enquiry for: $enquiryType</p><p>Purpose of enquiry: $leadFor</p><p>Call Time: $callTime</p><br /><p>Source: $leadSource</p><p>IP Address: $ip</p><p>Devie: $device</p>";
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

    if ($dupf['leadName'] == $leadName && $dupf['leadContact'] == $leadContact && $dupf['project'] == $project && $dupf['language'] == $language) {
        header("Location: ../thankyou");
    } else {
        // UAE NUMBER
        if (substr($leadContact, 0, 4) === "+971") {
            $otpText = "Not Verified";

            // ADD NEW LEAD
            $leadData = array(
                "leadName" => (string) $leadName,
                "leadContact" => (string) $leadContact,
                "leadEmail" => (string) $leadEmail,
                "enquiryType" => (string) $enquiryType,
                "leadFor" => (string) $leadFor,
                "leadType" => (string) $leadType,
                "project" => (string) $project,
                "projectName" => (string) $project,
                "leadStatus" => (string) $leadStatus,
                "leadSource" => (string) $leadSource,
                "feedback" => (string) $feedback,
                "language" => (string) $language,
                "addedBy" => $addedBy,
                "filename" => (string) $filename,
                "ip" => (string) $ip,
                "device" => (string) $device,
                "otp" => (string) $otpText,
                "country" => (string) $country,
                "notes" => (string) $callTime
            );

            $leadDataJson = json_encode($leadData);
            $clch = curl_init($api_addLead);
            curl_setopt($clch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($clch, CURLOPT_POST, true);
            curl_setopt($clch, CURLOPT_POSTFIELDS, $leadDataJson);
            curl_setopt($clch, CURLOPT_HTTPHEADER, array("Content-Type: application/json"));
            $leadResponse = curl_exec($clch);
            $leadResponseData = json_decode($leadResponse, true);

            if (isset ($leadResponseData['status']) && $leadResponseData['status'] === true) {
                $lead_id = $leadResponseData['lead']['id'];
                $_SESSION['lead_id'] = $lead_id;

                curl_close($clch);
                // ADD NEW LEAD END

                // SEND OTP
                // $otpData = array(
                //     'phone_number' => (string)$leadContact,
                //     'senderAddr' => "AD-HIKAL",
                //     'message' => "The OTP for verification is: "
                // );

                // $soch = curl_init($api_sendOtp);
                // curl_setopt($soch, CURLOPT_POST, 1);
                // curl_setopt($soch, CURLOPT_POSTFIELDS, $otpData);
                // curl_setopt($soch, CURLOPT_RETURNTRANSFER, true);
                // $otpResponse = curl_exec($soch);
                // $otpResponseData = json_decode($otpResponse, true);

                // if (isset($otpResponseData['message'])) {
                //     $message = $otpResponseData['message'];
                //     echo json_encode(['otp' => true]);
                // }
                // // SEND OTP END

                // else {
                if ($language == "English") {
                    $redirectUrl = "https://hikalproperties.com/projects/thankyou/en";
                } elseif ($language == "Arabic") {
                    $redirectUrl = "https://hikalproperties.com/projects/thankyou/ar";
                } elseif ($language == "French") {
                    $redirectUrl = "https://hikalproperties.com/projects/thankyou/fr";
                } elseif ($language == "Hebrew") {
                    $redirectUrl = "https://hikalproperties.com/projects/thankyou/he";
                } elseif ($language == "Chinese") {
                    $redirectUrl = "https://hikalproperties.com/projects/thankyou/cn";
                } else {
                    $redirectUrl = "https://hikalproperties.com/projects/thankyou";
                }
                echo json_encode(['thankyou' => true, 'redirectUrl' => $redirectUrl]);
                // }
            } else {
                $query = mysqli_query($con, "INSERT INTO leads (leadName, notes, leadContact, leadEmail, enquiryType, leadFor, leadType, project, projectName, leadStatus, leadSource, feedback, language, addedBy, filename, ip, device, otp, country) VALUES ('$leadName', '$callTime', '$leadContact', '$leadEmail', '$enquiryType','$leadFor', '$leadType', '$project', '$project', '$leadStatus', '$leadSource', '$feedback', '$language', '$addedBy', '$filename', '$ip', '$device', 'Not Verified', '$country')");
                if ($query) {
                    // SEND OTP
                    // $otpData = array(
                    //     'phone_number' => (string)$leadContact,
                    //     'senderAddr' => "AD-HIKAL",
                    //     'message' => "The OTP for verification is: "
                    // );

                    // $soch = curl_init($api_sendOtp);
                    // curl_setopt($soch, CURLOPT_POST, 1);
                    // curl_setopt($soch, CURLOPT_POSTFIELDS, $otpData);
                    // curl_setopt($soch, CURLOPT_RETURNTRANSFER, true);
                    // $otpResponse = curl_exec($soch);
                    // $otpResponseData = json_decode($otpResponse, true);

                    // if (isset($otpResponseData['message'])) {
                    //     $message = $otpResponseData['message'];
                    //     echo json_encode(['otp' => true]);
                    //     exit();
                    // }
                    // // SEND OTP END

                    // else {
                    if ($language == "English") {
                        $redirectUrl = "https://hikalproperties.com/projects/thankyou/en";
                    } elseif ($language == "Arabic") {
                        $redirectUrl = "https://hikalproperties.com/projects/thankyou/ar";
                    } elseif ($language == "French") {
                        $redirectUrl = "https://hikalproperties.com/projects/thankyou/fr";
                    } elseif ($language == "Hebrew") {
                        $redirectUrl = "https://hikalproperties.com/projects/thankyou/he";
                    } elseif ($language == "Chinese") {
                        $redirectUrl = "https://hikalproperties.com/projects/thankyou/cn";
                    } else {
                        $redirectUrl = "https://hikalproperties.com/projects/thankyou";
                    }
                    // }
                } else {
                    $redirectUrl = "https://hikalproperties.com/projects/thankyou";
                }
                echo json_encode(['thankyou' => true, 'redirectUrl' => $redirectUrl]);
            }
            sleep(5);

            // SEND SMS NOTIFICATION
            $otpData = array(
                'phone_number' => (string) $leadContact,
                'senderAddr' => "AD-HIKAL",
                'message' => "شكراً لتسجيل اهتمامك
                مبروك حصولك علي جميع اجهزة المطبخ مجاناً سوف يقوم مستشارنا العقاري بالتواصل معك
                رَمَضَان كَرِيم .",
                'type' => "sms"
            );

            $soch = curl_init($api_sendOtp);
            curl_setopt($soch, CURLOPT_POST, 1);
            curl_setopt($soch, CURLOPT_POSTFIELDS, $otpData);
            curl_setopt($soch, CURLOPT_RETURNTRANSFER, true);
            $otpResponse = curl_exec($soch);
            $otpResponseData = json_decode($otpResponse, true);

            if (isset ($otpResponseData['message'])) {
                $message = $otpResponseData['message'];
                echo json_encode(['otp' => true]);
                exit();
            }
            // SEND SMS NOTIFICATION END

            curl_close($soch);
            exit();
        }
        // NON UAE NUMBERS
        else {
            // ADD NEW LEAD
            $leadData = array(
                "leadName" => (string) $leadName,
                "leadContact" => (string) $leadContact,
                "leadEmail" => (string) $leadEmail,
                "enquiryType" => (string) $enquiryType,
                "leadFor" => (string) $leadFor,
                "leadType" => (string) $leadType,
                "project" => (string) $project,
                "projectName" => (string) $project,
                "leadStatus" => (string) $leadStatus,
                "leadSource" => (string) $leadSource,
                "feedback" => (string) $feedback,
                "language" => (string) $language,
                "addedBy" => $addedBy,
                "filename" => (string) $filename,
                "ip" => (string) $ip,
                "device" => (string) $device,
                "otp" => (string) $otpText,
                "country" => (string) $country,
                "notes" => (string) $callTime,
            );

            $leadDataJson = json_encode($leadData);
            $clch = curl_init($api_addLead);
            curl_setopt($clch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($clch, CURLOPT_POST, true);
            curl_setopt($clch, CURLOPT_POSTFIELDS, $leadDataJson);
            curl_setopt($clch, CURLOPT_HTTPHEADER, array("Content-Type: application/json"));
            $leadResponse = curl_exec($clch);
            $leadResponseData = json_decode($leadResponse, true);

            if (isset ($leadResponseData['status']) && $leadResponseData['status'] === true) {
                $lead_id = $leadResponseData['lead']['id'];
                $_SESSION['lead_id'] = $lead_id;

                curl_close($clch);
                // ADD NEW LEAD END

                if ($language == "English") {
                    $redirectUrl = "https://hikalproperties.com/projects/thankyou/en";
                } elseif ($language == "Arabic") {
                    $redirectUrl = "https://hikalproperties.com/projects/thankyou/ar";
                } elseif ($language == "French") {
                    $redirectUrl = "https://hikalproperties.com/projects/thankyou/fr";
                } elseif ($language == "Hebrew") {
                    $redirectUrl = "https://hikalproperties.com/projects/thankyou/he";
                } elseif ($language == "Chinese") {
                    $redirectUrl = "https://hikalproperties.com/projects/thankyou/cn";
                } else {
                    $redirectUrl = "https://hikalproperties.com/projects/thankyou";
                }
                echo json_encode(['thankyou' => true, 'redirectUrl' => $redirectUrl]);
                exit();
            } else {
                $query = mysqli_query($con, "INSERT INTO leads (leadName, notes, leadContact, leadEmail, enquiryType, leadFor, leadType, project, projectName, leadStatus, leadSource, feedback, language, addedBy, filename, ip, device, otp, country) VALUES ('$leadName','$callTime','$leadContact', '$leadEmail', '$enquiryType','$leadFor', '$leadType', '$project', '$project', '$leadStatus', '$leadSource', '$feedback', '$language', '$addedBy', '$filename', '$ip', '$device', 'No OTP Used', '$country')");
                if ($query) {
                    if ($language == "English") {
                        $redirectUrl = "https://hikalproperties.com/projects/thankyou/en";
                    } elseif ($language == "Arabic") {
                        $redirectUrl = "https://hikalproperties.com/projects/thankyou/ar";
                    } elseif ($language == "French") {
                        $redirectUrl = "https://hikalproperties.com/projects/thankyou/fr";
                    } elseif ($language == "Hebrew") {
                        $redirectUrl = "https://hikalproperties.com/projects/thankyou/he";
                    } elseif ($language == "Chinese") {
                        $redirectUrl = "https://hikalproperties.com/projects/thankyou/cn";
                    } else {
                        $redirectUrl = "https://hikalproperties.com/projects/thankyou";
                    }
                } else {
                    $redirectUrl = "https://hikalproperties.com/projects/thankyou";
                }
                echo json_encode(['thankyou' => true, 'redirectUrl' => $redirectUrl]);
                exit();
            }
        }
    }
}

?>
