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
    <!-- <link rel="stylesheet" href="../../assets/css/hikal-theme.css" /> -->
    <!-- <link rel="stylesheet" href="https://hikalproperties.com/projects/assets/css/animation.css" /> -->
    <!-- <link rel="stylesheet" href="../../assets/css/parallax.css" /> -->

    <!-- PIXEL -->
    <script src="https://hikalproperties.com/projects/gtm/pixel.js"></script>

    <style>
        .parallax-1 {
            background-image: url(https://hikalproperties.com/projects/assets/images/projects/empire/ee-main.jpg);
        }

        .parallax-2 {
            background-image: url(https://hikalproperties.com/projects/assets/images/projects/empire/ee-map.png);
        }

        .parallax-3 {
            background-image: url(https://hikalproperties.com/projects/assets/images/projects/empire/ee-outdoor.jpg);
        }

        /* ROOT */
        :root {
            --primary-color: #22A0E7;
            --light-primary-color: #bbd5ed;
            --white: #FFFFFF;
            --black: #000000;
            --dark-bg-text: #333333;
            --light-bg-text: #EEEEEE;
            --primary-color-1: hsl(242, 120%, 92%);
            --primary-color-2: hsl(232, 110%, 82%);
            --primary-color-3: hsl(222, 100%, 72%);
            --primary-color-4: hsl(212, 90%, 62%);
            --primary-color-5: hsl(202, 80%, 52%);
            --primary-color-6: hsl(212, 90%, 62%);
            --primary-color-7: hsl(222, 100%, 72%);
            --primary-color-8: hsl(232, 110%, 82%);
            --primary-color-9: hsl(242, 120%, 92%);

        }

        /* BODY */
        body {
            overflow-x: hidden;
            color: var(--dark-bg-text);
            background: var(--white);
            /*background: linear-gradient(to bottom, #1C1C1C, #333333);*/
            /* background-image: url('https://hikalproperties.com/projects/assets/images/bg/bg-003.jpg'); */
            /* background-size: cover; */
            /* background-position: center; */
            /* background-repeat: no-repeat; */
        }

        /* SCROLLBAR */
        ::-webkit-scrollbar {
            width: 6px;
        }

        ::-webkit-scrollbar-track {
            background: #EEE;
        }

        ::-webkit-scrollbar-thumb {
            background-image: linear-gradient(to bottom right, var(--primary-color-2) 0%, var(--primary-color-4) 50%, var(--primary-color-6) 77%, var(--primary-color-8) 88%, var(--primary-color) 100%);
            border-radius: 10px;
        }

        /* SCREENS ON DESKTOP VIEW */
        .desktop {
            display: block;
        }

        .mobile {
            display: none;
        }

        /* HEADINGS */
        h1,
        h2,
        h3,
        h4,
        h5,
        h6 {
            margin: 15px 0px;
        }

        h1 {
            font-size: 1.8rem;
        }

        h3,
        h4 {
            font-weight: bold;
        }

        h6 {
            font-weight: 200;
            line-height: 2rem;
        }

        .arabic {
            direction: rtl;
            font-family: 'Noto Kufi Arabic', sans-serif;
            text-align: right;
            font-size: small;
        }

        .text-primary {
            color: var(--primary-color);
            font-weight: 600;
        }

        .first_section {
            /* background-color: var(--white); */
            /* box-shadow: 0px 15px 10px -15px #CCCCCC; */
            /* border-bottom-left-radius: 10px; */
            /* border-bottom-right-radius: 10px; */
        }

        .header_section {
            /* background-color: #22a0e7; */
            display: flex;
            justify-content: end;
            align-items: center;
            border-bottom-left-radius: 10px;
            border-bottom-right-radius: 10px;
            /* box-shadow: 0px 15px 10px -15px #CCCCCC; */
            ;
        }

        .language_selection {
            width: auto;
            margin: 5px;
            padding: 3px;
            background-color: var(--primary-color);
            border-top-left-radius: 30px;
            border-top-right-radius: 30px;
            border-bottom-left-radius: 30px;
            border-bottom-right-radius: 30px;
            display: flex;
            align-items: center;
            box-shadow: 2px 10px 5px -8px #CCCCCC;
        }

        .lang-flag {
            width: 20px;
            height: 20px;
            border-radius: 50%;
            border: 1px solid var(--primary-color);
        }

        .next-language {
            font-family: 'Raleway', sans-serif;
            padding-left: 5px;
            padding-right: 5px;
            font-weight: medium;
            color: var(--white);
        }

        .heading_section {
            width: 100%;
            padding: 10px;
            text-align: center;
        }

        .main-img {
            width: 90%;
            box-shadow: 0px 15px 10px -15px #CCCCCC;
            border-radius: 10px;
        }

        .highlight-box {
            width: 90%;
            /* border: 1px solid var(--primary-color); */
            padding: 0px 10px 10px 10px;
            border-radius: 10px;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            position: relative;
        }

        /* TEXT GRADIENT AND ANIMATION */
        .primary-grad {
            background-image: linear-gradient(to bottom right, var(--primary-color) 0%, var(--primary-color-1) 10%, var(--primary-color-2) 20%, var(--primary-color-3) 30%, var(--primary-color-4) 40%, var(--primary-color-5) 50%, var(--primary-color-6) 60%, var(--primary-color-7) 70%, var(--primary-color-8) 80%, var(--primary-color-9) 90%, var(--primary-color) 100%);
            background-size: 150%;
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            filter: drop-shadow(0 0 1px rgba(255, 200, 0, .3));
            font-weight: 600;
        }

        .primary-grad-anim {
            background-image: repeating-linear-gradient(to right, var(--primary-color) 0%, var(--primary-color-1) 10%, var(--primary-color-2) 20%, var(--primary-color-3) 30%, var(--primary-color-4) 40%, var(--primary-color-5) 50%, var(--primary-color-6) 60%, var(--primary-color-7) 70%, var(--primary-color-8) 80%, var(--primary-color-9) 90%, var(--primary-color) 100%);
            background-size: 150%;
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            filter: drop-shadow(0 0 1px rgba(255, 200, 0, .3));
            animation: MoveBackgroundPosition 4s ease-in-out infinite;
        }

        @keyframes MoveBackgroundPosition {
            0% {
                background-position: 0% 50%
            }

            50% {
                background-position: 100% 50%
            }

            100% {
                background-position: 0% 50%
            }
        }

        /* NUMBER GLOW */
        .num-glow {
            -webkit-background-clip: text;
            background-image: url('data:image/svg+xml;base64,PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0idXRmLTgiPz4gPHN2ZyB2ZXJzaW9uPSIxLjEiIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyI+PGRlZnM+PGxpbmVhckdyYWRpZW50IGlkPSJncmFkIiBncmFkaWVudFVuaXRzPSJvYmplY3RCb3VuZGluZ0JveCIgeDE9IjAuNSIgeTE9IjAuMCIgeDI9IjAuNSIgeTI9IjEuMCI+PHN0b3Agb2Zmc2V0PSIwJSIgc3RvcC1jb2xvcj0iI2E1NGUwNyIvPjxzdG9wIG9mZnNldD0iNTAlIiBzdG9wLWNvbG9yPSIjZmVmMWEyIi8+PHN0b3Agb2Zmc2V0PSIxMDAlIiBzdG9wLWNvbG9yPSIjYmM4ODFiIi8+PC9saW5lYXJHcmFkaWVudD48L2RlZnM+PHJlY3QgeD0iMCIgeT0iMCIgd2lkdGg9IjEwMCUiIGhlaWdodD0iMTAwJSIgZmlsbD0idXJsKCNncmFkKSIgLz48L3N2Zz4g');
            background-size: 100%;
            background-image: -webkit-gradient(linear, 50% 0%, 50% 100%, color-stop(0%, var(--primary-color-3)), color-stop(50%, var(--primary-color-5)), color-stop(100%, var(--primary-color-7)));
            background-image: -moz-linear-gradient(top, var(--primary-color-3) 0%, var(--primary-color-5) 50%, var(--primary-color-7) 100%);
            background-image: -webkit-linear-gradient(top, var(--primary-color-3) 0%, var(--primary-color-5) 50%, var(--primary-color-7) 100%);
            background-image: linear-gradient(to bottom, var(--primary-color-3) 0%, var(--primary-color-5) 50%, var(--primary-color-7) 100%);
            font-family: 'Raleway', sans-serif;
            font-size: 2.2rem;
            font-weight: bold;
            text-align: center;
            text-stroke: 0.5rem white;
            -webkit-text-fill-color: transparent;
            text-transform: uppercase;
            animation: num-glow 4s ease-out infinite alternate;
        }

        @keyframes num-glow {
            0% {
                text-shadow: 0 0px 5px rgba(255, 255, 255, 1);
            }

            50% {
                text-shadow: 0px 0px var(--primary-color);
            }

            100% {
                text-shadow: 0 0px 5px rgba(255, 255, 255, 1);
            }
        }

        /* TEXT GLOW */
        .text-glow {
            text-align: center;
            margin-bottom: 0;
            margin-top: 0;
            line-height: 1;
            text-decoration: none;
            color: var(--primary-color);
            font-size: 2.2rem;
            animation: neon 2s ease-in-out infinite alternate;
        }

        @keyframes neon {
            from {
                text-shadow: 0 0 5px #fff, 0 0 10px #007bff, 0 0 15px #fff, 0 0 20px #007bff, 0 0 35px #4da6ff, 0 0 40px #c0e4ff, 0 0 50px #4da6ff, 0 0 75px #007bff;
            }

            to {
                text-shadow: 0 0 2.5px #007bff, 0 0 5px #fff, 0 0 7.5px #4da6ff, 0 0 10px #007bff, 0 0 17.5px #4da6ff, 0 0 20px #c0e4ff, 0 0 25px #4da6ff, 0 0 37.5px #007bff;
            }
        }

        /* TEXT EXPAND */
        .text-expand {
            width: 100%;
            -webkit-background-clip: text;
            background-image: url('data:image/svg+xml;base64,PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0idXRmLTgiPz4gPHN2ZyB2ZXJzaW9uPSIxLjEiIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyI+PGRlZnM+PGxpbmVhckdyYWRpZW50IGlkPSJncmFkIiBncmFkaWVudFVuaXRzPSJvYmplY3RCb3VuZGluZ0JveCIgeDE9IjAuNSIgeTE9IjAuMCIgeDI9IjAuNSIgeTI9IjEuMCI+PHN0b3Agb2Zmc2V0PSIwJSIgc3RvcC1jb2xvcj0iI2E1NGUwNyIvPjxzdG9wIG9mZnNldD0iNTAlIiBzdG9wLWNvbG9yPSIjZmVmMWEyIi8+PHN0b3Agb2Zmc2V0PSIxMDAlIiBzdG9wLWNvbG9yPSIjYmM4ODFiIi8+PC9saW5lYXJHcmFkaWVudD48L2RlZnM+PHJlY3QgeD0iMCIgeT0iMCIgd2lkdGg9IjEwMCUiIGhlaWdodD0iMTAwJSIgZmlsbD0idXJsKCNncmFkKSIgLz48L3N2Zz4g');
            background-size: 100%;
            background-image: -webkit-gradient(linear, 50% 0%, 50% 100%, color-stop(0%, var(--primary-color-3)), color-stop(50%, var(--primary-color-5)), color-stop(100%, var(--primary-color-7)));
            background-image: -moz-linear-gradient(top, var(--primary-color-3) 0%, var(--primary-color-5) 50%, var(--primary-color-7) 100%);
            background-image: -webkit-linear-gradient(top, var(--primary-color-3) 0%, var(--primary-color-5) 50%, var(--primary-color-7) 100%);
            background-image: linear-gradient(to bottom, var(--primary-color-3) 0%, var(--primary-color-5) 50%, var(--primary-color-7) 100%);
            text-stroke: 0.5rem white;
            -webkit-text-fill-color: transparent;
            animation: textExpand 10s infinite;
            font-weight: bold;
            text-shadow: 0 2px 10px rgba(255, 255, 255, 1);
        }

        @keyframes textExpand {
            0% {
                transform: scale(1);
                transform-origin: top center;
            }

            50% {
                transform: scale(1.1);
                transform-origin: top center;
            }

            100% {
                transform: scale(1);
                transform-origin: top center;
            }
        }

        /* FORM */
        .form-container {
            width: 90%;
            background-color: rgba(255, 255, 255, 0.2);
            padding: 15px;
            box-shadow: 0 0 10px 2px #CCCCCC;
            border-radius: 10px;
        }

        /* INPUT FIELDS & LABELS */
        input,
        textarea {
            caret-color: #AAAAAA;
            width: 100%;
        }

        label,
        input,
        button,
        textarea {
            display: block;
            width: 100%;
            padding: 0;
            border: none;
            outline: none;
            box-sizing: border-box;
        }

        label {
            color: var(--primary-color);
            margin-top: 15px;
            margin-bottom: 5px;
            font-weight: 600;
        }

        input::placeholder {
            color: #333333;
            font-size: small;
        }

        input[type=text] {
            background: var(--light-primary-color);
            padding: 5px;
            padding-left: 11px;
            padding-right: 11px;
            border-radius: 11px;
            box-shadow: inset 3px 3px 3px #cbced1, inset -3px 3px 3px white;
            margin-bottom: 3px;
        }

        input[type=time] {
            background: var(--light-primary-color);
            padding: 5px;
            padding-left: 11px;
            padding-right: 11px;
            border-radius: 11px;
            box-shadow: inset 3px 3px 3px #cbced1, inset -3px 3px 3px white;
            margin-bottom: 3px;
            width: 100%;
        }

        input[type=email] {
            background: var(--light-primary-color);
            padding: 5px;
            padding-left: 11px;
            padding-right: 11px;
            border-radius: 11px;
            box-shadow: inset 3px 3px 3px #cbced1, inset -3px 3px 3px white;
            margin-bottom: 3px;
        }

        input[type=tel] {
            background: var(--light-primary-color);
            padding: 5px;
            padding-left: 11px;
            padding-right: 11px;
            border-radius: 11px;
            box-shadow: inset 3px 3px 3px #cbced1, inset -3px 3px 3px white;
            margin-bottom: 3px;
        }

        input[type=datetime-local] {
            background: var(--light-primary-color);
            padding: 5px;
            padding-left: 11px;
            padding-right: 11px;
            border-radius: 11px;
            box-shadow: inset 3px 3px 3px #cbced1, inset -3px 3px 3px white;
            margin-bottom: 3px;
        }

        textarea {
            background: var(--light-primary-color);
            padding: 5px;
            padding-left: 11px;
            padding-right: 11px;
            border-radius: 11px;
            box-shadow: inset 3px 3px 3px #cbced1, inset -3px 3px 3px white;
        }

        /*DROPDOWN*/
        select {
            background: var(--light-primary-color);
            padding: 7px 11px;
            border-radius: 11px;
            box-shadow: inset 3px 3px 3px #cbced1, inset -3px 3px 3px white;
            margin-bottom: 3px;
            border: none;
            width: 100%;
        }


        /* BUTTONS */
        button {
            margin: 20px 0px 0px 0px;
            display: inline-block;
            outline: none;
            font-family: inherit;
            box-sizing: border-box;
            border: none;
            border-radius: .3em;
            /*height: 2.75em;*/
            line-height: 2.5em;
            text-transform: uppercase;
            padding: 0 1em;
            /* box-shadow: 0 3px 6px rgba(0, 0, 0, .16), 0 3px 6px rgba(110, 80, 20, .4),
                inset 0 -2px 5px 1px rgba(139, 66, 8, 1),
                inset 0 -1px 1px 3px rgba(250, 227, 133, 1);
            background-image: linear-gradient(160deg, #a54e07, #b47e11, #fef1a2, #bc881b, #a54e07);
            border: 1px solid #a55d07; */
            box-shadow: 0 3px 6px rgba(0, 0, 0, .16), 0 3px 6px rgba(34, 160, 231, .4), inset 0 -2px 5px 1px rgba(34, 160, 231, .7), inset 0 -1px 1px 3px rgba(250, 227, 133, 1);
            background-image: linear-gradient(160deg, #1a89e7, #22a0e7, #79c2f7, #2dabe7, #1a89e7);
            border: 1px solid #1a89e7;
            color: rgb(120, 50, 5);
            text-shadow: 0 2px 2px rgba(250, 227, 133, 1);
            cursor: pointer;
            transition: all .2s ease-in-out;
            background-size: 100% 100%;
            background-position: center;
        }

        button:hover {
            /*box-shadow: 3px 3px 3px #cbced1, -3px -3px 3px white;*/
            background-size: 150% 150%;
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.19), 0 6px 6px rgba(0, 0, 0, 0.23),
                inset 0 -2px 5px 1px #b17d10, inset 0 -1px 1px 3px rgba(250, 227, 133, 1);
            border: 1px solid rgba(165, 93, 7, .6);
            color: rgba(120, 50, 5, .8)
        }


        @media screen and (max-width: 800px) {
            .containerform {
                width: 100%;
                border-radius: 20px;
                padding: 30px;
            }
        }

        /*COUNTRY DROPDOWN */
        .iti {
            width: 100% !important;
            color: #000 !important;
        }

        .iti--container {
            position: fixed;
            width: 100vw;
            height: 100vh;
            top: 0;
            left: 0;
            bottom: 0;
            right: 0;
            padding: 10%;
            background: rgba(238, 238, 238, 0.7);
        }

        .iti__country-list {
            background-color: rgba(238, 238, 238, 0.7);
            padding: 10px;
            min-width: 30% !important;
            max-width: 90% !important;
            max-height: 90% !important;
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
        }

        .iti__country {
            direction: ltr;
            padding: 5px 10px !important;
            background-color: white !important;
            border-radius: 5px !important;
            margin: 5px !important;
            color: #333333;
            box-shadow: 0px 1px 4px rgba(38, 38, 38, 0.4);

        }

        .iti-mobile .iti--container {
            position: fixed;
            width: 100vw;
            height: 100vh;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            padding: 10%;
            background: rgba(238, 238, 238, 0.7);
        }

        .iti-mobile .iti__country-list {
            max-height: 90% !important;
            min-width: 30% !important;
            max-width: 90% !important;
        }

        /* TABLET AND MOBILE */
        @media screen and (max-width: 768px) {
            .desktop {
                display: none;
            }

            .mobile {
                display: block;
            }

            h1 {
                font-size: 1.1rem;
            }

            .text-glow {
                font-size: 1.4rem;
            }

            .num-glow {
                font-size: 1.5rem;
            }
        }
    </style>
</head>

<body class="arabic">

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
        <!-- <button onclick="topFunction()" id="myBtn" title="Go to top" style="background: transparent;"><i
                class="fa fa-arrow-up gold-grad"></i></button> -->

        <!-- HEADING  -->
        <div class="first_section">
            <div class="header_section">
                <div class="language_selection">
                    <a href="https://hikalproperties.com/projects/empire/en?<?php echo $_SESSION["params"]; ?>">
                        <div class="d-flex align-items-center">
                            <img class="lang-flag" src="https://hikalproperties.com/projects/assets/images/flags/en.jpg" />
                            <span class="next-language">EN</span>
                        </div>
                    </a>
                </div>
            </div>
            <div class="heading_section">
                <h1 class="my-2" style="text-align: center; line-height: 2rem; font-weight: 800;">
                    <span class="primary-grad">تملك بأقساط </span>
                    <span class="num-glow">1%</span>
                    <span class="primary-grad"> شهريا لمدة </span>
                    <span class="num-glow">80</span>
                    <span class="primary-grad">شهر</span>
                </h1>
                <h3 class="primary-grad-anim mt-2"
                    style="text-align: center; line-height: 1.5rem; font-size: 1rem; margin: 0;">
                    وفرصتك قبل الطرح
                </h3>
                <h3 class="mt-2" style="text-align: center; line-height: 1.5rem; font-weight: 500; font-size: 1rem; ">
                    أحصل علي آلمطبخ مجهّز بالكامل
                </h3>
            </div>
        </div>

        <!-- IMAGE -->
        <div class="container container-fluid d-flex justify-content-center">
            <img class="main-img" src="https://hikalproperties.com/projects/assets/images/projects/empire/ee-main.jpg" />
        </div>

        <!-- HIGHLIGHTS -->
        <div class="container container-fluid my-5">
            <div class="row">
                <div class="col-6 col-md-6 col-lg-6 d-flex justify-content-center">
                    <div class="highlight-box">
                        <img src="../../assets/images/icons/22A0E7-building.png" width="100" />
                        <div class="text-center" style="font-weight: 600;">
                            استوديو، 1، 2، 3 غرف نوم مع مسبح خاص
                        </div>
                    </div>
                </div>
                <div class="col-6 col-md-6 col-lg-6 d-flex justify-content-center">
                    <div class="highlight-box">
                        <img src="../../assets/images/icons/22A0E7-address.png" width="100" />
                        <div class="text-center" style="font-weight: 600;">
                            أرجان، دبي، الإمارات العربية المتحدة
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- FORM -->
        <div class="container container-fluid my-4 d-flex justify-content-center">
            <div class="form-container">
                <!-- <div class="inputs" style="font-weight: 400;"> -->
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
                    <!-- <div class="contact-form"> -->
                    <form id="lead-form" dir="ltr" onsubmit="return submitLeadForm();">
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
                        <label class="gold-grad">الاسم</label>
                        <input type="text" name="LeadName1" id="LeadName1" required />

                        <!-- CONTACT NUMBER -->
                        <label class="gold-grad">رقم الاتصال</label>
                        <input type="tel" name="phone[main]" id="mobile" style="color: #000000;" placeholder="56 789 0123"
                            required />

                        <!-- HOW MANY BEDROOMS -->
                        <label class="gold-grad">كم عدد غرف النوم؟</label>
                        <div style="display: flex;" dir="rtl">
                            <input class="mx-2" type="radio" name="EnquiryRadio1" id="EnquiryRadio1" value="Studio"
                                style="width: 20px;" required>
                            <label for="EnquiryRadio1" style="margin-top: 0px; padding-left: 7px; color: #777;">
                                استوديو + حمام سباحة
                            </label>
                        </div>
                        <div style="display: flex;" dir="rtl">
                            <input class="mx-2" type="radio" name="EnquiryRadio1" id="EnquiryRadio2" value="1 Bedroom"
                                style="width: 20px;" required>
                            <label for="EnquiryRadio2" style="margin-top: 0px; padding-left: 7px; color: #777;">
                                غرفة نوم + حمام سباحة
                            </label>
                        </div>
                        <div style="display: flex;" dir="rtl">
                            <input class="mx-2" type="radio" name="EnquiryRadio1" id="EnquiryRadio3" value="2 Bedrooms"
                                style="width: 20px;" required>
                            <label for="EnquiryRadio3" style="margin-top: 0px; padding-left: 7px; color: #777;">
                                غرفتين نوم + حمام سباحة
                            </label>
                        </div>
                        <div style="display: flex;" dir="rtl">
                            <input class="mx-2" type="radio" name="EnquiryRadio1" id="EnquiryRadio4" value="3 Bedrooms"
                                style="width: 20px;" required>
                            <label for="EnquiryRadio4" style="margin-top: 0px; padding-left: 7px; color: #777;">
                                ثلاث غرف نوم + حمام سباحة
                            </label>
                        </div>

                        <!-- PURPOSE  -->
                        <label class="gold-grad">غرض الاستفسار</label>
                        <div style="display: flex;" dir="rtl">
                            <input class="mx-2" type="radio" name="LeadForRadio1" id="PurposeRadio1" value="Investment"
                                style="width: 20px;" required>
                            <label for="PurposeRadio1" style="margin-top: 0px; padding-left: 7px; color: #777;">
                                استثمار
                            </label>
                        </div>
                        <div style="display: flex;" dir="rtl">
                            <input class="mx-2" type="radio" name="LeadForRadio1" id="PurposeRadio2" value="End-user"
                                style="width: 20px;" required>
                            <label for="PurposeRadio2" style="margin-top: 0px; padding-left: 7px; color: #777;">
                                سكني
                            </label>
                        </div>

                        <div id="FormButton" name="FormButton" class="pb-4">
                            <div class="form_button">
                                <button type="submit" class="submit-click">إرسال</button>
                            </div>
                        </div>
                    </form>
                    <!-- </div> -->
                    <?php
                }
                ?>
                <!-- </div> -->
            </div>
        </div>

        <!-- LOCATION BENEFITS -->
        <div class="container container-fluid my-5">
            <div class="row" style="text-align: center;">
                <h4 class="primary-grad-anim">
                    مميزات الموقع
                </h4>
            </div>
            <div class="row" style="justify-content: center;">
                <div class="col-6 col-sm-6 col-md-4 col-lg-3 col-xl-3 p-2">
                    <div style="display: block; text-align: center;">
                        <div class="primary-grad" style="font-size: 2.2rem; margin: 0px;">
                            05
                        </div>
                        <p class="primary-grad" style="display: flex; justify-content: center; color: #d4a556;">
                            دقائق
                        </p>
                        <p class="primary-grad text-center" style="display: flex; justify-content: center;">
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

        <!-- MAP -->
        <div class="container container-fluid d-flex justify-content-center mb-5">
            <img class="main-img" src="https://hikalproperties.com/projects/assets/images/projects/empire/ee-map.png" />
        </div>

        <!-- FOOTER -->

        <div id="parallax">
            <section>

            </section>

            <section>
                <div class="parallax-1"></div>
            </section>

            <section>
                <!-- FORM -->
                <style>
                    .form-section {
                        width: 100%;
                        display: flex;
                        justify-content: end;
                        z-index: 1;
                    }

                    .containerform {
                        width: 100%;
                        border-radius: 0px;
                    }
                </style>

                <div class="form-section">
                    <div class="containerform">

                    </div>
                </div>
            </section>

            <section>
                <div class="parallax-three">
                </div>
            </section>

            <section>
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
            </section>
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