    <!-- Favicon -->
    {{-- @if(get_frontend_settings('favicon'))
    <link rel="icon" href="{{ asset('public/assets/uploads/logo/'.get_frontend_settings('favicon')) }}">
    @else --}}
    <link rel="icon" href="{{ asset('public/assets/global/images/logo/hikal-logo.png') }}">
    {{-- @endif --}}
    <!-- Fontawasome Css -->
    <link rel="stylesheet" href="{{ asset('public/assets/global/css/all.min.css') }}">
    <!-- Custome Icon -->
    <link rel="stylesheet" href="{{ asset('public/assets/global/font/flaticon_mycollection.css') }}">
    <!-- Owl Carousel Css -->
    <link rel="stylesheet" href="{{ asset('public/assets/global/css/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('public/assets/global/css/owl.theme.default.min.css') }}">
    <!-- Magnific Popup Css -->
    <link rel="stylesheet" href="{{ asset('public/assets/global/css/magnific-popup.css') }}">
    <!-- SLick Carousel Css -->
    <link rel="stylesheet" href="{{ asset('public/assets/global/css/slick.css') }}">
    <link rel="stylesheet" href="{{ asset('public/assets/global/css/slick-theme.css') }}">
    <!-- Nice Select Css -->
    <link rel="stylesheet" href="{{ asset('public/assets/global/css/nice-select.css') }}">
    <!-- Flatpiker Css -->
    <link rel="stylesheet" href="{{ asset('public/assets/global/css/flatpickr.min.css') }}">
    <link rel="stylesheet" href="{{ asset('public/assets/global/css/dark.css') }}">
    <!-- VenoBox Css -->
    <link rel="stylesheet" href="{{ asset('public/assets/global/css/venobox.min.css') }}">
    <!-- Animate Css -->
    <link rel="stylesheet" href="{{ asset('public/assets/global/css/animate.css') }}">
    <!-- Bootstrap Css -->
    <link rel="stylesheet" href="{{ asset('public/assets/global/css/bootstrap.min.css') }}">
    <!-- Main Css -->
    <link rel="stylesheet" href="{{ asset('public/assets/global/css/style.css') }}">
    <!-- Real Estate Custom New Css -->
    <link rel="stylesheet" href="{{ asset('public/assets/global/css/real_custom.css') }}">
    <!-- Responsive Css -->
    <link rel="stylesheet" href="{{ asset('public/assets/global/css/responsive.css') }}">
    <link rel="stylesheet" href="{{ asset('public/assets/global/css/jquery-ui.css') }}">
    <link rel="stylesheet" href="{{ asset('public/assets/global/css/plyr.css') }}">
    <!--Toaster css-->
    <link rel="stylesheet" type="text/css" href="{{ asset('public/assets/global/css/toastr.min.css') }}" />
    <!-- js -->
    <script src="{{ asset('public/assets/global/js/jquery-3.7.1.min.js') }}"></script>
    @if(get_settings('recaptcha_status')==1)
     <!-- Recaptcha -->
     <script type="application/javascript" src="{{ asset('public/assets/global/vendors/recaptcha/api.js') }}"></script>
    @endif

    <link rel="stylesheet" href="{{ asset('public/assets/global/css/mapbox-gl.css') }}">
    <link rel="stylesheet" href="{{ asset('public/assets/global/css/mapbox-gl-geocoder.css') }}">
    <script src="{{ asset('public/assets/global/js/mapbox-gl.js') }}"></script>
    <script src="{{ asset('public/assets/global/js/mapbox-gl-geocoder.min.js') }}"></script>
<script>
    // GTM - JAN 19, 2024 
(function(w, d, s, l, i){
    w[l] = w[l] || [];
    w[l].push({
        'gtm.start':new Date().getTime(),
        event:'gtm.js'
    });
    var f = d.getElementsByTagName(s)[0],
    j = d.createElement(s),
    dl = l != 'dataLayer' ? '&l=' + l : '';
    j.async = true;j.src = 'https://www.googletagmanager.com/gtm.js?id=' + i + dl;
    f.parentNode.insertBefore(j, f);
})(window, document, 'script', 'dataLayer', 'GTM-WMK8LXSJ');

// META - HEAD 
!function(f, b, e, v, n, t, s){
    if(f.fbq)
    return;
    n = f.fbq = function(){
        n.callMethod ? n.callMethod.apply(n, arguments) : n.queue.push(arguments)
    };
    if(!f._fbq)
    f._fbq = n;
    n.push = n;
    n.loaded =! 0;
    n.version = '2.0';
    n.queue = []; 
    t = b.createElement(e);
    t.async =! 0;
    t.src = v;
    s = b.getElementsByTagName(e)[0];
    s.parentNode.insertBefore(t, s)
}(window, document,'script', 'https://connect.facebook.net/en_US/fbevents.js');
fbq('init', '979060579385097');
fbq('track', 'PageView');

// TIKTOK - HEAD 
!function (w, d, t) {
    w.TiktokAnalyticsObject = t;
    var ttq = w[t] = w[t] || [];
    ttq.methods = ["page", "track", "identify", "instances", "debug", "on", "off", "once", "ready", "alias", "group", "enableCookie", "disableCookie"],
    ttq.setAndDefer = function(t, e) {
        t[e] = function() {
            t.push([e].concat(Array.prototype.slice.call(arguments,0)))
        }
    };
    for(var i = 0; i < ttq.methods.length; i++)ttq.setAndDefer(ttq, ttq.methods[i]);
        ttq.instance = function(t) {
        for(var e = ttq._i[t] || [], n = 0; n < ttq.methods.length; n++)ttq.setAndDefer(e, ttq.methods[n]);
            return e
    },
    ttq.load = function(e, n) {
        var i = "https://analytics.tiktok.com/i18n/pixel/events.js";
        ttq._i = ttq._i || {}, ttq._i[e] = [], ttq._i[e]._u = i, ttq._t = ttq._t || {}, ttq._t[e] =+ new Date, ttq._o = ttq._o || {}, ttq._o[e] = n || {};
        var o = document.createElement("script");
        o.type = "text/javascript", o.async =! 0, o.src = i + "?sdkid=" + e + "&lib=" + t;
        var a = document.getElementsByTagName("script")[0];
        a.parentNode.insertBefore(o, a)
    };
    ttq.load('CMB6ABRC77UDBRR1OQL0');
    ttq.page();
}(window, document, 'ttq');

// TWITTER - HEAD 
!function(e, t, n, s, u, a){
    e.twq || (
        s = e.twq = function(){
            s.exe ? s.exe.apply(s, arguments) : s.queue.push(arguments);
        },
        s.version = '1.1',
        s.queue = [],
        u = t.createElement(n),
        u.async =! 0,
        u.src = 'https://static.ads-twitter.com/uwt.js',
        a = t.getElementsByTagName(n)[0],
        a.parentNode.insertBefore(u,a)
    )
}(window, document, 'script');
twq('config', 'ohu9a');
</script>


