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

$params = parse_url($fullUrl, PHP_URL_QUERY);
$_SESSION["params"] = $params;
?>

<?php
// date_default_timezone_set('Asia/Dubai');
// $cur_time = time();

// $hashed_ip = hash('sha256', $ip);

// $url = 'https://staging.hikalcrm.com/api/validate-snap';

// $data = array(
//     "pixel_id" => "4992376c-fb59-4050-8c91-bdb468b086d4",
//     "event_type" => "PAGE_VIEW",
//     "timestamp" => (string) $cur_time,
//     "client_dedup_id" => (string) round((time() * 1000) * (rand() / getrandmax())),
//     "event_conversion_type" => "WEB",
//     "event_tag" => "Hikal Properties",
//     "page_url" => (string) $fullUrl,
//     "user_agent" => (string) $device,
//     "hashed_ip_address" => (string) $hashed_ip,
//     "item_category" => "Empire",
// );

// $token = "eyJhbGciOiJIUzI1NiIsImtpZCI6IkNhbnZhc1MyU0hNQUNQcm9kIiwidHlwIjoiSldUIn0.eyJhdWQiOiJjYW52YXMtY2FudmFzYXBpIiwiaXNzIjoiY2FudmFzLXMyc3Rva2VuIiwibmJmIjoxNjk4MTYxMzEwLCJzdWIiOiJkNzUxOGRkOS02YWM0LTQ0YjUtYmY5Ni0xY2JmNWUwZDBmOTR-UFJPRFVDVElPTn5lZjAwYzBiYS03NmQ5LTQwYmUtYmYxNi05NjExZGY5YzM5OWIifQ.bA8_O0hp4eIrg83dCkrKaNm8CZjmPK-E1KzFLmJUBbY";

// $ch = curl_init($url);

// curl_setopt($ch, CURLOPT_POST, true);
// curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
// curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
// curl_setopt(
//     $ch,
//     CURLOPT_HTTPHEADER,
//     array(
//         'Content-Type: application/json',
//         'Authorization: Bearer ' . $token
//     )
// );

// $response = curl_exec($ch);

// if (curl_errno($ch)) {
//     // echo 'Error: ' . curl_error($ch);
// }

// curl_close($ch);
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Hikal Real Estate Properties | Empire Estates</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description"
        content="Hikal Real Estate | Hikal Properties | Empire Developments | Empire Estates by Empire Developments">

    <!-- GOOGLE FONTS -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Noto+Sans+Hebrew:wght@300;400&family=Noto+Kufi+Arabic:wght@200;300;600&family=Playfair+Display:ital@0;1&family=Raleway:wght@200;400;600;800&display=swap"
        rel="stylesheet">

    <!-- FONT AWESOME -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
        integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- MDB -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.2.0/mdb.min.css" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.4.0/mdb.min.js"
        integrity="sha512-0RxGTiFXp36+bSbJM+/QSTl1LDQ4pHdDZ8Ua9ZXl454qKSsYu228AOLHYfzx/rm4Dm6I+176ETRF55DpvrHTgw=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <!-- JQUERY -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js"
        integrity="sha512-3gJwYpMe3QewGELv8k/BX9vcqhryRdzRMxVfq6ngyWXwo03GFEzjsUm8Q7RZcHPHksttq7/GFoxjCVUjkjvPdw=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <!-- DROPDOWN COUNTRY CODE  -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/js/intlTelInput.min.js"
        integrity="sha512-DNeDhsl+FWnx5B1EQzsayHMyP6Xl/Mg+vcnFPXGNjUZrW28hQaa1+A4qL9M+AiOMmkAhKAWYHh1a+t6qxthzUw=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/css/intlTelInput.css"
        integrity="sha512-gxWow8Mo6q6pLa1XH/CcH8JyiSDEtiwJV78E+D+QP0EVasFs8wKXq16G8CLD4CJ2SnonHr4Lm/yY2fSI2+cbmw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- SLICK CAROUSEL -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.min.js"
        integrity="sha512-HGOnQO9+SP1V92SrtZfjqxxtLmVzqZpjFFekvzZVWoiASSQgSr4cw9Kqd2+l8Llp4Gm0G8GIFJ4ddwZilcdb8A=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <!-- ICON -->
    <link rel="icon" type="image/png"
        href="https://hikalproperties.com/projects/assets/images/logo/hikalagency-icon.png" />

    <!-- STYLES -->
    <link rel="stylesheet" href="../../assets/css/hikal-theme.css" />
    <link rel="stylesheet" href="https://hikalproperties.com/projects/assets/css/animation.css" />
    <link rel="stylesheet" href="../../assets/css/parallax.css" />

    <!-- PIXEL -->
    <script src="https://hikalproperties.com/projects/gtm/pixel.js"></script>

    <style>
        #parallax-world-of-ugg .parallax-one {
            background-image: url(https://hikalproperties.com/projects/assets/images/projects/empire/ee-main.jpg);
        }

        #parallax-world-of-ugg .parallax-two {
            background-image: url(https://hikalproperties.com/projects/assets/images/projects/empire/ee-map.png);
        }

        #parallax-world-of-ugg .parallax-three {
            background-image: url(https://hikalproperties.com/projects/assets/images/projects/empire/ee-outdoor.jpg);
        }

        body {
            background-color: #000000;
        }
    </style>
