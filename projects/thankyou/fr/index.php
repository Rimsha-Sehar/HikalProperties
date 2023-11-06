<?php
session_start();
error_reporting(0);
?>

<!DOCTYPE html>
<html>

<head>
<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Hikal Real Estate Properties | Thank you</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Hikal Real Estate | Hikal Properties">

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

    <!-- ICON -->
    <link rel="icon" type="image/png" href="https://hikalproperties.com/projects/assets/images/logo/hikalagency-icon.png" />
    <!-- https://hikalproperties.com/projects/ -->
    <!-- STYLES -->

    <link rel="stylesheet" href="https://hikalproperties.com/projects/assets/css/dark-theme-gold.css" />
    <link rel="stylesheet" href="https://hikalproperties.com/projects/assets/css/animation.css" />

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

<body class="english">
    <!-- Google Tag Manager (noscript) -->
    <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-K7J7SRR" height="0" width="0" style="display:none; visibility:hidden"></iframe></noscript>
    <!-- End Google Tag Manager (noscript) -->

    
    <div class="d-flex flex-column justify-content-between" style="width: 100%; min-height: 100vh;">
        <?php
            include_once("../../components/header-dark.php");
        ?>
        <div class="d-flex justify-content-center align-items-center text-center p-5 my-10">
            <h1 class="text-center" style="font-size: 1.5rem; line-height: 3rem;">
                Merci de nous contacter. Notre consultant dédié prendra contact avec vous sous peu pour répondre à vos besoins.
                <!-- <a href="tel:+97142722249" class="gold-grad" style="font-weight: bold;">+97142722249</a> -->
            </h1>
        </div>
        <?php
            include_once("../../components/footer-copyright.php");
        ?>
    </div>
    
</body>

</html>
<?php
?>