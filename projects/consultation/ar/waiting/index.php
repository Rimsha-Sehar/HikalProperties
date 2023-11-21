<?php
session_start();
error_reporting(0);

include('../../../dbconfig/dbhybrid.php');

include('../../../data/agents-ar.php');

$ip = $_SERVER['REMOTE_ADDR'];
$device = $_SERVER['HTTP_USER_AGENT'];

$lead_name = $_SESSION['lead_name'];
$lead_contact = $_SESSION['lead_contact'];
$lead_email = $_SESSION['lead_email'];
$lead_ip = $_SESSION['lead_ip'];
$note = $_SESSION['note'];
$start_time = $_SESSION['start_time'];

$trigger = $_SESSION['triggerAction'];

if (isset($start_time) && (time() - $start_time > 7200)) { 
    // 3600 = 1 HOUR
    session_unset();
    session_destroy();
}
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
    
    <!--OWL CAROUSEL-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js" integrity="sha512-bPs7Ae6pVvhOSiIcyUClR7/q2OAsRiovw4vAkX+zJbw3ShAeeqezq50RIIcIURq7Oa20rW2n2q+fyXBNcU9lrw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" integrity="sha512-tS3S5qG0BlhnQROyJXvNjeEM4UpMXHrQfTGmbQ1gKmelCxlSEBUaxhRBj/EFTzpbP4RVSrpEikbmdJobCvhE3g==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- ICON -->
    <link rel="icon" type="image/png" href="https://hikalproperties.com/projects/assets/images/logo/hikalagency-icon.png" />

    <!-- STYLES -->
    <link rel="stylesheet" href="https://hikalproperties.com/projects/assets/css/dark-theme-gold.css" />
    <link rel="stylesheet" href="https://hikalproperties.com/projects/assets/css/animation.css" />
</head>

