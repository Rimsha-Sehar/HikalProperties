<?php
session_start();
error_reporting(0);
include('../../dbconfig/dbhybrid.php');

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
// date_default_timezone_set('Asia/Dubai');
// $cur_time = time();

// $hashed_ip = hash('sha256', $ip);

// $url = 'https://staging.hikalcrm.com/api/validate-snap';

// $data = array(
//     "pixel_id" => "4992376c-fb59-4050-8c91-bdb468b086d4",
//     "event_type" => "PAGE_VIEW",
//     "timestamp" => (string) $cur_time,
//     "client_dedup_id" => (string) round((time() * 1000) * (rand() / getrandmax())),
//     "event_conversion_type" => "WEB",
//     "event_tag" => "Hikal Properties",
//     "page_url" => (string) $fullUrl,
//     "user_agent" => (string) $device,
//     "hashed_ip_address" => (string) $hashed_ip,
//     "item_category" => "Empire",
// );

// $token = "eyJhbGciOiJIUzI1NiIsImtpZCI6IkNhbnZhc1MyU0hNQUNQcm9kIiwidHlwIjoiSldUIn0.eyJhdWQiOiJjYW52YXMtY2FudmFzYXBpIiwiaXNzIjoiY2FudmFzLXMyc3Rva2VuIiwibmJmIjoxNjk4MTYxMzEwLCJzdWIiOiJkNzUxOGRkOS02YWM0LTQ0YjUtYmY5Ni0xY2JmNWUwZDBmOTR-UFJPRFVDVElPTn5lZjAwYzBiYS03NmQ5LTQwYmUtYmYxNi05NjExZGY5YzM5OWIifQ.bA8_O0hp4eIrg83dCkrKaNm8CZjmPK-E1KzFLmJUBbY";

// $ch = curl_init($url);

// curl_setopt($ch, CURLOPT_POST, true);
// curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
// curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
// curl_setopt(
//     $ch,
//     CURLOPT_HTTPHEADER,
//     array(
//         'Content-Type: application/json',
//         'Authorization: Bearer ' . $token
//     )
// );

// $response = curl_exec($ch);

// if (curl_errno($ch)) {
//     // echo 'Error: ' . curl_error($ch);
// }

// curl_close($ch);
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
    <link rel="stylesheet" href="https://hikalproperties.com/projects/assets/css/dark-theme-gold.css" />
    <link rel="stylesheet" href="https://hikalproperties.com/projects/assets/css/animation.css" />

    <!-- PIXEL -->
    <script src="https://hikalproperties.com/projects/gtm/pixel.js"></script>
</head>

