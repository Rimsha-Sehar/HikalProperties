<?php
session_start();

date_default_timezone_set('Asia/Dubai');
$cur_time = time();

$page_url = $_SESSION["page_url"];
$hashed_ip = $_SESSION["hashed_ip"];
$device = $_SESSION["user_agent"];

$source = $_SESSION["source"];

if ($source == "Snapchat") {
    // CUSTOM EVENT API 
    $api_snapchat = "https://staging.hikalcrm.com/api/validate-snap";
    $data = array(
        "pixel_id" => "4992376c-fb59-4050-8c91-bdb468b086d4",
        "timestamp" => (string)$cur_time,
        "event_type" => "CUSTOM_EVENT_1",
        "event_conversion_type" => "WEB",
        "event_tag" => "Tanatel",
        "page_url" => (string)$page_url,
        "user_agent" => (string)$device,
        "hashed_ip_address" => (string)$hashed_ip,
        "item_category" => "marahebservises.com/tanatel/ar",
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
    $http_status = curl_getinfo($ch, CURLINFO_HTTP_CODE);

    if(curl_errno($ch)){
        $error = array('error' => 'Curl error: ' . curl_error($ch));
        echo json_encode($error);
    }
    else {
        // Location("https://wa.me/971589491100");
        if ($http_status == 200) {
            $response = array('status' => 'success');
            echo json_encode($response);
            // header("Location: https://wa.me/971589491100?text=Hello%20I%20am%20interested%20in%20inquiring%20about%20furniture");
            exit();
        }
        else {
            $response = array('error' => 'response');
            echo json_encode($response);
        }
    }
    curl_close($ch);
}
else {
    $response = "Not Snapchat";
    echo json_encode($response);
}

?>
