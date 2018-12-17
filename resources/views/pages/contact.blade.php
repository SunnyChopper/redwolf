@extends('layouts.app')

@section('content')
	@include('layouts.banner')

	<div class="container pt-64 pb-64">
		<div class="row">
			<div class="col-lg-8 mx-lg-auto col-md-8 mx-md-auto col-sm-12 col-12">
				<div class="grey-box">
					<form id="contact_form">
						<div class="row">
							<div class="col-lg-6 col-md-6 col-sm-6 col-12 form-group">
								<h5 class="mb-2">First Name<span class="red">*</span>:</h5>
								<input type="text" class="form-control" name="first_name" autofocus required>
							</div>

							<div class="col-lg-6 col-md-6 col-sm-6 col-12 form-group">
								<h5 class="mb-2">Last Name<span class="red">*</span>:</h5>
								<input type="text" class="form-control" name="last_name" required>
							</div>
						</div>

						<div class="row">
							<div class="col-lg-6 col-md-6 col-sm-6 col-12 form-group">
								<h5 class="mb-2">Email<span class="red">*</span>:</h5>
								<input type="email" class="form-control" name="email" required>
							</div>

							<div class="col-lg-6 col-md-6 col-sm-6 col-12 form-group">
								<h5 class="mb-2">Phone:</h5>
								<input type="tel" class="form-control" name="phone">
							</div>
						</div>

						<div class="row">
							<div class="col-lg-6 col-md-6 col-sm-6 col-12 form-group">
								<h5 class="mb-2">Describe Your Project<span class="red">*</span>:</h5>
								<textarea class="form-control" rows="4" name="project_description" form="contact_form"></textarea>
							</div>

							<div class="col-lg-6 col-md-6 col-sm-6 col-12 form-group">
								<h5 class="mb-2">Select Your Services:</h5>
								<input type="checkbox" name="consultation" value="Consultation"> Consultation<br>
								<input type="checkbox" name="production" value="Production"> Production<br>
								<input type="checkbox" name="web_development" value="Web Development"> Web Development<br>
								<input type="checkbox" name="social_media_marketing" value="Social Media Marketing"> Social Media Marketing<br>
							</div>
						</div>

						<div class="row">
							<div class="col-lg-6 col-md-6 col-sm-6 col-12 form-group">
								<h5 class="mb-2">Urgency<span class="red">*</span>:</h5>
								<select class="form-control" name="urgency" form="contact_form">
									<option value="Very Low">Very Low</option>
									<option value="Low">Low</option>
									<option value="Normal">Normal</option>
									<option value="High">High</option>
									<option value="Very High">Very High</option>
								</select>
							</div>

							<div class="col-lg-6 col-md-6 col-sm-6 col-12 form-group">
								<h5 class="mb-2">Due Date:</h5>
								<input type="date" class="form-control" name="due_date">
							</div>
						</div>

						<div class="row mt-16">
							<input type="submit" class="primary-btn center-button" value="Submit">
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>

	
@endsection