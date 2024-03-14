<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8" />
    <meta http-equiv="x-ua-compatible" content="ie=edge" />
    <title>{{ get_phrase('Real-Estate') }} | {{ get_phrase('Panel') }}</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="description" content="" />
    <meta  name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"/>

    @include('real_estate.include_top')
</head>

<body>
    <style>
        .pp-container {
            max-width: 800px;
            margin: 0 auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            margin-top: 30px;
        }
        h1, h2 {
            text-align: center;
            margin-bottom: 20px;
        }
        p {
            line-height: 1.6;
            margin-bottom: 15px;
        }
        ul {
            list-style-type: disc;
            padding-left: 20px;
        }
        li {
            margin-bottom: 10px;
        }
        a {
            color: #007bff;
            text-decoration: none;
        }
        a:hover {
            text-decoration: underline;
        }
    </style>

    @include('real_estate.header')

    <div class="pp-container">
        <h1>Privacy Policy</h1>
        <p>This Privacy Policy describes how [Your Real Estate Company Name] ("we", "us", or "our") collects, uses, and shares personal information when you visit our website [Your Website URL] (the "Site").</p>

        <h2>Information We Collect</h2>
        <p>We collect personal information you provide directly to us when you use our Site or communicate with us. This information may include:</p>
        <ul>
            <li>Contact information, such as your name, email address, phone number, and postal address.</li>
            <li>Information you provide when you submit forms or applications on our Site, such as property inquiries or requests for information.</li>
            <li>Information about your preferences and interests related to real estate properties.</li>
        </ul>

        <!-- Add more sections as needed -->

        <footer>
            &copy; 2024 [Your Real Estate Company Name]. All rights reserved. | <a href="#">Privacy Policy</a>
        </footer>
    </div>

    @include('real_estate.include_bottom')

</body>

</html>