<body class="arabic" dir="rtl">

    <?php include_once("../../gtm/pixel.php"); ?>

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
            <?php include_once("../../components/loading-circle.php"); ?>
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



        <style>
            /* Override UGG site */
            #main {
                width: 100%;
                padding: 0;
            }

            .content-asset p {
                margin: 0 auto;
            }

            .breadcrumb {
                display: none;
            }

            /* Helpers */
            /**************************/
            .margin-top-10 {
                padding-top: 10px;
            }

            .margin-bot-10 {
                padding-bottom: 10px;
            }

            /* Typography */
            /**************************/
            /* #parallax-world-of-ugg h1 {
                font-size: 24px;
                font-weight: 400;
                text-transform: uppercase;
                color: black;
                padding: 0;
                margin: 0;
            } */

            /* #parallax-world-of-ugg h2 {
                font-size: 70px;
                letter-spacing: 10px;
                text-align: center;
                color: white;
                font-weight: 400;
                text-transform: uppercase;
                z-index: 10;
                opacity: .9;
            } */

            /* #parallax-world-of-ugg h3 {
                font-size: 14px;
                line-height: 0;
                font-weight: 400;
                letter-spacing: 8px;
                text-transform: uppercase;
                color: black;
            } */

            /* #parallax-world-of-ugg p {
                font-weight: 400;
                font-size: 14px;
                line-height: 24px;
            }

            .first-character {
                font-weight: 400;
                float: left;
                font-size: 84px;
                line-height: 64px;
                padding-top: 4px;
                padding-right: 8px;
                padding-left: 3px;
            } */

            .sc {
                color: #3b8595;
            }

            .ny {
                color: #3d3c3a;
            }

            .atw {
                color: #c48660;
            }

            /* Section - Title */
            /**************************/
            #parallax-world-of-ugg .title {
                background: transparent;
                padding: 5%;
                margin: 0 auto;
                text-align: center;
            }

            /* #parallax-world-of-ugg .title h1 {
                font-size: 35px;
                letter-spacing: 8px;
            } */

            /* Section - Block */
            /**************************/
            #parallax-world-of-ugg .block {
                background: white;
                padding: 60px;
                width: 820px;
                margin: 0 auto;
                text-align: justify;
            }

            #parallax-world-of-ugg .block-gray {
                background: #f2f2f2;
                padding: 60px;
            }

            #parallax-world-of-ugg .section-overlay-mask {
                position: absolute;
                top: 0;
                left: 0;
                width: 100%;
                height: 100%;
                background-color: black;
                opacity: 0.70;
            }

            /* Section - Parallax */
            /**************************/
            #parallax-world-of-ugg .parallax-one {
                padding-top: 200px;
                padding-bottom: 200px;
                overflow: hidden;
                position: relative;
                width: 100%;
                background-image: url(https://hikalproperties.com/projects/assets/images/projects/empire/ee-main.jpg);
                background-attachment: fixed;
                background-size: cover;
                -moz-background-size: cover;
                -webkit-background-size: cover;
                background-repeat: no-repeat;
                background-position: top center;
            }

            #parallax-world-of-ugg .parallax-two {
                padding-top: 200px;
                padding-bottom: 200px;
                overflow: hidden;
                position: relative;
                width: 100%;
                background-image: url(https://images.unsplash.com/photo-1432163230927-a32e4fd5a326?dpr=1&auto=format&fit=crop&w=1500&h=1000&q=80&cs=tinysrgb&crop=);
                background-attachment: fixed;
                background-size: cover;
                -moz-background-size: cover;
                -webkit-background-size: cover;
                background-repeat: no-repeat;
                background-position: center center;
            }

            #parallax-world-of-ugg .parallax-three {
                padding-top: 200px;
                padding-bottom: 200px;
                overflow: hidden;
                position: relative;
                width: 100%;
                background-image: url(https://images.unsplash.com/photo-1440688807730-73e4e2169fb8?dpr=1&auto=format&fit=crop&w=1500&h=1001&q=80&cs=tinysrgb&crop=);
                background-attachment: fixed;
                background-size: cover;
                -moz-background-size: cover;
                -webkit-background-size: cover;
                background-repeat: no-repeat;
                background-position: center center;
            }

            /* Extras */
            /**************************/
            #parallax-world-of-ugg .line-break {
                border-bottom: 1px solid black;
                width: 150px;
                margin: 0 auto;
            }

            /* Media Queries */
            /**************************/
            @media screen and (max-width: 959px) and (min-width: 768px) {
                #parallax-world-of-ugg .block {
                    padding: 40px;
                    width: 620px;
                }
            }

            @media screen and (max-width: 767px) {
                #parallax-world-of-ugg .block {
                    padding: 30px;
                    width: 420px;
                }

                #parallax-world-of-ugg h2 {
                    font-size: 30px;
                }

                #parallax-world-of-ugg .block {
                    padding: 30px;
                }

                #parallax-world-of-ugg .parallax-one,
                #parallax-world-of-ugg .parallax-two,
                #parallax-world-of-ugg .parallax-three {
                    padding-top: 100px;
                    padding-bottom: 100px;
                }
            }

            @media screen and (max-width: 479px) {
                #parallax-world-of-ugg .block {
                    padding: 30px 15px;
                    width: 290px;
                }
            }
        </style>

        <div id="parallax-world-of-ugg">

            <section>
                <!-- HEADER  -->
                <div class="language_header" style="border-bottom: 1px solid #9c7625;">
                    <div class="container container-fluid py-2 d-flex justify-content-between align-items-center">
                        <div class="d-flex align-items-center">
                            <a href="https://hikalproperties.com/projects/empire/en?<?php echo $_SESSION["params"]; ?>">
                                <div class="px-2 white d-flex align-items-center">
                                    <img class="lang-flag mx-1"
                                        src="https://hikalproperties.com/projects/assets/images/flags/en.jpg" />
                                    EN
                                </div>
                            </a>
                            <div class="px-2 gold-grad d-flex align-items-center">
                                <img class="lang-flag mx-1"
                                    src="https://hikalproperties.com/projects/assets/images/flags/ar.png" />
                                AR
                            </div>
                        </div>
                    </div>
                </div>
                <div class="title">
                    <div class="row text-center d-flex align-items-center py-2">
                        <div class="col-12">
                            <h1 class="my-2" style="text-align: center; line-height: 2rem; font-weight: 800;">
                                <span class="gold-grad-anim">تملك بأقساط </span>
                                <span class="num-glow">1%</span>
                                <span class="gold-grad-anim"> شهريا لمدة </span>
                                <span class="num-glow">80</span>
                                <span class="gold-grad-anim">شهر</span>
                            </h1>
                            <h3 class="text-expand mt-2" style="text-align: center; line-height: 1.5rem; font-size: 1rem; ">
                                وفرصتك قبل الطرح
                            </h3>
                            <h3 class="mt-2"
                                style="text-align: center; line-height: 1.5rem; font-weight: 500; font-size: 1rem; ">
                                أحصل علي آلمطبخ مجهّز بالكامل
                            </h3>
                        </div>
                    </div>
            </section>

            <section>
                <div class="parallax-one">
                    <h2>SOUTHERN CALIFORNIA</h2>
                </div>
            </section>

            <section>
                <div class="block">
                    <p><span class="first-character sc">I</span>n 1978, Brian Smith landed in Southern California with a bag
                        of sheepskin boots and hope. He fell in love with the sheepskin experience and was convinced the
                        world would one day share this love. The beaches of Southern California had long been an epicenter
                        of a relaxed, casual lifestyle, a lifestyle that Brian felt was a perfect fit for his brand. So he
                        founded the UGG brand, began selling his sheepskin boots and they were an immediate sensation. By
                        the mid 1980's, the UGG brand became a symbol of relaxed southern California culture, gaining
                        momentum through surf shops and other shops up and down the coast of California, from San Diego to
                        Santa Cruz. UGG boots reached beyond the beach, popping up in big cities and small towns all over,
                        and in every level of society. Girls wore their surfer boyfriend's pair of UGG boots like a
                        letterman jacket. When winter came along, UGG boots were in ski shops and were seen in lodges from
                        Mammoth to Aspen.</p>
                    <p class="line-break margin-top-10"></p>
                    <p class="margin-top-10">The UGG brand began to symbolize those who embraced sport and a relaxed, active
                        lifestyle. More than that, an emotional connection and a true feeling of love began to grow for UGG
                        boots, just as Brian had envisioned. People didn't just like wearing UGG boots, they fell in love
                        with them and literally could not take them off. By the end of the 90's, celebrities and those in
                        the fashion world took notice of the UGG brand. A cultural shift occurred as well - people were
                        embracing, and feeling empowered, by living a more casual lifestyle and UGG became one of the
                        symbols of this lifestyle. By 2000, a love that began on the beaches had become an icon of casual
                        style. It was at this time that the love for UGG grew in the east, over the Rockies and in Chicago.
                        In 2000, UGG Sheepskin boots were first featured on Oprah's Favorite Things® and Oprah emphatically
                        declared that she "LOOOOOVES her UGG boots." From that point on, the world began to notice.</p>
                </div>
            </section>

            <section>
                <div class="parallax-two">
                    <h2>NEW YORK</h2>
                </div>
            </section>

            <section>
                <div class="block">
                    <p><span class="first-character ny">B</span>reaking into the New York fashion world is no easy task. But
                        by the early 2000's, UGG Australia began to take it by storm. The evolution of UGG from a brand that
                        made sheepskin boots, slippers, clogs and sandals for an active, outdoor lifestyle to a brand that
                        was now being touted as a symbol of a stylish, casual and luxurious lifestyle was swift. Much of
                        this was due to a brand repositioning effort that transformed UGG into a high-end luxury footwear
                        maker. As a fashion brand, UGG advertisements now graced the pages of Vogue Magazine as well as
                        other fashion books. In the mid 2000's, the desire for premium casual fashion was popping up all
                        over the world and UGG was now perfectly aligned with this movement.</p>
                    <p class="line-break margin-top-10"></p>
                    <p class="margin-top-10">Fueled by celebrities from coast to coast wearing UGG boots and slippers on
                        their downtime, an entirely new era of fashion was carved out. As a result, the desire and love for
                        UGG increased as people wanted to go deeper into this relaxed UGG experience. UGG began offering
                        numerous color and style variations on their sheepskin boots and slippers. Cold weather boots for
                        women and men and leather casuals were added with great success. What started as a niche item, UGG
                        sheepskin boots were now a must-have staple in everyone's wardrobe. More UGG collections followed,
                        showcasing everything from knit boots to sneakers to wedges, all the while maintaining that
                        luxurious feel UGG is known for all over the world. UGG products were now seen on runways and in
                        fashion shoots from coast to coast. Before long, the love spread even further.</p>
                </div>
            </section>

            <section>
                <div class="parallax-three">
                    <h2>ENCHANTED FOREST</h2>
                </div>
            </section>

            <section>
                <div class="block">
                    <p><span class="first-character atw">W</span>hen the New York fashion community notices your brand, the
                        world soon follows. The widespread love for UGG extended to Europe in the mid-2000's along with the
                        stylish casual movement and demand for premium casual fashion. UGG boots and shoes were now seen
                        walking the streets of London, Paris and Amsterdam with regularity. To meet the rising demand from
                        new fans, UGG opened flagship stores in the UK and an additional location in Moscow. As the love
                        spread farther East, concept stores were opened in Beijing, Shanghai and Tokyo. UGG Australia is now
                        an international brand that is loved by all. This love is a result of a magical combination of the
                        amazing functional benefits of sheepskin and the heightened emotional feeling you get when you slip
                        them on your feet. In short, you just feel better all over when you wear UGG boots, slippers, and
                        shoes.</p>
                    <p class="line-break margin-top-10"></p>
                    <p class="margin-top-10">In 2011, UGG will go back to its roots and focus on bringing the active men
                        that brought the brand to life back with new styles allowing them to love the brand again as well.
                        Partnering with Super Bowl champion and NFL MVP Tom Brady, UGG will invite even more men to feel the
                        love the rest of the world knows so well. UGG will also step into the world of high fashion with UGG
                        Collection. The UGG Collection fuses the timeless craft of Italian shoemaking with the reliable
                        magic of sheepskin, bringing the luxurious feel of UGG to high end fashion. As the love for UGG
                        continues to spread across the world, we have continued to offer new and unexpected ways to
                        experience the brand. The UGG journey continues on and the love for UGG continues to spread.</p>
                </div>
            </section>

        </div>



        <!--HEADINGS & FORM-->
        <div class="first_section"
            style="min-height: 100vh; background: url('https://hikalproperties.com/projects/assets/images/projects/empire/ee-main.jpg'); background-size: cover; background-repeat: no-repeat; background-position: center center; border-bottom: 1px solid #9c7625;">
            <div class="container container-fluid">
                <!-- RAMADAN -->
                <div class="row">
                    <div class="col-8">
                        <div class="row text-center d-flex align-items-center py-2">
                            <div class="col-12">
                                <h1 class="my-2" style="text-align: center; line-height: 2rem; font-weight: 800;">
                                    <span class="gold-grad-anim">تملك بأقساط </span>
                                    <span class="num-glow">1%</span>
                                    <span class="gold-grad-anim"> شهريا لمدة </span>
                                    <span class="num-glow">80</span>
                                    <span class="gold-grad-anim">شهر</span>
                                </h1>
                                <h3 class="text-expand mt-2"
                                    style="text-align: center; line-height: 1.5rem; font-size: 1rem; ">
                                    وفرصتك قبل الطرح
                                </h3>
                                <h3 class="mt-2"
                                    style="text-align: center; line-height: 1.5rem; font-weight: 500; font-size: 1rem; ">
                                    أحصل علي آلمطبخ مجهّز بالكامل
                                </h3>
                            </div>
                        </div>
                    </div>
                    <div class="col-4">
                        <!-- RAMADAN  -->
                        <?php include_once("../../components/ramadan-single.php"); ?>
                    </div>
                </div>
            </div>
        </div>

        <!-- RAMADAN  -->
        <?php include_once("../../components/ramadan-lights-anim.php"); ?>

        <!-- FORM -->
        <style>
            .form-section {
                width: 100%;
                display: flex;
                justify-content: end;
                z-index: 1;
                margin-top: -70vh;
            }

            .containerform {
                margin-left: 7%;
                margin-right: 7%;
                width: 360px;
            }

            @media screen and (max-width: 800px) {
                .form-section {
                    margin-top: -40vh;
                }
            }
        </style>

        <div class="form-section">
            <div class="containerform">
                <div class="inputs" style="font-weight: 400; overflow-y: scroll;">
                    <?php
                    $url = "https://" . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
                    $parsedUrl = parse_url($url);
                    $filename = ltrim($parsedUrl['path'], '/') . '?' . $parsedUrl['query'];
                    ?>
                    <!-- OTP FORM  -->
                    <div id="otp-form" class="contact-form" dir="ltr" style="display: none;">
                        <form method="POST" action="../../controllers/verify-otp.php">
                            <h5 class="gold-grad" style="text-align: center;">
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

                            <button type="submit" style="font-weight: bold;">
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
                        <div class="contact-form" dir="ltr">
                            <form id="lead-form" onsubmit="return submitLeadForm();">
                                <div style="display: none">
                                    <input type="text" id="Project" name="Project" value="Empire Estates (Private Pool)" />
                                    <input type="text" id="LeadType" name="LeadType" value="Apartment" />
                                    <input type="text" id="Language" name="Language" value="Arabic" />
                                    <input type="text" id="Country" name="Country" value="" /> <input type="text" id="Country"
                                        name="Country" value="" />
                                    <input type="text" id="Filename" name="Filename" value="<?php echo $filename; ?>" />
                                    <input type="text" id="LeadEmail1" name="LeadEmail1" value="" />
                                </div>

                                <!-- NAME -->
                                <label class="gold-grad" style="margin-top: 0px;">الاسم</label>
                                <input type="text" name="LeadName1" id="LeadName1" required />

                                <!-- CONTACT NUMBER -->
                                <label class="gold-grad">رقم الاتصال</label>
                                <input type="tel" name="phone[main]" id="mobile" style="color: #000000;"
                                    placeholder="56 789 0123" required />

                                <!--EMAIL-->
                                <!-- <label class="gold-grad">عنوان البريد الإلكتروني</label>
                                                    <input type="email" name="LeadEmail1" id="LeadEmail1" placeholder="example@gmail.com" /> -->

                                <!-- HOW MANY BEDROOMS -->
                                <label class="gold-grad">كم عدد غرف النوم؟</label>
                                <div style="display: flex;" dir="rtl">
                                    <input class="mx-2" type="radio" name="EnquiryRadio1" id="EnquiryRadio1" value="Studio"
                                        style="width: 20px;" required>
                                    <label for="EnquiryRadio1" style="margin-top: 0px; padding-left: 7px; color: #fff;">
                                        استوديو + حمام سباحة
                                    </label>
                                </div>
                                <div style="display: flex;" dir="rtl">
                                    <input class="mx-2" type="radio" name="EnquiryRadio1" id="EnquiryRadio2" value="1 Bedroom"
                                        style="width: 20px;" required>
                                    <label for="EnquiryRadio2" style="margin-top: 0px; padding-left: 7px; color: #fff;">
                                        غرفة نوم + حمام سباحة
                                    </label>
                                </div>
                                <div style="display: flex;" dir="rtl">
                                    <input class="mx-2" type="radio" name="EnquiryRadio1" id="EnquiryRadio3" value="2 Bedrooms"
                                        style="width: 20px;" required>
                                    <label for="EnquiryRadio3" style="margin-top: 0px; padding-left: 7px; color: #fff;">
                                        غرفتين نوم + حمام سباحة
                                    </label>
                                </div>
                                <div style="display: flex;" dir="rtl">
                                    <input class="mx-2" type="radio" name="EnquiryRadio1" id="EnquiryRadio4" value="3 Bedrooms"
                                        style="width: 20px;" required>
                                    <label for="EnquiryRadio4" style="margin-top: 0px; padding-left: 7px; color: #fff;">
                                        ثلاث غرف نوم + حمام سباحة
                                    </label>
                                </div>

                                <!-- PURPOSE  -->
                                <label class="gold-grad">غرض الاستفسار</label>
                                <div style="display: flex;" dir="rtl">
                                    <input class="mx-2" type="radio" name="LeadForRadio1" id="PurposeRadio1" value="Investment"
                                        style="width: 20px;" required>
                                    <label for="PurposeRadio1" style="margin-top: 0px; padding-left: 7px; color: #fff;">
                                        استثمار
                                    </label>
                                </div>
                                <div style="display: flex;" dir="rtl">
                                    <input class="mx-2" type="radio" name="LeadForRadio1" id="PurposeRadio2" value="End-user"
                                        style="width: 20px;" required>
                                    <label for="PurposeRadio2" style="margin-top: 0px; padding-left: 7px; color: #fff;">
                                        سكني
                                    </label>
                                </div>

                                <div id="FormButton" name="FormButton">
                                    <div class="form_button">
                                        <button type="submit" class="submit-click">إرسال</button>
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

        <!--LOCATION-->
        <div class="third_section mt-5">
            <div class="container container-fluid py-5">
                <div class="row" style="text-align: center;">
                    <h4 class="gold-grad-anim">
                        مميزات الموقع
                    </h4>
                </div>
                <div class="row" style="justify-content: center;">
                    <div class="col-6 col-sm-6 col-md-4 col-lg-3 col-xl-3 p-2">
                        <div style="display: block; text-align: center;">
                            <div style="font-size: 2.2rem; margin: 0px;"><b>
                                    05
                                </b></div>
                            <p style="display: flex; justify-content: center; color: #d4a556;">
                                دقائق
                            </p>
                            <p class="icons-txtpara text-center" style="display: flex; justify-content: center;">
                                حديقة دبي للزهور العجيبة
                            </p>
                            <br>
                        </div>
                    </div>
                    <div class="col-6 col-sm-6 col-md-4 col-lg-3 col-xl-3 p-2">
                        <div style="display: block; text-align: center;">
                            <div style="font-size: 2.2rem; margin: 0px;"><b>
                                    10
                                </b></div>
                            <p style="display: flex; justify-content: center; color: #d4a556;">
                                دقائق
                            </p>
                            <p class="icons-txtpara text-center" style="display: flex; justify-content: center;">
                                مول الإمارات
                            </p>
                            <br>
                        </div>
                    </div>
                    <div class="col-6 col-sm-6 col-md-4 col-lg-3 col-xl-3 p-2">
                        <div style="display: block; text-align: center;">
                            <div style="font-size: 2.2rem; margin: 0px;"><b>
                                    25
                                </b></div>
                            <p style="display: flex; justify-content: center; color: #d4a556;">
                                دقائق
                            </p>
                            <p class="icons-txtpara text-center" style="display: flex; justify-content: center;">
                                برج خليفة
                            </p>
                            <br>
                        </div>
                    </div>
                    <div class="col-6 col-sm-6 col-md-4 col-lg-3 col-xl-3 p-2">
                        <div style="display: block; text-align: center;">
                            <div style="font-size: 2.2rem; margin: 0px;"><b>
                                    25
                                </b></div>
                            <p style="display: flex; justify-content: center; color: #d4a556;">
                                دقائق
                            </p>
                            <p class="icons-txtpara text-center" style="display: flex; justify-content: center;">
                                مرسى دبي
                            </p>
                            <br>
                        </div>
                    </div>
                    <div class="col-6 col-sm-6 col-md-4 col-lg-3 col-xl-3 p-2">
                        <div style="display: block; text-align: center;">
                            <div style="font-size: 2.2rem; margin: 0px;"><b>
                                    25
                                </b></div>
                            <p style="display: flex; justify-content: center; color: #d4a556;">
                                دقائق
                            </p>
                            <p class="icons-txtpara text-center" style="display: flex; justify-content: center;">
                                مطار دبي الدولي
                            </p>
                            <br>
                        </div>
                    </div>
                    <div class="col-6 col-sm-6 col-md-4 col-lg-3 col-xl-3 p-2">
                        <div style="display: block; text-align: center;">
                            <div style="font-size: 2.2rem; margin: 0px;"><b>
                                    25
                                </b></div>
                            <p style="display: flex; justify-content: center; color: #d4a556;">
                                دقائق
                            </p>
                            <p class="icons-txtpara text-center" style="display: flex; justify-content: center;">
                                مطار آل مكتوم الدولي
                            </p>
                            <br>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!--IMAGE-->
        <div class="map_section" style="display: flex; align-items: center; justify-content: space-evenly;">
            <img loading="eager" class="desktop img-style"
                src="https://hikalproperties.com/projects/assets/images/projects/empire/ee-map.png" alt="HIKAL PROPERTIES"
                style="width: 60%" />
            <img loading="eager" class="mobile img-style"
                src="https://hikalproperties.com/projects/assets/images/projects/empire/ee-map.png" alt="HIKAL PROPERTIES"
                style="width: 100%" />
        </div>

        <footer style="background-color: #000000;">
            <?php include_once("../../components/footer-copyright.php"); ?>
        </footer>


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
