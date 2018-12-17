@extends('layouts.app')

@section('content')
	@include('layouts.banner')

	<div class="container pt-64 pb-64">
		<div class="row">
			<div class="col-lg-4 col-md-6 col-sm-6 col-12">
				<div class="image-box">
					<div class="image-box-image">
						<img src="{{ URL::asset('img/portfolio-1.jpg') }}" class="regular-image">
					</div>

					<div class="image-box-info">
						<h5 class="text-center">Fresh “Petty” Feat. 50 Cent & 2 Chainz</h5>
						<p class="text-center mb-0"><small>Music Video</small></p>
					</div>

					<div class="image-box-footer">
						<a href="https://youtu.be/NbeHRjkeCIw" class="genric-btn small primary rounded center-button">Watch Video</a>
					</div>
				</div>

				<div class="image-box">
					<div class="image-box-image">
						<img src="{{ URL::asset('img/portfolio-4.jpg') }}" class="regular-image">
					</div>

					<div class="image-box-info">
						<h5 class="text-center">Raven Felix, Kap G – Phase Me</h5>
						<p class="text-center mb-0"><small>Music Video</small></p>
					</div>

					<div class="image-box-footer">
						<a href="https://youtu.be/FDd2DW24XtQ" class="genric-btn small primary rounded center-button">Watch Video</a>
					</div>
				</div>

				<div class="image-box">
					<div class="image-box-image">
						<img src="{{ URL::asset('img/portfolio-7.jpg') }}" class="regular-image">
					</div>

					<div class="image-box-info">
						<h5 class="text-center">PLT Sport BTS – PrettyLittleThing</h5>
						<p class="text-center mb-0"><small>Marketing</small></p>
					</div>

					<div class="image-box-footer">
						<a href="https://youtu.be/vnsNZKe5P_w" class="genric-btn small primary rounded center-button">Watch Video</a>
					</div>
				</div>
			</div>

			<div class="col-lg-4 col-md-6 col-sm-6 col-12">
				<div class="image-box">
					<div class="image-box-image">
						<img src="{{ URL::asset('img/portfolio-2.jpg') }}" class="regular-image">
					</div>

					<div class="image-box-info">
						<h5 class="text-center">Raven Felix – Job Done ft. Wiz Khalifa</h5>
						<p class="text-center mb-0"><small>Music Video</small></p>
					</div>

					<div class="image-box-footer">
						<a href="https://youtu.be/QL3luy2e0uA" class="genric-btn small primary rounded center-button">Watch Video</a>
					</div>
				</div>

				<div class="image-box">
					<div class="image-box-image">
						<img src="{{ URL::asset('img/portfolio-6.jpg') }}" class="regular-image">
					</div>

					<div class="image-box-info">
						<h5 class="text-center">Generation K with Gary Vaynerchuk</h5>
						<p class="text-center mb-0"><small>Marketing</small></p>
					</div>

					<div class="image-box-footer">
						<p class="text-center mb-0">No link available</p>
					</div>
				</div>

				<div class="image-box">
					<div class="image-box-image">
						<img src="{{ URL::asset('img/portfolio-8.jpg') }}" class="regular-image">
					</div>

					<div class="image-box-info">
						<h5 class="text-center">PLT X Olivia Culpo BTS</h5>
						<p class="text-center mb-0"><small>Marketing</small></p>
					</div>

					<div class="image-box-footer">
						<p class="text-center mb-0">No link available</p>
					</div>
				</div>
			</div>

			<div class="col-lg-4 col-md-6 col-sm-6 col-12">
				<div class="image-box">
					<div class="image-box-image">
						<img src="{{ URL::asset('img/portfolio-3.jpg') }}" class="regular-image">
					</div>

					<div class="image-box-info">
						<h5 class="text-center">Raven Felix – Bet They Know Now</h5>
						<p class="text-center mb-0"><small>Music Video</small></p>
					</div>

					<div class="image-box-footer">
						<a href="https://youtu.be/IXWnP7gtbZc" class="genric-btn small primary rounded center-button">Watch Video</a>
					</div>
				</div>

				<div class="image-box">
					<div class="image-box-image">
						<img src="{{ URL::asset('img/portfolio-5.jpg') }}" class="regular-image">
					</div>

					<div class="image-box-info">
						<h5 class="text-center">Open Water 3</h5>
						<p class="text-center mb-0"><small>Marketing</small></p>
					</div>

					<div class="image-box-footer">
						<p class="text-center mb-0">No link available</p>
					</div>
				</div>

				<div class="image-box">
					<div class="image-box-image">
						<img src="{{ URL::asset('img/portfolio-9.jpg') }}" class="regular-image">
					</div>

					<div class="image-box-info">
						<h5 class="text-center">PLT Sport ft. Ana Cheri</h5>
						<p class="text-center mb-0"><small>Marketing</small></p>
					</div>

					<div class="image-box-footer">
						<a href="https://youtu.be/CvmtIViQRk0" class="genric-btn small primary rounded center-button">Watch Video</a>
					</div>
				</div>
			</div>
		</div>
	</div>

	@include('layouts.cta-row')
@endsection