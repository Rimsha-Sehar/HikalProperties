<?php
session_start();
error_reporting(0);
include('../dbconfig/dbhybrid.php');

$ip = $_SERVER['REMOTE_ADDR'];
$device = $_SERVER['HTTP_USER_AGENT'];
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Hikal Real Estate Properties | Venice</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Hikal Real Estate | Hikal Properties | Azizi Developments | Azizi Venice">

    <!-- GOOGLE FONTS -->
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
    <link rel="icon" type="image/png" href="../assets/images/logo/hikalagency-icon.png" />
    <!-- https://hikalproperties.com/projects/ -->
    <!-- STYLES -->
    <link rel="stylesheet" href="../assets/css/dark-theme-gold.css" />
    <link rel="stylesheet" href="../assets/css/animation.css" />

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
    <!-- End Google Tag Manager -->
</head>

<body class="arabic" dir="rtl">
    <!-- Google Tag Manager (noscript) -->
    <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-K7J7SRR" height="0" width="0" style="display:none; visibility:hidden"></iframe></noscript>
    <!-- End Google Tag Manager (noscript) -->
    
    <?php
    $checkip = mysqli_query($con, "SELECT byIP FROM is_blocked WHERE status = 1 AND byIP = '$ip'");
    $fetchip = mysqli_fetch_array($checkip);
    if (mysqli_num_rows($checkip) > 0) {
        ?>
        <div class="d-flex justify-content-center align-items-center text-center p-5" style="width: 100%; min-height: 100vh;">
            <h1 class="text-center" style="font-size: 2.2rem; line-height: 4.4rem;">
                تم اكتشاف بعض الأنشطة المشبوهة من جهازك! الرجاء التواصل مع 
                <a href="tel:+97142722249" class="gold-grad" style="font-weight: bold;">+97142722249</a>
                للحصول على المساعدة الإضافية!
            </h1>
        </div>
        <?php
    }
    else {
        ?>
        <!-- TOP SCROLL -->
        <button onclick="topFunction()" id="myBtn" title="Go to top" style="background: transparent;"><i class="fa fa-arrow-up gold-grad"></i></button>
        
        <!--HEADINGS & FORM-->
        <div class="first_section">
            <div class="container container-fluid">
                <div class="row text-center d-flex align-items-center py-2">
                    <div class="col-12">
                        <h1 class="gold-grad-anim" style="text-align: center; line-height: 2rem; font-weight: 800;">فرصتك قبل الطرح أحصل علي كوبون فرش لشقتك مجانا</h1>
                        <h3 style="text-align: center; line-height: 1.5rem; font-weight: 500; font-size: 1rem; ">سجل بياناتك الحين للمزيد من التفاصيل</h3>
                    </div>
                </div>
            </div>
            <div class="row mobile">
                <img loading="eager" class="mobile img-style" src="../assets/images/projects/venice/v6.jpg" alt="HIKAL PROPERTIES" style="width: 100%" />
            </div>
            <div class="container container-fluid">
                <div class="row d-flex align-items-center">
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
                                        $query = mysqli_query($con, "SELECT ip, filename FROM leads ORDER BY creationDate DESC LIMIT 1");
                                        $fetch = mysqli_fetch_array($query);
                                        if ($ip == $fetch['ip'] && $filename == $fetch['filename']) {
                                            ?>
                                            <div class="p-5 d-flex justify-content-center align-items-center text-center" style="width: 100%; height: 100%; line-height: 2.5rem;">
                                                شكراً لتسجيلك معنا. سيقوم محترفونا بالتواصل معك قريباً!
                                            </div>
                                            <?php
                                        }
                                        else {
                                            ?>
                                            <!--NEW FORM-->
                                            <div class="contact-form" dir="ltr">
                                                <form id="lead-form" method="POST" action="add-lead-country-hybrid.php">
                                                    <div style="display: none">
                                                        <input type="text" id="Project" name="Project" value="Venice" />
                                                        <input type="text" id="LeadType" name="LeadType" value="Apartment" />
                                                        <input type="text" id="Language" name="Language" value="Arabic" />
                                                        <input type="text" id="LeadSource" name="LeadSource" value="Campaign Snapchat" />
                                                        <input type="text" id="Country" name="Country" value="" />
                                                        <input type="text" id="Filename" name="Filename" value="<?php echo $filename; ?>" />
                                                    </div>
                                                    
                                                    <!-- NAME -->
                                                    <label class="gold-grad" style="margin-top: 0px;">الاسم</label>
                                                    <input type="text" name="LeadName1" id="LeadName1" required />
                                            
                                                    <!-- CONTACT NUMBER -->
                                                    <label class="gold-grad">رقم الاتصال</label>
                                                    <input type="tel" name="phone[main]" id="mobile" style="color: #000000;" placeholder="56 789 0123" required />
                                                    
                                                    <!--EMAIL-->
                                                    <label class="gold-grad">عنوان البريد الإلكتروني</label>
                                                    <input type="email" name="LeadEmail1" id="LeadEmail1" placeholder="example@gmail.com" />
        
                                                    <!-- HOW MANY BEDROOMS -->
                                                    <label class="gold-grad">كم عدد غرف النوم؟</label>
                                                    <div style="display: flex;" dir="rtl">
                                                        <input class="mx-2" type="radio" name="EnquiryRadio1" id="EnquiryRadio1" value="Studio" style="width: 20px;" required>
                                                        <label for="EnquiryRadio1" style="margin-top: 0px; padding-left: 7px; color: #fff;">
                                                            استوديو
                                                        </label>
                                                    </div>
                                                    <div style="display: flex;" dir="rtl">
                                                        <input class="mx-2" type="radio" name="EnquiryRadio1" id="EnquiryRadio2" value="1 Bedroom" style="width: 20px;" required>
                                                        <label for="EnquiryRadio2" style="margin-top: 0px; padding-left: 7px; color: #fff;">
                                                            غرفة نوم واحدة
                                                        </label>
                                                    </div>
                                                    <div style="display: flex;" dir="rtl">
                                                        <input class="mx-2" type="radio" name="EnquiryRadio1" id="EnquiryRadio3" value="2 Bedrooms" style="width: 20px;" required>
                                                        <label for="EnquiryRadio3" style="margin-top: 0px; padding-left: 7px; color: #fff;">
                                                            غرفتين نوم
                                                        </label>
                                                    </div>
                                                    <div style="display: flex;" dir="rtl">
                                                        <input class="mx-2" type="radio" name="EnquiryRadio1" id="EnquiryRadio4" value="3 Bedrooms" style="width: 20px;" required>
                                                        <label for="EnquiryRadio4" style="margin-top: 0px; padding-left: 7px; color: #fff;">
                                                            ثلاث غرف نوم
                                                        </label>
                                                    </div>
                                            
                                                    <!-- PURPOSE  -->
                                                    <label class="gold-grad">غرض الاستفسار</label>
                                                    <div style="display: flex;" dir="rtl">
                                                        <input class="mx-2" type="radio" name="LeadForRadio1" id="PurposeRadio1" value="Investment" style="width: 20px;" required>
                                                        <label for="PurposeRadio1" style="margin-top: 0px; padding-left: 7px; color: #fff;">
                                                            استثمار
                                                        </label>
                                                    </div>
                                                    <div style="display: flex;" dir="rtl">
                                                        <input class="mx-2" type="radio" name="LeadForRadio1" id="PurposeRadio2" value="End-user" style="width: 20px;" required>
                                                        <label for="PurposeRadio2" style="margin-top: 0px; padding-left: 7px; color: #fff;">
                                                            سكني
                                                        </label>
                                                    </div>
                                            
                                                    <div id="FormButton" name="FormButton">
                                                        <div class="form_button">
                                                            <button type="submit" class="submit-click" onclick="dataLayer.push({'event': 'submit-click', 'var': 'submit-click'});">إرسال</button>
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
                        </div>
                    </div>
                
                    <div class="col-12 col-sm-12 col-md-6 col-lg-7 col-xl-8 ps-5 py-1">
                        <img loading="eager" class="desktop img-style" src="../assets/images/projects/venice/v6.jpg" alt="HIKAL PROPERTIES" style="width: 100%" />
                    </div>
                </div>
            </div>
        </div>
    
        <!--CONTENT-->
        <div class="second_section">
            <div class="container container-fluid py-3">
                <div class="desktop">
                    <div class="row my-4">
                        <div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">
                            <img class="img-style" src="../assets/images/projects/venice/v4.png" loading="lazy" alt="HIKAL PROPERTIES" style="width: 100%;" />
                        </div>
                        <div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6" style="display: flex; align-items: center;">
                            <div class="p-2">
                                <h5 class="gold-grad">
                                    فخمة ملاذ سكني في دبي الجنوب
                                </h5>
                                <hr style="width: 50px; height: 2px; background-color: #d4a556; opacity: 0.5;">
                                <h6>
                                    انطلق في رحلة من الفخامة مع مشروع مصمم بعناية. استكشف مجموعة من الاستوديوهات والشقق بغرفة واحدة واثنتين وثلاث غرف نوم، بالإضافة إلى الفلل الاستثنائية، وكلها تقع على واجهة المياه. يعكس هذا العمل المعماري الرائع الأسلوب المعاصر والأناقة الخالدة. مع أبراج تتراوح بين الطابق الأرضي + 10 إلى الطابق الأرضي + 22، يضع هذا المشروع معايير جديدة للعيش الرفيع، مقدماً تجربة لا مثيل لها في نمط الحياة.
                                </h6>
                            </div>
                        </div>
                    </div>
                    <div class="row my-4">
                        <div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6" style="display: flex; align-items: center;">
                            <div class="p-2">
                                <h5 class="gold-grad">
                                    موقع متميز واتصالات لا مثيل لها
                                </h5>
                                <hr style="width: 50px; height: 2px; background-color: #d4a556; opacity: 0.5;">
                                <h6>
                                    يقع هذا المشروع في قلب دبي الجنوب، حيث يتمتع بموقع استراتيجي يجاور مطار المكتوم الدولي ويقع بالقرب من مشروع إعمار الجنوب الراقي. ويتزايد جاذبيته بفضل قربه من محطة المترو المخطط لها، مما يضمن للسكان تجربة استثنائية في الاتصال وسهولة الوصول. ابحث عن إقامة تجمع بين الراحة والملاءمة.
                                </h6>
                            </div>
                        </div>
                        <div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">
                            <img class="img-style" src="../assets/images/projects/venice/v1.png" loading="lazy" alt="HIKAL PROPERTIES" style="width: 100%;" />
                        </div>
                    </div>
                    <div class="row my-4">
                        <div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">
                            <img class="img-style" src="../assets/images/projects/venice/v5.png" loading="lazy" alt="HIKAL PROPERTIES" style="width: 100%;" />
                        </div>
                        <div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6" style="display: flex; align-items: center;">
                            <div class="p-2">
                                <h5 class="gold-grad">
                                    واحة من الفخامة على واجهة المياه
                                </h5>
                                <hr style="width: 50px; height: 2px; background-color: #d4a556; opacity: 0.5;">
                                <h6>
                                    هذا المكان الاستثنائي ليس مجرد مسكن؛ بل هو ملاذ من الفرح على واجهة المياه. ومع 23% من مساحته مغطاة بالمياه، يتميز هذا المكان بوجود بحيرة بطول 18 كيلومتراً، مع موجات صناعية ومياه عذبة. هنا، يمكن للسكان الاستمتاع بجمال البحر عن كثب. القلب النابض لهذه المجتمع، بوليفارد بطول 700 متر، يضمن توفر متاجر متنوعة، مما يضمن توفير جميع الضروريات على مقربة من الجميع. علاوة على ذلك، يوفر المجتمع أماكن ثقافية ومدارس ومستشفيات وفنادق فاخرة، مما يخلق أجواء حيوية ومليئة بالإثراء.
                                </h6>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="mobile">
                    <div class="p-2">
                        <h5 class="gold-grad">
                            فخمة ملاذ سكني في دبي الجنوب
                        </h5>
                        <hr style="width: 50px; height: 2px; background-color: #d4a556; opacity: 0.5;">
                        <h6>
                            انطلق في رحلة من الفخامة مع مشروع مصمم بعناية. استكشف مجموعة من الاستوديوهات والشقق بغرفة واحدة واثنتين وثلاث غرف نوم، بالإضافة إلى الفلل الاستثنائية، وكلها تقع على واجهة المياه. يعكس هذا العمل المعماري الرائع الأسلوب المعاصر والأناقة الخالدة. مع أبراج تتراوح بين الطابق الأرضي + 10 إلى الطابق الأرضي + 22، يضع هذا المشروع معايير جديدة للعيش الرفيع، مقدماً تجربة لا مثيل لها في نمط الحياة.
                        </h6>
                    </div>
                    <img class="img-style" src="../assets/images/projects/venice/v4.png" loading="lazy" alt="HIKAL PROPERTIES" style="width: 100%;" />
                    <div class="p-2">
                        <h5 class="gold-grad">
                            موقع متميز واتصالات لا مثيل لها
                        </h5>
                        <hr style="width: 50px; height: 2px; background-color: #d4a556; opacity: 0.5;">
                        <h6>
                            يقع هذا المشروع في قلب دبي الجنوب، حيث يتمتع بموقع استراتيجي يجاور مطار المكتوم الدولي ويقع بالقرب من مشروع إعمار الجنوب الراقي. ويتزايد جاذبيته بفضل قربه من محطة المترو المخطط لها، مما يضمن للسكان تجربة استثنائية في الاتصال وسهولة الوصول. ابحث عن إقامة تجمع بين الراحة والملاءمة.
                        </h6>
                    </div>
                    <img class="img-style" src="../assets/images/projects/venice/v1.png" loading="lazy" alt="HIKAL PROPERTIES" style="width: 100%;" />
                    <div class="p-2">
                        <h5 class="gold-grad">
                            واحة من الفخامة على واجهة المياه
                        </h5>
                        <hr style="width: 50px; height: 2px; background-color: #d4a556; opacity: 0.5;">
                        <h6>
                            هذا المكان الاستثنائي ليس مجرد مسكن؛ بل هو ملاذ من الفرح على واجهة المياه. ومع 23% من مساحته مغطاة بالمياه، يتميز هذا المكان بوجود بحيرة بطول 18 كيلومتراً، مع موجات صناعية ومياه عذبة. هنا، يمكن للسكان الاستمتاع بجمال البحر عن كثب. القلب النابض لهذه المجتمع، بوليفارد بطول 700 متر، يضمن توفر متاجر متنوعة، مما يضمن توفير جميع الضروريات على مقربة من الجميع. علاوة على ذلك، يوفر المجتمع أماكن ثقافية ومدارس ومستشفيات وفنادق فاخرة، مما يخلق أجواء حيوية ومليئة بالإثراء.
                        </h6>
                    </div>
                    <img class="img-style" src="../assets/images/projects/venice/v5.png" loading="lazy" alt="HIKAL PROPERTIES" style="width: 100%;" />
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
                            <div style="font-size: 2.2rem; margin: 0px;"><b>07</b></div>
                            <p style="display: flex; justify-content: center; color: #d4a556;">
                                دقائق
                            </p>
                            <p class="icons-txtpara text-center" style="display: flex; justify-content: center;">
                                مطار آل مكتوم الدولي
                            </p>
                            <br>
                        </div>
                    </div>
                    <div class="col-6 col-sm-6 col-md-4 col-lg-3 col-xl-3 p-2">
                        <div style="display: block; text-align: center;">
                            <div style="font-size: 2.2rem; margin: 0px;"><b>15</b></div>
                            <p style="display: flex; justify-content: center; color: #d4a556;">
                                دقائق
                            </p>
                            <p class="icons-txtpara text-center" style="display: flex; justify-content: center;">
                                نخلة جبل علي
                            </p>
                            <br>
                        </div>
                    </div>
                    <div class="col-6 col-sm-6 col-md-4 col-lg-3 col-xl-3 p-2">
                        <div style="display: block; text-align: center;">
                            <div style="font-size: 2.2rem; margin: 0px;"><b>20</b></div>
                            <p style="display: flex; justify-content: center; color: #d4a556;">
                                دقائق
                            </p>
                            <p class="icons-txtpara text-center" style="display: flex; justify-content: center;">
                                عالم صورة للمغامرات
                            </p>
                            <br>
                        </div>
                    </div>
                    <div class="col-6 col-sm-6 col-md-4 col-lg-3 col-xl-3 p-2">
                        <div style="display: block; text-align: center;">
                            <div style="font-size: 2.2rem; margin: 0px;"><b>23</b></div>
                            <p style="display: flex; justify-content: center; color: #d4a556;">
                                دقائق
                            </p>
                            <p class="icons-txtpara text-center" style="display: flex; justify-content: center;">
                                نخلة جميرا
                            </p>
                            <br>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    
        <!--IMAGE-->
        <div class="map_section" style="display: flex; align-items: center; justify-content: space-evenly;">
            <img loading="eager" class="desktop img-style" src="../assets/images/projects/venice/1416.webp" alt="HIKAL PROPERTIES" style="width: 60%" />
            <img loading="eager" class="mobile img-style" src="../assets/images/projects/venice/1416.webp" alt="HIKAL PROPERTIES" style="width: 100%" />
        </div>
    
        <!--AMENITIES-->
        <div class="fourth_section my-5">
            <?php include_once("../components/amenities-ar.php"); ?>
        </div>
    
        <!--WHY DUBAI-->
        <div class="fifth_section my-5">
            <?php include_once("../components/whydubai-ar.php"); ?>
        </div>
        
        <footer style="background-color: #000000;">
            <!--<img src="assets/images/static/footer-img.jpg" style="width: 100vw;" />-->
            <?php include_once("components/footer-copyright.php"); ?>
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

        <?php
    }
    ?>
    
</body>

</html>