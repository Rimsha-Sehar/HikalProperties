<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">

	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<meta name="description" content="Creativeitem Software Installation" />
	<meta name="author" content="Creativeitem" />
	<title>{{ __('Installation').' | '.__('Locus') }}</title>
	
	<!-- CSRF Token for ajax for submission -->
    <meta name="csrf_token" content="{{ csrf_token() }}" />

    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
    <link rel="shortcut icon" href="{{asset('storage/logo/favicon/favicon.png')}}" />
    <!-- CSS Library -->
    <link rel="stylesheet" href="{{asset('public/assets/global/css/all.min.css')}}">
    <link rel="stylesheet" href="{{asset('public/assets/global/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('public/assets/global/css/style.css')}}">
    <script src="{{ asset('public/assets/global/js/jquery-3.7.1.min.js') }}"></script>

<!-- Google Tag Manager -->
<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
    new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
    j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
    'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
    })(window,document,'script','dataLayer','GTM-WMK8LXSJ');</script>
    <!-- End Google Tag Manager -->
</head>
<body class="page-body">
<!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-WMK8LXSJ"
    height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
    <!-- End Google Tag Manager (noscript) -->
<div class="page-container horizontal-menu">

	<header class="navbar navbar-fixed-top ins-one bg-dark">
		<div class="container">
			<div class="navbar-inner">
				<!-- logo -->
				<div class="navbar-brand">
					<a href="#">
						<img width="130px" src="{{ asset('storage') }}/logo/light_logo.png" alt="">
					</a>
				</div>
			</div>
		</div>
	</header>
	<div class="main_content py-4">
		@yield('content')
	</div>

	<!--Javascript
    ========================================================-->
    <script src="{{asset('public/assets/global/js/bootstrap.bundle.min.js')}}"></script>

</body>
</html>
