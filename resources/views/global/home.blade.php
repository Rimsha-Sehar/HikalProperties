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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

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
                               <li><a href="tel:+971585556605"><i class="fa-solid fa-phone"></i>+971 58 555 6605</a></li>
                                <li><a href="mailto:info@hikalproperties.ae"><i class="fa-solid fa-envelope"></i>info@hikalproperties.ae</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-4 col-lg-4 col-sm-4 col-12">
                        <div class="new_header_right">
                            <ul class="d-flex align-items-center">
                                <li><a href="https://www.facebook.com/hikalrealestate" target="_blank"><i
                                            class="fa-brands fa-facebook-f"></i></a></li>
                                <li><a href="https://www.tiktok.com/@hikalagency" target="_blank"><i
                                            class="fa-brands fa-tiktok"></i></a></li>
                                <li><a href="https://www.linkedin.com/company/hikal-properties" target="_blank"><i
                                            class="fa-brands fa-linkedin-in"></i></a></li>
                                <li><a href="https://www.instagram.com/hikalrealestate" target="_blank"><i
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
                                <form action="" class="bannar-search"
                                    method="get">
                                    <div class="row align-items-center">
                                        {{-- property type --}}
                                        <div class="col-lg-3 col-md-6 ban-col res-mb-20 ">
                                            <div class="single-search">
                                                <span>
                                                    <i class="fa-regular fa-building" aria-hidden="true" style="font-size:30px; color: #da1f26;"></i>
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
                                                    <p>Property Type</p>
                                                </div>
                                            </div>
                                        </div>
                                        {{-- property for --}}
                                        <div class="col-lg-3 col-md-6 ban-col res-mb-20 ">
                                            <div class="single-search">
                                                <span>
                                                    <i class="fa-regular fa-file-lines" aria-hidden="true" style="font-size:30px; color: #da1f26;"></i>
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
                                                    <p>Property For</p>
                                                </div>
                                            </div>
                                        </div>
                                        {{-- property location --}}
                                        <div class="col-lg-3 col-md-6 ban-col res-mb-20">
                                            <div class="single-search">
                                                <span>
                                                    <span>
                                                        <i class="fa-solid fa-location-dot" aria-hidden="true" style="font-size:30px; color: #da1f26;"></i>
                                                    </span>
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
                                                    <i class="fa-solid fa-location-dot" ></i>
                                                    <p style="width: 70%;">
                                                        {{ $listing['city']['name'] ?? 'N/A' }},
                                                        {{ $listing['state']['name'] ?? 'N/A' }},
                                                        {{ $listing['country']['name'] ?? 'N/A' }}
                                                    </p>
                                                </div>
                                            </div>
                                            <h3 class="product-title mt-0 mb-0" style="height: 50px; overflow: hidden; text-overflow: ellipsis; display: flex; align-items: center;">
                                                {{ Str::limit($listing['title'], 45, '...') }}
                                            </h3>

                                        </div>
                                        <div class="antry_list_price">
                                            <div>
                                                <div class="item-price-1">
                                                    AED{{ $listing['listing_attribute_type']['price'] ?? '0' }}
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                            <p class="l_text" style="height: 60px; overflow: hidden; text-overflow: ellipsis; display: flex; align-items: center;">
                                                {{ Str::limit($listing['short_description'], 80, '...') }}
                                            </p>

                                    <div class="product-meta d-flex justify-content-between align-items-center">
                                        <div class="product-meta-item">
                                                <i class="fa fa-bed" aria-hidden="true"></i>
                                            <div><span class="number">{{ $listing['listing_attribute']['bedroom'] }}</span></div>
                                        </div>
                                        <div class="product-meta-item">
                                                <i class="fa fa-bath" ></i>
                                            <div><span class="number">{{ $listing['listing_attribute']['bathroom'] }}</span></div>
                                        </div>
                                        <div class="product-meta-item">
                                            {{-- <i class="fa fa-garage"></i> --}}
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
    <section class="faq-area wow fadeInUp mt-5" data-wow-duration="1000ms" data-wow-delay="700ms">
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
