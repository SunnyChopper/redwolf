@extends('layouts.app')

@section('content')
	@include('layouts.banner')

	<div class="container pt-32 pb-32">
		<div class="row">
			<div class="col-lg-8 mx-lg-auto col-md-8 mx-md-auto col-sm-12 col-12">
				<div class="grey-box">
					<form action="/admin/clients/create" method="POST">
						{{ csrf_field() }}
						<div class="row">
							<div class="col-12">
								<div class="form-group">
									<h5 class="mb-2">Company Name:</h5>
									<input type="text" name="company_name" class="form-control" required autofocus>
								</div>
							</div>
						</div>

						<div class="row">
							<div class="col-12">
								<div class="form-group">
									<h5 class="mb-2">Contact Email:</h5>
									<input type="email" name="email" class="form-control" required>
								</div>
							</div>
						</div>

						<div class="row">
							<div class="col-lg-6 col-md-6 col-sm-6 col-12">
								<div class="form-group">
									<h5 class="mb-2">Contact First Name:</h5>
									<input type="text" name="first_name" class="form-control" required>
								</div>
							</div>

							<div class="col-lg-6 col-md-6 col-sm-6 col-12">
								<div class="form-group">
									<h5 class="mb-2">Contact Last Name:</h5>
									<input type="text" name="last_name" class="form-control" required>
								</div>
							</div>
						</div>

						<div class="row mt-16">
							<div class="col-12">
								<input type="submit" value="Create Client" class="primary-btn center-button">
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
@endsection