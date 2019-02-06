@extends('layouts.app')

@section('content')
	@include('layouts.banner')

	<div class="container pt-64 pb-64">
		<div class="row">
			<div class="col-lg-12 col-md-12 col-sm-12 col-12">
				<div class="videoWrapper">
				    <iframe width="1080" height="720" src="https://www.youtube.com/embed/KHr54stGdOc?start=0&autoplay=1&showinfo=0&controls=1&mute=1" frameborder="0" allowfullscreen autoplay></iframe>
				</div>

			</div>
		</div>
	</div>

	@include('layouts.cta-row')
@endsection