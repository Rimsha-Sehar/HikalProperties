<?php
session_start();
error_reporting(0);
include ('../dbconfig/dbcon.php');

$ip = $_SERVER['REMOTE_ADDR'];
$device = $_SERVER['HTTP_USER_AGENT'];
?>

<?php

$protocol = isset ($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? 'https://' : 'http://';
$host = $_SERVER['HTTP_HOST'];
$uri = $_SERVER['REQUEST_URI'];

$fullUrl = $protocol . $host . $uri;
$_SESSION["page_url"] = $fullUrl;

$params = parse_url($fullUrl, PHP_URL_QUERY);
$_SESSION["params"] = $params;
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
    <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.4.0/mdb.min.js"
        integrity="sha512-0RxGTiFXp36+bSbJM+/QSTl1LDQ4pHdDZ8Ua9ZXl454qKSsYu228AOLHYfzx/rm4Dm6I+176ETRF55DpvrHTgw=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script> -->

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
    <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.min.js"
        integrity="sha512-HGOnQO9+SP1V92SrtZfjqxxtLmVzqZpjFFekvzZVWoiASSQgSr4cw9Kqd2+l8Llp4Gm0G8GIFJ4ddwZilcdb8A=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script> -->

    <!-- ICON -->
    <link rel="icon" type="image/png"
        href="https://hikalproperties.com/projects/assets/images/logo/hikalagency-icon.png" />

    <!-- STYLES -->
    <link rel="stylesheet" href="../assets/css/mobile-theme.css" />

    <!-- PIXEL -->
    <script src="https://hikalproperties.com/projects/gtm/gtm-pixel.js"></script>

    <style>
        /* ROOT */
        :root {
            /* --primary: #9d2f52; */
            --primary: #994e12;
            /* --primary: #cc661e; */
            /* --primary: #6c2411; */
            /* --secondary: #f1effa; */
            --secondary: #ebc683;
            /* --secondary: #f2dfcb; */
            /* --secondary: #f9a602; */
            --white: #FFFFFF;
            --black: #000000;
            --dark-bg-text: #797979;
            --light-bg-text: #EEEEEE;
        }
    </style>
</head>

<body class="arabic">
    <?php include_once ("../gtm/gtm-pixel.php"); ?>

    <div class="full-body">
        <!-- LOADING OVERLAY  -->
        <div id="loadingOverlay" class="overlay" style="display: none;">
            <?php include_once ("../components/loading-circle.php"); ?>
        </div>

        <!-- TOP SCROLL -->
        <button onclick="topFunction()" id="myBtn" title="Go to top" style="background: transparent;"><i
                class="fa fa-arrow-up primary-text"></i></button>

        <!-- BUTTOM NAV -->
        <div id="bottom-nav">
            <div class="row">
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
        </div>

        <!-- IMAGE AND LANGUAGE AND HEADING AND COUNTDOWN -->
        <div class="first_section pb-2">
            <!-- <img class="main-image" src="../assets/images/projects/empire/main.webp" loading="eager"
                alt="Hikal Real Estate"> -->
            <video class="main-video" autoplay loop muted playsinline>
                <source src="../assets/video/projects/empire/ramadan.mp4" type="video/mp4">
                Your browser does not support the video tag.
            </video>
            <!-- LANGUAGE -->
            <!-- <div class="language-overlay">
                <div class="language_selection">
                    <a href="https://hikalproperties.com/projects/empire/en?<?php echo $_SESSION["params"]; ?>">
                        <div class="d-flex align-items-center">
                            <img class="lang-flag"
                                src="https://hikalproperties.com/projects/assets/images/flags/en.webp" />
                            <span class="next-language">EN</span>
                        </div>
                    </a>
                </div>
            </div> -->
            <!-- HEADING -->
            <!-- <div class="heading-overlay">
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
            </div> -->
        </div>

        <!-- COUNTDOWN -->
        <div class="container container-fluid py-4">
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

        <!-- FORM -->
        <div class="second_section container container-fluid py-4 d-flex justify-content-center align-items-center">
            <div class="form-container" id="form-container">
                <?php
                $url = "https://" . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
                $parsedUrl = parse_url($url);
                $filename = ltrim($parsedUrl['path'], '/') . '?' . $parsedUrl['query'];
                ?>
                <!-- OTP FORM  -->
                <div id="otp-form" class="contact-form" dir="ltr" style="display: none;">
                    <form method="POST" action="../controllers/verify-otp.php">
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
                            <input type="text" name="lead_type" id="lead_type">
                            <input type="text" name="enquiry_type" id="enquiry_type">
                            <input type="text" name="lead_for" id="lead_for">
                            <input type="text" name="country_name" id="country_name">
                            <input type="text" name="file_name" id="file_name" value="<?php echo $filename; ?>">
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
                            <input type="text" id="Project" name="Project" value="Empire (Event)" />
                            <input type="text" id="LeadType" name="LeadType" value="Apartment" />
                            <input type="text" id="Language" name="Language" value="Arabic" />
                            <input type="text" id="Country" name="Country" value="" />
                            <input type="text" id="Filename" name="Filename" value="<?php echo $filename; ?>" />
                            <input type="text" id="LeadEmail1" name="LeadEmail1" value="" />

                            <input type="text" id="EnquiryRadio1" name="EnquiryRadio1" value="" />
                            <input type="text" id="LeadForRadio1" name="LeadForRadio1" value="" />
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
                        <input type="tel" name="phone[main]" id="mobile" placeholder="56 789 0123" required />

                        <!-- PURPOSE  -->
                        <label>
                            يوم الحضور
                        </label>
                        <div class="row" dir="rtl">
                            <div class="col-4 purpose-radio text-center">
                                <input class="" type="radio" name="AttendanceNote" id="AttendanceNote1" value="Friday"
                                    required>
                                <label for="AttendanceNote1" class="m-0">
                                    الجمعة
                                </label>
                            </div>
                            <div class="col-4 purpose-radio text-center">
                                <input class="mx-2" type="radio" name="AttendanceNote" id="AttendanceNote2" value="Saturday"
                                    required>
                                <label for="AttendanceNote2" class="m-0">
                                    السبت
                                </label>
                            </div>
                            <div class="col-4 purpose-radio text-center">
                                <input class="mx-2" type="radio" name="AttendanceNote" id="AttendanceNote3" value="Sunday"
                                    required>
                                <label for="AttendanceNote3" class="m-0">
                                    الأحد
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

        <!-- FOOTER -->
        <footer class="mt-4" style="background-color: var(--primary);">
            <?php include_once ("../components/footer-only-light.php"); ?>
        </footer>

        <!-- SCROLL TO FORM -->
        <!-- <script>
            function scrollToForm() {
                var element = document.getElementById("form-container");
                element.scrollIntoView({ behavior: "smooth", block: "start" });
            }
        </script> -->

        <!-- COUNTDOWN -->
        <script>
            const deadline = 'March 22 2024 23:59:59 GMT+0400';
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
                    url: "../controllers/add-lead-by-source.php",
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
    </div>
    <!-- BLOCKED DIV -->
    <div class="blocked-ip" style="display: none;">
        <div class="d-flex justify-content-center align-items-center text-center p-5"
            style="width: 100%; min-height: 100vh;">
            <h1 class="text-center" style="font-size: 2.2rem; line-height: 4.4rem;">
                تم اكتشاف بعض الأنشطة المشبوهة من جهازك! الرجاء التواصل مع
                <a href="tel:+97142722249" style="font-weight: bold;">+97142722249</a>
                للحصول على المساعدة الإضافية!
            </h1>
        </div>
    </div>

    <?php
    $checkip = mysqli_query($con, "SELECT byIP FROM is_blocked WHERE status = 1 AND byIP = '$ip'");
    $fetchip = mysqli_fetch_array($checkip);
    if (mysqli_num_rows($checkip) > 0) {
        echo '<script>displayBlocked();</script>';
    }
    ?>
    <!-- BLOCKED IP -->
    <script>
        function displayBlocked() {
            var blockedDiv = document.querySelector('.blocked-ip');
            var fullBody = document.querySelector('.full-body');

            blockedDiv.style.display = 'block';
            fullBody.style.display = 'none';
        }
    </script>

</body>

</html>
