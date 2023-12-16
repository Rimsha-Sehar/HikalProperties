<?php
session_start();
error_reporting(0);
include('../../dbconfig/dbhybrid.php');

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
    "event_conversion_type" => "WEB",
    "event_tag" => "Hikal Properties",
    "page_url" => (string)$fullUrl, 
    "user_agent" => (string)$device,
    "hashed_ip_address" => (string)$hashed_ip,
    "item_category" => "Oceanz",
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
    <title>Hikal Real Estate Properties | Mercedes-Benz</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Hikal Real Estate | Hikal Properties | Binghatti Developers | Mercedes-Benz Places by Binghatti">

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

    <!-- META PIXEL -->
    <script src="https://hikalproperties.com/projects/gtm/meta.js"></script> 
</head>

<body class="arabic" dir="rtl">
    <?php include_once("../../gtm/meta.php"); ?>
    <?php
    $checkip = mysqli_query($con, "SELECT byIP FROM is_blocked WHERE status = 1 AND byIP = '$ip'");
    $fetchip = mysqli_fetch_array($checkip);
    if (mysqli_num_rows($checkip) > 0) {
        ?>
        <div class="d-flex justify-content-center align-items-center text-center p-5" style="width: 100%; min-height: 100vh;">
            <h1 class="text-center" style="font-size: 2.2rem; line-height: 4.4rem;">
                تم اكتشاف بعض الأنشطة المشبوهة من جهازك! الرجاء التواصل مع 
                <a href="tel:+97142722249" class="gold-grad" style="font-weight: bold;">+97142722249</a>
                للحصول على المساعدة الإضافية!
            </h1>
        </div>
        <?php
    }
    else {
        ?>
        <!-- TOP SCROLL -->
        <button onclick="topFunction()" id="myBtn" title="Go to top" style="background: transparent;"><i class="fa fa-arrow-up gold-grad"></i></button>

        <!-- SLIDER FORM  -->
        <div class="slider_form" dir="ltr">
            <div style="height: 100%;"  onClick="openLeadForm();">
                <div class="d-flex flex-column align-items-center justify-content-center p-2 my-3" style="font-weight: bold; font-size: 0.9rem; text-shadow: 0 2px 2px rgba(250, 227, 133, 1);">
                    <div>R</div>
                    <div>E</div>
                    <div>G</div>
                    <div>I</div>
                    <div>S</div>
                    <div>T</div>
                    <div>E</div>
                    <div>R</div>
                </div>
            </div>
            <div id="leadForm" class="hidden-form">
                <button type="button" class="close_slider_button" onclick="closeLeadForm()">
                    <i class="fas fa-times"></i>
                </button>
                <div class="containerform_slider_form">
                    <div class="inputs" style="font-weight: 400; overflow-y: scroll;">
                        <?php
                        $url = "https://" . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
                        $parsedUrl = parse_url($url);
                        $filename = ltrim($parsedUrl['path'], '/') . '?' . $parsedUrl['query'];
                        ?>
                        <!-- OTP FORM  -->
                        <div id="otp-form" class="contact-form" dir="ltr" style="display: none;">
                            <form method="POST" action="../../controllers/verify-otp.php">
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
                                    تحقق من رمز التحقق
                                </button>
                            </form>
                        </div>
                        <?php
                        $query = mysqli_query($con, "SELECT ip, filename FROM leads ORDER BY creationDate DESC LIMIT 1");
                        $fetch = mysqli_fetch_array($query);
                        if ($ip == $fetch['ip'] && $filename == $fetch['filename']) {
                            ?>
                            <div class="p-5 d-flex justify-content-center align-items-center text-center" style="width: 100%; height: 100%; line-height: 2.5rem;">
                                شكراً لتسجيلك معنا. سيقوم محترفونا بالتواصل معك قريباً!
                            </div>
                            <?php
                        }
                        else {
                            ?>
                            <!--NEW FORM-->
                            <div class="contact-form" dir="ltr">
                                <form id="lead-form" onsubmit="return submitLeadForm();">
                                    <!-- action="../controllers/add-lead-country-hybrid.php" -->
                                    <div style="display: none">
                                        <input type="text" id="Project" name="Project" value="Mercedes-Benz" />
                                        <input type="text" id="LeadType" name="LeadType" value="Apartment" />
                                        <input type="text" id="Language" name="Language" value="Arabic" />
                                        <input type="text" id="LeadSource" name="LeadSource" value="Campaign Snapchat" />
                                        <input type="text" id="Country" name="Country" value="" />
                                        <input type="text" id="Filename" name="Filename" value="<?php echo $filename; ?>" />
                                    </div>
                                    
                                    <!-- NAME -->
                                    <label class="gold-grad" style="margin-top: 0px;">الاسم</label>
                                    <input type="text" name="LeadName1" id="LeadName1" required />
                            
                                    <!-- CONTACT NUMBER -->
                                    <label class="gold-grad">رقم الاتصال</label>
                                    <input type="tel" name="phone[main]" id="mobile" style="color: #000000;" placeholder="56 789 0123" required />
                                    
                                    <!--EMAIL-->
                                    <label class="gold-grad">عنوان البريد الإلكتروني</label>
                                    <input type="email" name="LeadEmail1" id="LeadEmail1" placeholder="example@gmail.com" />

                                    <!-- HOW MANY BEDROOMS -->
                                    <label class="gold-grad">كم عدد غرف النوم؟</label>
                                        <div style="display: flex;" dir="rtl">
                                            <input class="mx-2" type="radio" name="EnquiryRadio1" id="EnquiryRadio2" value="1 Bedroom" style="width: 20px;" required>
                                            <label for="EnquiryRadio2" style="margin-top: 0px; padding-left: 7px; color: #fff;">
                                                غرفة نوم واحدة
                                            </label>
                                        </div>
                                        <div style="display: flex;" dir="rtl">
                                        <input class="mx-2" type="radio" name="EnquiryRadio1" id="EnquiryRadio3" value="2 Bedrooms" style="width: 20px;" required>
                                        <label for="EnquiryRadio3" style="margin-top: 0px; padding-left: 7px; color: #fff;">
                                            غرفتين نوم
                                        </label>
                                    </div>
                                    <div style="display: flex;" dir="rtl">
                                        <input class="mx-2" type="radio" name="EnquiryRadio1" id="EnquiryRadio4" value="3 Bedrooms" style="width: 20px;" required>
                                        <label for="EnquiryRadio4" style="margin-top: 0px; padding-left: 7px; color: #fff;">
                                            ثلاث غرف نوم
                                        </label>
                                    </div>
                                    <div style="display: flex;" dir="rtl">
                                        <input class="mx-2" type="radio" name="EnquiryRadio1" id="EnquiryRadio5" value="4 Bedrooms" style="width: 20px;" required>
                                        <label for="EnquiryRadio5" style="margin-top: 0px; padding-left: 7px; color: #fff;">
                                            4 Bedrooms
                                        </label>
                                    </div>
                                    <div style="display: flex;" dir="rtl">
                                        <input class="mx-2" type="radio" name="EnquiryRadio1" id="EnquiryRadio6" value="5 Bedrooms" style="width: 20px;" required>
                                        <label for="EnquiryRadio6" style="margin-top: 0px; padding-left: 7px; color: #fff;">
                                            5 Bedrooms
                                        </label>
                                    </div>
                            
                                    <!-- PURPOSE  -->
                                    <label class="gold-grad">غرض الاستفسار</label>
                                    <div style="display: flex;" dir="rtl">
                                        <input class="mx-2" type="radio" name="LeadForRadio1" id="PurposeRadio1" value="Investment" style="width: 20px;" required>
                                        <label for="PurposeRadio1" style="margin-top: 0px; padding-left: 7px; color: #fff;">
                                            استثمار
                                        </label>
                                    </div>
                                    <div style="display: flex;" dir="rtl">
                                        <input class="mx-2" type="radio" name="LeadForRadio1" id="PurposeRadio2" value="End-user" style="width: 20px;" required>
                                        <label for="PurposeRadio2" style="margin-top: 0px; padding-left: 7px; color: #fff;">
                                            سكني
                                        </label>
                                    </div>
                            
                                    <div id="FormButton" name="FormButton">
                                        <div class="form_button">
                                            <button type="submit" class="submit-click">إرسال</button>
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

        <!-- HEADER  -->
        <div class="header">
            <div class="text-center">
                <h4 class="gold-grad-anim">
                    MERCEDES-BENZ PLACES
                </h4>
                <h5 style="font-family: 'Playfair Display', sans-serif;">
                    An Iconic Collaboration of Elegance and Innovation
                </h5>
            </div>   
        </div>

        <!-- BACKGROUND IMAGE  -->
        <div class="image_section" style="background-image: url('../../assets/images/projects/mercedes-benz/mb.webp');">
            <!-- ONLY IMAGE NOW -->
        </div>
    
        <!--CONTENT-->
        <div class="second_section">
            <div class="container container-fluid py-3">
                <div class="desktop">
                    <div class="row my-4">
                        <div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">
                            <img class="img-style" src="https://hikalproperties.com/projects/assets/images/projects/mercedes-benz/mercedes-out.jpg" loading="lazy" alt="HIKAL PROPERTIES" style="width: 100%;" />
                        </div>
                        <div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6" style="display: flex; align-items: center;">
                            <div class="p-2">
                                <h5 class="gold-grad">
                                    Refined Luxury Living
                                </h5>
                                <hr style="width: 50px; height: 2px; background-color: #d4a556; opacity: 0.5;">
                                <h6>
                                    Enter a world of refined luxury at Mercedes-Benz Places, a collaborative masterpiece between Binghatti and Mercedes-Benz. This 71-story residence in Downtown Dubai, standing at 341 meters, seamlessly integrates smart home technologies and "intelligent mobility solutions," echoing Mercedes-Benz's design philosophy of "Sensual Purity." More than a residence, it signifies sophistication, setting a new standard of living with breathtaking views of the Burj Khalifa and vibrant Downtown Dubai.
                                </h6>
                            </div>
                        </div>
                    </div>
                    <div class="row my-4">
                        <div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6" style="display: flex; align-items: center;">
                            <div class="p-2">
                                <h5 class="gold-grad">
                                    Distinctive Collaboration Unveiled
                                </h5>
                                <hr style="width: 50px; height: 2px; background-color: #d4a556; opacity: 0.5;">
                                <h6>
                                    In the heart of Downtown Dubai, Mercedes-Benz Places emerges as an extraordinary collaboration between visionary developer Binghatti and the iconic luxury brand Mercedes. Construction initiated in 2023 on plot 3450387 stands testament to a meticulously planned partnership revealed in December 2023. Inspired by Mercedes-Benz's "Sensual Purity" design philosophy, the tower transcends conventional living standards. Beyond a residence, it integrates smart home technologies and "intelligent mobility solutions," offering an unparalleled living experience. Every detail reflects a convergence of architectural brilliance and automotive-inspired luxury, setting a new paradigm for opulent living.
                                </h6>
                            </div>
                        </div>
                        <div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">
                            <img class="img-style" src="https://hikalproperties.com/projects/assets/images/projects/mercedes-benz/mercedes-benz.jpg" loading="lazy" alt="HIKAL PROPERTIES" style="width: 100%;" />
                        </div>
                    </div>
                    <div class="row my-4">
                        <div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">
                            <img class="img-style" src="https://hikalproperties.com/projects/assets/images/projects/mercedes-benz/mercedes-view.jpg" loading="lazy" alt="HIKAL PROPERTIES" style="width: 100%;" />
                        </div>
                        <div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6" style="display: flex; align-items: center;">
                            <div class="p-2">
                                <h5 class="gold-grad">
                                    Seamless Urban Living
                                </h5>
                                <hr style="width: 50px; height: 2px; background-color: #d4a556; opacity: 0.5;">
                                <h6>
                                    Explore a redefined living experience at Mercedes-Benz Places, strategically located in Downtown Dubai. With swift access—10 minutes to the Dubai Mall, 22 minutes to Palm Jumeirah, and 20 minutes to Burj Al Arab—this residence ensures unparalleled convenience. Beyond a dwelling, it transcends mere physicality, strategically positioned for a 16-minute reach to Dubai International Airport and a 41-minute drive to Al Maktoum International Airport. It's not just a home; it's a lifestyle meticulously crafted for those pursuing the epitome of contemporary luxury.
                                </h6>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="mobile">
                    <div class="p-2">
                        <h5 class="gold-grad">
                            Refined Luxury Living
                        </h5>
                        <hr style="width: 50px; height: 2px; background-color: #d4a556; opacity: 0.5;">
                        <h6>
                            Enter a world of refined luxury at Mercedes-Benz Places, a collaborative masterpiece between Binghatti and Mercedes-Benz. This 71-story residence in Downtown Dubai, standing at 341 meters, seamlessly integrates smart home technologies and "intelligent mobility solutions," echoing Mercedes-Benz's design philosophy of "Sensual Purity." More than a residence, it signifies sophistication, setting a new standard of living with breathtaking views of the Burj Khalifa and vibrant Downtown Dubai.
                        </h6>
                    </div>
                    <img class="img-style" src="https://hikalproperties.com/projects/assets/images/projects/mercedes-benz/mercedes-out.jpg" loading="lazy" alt="HIKAL PROPERTIES" style="width: 100%;" />
                    <div class="p-2">
                        <h5 class="gold-grad">
                            Distinctive Collaboration Unveiled
                        </h5>
                        <hr style="width: 50px; height: 2px; background-color: #d4a556; opacity: 0.5;">
                        <h6>
                            In the heart of Downtown Dubai, Mercedes-Benz Places emerges as an extraordinary collaboration between visionary developer Binghatti and the iconic luxury brand Mercedes. Construction initiated in 2023 on plot 3450387 stands testament to a meticulously planned partnership revealed in December 2023. Inspired by Mercedes-Benz's "Sensual Purity" design philosophy, the tower transcends conventional living standards. Beyond a residence, it integrates smart home technologies and "intelligent mobility solutions," offering an unparalleled living experience. Every detail reflects a convergence of architectural brilliance and automotive-inspired luxury, setting a new paradigm for opulent living.
                        </h6>
                    </div>
                    <img class="img-style" src="https://hikalproperties.com/projects/assets/images/projects/mercedes-benz/mercedes-benz.jpg" loading="lazy" alt="HIKAL PROPERTIES" style="width: 100%;" />
                    <div class="p-2">
                        <h5 class="gold-grad">
                            Seamless Urban Living
                        </h5>
                        <hr style="width: 50px; height: 2px; background-color: #d4a556; opacity: 0.5;">
                        <h6>
                            Explore a redefined living experience at Mercedes-Benz Places, strategically located in Downtown Dubai. With swift access—10 minutes to the Dubai Mall, 22 minutes to Palm Jumeirah, and 20 minutes to Burj Al Arab—this residence ensures unparalleled convenience. Beyond a dwelling, it transcends mere physicality, strategically positioned for a 16-minute reach to Dubai International Airport and a 41-minute drive to Al Maktoum International Airport. It's not just a home; it's a lifestyle meticulously crafted for those pursuing the epitome of contemporary luxury.
                        </h6>
                    </div>
                    <img class="img-style" src="https://hikalproperties.com/projects/assets/images/projects/mercedes-benz/mercedes-view.jpg" loading="lazy" alt="HIKAL PROPERTIES" style="width: 100%;" />
                </div>
            </div>
        </div>
        
        <!--LOCATION-->
        <div class="third_section mt-5">
            <div class="container container-fluid py-5">
                <div class="row" style="text-align: center;">
                    <h4 class="gold-grad-anim">
                        مميزات الموقع
                    </h4>
                </div>
                <div class="row" style="justify-content: center;">
                    <div class="col-6 col-sm-6 col-md-4 col-lg-3 col-xl-3 p-2">
                        <div style="display: block; text-align: center;">
                            <div style="font-size: 2.2rem; margin: 0px;"><b>
                                10
                            </b></div>
                            <p style="display: flex; justify-content: center; color: #d4a556;">
                                دقائق
                            </p>
                            <p class="icons-txtpara text-center" style="display: flex; justify-content: center;">
                                The Dubai Mall
                            </p>
                            <br>
                        </div>
                    </div>
                    <div class="col-6 col-sm-6 col-md-4 col-lg-3 col-xl-3 p-2">
                        <div style="display: block; text-align: center;">
                            <div style="font-size: 2.2rem; margin: 0px;"><b>
                                16
                            </b></div>
                            <p style="display: flex; justify-content: center; color: #d4a556;">
                                دقائق
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
                                20
                            </b></div>
                            <p style="display: flex; justify-content: center; color: #d4a556;">
                                دقائق
                            </p>
                            <p class="icons-txtpara text-center" style="display: flex; justify-content: center;">
                                Burj Al Arab
                            </p>
                            <br>
                        </div>
                    </div>
                    <div class="col-6 col-sm-6 col-md-4 col-lg-3 col-xl-3 p-2">
                        <div style="display: block; text-align: center;">
                            <div style="font-size: 2.2rem; margin: 0px;"><b>
                                20
                            </b></div>
                            <p style="display: flex; justify-content: center; color: #d4a556;">
                                دقائق
                            </p>
                            <p class="icons-txtpara text-center" style="display: flex; justify-content: center;">
                                Dubai Opera
                            </p>
                            <br>
                        </div>
                    </div>
                    <div class="col-6 col-sm-6 col-md-4 col-lg-3 col-xl-3 p-2">
                        <div style="display: block; text-align: center;">
                            <div style="font-size: 2.2rem; margin: 0px;"><b>
                                22
                            </b></div>
                            <p style="display: flex; justify-content: center; color: #d4a556;">
                                دقائق
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
                                41
                            </b></div>
                            <p style="display: flex; justify-content: center; color: #d4a556;">
                                دقائق
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
    
        <!--MAP-->
        <!-- <div class="map_section" style="display: flex; align-items: center; justify-content: space-evenly;">
            <img loading="eager" class="desktop img-style" src="https://hikalproperties.com/projects/assets/images/projects/oceanz/map.png" alt="HIKAL PROPERTIES" style="width: 60%" />
            <img loading="eager" class="mobile img-style" src="https://hikalproperties.com/projects/assets/images/projects/oceanz/map.png" alt="HIKAL PROPERTIES" style="width: 100%" />
        </div> -->
        <div class="mapouter">
            <div class="gmap_canvas">
                <iframe width="100%" height="100%" id="gmap_canvas" src="https://maps.google.com/maps?q=mercedes-benz places by binghatti&t=k&z=14&ie=UTF8&iwloc=&output=embed" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"></iframe>
                <style>
                    .mapouter {
                        position: relative;
                        text-align: right;
                        width: 100%;
                    }
                    .gmap_canvas {
                        overflow: hidden;
                        background: none!important;
                        height: 100%;
                        width: 100%;
                    }
                    iframe {
                        min-height: 40vh;
                        max-height: 100vh;
                    }
                </style>
            </div>
        </div>
    
        <!--AMENITIES-->
        <div class="fourth_section my-5">
            <?php include_once("../../components/amenities-ar.php"); ?>
        </div>
    
        <!--WHY DUBAI-->
        <div class="fifth_section my-5">
            <?php include_once("../../components/whydubai-ar.php"); ?>
        </div>
        
        <footer style="background-color: #000000;">
            <?php include_once("../../components/footer-copyright.php"); ?>
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
                    url: "../../controllers/add-lead-country-hybrid.php",
                    method: "GET",
                    data: formData,
                    dataType: "json",
                    success: function(response) {
                        if (response.otp) {
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

        <!-- SLIDER FORM -->
        <script>
            // OPEN LEAD FORM 
            const leadForm = document.getElementById('leadForm');

            function openLeadForm() {
                leadForm.classList.remove("hidden-form");
                leadForm.classList.add("visible-form");
            }

            // CLOSE SLIDER
            function closeLeadForm() {
                console.log(leadForm);
                leadForm.classList.remove("visible-form");
                leadForm.classList.add("hidden-form");
                leadForm.addEventListener('animationend', handleAnimationEnd);
            }

            function handleAnimationEnd() {
                leadForm.removeEventListener('animationend', handleAnimationEnd);
                console.log("Form closed");
            }

            setTimeout(openLeadForm, 5000);
        </script>
        <?php
    }
    ?>
    
</body>

</html>