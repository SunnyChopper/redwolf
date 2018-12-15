@extends('layouts.app')

@section('content')
	@include('layouts.banner')

	<div class="container p-64">
		<div class="row">
			<div class="col-lg-6 mx-lg-auto col-md-8 offset-md-2 col-sm-10 offset-sm-1 col-12">
				<div class="grey-box">
					<form action="/admin/login" method="POST">
						{{ csrf_field() }}
						<div class="form-group">
							<h5 class="mb-2">Username:</h5>
							<input type="text" class="form-control" name="username" required>
						</div>

						<div class="form-group">
							<h5 class="mb-2">Password:</h5>
							<input type="password" class="form-control" name="password" required>
						</div>

						@if(session()->has('error'))
							<p class="mt-2 mb-2 text-center red">{{ session()->get('error') }}</p>
						@endif

						<div class="form-group">
							<input type="submit" class="primary-btn center-button" value="Login">
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
@endsection