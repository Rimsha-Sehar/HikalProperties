<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="x-ua-compatible" content="ie=edge" />
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>{{ get_phrase('Customer') }} | {{ get_phrase('Panel') }}</title>
	<meta name="csrf-token" content="{{ csrf_token() }}">


	@include('customer.include_top')

</head>
<body>
    <header class="header-area">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-4 col-sm-4 col-4 col-lg-2">
                    <!-- Logo Area Start -->
                    <div class="logo">
                        @if (get_frontend_settings('dark_logo'))
                            <a href="{{ route('home') }}"><img
                                    src="{{ asset('public/assets/uploads/logo/' . get_frontend_settings('dark_logo')) }}"
                                    alt="Logo Image"></a>
                        @else
                            <a href="{{ route('home') }}"><img
                                    src="{{ asset('public/assets/global/images/logo/hikal-logo.png') }}"
                                    alt="Logo Image"></a>
                        @endif
                    </div>
                    <!-- Logo Area End   -->
                </div>
                <div class="col-md-8 col-lg-7 menu-items">
                    <!-- Header Menu Start -->
                    <nav class="header-menu">
                        <ul class="primary-menu">
                            <li class="{{ request()->is('/') ? 'active' : '' }}"><a
                                    href="{{ route('home') }}">{{ get_phrase('Home') }}</a></li>
                            <li class="{{ request()->is('listings') ? 'active' : '' }}"><a
                                    href="{{ route('realeStateListings') }}">{{ get_phrase('Listing') }}</a></li>
                            <li class="{{ request()->is('pricing') ? 'active' : '' }}"><a
                                    href="{{ route('subscriptionPackages') }}">{{ get_phrase('Pricing') }}</a></li>
                            @if (get_frontend_settings('blog_visibility_on_home_page') == 1)
                                <li class="{{ request()->is('blog') ? 'active' : '' }}"><a
                                        href="{{ route('blogGrid') }}">{{ get_phrase('Blog') }}</a></li>
                            @endif
                            <li class="{{ request()->is('contact') ? 'active' : '' }}"><a
                                    href="{{ route('contactUs') }}">{{ get_phrase('Contact') }}</a></li>
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
                                        $profileRoute = auth()->user()->role == 'admin' ? route('admin.profile') : route('customerAccount');
                                    @endphp
                                    @if (auth()->user()->role == 'admin')
                                        <li><a class="dropdown-item" href="{{ route('admin.dashboard') }}"><i
                                                    class="fa-solid fa-user"></i> {{ get_phrase('Dashboard') }}</a></li>
                                    @endif
                                    <li><a class="dropdown-item" href="{{ $profileRoute }}"><i
                                                class="fa-solid fa-user"></i> {{ get_phrase('Profile') }}</a></li>
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
                        @if (!auth()->user() || auth()->user()->role != 'admin')
                            @if (auth()->user() && auth()->user()->is_agent == 1)
                                <a class="listing-btn" href="{{ route('add_listings_view', ['type' => 1]) }}">+
                                    {{ get_phrase('Add Listing') }}</a>
                            @else
                                <a class="listing-btn" href="{{ route('becomeAnAgentFor') }}">+
                                    {{ get_phrase('Add Listing') }}</a>
                            @endif
                        @endif


                        <span class="toggle-icon"><i class="fa-solid fa-bars"></i></span>
                        <span class="crose-icon"><i class="fa-solid fa-xmark"></i></span>
                    </div>
                    <!-- Header Button End -->
                </div>

            </div>
        </div>
    </header>

    @php

	use App\Models\Listing_type;
	$listing_types=Listing_type::all();
	isset($current_route) ? "" : $current_route ="empty";

	@endphp

	<!-- Start Breadcrumb -->
    <section class="breadcrumb-section">
        <div class="container">
          <div class="row justify-content-center">
            <div class="col-md-9 offset-lg-3">
              <div
                class="breadcrumb-title-2 d-flex justify-content-between align-items-center">
                <h3 class="fz-34-sb-white">{{ $navigation_name }}</h3>


              </div>
            </div>
          </div>
        </div>
    </section>
    <!-- End Breadcrumb -->


    <section class="locus-section">
        <div class="container">
          <div class="locus-section-wrap">
            <div class="row justify-content-center">

                @include('customer.navigation')
                @yield('customerRightPanel')

            </div>
        </div>
      </div>
    </section>


    @include('customer.include_bottom')

    @include('modal')


    @yield('booking_page_modal')

    <script type="text/javascript">

    	"use strict";

        function redirect_current_route(listing_type_id,current_route)
        {

            var check_route='{{ $current_route }}';

            if(check_route!="")
            {
                var route=current_route;
                url=route.slice(0, -1)+listing_type_id;
                window.location.href = url;

            }


        }

    </script>

    <script type="text/javascript">

    	"use strict";

        jQuery(document).ready(function(){
	        $('input[name="datetimes"]').daterangepicker({
	            timePicker: true,
	            startDate: moment().startOf('day').subtract(30, 'day'),
	            endDate: moment().startOf('day'),
	            locale: {
	           format: 'M/DD/YYYY '
	          }

	        });
	    });

	    function checkRequiredFields() {
			var pass = 1;
			$('form.required-form').find('input, select, radio').each(function() {
				if($(this).prop('required')){
					if ($(this).val() === "") {
						pass = 0;
					}
				}
			});

			if (pass === 1) {
				$('form.required-form').submit();
			} else {
				toastr.error("Please fill all the required rield!");
			}

		}

    </script>


    <script type="text/javascript">

    	"use strict";

		// Select2 js
		$(document).ready(function () {
			$(".eChoice-multiple-without-remove").select2({
				placeholder: "Select a state",
			});
		});
		$(document).ready(function () {
			$(".eChoice-multiple-with-remove").select2();
		});
		// For country
		function format(item, state) {
			if (!item.id) {
				return item.text;
			}
			var countryUrl = "https://hatscripts.github.io/circle-flags/flags/";
			var stateUrl = "https://oxguy3.github.io/flags/svg/us/";
			var url = state ? stateUrl : countryUrl;
			var img = $("<img>", {
				class: "img-flag",
				width: 26,
				src: url + item.element.value.toLowerCase() + ".svg",
			});
			var span = $("<span>", {
				text: " " + item.text,
			});
			span.prepend(img);
			return span;
		}

		$(document).ready(function () {
		    $("#countries").select2({
		      templateResult: function (item) {
		        return format(item, false);
		      },
		    });
		    $("#us-states").select2({
		      templateResult: function (item) {
		        return format(item, true);
		      },
		    });
		});


    </script>

     @yield('customerjs')

</body>
</html>
