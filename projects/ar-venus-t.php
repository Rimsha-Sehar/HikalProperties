<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');

$ip = $_SERVER['REMOTE_ADDR'];
$device = $_SERVER['HTTP_USER_AGENT'];
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Hikal Real Estate Properties | Venus</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- ICON -->
    <link rel="icon" type="image/png" href="https://hikalproperties.ae/assets/images/logo/hikalagency-icon.png" />

    <!-- FONT -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Noto+Kufi+Arabic:wght@100;200;400;500&display=swap" rel="stylesheet">

    <!-- FONT AWESOME ICON -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <!-- DROPDOWN COUNTRY CODE  -->
    <link rel="stylesheet" href="https://cdn.tutorialjinni.com/intl-tel-input/17.0.8/css/intlTelInput.css" />
    <script src="https://cdn.tutorialjinni.com/intl-tel-input/17.0.8/js/intlTelInput.min.js"></script>

    <!-- Google Tag Manager -->
    <script>
        (function(w, d, s, l, i) {
            w[l] = w[l] || [];
            w[l].push({
                'gtm.start': new Date().getTime(),
                event: 'gtm.js'
            });
            var f = d.getElementsByTagName(s)[0],
                j = d.createElement(s),
                dl = l != 'dataLayer' ? '&l=' + l : '';
            j.async = true;
            j.src =
                'https://www.googletagmanager.com/gtm.js?id=' + i + dl;
            f.parentNode.insertBefore(j, f);
        })(window, document, 'script', 'dataLayer', 'GTM-K7J7SRR');
    </script>
    <!-- End Google Tag Manager -->

    <style>
        * {
            box-sizing: border-box;
        }

        #myBtn {
            display: none;
            position: fixed;
            bottom: 20px;
            right: 20px;
            z-index: 1001;
            font-size: 30px;
            color: #bd8c1b;
            font-weight: bold;
            cursor: pointer;
            width: auto;
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
            color: #bd8c1b;
        }

        .desktop {
            display: block;
        }

        .mobile {
            display: none;
        }

        body {
            padding: 0% 7% 0% 7%;
            font-size: small;
            overflow-x: hidden;
        }

        h1,
        h2,
        h3,
        h4,
        h5,
        h6 {
            margin-bottom: 15px;
            margin-top: 15px;
        }

        h4 {
            color: #bd8c1b;
            font-weight: bold;
            font-size: 0.9rem;
        }

        h6 {
            color: #333333;
            font-weight: 200;
            line-height: 2rem;
            font-size: small;
        }

        .row {
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .column {
            padding: 0% 0%;
        }

        .gridlocation {
            width: 16.66%;
            padding: 5px 15px 5px 15px;
        }

        .left {
            width: 50%;
            padding: 0px 15px 0px 0px;
        }

        .right {
            width: 50%;
            padding: 0px 0px 0px 15px;
        }

        .left70 {
            width: 70%;
            padding: 0px 15px 0px 0px;
        }

        .right30 {
            width: 30%;
            padding: 0px 0px 0px 15px;
        }

        .left53 {
            width: 53%;
            padding: 0px 15px 0px 0px;
        }

        .middle4 {
            width: 4%;
        }

        .right43 {
            width: 43%;
            padding: 0px 0px 0px 10px;
        }

        .iti {
            width: 100% !important;
        }

        input {
            caret-color: #5d68a2;
            width: 100%;
        }

        .containerform {
            position: relative;
            width: 30%;
            border-radius: 20px;
            margin-left: 15px;
            padding: 30px;
            box-sizing: border-box;
            background: #fff;
            box-shadow: 14px 14px 20px #e3e1ee, -14px -14px 20px #e3e1ee;
        }

        .inputs {
            text-align: left;
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
            margin-top: 10px;
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
            background: #0f9d58;
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
                color: #fff;
                text-shadow: 0 0 20px #5d68a2, 0 0 30px #5d68a2, 0 0 40px #5d68a2, 0 0 50px #5d68a2, 0 0 60px #5d68a2, 0 0 70px #5d68a2, 0 0 80px #5d68a2, 0 1 90px #5d68a2;
            }

            to {
                color: #fff;
                text-shadow: 0 0 10px #5d68a2, 0 0 20px #5d68a2, 0 0 30px #5d68a2, 0 0 40px #5d68a2, 0 0 50px #5d68a2, 0 0 60px #1245a8, 0 0 70px #5d68a2, 0 0 90px #1245a8;
            }
        }

        @media screen and (max-width: 800px) {
            .desktop {
                display: none;
            }

            .mobile {
                display: block;
            }

            .row {
                display: block;
            }

            .gridlocation {
                width: 100%;
                padding: 0px 0px 0px 0px;
            }

            .left {
                width: 100%;
                padding: 0px 0px 0px 0px;
            }

            .right {
                width: 100%;
                padding: 0px 0px 0px 0px;
            }

            .left70 {
                width: 100%;
                padding: 0px 0px 0px 0px;
            }

            .right30 {
                width: 100%;
                padding: 0px 0px 0px 0px;
            }

            .left53 {
                width: 100%;
                padding: 0px 0px 0px 0px;
            }

            .right43 {
                width: 100%;
                padding: 0px 0px 0px 0px;
            }

            .containerform {
                position: relative;
                width: 100%;
                border-radius: 20px;
                margin-left: 0px;
                padding: 30px;
                box-sizing: border-box;
                background: #fff;
                box-shadow: 14px 14px 20px #e3e1ee, -14px -14px 20px #e3e1ee;
            }

            .fourth_section {
                margin-top: 10px;
            }
        }
    </style>

