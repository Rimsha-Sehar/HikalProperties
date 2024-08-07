<?php
session_start();
error_reporting(0);
include('../dbconfig/dbhybrid.php');

$ip = $_SERVER['REMOTE_ADDR'];
$device = $_SERVER['HTTP_USER_AGENT'];
?>

<?php

$protocol = isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? 'https://' : 'http://';
$host = $_SERVER['HTTP_HOST'];
$uri = $_SERVER['REQUEST_URI'];
$fullUrl = $protocol . $host . $uri;

$_SESSION["page_url"] = $fullUrl;


date_default_timezone_set('Asia/Dubai');
$cur_time = time();

$hashed_ip = hash('sha256', $ip);
?>

<?php
$url = 'https://staging.hikalcrm.com/api/validate-snap';

$data = array(
    "pixel_id" => "4992376c-fb59-4050-8c91-bdb468b086d4",
    "event_type" => "PAGE_VIEW",
        "timestamp" => (string)$cur_time,
    "client_dedup_id" => (string) round((time() * 1000) * (rand() / getrandmax())),
    "event_conversion_type" => "WEB",
    "event_tag" => "Hikal Properties",
    "page_url" => (string)$fullUrl,
    "user_agent" => (string)$device,
    "hashed_ip_address" => (string)$hashed_ip,
    "item_category" => "Empire",
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
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Hikal Real Estate Properties | Empire Estates</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Hikal Real Estate | Hikal Properties | Empire Developments | Empire Estates by Empire Developments">

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

    <!-- DROPDOWN COUNTRY CODE  -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/js/intlTelInput.min.js" integrity="sha512-DNeDhsl+FWnx5B1EQzsayHMyP6Xl/Mg+vcnFPXGNjUZrW28hQaa1+A4qL9M+AiOMmkAhKAWYHh1a+t6qxthzUw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/css/intlTelInput.css" integrity="sha512-gxWow8Mo6q6pLa1XH/CcH8JyiSDEtiwJV78E+D+QP0EVasFs8wKXq16G8CLD4CJ2SnonHr4Lm/yY2fSI2+cbmw==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- ICON -->
    <link rel="icon" type="image/png" href="https://hikalproperties.com/projects/assets/images/logo/hikalagency-icon.png" />
    <!-- STYLES -->
    <link rel="stylesheet" href="https://hikalproperties.com/projects/assets/css/dark-theme-gold.css" />
    <link rel="stylesheet" href="https://hikalproperties.com/projects/assets/css/animation.css" />

    <!-- PIXEL -->
    <script src="https://hikalproperties.com/projects/gtm/pixel.js"></script>
</head>

<body class="english">
    <?php include_once("../gtm/pixel.php"); ?>

    <?php
    $checkip = mysqli_query($con, "SELECT byIP FROM is_blocked WHERE status = 1 AND byIP = '$ip'");
    $fetchip = mysqli_fetch_array($checkip);
    if (mysqli_num_rows($checkip) > 0) {
        ?>
        <div class="d-flex justify-content-center align-items-center text-center p-5" style="width: 100%; min-height: 100vh;">
            <h1 class="text-center" style="font-size: 2.2rem; line-height: 4.4rem;">
                Some suspicious activities have been detected from your device! Please contact
                <a href="tel:+97142722249" class="gold-grad" style="font-weight: bold;">+97142722249</a>
                for further assistance!
            </h1>
        </div>
        <?php
    }
    else {
        ?>
        <!-- LOADING OVERLAY  -->
        <div id="loadingOverlay" class="overlay" style="display: none;">
            <?php include_once("../components/loading-circle.php"); ?>
        </div>

        <!-- TOP SCROLL -->
        <button onclick="topFunction()" id="myBtn" title="Go to top" style="background: transparent;"><i class="fa fa-arrow-up gold-grad"></i></button>

        <!-- WHATSAPP  -->
        <?php
        // $wa_project = "Mercedes-Benz";
        // $wa_lang = "English";
        // include_once("../components/whatsapp-brand.php");
        ?>

        <!-- <div class="language_header">
            <div class="container container-fluid">
            </div>
        </div> -->

        <!--HEADINGS & FORM-->
        <div class="first_section">
            <div class="mobile">
                <img loading="eager" class="mobile img-style" src="https://hikalproperties.com/projects/assets/images/projects/empire/ee-main.jpg" alt="HIKAL PROPERTIES" style="width: 100%" />
            </div>
            <div class="container container-fluid">
                <div class="row text-center d-flex align-items-center py-2">
                    <div class="col-12">
                        <h1 class="my-2" style="text-align: center; line-height: 2rem; font-weight: 800;">
                            <span class="gold-grad-anim">Own with </span>
                            <span class="num-glow">1%</span>
                            <span class="gold-grad-anim"> monthly installments for </span>
                            <span class="num-glow">80</span>
                            <span class="gold-grad-anim"> months!</span>
                        </h1>
                        <h3 class="text-expand mt-2" style="text-align: center; line-height: 1.5rem; font-size: 1rem; ">
                            Limited Time Offer!
                        </h3>
                        <h3 class="mt-2" style="text-align: center; line-height: 1.5rem; font-weight: 500; font-size: 1rem; ">
                            Get a Fully Equipped Kitchen
                        </h3>
                    </div>
                </div>
                <div class="row d-flex align-items-center">
                    <div class="col-12 col-sm-12 col-md-6 col-lg-5 col-xl-4 px-1 py-1">
                        <div style="display: flex; align-items: center;">
                            <!-- FORM -->
                            <div style="width: 100%; z-index: 1; display: flex; justify-content: center;">
                                <div class="containerform">
                                    <div class="inputs">
                                        <?php
                                        $url = "https://" . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
                                        $parsedUrl = parse_url($url);
                                        $filename = ltrim($parsedUrl['path'], '/') . '?' . $parsedUrl['query'];
                                        ?>
                                        <!-- OTP FORM  -->
                                        <div id="otp-form" class="contact-form" dir="ltr" style="display: none;">
                                            <form method="POST" action="../controllers/verify-otp.php">
                                                <!-- action="../controllers/verify-otp.php" -->
                                                <h5 class="gold-grad" style="text-align: center;">
                                                    OTP has been sent to
                                                    <span id="phone_no"></span>
                                                </h5>
                                                <!-- <label class="gold-grad" style="text-align: center;">
                                                    OTP
                                                </label> -->
                                                <input type="text" name="otp" id="otp" maxlength="6" pattern="\d*" inputmode="numeric" oninput="this.value = this.value.replace(/[^0-9]/g, '');">

                                                <div style="display: none">
                                                    <input type="text" name="phone_number" id="phone_number">
                                                    <input type="text" name="lead_name" id="lead_name" >
                                                    <input type="text" name="lead_email" id="lead_email" >
                                                    <input type="text" name="lang" id="lang" >
                                                    <input type="text" name="project_name" id="project_name" >
                                                    <input type="text" name="lead_type" id="lead_type" >
                                                    <input type="text" name="lead_source" id="lead_source" >
                                                    <input type="text" name="enquiry_type" id="enquiry_type" >
                                                    <input type="text" name="lead_for" id="lead_for" >
                                                    <input type="text" name="country_name" id="country_name" >
                                                    <input type="text" name="file_name" id="file_name" value="<?php echo $filename; ?>">
                                                </div>

                                                <button type="submit" style="font-weight: bold;">
                                                    VERIFY
                                                </button>
                                            </form>
                                        </div>
                                        <?php
                                        $query = mysqli_query($con, "SELECT ip, filename FROM leads ORDER BY creationDate DESC LIMIT 1");
                                        $fetch = mysqli_fetch_array($query);
                                        if ($ip == $fetch['ip'] && $filename == $fetch['filename']) {
                                            ?>
                                            <div class="p-5 d-flex justify-content-center align-items-center text-center" style="width: 100%; height: 100%; line-height: 2.5rem;">
                                                Thank you for registering with us. Our professionals will contact you soon!
                                            </div>
                                            <?php
                                        }
                                        else {
                                            ?>
                                            <!--NEW FORM-->
                                            <div class="contact-form" dir="ltr">
                                                <form id="lead-form" onsubmit="return submitLeadForm();">
                                                    <div style="display: none">
                                                        <input type="text" id="Project" name="Project" value="Empire Estates (Private Pool)" />
                                                        <input type="text" id="LeadType" name="LeadType" value="Apartment" />
                                                        <input type="text" id="Language" name="Language" value="English" />
                                                        <input type="text" id="LeadSource" name="LeadSource" value="Website" />
                                                        <input type="text" id="Country" name="Country" value="United Arab Emirates" />
                                                        <input type="text" id="Filename" name="Filename" value="<?php echo $filename; ?>" />
                                                        <input type="text" id="LeadEmail1" name="LeadEmail1" value="" />
                                                    </div>

                                                    <!-- NAME -->
                                                    <label class="gold-grad" style="margin-top: 0px;">NAME</label>
                                                    <input type="text" name="LeadName1" id="LeadName1" required />

                                                    <!-- CONTACT NUMBER -->
                                                    <label class="gold-grad">CONTACT NUMBER</label>
                                                    <input type="tel" name="phone[main]" id="mobile" style="color: #000000;" placeholder="56 789 0123" required />

                                                    <!--EMAIL-->
                                                    <!-- <label class="gold-grad">EMAIL ADDRESS</label>
                                                    <input type="email" name="LeadEmail1" id="LeadEmail1" placeholder="example@gmail.com" /> -->

                                                    <!-- HOW MANY BEDROOMS -->
                                                    <label class="gold-grad">HOW MANY BEDROOMS?</label>
                                                    <div class="d-flex align-items-center">
                                                        <input class="mx-2" type="radio" name="EnquiryRadio1" id="EnquiryRadio3" value="Studio" style="width: 20px;" required>
                                                        <label for="EnquiryRadio3" style="margin-top: 0px; padding-left: 7px; color: #fff;">
                                                            Studio + Private Pool
                                                        </label>
                                                    </div>
                                                    <div class="d-flex align-items-center">
                                                        <input class="mx-2" type="radio" name="EnquiryRadio1" id="EnquiryRadio4" value="1 Bedroom" style="width: 20px;" required>
                                                        <label for="EnquiryRadio4" style="margin-top: 0px; padding-left: 7px; color: #fff;">
                                                            1 Bedroom + Private Pool
                                                        </label>
                                                    </div>
                                                    <div class="d-flex align-items-center">
                                                        <input class="mx-2" type="radio" name="EnquiryRadio1" id="EnquiryRadio5" value="2 Bedrooms" style="width: 20px;" required>
                                                        <label for="EnquiryRadio5" style="margin-top: 0px; padding-left: 7px; color: #fff;">
                                                            2 Bedrooms + Private Pool
                                                        </label>
                                                    </div>
                                                    <div class="d-flex align-items-center">
                                                        <input class="mx-2" type="radio" name="EnquiryRadio1" id="EnquiryRadio6" value="3 Bedrooms" style="width: 20px;" required>
                                                        <label for="EnquiryRadio6" style="margin-top: 0px; padding-left: 7px; color: #fff;">
                                                            3 Bedrooms + Private Pool
                                                        </label>
                                                    </div>

                                                    <!-- PURPOSE  -->
                                                    <label class="gold-grad">PURPOSE OF ENQUIRY</label>
                                                    <div class="d-flex align-items-center">
                                                        <input class="mx-2" type="radio" name="LeadForRadio1" id="PurposeRadio1" value="Investment" style="width: 20px;" required>
                                                        <label for="PurposeRadio1" style="margin-top: 0px; padding-left: 7px; color: #fff;">
                                                            Investment
                                                        </label>
                                                    </div>
                                                    <div class="d-flex align-items-center">
                                                        <input class="mx-2" type="radio" name="LeadForRadio1" id="PurposeRadio2" value="End-user" style="width: 20px;" required>
                                                        <label for="PurposeRadio2" style="margin-top: 0px; padding-left: 7px; color: #fff;">
                                                            End-user
                                                        </label>
                                                    </div>

                                                    <div id="FormButton" name="FormButton">
                                                        <div class="form_button">
                                                            <button type="submit" class="submit-click">SUBMIT</button>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                            <?php
                                        }
                                        ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-12 col-sm-12 col-md-6 col-lg-7 col-xl-8 ps-5 py-1">
                        <img loading="eager" class="desktop img-style" src="https://hikalproperties.com/projects/assets/images/projects/empire/ee-main.jpg" alt="HIKAL PROPERTIES" style="width: 100%" />
                    </div>
                </div>
            </div>
        </div>

        <!--CONTENT-->
        <div class="second_section">
            <div class="container container-fluid py-3">
                <div class="desktop">
                    <div class="row my-4 d-flex align-items-center">
                        <div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">
                            <img class="img-style" src="https://hikalproperties.com/projects/assets/images/projects/empire/ee-pool.jpg" loading="lazy" alt="HIKAL PROPERTIES" style="width: 100%;" />
                        </div>
                        <div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6" style="display: flex; align-items: center;">
                            <div class="p-2">
                                <h5 class="gold-grad">
                                    LUXURIOUS LIVING AT ARJAN
                                </h5>
                                <hr style="width: 50px; height: 2px; background-color: #d4a556; opacity: 0.5;">
                                <h6>
                                    Experience luxury at its finest with the distinguished residential project in Arjan. This high-rise development stands as a community landmark, boasting a grand structure and a strong dedication to luxurious living. Beyond the ordinary, the developer has crafted an exceptional living experience by offering top-notch amenities like a fitness center, beautiful landscaped parks, cutting-edge technology, and home automation. Each apartment is designed with exquisite interiors, showcasing an unwavering commitment to excellence. With each new project, we raise the bar for luxury living, ensuring residents enjoy an unparalleled level of opulence and sophistication.
                                </h6>
                            </div>
                        </div>
                    </div>
                    <div class="row my-4 d-flex align-items-center">
                        <div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6" style="display: flex; align-items: center;">
                            <div class="p-2">
                                <h5 class="gold-grad">
                                    PRIME LOCATION FOR URBAN CONVENIENCE
                                </h5>
                                <hr style="width: 50px; height: 2px; background-color: #d4a556; opacity: 0.5;">
                                <h6>
                                    Located in Arjan, our community seamlessly combines tranquility with urban convenience. Residents experience easy access to various destinations, ensuring effortless travel anytime. The neighborhood boasts leisure amenities, entertainment zones, schools, hospitals, and all essentials for a luxurious and convenient lifestyle. Our location not only offers opulent living spaces but also positions residents in a prime area where urban conveniences harmonize with peaceful surroundings.
                                </h6>
                            </div>
                        </div>
                        <div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">
                            <img class="img-style" src="https://hikalproperties.com/projects/assets/images/projects/empire/ee-whole.jpg" loading="lazy" alt="HIKAL PROPERTIES" style="width: 100%;" />
                        </div>
                    </div>
                    <div class="row my-4 d-flex align-items-center">
                        <div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">
                            <img class="img-style" src="https://hikalproperties.com/projects/assets/images/projects/empire/ee-outdoor.jpg" loading="lazy" alt="HIKAL PROPERTIES" style="width: 100%;" />
                        </div>
                        <div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6" style="display: flex; align-items: center;">
                            <div class="p-2">
                                <h5 class="gold-grad">
                                    ELEVATING LUXURY LIVING STANDARDS
                                </h5>
                                <hr style="width: 50px; height: 2px; background-color: #d4a556; opacity: 0.5;">
                                <h6>
                                    The Arjan project upholds a legacy of enhancing luxury living standards. The developer's dedication to excellence is clear in the careful planning and execution of each project, ensuring residents enjoy the pinnacle of sophistication and comfort. With impressive structures and state-of-the-art amenities, the project aims to redefine opulence, creating living spaces that showcase their commitment to providing an elevated lifestyle in every project.
                                </h6>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="mobile">
                    <div class="p-2">
                        <h5 class="gold-grad">
                            LUXURIOUS LIVING AT ARJAN
                        </h5>
                        <hr style="width: 50px; height: 2px; background-color: #d4a556; opacity: 0.5;">
                        <h6>
                            Experience luxury at its finest with the distinguished residential project in Arjan. This high-rise development stands as a community landmark, boasting a grand structure and a strong dedication to luxurious living. Beyond the ordinary, the developer has crafted an exceptional living experience by offering top-notch amenities like a fitness center, beautiful landscaped parks, cutting-edge technology, and home automation. Each apartment is designed with exquisite interiors, showcasing an unwavering commitment to excellence. With each new project, we raise the bar for luxury living, ensuring residents enjoy an unparalleled level of opulence and sophistication.
                        </h6>
                    </div>
                    <img class="img-style" src="https://hikalproperties.com/projects/assets/images/projects/empire/ee-pool.jpg" loading="lazy" alt="HIKAL PROPERTIES" style="width: 100%;" />
                    <div class="p-2">
                        <h5 class="gold-grad">
                            PRIME LOCATION FOR URBAN CONVENIENCE
                        </h5>
                        <hr style="width: 50px; height: 2px; background-color: #d4a556; opacity: 0.5;">
                        <h6>
                            Located in Arjan, our community seamlessly combines tranquility with urban convenience. Residents experience easy access to various destinations, ensuring effortless travel anytime. The neighborhood boasts leisure amenities, entertainment zones, schools, hospitals, and all essentials for a luxurious and convenient lifestyle. Our location not only offers opulent living spaces but also positions residents in a prime area where urban conveniences harmonize with peaceful surroundings.

                        </h6>
                    </div>
                    <img class="img-style" src="https://hikalproperties.com/projects/assets/images/projects/empire/ee-whole.jpg" loading="lazy" alt="HIKAL PROPERTIES" style="width: 100%;" />
                    <div class="p-2">
                        <h5 class="gold-grad">
                            ELEVATING LUXURY LIVING STANDARDS
                        </h5>
                        <hr style="width: 50px; height: 2px; background-color: #d4a556; opacity: 0.5;">
                        <h6>
                            The Arjan project upholds a legacy of enhancing luxury living standards. The developer's dedication to excellence is clear in the careful planning and execution of each project, ensuring residents enjoy the pinnacle of sophistication and comfort. With impressive structures and state-of-the-art amenities, the project aims to redefine opulence, creating living spaces that showcase their commitment to providing an elevated lifestyle in every project.
                        </h6>
                    </div>
                    <img class="img-style" src="https://hikalproperties.com/projects/assets/images/projects/empire/ee-outdoor.jpg" loading="lazy" alt="HIKAL PROPERTIES" style="width: 100%;" />
                </div>
            </div>
        </div>

        <!--LOCATION-->
        <div class="third_section mt-5">
            <div class="container container-fluid py-5">
                <div class="row" style="text-align: center;">
                    <h4 class="gold-grad-anim">
                        LOCATION BENEFITS
                    </h4>
                </div>
                <div class="row" style="justify-content: center;">
                    <div class="col-6 col-sm-6 col-md-4 col-lg-3 col-xl-3 p-2">
                        <div style="display: block; text-align: center;">
                            <div style="font-size: 2.2rem; margin: 0px;"><b>
                                05
                            </b></div>
                            <p style="display: flex; justify-content: center; color: #d4a556;">
                                MINUTES
                            </p>
                            <p class="icons-txtpara text-center" style="display: flex; justify-content: center;">
                                Dubai Miracle Garden
                            </p>
                            <br>
                        </div>
                    </div>
                    <div class="col-6 col-sm-6 col-md-4 col-lg-3 col-xl-3 p-2">
                        <div style="display: block; text-align: center;">
                            <div style="font-size: 2.2rem; margin: 0px;"><b>
                                10
                            </b></div>
                            <p style="display: flex; justify-content: center; color: #d4a556;">
                                MINUTES
                            </p>
                            <p class="icons-txtpara text-center" style="display: flex; justify-content: center;">
                                Mall of the Emirates
                            </p>
                            <br>
                        </div>
                    </div>
                    <div class="col-6 col-sm-6 col-md-4 col-lg-3 col-xl-3 p-2">
                        <div style="display: block; text-align: center;">
                            <div style="font-size: 2.2rem; margin: 0px;"><b>
                                25
                            </b></div>
                            <p style="display: flex; justify-content: center; color: #d4a556;">
                                MINUTES
                            </p>
                            <p class="icons-txtpara text-center" style="display: flex; justify-content: center;">
                                Burj Khalifa
                            </p>
                            <br>
                        </div>
                    </div>
                    <div class="col-6 col-sm-6 col-md-4 col-lg-3 col-xl-3 p-2">
                        <div style="display: block; text-align: center;">
                            <div style="font-size: 2.2rem; margin: 0px;"><b>
                                25
                            </b></div>
                            <p style="display: flex; justify-content: center; color: #d4a556;">
                                MINUTES
                            </p>
                            <p class="icons-txtpara text-center" style="display: flex; justify-content: center;">
                                Palm Jumeirah
                            </p>
                            <br>
                        </div>
                    </div>
                    <div class="col-6 col-sm-6 col-md-4 col-lg-3 col-xl-3 p-2">
                        <div style="display: block; text-align: center;">
                            <div style="font-size: 2.2rem; margin: 0px;"><b>
                                25
                            </b></div>
                            <p style="display: flex; justify-content: center; color: #d4a556;">
                                MINUTES
                            </p>
                            <p class="icons-txtpara text-center" style="display: flex; justify-content: center;">
                                Dubai International Airport
                            </p>
                            <br>
                        </div>
                    </div>
                    <div class="col-6 col-sm-6 col-md-4 col-lg-3 col-xl-3 p-2">
                        <div style="display: block; text-align: center;">
                            <div style="font-size: 2.2rem; margin: 0px;"><b>
                                25
                            </b></div>
                            <p style="display: flex; justify-content: center; color: #d4a556;">
                                MINUTES
                            </p>
                            <p class="icons-txtpara text-center" style="display: flex; justify-content: center;">
                                Al Maktoum International Airport
                            </p>
                            <br>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!--IMAGE-->
        <div class="map_section" style="display: flex; align-items: center; justify-content: space-evenly;">
            <img loading="eager" class="desktop img-style" src="https://hikalproperties.com/projects/assets/images/projects/empire/ee-map.png" alt="HIKAL PROPERTIES" style="width: 60%" />
            <img loading="eager" class="mobile img-style" src="https://hikalproperties.com/projects/assets/images/projects/empire/ee-map.png" alt="HIKAL PROPERTIES" style="width: 100%" />
        </div>

        <!--AMENITIES-->
        <div class="fourth_section my-5">
            <?php include_once("../components/amenities-en.php"); ?>
        </div>

        <!--WHY DUBAI-->
        <div class="fifth_section my-5">
            <?php include_once("../components/whydubai-en.php"); ?>
        </div>

        <footer style="background-color: #000000;">
            <?php include_once("../components/footer-copyright.php"); ?>
        </footer>

        <!--COUNTRY CODE-->
        <script>
            var minput = document.querySelector("#mobile");
            var phone_number = window.intlTelInput(minput, {
                separateDialCode: true,
                preferredCountries: ["ae", "sa", "qa", "om", "kw", "iq"],
                hiddenInput: "full",
                utilsScript: "//cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.3/js/utils.js"
            });
        </script>

        <!--SCROLL TO TOP-->
        <script>
            // Get the button
            let mybutton = document.getElementById("myBtn");

            // When the user scrolls down 20px from the top of the document, show the button
            window.onscroll = function() {
                scrollFunction()
            };

            function scrollFunction() {
                if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
                    mybutton.style.display = "block";
                } else {
                    mybutton.style.display = "none";
                }
            }

            // When the user clicks on the button, scroll to the top of the document
            function topFunction() {
                document.body.scrollTop = 0;
                document.documentElement.scrollTop = 0;
            }
        </script>

        <!-- SUBMIT LEAD FORM -->
        <script>
            function submitLeadForm() {
                document.getElementById('loadingOverlay').style.display = 'flex';
                var full_number = phone_number.getNumber(intlTelInputUtils.numberFormat.E164);

                var phoneOTP = document.getElementById('phone_number');
                phoneOTP.value = full_number;

                var phoneTitle = document.getElementById('phone_no');
                phoneTitle.textContent = full_number;

                var LeadName1 = document.getElementById('lead_name');
                LeadName1.value = $("#LeadName1").val();

                var LeadEmail1 = document.getElementById('lead_email');
                LeadEmail1.value = $("#LeadEmail1").val();

                var Language = document.getElementById('lang');
                Language.value = $("#Language").val();

                var Project = document.getElementById('project_name');
                Project.value = $("#Project").val();

                var LeadType = document.getElementById('lead_type');
                LeadType.value = $("#LeadType").val();

                var LeadSource = document.getElementById('lead_source');
                LeadSource.value = $("#LeadSource").val();

                // TIKTOK SUBMIT FORM
                if (LeadSource.value == "Campaign TikTok") {
                    ttq.track('SubmitForm');
                }
                // TWITTER SUBMIT FORM
                if (LeadSource.value == "Campaign Twitter") {
                    twq('event', 'tw-ohu9a-oivb1', {
                        phone_number: encodeURIComponent(full_number)
                    });
                }

                var EnquiryRadio1 = document.getElementById('enquiry_type');
                EnquiryRadio1.value = $("#EnquiryRadio1").val();

                var LeadForRadio1 = document.getElementById('lead_for');
                LeadForRadio1.value = $("#LeadForRadio1").val();

                var Country = document.getElementById('country_name');
                Country.value = $("#Country").val();

                var formData = $("#lead-form").serialize();
                formData += "&leadContact=" + encodeURIComponent(full_number);
                // console.log(formData);

                $.ajax({
                    url: "../controllers/add-lead-country-hybrid.php",
                    method: "GET",
                    data: formData,
                    dataType: "json",
                    success: function(response) {
                        if (response.otp) {
                            document.getElementById('loadingOverlay').style.display = 'none';
                            // RENDER OTP FORM
                            $("#lead-form").hide();
                            $("#otp-form").show();
                        }
                        else if (response.thankyou) {
                            window.location.href = response.redirectUrl;
                        }
                        else {
                            console.log("Error: ", response);
                        }
                    },
                    error: function(jqXHR, textStatus, errorThrown) {
                        console.error("AJAX Error:", textStatus, errorThrown);
                        console.log("Response Text:", jqXHR.responseText);
                    }
                });

                return false;
            }
        </script>
        <?php
    }
    ?>

</body>

</html>
