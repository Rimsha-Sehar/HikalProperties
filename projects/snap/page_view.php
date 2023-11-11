<?php
$url = "https://" . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
$link = parse_url($url);

$ip = $_SERVER['REMOTE_ADDR'];
$user_agent = $_SERVER['HTTP_USER_AGENT'];

$hashed_ip = hash('sha256', $ip);

date_default_timezone_set('Asia/Dubai');
$cur_time = time();
?>

<?php
$url = 'https://staging.hikalcrm.com/api/validate-snap';

$data = array(
    "pixel_id" => "4992376c-fb59-4050-8c91-bdb468b086d4",
    "timestamp" => (string)$cur_time,
    "event_type" => "PAGE_VIEW",
    "event_conversion_type" => "WEB",
    "event_tag" => "Hikal Agency Test",
    "page_url" => (string)$link, 
    // "hashed_email" => "a7f30dae8b1a9c9db51c116810e1f0e9c29e91cdac1220e5ff9fc5c88b7df18f",
    "user_agent" => (string)$user_agent,
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

if ($response !== false) {
    // echo 'API call successful!';
    // echo $response;
    // echo date("Y-m-d H:i:s", $cur_time);
} else {
    // echo 'API call failed.';
}
?>