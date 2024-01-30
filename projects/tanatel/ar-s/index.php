<?php
session_start();
error_reporting(0);
// include('includes/dbconnection.php');

$ip = $_SERVER['REMOTE_ADDR'];
$device = $_SERVER['HTTP_USER_AGENT'];
?>
<?php

$protocol = isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? 'https://' : 'http://';
$host = $_SERVER['HTTP_HOST'];
$uri = $_SERVER['REQUEST_URI'];
$fullUrl = $protocol . $host . $uri;

date_default_timezone_set('Asia/Dubai');
$cur_time = time();

$hashed_ip = hash('sha256', $ip);

$_SESSION["page_url"] = $fullUrl;
$_SESSION["hashed_ip"] = $hashed_ip;
$_SESSION["user_agent"] = $device;
$_SESSION["source"] = "Snapchat";
?>

<?php
$url = 'https://staging.hikalcrm.com/api/validate-snap';

$data = array(
    "pixel_id" => "4992376c-fb59-4050-8c91-bdb468b086d4",
    "event_type" => "PAGE_VIEW",
        "timestamp" => (string)$cur_time,
    "client_dedup_id" => (string) round((time() * 1000) * (rand() / getrandmax())),
    "event_conversion_type" => "WEB",
    "event_tag" => "Tanatel",
    "page_url" => (string)$fullUrl,
    "user_agent" => (string)$device,
    "hashed_ip_address" => (string)$hashed_ip,
    "item_category" => "hikalproperties.com/projects/tanatel/ar-s",
);

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
    <title>تناتل: أفضل علامة تجارية لشراء الأثاث في الإمارات العربية المتحدة</title>
    <meta name="description" content="تناتل: الخيار الموثوق به للأثاث الفاخر. 
