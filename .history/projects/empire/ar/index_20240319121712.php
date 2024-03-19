<?php
session_start();
error_reporting(0);
include ('../../dbconfig/dbhybrid.php');

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
    <!-- <link rel="stylesheet" href="../../assets/css/mobile-theme.css" /> -->
    <!-- <link rel="stylesheet" href="https://hikalproperties.com/projects/assets/css/animation.css" /> -->
    <!-- <link rel="stylesheet" href="../../assets/css/parallax.css" /> -->

    <!-- PIXEL -->
    <script src="https://hikalproperties.com/projects/gtm/pixel.js"></script>

    <style>
        /* ROOT */
        :root {
            --primary: #9d2f52;
            --secondary: #f1effa;
            --white: #FFFFFF;
            --black: #000000;
            --dark-bg-text: #797979;
            --light-bg-text: #EEEEEE;
        }

        /* @font-face {
            font-family: 'Arabic';
            src: url('../../assets/font/AraHamahSahetAlAssi.ttf') format('truetype');
        } */

        /* BODY */
        body {
            overflow-x: hidden;
            color: var(--dark-bg-text);
            background: var(--white);
        }

        /* SCROLLBAR */
        ::-webkit-scrollbar {
            width: 6px;
        }

        ::-webkit-scrollbar-track {
            background: var(--white);
        }

        ::-webkit-scrollbar-thumb {
            background-color: var(--primary);
            border-radius: 10px;
        }

        /* SCREENS ON DESKTOP VIEW */
        .desktop {
            display: block;
        }

        .mobile {
            display: none;
        }

        /* HEADINGS */
        h1,
        h2,
        h3,
        h4,
        h5,
        h6 {
            margin: 15px 0px;
        }

        h1 {
            font-size: 1.8rem;
            /* font-weight: bold; */
        }

        h3,
        h4 {
            font-weight: bold;
        }

        h6 {
            font-weight: 200;
            line-height: 2rem;
        }

        /* ARABIC  */
        .arabic {
            direction: rtl;
            font-family: 'Noto Kufi Arabic', sans-serif;
            text-align: right;
            font-size: small;
        }

        /* ENGLISH */
        .english {
            font-family: 'Raleway', sans-serif;
            font-size: small;
        }

        /*HEBREW*/
        .hebrew {
            font-family: 'Noto Sans Hebrew', sans-serif;
            text-align: right;
        }


        .primary-text {
            color: var(--primary);
            font-weight: 600;
        }

        .grey-text {
            color: var(--dark-bg-text);
        }

        /* SCROLL TO TOP BUTTON */
        #myBtn {
            display: none;
            position: fixed;
            bottom: 50px;
            right: 20px;
            z-index: 1001;
            font-size: 30px;
            font-weight: bold;
            cursor: pointer;
            width: auto;
            border: none;
            box-shadow: none;
        }

        /* NAV BOTTOM */
        #bottom-nav {
            position: fixed;
            bottom: 5px;
            width: 90%;
            right: 5%;
            z-index: 1001;
            cursor: pointer;
            border-radius: 50px;
            box-shadow: 0 0 10px 2px var(--secondary);
            background-color: var(--primary);
            color: var(--white);
            padding: 10px 15px;
            text-align: center;
            transition: transform 0.3s ease-in-out;
        }

        .footer-icon {
            font-size: 1.5rem;
        }

        /* FORM */
        .form-container {
            width: 50%;
            background-color: var(--white);
            padding: 15px;
            box-shadow: 0 0 10px 1px var(--dark-bg-text);
            border-radius: 30px;
        }

        /* INPUT FIELDS & LABELS */
        input,
        textarea {
            caret-color: var(--secondary);
            width: 100%;
        }

        label,
        input,
        button,
        textarea {
            display: block;
            width: 100%;
            padding: 0;
            border: none;
            outline: none;
            box-sizing: border-box;
        }

        label {
            color: var(--dark-bg-text);
            margin-top: 15px;
            margin-bottom: 5px;
            font-weight: 600;
        }

        input::placeholder {
            color: var(--light-bg-text);
            font-size: small;
        }

        input[type=text] {
            background: var(--primary);
            color: var(--light-bg-text);
            padding: 5px;
            padding-left: 11px;
            padding-right: 11px;
            border-top-left-radius: 15px;
            border-top-right-radius: 15px;
            border-bottom-right-radius: 15px;
            /* box-shadow: inset 3px 3px 3px var(--dark-bg-text), inset -3px 3px 3px var(--secondary); */
            box-shadow: inset 0px 3px 4px var(--dark-bg-text);
            margin-bottom: 3px;
        }

        input[type=time] {
            background: var(--primary);
            color: var(--light-bg-text);
            padding: 5px;
            padding-left: 11px;
            padding-right: 11px;
            border-top-left-radius: 15px;
            border-top-right-radius: 15px;
            border-bottom-right-radius: 15px;
            /* box-shadow: inset 3px 3px 3px var(--dark-bg-text), inset -3px 3px 3px var(--secondary); */
            box-shadow: inset 0px 3px 4px var(--dark-bg-text);
            margin-bottom: 3px;
            width: 100%;
        }

        input[type=email] {
            background: var(--primary);
            color: var(--light-bg-text);
            padding: 5px;
            padding-left: 11px;
            padding-right: 11px;
            border-top-left-radius: 15px;
            border-top-right-radius: 15px;
            border-bottom-right-radius: 15px;
            /* box-shadow: inset 3px 3px 3px var(--dark-bg-text), inset -3px 3px 3px var(--secondary); */
            box-shadow: inset 0px 3px 4px var(--dark-bg-text);
            margin-bottom: 3px;
        }

        input[type=tel] {
            background: var(--primary);
            color: var(--light-bg-text);
            padding: 5px;
            padding-left: 11px;
            padding-right: 11px;
            border-top-left-radius: 15px;
            border-top-right-radius: 15px;
            border-bottom-right-radius: 15px;
            /* box-shadow: inset 3px 3px 3px var(--dark-bg-text), inset -3px 3px 3px var(--secondary); */
            box-shadow: inset 0px 3px 4px var(--dark-bg-text);
            margin-bottom: 3px;
        }

        input[type=datetime-local] {
            background: var(--primary);
            color: var(--light-bg-text);
            padding: 5px;
            padding-left: 11px;
            padding-right: 11px;
            border-top-left-radius: 15px;
            border-top-right-radius: 15px;
            border-bottom-right-radius: 15px;
            /* box-shadow: inset 3px 3px 3px var(--dark-bg-text), inset -3px 3px 3px var(--secondary); */
            box-shadow: inset 0px 3px 4px var(--dark-bg-text);
            margin-bottom: 3px;
        }

        /* input[type=radio]+label {
            color: var(--primary);
            background-color: var(--secondary);
        }

        input[type="radio"]:checked+label {
            background-color: var(--primary);
            color: var(--secondary);
            color: #fff !important;
            border-radius: 5px;
            padding: 5px 10px;
            display: inline-block;
            text-align: center;
        } */

        input[type=radio] {
            display: none;
        }

        .enquiry-radio label,
        .purpose-radio label {
            padding: 10px;
            background-color: var(--secondary);
            border-radius: 5px;
            cursor: pointer;
        }

        input[type=radio]:checked+label {
            background-color: var(--primary);
            color: var(--secondary);
        }

        textarea {
            background: var(--primary);
            color: var(--light-bg-text);
            padding: 5px;
            padding-left: 11px;
            padding-right: 11px;
            border-top-left-radius: 15px;
            border-top-right-radius: 15px;
            border-bottom-right-radius: 15px;
            /* box-shadow: inset 3px 3px 3px var(--dark-bg-text), inset -3px 3px 3px var(--secondary); */
            box-shadow: inset 0px 3px 4px var(--dark-bg-text);
        }

        /*DROPDOWN*/
        select {
            background: var(--primary);
            color: var(--light-bg-text);
            padding: 7px 11px;
            border-top-left-radius: 15px;
            border-top-right-radius: 15px;
            border-bottom-right-radius: 15px;
            /* box-shadow: inset 3px 3px 3px var(--dark-bg-text), inset -3px 3px 3px var(--secondary); */
            box-shadow: inset 0px 3px 4px var(--dark-bg-text);
            margin-bottom: 3px;
            border: none;
            width: 100%;
        }

        /* BUTTONS */
        button {
            margin: 20px 0px 0px 0px;
            margin: 0;
            display: inline-block;
            outline: none;
            font-family: inherit;
            box-sizing: border-box;
            border: none;
            border-radius: 30px;
            /*height: 2.75em;*/
            line-height: 2.5em;
            text-transform: uppercase;
            padding: 5px 10px;
            box-shadow: 0 3px 6px var(--dark-bg-text);
            background-color: var(--secondary);
            color: var(--primary);
            text-shadow: 0 2px 2px rgba(255, 255, 255, 0.5);
            cursor: pointer;
            transition: all .2s ease-in-out;
            background-size: 100% 100%;
            background-position: center;
            font-weight: bold;
        }

        button:hover {
            background-size: 150% 150%;
            background-color: var(--primary);
            box-shadow: 0 6px 12px var(--dark-bg-text);
            border: 1px solid var(--primary);
            color: var(--secondary);
        }

        /*COUNTRY DROPDOWN */
        .iti {
            width: 100% !important;
            color: var(--white) !important;
        }

        .iti--container {
            position: fixed;
            width: 100vw;
            height: 100vh;
            top: 0;
            left: 0;
            bottom: 0;
            right: 0;
            padding: 10%;
            background: rgba(238, 238, 238, 0.7);
        }

        .iti__country-list {
            background-color: rgba(238, 238, 238, 0.7);
            padding: 10px;
            min-width: 30% !important;
            max-width: 90% !important;
            max-height: 90% !important;
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
        }

        .iti__country {
            direction: ltr;
            padding: 5px 10px !important;
            background-color: white !important;
            border-radius: 5px !important;
            margin: 5px !important;
            color: #333333;
            box-shadow: 0px 1px 4px rgba(38, 38, 38, 0.4);

        }

        .iti-mobile .iti--container {
            position: fixed;
            width: 100vw;
            height: 100vh;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            padding: 10%;
            background: rgba(238, 238, 238, 0.7);
        }

        .iti-mobile .iti__country-list {
            max-height: 90% !important;
            min-width: 30% !important;
            max-width: 90% !important;
        }

        .iti__arrow {
            color: var(--secondary);
            border-top: 4px solid var(--secondary);
        }

        /* TABLET AND MOBILE */
        @media screen and (max-width: 768px) {
            .desktop {
                display: none;
            }

            .mobile {
                display: block;
            }

            h1 {
                font-size: 1.1rem;
            }

            .form-container {
                width: 90%;
            }
        }

        .first_section {
            position: relative;
        }

        /* IMAGE */
        .main-image {
            width: 100%;
            height: auto;
            display: block;
            border-bottom-left-radius: 30px;
            border-bottom-right-radius: 30px;
            max-height: 70vh;
            object-fit: cover;
        }

        /* LANGUAGE-OVERLAY */
        .language-overlay {
            position: absolute;
            top: 5px;
            left: 5px;
            color: white;
        }

        .language_selection {
            width: auto;
            margin: 5px;
            padding: 3px;
            background-color: var(--primary);
            border-top-left-radius: 30px;
            border-top-right-radius: 30px;
            border-bottom-left-radius: 30px;
            border-bottom-right-radius: 30px;
            display: flex;
            align-items: center;
            box-shadow: 0 0 5px 1px var(--secondary);
        }

        .lang-flag {
            width: 20px;
            height: 20px;
            border-radius: 50%;
            border: 1px solid var(--primary);
        }

        .next-language {
            font-family: 'Raleway', sans-serif;
            padding-left: 5px;
            padding-right: 5px;
            font-weight: medium;
            color: var(--white);
        }

        /* HEADING OVERLAY */
        .heading-overlay {
            position: absolute;
            top: 50px;
            left: 7%;
            max-width: 50vw;
            color: var(--white);
            padding: 2px;
            border-top-left-radius: 50px;
            border-top-right-radius: 50px;
            border-bottom-right-radius: 50px;
            border: 1px solid var(--white);
        }

        .heading-box {
            border-top-left-radius: 50px;
            border-top-right-radius: 50px;
            border-bottom-right-radius: 50px;
            background-color: var(--primary);
            padding: 10px 15px;
        }

        .large-number {
            font-size: 2.6rem;
            font-weight: bold;
        }

        /* COUNTDOWN OVERLAY */
        .countdown-overlay {
            position: absolute;
            bottom: 10px;
            right: 7%;
            width: auto;
        }

        .countdown-text {
            background-color: var(--primary);
            color: var(--secondary);
            border-radius: 30px;
            width: 100%;
            padding: 0px 15px;
            text-align: center;
        }

        .countdown-clock {
            padding: 0 10px;
        }

        .clock {
            direction: ltr;
            display: flex;
            justify-content: center;
            background-color: var(--secondary);
            color: var(--primary);
            border-bottom-left-radius: 15px;
            border-bottom-right-radius: 15px;
            width: auto;
            padding: 0px 15px;
            text-align: center;
        }

        .clock__item {
            margin: 0 0.2rem;
            font-weight: bold;
        }

        .clock__colon {
            display: flex;
            flex-direction: column;
            justify-content: space-evenly;
        }

        .clock__colon-item {
            width: 2px;
            height: 2px;
            background-color: var(--primary);
            border-radius: 50%;
        }

        /* LOCATION */
        .location-timing {
            font-weight: bold;
            color: var(--dark-bg-text);
            font-family: 'Raleway';
            direction: ltr;
            display: flex;
            align-items: end;
            justify-content: center;
            font-size: smaller;
        }

        .location-time {
            font-size: 1.5rem;
        }

        .location-icon {
            color: var(--primary);
            font-size: 2.6rem;
            padding: 0 10px;
        }

        .location-name {
            text-align: center;
            font-size: smaller;
        }

        .location-box {
            display: flex;
            align-items: center;
            justify-content: center;
            flex-direction: column;
            margin-left: 10px;
            margin-right: 10px;
            padding: 10px;
            /* border: var(--primary); */
            border-radius: 10px;
            box-shadow: 0 0 10px 2px var(--primary-light);
        }
    </style>
