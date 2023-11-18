<?php
session_start();
error_reporting(0);

include('../dbconfig/dbhybrid.php');

$ip = $_SERVER['REMOTE_ADDR'];
$device = $_SERVER['HTTP_USER_AGENT'];

$lead_name = $_SESSION['lead_name'];
$lead_contact = $_SESSION['lead_contact'];
$lead_email = $_SESSION['lead_email'];
$language = $_SESSION['language'];
$lead_ip = $_SESSION['lead_ip'];
$note = $_SESSION['note'];
$start_time = $_SESSION['start_time'];

if (isset($start_time) && (time() - $start_time > 3600)) {
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

    <style>
        .otp {
            width: 50%;
        }

        @media screen and (max-width: 800px) {
            width: 90%;
        }
    </style>
</head>

<body class="english" style="background: #0E0E0E;">
    <?php
    $checkip = mysqli_query($con, "SELECT byIP FROM is_blocked WHERE status = 1 AND byIP = '$ip'");
    $fetchip = mysqli_fetch_array($checkip);
    if (mysqli_num_rows($checkip) > 0) {
        ?>
        <div class="d-flex justify-content-center align-items-center text-center p-5" style="width: 100%; min-height: 100vh;">
            <h1 class="text-center" style="font-size: 2.2rem; line-height: 4.4rem;">
                We've detected some suspicious activity from your device! Please contact 
                <a href="tel:+97142722249" class="gold-grad" style="font-weight: bold;">+97142722249</a>
                for further assistance!
            </h1>
        </div>
        <?php
    }
    else {
        if (isset($_SESSION['requireOTP']) && $_SESSION['requireOTP'] == true) {
            ?>
            <div class="d-flex justify-content-center align-items-center text-center p-5" style="width: 100%; min-height: 100vh;">
                <!-- OTP FORM  -->
                <div id="otp-div" class="otp align-items-center justify-content-center" style="display: flex;">
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
            </div>
            <?php
        }
        else {
            ?>
            <div class="d-flex justify-content-center align-items-center text-center p-5" style="width: 100%; min-height: 100vh;">
                <h1 class="text-center" style="font-size: 2.2rem; line-height: 4.4rem;">
                    We've detected some suspicious activity from your device! Please contact 
                    <a href="tel:+97142722249" class="gold-grad" style="font-weight: bold;">+97142722249</a>
                    for further assistance!
                </h1>
            </div>
            <?php
        }
        ?>
            
        <footer>
            <?php include_once("../components/footer-copyright.php"); ?>
        </footer>

        <!-- VERIFY OTP  -->
        <script>
            var lang = "<?php echo $language; ?>";

            function verifyOTP() {
                var formData = $("#otp-form").serialize();
                formData += "&phone_number=" + <?php echo $lead_contact; ?>;
                console.log(formData);

                $.ajax({
                    url: "../controllers/verify-otp-live.php",
                    method: "GET",
                    data: formData,
                    dataType: "json",
                    success: function(response) {
                        if (response.otp) {
                            console.log("SUCCESS:", response);
                            if (lang == "English") {
                                window.location.href = 'https://hikalproperties.com/projects/thankyou/en';
                            }
                            else if (lang == "Arabic") {
                                window.location.href = 'https://hikalproperties.com/projects/thankyou/ar';
                            }
                            else {
                                window.location.href = 'https://hikalproperties.com/projects/thankyou';
                            }
                        }
                        else {
                            console.log("OTP SENT:", response);
                            if (lang == "English") {
                                window.location.href = 'https://hikalproperties.com/projects/thankyou/en';
                            }
                            else if (lang == "Arabic") {
                                window.location.href = 'https://hikalproperties.com/projects/thankyou/ar';
                            }
                            else {
                                window.location.href = 'https://hikalproperties.com/projects/thankyou';
                            }
                        }
                    },
                    error: function(jqXHR, textStatus, errorThrown) {
                        console.log("ERROR:", response);
                        if (lang == "English") {
                                window.location.href = 'https://hikalproperties.com/projects/thankyou/en';
                            }
                            else if (lang == "Arabic") {
                                window.location.href = 'https://hikalproperties.com/projects/thankyou/ar';
                            }
                            else {
                                window.location.href = 'https://hikalproperties.com/projects/thankyou';
                            }
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