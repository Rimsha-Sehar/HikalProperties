{{-- <!DOCTYPE html>
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

<body> --}}

    @extends('global.index')
@section('content')
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
        h1 {
            text-align: center;
            margin-bottom: 20px;
        }

        h3 {
            margin-top: 50px;
            margin-bottom: 15px;
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

        <h3>Introduction</h3>
        <p>We respect your privacy and are committed to protecting it through our compliance with this policy. This Privacy Policy describes:</p>
        <ul>
            <li>The types of information we may collect or that you may provide when you use our website (hikalproperties.com).</li>
            <li>Our practices for collecting, using, maintaining, protecting, and disclosing that information.</li>
            <li>This policy applies to information we collect:</li>
            <ul>
                <li>On this website.</li>
                <li>In email, text, and other electronic messages between you and this website.</li>
                <li>Through mobile and desktop applications you download from this website, which provide dedicated non-browser-based interaction between you and this website.</li>
            </ul>
        </ul>

        <h3>Information We Collect</h3>
        <p>We collect several types of information from and about users of our website, including information:</p>
        <ul>
            <li>By which you may be personally identified, such as name, postal address, e-mail address, or telephone number ("personal information").</li>
            <li>That is about you but individually does not identify you, such as your preferences.</li>
            <li>About your internet connection, the equipment you use to access our website, and usage details.</li>
        </ul>

        <h3>Disclosure of Your Information</h3>
        <p>We may disclose aggregated information about our users, and information that does not identify any individual, without restriction.</p>

        <h3>Data Security</h3>
        <p>We have implemented measures designed to secure your personal information from accidental loss and from unauthorized access, use, alteration, and disclosure.</p>

        <h3>Changes to Our Privacy Policy</h3>
        <p>It is our policy to post any changes we make to our privacy policy on this page.</p>

        <h3>Contact Information</h3>
        <p>To ask questions or comment about this privacy policy and our privacy practices, contact us at <code>info@hikalproperties.ae</code>.</p>
    </div>

    @include('../real_estate.include_bottom')

{{-- </body>

</html> --}}
