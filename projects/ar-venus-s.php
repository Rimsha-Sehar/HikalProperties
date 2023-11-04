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
        <div class="desktop"  style="background-color: #c4beb2; width: 75%; justify-content: right;">
            <img class="desktop"  loading="eager" src="https://hikalproperties.ae/assets/images/lpvenus/venus.jpg" alt="HIKAL PROPERTIES" style="width: 100%; margin-bottom: -40%;" />
        </div>
        <img class="mobile" loading="eager" src="https://hikalproperties.ae/assets/images/lpvenus/venus-mobo.jpg" alt="HIKAL PROPERTIES" style="width: 100%; margin-bottom: 0%; margin-top: 10%;" />
    </div>
    
    <div class="third_section" style="min-height: 555px; height: auto; z-index: 1;">
        <div class="containerform">
            <div class="inputs" style="font-weight: 400;">
                <?php
                $checkipquery = mysqli_query($con, "SELECT ip FROM leads WHERE project = 'Venus' AND leadSource = 'Campaign Snapchat' AND language = 'Arabic' ORDER BY creationDate DESC LIMIT 1");
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
                    <form id="lead-form" method="POST" action="add-lead-process.php">
                        <div style="display: none">
                            <input type="text" id="Project" name="Project" value="Venus" />
                            <input type="text" id="LeadType" name="LeadType" value="Apartment" />
                            <input type="text" id="Language" name="Language" value="Arabic" />
                            <input type="text" id="LeadSource" name="LeadSource" value="Campaign Snapchat" />
                            
                            <?php
                            $url = "https://" . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
                            $parsedUrl = parse_url($url);
                            $filename = ltrim($parsedUrl['path'], '/') . '?' . $parsedUrl['query'];
                            ?>
                            <input type="text" id="Filename" name="Filename" value="<?php echo $filename; ?>" />
                        </div>
                                            
                        <!-- NAME -->
                        <label style=" text-align: right; margin-top: 0px;">الأسم</label>
                        <input type="text" name="LeadName1" id="LeadName1" dir="rtl" placeholder="الأسم" style="font-family: 'Noto Kufi Arabic', sans-serif; font-weight: 200;" required  />
                        <!-- CONTACT NUMBER -->
                        <label style=" text-align: right;">رقم التواصل</label>
                        <input type="tel" name="phone" id="phone" pattern="^\+[0-9]{1,3}[0-9]{8,10}$" placeholder="+971561234567" style="font-weight: 200;" required onkeyup="removeSpaces(this)"  />
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
                                <button type="submit" class="submit-click" onclick="dataLayer.push({'event': 'submit-click', 'var': 'submit-click'});" style="font-family: 'Noto Kufi Arabic', sans-serif;">إرسال</button>
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
    
    <footer style="margin: 0% -11% -11% -11%; background-color: #133465; padding-top: 10px;">
        <div style="font-size: 0.7rem; background-color: #133465; padding: 15px 0px; text-align: center; color: #fff;">
            Copyright &copy; <?php echo date('Y'); ?>
            <strong><a href="privacypolicy" style="color: #fff;">Privacy Policy</a>
        </div>
    </footer>

    <!-- REQUIRED SCRIPTS -->
    <script src="verification.js"></script>
    <script src="verificationm.js"></script>
    <script src="verificationbitcoin.js"></script>

    <!-- JQUERY -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" type="text/javascript"></script>
    
    <script>
        function removeSpaces(input) {
          // Remove spaces from the input value
          input.value = input.value.replace(/\s/g, '');
        }
    </script>

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