إنهم يقدمون مجموعة واسعة من الأثاث، بما في ذلك الأسرة والأرائك وطاولات الطعام 
أفضل أثاث للبيع">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- GOOGLE FONTS -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Noto+Kufi+Arabic:wght@200;300&family=Lilita+One&display=swap" rel="stylesheet">

    <!-- FONT AWESOME -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- MDB -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.2.0/mdb.min.css" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.4.0/mdb.min.js" integrity="sha512-0RxGTiFXp36+bSbJM+/QSTl1LDQ4pHdDZ8Ua9ZXl454qKSsYu228AOLHYfzx/rm4Dm6I+176ETRF55DpvrHTgw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <!-- JQUERY -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js" integrity="sha512-3gJwYpMe3QewGELv8k/BX9vcqhryRdzRMxVfq6ngyWXwo03GFEzjsUm8Q7RZcHPHksttq7/GFoxjCVUjkjvPdw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <!-- ICON -->
    <link rel="icon" type="image/png" href="https://hikalproperties.com/projects/assets/images/logo/hikalagency-icon.png" />

    <style>
        body {
/*            background: linear-gradient(to bottom right, #1F1C1D, #282426);*/
            background: linear-gradient(to bottom right, #000000, #575757);
            font-size: small;
            font-family: 'Noto Kufi Arabic', sans-serif;
        }

        .container {
            width: 90% !important;
        }

        #myBtn {
            display: none;
            position: fixed;
            bottom: 20px;
            right: 20px;
            z-index: 1001;
            font-size: 30px;
            color: #d4a556;
            font-weight: bold;
            cursor: pointer;
            width: auto;
        }
        
        .whatsappButton {
            width: 100%;
            color: #fff;
            border-radius: 5px;
            padding: 15px 15px;
            font-weight: 500;
            cursor: pointer;
            transition: all 0.3s ease;
            position: relative;
            display: inline-block;
            box-shadow:inset 2px 2px 2px 0px rgba(255,255,255,.5), 7px 7px 20px 0px rgba(0,0,0,.1), 4px 4px 5px 0px rgba(0,0,0,.1);
            outline: none;
            padding: 0;
            border: none;
            background: #25D366;
            background: linear-gradient(0deg, rgba(37, 211, 102,1) 0%, rgba(20,200,100,1) 100%);
        }
        
        .whatsappButton:hover {
            color: #25D366;
            background: #FFFFFF;
            background: transparent;
            box-shadow:none;
        }
        .whatsappButton:before,
        .whatsappButton:after{
            content:'';
            position:absolute;
            top: 0;
            right: 0;
            height: 2px;
            width: 0;
            background: #FFFFFF;
            box-shadow: -1px -1px 5px 0px #fff, 7px 7px 20px 0px #0003, 4px 4px 5px 0px #0002;
            transition: 400ms ease all;
        }
        .whatsappButton:after{
            right: inherit;
            top: inherit;
            left: 0;
            bottom: 0;
        }
        .whatsappButton:hover:before,
        .whatsappButton:hover:after{
            width:100%;
            transition:800ms ease all;
        }

        #whatsappBtn {
            display: none;
            position: fixed;
            bottom: 80px;
            right: 20px;
            z-index: 1001;
            font-size: 30px;
            color: #25d366;
            font-weight: bold;
            cursor: pointer;
        }

        #whatsappBtn:hover {
            position: fixed;
            color: #d4a556;
        }

        .desktop {
            display: block;
        }

        .mobile {
            display: none;
        }

        body {
            overflow-x: hidden;
        }

        h1,
        h2,
        h3,
        h4,
        h5,
        h6 {
            color: #FFFFFF;
            margin-bottom: 15px;
            margin-top: 15px;
        }

        h4 {
            color: #d4a556;
            font-weight: bold;
        }

        h6 {
            font-weight: 200;
            line-height: 2rem;
            font-size: small;
        }

        .gridlocation {
            width: 16.66%;
            padding: 5px 15px 5px 15px;
        }

        .iti {
            width: 100% !important;
            color: #000 !important;
        }


        input {
            caret-color: #5d68a2;
            width: 100%;
        }

        .containerform {
            position: relative;
            width: 70%;
            border-radius: 20px;
            padding: 30px;
            box-sizing: border-box;
            background: #000000;
            box-shadow: 5px 5px 10px #575757, -5px -5px 10px #575757;
        }

        .inputs {
            text-align: right;
            /* margin-top: 30px; */
        }

        label,
        input,
        button {
            display: block;
            width: 100%;
            padding: 0;
            border: none;
            outline: none;
            box-sizing: border-box;
        }

        label {
            color: #d4a556;
            margin-top: 20px;
            margin-bottom: 5px;
        }

        input::placeholder {
            color: #333;
            font-size: small;
        }

        input[type=text] {
            background: #e3e1ee;
            padding: 5px;
            padding-left: 11px;
            padding-right: 11px;
            border-radius: 11px;
            box-shadow: inset 3px 3px 3px #cbced1, inset -3px 3px 3px white;
            margin-bottom: 3px;
        }

        input[type=tel] {
            background: #e3e1ee;
            padding: 5px;
            padding-left: 11px;
            padding-right: 11px;
            border-radius: 11px;
            box-shadow: inset 3px 3px 3px #cbced1, inset -3px 3px 3px white;
            margin-bottom: 3px;
        }

        button {
            color: white;
            margin: 20px 0px 0px 0px;
            padding: 5px;
            background: #d4a556;
            border-radius: 11px;
            cursor: pointer;
            transition: 0.5s;
        }

        button:hover {
            box-shadow: 3px 3px 3px #cbced1, -3px -3px 3px white;
        }

        .fourth_section {
            margin-top: -40px;
        }

        .glow {
            -webkit-animation: glow 1s ease-in-out infinite alternate;
            -moz-animation: glow 1s ease-in-out infinite alternate;
            animation: glow 1s ease-in-out infinite alternate;
        }

        @keyframes glow {
            from {
                color: #d4a556;
                text-shadow: 0 0 20px #5d68a2, 0 0 30px #5d68a2, 0 0 40px #5d68a2, 0 0 50px #5d68a2, 0 0 60px #5d68a2, 0 0 70px #5d68a2, 0 0 80px #5d68a2, 0 1 90px #5d68a2;
            }

            to {
                color: #fff;
                text-shadow: 0 0 10px #5d68a2, 0 0 20px #5d68a2, 0 0 30px #5d68a2, 0 0 40px #5d68a2, 0 0 50px #5d68a2, 0 0 60px #1245a8, 0 0 70px #5d68a2, 0 0 90px #1245a8;
            }
        }
        
        /*ZOOMED IMAGE*/
        #overlay {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            height: 100vh;
            width: 100vw;
            background-color: rgba(0, 0, 0, 0.8);
            z-index: 999;
        }
        
        #zoomedImageWrapper {
            position: fixed;
            transform: translate(-50%, -50%);
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            width: 100vw;
            z-index: 999;
            background-color: rgba(0, 0, 0, 0.1);
        }
        
        #zoomedImage {
            display: block;
            max-height: 90vh;
            max-width: 90vw;
        }
        
        #linkText {
            position: absolute;
            bottom: 30px;
            left: 50%;
            transform: translateX(-50%);
            color: #fff;
            font-size: 18px;
            z-index: 1000;
        }


        @media screen and (max-width: 800px) {
            .containerform {
                width: 100%;
                border-radius: 20px;
                padding: 30px;
            }
        }

        @media screen and (max-width: 600px) {
            .desktop {
                display: none;
            }

            .mobile {
                display: block;
            }

            /*.row {
                display: block;
            }*/

            .gridlocation {
                width: 100%;
                padding: 0px 0px 0px 0px;
            }

            .containerform {
                width: 100%;
                border-radius: 20px;
                padding: 30px;
            }

            .fourth_section {
                margin-top: 10px;
            }
        }
        
        .gold-text {
            color: #F5C21B;
            background: -webkit-gradient(linear, left top, left bottom, from(#F5C21B), to(#D17000));
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            font-size: 13em;
            font-weight: 900;
            text-transform: uppercase;
            position: relative;
            /*top: 50% !important;*/
            /*left: 50% !important;*/
            /*transform: translate(-50%, -50%);*/
        }
        
        .gold-text::before {
            content: "%20";
	        -webkit-animation: flare 5s infinite;
            -webkit-animation-timing-function: linear;
            background-image: linear-gradient(65deg, transparent 20%, rgba(255, 255, 255, 0.2) 20%, rgba(255, 255, 255, 0.3) 27%, transparent 27%, transparent 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            color: #FFF;
            position: absolute;
            top: 50% !important;
            left: 50% !important;
            transform: translate(-50%, -50%);
        }

        .gold-text::after {
            color: #FFF;
            content: "%20";
            position: absolute;
            background-position: -180px;
            top: 50% !important;
            left: 50% !important;
            transform: translate(-50%, -50%);
            text-shadow: 0 1px #6E4414, 0 2px #6E4414, 0 3px #6E4414, 0 4px #6E4414, 0 5px #6E4414, 0 6px #6E4414, 0 7px #6E4414, 0 8px #6E4414, 0 9px #6E4414, 0 10px #6E4414;
            top: 0;
            z-index: -1;
        }
        
        .inner-gold::after, .inner-gold::before {
		    -webkit-animation: sparkle 4s infinite;
            -webkit-animation-timing-function: linear;
            background: #FFF;
            border-radius: 100%;
            box-shadow: 0 0 5px #FFF, 0 0 10px #FFF, 0 0 15px #FFF, 0 0 20px #FFF, 0 0 25px #FFF, 0 0 30px #FFF, 0 0 35px #FFF;
            content: "";
            display: block;
            height: 10px;
            opacity: 0.7;
            position: absolute;
            width: 10px;
        }

        .inner-gold::before {
	        -webkit-animation-delay: 0.2s;
            height: 7px;
            left: 0.12em;
            top: 0.8em;
            width: 7px;
        }

        .inner-gold::after {
            top: 0.32em;
            right: -5px;
        }
        
        @-webkit-keyframes flare {
            0%   { background-position: -180px; }
            30%  { background-position: 500px; }
            100% { background-position: 500px; }
        }

        @-webkit-keyframes sparkle {
            0%   { opacity: 0; }
            30%  { opacity: 0; }
            40%  { opacity: 0.8; }
            60%  { opacity: 0; }
            100% { opacity: 0; }
        }
    </style>

</head>

<body style="font-size: small; color: #FFFFFF;" dir="rtl">

    <!-- TOP SCROLL -->
    <button onclick="topFunction()" id="myBtn" title="Go to top" style="background: transparent;"><i class="fa fa-arrow-up"></i></button>

    <div class="first_section my-5">
        <div class="container container-fluid">
            <div class="row">
                <div class="col-12 col-sm-12 col-md-6 col-lg-5 col-xl-5 px-2">
                    <div style="display: flex; align-items: center;">
                        <div style="width: 100%;">
                            <div class="headings py-3">
                                <h2 style="text-align: center; line-height: 2rem; font-weight: 500; font-size: 1.5rem; padding: 5px;">
                                    بمناسبة
                                    <br />
                                    <span style="font-weight: bold;"> اليوم الوطني الإماراتي</span>
                                    <br />
                                    خصومات تصل إلي
                                </h2>
                                <div style="position: relative;">
                                    <h1 class="gold-text py-2" style="text-align: center; line-height: 3rem; font-weight: 500; font-size: 4rem; font-family: 'Lilita One', sans-serif;">
                                        <span class="inner-gold">%20</span>
                                    </h1>
                                </div>
                                
                                <!--<h3 class="glow" style="text-align: center; line-height: 2rem; font-weight: 500; font-size: 1.2rem; padding: 5px; color: #d4a556;">احصل على خصم يصل إلى 15٪ مع بطاقات فزعة و اسعاد و سعادة</h3>-->
                                <h3 style="text-align: center; line-height: 2rem; font-weight: 500; font-size: 1.2rem; padding: 5px;">قم بتأثيث منزلك بمجموعات فاخرة: مجموعات غرف النوم والأرائك وطاولات الطعام والمزيد</h3>
                            </div>
                            <!-- FORM -->
                            <div class="pb-5 px-5" style="width: 100%; height: auto; z-index: 1; display: flex; justify-content: center;">
                                <!--<div class="containerform">-->
                                <!--    <div class="inputs" style="font-weight: 400;">-->
                                <!--        <div class="contact-form">-->
                                <!--            <form id="lead-form" method="POST" action="add-lead-tanatel.php">-->
                                <!--                <div style="display: none">-->
                                <!--                    <input type="text" id="Language" name="Language" value="English" />-->
                                <!--                    <input type="text" id="LeadSource" name="LeadSource" value="Hikal Marketing Management" />-->
                                <!--                </div>-->
                                                
                                <!--                <label style="margin-top: 0px;">الاسم</label>-->
                                <!--                <input type="text" name="LeadName1" id="LeadName1" required />-->
                                                
                                <!--                <label>رقم التواصل</label>-->
                                <!--                <input type="tel" name="phone" id="phone" placeholder="+971555555555" required dir="ltr" style="color: #000000;" onkeyup="removeSpaces(this)" />-->
                                        
                                <!--                <div id="FormButton" name="FormButton">-->
                                <!--                    <div class="form_button">-->
                                <!--                        <button type="submit"  class="submit-click" onclick="dataLayer.push({'event': 'submit-click', 'var': 'submit-click'});">تأكيد</button>-->
                                <!--                    </div>-->
                                <!--                </div>-->
                                <!--            </form>-->
                                <!--        </div>-->
                                <!--    </div>-->
                                <!--</div>-->
                                <!-- <a href="https://wa.me/971589491100" class="whatsappButton p-3">
                                    <div class="d-flex align-items-center justify-content-center">
                                        <i class="fa-brands fa-whatsapp mx-1" style="font-size: 20px;"></i>
                                        <span class="mx-1">تواصل معنا<span>
                                    </div>
                                </a> -->
                                <button class="whatsappButton p-3" onclick="handleWhatsAppClick()">
                                    <div class="d-flex align-items-center justify-content-center">
                                        <i class="fa-brands fa-whatsapp mx-1" style="font-size: 20px;"></i>
                                        <span class="mx-1">تواصل معنا<span>
                                    </div>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-sm-12 col-md-6 col-lg-7 col-xl-7 p-1" style="display: flex; justify-content: center; align-items: center;">                    
                    <div id="carouselExampleControls" class="carousel slide" data-mdb-ride="carousel" data-mdb-interval="3000">
                        <div class="carousel-inner">
                            <div class="carousel-item active">
                                <img src="https://hikalproperties.com/projects/assets/images/tanatel/slide1.png" class="d-block w-100" alt="TANATEL">
                            </div>
                            <div class="carousel-item">
                                <img src="https://hikalproperties.com/projects/assets/images/tanatel/slide2.png" class="d-block w-100" alt="TANATEL">
                            </div>
                            <div class="carousel-item">
                                <img src="https://hikalproperties.com/projects/assets/images/tanatel/slide3.png" class="d-block w-100" alt="TANATEL">
                            </div>
                        </div>
                        <button class="carousel-control-prev" type="button" data-mdb-target="#carouselExampleControls" data-mdb-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="visually-hidden"></span>
                        </button>
                        <button class="carousel-control-next" type="button" data-mdb-target="#carouselExampleControls" data-mdb-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="visually-hidden"></span>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="second_section my-5">
        <div class="container container-fluid py-3">
            <div class="desktop">
                <div class="row">
                    <div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">
                        <img src="https://hikalproperties.com/projects/assets/images/tanatel/content1.png" loading="lazy" alt="HIKAL PROPERTIES" style="width: 100%;" />
                    </div>
                    <div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6" style="display: flex; align-items: center;">
                        <div class="p-2">
                            <h5>
                                العلامة التجارية للأثاث التي أسرت الشرق الأوسط
                            </h5>
                            <hr style="width: 50px; height: 2px; background-color: #d4a556; opacity: 0.5;">
                            <h6>
                                تناتل هي علامة تجارية مشهورة أسرت المملكة العربية السعودية بمجموعة أثاثها الرائعة, من الأسرة الأنيقة إلى الأرائك الرائعة وطاولات الطعام المذهلة، يحتوي تناتل على كل ما تحتاجه لخلق أجواء فاخرة في منزلك. 
تناتل متاحة الأن في الإمارات العربية المتحدة، وتقدم خصما حصريا بنسبة 15٪ على جميع أثاثهم للمشترين في الإمارات العربية المتحدة الذين يحملون بطاقة فزعة , اسعاد أو سعادة
                            </h6>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6" style="display: flex; align-items: center;">
                        <div class="p-2">
                            <h5>
                                أثاث تناتل: تم تصميمه ليدوم
                            </h5>
                            <hr style="width: 50px; height: 2px; background-color: #d4a556; opacity: 0.5;">
                            <h6>
                                أثاث تناتل مصنوع من مواد وحرفية عالية الجودة, إذ يستخدمون أجود أنواع الأخشاب والأقمشة والتشطيبات لإنشاء أثاث جميل ودائم.
تم تصميم أثاث تناتل ليكون عمليا ومريحا، حتى تتمكن من الاسترخاء والاستمتاع بمنزلك بأناقة.
                            </h6>
                        </div>
                    </div>
                    <div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">
                        <img src="https://hikalproperties.com/projects/assets/images/tanatel/content2.png" loading="lazy" alt="HIKAL PROPERTIES" style="width: 100%;" />
                    </div>
                </div>
                <div class="row">
                    <div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">
                        <img src="https://hikalproperties.com/projects/assets/images/tanatel/content3.png" loading="lazy" alt="HIKAL PROPERTIES" style="width: 100%;" />
                    </div>
                    <div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6" style="display: flex; align-items: center;">
                        <div class="p-2">
                            <h5>
                                اجعل منزلك واحة ترحيبية
                            </h5>
                            <hr style="width: 50px; height: 2px; background-color: #d4a556; opacity: 0.5;">
                            <h6>
                                مع أثاث تناتل، يمكنك إنشاء منزل فاخر، أنيق و مثالي للترفيه عن الضيوف أو ببساطة الاسترخاء والاستمتاع بوقت فراغك. 
لدى تناتل شيء للجميع.
 إذن ما الذي تنتظره؟ اشتر الأثاث من تناتل اليوم وارفع ديكور منزلك مع مجموعة الأثاث الرائعة.
                            </h6>
                        </div>
                    </div>
                </div>
            </div>
            <div class="mobile">
                <div class="row">
                    <div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6" style="display: flex; align-items: center;">
                        <div class="p-2">
                            <h5>
                                العلامة التجارية للأثاث التي أسرت الشرق الأوسط
                            </h5>
                            <hr style="width: 50px; height: 2px; background-color: #d4a556; opacity: 0.5;">
                            <h6>
                                تناتل هي علامة تجارية مشهورة أسرت المملكة العربية السعودية بمجموعة أثاثها الرائعة, من الأسرة الأنيقة إلى الأرائك الرائعة وطاولات الطعام المذهلة، يحتوي تناتل على كل ما تحتاجه لخلق أجواء فاخرة في منزلك. 
تناتل متاحة الأن في الإمارات العربية المتحدة، وتقدم خصما حصريا بنسبة 15٪ على جميع أثاثهم للمشترين في الإمارات العربية المتحدة الذين يحملون بطاقة فزعة , اسعاد أو سعادة
                            </h6>
                        </div>
                    </div>
                    <div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">
                        <img src="https://hikalproperties.com/projects/assets/images/tanatel/content1.png" loading="lazy" alt="HIKAL PROPERTIES" style="width: 100%;" />
                    </div>
                </div>
                <div class="row">
                    <div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6" style="display: flex; align-items: center;">
                        <div class="p-2">
                            <h5>
                                أثاث تناتل: تم تصميمه ليدوم
                            </h5>
                            <hr style="width: 50px; height: 2px; background-color: #d4a556; opacity: 0.5;">
                            <h6>
                                أثاث تناتل مصنوع من مواد وحرفية عالية الجودة, إذ يستخدمون أجود أنواع الأخشاب والأقمشة والتشطيبات لإنشاء أثاث جميل ودائم.
تم تصميم أثاث تناتل ليكون عمليا ومريحا، حتى تتمكن من الاسترخاء والاستمتاع بمنزلك بأناقة.
                            </h6>
                        </div>
                    </div>
                    <div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">
                        <img src="https://hikalproperties.com/projects/assets/images/tanatel/content2.png" loading="lazy" alt="HIKAL PROPERTIES" style="width: 100%;" />
                    </div>
                </div>
                <div class="row">
                    <div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6" style="display: flex; align-items: center;">
                        <div class="p-2">
                            <h5>
                                اجعل منزلك واحة ترحيبية
                            </h5>
                            <hr style="width: 50px; height: 2px; background-color: #d4a556; opacity: 0.5;">
                            <h6>
                                مع أثاث تناتل، يمكنك إنشاء منزل فاخر، أنيق و مثالي للترفيه عن الضيوف أو ببساطة الاسترخاء والاستمتاع بوقت فراغك. 
لدى تناتل شيء للجميع.
 إذن ما الذي تنتظره؟ اشتر الأثاث من تناتل اليوم وارفع ديكور منزلك مع مجموعة الأثاث الرائعة.
                            </h6>
                        </div>
                    </div>
                    <div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">
                        <img src="https://hikalproperties.com/projects/assets/images/tanatel/content3.png" loading="lazy" alt="HIKAL PROPERTIES" style="width: 100%;" />
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <div class="third_section mt-5 pb-5" style="background-color: #000000;">
        <div class="container container-fluid py-5">
            <div class="row pb-2" style="text-align: center;">
                <h4>
                    مجموعاتنا
                </h4>
            </div>
            <div class="row" style="justify-content: center;">
                <div class="col-12 col-sm-12 col-md-6 col-lg-4 col-xl-3 p-2">
                    <div style="display: block; text-align: center;">
                        <img src="https://hikalproperties.com/projects/assets/images/tanatel/gallery1.png" class="zoomable-image" style="width: 100%;" />
                    </div>
                </div>
                <div class="col-12 col-sm-12 col-md-6 col-lg-4 col-xl-3 p-2">
                    <div style="display: block; text-align: center;">
                        <img src="https://hikalproperties.com/projects/assets/images/tanatel/gallery2.png" class="zoomable-image" style="width: 100%;" />
                    </div>
                </div>
                <div class="col-12 col-sm-12 col-md-6 col-lg-4 col-xl-3 p-2">
                    <div style="display: block; text-align: center;">
                        <img src="https://hikalproperties.com/projects/assets/images/tanatel/gallery3.png" class="zoomable-image" style="width: 100%;" />
                    </div>
                </div>
                <div class="col-12 col-sm-12 col-md-6 col-lg-4 col-xl-3 p-2">
                    <div style="display: block; text-align: center;">
                        <img src="https://hikalproperties.com/projects/assets/images/tanatel/gallery4.png" class="zoomable-image" style="width: 100%;" />
                    </div>
                </div>
                <div class="col-12 col-sm-12 col-md-6 col-lg-4 col-xl-3 p-2">
                    <div style="display: block; text-align: center;">
                        <img src="https://hikalproperties.com/projects/assets/images/tanatel/gallery5.png" class="zoomable-image" style="width: 100%;" />
                    </div>
                </div>
                <div class="col-12 col-sm-12 col-md-6 col-lg-4 col-xl-3 p-2">
                    <div style="display: block; text-align: center;">
                        <img src="https://hikalproperties.com/projects/assets/images/tanatel/gallery6.png" class="zoomable-image" style="width: 100%;" />
                    </div>
                </div>
                <div class="col-12 col-sm-12 col-md-6 col-lg-4 col-xl-3 p-2">
                    <div style="display: block; text-align: center;">
                        <img src="https://hikalproperties.com/projects/assets/images/tanatel/gallery7.png" class="zoomable-image" style="width: 100%;" />
                    </div>
                </div>
                <div class="col-12 col-sm-12 col-md-6 col-lg-4 col-xl-3 p-2">
                    <div style="display: block; text-align: center;">
                        <img src="https://hikalproperties.com/projects/assets/images/tanatel/gallery8.png" class="zoomable-image" style="width: 100%;" />
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div id="overlay">
        <div id="zoomedImageWrapper">
            <img id="zoomedImage" alt="Zoomed Image" />
        </div>
        <a id="linkText" href="tanatel.com.sa" target="_blank"></a>
    </div>

    <footer style="background-color: #000000;">
        <div class="container container-fluid py-5">
            <div style="display: block; text-align: center;">
                <a href="https://tanatel.com.sa" target="_blank">
                    <img class="mb-3" src="https://hikalproperties.com/projects/assets/images/tanatel/tanatelLogoWhite.png" width="250" />
                </a>
            </div>
        </div>
        <div class="bg-black text-white py-3 w-full text-center">
            Copyright &copy; <?php echo date('Y'); ?>
            <strong><a href="https://hikalagency.ae/" style="color: #DA1F26;">HIKAL</a></strong>&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;<a href="privacypolicy" style="color: #fff;">Privacy Policy</a>
        </div>
    </footer>

    <!-- REMOVE SPACES  -->
    <!-- <script>
        function removeSpaces(input) {
          input.value = input.value.replace(/\s/g, '');
        }
    </script> -->

    <!--CAROUSEL-->
    <script>
        document.addEventListener("DOMContentLoaded", function(event) {
            new mdb.Carousel(document.getElementById("carouselExampleControls"));
        });
    </script>
    
    <!--ZOOMED IMAGE    -->
    <script>
        const zoomableImages = document.querySelectorAll(".zoomable-image");
        const overlay = document.getElementById("overlay");
        const zoomedImageWrapper = document.getElementById("zoomedImageWrapper");
        const zoomedImage = document.getElementById("zoomedImage");
        const linkText = document.getElementById("linkText");
        
        zoomableImages.forEach((image) => {
            image.addEventListener("click", function () {
                const imageUrl = this.src;
                const imageLink = this.dataset.link;
        
                zoomedImage.src = imageUrl;
                linkText.href = "https://www.tanatel.com.sa";
                linkText.textContent = "Visit the site for more";
        
                overlay.style.display = "block";
                zoomedImageWrapper.style.transform = "scale(1)";
            });
        });
        
        overlay.addEventListener("click", function () {
            overlay.style.display = "none";
            zoomedImageWrapper.style.transform = "scale(0)";
        });
    </script>

    <!--SCROLL TO TOP -->
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

    <!--CALL SNAP API -->
    <script>
        function handleWhatsAppClick() {
            $.ajax({
                url: "../../controllers/snap-whatsapp.php",
                method: "POST",
                dataType: "json",
                success: function(response) {
                    console.log(response);
                    window.location.href = "https://wa.me/971589491100?text=Hello%20I%20am%20interested%20in%20inquiring%20about%20furniture";
                    if (response.status === "success") {
                        console.log("API CALL SUCCESS");
                    }
                    else {
                        console.log("ERROR = ", response.error);
                    }
                },
                error: function (xhr, status, error) {
                    console.error('Error:', status, error);
                    window.location.href = "https://wa.me/971589491100?text=Hello%20I%20am%20interested%20in%20inquiring%20about%20furniture";

                }
            });

            return false;
        }
    </script>
</body>

</html>