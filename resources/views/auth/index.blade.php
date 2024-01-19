<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    @include('global.seo')

    @include('customer.include_top')

    <!-- Custom css -->
    <link rel="stylesheet" type="text/css" href="{{ asset('public/assets/global/css/custom-auth.css') }}" />
<!-- Google Tag Manager -->
<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
    new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
    j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
    'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
    })(window,document,'script','dataLayer','GTM-WMK8LXSJ');</script>
    <!-- End Google Tag Manager -->
</head>
<body>
<!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-WMK8LXSJ"
    height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
    <!-- End Google Tag Manager (noscript) -->
    <!-- Header Area Start -->
    @include('global.header')
    <!-- Header Area End   -->

    <!-- Body Area Start   -->
    @yield('content')
    <!-- Body Area End   -->

    <!-- Bottom Area Start -->
    @include('global.footer')
    <!-- Bottom Area End   -->

    @include('customer.include_bottom')

</body>
</html>
