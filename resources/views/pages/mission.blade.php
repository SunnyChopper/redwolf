@extends('layouts.app')

@section('content')
	@include('layouts.banner')

	<div class="container pt-64 pb-64">
		<div class="row">
			<div class="col-lg-3 col-md-6 col-sm-6 col-12">
				<div class="image-box">
					<div class="image-box-image">
						<img src="{{ URL::asset('img/mission-1.jpg') }}" class="regular-image">
					</div>
					<div class="image-box-info mission-info">
						<h4>Our Mission</h4>
						<hr />
						<p class="mb-0">The mission at Red Wolf is to deliver top quality production, marketing, and public relations services to you that result in consumer trust and conversion.</p>
					</div>
					<div class="image-box-footer">
						<a href="/services" class="genric-btn primary medium rounded center-button">Get Started</a>
					</div>
				</div>
			</div>

			<div class="col-lg-3 col-md-6 col-sm-6 col-12">
				<div class="image-box">
					<div class="image-box-image">
						<img src="{{ URL::asset('img/mission-2.jpg') }}" class="regular-image">
					</div>
					<div class="image-box-info mission-info">
						<h4>Company Growth</h4>
						<hr />
						<p class="mb-0">We offer personalized strategy and production services for brands and people looking to gain visibility, value, and build strong relationships with consumers.</p>
					</div>
					<div class="image-box-footer">
						<a href="/services" class="genric-btn primary medium rounded center-button">Get Started</a>
					</div>
				</div>
			</div>

			<div class="col-lg-3 col-md-6 col-sm-6 col-12">
				<div class="image-box">
					<div class="image-box-image">
						<img src="{{ URL::asset('img/mission-3.jpg') }}" class="regular-image">
					</div>
					<div class="image-box-info mission-info">
						<h4>Content Creation</h4>
						<hr />
						<p class="mb-0">Content creation is the most consequential aspect of building brand awareness and implementing social media growth in today’s age.</p>
					</div>
					<div class="image-box-footer">
						<a href="/services" class="genric-btn primary medium rounded center-button">Get Started</a>
					</div>
				</div>
			</div>

			<div class="col-lg-3 col-md-6 col-sm-6 col-12">
				<div class="image-box">
					<div class="image-box-image">
						<img src="{{ URL::asset('img/mission-4.jpg') }}" class="regular-image">
					</div>
					<div class="image-box-info mission-info">
						<h4>Video Production</h4>
						<hr />
						<p class="mb-0">Our experts use premier equipment and unprecedented concepts to create thrilling visualizations that boost engagement and drives sales online.</p>
					</div>
					<div class="image-box-footer">
						<a href="/services" class="genric-btn primary medium rounded center-button">Get Started</a>
					</div>
				</div>
			</div>
		</div>
	</div>

	@include('layouts.cta-row')
@endsection