<body class="arabic" dir="rtl" style="background: #0E0E0E;">
    <?php
    $checkip = mysqli_query($con, "SELECT byIP FROM is_blocked WHERE status = 1 AND byIP = '$ip'");
    $fetchip = mysqli_fetch_array($checkip);
    if (mysqli_num_rows($checkip) > 0) {
        ?>
        <div class="d-flex justify-content-center align-items-center text-center p-5" style="width: 100%; min-height: 100vh;">
            <h1 class="text-center" style="font-size: 2.2rem; line-height: 4.4rem;">
                لقد اكتشفنا نشاطاً مشبوهاً من جهازك! الرجاء التواصل على 
                <a href="tel:+97142722249" class="gold-grad" style="font-weight: bold;">+97142722249</a>
                للمزيد من المساعدة!
            </h1>
        </div>
        <?php
    }
    else {
        $lquery = mysqli_query($con, "SELECT leadName, leadContact, leadEmail, ip FROM leads WHERE coldcall = 6 AND leadName = '$lead_name' AND leadContact = '$lead_contact' AND leadEmail = '$lead_email' AND ip = '$lead_ip' ORDER BY creationDate DESC LIMIT 1");
        $lfetch = mysqli_fetch_array($lquery);
        if (mysqli_num_rows($lquery) < 1) {
            ?>
            <div class="d-flex justify-content-center align-items-center text-center p-5" style="width: 100%; min-height: 100vh;">
                <h1 class="text-center" style="font-size: 2.2rem; line-height: 4.4rem;">
                    يرجى التسجيل قبل الانضمام إلى الاجتماع الحي لتجربة سلسة. يرجى التواصل على 
                    <a href="tel:+97142722249" class="gold-grad" style="font-weight: bold;">+97142722249</a>
                    للمزيد من المساعدة!
                </h1>
            </div>
            <?php
        }
        else {
            ?>
            <!-- TOP SCROLL -->
            <button onclick="topFunction()" id="myBtn" title="Go to top" style="background: transparent;"><i class="fa fa-arrow-up gold-grad"></i></button>
            
            <!--HEADINGS & FORM-->
            <div class="first_section" style="min-height: 80vh; background-image: url('https://hikalproperties.com/projects/assets/images/static/sliverBgDark.png'); background-size: contain; background-repeat: no-repeat; background-position: center center;">
                <div class="container container-fluid pb-5">
                    <div class="row py-2 d-flex align-items-center">
                        <div class="col-6 d-flex justify-content-start align-items-center">
                            <img class="desktop" src="https://hikalproperties.com/projects/assets/images/logo/fullLogoREWhite.png" width="100" />
                            <p class="desktop my-0 py-1 mx-1" style="font-weight: 400;">مشاورة العقارات</p>
                        </div>
                        <div class="col-12 col-sm-12 col-md-6 col-lg-6 d-flex justify-content-end p-1">
                            <button class="" style="width: auto; border-radius: 50px; border: none; font-weight: bold;;">
                                <span id="hourglass-start"><i class="fa-solid fa-hourglass-start mx-1"></i></span>
                                <span id="hourglass-half" style="display: none;"><i class="fa-regular fa-hourglass-half mx-1"></i></span>
                                <span id="hourglass-end" style="display: none;"><i class="fa-solid fa-hourglass-end mx-1"></i></span>
                                <span class="mx-1 text-uppercase" id="waiting-list">7 في الإنتظار</span>
                            </button>
                        </div>
                    </div>
                    <?php 
                    if (isset($_SESSION['otp']) && $_SESSION['otp'] == true) {
                        ?>
                        <!-- OTP FORM  -->
                        <div id="otp-div" class="align-items-center justify-content-center" style="width: 100%; display: flex;">
                            <div class="containerform">
                                <div class="inputs" style="font-weight: 400;">
                                    <div class="contact-form" dir="ltr">
                                        <form id="otp-form" onsubmit="verifyOTP();">
                                            <h5 class="gold-grad" style="text-align: center;">
                                                OTP has been sent to <?php echo $lead_contact; ?>
                                            </h5>
                                            <input type="text" name="otp" id="otp" maxlength="6" pattern="\d*" inputmode="numeric" oninput="this.value = this.value.replace(/[^0-9]/g, '');">

                                            <button type="submit" style="font-weight: bold;">
                                                VERIFY OTP
                                            </button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div id="otp-verified" class="text-center" style="width: 100%; display: none;">
                            <h5 class="gold-grad" style="text-align: center;">
                                OTP verified successfully!
                            </h5>
                        </div>
                        <div id="otp-failed" class="text-center" style="width: 100%; display: none;">
                            <h5 class="gold-grad" style="text-align: center;">
                                Failed to verify the OTP!
                            </h5>
                        </div>
                        <?php
                    }
                    ?>
                    <div id="loading-div" class="text-center">
                        <!-- AUDIO -->
                        <audio id="loading-audio" autoplay loop>
                            <source src="../../../assets/audio/waiting-arabic.mp3" type="audio/mp3">
                        </audio>
                        <button id="volume" style="position: fixed; bottom: 15px; right: 15px; border-radius: 50%; z-index: 100; width: 50px; height: 50px;" onclick="toggleMute()">
                            <i id="volume-icon" class="fa-solid fa-volume-high" style="font-size: 16px;"></i>
                        </button>  

                        <div class="row">
                            <div class="d-flex align-items-end justify-content-center py-5" style="width: 100%; min-height: 30vh;" dir="ltr">
                                <?php include_once('../../../components/loading-animation.php'); ?>
                            </div>
                        </div>
                        <div class="row">
                            <div class="d-flex align-items-center justify-content-center" style="width: 100%; min-height: 20vh;">
                                <h5 class="py-5 text-center">
                                    <br>
                                    يرجى الانتظار بينما نتحقق من وجود مستشار محترف لك..
                                    <br>

                                </h5>
                            </div>
                        </div>
                    </div>
                    <div id="available-div" style="display: none;">
                        <div class="d-flex align-items-end justify-content-center py-5" style="width: 100%; min-height: 50vh">
                            <h5 class="text-center py-5">
                                نأسف لإبلاغكم أنه حاليًا لا تتوفر أي استشاريين. يرجى أن تكون على يقين أننا سنتابع معكم بسرعة. شكرًا لتفهمكم وصبركم.
                            </h5>
                        </div>
                    </div>

                    <style>
                        #team-slider .item {
                            text-align: center;
                            padding: 5px;
                            opacity: .9;
                            -webkit-transform: scale3d(0.8, 0.8, 1);
                            transform: scale3d(0.8, 0.8, 1);
                            -webkit-transition: all 0.3s ease-in-out;
                            -moz-transition: all 0.3s ease-in-out;
                            transition: all 0.3s ease-in-out;
                        }
            
                        #team-slider .owl-item.active.center .item {
                            opacity: 1;
                            -webkit-transform: scale3d(1.0, 1.0, 1);
                            transform: scale3d(1.0, 1.0, 1);
                        }
                        
                        #team-slider .owl-item.active.center .item .shadow-effect {
                            border-top: 0.11em solid #fadc88;
                            border-left: 0.11em solid #9c7625;
                            border-right: 0.11em solid #9c7625;
                            border-bottom: 0.11em solid #9c7625;
                        }
                        
                        .owl-dots {
                            display: none;
                        }
                        
                        .shadow-effect {
                            background: #000000;
                            padding: 5px;
                            padding-bottom: 5px;
                            border-radius: 5px;
                            text-align: center;
                            border: 1px solid #ECECEC;
                            box-shadow: 0 19px 38px rgba(255,255,255,0.10), 0 15px 12px rgba(255,255,255,0.02);
                        }
                    </style>
                    <div class="row py-4">
                        <div id="team-slider" class="owl-carousel">
                            <?php foreach ($agents as $index => $agents) : ?>
                                <div class="item text-shadow">
                                    <div class="shadow-effect">
                                        <?php
                                        if ($agents['picture'] === null || $agents['picture'] === "null") {
                                            ?>
                                            <img src="https://hikalproperties.com/projects/assets/images/logo/hikalagency-icon.png" loading="eager" alt="HIKAL PROPERTIES" style="border-radius: 7px;"  />
                                            <?php
                                        }
                                        else {
                                            ?>
                                            <img src="<?php echo $agents['picture']; ?>" loading="eager" alt="HIKAL PROPERTIES" style="border-radius: 7px;"  />
                                            <?php
                                        }
                                        ?>
                                        <h6 class="gold-grad mt-3 mb-0 p-0 text-uppercase" style="font-size: 0.7rem; line-height: 1rem;"><?php echo $agents['userName']; ?></h6>
                                        <!--<h6 class="m-0 p-0">RERA</h6>-->
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    </div>
                </div>
            </div>
            
            <footer>
                <?php include_once("../../../components/footer-copyright.php"); ?>
            </footer>
            
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
                        loop: true,
                        rtl: true,
        	            center: true,
        	            items: 3,
        	            margin: 0,
        	            autoplay: true,
        	            dots:true,
        	            autoplayTimeout: 1500,
        	            smartSpeed: 400,
        	            responsive: {
        	                0: {
        	                    items: 3
        	                },
        	                768: {
        	                    items: 3
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
                
                    document.getElementById('waiting-list').textContent = `${newCount} في الإنتظار`;
                
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
            
            <!--STOP LOADING-->
            <script>
                // Show the div for 5 minutes
                setTimeout(function() {
                    document.querySelector('.load').style.display = 'none';
                    document.querySelector('.no-load').style.display = 'block';
                }, 7200000); // 60000 milliseconds = 1 minute
            </script>
            
            <!--CHECKING SESSION TIME-->
            <script>
                var currentTime = Math.floor(Date.now() / 1000);
                
                var startTime = <?php echo $start_time; ?>;
                
                var timeDifference = currentTime - startTime;

                // If less than 5 minutes, keep showing loading div
                if (timeDifference <= 7200) { // 60 seconds = 1 minute | 7200 seconds = 2 hours
                    setTimeout(function() {
                        document.getElementById('loading-div').style.display = 'none';
                        document.getElementById('available-div').style.display = 'block';
                        console.log("loading-div");
                    }, (7200 - timeDifference) * 1000); // Convert seconds to milliseconds
                } else {
                    // If more than 5 minutes, show not available immediately
                    document.getElementById('loading-div').style.display = 'none';
                    document.getElementById('available-div').style.display = 'block';
                    console.log("available-div");
                }
            </script>
            
            <!--CHECK MEET_LINK-->
            <script>
                function checkAvailability() {
                    setInterval(function() {
                        // Check if the loading-div is currently displayed
                        var loadingDiv = document.getElementById('loading-div');
                        if (window.getComputedStyle(loadingDiv).display === 'block') {
                            // Make an AJAX request to check meet_link
                            var xhttp = new XMLHttpRequest();
                            xhttp.onreadystatechange = function() {
                                if (this.readyState == 4 && this.status == 200) {
                                    if (this.responseText === 'not_available') {
                                        // DO NOTHING
                                        console.log("NOT AVAILABLE");
                                    }
                                    else {
                                        // REFER TO MEET LINK
                                        window.location.href = this.responseText;
                                    }
                                }
                            };
                            xhttp.open("GET", "../../../controllers/check-meet-link.php", true);
                            xhttp.send();
                        }
                    }, 10000);
                }
                checkAvailability();
            </script>

            <!-- VERIFY OTP  -->
            <script>
                // var verified = document.getElementById("otp-verified");
                // var failed = document.getElementById("otp-failed");
                // verified.style.display = "none";
                // failed.style.display = "none";

                // function verifyOTP() {
                //     var formData = $("#otp-form").serialize();
                //     formData += "&phone_number=" + <?php echo $lead_contact; ?>;
                //     console.log(formData);

                //     $.ajax({
                //         url: "../../../controllers/verify-otp-live.php",
                //         method: "GET",
                //         data: formData,
                //         dataType: "json",
                //         success: function(response) {
                //             if (response.otp) {
                //                 $("#otp-div").hide();
                //                 verified.style.display = "block";
                //                 failed.style.display = "none";
                //                 setTimeout(function(){
                //                     verified.style.display = "none";
                //                 }, 5000);
                //                 <?php $_SESSION['otp'] = false; ?>
                //             }
                //             else {
                //                 $("#otp-div").hide();
                //                 failed.style.display = "block";
                //                 verified.style.display = "none";
                //                 setTimeout(function(){
                //                     failed.style.display = "none";
                //                 }, 5000);
                //                 <?php $_SESSION['otp'] = false; ?>
                //             }
                //         },
                //         error: function(jqXHR, textStatus, errorThrown) {
                //             $("#otp-div").hide();
                //             failed.style.display = "block";
                //             verified.style.display = "none";
                //             setTimeout(function(){
                //                 failed.style.display = "none";
                //             }, 5000);
                //             <?php $_SESSION['otp'] = false; ?>
                //         }
                //     });
                //     return false;
                // }
            </script>

            <!-- AUDIO  -->
            <script>
                var audioDiv = document.getElementById("loading-audio");
                const audio = new Audio('../../../assets/audio/waiting-arabic.mp3');
                var volume = document.getElementById("volume-icon");

                function toggleMute() {
                    if (audioDiv.muted) {
                        audioDiv.muted = false;
                        volume.className = "fa-solid fa-volume-high";
                    }
                    else {
                        audioDiv.muted = true;
                        volume.className = "fa-solid fa-volume-xmark";
                    }
                }
                // const triggerAction = <?php echo $trigger; ?>;
                // if (triggerAction == true) {
                //     audio.play();
                // }

                window.onload = function() {
                    audio.play();
                    audioDiv.muted = false;
                }
            </script>
            <?php
        }
    }
    ?>

</body>

</html>