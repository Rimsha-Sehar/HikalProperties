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