<?php
session_start();
session_destroy();
session_start();
error_reporting(0);
include('../../../dbconfig/dbhybrid.php');

include('../../../data/off-plan-ar.php');
include('../../../data/agents-ar.php');

$ip = $_SERVER['REMOTE_ADDR'];
$device = $_SERVER['HTTP_USER_AGENT'];
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Hikal Real Estate Properties | Consultation</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Hikal Real Estate | Hikal Properties | Free Consultation">

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
    
    <!--OWL CAROUSEL-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js" integrity="sha512-bPs7Ae6pVvhOSiIcyUClR7/q2OAsRiovw4vAkX+zJbw3ShAeeqezq50RIIcIURq7Oa20rW2n2q+fyXBNcU9lrw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" integrity="sha512-tS3S5qG0BlhnQROyJXvNjeEM4UpMXHrQfTGmbQ1gKmelCxlSEBUaxhRBj/EFTzpbP4RVSrpEikbmdJobCvhE3g==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- STYLES -->
    <link rel="stylesheet" href="https://hikalproperties.com/projects/assets/css/dark-theme-gold.css" />
    <link rel="stylesheet" href="https://hikalproperties.com/projects/assets/css/animation.css" />

    <!-- META PIXEL -->
    <script src="https://hikalproperties.com/projects/gtm/meta.js"></script> 
</head>

