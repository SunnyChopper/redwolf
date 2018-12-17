@extends('layouts.app')

@section('content')
	@include('layouts.main-banner')
	
	<!-- About Us Section -->
	<div class="dark-grey-row">
		<div class="container p-32">
			<div class="row">
				<div class="col-lg-12 col-md-12 col-sm-12 col-12">
					<h2 class="text-center white mb-16 text-uppercase">About <span class="red">Us</span></h2>
					<p class="text-center">Red Wolf Entertainment is a full service, data-driven brand agency that services brands in a wide range of industries. We specialize in helping companies grow a digital footprint to gain market share, and we take on full management for you. Our services include production, content creation, public relations, growth, strategy, and customer acquisition. Red Wolf Entertainment takes pride in the analytics and data that we report back to our clients to keep them informed on their brand each week. We’ve worked with clients such as BMW, LA Weekly, Rolls Royce, The Tonight Show Starring Jimmy Fallon, Jacoby & Meyers, K Swiss, Infusionsoft, Lionsgate, Penske, NBC Universal and Taylor Gang.</p>
				</div>
			</div>
		</div>
	</div>

	<!-- Previous Clients Section -->
	<div class="container p-32">
		<div class="row">
			<div class="col-lg-12 col-md-12 col-sm-12 col-12">
				<h2 class="text-center text-uppercase mb-32">WE’VE HAD THE PLEASURE OF WORKING WITH SOME <br><span class="red">GREAT BRANDS AND PEOPLE.</span></h2>
			</div>
		</div>
		<div class="row">
			<div class="col-lg-12 col-md-12 col-sm-12 col-12">
				<img src="{{ URL::asset('img/company-logos.png') }}" class="regular-image">
			</div>
		</div>
	</div>

	<!-- Services Section -->
	<div class="dark-grey-row">
		<div class="container p-32">
			<div class="row mb-32">
				<div class="col-lg-12 col-md-12 col-sm-12 col-12">
					<h2 class="text-center white mb-16 text-uppercase">Our <span class="red">Services</span></h2>
				</div>
			</div>

			<div class="row">
				<div class="col-lg-4 col-md-4 col-sm-12 col-12">
					<div class="icon-box">
						<i class="fa fa-laptop" aria-hidden="true"></i>
						<h3 class="text-center white text-uppercase mb-16 mt-16">Marketing</h3>
						<p class="text-center white">Red Wolf helps you develop a long-term brand and marketing strategy for the development and growth of your brand to achieve specific data-driven goals. Our deliverables include a session with your account manager to help us learn your company or brand’s voice, a 90-day content calendar that we will be managing for you, and a weekly analytics and metrics report to keep you updated on how your company or brand is performing. Our team uses our data to make informed decisions each week to improve results. With our 1.5 million social reach, we are sure we can deliver the results you need.</p>
					</div>
				</div>

				<div class="col-lg-4 col-md-4 col-sm-12 col-12">
					<div class="icon-box">
						<i class="fa fa-play" aria-hidden="true"></i>
						<h3 class="text-center white text-uppercase mb-16 mt-16">Production</h3>
						<p class="text-center white">Red Wolf’s production team will help you produce the content you need to deliver back to your audience. Our deliverables include a 45-60 minute session with our Executive Producer to help understand your vision, a strategy for your production aiming at the message and metrics you are using to define success, and up to 6 hours of photo/video production time that we can have ready within three weeks of your shooting time. Our production is done with the top professional video equipment, the RED, giving us sharp Cinema style shooting.</p>
					</div>
				</div>

				<div class="col-lg-4 col-md-4 col-sm-12 col-12">
					<div class="icon-box">
						<i class="fa fa-file-image-o" aria-hidden="true"></i>
						<h3 class="text-center white text-uppercase mb-16 mt-16">Public Relations</h3>
						<p class="text-center white">Our journalists and editors will help you produce stories about you and your brand to be published in top media outlets such as Entrepreneur, Forbes, LA Weekly, USA Today, and more. Our deliverables include a one-hour interview session with our Chief Editor to help us understand your objective for press, and the message you are trying to send. Additionally, we will connect you with a journalist who will be using this interview to create the value-driven stories that people love to read within one week of the interview. Finally, after receiving your approval for all content, we will submit and get your stories published for readers to enjoy.</p>
					</div>
				</div>
			</div>
		</div>
	</div>

	<!-- Testimonials Section -->
	<div class="city-background-row">
		<div class="container p-32">
			<div class="row">
				<div id="demo" class="carousel slide" data-ride="carousel">
					<!-- Indicators -->
					<ul class="carousel-indicators">
						<li data-target="#demo" data-slide-to="0" class="active"></li>
						<li data-target="#demo" data-slide-to="1"></li>
						<li data-target="#demo" data-slide-to="2"></li>
					</ul>

					<!-- The slideshow -->
					<div class="carousel-inner">
						<div class="carousel-item active">
							<div class="testimonial-card">
								<img src="{{ URL::asset('img/testimonial-1.jpg') }}" class="center-button">
								<p class="text-center white mt-16">With just one consultation session with Luis Garcia from Red Wolf Entertainment in regards to our live show strategy here at Infusionsoft, we were able to take our live show strategy from one per quarter to two a week. Why? Content is king. We took it back to his strategy of content. Now we give people valuable advice on marketing tips and tricks because of that one session. Now, our live shows are the #1 traffic sender to the website. So, it was an amazing strategy, and it was amazing advice.</p>
								<h4 class="text-center white mt-16">Natalie Ferreyra</h4>
								<h5 class="text-center red mb-16">Digital Strategist at InfusionSoft</h5>		
							</div>
						</div>

						<div class="carousel-item">
							<div class="testimonial-card">
								<img src="{{ URL::asset('img/testimonial-2.jpg') }}" class="center-button">
								<p class="text-center white mt-16">Red Wolf has taken my brand and helped me obtain thousands of followers that have essentially, in the long-run, grown my business. I’ve had Red Wolf produce many of my events as well, including my Tedx event, and they’ve done such a great job growing my business very organically. I’m extremely happy with their work!</p>
								<h4 class="text-center white mt-16">Ashley Zahabian</h4>
								<h5 class="text-center red mb-16">Lecturer in emotional intelligence, Research Assistant at Columbia University</h5>		
							</div>
						</div>

						<div class="carousel-item">
							<div class="testimonial-card">
								<img src="{{ URL::asset('img/testimonial-3.jpg') }}" class="center-button">
								<p class="text-center white mt-16">Luis was very helpful in accelerating audience growth on behalf of our clients. Whenever we were getting set to run influencer marketing campaigns to drive awareness and engagement amongst aspiring entrepreneurs, Luis was one of the first guys we’d call. Thanks Luis!</p>
								<h4 class="text-center white mt-16">Sam Hysell</h4>
								<h5 class="text-center red mb-16">Brand Strategist, VaynerTalent</h5>		
							</div>
						</div>
					</div>

					<!-- Left and right controls -->
					<a class="carousel-control-prev" href="#demo" data-slide="prev">
						<span class="carousel-control-prev-icon"></span>
					</a>
					<a class="carousel-control-next" href="#demo" data-slide="next">
						<span class="carousel-control-next-icon"></span>
					</a>
				</div>
			</div>
		</div>
	</div>

	@include('layouts.cta-row')
@endsection