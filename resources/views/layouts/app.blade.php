<!DOCTYPE html>
<html lang="zxx" class="no-js">
	<head>
		<!-- Mobile Specific Meta -->
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<!-- Favicon-->
		<link rel="shortcut icon" href="{{ URL::asset('img/favicon.png') }}">
		<!-- Author Meta -->
		<meta name="author" content="CodePixar">
		<!-- Meta Description -->
		<meta name="description" content="">
		<!-- Meta Keyword -->
		<meta name="keywords" content="">
		<!-- meta character set -->
		<meta charset="UTF-8">
		<!-- Site Title -->
		@if(isset($page_title))
			<title>{{ $page_title }} - Red Wolf</title>
		@else
			<title>Red Wolf</title>
		@endif

		<!-- Fonts -->
		<link href="https://fonts.googleapis.com/css?family=Poppins:100,200,400,300,500,600,700" rel="stylesheet">
		<link href="https://fonts.googleapis.com/css?family=Roboto:300,400,700" rel="stylesheet">

		<!-- CSS Links -->
		<link rel="stylesheet" href="{{ URL::asset('css/linearicons.css') }}">
		<link rel="stylesheet" href="{{ URL::asset('css/font-awesome.min.css') }}">
		<link rel="stylesheet" href="{{ URL::asset('css/jquery.DonutWidget.min.css') }}">
		<link rel="stylesheet" href="{{ URL::asset('css/bootstrap.css') }}">
		<link rel="stylesheet" href="{{ URL::asset('css/owl.carousel.css') }}">
		<link rel="stylesheet" href="{{ URL::asset('css/main.css') }}">
		<link rel="stylesheet" href="{{ URL::asset('css/app.css') }}">
		<link rel="stylesheet" href="{{ URL::asset('css/layouts.css') }}">

		<script src="https://www.google.com/recaptcha/api.js" async defer></script>
	</head>
	<body>
		@include('layouts.navbar')
		@yield('content')
		@include('layouts.footer')
		@include('layouts.js')
	</body>
</html>