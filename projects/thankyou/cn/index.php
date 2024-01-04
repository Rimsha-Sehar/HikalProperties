<?php
session_start();
error_reporting(0);

// SNAP PIXEL 
if ($_SESSION['leadSource'] == "Campaign Snapchat") {
    date_default_timezone_set('Asia/Dubai');
    $cur_time = time();

    $filename = $_SESSION['fileName'];
    $hashed_email = $_SESSION['hashed_email'];
    $hashed_phone = $_SESSION['hashed_phone_number'];
    $hashed_ip = $_SESSION['hashed_ip'];
    $device = $_SESSION['user_agent'];

    $url = 'https://staging.hikalcrm.com/api/validate-snap';

    $data = array(
        "pixel_id" => "4992376c-fb59-4050-8c91-bdb468b086d4",
        "timestamp" => (string)$cur_time,
        "event_type" => "PURCHASE",
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
?>

<!DOCTYPE html>
<html>

<head>
<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Hikal Real Estate Properties | Thank you</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Hikal Real Estate | Hikal Properties">

    <!-- GOOGLE FONTS -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+Hebrew:wght@300;400&family=Noto+Kufi+Arabic:wght@200;300;600&family=Playfair+Display:ital@0;1&family=Raleway:wght@200;400;600;800&display=swap" rel="stylesheet">

    <!-- FONT AWESOME -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- MDB -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.2.0/mdb.min.css" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.4.0/mdb.min.js" integrity="sha512-0RxGTiFXp36+bSbJM+/QSTl1LDQ4pHdDZ8Ua9ZXl454qKSsYu228AOLHYfzx/rm4Dm6I+176ETRF55DpvrHTgw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    
    <!-- JQUERY -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js" integrity="sha512-3gJwYpMe3QewGELv8k/BX9vcqhryRdzRMxVfq6ngyWXwo03GFEzjsUm8Q7RZcHPHksttq7/GFoxjCVUjkjvPdw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <!-- ICON -->
    <link rel="icon" type="image/png" href="https://hikalproperties.com/projects/assets/images/logo/hikalagency-icon.png" />
    <!-- https://hikalproperties.com/projects/ -->

    <!-- STYLES -->
    <link rel="stylesheet" href="https://hikalproperties.com/projects/assets/css/dark-theme-gold.css" />
    <link rel="stylesheet" href="https://hikalproperties.com/projects/assets/css/animation.css" />

    <!-- META PIXEL -->
    <script src="https://hikalproperties.com/projects/gtm/meta.js"></script> 
    <!-- TIKTOK PIXEL -->
    <script src="https://hikalproperties.com/projects/gtm/tiktok.js"></script>

    <!-- TIKTOK PIXEL  -->
    <?php
    if ($_SESSION['leadSource'] == "Campaign Snapchat") {
        ?>
        <script>
            ttq.track('CompleteRegistration');
        </script>
        <?php
    }
    ?>
    <!-- TIKTOK PIXEL END  -->
</head>

<body class="english">
    <div class="d-flex flex-column justify-content-between" style="width: 100%; min-height: 100vh;">
        <?php
            include_once("../../components/header-dark.php");
        ?>
        <div class="d-flex justify-content-center align-items-center text-center p-5 my-10">
            <h1 class="text-center" style="font-size: 1.5rem; line-height: 3rem;">
                感谢您与我们联系。我们专属的顾问将会尽快与您联系，以解决您的需求。
                <!-- <a href="tel:+97142722249" class="gold-grad" style="font-weight: bold;">+97142722249</a> -->
            </h1>
        </div>
        <?php
            include_once("../../components/footer-copyright.php");
        ?>
    </div>
    
</body>

</html>
<?php
?>