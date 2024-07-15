<?php
session_start();
error_reporting(0);
include ('../../dbconfig/dbhybrid.php');

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
date_default_timezone_set('Asia/Dubai');
$cur_time = time();

?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Hikal Real Estate Properties | Binghatti Hills</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description"
        content="Hikal Real Estate | Hikal Properties | Binghatti Developments | Binghatti Hills by Binghatti Developments">

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

    <!-- ICON -->
    <link rel="icon" type="image/png"
        href="https://hikalproperties.com/projects/assets/images/logo/hikalagency-icon.png" />

    <!-- STYLES -->
    <link rel="stylesheet" href="../../assets/css/mobile-theme.css" />

    <!-- PIXEL -->
    <script src="https://hikalproperties.com/projects/gtm/gtm-pixel.js"></script>

    <style>
        /* ROOT */
        :root {
            --primary: #3280b0;
            /* --primary: #2d3f39; */
            /* --primary: #236589; */
            --secondary: #e0e8f6;
            --white: #FFFFFF;
            --black: #000000;
            --dark-bg-text: #797979;
            --light-bg-text: #EEEEEE;
        }
    </style>
</head>

<body class="arabic" dir="rtl">

    <?php include_once ("../../gtm/pixel.php"); ?>

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
            <?php include_once ("../../components/loading-circle.php"); ?>
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

        <div class="first_section">
            <img class="main-image" src="../../assets/images/projects/binghatti/hills/hills.jpg" loading="eager"
                alt="Hikal Real Estate">
            <!-- LANGUAGE -->
            <div class="language-overlay">
                <div class="language_selection">
                    <a href="https://hikalproperties.com/projects/binghatti/hills/en?<?php echo $_SESSION["params"]; ?>">
                        <div class="d-flex align-items-center">
                            <img class="lang-flag" src="https://hikalproperties.com/projects/assets/images/flags/en.webp" />
                            <span class="next-language">EN</span>
                        </div>
                    </a>
                </div>
            </div>
            <!-- HEADING -->
            <div class="heading-overlay">
                <div class="heading-box">
                    <div class="d-flex justify-content-center align-items-center">
                        <div class="large-number px-2 m-0">
                            1%
                        </div>
                        <h1 class="d-flex flex-column px-2 m-0">
                            <span>
                                أقساط
                            </span>
                            <span>
                                شهرية
                            </span>
                        </h1>
                    </div>
                    <h1 class="text-center px-2 m-0">
                        لمدة 80 شهر
                    </h1>
                </div>
            </div>
            <!-- COUNTDOWN -->
            <div class="countdown-overlay">
                <div class="countdown-text" style="width: auto;">
                    الفرصة لفترة محدودة
                </div>
                <div class="countdown-clock">
                    <div class="clock">
                        <div class="clock__item">
                            <span class="days"></span>
                        </div>
                        <div class="clock__colon">
                            <div class="clock__colon-item"></div>
                            <div class="clock__colon-item"></div>
                        </div>
                        <div class="clock__item">
                            <span class="hours"></span>
                        </div>
                        <div class="clock__colon">
                            <div class="clock__colon-item"></div>
                            <div class="clock__colon-item"></div>
                        </div>
                        <div class="clock__item">
                            <span class="minutes"></span>
                        </div>
                        <div class="clock__colon">
                            <div class="clock__colon-item"></div>
                            <div class="clock__colon-item"></div>
                        </div>
                        <div class="clock__item">
                            <span class="seconds"></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- FORM -->
        <div class="second_section container container-fluid my-4 d-flex justify-content-center align-items-center">
            <div class="form-container" id="form-container">
                <?php
                $url = "https://" . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
                $parsedUrl = parse_url($url);
                $filename = ltrim($parsedUrl['path'], '/') . '?' . $parsedUrl['query'];
                ?>
                <!-- OTP FORM  -->
                <div id="otp-form" class="contact-form" dir="ltr" style="display: none;">
                    <form method="POST" action="../../controllers/verify-otp.php">
                        <h5 style="text-align: center;">
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
                            <input type="text" name="developer_name" id="developer_name">
                            <input type="text" name="lead_type" id="lead_type">
                            <input type="text" name="enquiry_type" id="enquiry_type">
                            <input type="text" name="lead_for" id="lead_for">
                            <input type="text" name="country_name" id="country_name">
                            <input type="text" name="file_name" id="file_name" value="<?php echo $filename; ?>">
                            <!-- <input type="text" name="lead_source" id="lead_source"> -->
                        </div>

                        <button type="submit" class="mt-3" style="font-weight: bold;">
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
                    <form id="lead-form" dir="ltr" onsubmit="return submitLeadForm();">
                        <div style="display: none">
                            <input type="text" id="Project" name="Project" value="Hills" />
                            <input type="text" id="Developer" name="Developer" value="Binghatti" />
                            <input type="text" id="LeadType" name="LeadType" value="Apartment" />
                            <input type="text" id="Language" name="Language" value="Arabic" />
                            <input type="text" id="Country" name="Country" value="United Arab Emirates" />
                            <input type="text" id="Filename" name="Filename" value="<?php echo $filename; ?>" />
                            <input type="text" id="LeadEmail1" name="LeadEmail1" value="" />
                            <!-- <input type="text" id="LeadSource" name="LeadSource" value="" /> -->
                        </div>
                        <!-- NAME -->
                        <label>
                            الاسم
                        </label>
                        <input type="text" name="LeadName1" id="LeadName1" required />

                        <!-- CONTACT NUMBER -->
                        <label>
                            رقم الاتصال

                        </label>
                        <input type="tel" name="phone[main]" id="mobile" placeholder="5* *** ****" required />

                        <!-- HOW MANY BEDROOMS -->
                        <label>
                            كم عدد غرف النوم؟
                        </label>
                        <div class="enquiry-radio" style="display: flex;" dir="rtl">
                            <input class="mx-2" type="radio" name="EnquiryRadio1" id="EnquiryRadio1" value="Studio" required>
                            <label for="EnquiryRadio1" class="m-0">
                                <div class="d-flex justify-content-between align-items-center">
                                    <div class="px-2">
                                        استوديو + حمام سباحة
                                    </div>
                                    <div class="d-flex align-items-center">
                                        <i class="fa-solid fa-water-ladder px-2"></i>
                                        <i class="fa-solid fa-house px-2"></i>
                                    </div>
                                </div>
                            </label>
                        </div>
                        <div class="enquiry-radio" style="display: flex;" dir="rtl">
                            <input class="mx-2" type="radio" name="EnquiryRadio1" id="EnquiryRadio2" value="1 Bedroom" required>
                            <label for="EnquiryRadio2" class="m-0">
                                <div class="d-flex justify-content-between align-items-center">
                                    <div class="px-2">
                                        غرفة نوم + حمام سباحة
                                    </div>
                                    <div class="d-flex align-items-center">
                                        <i class="fa-solid fa-water-ladder px-2"></i>
                                        <i class="fa-solid fa-bed px-2"></i>
                                    </div>
                                </div>
                            </label>
                        </div>
                        <div class="enquiry-radio" style="display: flex;" dir="rtl">
                            <input class="mx-2" type="radio" name="EnquiryRadio1" id="EnquiryRadio3" value="2 Bedrooms"
                                required>
                            <label for="EnquiryRadio3" class="m-0">
                                <div class="d-flex justify-content-between align-items-center">
                                    <div class="px-2">
                                        غرفتين نوم + حمام سباحة
                                    </div>
                                    <div class="d-flex align-items-center">
                                        <i class="fa-solid fa-water-ladder px-2"></i>
                                        <i class="fa-solid fa-bed px-2"></i>
                                    </div>
                                </div>
                            </label>
                        </div>
                        <div class="enquiry-radio" style="display: flex;" dir="rtl">
                            <input class="mx-2" type="radio" name="EnquiryRadio1" id="EnquiryRadio4" value="Retail" required>
                            <label for="EnquiryRadio4" class="m-0">
                                <div class="d-flex justify-content-between align-items-center">
                                    <div class="px-2">
                                        Retail
                                    </div>
                                    <div class="d-flex align-items-center">
                                        <i class="fa-solid fa-shop px-2"></i>
                                    </div>
                                </div>
                            </label>
                        </div>

                        <!-- PURPOSE  -->
                        <label>
                            غرض الاستفسار
                        </label>
                        <div class="row">
                            <div class="col-6 purpose-radio text-center" dir="rtl">
                                <input class="" type="radio" name="LeadForRadio1" id="PurposeRadio1" value="Investment"
                                    required>
                                <label for="PurposeRadio1" class="m-0">
                                    استثمار
                                </label>
                            </div>
                            <div class="col-6 purpose-radio text-center" dir="rtl">
                                <input class="mx-2" type="radio" name="LeadForRadio1" id="PurposeRadio2" value="End-user"
                                    required>
                                <label for="PurposeRadio2" class="m-0">
                                    سكني
                                </label>
                            </div>
                        </div>
                        <!-- BUTTON  -->
                        <button type="submit" class="submit-click my-3">
                            إرسال
                        </button>
                    </form>
                    <?php
                }
                ?>
            </div>
        </div>

        <!-- LOCATION BENEFITS -->
        <!-- <div class="secondary-bg"> -->
        <div class="third_section container container-fluid mt-5 py-5">
            <h4 class="primary-text text-center mb-5">
                مميزات الموقع
            </h4>
            <div class="row container container-fluid">
                <!-- DUBAI HILLS MALL  -->
                <div class="col-6 col-md-4 col-lg-3 pb-4">
                    <div class="d-flex flex-column justify-content-start align-items-center">
                        <img src="../../assets/images/projects/binghatti/hills/dubaihillsmall.svg" width="40" />
                        <div class="location-name my-2 text-black">
                            DUBAI HILLS MALL
                        </div>
                    </div>
                </div>
                <!-- PALM JUMEIRAH -->
                <div class="col-6 col-md-4 col-lg-3 pb-4">
                    <div class="d-flex flex-column justify-content-start align-items-center">
                        <img src="../../assets/images/icons/blue/palm.png" width="40" class="col-4" />
                        <!-- <div class="location-timing">
                                <span class="location-time px-1">
                                    25
                                </span>
                                <span class="px-1">MIN</span>
                            </div> -->
                        <div class="location-name my-2 text-black">
                            نخلة جميرا
                        </div>
                    </div>
                </div>
                <!-- BURJ AL ARAB -->
                <div class="col-6 col-md-4 col-lg-3 pb-4">
                    <div class="d-flex flex-column justify-content-start align-items-center">
                        <img src="../../assets/images/icons/blue/palm.png" width="40" class="col-4" />
                        <!-- <div class="location-timing">
                                <span class="location-time px-1">
                                    25
                                </span>
                                <span class="px-1">MIN</span>
                            </div> -->
                        <div class="location-name my-2 text-black">
                            BURJ AL ARAB
                        </div>
                    </div>
                </div>
                <!-- BUTTERFLY GARDEN -->
                <div class="col-6 col-md-4 col-lg-3 pb-4">
                    <div class="d-flex flex-column justify-content-start align-items-center">
                        <img src="../../assets/images/icons/blue/palm.png" width="40" class="col-4" />
                        <!-- <div class="location-timing">
                                <span class="location-time px-1">
                                    25
                                </span>
                                <span class="px-1">MIN</span>
                            </div> -->
                        <div class="location-name my-2 text-black">
                            BUTTERFLY GARDEN
                        </div>
                    </div>
                </div>
                <!-- MIRACLE GARDEN -->
                <div class="col-6 col-md-4 col-lg-3 pb-4">
                    <div class="d-flex flex-column justify-content-start align-items-center">
                        <img src="../../assets/images/icons/blue/palm.png" width="40" class="col-4" />
                        <!-- <div class="location-timing">
                                <span class="location-time px-1">
                                    25
                                </span>
                                <span class="px-1">MIN</span>
                            </div> -->
                        <div class="location-name my-2 text-black">
                            MIRACLE GARDEN
                        </div>
                    </div>
                </div>
                <!-- GLOBAL VILLAGE -->
                <div class="col-6 col-md-4 col-lg-3 pb-4">
                    <div class="d-flex flex-column justify-content-start align-items-center">
                        <img src="../../assets/images/icons/blue/palm.png" width="40" class="col-4" />
                        <!-- <div class="location-timing">
                                <span class="location-time px-1">
                                    25
                                </span>
                                <span class="px-1">MIN</span>
                            </div> -->
                        <div class="location-name my-2 text-black">
                            GLOBAL VILLAGE
                        </div>
                    </div>
                </div>
                <!-- JUMEIRAH GOLF ESTATES -->
                <div class="col-6 col-md-4 col-lg-3 pb-4">
                    <div class="d-flex flex-column justify-content-start align-items-center">
                        <img src="../../assets/images/icons/blue/palm.png" width="40" class="col-4" />
                        <!-- <div class="location-timing">
                                <span class="location-time px-1">
                                    25
                                </span>
                                <span class="px-1">MIN</span>
                            </div> -->
                        <div class="location-name my-2 text-black">
                            JUMEIRAH GOLF ESTATES
                        </div>
                    </div>
                </div>
                <!-- IMG WORLDS OF ADVENTURE -->
                <div class="col-6 col-md-4 col-lg-3 pb-4">
                    <div class="d-flex flex-column justify-content-start align-items-center">
                        <img src="../../assets/images/icons/blue/palm.png" width="40" class="col-4" />
                        <!-- <div class="location-timing">
                                <span class="location-time px-1">
                                    25
                                </span>
                                <span class="px-1">MIN</span>
                            </div> -->
                        <div class="location-name my-2 text-black">
                            IMG WORLDS OF ADVENTURE
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- </div> -->

        <!-- BUTTOM NAV -->
        <!-- <div id="bottom-nav">
            <div class="row container container-fluid">
                <div class="col-4 d-flex justify-content-center align-items-center">
                    <a href="tel:+971585550775">
                        <i class="fa-solid fa-phone footer-icon"></i>
                    </a>
                </div>
                <div class="col-4 d-flex justify-content-center align-items-center">
                    <a href="https://wa.me/971585550775" target="_blank">
                        <i class="fa-brands fa-whatsapp footer-icon"></i>
                    </a>
                </div>
                <div class="col-4 d-flex justify-content-center align-items-center">
                    <a href="mailto:info@hikalagency.ae">
                        <i class="fa-solid fa-envelope footer-icon"></i>
                    </a>
                </div>
            </div>
        </div> -->
        <div id="bottom-nav" onclick="scrollToForm();">
            <div style="font-weight: bold; font-size: 1rem; color: var(--text-on-gold)">
                REGISTER NOW
            </div>
        </div>

        <!-- FOOTER -->
        <footer style="background-color: var(--primary);">
            <?php include_once ("../../components/footer-only-light.php"); ?>
        </footer>

        <!-- COUNTDOWN -->
        <script>
            // const deadline = 'May 20 2024 23:59:59 GMT+0400';
            const deadline = '<?php include_once ("../../data/offer-date.php"); ?>';
            function getTimeRemaining(endtime) {
                const total = Date.parse(endtime) - Date.parse(new Date());
                const seconds = Math.floor((total / 1000) % 60);
                const minutes = Math.floor((total / 1000 / 60) % 60);
                const hours = Math.floor((total / (1000 * 60 * 60)) % 24);
                const days = Math.floor(total / (1000 * 60 * 60 * 24));

                return {
                    total,
                    days,
                    hours,
                    minutes,
                    seconds
                };
            }

            function initializeClock(clockClass, endtime) {
                const clock = document.querySelector(clockClass);
                const daysSpan = clock.querySelector('.days');
                const hoursSpan = clock.querySelector('.hours');
                const minutesSpan = clock.querySelector('.minutes');
                const secondsSpan = clock.querySelector('.seconds');
                function updateClock() {
                    const t = getTimeRemaining(endtime);
                    daysSpan.innerHTML = ('0' + t.days).slice(-2);
                    hoursSpan.innerHTML = ('0' + t.hours).slice(-2);
                    minutesSpan.innerHTML = ('0' + t.minutes).slice(-2);
                    secondsSpan.innerHTML = ('0' + t.seconds).slice(-2);
                    if (t.total <= 0) {
                        clearInterval(timeinterval);
                    }
                }
                updateClock(); // run function once at first to avoid delay
                var timeinterval = setInterval(updateClock, 1000);
            }

            initializeClock('.clock', deadline);
        </script>

        <!-- SCROLL TO FORM -->
        <script>
            function scrollToForm() {
                var formDiv = document.getElementById('form-container');
                formDiv.scrollIntoView({ behavior: 'smooth' });
            }
        </script>

        <!-- HIDE BOTTOM NAV ON SCROLL TO END -->
        <script>
            window.addEventListener('scroll', function () {
                var bottomNav = document.getElementById('bottom-nav');
                var scrollPosition = window.pageYOffset || document.documentElement.scrollTop;
                var windowHeight = window.innerHeight;
                var documentHeight = document.body.scrollHeight;

                // console.log('Scroll Position:', scrollPosition);
                // console.log('Window Height:', windowHeight);
                // console.log('Document Height:', documentHeight);

                if (scrollPosition + windowHeight >= documentHeight) {
                    bottomNav.style.display = 'none';
                } else {
                    bottomNav.style.display = 'block';
                }
            });
        </script>


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

                var Developer = document.getElementById('developer_name');
                Developer.value = $("#Developer").val();

                var LeadType = document.getElementById('lead_type');
                LeadType.value = $("#LeadType").val();

                // var LeadSource = document.getElementById('lead_source');
                // LeadSource.value = $("#LeadSource").val();

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
