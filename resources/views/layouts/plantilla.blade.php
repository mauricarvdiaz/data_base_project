<!DOCTYPE html>
<html class="no-js">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<title>DBD | @yield('titulo')</title>
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta name="description" content="Free HTML5 Template by FREEHTML5.CO" />
		<meta name="keywords" content="free html5, free template, free bootstrap, html5, css3, mobile first, responsive" />
		<meta name="author" content="FREEHTML5.CO" />

		<!-- Place favicon.ico and apple-touch-icon.png in the root directory -->
		<link rel="shortcut icon" href="favicon.ico">
		<link href='https://fonts.googleapis.com/css?family=Open+Sans:400,700,300' rel='stylesheet' type='text/css'>
		<!-- Animate.css -->
		<link rel="stylesheet" href="{{ asset('css/animate.css') }}">
		<!-- Icomoon Icon Fonts-->
		<link rel="stylesheet" href="{{asset('css/icomoon.css')}}">
		<!-- Bootstrap  -->
		<link rel="stylesheet" href="{{asset('css/bootstrap.css')}}">
		<!-- Superfish -->
		<link rel="stylesheet" href="{{asset('css/superfish.css')}}">
		<!-- Magnific Popup -->
		<link rel="stylesheet" href="{{asset('css/magnific-popup.css')}}">
		<!-- Date Picker -->
		<link rel="stylesheet" href="{{asset('css/bootstrap-datepicker.min.css')}}">
		<!-- CS Select -->
		<link rel="stylesheet" href="{{asset('css/cs-select.css')}}">
		<link rel="stylesheet" href="{{asset('css/cs-skin-border.css')}}">
		
		<link rel="stylesheet" href="{{asset('css/style.css')}}">


		<!-- Modernizr JS -->
		<script src="{{asset('js/modernizr-2.6.2.min.js')}}"></script>
	</head>
	<body>
		<div id="fh5co-wrapper">
		<div id="fh5co-page">
		<header id="fh5co-header-section" class="sticky-banner">
			@include('layouts.navbar')
		</header>
		
								@yield('contenido')
							
		<script src="{{asset('js/jquery.min.js')}}"></script>
		<!-- jQuery Easing -->
		<script src="{{asset('js/jquery.easing.1.3.js')}}"></script>
		<!-- Bootstrap -->
		<script src="{{asset('js/bootstrap.min.js')}}"></script>
		<!-- Waypoints -->
		<script src="{{asset('js/jquery.waypoints.min.js')}}"></script>
		<script src="{{asset('js/sticky.js')}}"></script>
		<!-- Stellar -->
		<script src="{{asset('js/jquery.stellar.min.js')}}"></script>
		<!-- Superfish -->
		<script src="{{asset('js/hoverIntent.js')}}"></script>
		<script src="{{asset('js/superfish.js')}}"></script>
		<!-- Magnific Popup -->
		<script src="{{asset('js/jquery.magnific-popup.min.js')}}"></script>
		<script src="{{asset('js/magnific-popup-options.js')}}"></script>
		<!-- Date Picker -->
		<script src="{{asset('js/bootstrap-datepicker.min.js')}}"></script>
		<!-- CS Select -->
		<script src="{{asset('js/classie.js')}}"></script>
		<script src="{{asset('js/selectFx.js')}}"></script>
		<!-- Main JS -->
		<script src="{{asset('js/main.js')}}"></script>
	</body>
</html>