</head>

<!-- Google tag (gtag.js) -->
<script async src="https://www.googletagmanager.com/gtag/js?id=G-G3J84XK1WN"></script>
<script>
    window.dataLayer = window.dataLayer || [];
    function gtag(){dataLayer.push(arguments);}
    gtag('js', new Date());
    gtag('config', 'G-G3J84XK1WN');
</script>
<!-- Google tag (gtag.js) -->
<script async src="https://www.googletagmanager.com/gtag/js?id=AW-10998815840"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());
  gtag('config', 'AW-10998815840');
</script>

<body style="font-family: 'Noto Kufi Arabic', sans-serif;">
    <!-- Google Tag Manager (noscript) -->
    <noscript>
        <iframe src="https://www.googletagmanager.com/ns.html?id=GTM-K7J7SRR" height="0" width="0" style="display:none;visibility:hidden"></iframe>
    </noscript>
    <!-- End Google Tag Manager (noscript) -->

    <!-- WHATSAPP -->
    <!--<a href="https://api.whatsapp.com/send?phone=971585600604" id="whatsappBtn" class="btn btn-sm" title="WhatsApp" onclick="dataLayer.push({'event': 'button1-click', 'var': 'whatsapp-click'});"><i class="fa fa-whatsapp"></i></a>-->

    <!-- TOP SCROLL -->
    <button onclick="topFunction()" id="myBtn" title="Go to top" style="background: transparent;"><i class="fa fa-arrow-up"></i></button>

    <div class="first_section">
        <div class="row" style="min-height: 26px;">
            <div class="column left53 desktop">
                <h1 style="color: #d4a556; text-align: center; line-height: 2rem; font-weight: 500; font-size: 1.8rem;">تملك من المطور الأسرع تسليما في دبي</h1>
            </div>
            <div class="column middle4"></div>
            <div class="column right43">
                <h3 style="color: #5d68a2; text-align: center; line-height: 1.5rem; font-weight: 500; font-size: 1.2rem;">احجز شقتك فقط 20 الف درهم قبل الطرح</h3>
                <h3 style="color: #333333; text-align: center; font-weight: 200; line-height: 2rem; font-size: 1.2rem;" dir="rtl">40,000 درهم خصم على بطاقات فزعه وإسعاد</h3>
            </div>
        </div>
    </div>
    <div class="second_section" style="z-index: 0; display: flex; justify-content: right;">
        <div class="desktop" style="background-color: #c4beb2; width: 75%; display: flex; justify-content: right;">
            <img loading="eager" src="https://hikalproperties.ae/assets/images/lpvenus/venus.jpg" alt="HIKAL PROPERTIES" style="width: 100%; margin-bottom: -40%;" />
        </div>
        <img class="mobile" loading="eager" src="https://hikalproperties.ae/assets/images/lpvenus/venus-mobo.jpg" alt="HIKAL PROPERTIES" style="width: 100%; margin-bottom: 0%; margin-top: 10%;" />
    </div>
    
    <div class="third_section" style="min-height: 555px; height: auto; z-index: 1;">
        <div class="containerform">
            <div class="inputs" style="font-weight: 400;">
                <?php
                $checkipquery = mysqli_query($con, "SELECT ip FROM leads WHERE project = 'Venus' AND leadSource = 'Campaign TikTok' ORDER BY creationDate DESC LIMIT 1");
                $checkipfetch = mysqli_fetch_array($checkipquery);
                $checkip = $checkipfetch['ip'];
                if ($ip == $checkip) {
                	?>
                	<div style="display: flex; justify-content: center;">
                		<div class="contact-form" style="width: 200px; height: 40vh; display: flex; align-items: center;">
                			<h5 class="text-center">شكراً لتسجيل اهتمامك</h5>
                		</div>
                	</div>
                	<?php
                }
                else {
                    ?>
                    <div class="contact-form">
                        <div class="error" id="error" style="font-size: 0.9rem; font-weight: 200; padding: 10px; color: #ff0000; text-align: center; display: none;">
                            برجاء تسجيل الاسم ورقم الهاتف
                        </div>
                        <form id="frm-mobile-verification">
                            <!-- NAME -->
                            <label style=" text-align: right; margin-top: 0px;">الأسم</label>
                            <input type="text" name="LeadName1" id="LeadName1" dir="rtl" placeholder="الأسم" style="font-family: 'Noto Kufi Arabic', sans-serif; font-weight: 200;" required autofocus />
                            <!-- CONTACT NUMBER -->
                            <label style=" text-align: right;">رقم التواصل</label>
                            <input type="tel" name="phone[main]" id="mobile" placeholder="رقم التواصل" style="font-family: 'Noto Kufi Arabic', sans-serif; font-weight: 200;" required autofocus />
                            <!-- HOW MANY BEDROOMS -->
                            <label style="text-align: right;">كم عدد الغرفة المناسبة لك ؟</label>
                            <div style="display: flex; justify-content: right;">
                                <label for="EnquiryRadio1" style="text-align: right; margin-top: 0px; color: #333; font-weight: 200;">
                                    غرفة وصالة
                                </label>
                                <input type="radio" name="EnquiryRadio1" id="EnquiryRadio1" value="1 Bedroom" style="width: 20px;">
                            </div>
                            <div style="display: flex; justify-content: right;">
                                <label for="EnquiryRadio2" style="text-align: right; margin-top: 0px; color: #333; font-weight: 200;">
                                    غرفتين وصالة
                                </label>
                                <input type="radio" name="EnquiryRadio1" id="EnquiryRadio2" value="2 Bedrooms" style="width: 20px;">
                            </div>
                            <!-- PURPOSE  -->
                            <label style="text-align: right;">الغرض من الشراء ؟</label>
                            <div style="display: flex; justify-content: right;">
                                <label for="PurposeRadio1" style="text-align: right; margin-top: 0px; color: #333; font-weight: 200;">
                                    استثماري
                                </label>
                                <input type="radio" name="LeadForRadio1" id="PurposeRadio1" value="Investment" style="width: 20px;">
                            </div>
                            <div style="display: flex; justify-content: right;">
                                <label for="PurposeRadio2" style="text-align: right; margin-top: 0px; color: #333; font-weight: 200;">
                                    سكني
                                </label>
                                <input type="radio" name="LeadForRadio1" id="PurposeRadio2" value="End-user" style="width: 20px;">
                            </div>
                            <div id="FormButton" name="FormButton">
                                <div class="form_button">
                                    <!-- <button type="button" style="font-family: 'Noto Kufi Arabic', sans-serif;" onclick="checkCountryCode();">إرسال</button> -->
                                    <button type="button" class="submit-click" style="font-family: 'Noto Kufi Arabic', sans-serif;" onclick="checkCountryCode();dataLayer.push({'event': 'submit-click', 'var': 'submit-click'});">إرسال</button>
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
    <div class="fourth_section" style="margin-top: -40px;">
        <div class="desktop">
            <div class="row">
                <div class="column left">
                    <img src="https://hikalproperties.ae/assets/images/lpvenus/venus3.jpg" loading="eager" alt="HIKAL PROPERTIES NOVA" style="width: 100%;" />
                </div>
                <div class="column right" style="text-align: right;">
                    <h4>
                        قرية جميرا الدائرية
                    </h4>
                    <hr style="width:50px; height: 2px; background-color: #bd8c1b; opacity: 0.5; float: right;">
                    <br>
                    <h6>الطرح الجديد للتطوير السكني الفاخر الذي طورته شركة بن غاطي في قرية الجميرة الدائرية
                        <br>
                        شقق فاخرة مكونة من غرفة وغرفتي نوم مع الصالة
                        <br>
                        برج سكني جديد بارتفاع 30 طابقاً
                        <br>
                        موقع متميز ومجتمع متطور

                    </h6>
                </div>
            </div>
            <div class="row">
                <div class="column left" style="text-align: right;">
                    <h4>
                        أهمية الموقع
                    </h4>
                    <hr style="width:50px; height: 2px; background-color: #bd8c1b; opacity: 0.5; float: right;">
                    <br>
                    <h6>
                        يقع المشروع بالقرب من العديد من المعالم الرئيسية والوجهات الشهيرة في دبي مثل مول الإمارات، ومطار دبي الدولي، وكذلك الاتصال والارتباط بشبكة الطرق الرئيسية المؤدية إلى جميع أنحاء المدينة. فسهولة الوصول ستكون له ميزة خاصة، والبنية التحتية لا تحاكي، مما يجعل كل شيءٍ منظماً ومنسّقاً، فيقدّم كل ما يحتاجه على طبق أمامك </h6>
                </div>
                <div class="column right">
                    <img src="https://hikalproperties.ae/assets/images/lpvenus/venus2.jpg" loading="eager" alt="HIKAL PROPERTIES NOVA" style="width: 100%;" />
                </div>
            </div>
            <div class="row">
                <div class="column left">
                    <img src="https://hikalproperties.ae/assets/images/lpvenus/venus1.jpg" loading="eager" alt="HIKAL PROPERTIES NOVA" style="width: 100%;" />
                </div>
                <div class="column right" style="text-align: right;">
                    <h4>
                        تصميم الشقق
                    </h4>
                    <hr style="width:50px; height: 2px; background-color: #bd8c1b; opacity: 0.5; float: right;">
                    <br>
                    <h6>
                        شقه بنظام ذكي سمارت هوم دخول ذاتي بتصميم فريد جداً
                        <br>
                        تحكم بالإضاءة والظلال والتكييف والصوت والفيديو والسينما المنزلية والأمن في منزلك
                        <br>
                        تطوير بيتك إلى بيت ذكي مع حلول مخصصة و مبتكرة
                        <br>
                        يصور تصميم البرج براعة وإبداع معماريين لا مثيل لهما جزء لا يتجزأ من فلسفة التصميم الراسخة لدى بن غاطي
                    </h6>
                </div>
            </div>
        </div>
        <div class="mobile">
            <div class="row">
                <div class="column left">
                    <img src="https://hikalproperties.ae/assets/images/lpvenus/venus3.jpg" loading="eager" alt="HIKAL PROPERTIES NOVA" style="width: 100%;" />
                </div>
                <div class="column right" style="text-align: right;">
                    <h4>
                        قرية جميرا الدائرية
                    </h4>
                    <hr style="width:50px; height: 2px; background-color: #bd8c1b; opacity: 0.5; float: right;">
                    <br>
                    <h6>الطرح الجديد للتطوير السكني الفاخر الذي طورته شركة بن غاطي في قرية الجميرة الدائرية
                        <br>
                        شقق فاخرة مكونة من غرفة وغرفتي نوم مع الصالة
                        <br>
                        برج سكني جديد بارتفاع 30 طابقاً
                        <br>
                        موقع متميز ومجتمع متطور

                    </h6>
                </div>
            </div>
            <div class="row">
                <div class="column left">
                    <img src="https://hikalproperties.ae/assets/images/lpvenus/venus2.jpg" loading="eager" alt="HIKAL PROPERTIES NOVA" style="width: 100%;" />
                </div>
                <div class="column right" style="text-align: right;">
                    <h4>
                        أهمية الموقع
                    </h4>
                    <hr style="width:50px; height: 2px; background-color: #bd8c1b; opacity: 0.5; float: right;">
                    <br>
                    <h6>
                        يقع المشروع بالقرب من العديد من المعالم الرئيسية والوجهات الشهيرة في دبي مثل مول الإمارات، ومطار دبي الدولي، وكذلك الاتصال والارتباط بشبكة الطرق الرئيسية المؤدية إلى جميع أنحاء المدينة. فسهولة الوصول ستكون له ميزة خاصة، والبنية التحتية لا تحاكي، مما يجعل كل شيءٍ منظماً ومنسّقاً، فيقدّم كل ما يحتاجه على طبق أمامك </h6>
                </div>
            </div>
            <div class="row">
                <div class="column left">
                    <img src="https://hikalproperties.ae/assets/images/lpvenus/venus1.jpg" loading="eager" alt="HIKAL PROPERTIES" style="width: 100%;" />
                </div>
                <div class="column right" style="text-align: right;">
                    <h4>
                        تصميم الشقق
                    </h4>
                    <hr style="width:50px; height: 2px; background-color: #bd8c1b; opacity: 0.5; float: right;">
                    <br>
                    <h6>
                        شقه بنظام ذكي سمارت هوم دخول ذاتي بتصميم فريد جداً
                        <br>
                        تحكم بالإضاءة والظلال والتكييف والصوت والفيديو والسينما المنزلية والأمن في منزلك
                        <br>
                        تطوير بيتك إلى بيت ذكي مع حلول مخصصة و مبتكرة
                        <br>
                        يصور تصميم البرج براعة وإبداع معماريين لا مثيل لهما جزء لا يتجزأ من فلسفة التصميم الراسخة لدى بن غاطي
                    </h6>
                </div>
            </div>
        </div>
    </div>
    <br><br><br>
    <div class="fifth_section">
        <div class="row" style="text-align: center;">
            <h4 style="font-size: medium;">
                مزايا الموقع
            </h4>
        </div>
        <div class="row" style="display: flex; justify-content: center;">
            <div class="column gridlocation" style="display: flex; justify-content: center;">
                <div style="display: block; text-align: center;">
                    <div style="font-size: 2rem; margin: 0px;"><b>7</b></div>
                    <p style="font-size: small; display: flex; justify-content: center; color: #bd8c1b;">
                        دقائق
                    </p>
                    <p class="icons-txtpara text-center" style="font-size: small; display: flex; justify-content: center;">
                        مول الإمارات
                    </p>
                    <br><br>
                </div>
            </div>
            <div class="column gridlocation" style="display: flex; justify-content: center;">
                <div style="display: block; text-align: center;">
                    <div style="font-size: 2rem; margin: 0px;"><b>10</b></div>
                    <p style="font-size: small; display: flex; justify-content: center; color: #bd8c1b;">
                        دقيقة
                    </p>
                    <p class="icons-txtpara text-center" style="font-size: small; display: flex; justify-content: center;">
                        دبي مارينا
                    </p>
                    <br><br>
                </div>
            </div>
            <div class="column gridlocation" style="display: flex; justify-content: center;">
                <div style="display: block; text-align: center;">
                    <div style="font-size: 2rem; margin: 0px;"><b>12</b></div>
                    <p style="font-size: small; display: flex; justify-content: center; color: #bd8c1b;">
                        دقيقة
                    </p>
                    <p class="icons-txtpara text-center" style="font-size: small; display: flex; justify-content: center;">
                        وسط مدينة دبي
                    </p>
                    <br><br>
                </div>
            </div>
        </div>
    </div>
    <br>
    <div class="amenities_section">
        <!-- AMENITIES  -->
        <div class="amenities">
            <style>
                .gridamenities {
                    width: 25%;
                    /* border: 1px solid #333; */
                    margin: 15px 10px;
                    padding: 5px 5px;
                    border-radius: 20px;
                    height: 100%;
                    text-align: center;
                }

                @media screen and (max-width: 800px) {
                    .gridamenities {
                        width: 100%;
                        padding: 15px 0px;
                        height: auto;
                    }
                }
            </style>
            <div class="row" style="text-align: center;">
                <h4 style="font-size: medium;">المميزات ووسائل الراحة</h4>
                <br>
            </div>
            <div class="row">
                <div class="column gridamenities">
                    <img src="assets/images/iconimg/pool000000.png" height="44" style="margin-top: -7%;" />
                    <div style="font-size: small; font-weight: 200;">
                        <span style="font-weight: 400;">حوض السباحة</span>
                        <br>
                        أفضل مكان للذهاب عندما تريد الاسترخاء وتنشيط روحك وعقلك
                    </div>
                </div>
                <div class="column gridamenities">
                    <img src="assets/images/iconimg/tree000000.png" height="44" style="margin-top: -7%;" />
                    <div class="card-body text-center" style="font-size: small; font-weight: 200;">
                        <span style="font-weight: 400;">محيطات خضراء</span>
                        <br>
                        لتوفير نمط حياة صحي ومستدام
                    </div>
                </div>
                <div class="column gridamenities">
                    <img src="assets/images/iconimg/police000000.png" height="44" style="margin-top: -7%;" />
                    <div class="card-body text-center" style="font-size: small; font-weight: 200;">
                        <span style="font-weight: 400;">أمن على مدار 24ساعة</span>
                        <br>
                        يوفر المشروع جميع احتياجات الأمان والحراسة على مدار الساعة
                    </div>
                </div>
                <div class="column gridamenities">
                    <img src="assets/images/iconimg/food000000.png" height="44" style="margin-top: -7%;" />
                    <div class="card-body text-center" style="font-size: small; font-weight: 200;">
                        <span style="font-weight: 400;">أفضل الوجهات لتناول الطعام برفقة العائلة</span>
                        <br>
                        توفر أطباق شهية لجميع فئات المجتمع
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="column gridamenities">
                    <img src="assets/images/iconimg/mall000000.png" height="44" style="margin-top: -7%;" />
                    <div class="card-body text-center" style="font-size: small; font-weight: 200;">
                        <span style="font-weight: 400;">مراكز التسوّق</span>
                        <br>
                        مكان يلبّي كافة متطلباتك اليومية و اكثر
                    </div>
                </div>
                <div class="column gridamenities">
                    <img src="assets/images/iconimg/home000000.png" height="44" style="margin-top: -7%;" />
                    <div class="card-body text-center" style="font-size: small; font-weight: 200;">
                        <span style="font-weight: 400;">مركز الرعاية الصحية</span>
                        <br>
                        مراكز رعاية صحية عالمية المستوى مع مرافق من الدرجة الأولى
                    </div>
                </div>
                <div class="column gridamenities">
                    <img src="assets/images/iconimg/parking000000.png" height="44" style="margin-top: -7%;" />
                    <div class="card-body text-center" style="font-size: small; font-weight: 200;">
                        <span style="font-weight: 400;">خدمات ركن السيارات</span>
                        <br>
                        مساحة مغطاة لوقوف السيارات حيث يمكنك ركن السيارة
                    </div>
                </div>
                <div class="column gridamenities">
                    <img src="assets/images/iconimg/environment000000.png" height="44" style="margin-top: -7%;" />
                    <div class="card-body text-center" style="font-size: small; font-weight: 200;">
                        <span style="font-weight: 400;">أفضل الحدائق للأنشطة في الهواء الطلق في دبي</span>
                        <br>
                        مساحات مثالية للتنزه والجلوس صباحاً ومساءً
                    </div>
                </div>
            </div>
        </div>
    </div>
    <br><br><br>
    <div class="dubai_section">
        <div class="dubai">
            <style>
                .griddubai {
                    width: 50%;
                    padding: 0px 10px;
                    border-radius: 20px;
                    height: 100%;
                    text-align: center;
                }

                .rowdubai {
                    display: flex;
                    justify-content: center;
                }

                .left80 {
                    width: 85%;
                    padding: 0px 10px 0px 0px;
                }

                .right20 {
                    width: 15%;
                    padding: 0px 0px 0px 10px;
                    display: flex;
                    justify-content: center;
                }

                @media screen and (max-width: 800px) {
                    .griddubai {
                        width: 100%;
                        padding: 0px 0px;
                        height: auto;
                    }

                    .left80 {
                        width: 80%;
                        padding: 0px 5px 0px 0px;
                    }

                    .right20 {
                        width: 20%;
                        padding: 0px 0px 0px 5px;
                    }
                }
            </style>
            <div class="row" style="text-align: center;">
                <h4 style="font-size: medium;">أسباب تُشجّعك على العيش والاستثمار في دبي</h4>
                <br>
            </div>
            <div class="row">
                <div class="column griddubai">
                    <!-- CURRENCY -->
                    <div class="rowdubai">
                        <div class="column left80">
                            <h5 style="font-weight: 400; text-align: right; font-size: small;">استقرار العملة</h5>
                            <h6 style="text-align: right; line-height: 1.4rem; font-weight: 200;">ارتبط الدرهم الإماراتي بالدولار الأمريكي منذ عام 1973 وتم تحديده بمعدل ثابت منذ عام 1997، ما يجعله أحد أكثر العملات استقراراً في العالم.</h6>
                        </div>
                        <div class="column right20">
                            <img src="assets/images/iconimg/currency.svg" style="width: 100%;" />
                        </div>
                    </div>
                </div>
                <div class="column griddubai">
                    <!-- SECURITY -->
                    <div class="rowdubai">
                        <div class="column left80">
                            <h5 style="font-weight: 400; text-align: right; font-size: small;">بيئة آمنة للجميع</h5>
                            <h6 style="text-align: right; line-height: 1.4rem; font-weight: 200;">دولة الإمارات العربية المتحدة هي واحدة من أكثر الدول أماناً في العالم مع نظام تطبيق للقانون يعكس أعواماً من التطوّر والرؤية الثاقبة، مّا أدى إلى معدّلات جريمة منخفضة.</h6>
                        </div>
                        <div class="column right20">
                            <img src="assets/images/iconimg/security.svg" style="width: 100%;" />
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="column griddubai">
                    <!-- COVID -->
                    <div class="rowdubai">
                        <div class="column left80">
                            <h5 style="font-weight: 400; text-align: right; font-size: small;">19-إدارة أزمة كوفيد</h5>
                            <h6 style="text-align: right; line-height: 1.4rem; font-weight: 200;">تعد دولة الإمارات العربية المتحدة نموذجاً عالمياً للتأهب للأزمات من خلال حملات التطعيم على مستوى الدولة والحفاظ على أعلى مستويات الوقاية من الجائحة.</h6>
                        </div>
                        <div class="column right20">
                            <img src="assets/images/iconimg/covid.svg" style="width: 100%;" />
                        </div>
                    </div>
                </div>
                <div class="column griddubai">
                    <!-- TAX -->
                    <div class="rowdubai">
                        <div class="column left80">
                            <h5 style="font-weight: 400; text-align: right; font-size: small;">الحوافز الضريبية</h5>
                            <h6 style="text-align: right; line-height: 1.4rem; font-weight: 200;">تقدم دولة الإمارات العربية المتحدة العديد من الحوافز للاستثمار، بما في ذلك؛ إعفاء من ضريبة الدخل، وإعفاء من الضريبة على أرباح رأس المال، و إعفاء من الضريبة على الثروة، ما يتيح أقصى عائد للمستثمرين ورجال الأعمال.</h6>
                        </div>
                        <div class="column right20">
                            <img src="assets/images/iconimg/tax.svg" style="width: 100%;" />
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="column griddubai">
                    <!-- FAMILY -->
                    <div class="rowdubai">
                        <div class="column left80">
                            <h5 style="font-weight: 400; text-align: right; font-size: small;">نظام صحيّ عالمي المستوى</h5>
                            <h6 style="text-align: right; line-height: 1.4rem; font-weight: 200;;">تستثمر دبي بشكل مكثف في قطاع الرعاية الصحية، وذلك في بعض من أهم العيادات والمستشفيات في المنطقة، ما يجعلها الاختيار الأمثل لصحتك ورفاهيتك.</h6>
                        </div>
                        <div class="column right20">
                            <img src="assets/images/iconimg/family.svg" style="width: 100%;" />
                        </div>
                    </div>
                </div>
                <div class="column griddubai">
                    <!-- INFRASTRUCTURE  -->
                    <div class="rowdubai">
                        <div class="column left80">
                            <h5 style="font-weight: 400; text-align: right; font-size: small;">بنية تحتية عالمية المستوى</h5>
                            <h6 style="text-align: right; line-height: 1.4rem; font-weight: 200;">تحتضن دبي بيئة تزدهر فيها المجتمعات مع ما تقدمه من بنية تحتية ممتازة وأنظمة قانونية ووسائل نقل عام وحدائق ووجهات ترفيهية وغيرها الكثير.</h6>
                        </div>
                        <div class="column right20">
                            <img src="assets/images/iconimg/infrastructure.svg" style="width: 100%;" />
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="column griddubai">
                    <!-- LOCATION  -->
                    <div class="rowdubai">
                        <div class="column left80">
                            <h5 style="font-weight: 400; text-align: right; font-size: small;">موقع استراتيجي</h5>
                            <h6 style="text-align: right; line-height: 1.4rem; font-weight: 200;">تُتيح دبي سهولة الوصول إلى بقية العالم نظراً لموقعها المتميز على مفترق الطرق بين أوروبا وآسيا وأفريقيا عبر البر والبحر والجو، ما يجعلها وجهة رائدة للسياحة والاستثمار.</h6>
                        </div>
                        <div class="column right20">
                            <img src="assets/images/iconimg/location.svg" style="width: 100%;" />
                        </div>
                    </div>
                </div>
                <div class="column griddubai">
                    <!-- PLANE  -->
                    <div class="rowdubai">
                        <div class="column left80">
                            <h5 style="font-weight: 400; text-align: right; font-size: small;">سهولة الاتصال</h5>
                            <h6 style="text-align: right; line-height: 1.4rem; font-weight: 200;">تتمتّع دبي برحلات طيران مباشرة من 97 دولة، كما تحتضن مطارات دبي شركات الطيران الرائدة عالمياً، ما يُساعدك في الاتصال ببقية العالم بكلّ سهولة.</h6>
                        </div>
                        <div class="column right20">
                            <img src="assets/images/iconimg/plane.svg" style="width: 100%;" />
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="column griddubai">
                    <!-- PEACE -->
                    <div class="rowdubai">
                        <div class="column left80">
                            <h5 style="font-weight: 400; text-align: right; font-size: small;">تناغم بين أفراد المجتمع</h5>
                            <h6 style="text-align: right; line-height: 1.4rem; font-weight: 200;">دبي هي موطن لأكثر من 200 جنسية مختلفة، وهي مدينة آمنة تحتضن الجميع وتتعدد فيها الثقافات، وتستقبل الزوار من كل أنحاء العالم.</h6>
                        </div>
                        <div class="column right20">
                            <img src="assets/images/iconimg/peace.svg" style="width: 100%;" />
                        </div>
                    </div>
                </div>
                <div class="column griddubai">
                    <!-- EVERYBODY -->
                    <div class="rowdubai">
                        <div class="column left80">
                            <h5 style="font-weight: 400; text-align: right; font-size: small;">نظام منفتح وحرّ</h5>
                            <h6 style="text-align: right; line-height: 1.4rem; font-weight: 200;">سهّلت السياسات الاقتصادية المنفتحة، والرقابة الحكومية المرنة، وتنظيمات القطاع الخاصّ من عملية الاستثمار الأجنبي المباشر وعملت على تمكين التنافس على المستوى العالمي.</h6>
                        </div>
                        <div class="column right20">
                            <img src="assets/images/iconimg/everybody.svg" style="width: 100%;" />
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <!--<div class="binghatti_section" style="margin: 0% -11% 0% -11%; background-color: #e33c42; padding-top: 0px; display: flex; justify-content: center;">-->
    <!--    <video width="250" autoplay="true" autopictureinpicture="true" muted="true" style="z-index: 1001;" loop="true" preload='none' playsinline>-->
    <!--      <source src="assets/video/binghatti.mp4" type="video/mp4">-->
          <!--<source src="https://hikalproperties.ae/assets/video/binghatti.mp4" type="video/ogg">-->
    <!--    </video>-->
    <!--</div>-->
    
    <div class="last_section" style="margin: 20px -11% 0% -11%; padding: 20px 11% 20px 11%; background-color: #133465; display: flex; justify-content: center;">
        <img class="desktop" src="https://hikalproperties.ae/assets/images/lpcrescent/jvcmap.jpg" loading="eager" alt="HIKAL PROPERTIES" style="width: 60%;" />
        <img class="mobile" src="https://hikalproperties.ae/assets/images/lpcrescent/jvcmap.jpg" loading="eager" alt="HIKAL PROPERTIES" style="width: 100%;" />
    </div>
    <footer style="margin: 0% -11% -11% -11%; background-color: #fff; padding-top: 10px;">
        <?php require_once('footer.php'); ?>
    </footer>

    <!-- REQUIRED SCRIPTS -->
    <script src="verification.js"></script>
    <script src="verificationm.js"></script>
    <script src="verificationbitcoin.js"></script>

    <!-- JQUERY -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" type="text/javascript"></script>

    <script>
        var input = document.querySelector("#mobile");
        var phone_number = window.intlTelInput(input, {
            separateDialCode: false,
            preferredCountries: ["ae"],
            hiddenInput: "full",
            utilsScript: "//cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.3/js/utils.js"
        });

        function checkCountryCode() {
            return new Promise((resolve, reject) => {
                var phone = phone_number.getNumber(intlTelInputUtils.numberFormat.E164);

                var leadnumber = $("#mobile").val();
                var leadname = $("#LeadName1").val();
                var enquiryType = $("input[type='radio'][name='EnquiryRadio1']:checked").val();
                var leadFor = $("input[type='radio'][name='LeadForRadio1']:checked").val();
                // var lat = $("#Latitude").val();
                // var long = $("#Longitude").val();
                
                var lat = "";
                var long = "";

                // console.log(leadnumber);
                // console.log(leadname);
                // console.log(enquiryType);
                // console.log(leadFor);
    
                // console.log(phone);

                if (leadname == "") {
                    const box = document.getElementById('error');
                    box.style.display = 'block';
                }
                else if (leadnumber == "") {
                    const box = document.getElementById('error');
                    box.style.display = 'block';
                }
                else {
                    var url = location.href;
                    var urlFilename = url.substring(url.lastIndexOf('/')+1);

                    var input = {
                        "lead_contact" : phone,
                        "lead_name" : leadname,
                        "enquiry_type" : enquiryType,
                        "lead_for" : leadFor,
                        "file_name" : urlFilename,
                        "latitude" : lat,
                        "longitude" : long
                    };
                    

                    $.ajax({
                        url : 'addleadfromlandingpage.php',
                        type : 'POST',
                        data : input,
                        success : function() {
                            // console.log("New Lead!");
                            window.location = "https://hikalproperties.ae/ar-thankyou";
                        },
                        error: function () {
                            checkCountryCode();
                        },
                    });
                }
            
            
                // $.ajax({
                //     url: window.location.href,
                //     type: 'POST',
                //     data: {
                //         key: 'value',
                //     },
                //     success: function (data) {
                //         resolve(data)
                //     },
                //     error: function (error) {
                //         reject(error)
                //     },
                // })
            })
        }
    </script>

    <script>
        // Get the button
        let mybutton = document.getElementById("myBtn");
        let mybuttonw = document.getElementById("whatsappBtn");

        // When the user scrolls down 20px from the top of the document, show the button
        window.onscroll = function() {
            scrollFunction()
        };

        function scrollFunction() {
            if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
                mybutton.style.display = "block";
                mybuttonw.style.display = "block";
            } else {
                mybutton.style.display = "none";
                mybuttonw.style.display = "none";
            }
        }

        // When the user clicks on the button, scroll to the top of the document
        function topFunction() {
            document.body.scrollTop = 0;
            document.documentElement.scrollTop = 0;
        }

        function openForm() {
            document.getElementById("myForm").style.display = "block";
        }

        function closeForm() {
            document.getElementById("myForm").style.display = "none";
        }
    </script>

</body>

</html>