</head>

<body class="arabic">

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
                <a href="tel:+97142722249" style="font-weight: bold;">+97142722249</a>
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
                class="fa fa-arrow-up primary-text"></i></button>

        <!-- BUTTOM NAV -->
        <div id="bottom-nav">
            <div class="row">
                <div class="col-4 d-flex justify-content-center align-items-center">
                    <i class="fa-solid fa-phone footer-icon"></i>
                </div>
                <div class="col-4 d-flex justify-content-center align-items-center">
                    <i class="fa-brands fa-whatsapp footer-icon"></i>
                </div>
                <div class="col-4 d-flex justify-content-center align-items-center">
                    <i class="fa-solid fa-envelope footer-icon"></i>
                </div>
            </div>
        </div>

        <!-- IMAGE AND LANGUAGE AND HEADING AND COUNTDOWN -->
        <div class="first_section">
            <img class="main-image" src="https://hikalproperties.com/projects/assets/images/projects/empire/ee-main.jpg"
                alt="Hikal Real Estate">
            <!-- LANGUAGE -->
            <div class="language-overlay">
                <div class="language_selection">
                    <a href="https://hikalproperties.com/projects/empire/en?<?php echo $_SESSION["params"]; ?>">
                        <div class="d-flex align-items-center">
                            <img class="lang-flag" src="https://hikalproperties.com/projects/assets/images/flags/en.jpg" />
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
                <div class="countdown-text">
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
                            <input type="text" id="Project" name="Project" value="Empire Estates (Private Pool)" />
                            <input type="text" id="LeadType" name="LeadType" value="Apartment" />
                            <input type="text" id="Language" name="Language" value="Arabic" />
                            <input type="text" id="Country" name="Country" value="" />
                            <input type="text" id="Filename" name="Filename"
                                value="<?php echo $params; ?> <?php echo $filename; ?>" />
                            <input type="text" id="LeadEmail1" name="LeadEmail1" value="" />
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
                        <input type="tel" name="phone[main]" id="mobile" style="color: #000000;" placeholder="56 789 0123"
                            required />

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
                            <input class="mx-2" type="radio" name="EnquiryRadio1" id="EnquiryRadio4" value="3 Bedrooms"
                                required>
                            <label for="EnquiryRadio4" class="m-0">
                                <div class="d-flex justify-content-between align-items-center">
                                    <div class="px-2">
                                        ثلاث غرف نوم + حمام سباحة
                                    </div>
                                    <div class="d-flex align-items-center">
                                        <i class="fa-solid fa-water-ladder px-2"></i>
                                        <i class="fa-solid fa-bed px-2"></i>
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
        <div class="third_section container container-fluid my-4 py-4">
            <h4 class="primary-text text-center">
                مميزات الموقع
            </h4>
            <div class="row container container-fluid">
                <!-- DUBAI MIRACLE GARDEN  -->
                <div class="col-6 col-md-4 col-lg-3 pb-3">
                    <div class="d-flex justify-content-start align-items-center">
                        <!-- <i class="fa-brands fa-pagelines location-icon"></i> -->
                        <img src="../../assets/images/icons/red-purple/trees.png" width="40" class="mx-2" />
                        <div class="d-flex align-items-center flex-column justify-content-center">
                            <div class="location-timing">
                                <span class="location-time px-1">
                                    5
                                </span>
                                <span class="px-1">MIN</span>
                            </div>
                            <div class="location-name">
                                حديقة دبي للزهور العجيبة
                            </div>
                        </div>
                    </div>
                </div>
                <!-- MALL OF THE EMIRATES -->
                <div class="col-6 col-md-4 col-lg-3 pb-3">
                    <div class="d-flex justify-content-start align-items-center">
                        <!-- <i class="fa-solid fa-bag-shopping location-icon"></i> -->
                        <img src="../../assets/images/icons/red-purple/mall.png" width="40" class="mx-2" />
                        <div class="d-flex align-items-center flex-column justify-content-center">
                            <div class="location-timing">
                                <span class="location-time px-1">
                                    10
                                </span>
                                <span class="px-1">MIN</span>
                            </div>
                            <div class="location-name">
                                مول الإمارات
                            </div>
                        </div>
                    </div>
                </div>
                <!-- BURJ KHALIFA -->
                <div class="col-6 col-md-4 col-lg-3 pb-3">
                    <div class="d-flex justify-content-start align-items-center">
                        <!-- <i class="fa-solid fa-ship location-icon"></i> -->
                        <img src="../../assets/images/icons/red-purple/burjkhalifa.png" width="40" class="mx-2" />
                        <div class="d-flex align-items-center flex-column justify-content-center">
                            <div class="location-timing">
                                <span class="location-time px-1">
                                    25
                                </span>
                                <span class="px-1">MIN</span>
                            </div>
                            <div class="location-name">
                                برج خليفة
                            </div>
                        </div>
                    </div>
                </div>
                <!-- PALM JUMEIRAH -->
                <div class="col-6 col-md-4 col-lg-3 pb-3">
                    <div class="d-flex justify-content-start align-items-center">
                        <!-- <i class="fa-brands fa-pagelines location-icon"></i> -->
                        <img src="../../assets/images/icons/red-purple/cruise.png" width="40" class="mx-2" />
                        <div class="d-flex align-items-center flex-column justify-content-center">
                            <div class="location-timing">
                                <span class="location-time px-1">
                                    25
                                </span>
                                <span class="px-1">MIN</span>
                            </div>
                            <div class="location-name">
                                مرسى دبي
                            </div>
                        </div>
                    </div>
                </div>
                <!-- DXB AIRPORT -->
                <div class="col-6 col-md-4 col-lg-3 pb-3">
                    <div class="d-flex justify-content-start align-items-center">
                        <!-- <i class="fa-solid fa-plane-departure location-icon"></i> -->
                        <img src="../../assets/images/icons/red-purple/airport.png" width="40" class="mx-2" />
                        <div class="d-flex align-items-center flex-column justify-content-center">
                            <div class="location-timing">
                                <span class="location-time px-1">
                                    25
                                </span>
                                <span class="px-1">MIN</span>
                            </div>
                            <div class="location-name">
                                مطار دبي الدولي
                            </div>
                        </div>
                    </div>
                </div>
                <!-- AL MAKTOUM AIRPORT -->
                <div class="col-6 col-md-4 col-lg-3 pb-3">
                    <div class="d-flex justify-content-start align-items-center">
                        <!-- <i class="fa-solid fa-plane-departure location-icon"></i> -->
                        <img src="../../assets/images/icons/red-purple/airport.png" width="40" class="mx-2" />
                        <div class="d-flex align-items-center flex-column justify-content-center">
                            <div class="location-timing">
                                <span class="location-time px-1">
                                    25
                                </span>
                                <span class="px-1">MIN</span>
                            </div>
                            <div class="location-name">
                                مطار آل مكتوم الدولي
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- FOOTER -->
        <footer style="background-color: var(--primary);">
            <?php include_once ("../../components/footer-only-light.php"); ?>
        </footer>

        <!-- SCROLL TO FORM -->
        <script>
            function scrollToForm() {
                var element = document.getElementById("form-container");
                element.scrollIntoView({ behavior: "smooth", block: "start" });
            }
        </script>

        <!-- COUNTDOWN -->
        <script>
            const deadline = 'March 21 2024 23:59:59 GMT+0400';
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
