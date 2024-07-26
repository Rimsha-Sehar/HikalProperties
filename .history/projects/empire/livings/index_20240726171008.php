<?php
session_start();
error_reporting(0);
include ('../../dbconfig/dbcon.php');

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

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Hikal Real Estate Properties | Empire Livings</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description"
        content="Hikal Real Estate | Hikal Properties | Empire Developments | Empire Livings by Empire Developments">

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
            /* --primary: #9d2f52; */
            --primary: #759f82;
            /* --secondary: #f1effa; */
            --secondary: #dae8de;
            --white: #FFFFFF;
            --black: #000000;
            --dark-bg-text: #797979;
            --light-bg-text: #EEEEEE;
        }
    </style>
</head>

<body class="english">

    <?php include_once ("../../gtm/gtm-pixel.php"); ?>

    <?php
    $checkip = mysqli_query($con, "SELECT byIP FROM is_blocked WHERE status = 1 AND byIP = '$ip'");
    $fetchip = mysqli_fetch_array($checkip);
    if (mysqli_num_rows($checkip) > 0) {
        ?>
        <div class="blocked-ip">
            <div class="d-flex justify-content-center align-items-center text-center p-5"
                style="width: 100%; min-height: 100vh;">
                <h1 class="text-center" style="font-size: 2.2rem; line-height: 4.4rem;">
                    Some suspicious activities have been detected from your device! Please contact
                    <a href="tel:+97142722249" class="gold-grad" style="font-weight: bold;">+97142722249</a>
                    for further assistance!
                </h1>
            </div>
        </div>
        <?php
    } else {
        ?>
        <div class="full-body">
            <!-- LOADING OVERLAY  -->
            <div id="loadingOverlay" class="overlay" style="display: none;">
                <?php include_once ("../../components/loading-circle.php"); ?>
            </div>

            <!-- TOP SCROLL -->
            <button onclick="topFunction()" id="myBtn" title="Go to top" style="background: transparent;"><i
                    class="fa fa-arrow-up primary-text"></i></button>

            <!-- IMAGE AND LANGUAGE AND HEADING AND COUNTDOWN -->
            <div class="first_section">
                <img class="main-image" src="../../assets/images/projects/ivy-gardens/ivygardens.jpg" loading="eager"
                    alt="Hikal Real Estate">
                <!-- LANGUAGE -->
                <div class="language-overlay">
                    <div class="language_selection">
                        <a href="https://hikalproperties.com/projects/empire/livings/ar?<?php echo $_SESSION["params"]; ?>">
                            <div class="d-flex align-items-center">
                                <span class="next-language">AR</span>
                                <img class="lang-flag"
                                    src="https://hikalproperties.com/projects/assets/images/flags/ar.webp" />
                            </div>
                        </a>
                    </div>
                </div>
                <!-- HEADING -->
                <?php include_once("en-heading.php"); ?>
                <!-- COUNTDOWN -->
                <?php
                $cd_lang = "English";
                include_once ("../../components/countdown.php");
                ?>
            </div>

            <!-- FORM -->
            <?php include_once("en-form.php"); ?>

            <!-- FOOTER -->
            <footer style="background-color: var(--primary);">
                <?php include_once ("../../components/footer-only-light.php"); ?>
            </footer>

            <!-- SCROLL TO FORM -->
            <!-- <script>
            function scrollToForm() {
                var element = document.getElementById("form-container");
                element.scrollIntoView({ behavior: "smooth", block: "start" });
            }
        </script> -->

            <!-- SCROLL TO FORM -->
            <script>
                function scrollToForm() {
                    var formDiv = document.getElementById('form-container');
                    formDiv.scrollIntoView({ behavior: 'smooth' });
                }
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

                    var Developer = document.getElementById('developer_name');
                    Developer.value = $("#Developer").val();

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
        </div>
        <?php
    }
    ?>

</body>

</html>
