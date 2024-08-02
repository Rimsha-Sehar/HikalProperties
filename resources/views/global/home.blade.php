<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick-theme.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.js"></script>

    @include('global.seo')

    @include('global.include_top')

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
        })(window, document, 'script', 'dataLayer', 'GTM-WMK8LXSJ');
    </script>
    <!-- End Google Tag Manager -->

</head>
<style>
    .hidden-text {
        display: none;
    }
</style>
<style>
    .new_antrygallary {
     background: linear-gradient(135deg, #000000, #ff4b2b); /* Black to red gradient */
     padding: 50px 0; /* Add padding for spacing */
     color: #fff; /* White text color for better contrast */
 }

 /* Slider container */
 .slider {
     margin: 0 auto;
     padding: 20px;
 }

 /* Slider item spacing */
 .slider .col-md-4 {
     margin: 0 15px;
 }

 /* Product entry styling */
 .slider .product-entry {
     border-radius: 10px;
     overflow: hidden;
     background-color: #fff; /* White background for items */
     box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
     transition: transform 0.3s ease, box-shadow 0.3s ease;
 }

 .slider .product-entry:hover {
     transform: scale(1.05);
     box-shadow: 0 6px 12px rgba(0, 0, 0, 0.2);
 }

 /* Product image styling */
 .slider .product-img {
     position: relative;
     overflow: hidden;
 }

 .slider .product-img img {
     width: 100%;
     height: 250px; /* Set a fixed height */
     object-fit: cover; /* Maintain aspect ratio */
     display: block;
     transition: transform 0.3s ease;
 }

 .slider .product-img:hover img {
     transform: scale(1.1);
 }

 /* Section intro styling */
 .slider .section-intro {
     text-align: center;
     margin-bottom: 30px;
 }

 .slider .section-intro p {
     font-size: 1.2rem;
     color: #fff; /* White text color */
 }

 .slider .section-intro h4 {
     font-size: 1.8rem;
     color: #fff; /* White text color */
 }

 /* Slick slider controls */
 .slick-dots {
     bottom: 10px;
 }

 .slick-prev, .slick-next {
     color: #fff; /* White arrows */
 }

 .slick-prev:hover, .slick-next:hover {
     color: #000; /* Black arrows on hover */
 }

 .slick-slide {
     padding: 0 10px;
 }

 .slick-track {
     display: flex;
 }

 /* Mobile responsiveness */
 @media (max-width: 992px) {
        .slider .col-md-4 {
            margin: 0 10px; /* Adjust spacing for medium screens */
        }

        .slider .section-intro p {
            font-size: 1rem; /* Adjust font size for paragraph */
        }

        .slider .section-intro h4 {
            font-size: 1.5rem; /* Adjust font size for heading */
        }
    }

    @media (max-width: 768px) {
        .slider .col-md-4 {
            margin: 0 5px; /* Adjust spacing for small screens */
        }

        .slider .section-intro p {
            font-size: 0.9rem; /* Adjust font size for paragraph */
        }

        .slider .section-intro h4 {
            font-size: 1.2rem; /* Adjust font size for heading */
        }
    }

    @media (max-width: 576px) {
        .slider .section-intro p {
            font-size: 0.8rem; /* Further adjust font size for very small screens */
        }

        .slider .section-intro h4 {
            font-size: 1rem; /* Further adjust font size for heading */
        }
    }
</style>
@php
    $banner_image = asset('public/assets/uploads/bannar/' . get_frontend_settings('bannar'));
    if (!file_exists($banner_image)) {
        $banner_image = asset('public/assets/global/images/apartmwent.webp');
    }

@endphp

<body>

    <!-- Google Tag Manager (noscript) -->
    <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-WMK8LXSJ" height="0" width="0"
            style="display:none;visibility:hidden"></iframe></noscript>
    <!-- End Google Tag Manager (noscript) -->
    <div class="entry_header_control" style="background-image: url({{ $banner_image }}); ">
        <!-- Header Top Area Start -->
        <div class="header_new">
            <div class="container">
                <div class="row">
                    <div class="col-md-8 col-lg-8 col-sm-8 col-12">
                        <div class="new_header_left">
                            <ul class="d-flex align-items-center">
                                <li><a href="#"><i class="fa-solid fa-phone"></i>+971 54 433 5041</a></li>
                                <li><a href="#"><i class="fa-solid fa-envelope"></i>info@hikalagency.ae</a></li>

                                {{-- <li><a href="#"><svg class="text-center"
                                        fill="#ffffff" version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg"
                                        xmlns:xlink="http://www.w3.org/1999/xlink" width="16px" height="16px"
                                        viewBox="0 0 395.71 395.71" xml:space="preserve" stroke="#ffffff">

                                        <g id="SVGRepo_bgCarrier" stroke-width="0" />

                                        <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round" />

                                        <g id="SVGRepo_iconCarrier">
                                            <g>
                                                <path
                                                    d="M197.849,0C122.131,0,60.531,61.609,60.531,137.329c0,72.887,124.591,243.177,129.896,250.388l4.951,6.738 c0.579,0.792,1.501,1.255,2.471,1.255c0.985,0,1.901-0.463,2.486-1.255l4.948-6.738c5.308-7.211,129.896-177.501,129.896-250.388 C335.179,61.609,273.569,0,197.849,0z M197.849,88.138c27.13,0,49.191,22.062,49.191,49.191c0,27.115-22.062,49.191-49.191,49.191 c-27.114,0-49.191-22.076-49.191-49.191C148.658,110.2,170.734,88.138,197.849,88.138z" />
                                            </g>
                                        </g>

                                    </svg>
                                    {{ get_settings('address') }}</a></li> --}}
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-4 col-lg-4 col-sm-4 col-12">
                        <div class="new_header_right">
                            <ul class="d-flex align-items-center">
                                <li><a href="{{ get_frontend_settings('facebook_link') }}" target="_blank"><i
                                            class="fa-brands fa-facebook-f"></i></a></li>
                                <li><a href="{{ get_frontend_settings('twitter_link') }}" target="_blank"><i
                                            class="fa-brands fa-twitter"></i></a></li>
                                <li><a href="{{ get_frontend_settings('linkedin_link') }}" target="_blank"><i
                                            class="fa-brands fa-linkedin-in"></i></a></li>
                                <li><a href="{{ get_frontend_settings('instagram_link') }}" target="_blank"><i
                                            class="fa-brands fa-instagram"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Header Top Area  End -->

        <!--  Header Area Start -->
        <header class="header-area global_header">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-md-4 col-sm-4 col-4 col-lg-2">
                        <!-- Logo Area Start -->
                        <div class="logo">
                            @if (get_frontend_settings('light_logo'))
                                <a href="{{ route('home') }}"><img
                                        src="{{ asset('public/assets/uploads/logo/' . get_frontend_settings('light_logo')) }}"
                                        alt="Logo Image"></a>
                            @else
                                <a href="{{ route('home') }}"><img
                                        src="{{ asset('public/assets/global/images/logo/light_logo.png') }}"
                                        alt="Logo Image" height="50px"></a>
                            @endif
                        </div>
                        <!-- Logo Area End   -->
                    </div>
                    <div class="col-md-8 col-lg-7 menu-items">
                        <!-- Header Menu Start -->
                        <nav class="header-menu">
                            <ul class="primary-menu">
                                <li class="{{ request()->is('/') ? 'homeactive' : '' }}"><a
                                        href="{{ route('home') }}">{{ get_phrase('Home') }}</a></li>

                                <li><a href="{{ route('realeStateListings') }}">{{ get_phrase('Listing') }}</a></li>

                                {{-- <li><a href="{{ route('subscriptionPackages') }}">{{ get_phrase('Pricing') }}</a></li> --}}
                                @if (get_frontend_settings('blog_visibility_on_home_page') == 1)
                                    <li><a href="{{ route('blogGrid') }}">{{ get_phrase('Blog') }}</a></li>
                                @endif
                                <li><a href="{{ route('contactUs') }}">{{ get_phrase('Contact') }}</a></li>
                            </ul>
                        </nav>
                        <!-- Header Menu End -->
                    </div>

                    <div class="col-md-8 col-sm-8 col-8 col-lg-3">
                        <!-- Header Button Start -->
                        <div class="header-btn">
                            @if (Auth::check())
                                <!-- User Profile Start -->
                                <div class="user-profile">
                                    <button class="us-btn dropdown-toggle" type="button" data-bs-toggle="dropdown"
                                        aria-expanded="false">
                                        <img src="{{ get_user_image(auth()->user()->id) }}" alt="user-img">
                                    </button>
                                    <ul class="dropdown-menu dropmenu-end">
                                        @php
                                            $profileRoute =
                                                auth()->user()->role == 'admin'
                                                    ? route('admin.profile')
                                                    : route('customerAccount');
                                        @endphp
                                        @if (auth()->user()->role == 'admin')
                                            <li><a class="dropdown-item" href="{{ route('admin.dashboard') }}"><i
                                                        class="fa-solid fa-user"></i> {{ get_phrase('Dashboard') }}</a>
                                            </li>
                                        @endif
                                        @hasanyrole('Manager|Agent')
                                            <li><a class="dropdown-item" href="{{ $profileRoute }}"><i
                                                        class="fa-solid fa-user"></i> {{ get_phrase('Profile') }}</a></li>
                                        @endhasanyrole
                                        <li>
                                            <a class="dropdown-item" href="{{ route('logout') }}"
                                                onclick="event.preventDefault();document.getElementById('logout-form').submit();"><i
                                                    class="fa-solid fa-arrow-right-from-bracket"></i>
                                                {{ get_phrase('Logout') }}</a>
                                            <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                                class="d-none">
                                                @csrf
                                            </form>
                                        </li>
                                    </ul>
                                </div>
                                <!-- User Profile End -->
                            @else
                                <a class="login-btn" href="{{ route('login') }}">{{ get_phrase('Login') }}</a>
                            @endif

                            {{-- @if (!auth()->user() || auth()->user()->role != 'admin')
                                @if (auth()->user() && auth()->user()->is_agent == 1)
                                    <a class="listing-btn" href="{{ route('add_listings_view', ['type' => 1]) }}">+
                                        {{ get_phrase('Add Listing') }}</a>
                                @else
                                    <a class="listing-btn" href="{{ route('becomeAnAgentFor') }}">+
                                        {{ get_phrase('Add Listing') }}</a>
                                @endif
                            @endif --}}


                            <span class="toggle-icon"><i class="fa-solid fa-bars"></i></span>
                            <span class="crose-icon"><i class="fa-solid fa-xmark"></i></span>
                        </div>
                        <!-- Header Button End -->
                    </div>

                </div>
            </div>
        </header>
        <!-- Header Area End   -->
        <!-- Bannar Area Start -->
        <section class="bannar-area bd_top">
            <div class="container">
                <div class="inner-col">
                    <div class="row">
                        <div class="col-lg-12 grow">
                            <div class="bannar-content text-center ">
                                <span class="wow fadeInUp" data-wow-duration="1000ms"
                                    data-wow-delay="600ms">{{ get_frontend_settings('website_hero_title') }}</span>
                                <?php
                                $banner_title = get_phrase(get_frontend_settings('website_title'));
                                $banner_title_arr = explode(' ', $banner_title);
                                ?>
                                <h2 class="wow fadeInUp" data-wow-duration="1000" data-wow-delay="500">
                                    <?php
                                    foreach ($banner_title_arr as $key => $value) {
                                        if ($key == count($banner_title_arr) - 1) {
                                            echo '<span class="last_text">' . $value . '</span>';
                                        }
                                        if ($key == count($banner_title_arr) - 6) {
                                            echo '<span class="last_text">' . $value . '</span>';
                                        } else {
                                            echo $value . ' ';
                                        }
                                    }
                                    ?></h2>
                                <p class="wow fadeInUp" data-wow-duration="1000ms" data-wow-delay="400ms">
                                    {{ get_frontend_settings('website_subtitle') }}.</p>
                            </div>
                            <!-- Bannar Search -->
                            <div class="bannar_drop wow fadeInUp" data-wow-duration="1000ms" data-wow-delay="600ms">
                                <form action="{{ route('realeStateListingsFilter') }}" class="bannar-search"
                                    method="get">
                                    <div class="row align-items-center">
                                        <div class="col-lg-3 col-md-6 ban-col res-mb-20 ">
                                            <div class="single-search">
                                                <span>
                                                    <svg width="22" height="29" viewBox="0 0 22 29"
                                                        fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <path
                                                            d="M20.8481 6.48246L15.5076 1.43002C14.9395 0.892608 14.196 0.59668 13.4141 0.59668H3.24644C1.56674 0.59668 0.200195 1.96322 0.200195 3.64292V25.9082C0.200195 27.5879 1.56674 28.9544 3.24644 28.9544H18.7546C20.4343 28.9544 21.8008 27.5879 21.8008 25.9082V8.69536C21.8008 7.86185 21.4535 7.05526 20.8481 6.48246ZM19.2343 7.24302H15.0991C14.9464 7.24302 14.8222 7.11879 14.8222 6.96609V3.0689L19.2343 7.24302ZM18.7546 27.2928H3.24644C2.48294 27.2928 1.86178 26.6717 1.86178 25.9082V3.64292C1.86178 2.87942 2.48294 2.25827 3.24644 2.25827H13.1606V6.96609C13.1606 8.03499 14.0302 8.90461 15.0991 8.90461H20.1392V25.9082C20.1392 26.6717 19.5181 27.2928 18.7546 27.2928Z"
                                                            fill="#da1f26" />
                                                        <path
                                                            d="M16.9259 11.6738H4.74095C4.28213 11.6738 3.91016 12.0458 3.91016 12.5046C3.91016 12.9634 4.28213 13.3354 4.74095 13.3354H16.9259C17.3847 13.3354 17.7567 12.9634 17.7567 12.5046C17.7567 12.0458 17.3847 11.6738 16.9259 11.6738Z"
                                                            fill="#da1f26" />
                                                        <path
                                                            d="M16.9259 16.1047H4.74095C4.28213 16.1047 3.91016 16.4767 3.91016 16.9355C3.91016 17.3943 4.28213 17.7663 4.74095 17.7663H16.9259C17.3847 17.7663 17.7567 17.3943 17.7567 16.9355C17.7567 16.4767 17.3847 16.1047 16.9259 16.1047Z"
                                                            fill="#da1f26" />
                                                        <path
                                                            d="M8.76863 20.5356H4.74095C4.28213 20.5356 3.91016 20.9076 3.91016 21.3664C3.91016 21.8253 4.28213 22.1972 4.74095 22.1972H8.76863C9.22745 22.1972 9.59943 21.8253 9.59943 21.3664C9.59943 20.9076 9.22745 20.5356 8.76863 20.5356Z"
                                                            fill="#da1f26" />
                                                    </svg>
                                                </span>
                                                <div>
                                                    <select name="searched_category"
                                                        class="form-select nice-control cate" aria-label=""
                                                        style="display: none;">
                                                        <option value="commercial">Commercial
                                                        </option>
                                                        <option value="townhouses">Townhouses
                                                        </option>
                                                        <option value="residential">Residential
                                                        </option>
                                                        <option value="apartments">Apartments
                                                        </option>

                                                    </select>
                                                    <div class="nice-select form-select nice-control cate"
                                                        tabindex="0"><span class="current">Commercial
                                                        </span>
                                                        <ul class="list">
                                                            <li data-value="commercial" class="option selected">
                                                                Commercial
                                                            </li>
                                                            <li data-value="townhouses" class="option">Townhouses
                                                            </li>
                                                            <li data-value="residential" class="option">Residential
                                                            </li>
                                                            <li data-value="apartments" class="option">Apartments
                                                            </li>
                                                        </ul>
                                                    </div>
                                                    <p>Choose Type</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-3 col-md-6 ban-col res-mb-20">
                                            <div class="single-search">
                                                <span>
                                                    <svg width="28" height="29" viewBox="0 0 28 29"
                                                        fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <g clip-path="url(#clip0_147_73)">
                                                            <path
                                                                d="M22.1382 4.3957C19.9337 2.19114 17.0026 0.977051 13.8849 0.977051C10.7672 0.977051 7.83604 2.19114 5.63154 4.3957C3.42698 6.60031 2.21289 9.53138 2.21289 12.649C2.21289 18.9559 8.17625 24.2017 11.38 27.0199C11.8252 27.4116 12.2097 27.7498 12.516 28.0359C12.8998 28.3944 13.3924 28.5736 13.8848 28.5736C14.3774 28.5736 14.8699 28.3944 15.2537 28.0359C15.56 27.7497 15.9445 27.4116 16.3897 27.0199C19.5935 24.2017 25.5568 18.9559 25.5568 12.649C25.5568 9.53138 24.3427 6.60031 22.1382 4.3957ZM15.322 25.8062C14.867 26.2064 14.4741 26.5521 14.1502 26.8546C14.0014 26.9935 13.7683 26.9936 13.6194 26.8546C13.2955 26.552 12.9026 26.2064 12.4477 25.8062C9.43573 23.1567 3.82935 18.2249 3.82935 12.649C3.82935 7.10449 8.34016 2.59367 13.8848 2.59367C19.4293 2.59367 23.9402 7.10449 23.9402 12.649C23.9402 18.2249 18.3339 23.1567 15.322 25.8062Z"
                                                                fill="#da1f26" />
                                                            <path
                                                                d="M13.8849 7.06421C11.0487 7.06421 8.74121 9.3716 8.74121 12.2079C8.74121 15.0441 11.0487 17.3515 13.8849 17.3515C16.7212 17.3515 19.0286 15.0441 19.0286 12.2079C19.0286 9.3716 16.7212 7.06421 13.8849 7.06421ZM13.8849 15.7349C11.9401 15.7349 10.3578 14.1526 10.3578 12.2078C10.3578 10.263 11.9401 8.68072 13.8849 8.68072C15.8298 8.68072 17.412 10.263 17.412 12.2078C17.412 14.1526 15.8298 15.7349 13.8849 15.7349Z"
                                                                fill="#da1f26" />
                                                        </g>
                                                        <defs>
                                                            <clipPath id="clip0_147_73">
                                                                <rect width="27.5966" height="27.5966" fill="white"
                                                                    transform="translate(0.0859375 0.977051)" />
                                                            </clipPath>
                                                        </defs>
                                                    </svg>
                                                </span>
                                                <div>
                                                    <select name="searched_cities"
                                                        class="form-select nice-control cate_city" aria-label="">
                                                        <option value="">{{ get_phrase('Location') }}</option>


                                                    </select>
                                                    <p>{{ get_phrase('Choose your location') }}</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-3 col-md-6  res-mb-20 ">
                                            <div class="single-search">
                                                <span>
                                                    <svg width="29" height="32" viewBox="0 0 29 32"
                                                        fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <path
                                                            d="M21.5893 13.6897V7.80732C21.5893 7.63895 21.5116 7.48338 21.4015 7.3603L14.8065 0.434992C14.6835 0.305511 14.5085 0.234131 14.3337 0.234131H3.87753C1.94718 0.234131 0.405273 1.80829 0.405273 3.73888V23.5107C0.405273 25.4413 1.94718 26.9896 3.87753 26.9896H12.1311C13.6922 29.5809 16.5299 31.3171 19.7624 31.3171C24.6729 31.3171 28.683 27.3264 28.683 22.4095C28.6897 18.1143 25.6058 14.5254 21.5893 13.6897ZM14.9816 2.5081L19.4062 7.16585H16.5363C15.6811 7.16585 14.9816 6.45987 14.9816 5.60473V2.5081ZM3.87753 25.6939C2.6662 25.6939 1.70103 24.7221 1.70103 23.5107V3.73888C1.70103 2.52091 2.6662 1.52988 3.87753 1.52988H13.6858V5.60473C13.6858 7.17889 14.9621 8.4616 16.5363 8.4616H20.2936V13.5211C20.0994 13.5147 19.9438 13.4952 19.7754 13.4952C17.5145 13.4952 15.435 14.3634 13.8672 15.7239H5.63975C5.28332 15.7239 4.99187 16.0153 4.99187 16.3715C4.99187 16.728 5.28332 17.0194 5.63975 17.0194H12.6623C12.2022 17.6673 11.82 18.3152 11.5221 19.0278H5.63975C5.28332 19.0278 4.99187 19.3192 4.99187 19.6757C4.99187 20.0318 5.28332 20.3235 5.63975 20.3235H11.1009C10.939 20.9714 10.8548 21.6904 10.8548 22.4095C10.8548 23.5755 11.0815 24.7287 11.4896 25.7005H3.87753V25.6939ZM19.769 30.0279C15.5711 30.0279 12.1569 26.6138 12.1569 22.4159C12.1569 18.2179 15.5645 14.8038 19.769 14.8038C23.9733 14.8038 27.3809 18.2179 27.3809 22.4159C27.3809 26.6138 23.9669 30.0279 19.769 30.0279Z"
                                                            fill="#da1f26" />
                                                        <path
                                                            d="M5.63909 13.7738H12.2016C12.558 13.7738 12.8494 13.4821 12.8494 13.1259C12.8494 12.7695 12.558 12.478 12.2016 12.478H5.63909C5.28266 12.478 4.99121 12.7695 4.99121 13.1259C4.99121 13.4821 5.28266 13.7738 5.63909 13.7738Z"
                                                            fill="#da1f26" />
                                                        <path
                                                            d="M19.555 18.4191C19.6069 18.4319 19.6586 18.4385 19.7106 18.4385C19.7753 18.4385 19.8336 18.4319 19.892 18.4124C20.7471 18.4838 21.4144 19.1964 21.4144 20.0646C21.4144 20.4208 21.7059 20.7122 22.0621 20.7122C22.4185 20.7122 22.71 20.4208 22.71 20.0646C22.71 18.6394 21.6995 17.4472 20.3584 17.1686V16.7541C20.3584 16.3977 20.0668 16.1062 19.7106 16.1062C19.3541 16.1062 19.0627 16.3977 19.0627 16.7541V17.1947C17.7669 17.5056 16.8018 18.6783 16.8018 20.0646C16.8018 21.6971 18.1298 23.0187 19.7559 23.0187C20.6693 23.0187 21.4144 23.7636 21.4144 24.6771C21.4144 25.5905 20.6757 26.342 19.7559 26.342C18.8424 26.342 18.0975 25.5969 18.0975 24.6835C18.0975 24.3273 17.8058 24.0356 17.4496 24.0356C17.0932 24.0356 16.8018 24.3273 16.8018 24.6835C16.8018 26.0764 17.7669 27.2425 19.0627 27.5534V28.2207C19.0627 28.5771 19.3541 28.8686 19.7106 28.8686C20.0668 28.8686 20.3584 28.5771 20.3584 28.2207V27.5728C21.6995 27.2942 22.71 26.1023 22.71 24.6771C22.71 23.0446 21.382 21.723 19.7559 21.723C18.8424 21.723 18.0975 20.9778 18.0975 20.0646C18.0975 19.2223 18.7323 18.5163 19.555 18.4191Z"
                                                            fill="#da1f26" />
                                                    </svg>
                                                </span>
                                                <div>
                                                    <select id="searched_price" class="form-select nice-control"
                                                        aria-label="" onchange="updateHiddenFields()">
                                                        @php
                                                            $highestPrice =
                                                                ceil((App\Models\Listing::max('price') + 100) / 4) * 4;
                                                            $searched_price = $highestPrice;
                                                            $step =
                                                                $highestPrice % 4 === 0
                                                                    ? $highestPrice / 4
                                                                    : ceil($highestPrice / 4);
                                                            for ($i = 0; $i < $highestPrice; $i += $step) {
                                                                $startPrice = $i;
                                                                $endPrice = $i + $step - 1;
                                                                if ($endPrice > $highestPrice) {
                                                                    $endPrice = $highestPrice;
                                                                }
                                                                $priceRanges[] = "$startPrice - $endPrice";
                                                            }
                                                        @endphp
                                                        <option value="">{{ get_phrase('Pricing') }}</option>
                                                        @if (!empty($priceRanges))
                                                            @foreach ($priceRanges as $rangeLabel)
                                                                <option value="{{ $rangeLabel }}">
                                                                    {{ $rangeLabel }}
                                                                </option>
                                                            @endforeach
                                                        @else
                                                        @endif

                                                        <input type="hidden" id="min_price" name="min_price"
                                                            value="">
                                                        <input type="hidden" id="max_price" name="max_price"
                                                            value="">

                                                    </select>
                                                    <p>{{ get_phrase('Choose your budget') }}</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-3 col-md-6 res-mb-20 ">
                                            <div class="single-search">
                                                <button type="submit" class="main-btn w-100"><svg width="18"
                                                        height="17" viewBox="0 0 18 17" fill="none"
                                                        xmlns="http://www.w3.org/2000/svg">
                                                        <path
                                                            d="M16.2912 16.4088C16.123 16.3072 15.9632 16.1923 15.8134 16.065C14.7756 15.0382 13.7421 14.0068 12.7128 12.9709C12.6752 12.9283 12.6404 12.8832 12.6089 12.8359C11.2055 14.0087 9.40376 14.595 7.57892 14.4727C5.75407 14.3503 4.04675 13.5288 2.81248 12.1791C1.57821 10.8294 0.91213 9.05564 0.952942 7.22714C0.993755 5.39865 1.73831 3.65638 3.03157 2.36312C4.32483 1.06986 6.06711 0.325298 7.8956 0.284485C9.72409 0.243673 11.4979 0.909751 12.8475 2.14402C14.1972 3.37829 15.0188 5.08561 15.1411 6.91046C15.2635 8.73531 14.6772 10.537 13.5044 11.9404C13.5552 11.9762 13.6039 12.0149 13.6503 12.0562C14.6795 13.0837 15.7073 14.1129 16.7335 15.144C16.8607 15.2935 16.9757 15.453 17.0773 15.6209V15.9045C17.035 16.0203 16.968 16.1254 16.8809 16.2125C16.7938 16.2996 16.6887 16.3666 16.573 16.4088H16.2912ZM2.26135 7.35713C2.25685 8.50189 2.59187 9.62228 3.22405 10.5767C3.85623 11.531 4.75718 12.2766 5.81301 12.719C6.86883 13.1614 8.03213 13.2808 9.15582 13.0621C10.2795 12.8435 11.3132 12.2966 12.1261 11.4906C12.939 10.6845 13.4946 9.6556 13.7228 8.5338C13.951 7.41201 13.8415 6.24774 13.4081 5.18819C12.9747 4.12864 12.2369 3.22138 11.2879 2.58111C10.3389 1.94084 9.22141 1.59631 8.07665 1.59107C6.54123 1.58573 5.06644 2.18995 3.97612 3.27103C2.8858 4.35212 2.26907 5.82171 2.26135 7.35713Z"
                                                            fill="white" stroke="white" stroke-width="0.2" />
                                                    </svg>
                                                    {{ get_phrase('Explore from listing') }}</button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="building-area">
            <div class="container">
                <div class="row">
                    <div class="col-lg-3 col-md-6 col-sm-6 col-12 mb__20 wow fadeInUp" data-wow-duration="1000ms"
                        data-wow-delay="300ms"
                        style="visibility: visible; animation-duration: 1000ms; animation-delay: 300ms; animation-name: fadeInUp;">
                        <div class="single-building mr-14">
                            <span>
                                <img src="https://hikalproperties.com/public/uploads/real_estate/property-image/49995295.jpg"
                                    alt="">
                            </span>
                            <h4>Commercial</h4>

                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-6 col-12 mb__20 wow fadeInUp" data-wow-duration="1000ms"
                        data-wow-delay="300ms"
                        style="visibility: visible; animation-duration: 1000ms; animation-delay: 300ms; animation-name: fadeInUp;">
                        <div class="single-building mr-14">
                            <span>
                                <img src="https://hikalproperties.com/public/uploads/real_estate/property-image/175068319.jpg"
                                    alt="">
                            </span>
                            <h4>Townhouses</h4>

                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-6 col-12 mb__20 wow fadeInUp" data-wow-duration="1000ms"
                        data-wow-delay="300ms"
                        style="visibility: visible; animation-duration: 1000ms; animation-delay: 300ms; animation-name: fadeInUp;">
                        <div class="single-building mr-14">
                            <span>
                                <img src="https://hikalproperties.com/public/uploads/real_estate/property-image/230094714.jpg"
                                    alt="">
                            </span>
                            <h4>Residential</h4>

                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-6 col-12 mb__20 wow fadeInUp" data-wow-duration="1000ms"
                        data-wow-delay="300ms"
                        style="visibility: visible; animation-duration: 1000ms; animation-delay: 300ms; animation-name: fadeInUp;">
                        <div class="single-building mr-14">
                            <span>
                                <img src="https://hikalproperties.com/public/uploads/real_estate/property-image/654700776.jpg"
                                    alt="">
                            </span>
                            <h4>Apartments</h4>

                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Bannar Area End   -->
    </div>
    <!-- New City Gallary  Area Start   -->
    {{-- explore a neighborhood or city --}}

    <!-- Gallary Popup Modal  -->
  <section class="new_antrygallary wow fadeInUp" data-wow-duration="1000ms" data-wow-delay="600ms">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="section-intro">
                    <p>{{ get_phrase('Featured') }}</p>
                    <h4>{{ get_phrase('These are Our Featured Listings.') }}</h4>
                </div>
            </div>
        </div>
        <div class="slider">
            @forelse ($listings as $listing)
                @if (isset($listing))
                    @php
                        $name = $listing['listing_type']['name'] ?? $listing['title'];
                        $slug = Str::slug($name);
                        $slugWithId = $slug . '/' . $listing['id'];
                    @endphp
                    <div class="col-md-4 mb-20">
                        <a href="{{ route('singleListing', ['type' => $slug, 'id' => $listing['id']]) }}">
                            <div class="product-entry">
                                <div class="product-img">
                                    <span class="featured">{{ $listing['listing_attribute_type']['type'] ?? 'Residential' }}</span>
                                    @php
                                        $imageUrl = $listing['meta_tags_for_listings']['banner'] ??
                                            'https://via.placeholder.com/600x400?text=No+Image+Available';
                                    @endphp
                                    <img src="{{ $imageUrl }}" alt="Banner Image">
                                    <span id="grid_3" class="wishlist" onclick="wishlist_check('3'); return false;">
                                        <i class="fa-regular fa-heart"></i>
                                    </span>
                                </div>
                                <div class="product-details grid_list_p">
                                    <div class="list_price">
                                        <div>
                                            <div class="product-location d-flex mb-0">
                                                <div class="product-meta-item">
                                                    <img class="bed" src="https://hikalproperties.com/public/assets/real-estate/images/double.png" alt="">
                                                    <p>
                                                        {{ $listing['city'] ?? 'N/A' }},
                                                        {{ $listing['state'] ?? 'N/A' }},
                                                        {{ $listing['country'] ?? 'N/A' }}
                                                    </p>
                                                </div>
                                            </div>
                                            <h3 class="product-title mt-0 mb-0">{{ Str::limit($listing['title'], 45, '...') }}</h3>
                                        </div>
                                        <div class="antry_list_price">
                                            <div>
                                                <div class="item-price-1">
                                                    AED{{ $listing['listing_attribute_type']['price'] ?? '0' }}
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <p class="l_text">{{ Str::limit($listing['short_description'], 80, '...') }}</p>
                                    <div class="product-meta d-flex justify-content-between align-items-center">
                                        <div class="product-meta-item">
                                            <img class="bed" src="https://hikalproperties.com/public/assets/real-estate/images/double.png" alt="">
                                            <div><span class="number">{{ $listing['listing_attribute']['bedroom'] }}</span></div>
                                        </div>
                                        <div class="product-meta-item">
                                            <img class="bed" src="https://hikalproperties.com/public/assets/real-estate/images/double.png" alt="">
                                            <div><span class="number">{{ $listing['listing_attribute']['bathroom'] }}</span></div>
                                        </div>
                                        <div class="product-meta-item">
                                            <img class="bed" src="https://hikalproperties.com/public/assets/real-estate/images/double.png" alt="">
                                            <div><span class="number">{{ $listing['listing_attribute']['garage'] }}</span></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                @endif
            @empty
                <p>No Listing Found</p>
            @endforelse
        </div>
        <div class="text-center mt-5">
            <a href="{{ route('realeStateListings') }}" class="main-btn gallary_btn">See More Property</a>
        </div>
    </div>
</section>


    <!-- New City Gallary  Area  End   -->


    <!-- Hero  Area Start  -->
    <section class="hero-area wow fadeInUp"  data-wow-duration="1000ms" data-wow-delay="700ms"
        style="background-image: url({{ asset('public/assets/global/images/apartmwent.webp') }}); ">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 hero-icon-control">
                    <div class="hero-icon">
                        <a href="{{ get_frontend_settings('feature_video_url') }}" class="vedio-popup"
                            id="vedio-popup" data-autoplay="true" data-vbtype="video"><i
                                class="fa-solid fa-play"></i></a>
                    </div>
                </div>
                <div class="col-lg-9">
                    <div class="hero-content">
                        <a class="bussines-btn" href="#">{{ get_frontend_settings('feature_video_title') }}</a>
                        <h4>{{ get_frontend_settings('feature_video_subtitle') }}</h4>
                        <p>{{ get_frontend_settings('feature_video_description') }}</p>
                        <a href="{{ route('contactUs') }}" class="main-btn">{{ get_phrase('Contact Us') }}</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Hero  Area End   -->
    <!-- Testimonials  Area Start   -->
    {{-- <section class="testimonials-area section-padding wow fadeInUp" data-wow-duration="1000ms"
        data-wow-delay="700ms">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-intro">
                        <p>{{ get_phrase('REVIEWS') }}</p>
                        <h4>{{ get_phrase('What the people Thinks About Us.') }}</h4>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="testimonials-carousel owl-carousel owl-theme">

                    </div>
                </div>
            </div>
        </div>
    </section> --}}

    <!-- Testimonials  Area End   -->
    <!-- Pricing Plan  Area Start   -->
    {{-- <section class="pricing_plan wow fadeInUp mt-5" data-wow-duration="1000ms" data-wow-delay="700ms">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-intro mb-50">
                        <p>{{ get_frontend_settings('pricing_subtitle') }}</p>
                        <h4>{{ get_frontend_settings('pricing_title') }}</h4>
                    </div>
                </div>
            </div>
            <div class="row">
                @foreach ($packages as $package)
                    <div class="col-lg-4 col-md-6 col-sm-6 col-12 mb-3 wow fadeInUp" data-wow-duration="1000ms"
                        data-wow-delay="600ms">
                        <div class="card packageBox">
                            <div class="card-head">
                                <span class="price_icon">
                                    @if ($package->icon_type == 1)
                                        <svg viewBox="0 0 32 38" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M9.26815 37.1424L0.25662 13.5267C0.256271 13.4693 0.251891 13.4117 0.243517 13.3543C-0.155679 11.5151 0.237636 9.95007 1.43148 8.69069C1.75609 8.34859 2.17418 8.10516 2.54981 7.81641L23.2731 0.288628C23.3085 0.299009 23.3447 0.304553 23.3808 0.305122C24.9095 0.0920977 26.5913 1.86676 26.1032 3.69634C25.5602 5.72812 25.0873 7.78493 24.5726 9.82698C24.5179 10.0462 24.5633 10.1529 24.7464 10.2824C26.4964 11.4941 28.2362 12.7223 29.9856 13.9325C30.8599 14.5364 31.2605 15.3698 31.1938 16.4106C31.1272 17.4513 30.6191 18.1595 29.6747 18.5026C22.4627 21.1143 15.2532 23.7318 8.04618 26.3549L7.7134 26.4758L7.8694 26.8846C8.99868 29.844 10.1166 32.8066 11.2652 35.759C11.5533 36.5015 11.5384 37.1093 10.977 37.6118L10.5124 37.7806C10.2785 37.7894 10.0421 37.7355 9.82472 37.6241C9.60736 37.5126 9.416 37.347 9.26815 37.1424Z"
                                                fill="#da1f26" />
                                        </svg>
                                    @endif
                                    @if ($package->icon_type == 2)
                                        <svg width="33" height="26" viewBox="0 0 33 26" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M32.2388 5.20097L32.444 19.8006C32.3949 20.0541 32.3515 20.3084 32.2957 20.5604C31.6257 23.5679 29.0729 25.609 25.892 25.6701C24.0232 25.7063 22.1542 25.7201 20.2853 25.7451C16.0042 25.8023 11.7235 25.8877 7.44175 25.904C3.82701 25.9179 0.944267 23.1161 0.886595 19.5981C0.812865 15.0937 0.74956 10.5889 0.696679 6.08374C0.692461 5.83411 0.722469 5.58504 0.785908 5.34316C1.30349 3.4416 3.66842 2.79661 5.15169 4.16082C6.23617 5.15705 7.28976 6.18179 8.35799 7.1935C8.43561 7.26712 8.51811 7.33666 8.63235 7.4379C8.73117 7.32177 8.80392 7.22446 8.88917 7.13822C10.7221 5.30042 12.5554 3.46341 14.3889 1.62721C15.6248 0.388795 17.1611 0.369849 18.433 1.57311L24.1081 6.95631C24.1915 7.03547 24.2824 7.11454 24.3775 7.20077C24.4653 7.11932 24.5327 7.0574 24.5961 6.99393C25.6282 5.96136 26.6544 4.92324 27.6915 3.89622C28.4103 3.18415 29.2768 2.91164 30.2776 3.1696C31.2785 3.42756 31.9094 4.08626 32.1768 5.06693C32.193 5.11346 32.2138 5.15835 32.2388 5.20097Z"
                                                fill="#da1f26" />
                                        </svg>
                                    @endif
                                    @if ($package->icon_type == 3)
                                        <svg width="33" height="31" viewBox="0 0 33 31" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M32.2133 11.6225C31.9734 12.6241 31.5269 13.5675 30.901 14.3955C29.4141 16.35 27.9495 18.3204 26.4758 20.2844L19.8641 29.1001C18.1939 31.3271 15.0691 31.3416 13.3831 29.1331C9.5828 24.1457 5.78087 19.1593 1.97731 14.1741C1.42694 13.4554 1.0381 12.6318 0.836094 11.7568L9.04875 11.6957C9.57021 12.9843 10.0934 14.2782 10.6182 15.5774L15.3284 27.2559C15.663 28.0868 16.4156 28.4331 17.1588 28.1037C17.5504 27.9296 17.758 27.6137 17.9035 27.2352C18.8024 24.8942 19.7041 22.554 20.6085 20.2145C21.6806 17.4276 22.7548 14.6401 23.8313 11.852C23.8667 11.7598 23.9119 11.6699 23.9529 11.5648L32.2124 11.5033L32.2133 11.6225Z"
                                                fill="#da1f26" />
                                            <path
                                                d="M12.4112 0.155991C11.9547 1.36919 11.4993 2.58319 11.045 3.79797C10.4019 5.4879 9.75875 7.17543 9.12139 8.86692C9.0579 9.03615 8.98965 9.12143 8.78291 9.12217C6.19543 9.13423 3.60803 9.15668 1.02059 9.17434C0.938558 9.17495 0.861354 9.16432 0.76695 9.15703C0.913367 8.27242 1.26916 7.43322 1.80612 6.70596C2.98025 5.14804 4.16097 3.59327 5.37966 2.06701C6.20266 1.03397 7.32117 0.441802 8.647 0.238388C8.71629 0.223688 8.78463 0.20502 8.85167 0.18248L12.4112 0.155991Z"
                                                fill="#da1f26" />
                                            <path
                                                d="M23.8945 0.0707396C24.3368 0.183417 24.7887 0.26723 25.2181 0.414394C26.1231 0.722693 26.9135 1.28675 27.4885 2.03465C28.6835 3.56561 29.8714 5.10302 31.0523 6.64687C31.5745 7.32974 31.9419 8.11294 32.1303 8.94463L31.7808 8.94723C29.2746 8.96588 26.7683 8.98053 24.2622 9.00798C24.0226 9.00976 23.9114 8.95061 23.8227 8.72013C22.709 5.84173 21.5875 2.96713 20.458 0.0963135L23.8945 0.0707396Z"
                                                fill="#da1f26" />
                                            <path
                                                d="M17.6933 0.116847C17.7639 0.332263 17.8255 0.551745 17.9076 0.763877C18.939 3.40668 19.9715 6.04868 21.005 8.68987C21.0436 8.78876 21.0706 8.89253 21.1093 9.01301L11.8285 9.08207L15.2363 0.135132L17.6933 0.116847Z"
                                                fill="#da1f26" />
                                            <path
                                                d="M16.5484 23.2929L11.8584 11.6749L21.1285 11.6059C19.6221 15.5094 18.1195 19.4062 16.6207 23.2963L16.5484 23.2929Z"
                                                fill="#da1f26" />
                                        </svg>
                                    @endif
                                </span>
                                <h4>{{ $package->name }}</h4>
                                <p>{{ $package->description }}</p>
                            </div>
                            <div class="card-body">
                                <div class="Eprice">
                                    <h3>{{ $package->price }}</h3>
                                    <p>({{ currency() }})</p>
                                    <p>/ {{ $package->interval }}</p>
                                </div>
                                <ul class="packageFeatures">
                                    @php $service_list = json_decode($package->services); @endphp
                                    @foreach ($service_list as $service)
                                        <li>
                                            <svg width="23" height="21" viewBox="0 0 23 21" fill="none"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path
                                                    d="M10.3296 20.7221L0.560238 12.1574L9.30906 15.3444L22.8701 0.975588L10.3296 20.7221Z"
                                                    fill="#47CE85" />
                                            </svg>
                                            {{ $service }}
                                        </li>
                                    @endforeach
                                </ul>
                                @if (auth()->user() && auth()->user()->role == 'admin')
                                    <a href="javascript:;" onclick="purchase_package('<?= $package->id ?>')"
                                        class="packageSubs_btn">{{ get_phrase('Enroll Now') }}</a>
                                @else
                                    <a href="{{ route('paymentForSubscription', ['package_id' => $package->id]) }}"
                                        class="packageSubs_btn">{{ get_phrase('Enroll Now') }}</a>
                                @endif
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section> --}}
    <!-- Pricing Plan  Area End   -->
    <!-- Faq   Area Start    -->
    <section class="faq-area wow fadeInUp" data-wow-duration="1000ms" data-wow-delay="700ms">
        <div class="container">
            <div class="row">
                <div class="section-intro">
                    <h4>{{ get_frontend_settings('faq_title') }}</h4>
                </div>

                <div class="col-lg-12">
                    <div class="accordion_antry">
                        <div class="accordion" id="accordionExample">
                            @foreach ($faqs as $key => $faq)
                                <div class="accordion-item">
                                    <h2 class="accordion-header" id="headingOne{{ $key }}">
                                        <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                            data-bs-target="#collapseOne{{ $key }}" aria-expanded="true"
                                            aria-controls="collapseOne">{{ $faq->title }}</button>
                                    </h2>
                                    <div id="collapseOne{{ $key }}"
                                        class="accordion-collapse collapse {{ $key == 0 ? 'show' : '' }}"
                                        aria-labelledby="headingOne{{ $key }}"
                                        data-bs-parent="#accordionExample">
                                        <div class="accordion-body">
                                            <p>{{ $faq->description }}</p>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- FAQ  Area End   -->

    <script type="text/javascript">
        "use strict";

        function purchase_package(package_id) {
            // body...
            toastr.error("You do not have access to enroll.");
        }
    </script>
    <script type="text/javascript">
        "use strict";

        function updateHiddenFields() {
            var selectedValue = document.getElementById('searched_price').value;
            var parts = selectedValue.split('-');
            var minPrice = parseInt(parts[0].trim());
            var maxPrice = parseInt(parts[1].trim());
            document.getElementById('min_price').value = minPrice;
            document.getElementById('max_price').value = maxPrice;
        }
    </script>

    @if (Auth::check())
        <script>
            "use strict";

            function wishlist_check(listing_id, id) {
                let url = "{{ route('checkWishlist') }}";
                var list = '#list_' + id;
                var grid = '#grid_' + id;

                $.ajax({
                    url: url,
                    data: {
                        listing_id: listing_id
                    },
                    success: function(response) {

                        if (response == 1) {
                            $('#grid_' + id).html('<i class="fa-solid fa-heart"></i>');
                            $(list).addClass('active-color');
                            $(grid).addClass('active-color');
                            toastr.success("Item Add To Wishlist!");
                        } else if (response == 0) {
                            $('#grid_' + id).html('<i class="fa-regular fa-heart"></i>');
                            $(list).removeClass('active-color');
                            $(grid).removeClass('active-color');
                            toastr.error("Item Remove To Wishlist!");
                        }
                    }
                });
            }
        </script>
    @else
        <script type="text/javascript">
            "use strict";

            function wishlist_check(listing_id, id) {
                toastr.error("Please log in first");
            }
        </script>
    @endif


    <!-- Footer  Area Start   -->
    @include('global.footer')
    <!-- Footer Area End   -->

    <!-- Bottom Area Start -->
    @include('global.include_bottom')
    <!-- Bottom Area End   -->
    <script>
        $(document).ready(function(){
            $('.slider').slick({
                slidesToShow: 3,         // Number of slides to show
                slidesToScroll: 1,       // Number of slides to scroll at a time
                autoplay: true,          // Enable auto sliding
                autoplaySpeed: 3000,     // Slide change interval (3 seconds)
                dots: true,              // Show pagination dots
                arrows: true,            // Show navigation arrows
                responsive: [            // Responsive settings
                    {
                        breakpoint: 1024,
                        settings: {
                            slidesToShow: 2
                        }
                    },
                    {
                        breakpoint: 768,
                        settings: {
                            slidesToShow: 1
                        }
                    }
                ]
            });
        });
    </script>

</body>

</html>
