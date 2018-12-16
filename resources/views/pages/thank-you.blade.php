@extends('layouts.app')

@section('content')
	@include('layouts.banner')

	<div class="container pt-64 pb-64">
		<div class="row">
			<div class="col-lg-6 mx-lg-auto col-md-8 mx-md-auto col-sm-12 col-12">
				<div class="grey-box">
					<h3 class="text-center">Thank You!</h3>
					<p class="text-center mt-2 mb-0">Successfully received your payment.</p>
					<p class="text-center mb-0">We have sent you an email with further instructions.</p>
				</div>
			</div>
		</div>
	</div>
@endsection