<body class="arabic" dir="rtl" style="background: #0E0E0E;">
    <?php include_once("../../../gtm/meta.php"); ?>

    <?php
    $checkip = mysqli_query($con, "SELECT byIP FROM is_blocked WHERE status = 1 AND byIP = '$ip'");
    $fetchip = mysqli_fetch_array($checkip);
    if (mysqli_num_rows($checkip) > 0) {
        ?>
        <div class="d-flex justify-content-center align-items-center text-center p-5" style="width: 100%; min-height: 100vh;">
            <h1 class="text-center" style="font-size: 2.2rem; line-height: 4.4rem;">
                لقد اكتشفنا بعض الأنشطة المشبوهة من جهازك! يرجى التواصل مع 
                <a href="tel:+97142722249" class="gold-grad" style="font-weight: bold;">+97142722249</a>
                للمساعدة الإضافية!
            </h1>
        </div>
        <?php
    }
    else {
        ?>
        <!-- TOP SCROLL -->
        <button onclick="topFunction()" id="myBtn" title="Go to top" style="background: transparent;"><i class="fa fa-arrow-up gold-grad"></i></button>
        
        <!--HEADINGS & FORM-->
        <div class="first_section" style="background: url('https://hikalproperties.com/projects/assets/images/static/sliverBgDark.png'); background-size: contain; background-repeat: no-repeat; background-position: center bottom;">
            <div class="container container-fluid pb-5">
                <div class="row py-2 d-flex align-items-center">
                    <div class="col-6 d-flex justify-content-start align-items-center">
                        <img class="desktop" src="https://hikalproperties.com/projects/assets/images/logo/fullLogoREWhite.png" width="100" />
                        <p class="desktop my-0 py-1 mx-1" style="font-weight: 400;">استشارات العقارات</p>
                    </div>
                    <div class="col-12 col-sm-12 col-md-6 col-lg-6 d-flex justify-content-end p-1">
                        <button class="" style="width: auto; border-radius: 50px; border: none; font-weight: bold;;">
                            <span id="hourglass-start"><i class="fa-solid fa-hourglass-start mx-1"></i></span>
                            <span id="hourglass-half" style="display: none;"><i class="fa-regular fa-hourglass-half mx-1"></i></span>
                            <span id="hourglass-end" style="display: none;"><i class="fa-solid fa-hourglass-end mx-1"></i></span>
                            <span class="mx-1 text-uppercase" id="waiting-list">7في الإنتظار</span>
                        </button>
                    </div>
                </div>
                <div class="row d-flex align-items-center">
                    <div class="col-12 col-sm-12 col-md-6 col-lg-7 col-xl-8 px-1 py-1">
                        <h1 class="gold-grad-anim" style="text-align: center; line-height: 2.5rem; font-size: 2.5rem;">استشارة مجانية</h1>
                        <h5 style="text-align: center; line-height: 2rem; font-weight: 400;">
                            سجّل الآن للحصول على استشارة مجانية حول
                            <br />
                            سوق العقارات في الإمارات
                        </h5>
                    </div>
                    <div class="col-12 col-sm-12 col-md-6 col-lg-5 col-xl-4 px-1 py-1">
                        <div style="display: flex; align-items: center;">
                            <!-- FORM -->
                            <div style="width: 100%; min-height: 444px; z-index: 1; display: flex; justify-content: center;">
                                <div class="containerform">
                                    <div class="inputs" style="font-weight: 400;">
                                        <?php
                                        $url = "https://" . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
                                        $parsedUrl = parse_url($url);
                                        $filename = ltrim($parsedUrl['path'], '/') . '?' . $parsedUrl['query'];
                                        ?>
                                        <?php
                                        // $query = mysqli_query($con, "SELECT ip, filename FROM leads ORDER BY creationDate DESC LIMIT 1");
                                        // $fetch = mysqli_fetch_array($query);
                                        // if ($ip == $fetch['ip'] && $filename == $fetch['filename']) {
                                            ?>
                                            <!-- <div class="p-5 d-flex justify-content-center align-items-center text-center" style="width: 100%; height: 100%; line-height: 2.5rem;">
                                                شكرًا لتسجيلك معنا. سيتواصل محترفونا معك قريبًا!                                             
                                            </div> -->
                                            <?php
                                        // }
                                        // else {
                                            ?>
                                            <!--NEW FORM-->
                                            <div class="contact-form" dir="ltr">
                                                <form id="lead-form" method="POST" action="../../../controllers/add-lead-campaign.php">
                                                    <div style="display: none">
                                                        <input type="text" id="LeadSource" name="LeadSource" value="Campaign Instagram" />
                                                        <input type="text" id="Country" name="Country" value="Iraq" />
                                                        
                                                        <?php
                                                        $url = "https://" . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
                                                        $parsedUrl = parse_url($url);
                                                        $filename = ltrim($parsedUrl['path'], '/') . '?' . $parsedUrl['query'];
                                                        ?>
                                                        <input type="text" id="Filename" name="Filename" value="<?php echo $filename; ?>" />
                                                    </div>
                                                    
                                                    <!-- NAME -->
                                                    <label class="gold-grad" style="margin-top: 0px;">الإسم</label>
                                                    <input type="text" name="Name" id="Name" required />
                                            
                                                    <!--EMAIL-->
                                                    <label class="gold-grad">عنوان البريد الإلكتروني</label>
                                                    <input type="email" name="Email" id="Email" placeholder="example@gmail.com" required />
                                                    
                                                    <!-- CONTACT NUMBER -->
                                                    <label class="gold-grad">رقم الاتصال</label>
                                                    <input type="tel" name="phone[main]" id="mobile" style="color: #000000;" required oninput="updateLeadContact()" />
                                                    <input type="tel" name="leadContact" id="leadContact" style="display: none;" />

                                                    <!--PROJECT-->
                                                    <!-- <label class="gold-grad">المشروع</label>
                                                    <select name="Project" id="Project" dir="rtl">
                                                        <option value="">---اختيار---</option> -->
                                                        <?php 
                                                        // for ($i = 0; $i < count($offplan); $i++) : 
                                                            ?>
                                                            <!-- <option value=" -->
                                                            <?php 
                                                            // echo $offplan[$i]['projectName']; 
                                                            ?>
                                                            <!-- "> -->
                                                                <?php 
                                                                // echo $offplan[$i]['project']; 
                                                                ?>
                                                            <!-- </option> -->
                                                        <?php 
                                                        // endfor; 
                                                        ?>
                                                        <!-- <option value="Other">أي / آخر</option>
                                                    </select> -->
                                                    
                                                    <!--LANGUAGE-->
                                                    <label class="gold-grad">اللغة المفضلة</label>
                                                    <!--<input type="text" name="Language" id="Language" required />-->
                                                    <select name="Language" id="Language" required dir="rtl">
                                                        <option value="Arabic">العربية</option>
                                                        <option value="English">English</option>
                                                        <option value="French">Français</option>
                                                        <option value="Chinese">中文</option>
                                                    </select>
                                            
                                                    <!-- CONSULTATION  -->
                                                    <label class="gold-grad">استشارة</label>
                                                    <div style="display: flex; align-items: center;" dir="rtl">
                                                        <input class="mx-2" type="radio" name="Consultation" id="Consultation1" value="Live Video Call Meeting" style="width: 20px;" required onchange="scheduleMeeting()">
                                                        <label for="Consultation1" style="margin-top: 7px; padding-left: 7px; color: #FFFFFF; display: flex; align-items: center;">
                                                             الاجتماع عبر مكالمة فيديو مباشرة
                                                            <div class="mx-2 p-1 white" style="background: #DA1F26; font-weight: bold; font-size: small; border-radius: 5px; display: flex; align-items: center;">
                                                                <img src="https://hikalproperties.com/projects/assets/images/static/live.svg" class="live-icon mx-1" style="width: 20px;" />
                                                                <span class="mx-1">LIVE</span>
                                                            </div>
                                                        </label>
                                                    </div>
                                                    <div style="display: flex; align-items: center;" dir="rtl">
                                                        <input class="mx-2" type="radio" name="Consultation" id="Consultation2" value="WhatsApp Consultation" style="width: 20px;" required onchange="scheduleMeeting()">
                                                        <label for="Consultation2" style="margin-top: 7px; padding-left: 7px; color: #FFFFFF; display: flex;">
                                                            إستشارة عبر الواتساب
                                                            <div class="mx-2 p-1 white" style="background: #24CC63; border-radius: 5px; display: flex; align-items: center; width: auto;">
                                                                <i class="fa-brands fa-whatsapp" style="color: #FFFFFF; font-size: 16px;"></i>
                                                            </div>
                                                        </label>
                                                    </div>
                                                    <div style="display: flex; align-items: center;" dir="rtl">
                                                        <input class="mx-2" type="radio" name="Consultation" id="Consultation3" value="Register for later" style="width: 20px;" required onchange="scheduleMeeting()">
                                                        <label for="Consultation3" style="margin-top: 7px; padding-left: 7px; color: #FFFFFF;">
                                                            سجّل لوقت لاحق
                                                        </label>
                                                    </div>

                                                    <!-- SCHEDULE  -->
                                                    <div id="ScheduleDatetime" style="display: none;">
                                                        <label class="gold-grad">جدولة مكالمة حية</label>
                                                        <input type="datetime-local" id="Schedule" name="Schedule" min="" max="" value="">
                                                    </div> 
                                            
                                                    <!--ENQUIRY NOTE-->
                                                    <!--<label class="gold-grad">ENQUIRY NOTE</label>-->
                                                    <!--<textarea type="text" name="Enote" id="Enote" required>I'm looking for professional guidance in the real estate market.</textarea>-->

                                                    <div id="FormButton" name="FormButton">
                                                        <div class="form_button">
                                                            <button type="submit" class="submit-click" onclick="dataLayer.push({'event': 'submit-click', 'var': 'submit-click'});" style="font-weight: bold;">إرسال</button>
                                                        </div>
                                                    </div>
                                                    <div id="Message" name="Message" class="pt-3 text-center" style="color: #DA1F26; display: none;">يرجى إدخال جميع الحقول!</div>
                                                </form>
                                            </div>
                                            <?php
                                        // }
                                        ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    
        <!--CONSULTANTS-->
        <div class="second_section mb-5" style="background-color: #000000;">
            <div class="container container-fluid pt-5">
                <div class="row" style="text-align: center;">
                    <h4 class="gold-grad-anim" style="font-weight: 900;">
                        مستشارونا المحترفون
                    </h4>
                </div>
                
                <style>
                    .team-block {
                        position: relative;
                        margin-bottom: 20px;
                    }

                    .team-block .inner-box {
                        position: relative;
                    }

                    .team-block .image-box {
                        position: relative;
                        padding: 15px;
                        background-color: rgba(255,255,255,.15);
                        overflow: hidden;
                        border-radius: 15px;
                    }

                    .team-block .image-box .image:after,
                    .team-block .image-box:before {
                        position: absolute;
                        left: 0;
                        top: 0;
                        height: 0;
                        width: 100%;
                        background-color: #000000;
                        content: "";
                        -webkit-transition: all 700ms ease;
                        -moz-transition: all 700ms ease;
                        -ms-transition: all 700ms ease;
                        -o-transition: all 700ms ease;
                        transition: all 700ms ease;
                    }
                    
                    .team-block .image-box:before {
                        border-radius: 15px;
                        border-top: 0.11em solid #fadc88;
                        border-left: 0.11em solid #9c7625;
                        border-right: 0.11em solid #9c7625;
                        border-bottom: 0.11em solid #9c7625;
                        box-shadow: 0 19px 38px rgba(255,255,255,0.10), 0 15px 12px rgba(255,255,255,0.02);
                    }

                    .team-block .inner-box:hover .image-box .image:after,
                    .team-block .inner-box:hover .image-box:before{
                        height: 100%;
                    }

                    .team-block .image-box .image:after{
                        opacity: .40;
                        z-index: 1;
                        top: auto;
                        bottom: 0;
                        background-color: #000000;
                    }

                    .team-block .image-box .image{
                        position: relative;
                        margin-bottom: 0;
                        z-index: 1;
                        overflow: hidden;
                    }

                    .team-block .image-box .image img{
                        display: block;
                        width: 100%;
                        height: auto;
                    }

                    .team-block .rera{
                        position: absolute;
                        left: 0;
                        bottom: -140px;
                        padding: 20px;
                        width: 100%;
                        z-index: 9;
                        -webkit-transition: all 700ms ease;
                        -moz-transition: all 700ms ease;
                        -ms-transition: all 700ms ease;
                        -o-transition: all 700ms ease;
                        transition: all 700ms ease;
                        font-weight: bold;
                    }

                    .team-block .inner-box:hover .rera{
                        bottom: 0;
                    }
                    
                    img {
                        max-width: 100%;
                        height: auto;
                    }
                </style>
                <div class="row py-4">
                    <?php foreach ($agents as $index => $agents) : ?>
                        <div class="col-6 col-sm-6 col-md-6 col-lg-4 col-xl-3 px-2 py-2">
                            <div class="team-block">
                                <div class="inner-box">
                                    <div class="image-box">
                                        <figure class="image">
                                            <?php
                                            if ($agents['picture'] === null || $agents['picture'] === "null") {
                                                ?>
                                                <img src="https://hikalproperties.com/projects/assets/images/logo/hikalagency-icon.png" loading="eager" alt="HIKAL PROPERTIES"  />
                                                <?php
                                            }
                                            else {
                                                ?>
                                                <img src="<?php echo $agents['picture']; ?>" loading="eager" alt="HIKAL PROPERTIES"  />
                                                <?php
                                            }
                                            ?>
                                            <div class="rera">
                                                <?php echo $agents['rera']; ?>
                                            </div>
                                        </figure>
                                        <div class="text-center">
                                            <h6 class="gold-grad m-0 pt-3 text-uppercase" style="font-size: 0.7rem; line-height: 1rem;"><?php echo $agents['userName']; ?></h6>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    
        <footer>
            <?php include_once("../../../components/footer-copyright.php"); ?>
        </footer>
        
        <!--COUNTRY CODE-->
        <script>
            var minput = document.querySelector("#mobile");
            var phone_number = window.intlTelInput(minput, {
                separateDialCode: true,
                preferredCountries: ["iq", "ae", "sa", "qa", "om", "kw"],
                hiddenInput: "full",
                utilsScript: "//cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.3/js/utils.js"
            });

            function updateLeadContact() {
                var full_number = phone_number.getNumber(intlTelInputUtils.numberFormat.E164);
                document.getElementById('leadContact').value = full_number;
            }
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
        
        <!--OWL CAROUSEL-->
        <script>
            jQuery(document).ready(function($) {
        		"use strict";
    		    //  TESTIMONIALS CAROUSEL HOOK
    	        $('#team-slider').owlCarousel({
    	            rtl:true,
                    loop: true,
    	            center: true,
    	            items: 3,
    	            margin: 0,
    	            autoplay: true,
    	            dots:true,
    	            autoplayTimeout: 3000,
    	            smartSpeed: 400,
    	            responsive: {
    	                0: {
    	                    items: 1
    	                },
    	                768: {
    	                    items: 2
    	                },
    	                1170: {
    	                    items: 3
    	                }
    	            }
    	        });
        	});
        </script>
        
        <!--WAITING LIST-->
        <script>
            function getRandomInt(min, max) {
                return Math.floor(Math.random() * (max - min + 1)) + min;
            }
    
            function updateWaitingList() {
                const currentCount = parseInt(document.getElementById('waiting-list').textContent);
                const minChange = -2; // Minimum decrement
                const maxChange = 2; // Maximum increment
    
                // Generate a random change in waiting count
                const change = getRandomInt(minChange, maxChange);
            
                // Calculate the new waiting count, ensuring it stays between 3 and 14
                let newCount = Math.max(Math.min(currentCount + change, 14), 3);
            
                document.getElementById('waiting-list').textContent = `${newCount}في الإنتظار`;
            
                // Schedule the next update after a random interval between 1 to 4 seconds
                setTimeout(updateWaitingList, getRandomInt(3000, 20000));
            }
    
            updateWaitingList(); // Initial update
        </script>
        
        <!--HOURGLASS-->
        <script>
            function animateHourglass() {
                setTimeout(function() {
                    document.getElementById('hourglass-start').style.display = 'none';
                    document.getElementById('hourglass-half').style.display = 'inline';
    
                    setTimeout(function() {
                        document.getElementById('hourglass-half').style.display = 'none';
                        document.getElementById('hourglass-end').style.display = 'inline';
          
                        setTimeout(function() {
                            document.getElementById('hourglass-end').style.display = 'none';
                            document.getElementById('hourglass-start').style.display = 'inline';
                
                            animateHourglass(); // Repeat the animation
                        }, 500); // Show hourglass-end for 1 second
                    }, 500); // Show hourglass-half for 1 second
                }, 500); // Show hourglass-start for 1 second
            }

            animateHourglass(); // Start the animation
        </script>

        <!-- SCHEDULE MEETING  -->
        <script>
            function scheduleMeeting() {
                var scheduleDiv = document.getElementById("ScheduleDatetime");
                var schedule = document.getElementById("Schedule");
                var meetRadio = document.querySelector('input[name="Consultation"]:checked');

                document.getElementById("Schedule").setAttribute("required", "false");
                var form = document.getElementById('lead-form');
                // FIELDS
                var name = document.getElementById("Name");
                var contact = document.getElementById("mobile");
                var email = document.getElementById("Email");

                if (meetRadio && meetRadio.value === "Register for later") {
                    scheduleDiv.style.display = "block";
                    // schedule.min = new Date().toISOString().split('Z')[0];
                    
                    var now = new Date();
                    var minDateTime = new Date(now.getTime() + 60 * 60 * 1000); // Add 1 hour
                    var maxDateTime = new Date(now.getTime() + 14 * 24 * 60 * 60 * 1000); // Add 2 weeks

                    // Format the minimum and maximum date and time as required by the input element
                    var minDateTimeFormatted = minDateTime.toISOString().slice(0, 16);
                    var maxDateTimeFormatted = maxDateTime.toISOString().slice(0, 16);

                    // Set the min and max attributes of the input element
                    schedule.min = minDateTimeFormatted;
                    schedule.max = maxDateTimeFormatted;
                    document.getElementById("Schedule").setAttribute("required", "true");

                } 
                else if (meetRadio && meetRadio.value === "Live Video Call Meeting") {
                    if (name.value !== "" && contact.value !== "" && email.value !== "") {
                        form.submit();
                    }
                    else {
                        var message = document.getElementById("Message");
                        message.style.display = "block";
                        setTimeout(function(){
                            message.style.display = "none";
                        }, 5000);
                    }
                }
                else if (meetRadio && meetRadio.value === "WhatsApp Consultation") {
                    if (name.value !== "" && contact.value !== "" && email.value !== "") {
                        // form.submit();
                    }
                    else {
                        var message = document.getElementById("Message");
                        message.style.display = "block";
                        setTimeout(function(){
                            message.style.display = "none";
                        }, 5000);
                    }
                }
                else {
                    scheduleDiv.style.display = "none";
                    document.getElementById("Schedule").setAttribute("required", "false");
                }
            }
        </script>
        <?php
    }
    ?>

</body>

</html>