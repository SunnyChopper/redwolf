<html>
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
		<link rel="stylesheet" href="{{ URL::asset('css/bootstrap.css') }}">
		<link rel="stylesheet" href="{{ URL::asset('css/main.css') }}">
		<link rel="stylesheet" href="{{ URL::asset('css/app.css') }}">
		<link rel="stylesheet" href="{{ URL::asset('css/layouts.css') }}">
	</head>
	<body style="display: grid; height: 100%;">
		<div class="container" style="margin: auto; display: block;">
			<div class="row justify-content-center">
				<div class="col-lg-6 col-md-6 col-sm-12 col-12">
					<img src="{{ URL::asset('img/logo.png') }}" class="regular-image-40 centered mb-32">
					
					<div class="grey-box">
						<h3 class="text-center mb-2">Clients Login Portal</h3>
						<p class="text-center mb-16">Enter the contact email for your company in order to login.</p>
						<form action="/clients/login/attempt" method="POST">
							{{ csrf_field() }}
							<div class="form-group">
								<label>Contact Email:</label>
								<input type="email" class="form-control" name="email" required>
							</div>

							@if(session()->has('error'))
							<div class="form-group">
								<p class="text-center red mb-2 mt-2">{{ session()->get('error') }}</p>
							</div>
							@endif

							<div class="form-group">
								<input type="submit" class="primary-btn centered" value="Login">
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</body>
</html>