</head>

<body class="arabic" dir="rtl">

    <?php include_once("../../gtm/pixel.php"); ?>

    <?php
    $checkip = mysqli_query($con, "SELECT byIP FROM is_blocked WHERE status = 1 AND byIP = '$ip'");
    $fetchip = mysqli_fetch_array($checkip);
    if (mysqli_num_rows($checkip) > 0) {
        ?>
        <div class="d-flex justify-content-center align-items-center text-center p-5"
            style="width: 100%; min-height: 100vh;">
            <h1 class="text-center" style="font-size: 2.2rem; line-height: 4.4rem;">
                تم اكتشاف بعض الأنشطة المشبوهة من جهازك! الرجاء التواصل مع
                <a href="tel:+97142722249" class="gold-grad" style="font-weight: bold;">+97142722249</a>
                للحصول على المساعدة الإضافية!
            </h1>
        </div>
        <?php
    } else {
        ?>
        <!-- LOADING OVERLAY  -->
        <div id="loadingOverlay" class="overlay" style="display: none;">
            <?php include_once("../../components/loading-circle.php"); ?>
        </div>

        <!-- TOP SCROLL -->
        <button onclick="topFunction()" id="myBtn" title="Go to top" style="background: transparent;"><i
                class="fa fa-arrow-up gold-grad"></i></button>

        <!-- WHATSAPP  -->
        <?php
        // $wa_project = "Mercedes-Benz";
        // $wa_lang = "Arabic";
        // include_once("../../components/whatsapp-brand.php");
        ?>

        <!-- RAMADAN  -->
        <?php include_once("../../components/ramadan-anim.php"); ?>

        <div class="section_1">
            <div class="language_selection" style="padding: 10px;">
                <a href="https://hikalproperties.com/projects/empire/en?<?php echo $_SESSION["params"]; ?>">
                    <div class="px-2 gold-grad d-flex align-items-center">
                        <img class="lang-flag mx-1" src="https://hikalproperties.com/projects/assets/images/flags/en.jpg" />
                        EN
                    </div>
                </a>
            </div>
            <!-- <div class="heading">
                <div class="row text-center d-flex align-items-center py-2">
                    <div class="col-12" style="width: 100vw;">
                        <h1 class="my-2" style="text-align: center; line-height: 2rem; font-weight: 800;">
                            <span class="gold-grad-anim">تملك بأقساط </span>
                            <span class="num-glow">1%</span>
                            <span class="gold-grad-anim"> شهريا لمدة </span>
                            <span class="num-glow">80</span>
                            <span class="gold-grad-anim">شهر</span>
                        </h1>
                        <h3 class="text-expand mt-2" style="text-align: center; line-height: 1.5rem; font-size: 1rem; ">
                            وفرصتك قبل الطرح
                        </h3>
                        <h3 class="mt-2"
                            style="text-align: center; line-height: 1.5rem; font-weight: 500; font-size: 1rem; ">
                            أحصل علي آلمطبخ مجهّز بالكامل
                        </h3>
                    </div>
                </div>
            </div> -->
        </div>

        <style>
            .img-wrapper {
    display: inline-block;
    overflow: hidden;
    border: 1px solid gray;
}

.img-wrapper img {
    -webkit-transition: all .2s ease;
    -moz-transition: all .2s ease;
    -ms-transition: all .2s ease;
    -o-transition: all .2s ease;
    transition: all .2s ease;

    vertical-align: middle;
}

.img-wrapper img:hover {
    -webkit-transform:scale(1.5); /* Safari and Chrome */
    -moz-transform:scale(1.5); /* Firefox */
    -ms-transform:scale(1.5); /* IE 9 */
    -o-transform:scale(1.5); /* Opera */
    transform:scale(1.5);
}
            </style>
            <div class="img-wrapper">
    <img src="https://hikalproperties.com/projects/assets/images/projects/empire/ee-main.jpg" />
</div>

        <div id="parallax-world-of-ugg">
            <section>
                <div class="title">
                    <div class="row text-center d-flex align-items-center py-2">
                        <div class="col-12">
                            <h1 class="my-2" style="text-align: center; line-height: 2rem; font-weight: 800;">
                                <span class="gold-grad-anim">تملك بأقساط </span>
                                <span class="num-glow">1%</span>
                                <span class="gold-grad-anim"> شهريا لمدة </span>
                                <span class="num-glow">80</span>
                                <span class="gold-grad-anim">شهر</span>
                            </h1>
                            <h3 class="text-expand mt-2" style="text-align: center; line-height: 1.5rem; font-size: 1rem; ">
                                وفرصتك قبل الطرح
                            </h3>
                            <h3 class="mt-2"
                                style="text-align: center; line-height: 1.5rem; font-weight: 500; font-size: 1rem; ">
                                أحصل علي آلمطبخ مجهّز بالكامل
                            </h3>
                        </div>
                    </div>
            </section>

            <section>
                <div class="parallax-one"></div>
            </section>

            <section>
                <!-- FORM -->
                <style>
                    .form-section {
                        width: 100%;
                        display: flex;
                        justify-content: end;
                        z-index: 1;
                    }

                    .containerform {
                        width: 100%;
                        border-radius: 0px;
                    }
                </style>

                <div class="form-section">
                    <div class="containerform">
                        <div class="inputs container container-fluid" style="font-weight: 400;">
                            <?php
                            $url = "https://" . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
                            $parsedUrl = parse_url($url);
                            $filename = ltrim($parsedUrl['path'], '/') . '?' . $parsedUrl['query'];
                            ?>
                            <!-- OTP FORM  -->
                            <div id="otp-form" class="contact-form" dir="ltr" style="display: none;">
                                <form method="POST" action="../../controllers/verify-otp.php">
                                    <h5 class="gold-grad" style="text-align: center;">
                                        OTP has been sent to
                                        <span id="phone_no"></span>
                                    </h5>
                                    <input type="text" name="otp" id="otp" maxlength="6" pattern="\d*" inputmode="numeric"
                                        oninput="this.value = this.value.replace(/[^0-9]/g, '');">

                                    <div style="display: none">
                                        <input type="text" name="phone_number" id="phone_number">
                                        <input type="text" name="lead_name" id="lead_name">
                                        <input type="text" name="lead_email" id="lead_email">
                                        <input type="text" name="lang" id="lang">
                                        <input type="text" name="project_name" id="project_name">
                                        <input type="text" name="lead_type" id="lead_type">
                                        <input type="text" name="enquiry_type" id="enquiry_type">
                                        <input type="text" name="lead_for" id="lead_for">
                                        <input type="text" name="country_name" id="country_name">
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
                                <div class="p-5 d-flex justify-content-center align-items-center text-center"
                                    style="width: 100%; height: 100%; line-height: 2.5rem;">
                                    شكراً لتسجيلك معنا. سيقوم محترفونا بالتواصل معك قريباً!
                                </div>
                                <?php
                            } else {
                                ?>
                                <!--NEW FORM-->
                                <div class="contact-form" dir="ltr">
                                    <form id="lead-form" onsubmit="return submitLeadForm();">
                                        <div style="display: none">
                                            <input type="text" id="Project" name="Project"
                                                value="Empire Estates (Private Pool)" />
                                            <input type="text" id="LeadType" name="LeadType" value="Apartment" />
                                            <input type="text" id="Language" name="Language" value="Arabic" />
                                            <input type="text" id="Country" name="Country" value="" /> <input type="text"
                                                id="Country" name="Country" value="" />
                                            <input type="text" id="Filename" name="Filename" value="<?php echo $filename; ?>" />
                                            <input type="text" id="LeadEmail1" name="LeadEmail1" value="" />
                                        </div>

                                        <div class="row">
                                            <div class="col-12 col-md-6 col-lg-6 px-0 px-md-3 px-lg-6">
                                                <!-- NAME -->
                                                <label class="gold-grad">الاسم</label>
                                                <input type="text" name="LeadName1" id="LeadName1" required />
                                            </div>
                                            <div class="col-12 col-md-6 col-lg-6 px-0 px-md-3 px-lg-6">
                                                <!-- CONTACT NUMBER -->
                                                <label class="gold-grad">رقم الاتصال</label>
                                                <input type="tel" name="phone[main]" id="mobile" style="color: #000000;"
                                                    placeholder="56 789 0123" required />
                                            </div>
                                            <div class="col-12 col-md-6 col-lg-6 px-0 px-md-3 px-lg-6">
                                                <!-- HOW MANY BEDROOMS -->
                                                <label class="gold-grad">كم عدد غرف النوم؟</label>
                                                <div style="display: flex;" dir="rtl">
                                                    <input class="mx-2" type="radio" name="EnquiryRadio1" id="EnquiryRadio1"
                                                        value="Studio" style="width: 20px;" required>
                                                    <label for="EnquiryRadio1"
                                                        style="margin-top: 0px; padding-left: 7px; color: #fff;">
                                                        استوديو + حمام سباحة
                                                    </label>
                                                </div>
                                                <div style="display: flex;" dir="rtl">
                                                    <input class="mx-2" type="radio" name="EnquiryRadio1" id="EnquiryRadio2"
                                                        value="1 Bedroom" style="width: 20px;" required>
                                                    <label for="EnquiryRadio2"
                                                        style="margin-top: 0px; padding-left: 7px; color: #fff;">
                                                        غرفة نوم + حمام سباحة
                                                    </label>
                                                </div>
                                                <div style="display: flex;" dir="rtl">
                                                    <input class="mx-2" type="radio" name="EnquiryRadio1" id="EnquiryRadio3"
                                                        value="2 Bedrooms" style="width: 20px;" required>
                                                    <label for="EnquiryRadio3"
                                                        style="margin-top: 0px; padding-left: 7px; color: #fff;">
                                                        غرفتين نوم + حمام سباحة
                                                    </label>
                                                </div>
                                                <div style="display: flex;" dir="rtl">
                                                    <input class="mx-2" type="radio" name="EnquiryRadio1" id="EnquiryRadio4"
                                                        value="3 Bedrooms" style="width: 20px;" required>
                                                    <label for="EnquiryRadio4"
                                                        style="margin-top: 0px; padding-left: 7px; color: #fff;">
                                                        ثلاث غرف نوم + حمام سباحة
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="col-12 col-md-6 col-lg-6 px-0 px-md-3 px-lg-6">
                                                <!-- PURPOSE  -->
                                                <label class="gold-grad">غرض الاستفسار</label>
                                                <div style="display: flex;" dir="rtl">
                                                    <input class="mx-2" type="radio" name="LeadForRadio1" id="PurposeRadio1"
                                                        value="Investment" style="width: 20px;" required>
                                                    <label for="PurposeRadio1"
                                                        style="margin-top: 0px; padding-left: 7px; color: #fff;">
                                                        استثمار
                                                    </label>
                                                </div>
                                                <div style="display: flex;" dir="rtl">
                                                    <input class="mx-2" type="radio" name="LeadForRadio1" id="PurposeRadio2"
                                                        value="End-user" style="width: 20px;" required>
                                                    <label for="PurposeRadio2"
                                                        style="margin-top: 0px; padding-left: 7px; color: #fff;">
                                                        سكني
                                                    </label>
                                                </div>
                                            </div>
                                        </div>

                                        <div id="FormButton" name="FormButton" class="pb-4">
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
            </section>

            <section>
                <div class="parallax-three">
                </div>
            </section>

            <section>
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
                                        05
                                    </b></div>
                                <p style="display: flex; justify-content: center; color: #d4a556;">
                                    دقائق
                                </p>
                                <p class="icons-txtpara text-center" style="display: flex; justify-content: center;">
                                    حديقة دبي للزهور العجيبة
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
                                    دقائق
                                </p>
                                <p class="icons-txtpara text-center" style="display: flex; justify-content: center;">
                                    مول الإمارات
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
                                    دقائق
                                </p>
                                <p class="icons-txtpara text-center" style="display: flex; justify-content: center;">
                                    برج خليفة
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
                                    دقائق
                                </p>
                                <p class="icons-txtpara text-center" style="display: flex; justify-content: center;">
                                    مرسى دبي
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
                                    دقائق
                                </p>
                                <p class="icons-txtpara text-center" style="display: flex; justify-content: center;">
                                    مطار دبي الدولي
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
                                    دقائق
                                </p>
                                <p class="icons-txtpara text-center" style="display: flex; justify-content: center;">
                                    مطار آل مكتوم الدولي
                                </p>
                                <br>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>

        <!--IMAGE-->
        <div class="map_section pb-5" style="display: flex; align-items: center; justify-content: space-evenly;">
            <img loading="eager" class="desktop img-style"
                src="https://hikalproperties.com/projects/assets/images/projects/empire/ee-map.png" alt="HIKAL PROPERTIES"
                style="width: 60%" />
            <img loading="eager" class="mobile img-style"
                src="https://hikalproperties.com/projects/assets/images/projects/empire/ee-map.png" alt="HIKAL PROPERTIES"
                style="width: 100%" />
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
            window.onscroll = function () {
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

                // TIKTOK SUBMIT FORM
                // if (LeadSource.value == "Campaign TikTok") {
                //     ttq.track('SubmitForm');
                // }
                // TWITTER SUBMIT FORM
                // if (LeadSource.value == "Campaign Twitter") {
                //     twq('event', 'tw-ohu9a-oivb1', {
                //         phone_number: encodeURIComponent(full_number)
                //     });
                // }

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
                    url: "../../controllers/add-lead-by-source.php",
                    method: "GET",
                    data: formData,
                    dataType: "json",
                    success: function (response) {
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
                    error: function (jqXHR, textStatus, errorThrown) {
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
