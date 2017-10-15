<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
	<head>
		<meta charset="utf-8">
		<title>@yield('title')</title>
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
		<meta name="referrer" content="always">
		<meta name="robots" content="all,index,follow">
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
		<meta name="author" content="Litepie">
		<meta name="keywords" content="Tutorial Laravel bahasa indonesia, Laravel tutorial bahasa indonesia
		, Litepie, Litepie Tutorial, Litepie Tutorial Laravel, Belajar PHP, Belajar php, Belajar CSS3, Belajar css3, Belajar css, Belajar JAVASCRIPT, Belajar javascript, Belajar BOOTSTRAP, Belajar Bootstrap, MySQL, Codeigniter, Laravel, Laravel Indonesia, Belajar Laravel Bahasa Indonesia, Belajar Codeigniter Bahasa Indonesia, laravel, php, framework, web, artisans, taylor otwell, css, javascript, js, cara membuat web, website, adsense, cara cepat, php indonesia, crud, crud laravel, crud laravel 5, belajar laravel 5, di laravel, dilaravel, di php, diphp, di css, dicss, di js, dijs, di javascript, dijavascript, vue js, download aplikasi php, download gratis, gratis, belajar laravel,@yield('keywords')">
		<meta name="description" content="@yield('meta_desc')">
		<!-- CSRF Token -->
		<meta name="csrf-token" content="{{ csrf_token() }}">
		{!! (count(setting('general.google_site_verification'))) ? setting('general.google_site_verification') : '' !!}
		<!-- Description, Keywords and Author -->
		<meta name="apple-mobile-web-app-title" content="{{ (count(setting('site.title'))) ? setting('site.title') : 'Litepie' }}">
		<meta name="application-name" content="{{ (count(setting('site.title'))) ? setting('site.title') : 'Litepie' }}">
		<meta name="theme-color" content="#24292e">
		<!-- FB -->
		<meta property="fb:app_id" content="210320139437352"/>
		<meta property="og:url" content="@yield('link')" />
		<meta property="og:type" content="website" />
		<meta property="og:site_name" content="{{ (count(setting('site.title'))) ? setting('site.title') : 'Litepie' }}" />
		<meta property="og:title" content="@yield('title')" />
		<meta property="og:description" content="@yield('meta_desc')" />
		<meta property="og:image" content="@yield('images')" />
		<!-- ICONS -->
		<link rel="apple-touch-icon" sizes="180x180" href="/apple-touch-icon.png">
		<link rel="icon" type="image/png" href="/favicon-32x32.png" sizes="32x32">
		<link rel="icon" type="image/png" href="/favicon-16x16.png" sizes="16x16">
		<link rel="manifest" href="/manifest.json">
		<link rel="mask-icon" href="/safari-pinned-tab.svg" color="#f33535">
		<!-- Main CSS -->
		<link href="{{ litepie_asset('css/litepie.com.min.css') }}" rel="stylesheet">
		<!-- Favicon -->
		<link rel="shortcut icon" href="{{ (count(setting('site.logo'))) ? asset('storage/' . setting('site.logo')) : '/pavicon.png' }}" />
		<script>
	      window.Laravel = @json([
	        'csrfToken' => csrf_token(),
	      ]);
	        var APP_URL= @json(URL('/'));
	    </script>
	    {!! (count(setting('site.google_analytics_tracking_id'))) ? setting('site.google_analytics_tracking_id') : '' !!}
	</head>
	<body>
		{!! (count(setting('general.facebook_sdk'))) ? setting('general.facebook_sdk') : '' !!}
		<div id="app">
			<div class="litepie-brand">
				<a href="{{ URL('/') }}" class="ui-btn bg-red">
					@if (empty(setting('site.logo')))
						<span style="font-size: 30px;font-weight: 700">litepie</span>
					@else
					<img src="{{ (count(setting('site.logo'))) ? asset('storage/' . setting('site.logo')) : '/pavicon.png' }}">
					@endif
				</a>
			</div>
			@include('litepie::partials.menu')
			<div class="litepie-search">
				<a href="#" class="ui-btn ui-trigger">
					<i class="pe-7s-search github-color"></i>
				</a>
			</div>
			@yield('content')
			@yield('footer_ads')
			@include('litepie::partials.footer')
			<div class="_btn_to_top">
				<a href="#" class="" id="back-to-top"><i class="pe-7s-angle-up-circle"></i></a>
			</div>
		</div>
		<script src="{{ litepie_asset('js/litepie.com.min.js') }}"></script>
		<script type="text/javascript">
			console.log('Welcome to Litepie Tutorial - Visit: https://www.litepie.com');
			// var litepie = setInterval("litepieRefresher()", 60 * 1000);
   //   		function litepieRefresher(){self.location.reload(true);}
		</script>
		@stack('script')
	</body>
</html>
