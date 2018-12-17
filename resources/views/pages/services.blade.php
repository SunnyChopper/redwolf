@extends('layouts.app')

@section('content')
	@include('layouts.banner')

	

	<div class="container pt-64 pb-64">
		<div class="row">
			<div class="col-lg-6 col-md-7 col-sm-12 col-12">
				<img src="{{ URL::asset('img/service-web-dev.png') }}" class="regular-image">
			</div>
			<div class="col-lg-6 col-md-5 col-sm-12 col-12" style="margin: auto;">
				<h3 class="text-center mb-2">Create a Results Driven Website</h3>
				<p class="text-center">Your website is the digital face of your company and can make or break your brand.  You only have one shot to make the right impression. Set yourself apart by ensuring it features professional and captivating web design.</p>
				<a href="/contact" class="primary-btn center-button">Build Your Website Now</a>
			</div>
		</div>
	</div>

	<div class="container pt-64 pb-64">
		<div class="row">
			<div class="col-12 d-block d-md-none">
				<img src="{{ URL::asset('img/service-video-production.png') }}" class="regular-image">
			</div>
			<div class="col-lg-6 col-md-5 col-sm-12 col-12" style="margin: auto;">
				<h3 class="text-center mb-2">The Future of Video Marketing</h3>
				<p class="text-center">Research and data shows that video is extremely effective in converting viewers into customers across the globe. Given the effectiveness, making video a part of your content marketing strategy is vital.</p>
				<a href="/contact" class="primary-btn center-button">Go Viral with Video</a>
			</div>
			<div class="col-lg-6 col-md-7 col-sm-12 col-12 d-none d-md-block">
				<img src="{{ URL::asset('img/service-video-production.png') }}" class="regular-image">
			</div>
			
		</div>
	</div>

	<div class="container pt-64 pb-64">
		<div class="row">
			<div class="col-lg-6 col-md-7 col-sm-12 col-12">
				<img src="{{ URL::asset('img/service-data.png') }}" class="regular-image">
			</div>
			<div class="col-lg-6 col-md-5 col-sm-12 col-12" style="margin: auto;">
				<h3 class="text-center mb-2">Captivate New Avenues of Traffic</h3>
				<p class="text-center">With the power of digital marketing, it has never been easier to reach your target audience and convert them into customers. From boosting your site’s SEO to driving targeted traffic, change the game and develop a stronger online presence. Create new avenues of traffic with social media and help grow your brand and directly impact your top line.</p>
				<a href="/contact" class="primary-btn center-button">Increase Your Revenue</a>
			</div>
		</div>
	</div>

	<div style="background-color: black; padding: 64px;">
		<div class="container">
			<div class="row">
				<div class="col-lg-4 col-md-4 col-sm-12 col-12 service-info">
					<img src="{{ URL::asset('img/service-icon-1.png') }}" class="service-icon">
					<h3 class="text-center white mt-16">Content Curation</h3>
					<p class="text-center white mb-0 mt-2">Consistent and stimulating content is important to your company's growth. Companies that do not allocate time and resources into content creation seldom reach their marketing goals.</p>
				</div>

				<div class="col-lg-4 col-md-4 col-sm-12 col-12 service-info">
					<img src="{{ URL::asset('img/service-icon-2.png') }}" class="service-icon">
					<h3 class="text-center white mt-16">Video Marketing</h3>
					<p class="text-center white mb-0 mt-2">With staggering statistics proving clear success for video – particularly for the ability for videos to convert more viewers into customers – it’s a must have for your marketing efforts.</p>
				</div>

				<div class="col-lg-4 col-md-4 col-sm-12 col-12 service-info">
					<img src="{{ URL::asset('img/service-icon-3.png') }}" class="service-icon">
					<h3 class="text-center white mt-16">Digital Marketing</h3>
					<p class="text-center white mb-0 mt-2">Reaching an online audience has never been easier to do so. Our proven digital strategies will ensure that your business will reach more people and successfully convert them into customers.</p>
				</div>
			</div>
		</div>
	</div>

	@include('layouts.cta-row')
@endsection