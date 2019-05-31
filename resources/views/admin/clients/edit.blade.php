@extends('layouts.app')

@section('content')
	@include('layouts.banner')

	<div class="container pt-32 pb-32">
		<div class="row">
			<div class="col-lg-8 mx-lg-auto col-md-8 mx-md-auto col-sm-12 col-12">
				<div class="grey-box">
					<form id="update_client_form" action="/admin/clients/update" method="POST">
						{{ csrf_field() }}
						<input type="hidden" value="{{ $client->id }}" name="client_id">
						<h3 class="mb-4">Client Information</h3>
						<div class="row">
							<div class="col-12">
								<div class="form-group">
									<h5 class="mb-2">Company Name:</h5>
									<input type="text" name="company_name" value="{{ $client->company_name }}" class="form-control" required autofocus>
								</div>
							</div>
						</div>

						<div class="row">
							<div class="col-12">
								<div class="form-group">
									<h5 class="mb-2">Contact Email:</h5>
									<input type="email" name="email" value="{{ $client->email }}" class="form-control" required>
								</div>
							</div>
						</div>

						<div class="row">
							<div class="col-lg-6 col-md-6 col-sm-6 col-12">
								<div class="form-group">
									<h5 class="mb-2">Contact First Name:</h5>
									<input type="text" name="first_name" value="{{ $client->first_name }}" class="form-control" required>
								</div>
							</div>

							<div class="col-lg-6 col-md-6 col-sm-6 col-12">
								<div class="form-group">
									<h5 class="mb-2">Contact Last Name:</h5>
									<input type="text" name="last_name" value="{{ $client->last_name }}" class="form-control" required>
								</div>
							</div>
						</div>

						<h3 class="mb-4 mt-4">Services</h3>

						<div class="row">
							<div class="col-12">
								<h5 class="mb-2">Main Representative:</h5>
							</div>

							<div class="col-lg-6 col-md-6 col-sm-12 col-12">
								<div class="form-group">
									<select name="rep_id" form="update_client_form" class="form-control">
										@foreach($employees as $e)
										<option value="{{ $e->id }}" <?php if ($e->id == $client->rep_id) { echo "selected"; } ?>>{{ $e->first_name }} {{ $e->last_name }}</option>
										@endforeach
									</select>
								</div>
							</div>
						</div>

						<div class="row">
							<div class="col-12">
								<h5 class="mb-0">Website Development:</h5>
							</div>

							<div class="col-lg-6 col-md-6 col-sm-12 col-12">
								<p class="mb-0"><small>Are we providing website development services?</small></p>
								<select id="website_dev_select" name="website_dev" form="update_client_form" class="form-control">
									<option value="0" <?php if($client->website_dev == 0) { echo "selected"; } ?>>No</option>
									<option value="1" <?php if($client->website_dev == 1) { echo "selected"; } ?>>Yes</option>
								</select>
							</div>

							<div class="col-lg-6 col-md-6 col-sm-12 col-12" id="website_dev" <?php if($client->website_dev == 0) { echo 'style="display: none;"'; } ?>>
								<p class="mb-0"><small>Who will be in charge of website development?</small></p>
								<select id="website_dev_employee_id" name="website_dev_employee_id" form="update_client_form" class="form-control">
									<option value="0" <?php if($client->website_dev_employee_id == 0) { echo "selected"; } ?>>N/A</option>
									@foreach($employees as $e)
									<option value="{{ $e->id }}" <?php if($client->website_dev_employee_id == $e->id) { echo "selected"; } ?>>{{ $e->first_name }} {{ $e->last_name }}</option>
									@endforeach
								</select>
							</div>
						</div>

						<div class="row mt-16">
							<div class="col-12">
								<h5 class="mb-0">Marketing:</h5>
							</div>

							<div class="col-lg-6 col-md-6 col-sm-12 col-12">
								<p class="mb-0"><small>Are we providing marketing services?</small></p>
								<select id="marketing_select" name="marketing" form="update_client_form" class="form-control">
									<option value="0" <?php if($client->marketing == 0) { echo "selected"; } ?>>No</option>
									<option value="1" <?php if($client->marketing == 1) { echo "selected"; } ?>>Yes</option>
								</select>
							</div>

							<div class="col-lg-6 col-md-6 col-sm-12 col-12" id="marketing" <?php if($client->marketing == 0) { echo 'style="display: none;"'; } ?>>
								<p class="mb-0"><small>Who will be in charge of marketing?</small></p>
								<select id="marketing_employee_id" name="marketing_employee_id" form="update_client_form" class="form-control">
									<option value="0" <?php if($client->marketing_employee_id == 0) { echo "selected"; } ?>>N/A</option>
									@foreach($employees as $e)
									<option value="{{ $e->id }}" <?php if($client->marketing_employee_id == $e->id) { echo "selected"; } ?>>{{ $e->first_name }} {{ $e->last_name }}</option>
									@endforeach
								</select>
							</div>
						</div>

						<div class="row mt-16">
							<div class="col-12">
								<h5 class="mb-0">Branding:</h5>
							</div>

							<div class="col-lg-6 col-md-6 col-sm-12 col-12">
								<p class="mb-0"><small>Are we providing branding services?</small></p>
								<select id="branding_select" name="branding" form="update_client_form" class="form-control">
									<option value="0" <?php if($client->branding == 0) { echo "selected"; } ?>>No</option>
									<option value="1" <?php if($client->branding == 1) { echo "selected"; } ?>>Yes</option>
								</select>
							</div>

							<div class="col-lg-6 col-md-6 col-sm-12 col-12" id="branding" <?php if($client->branding == 0) { echo 'style="display: none;"'; } ?>>
								<p class="mb-0"><small>Who will be in charge of branding?</small></p>
								<select id="branding_employee_id" name="branding_employee_id" form="update_client_form" class="form-control">
									<option value="0" <?php if($client->branding_employee_id == 0) { echo "selected"; } ?>>N/A</option>
									@foreach($employees as $e)
									<option value="{{ $e->id }}" <?php if($client->branding_employee_id == $e->id) { echo "selected"; } ?>>{{ $e->first_name }} {{ $e->last_name }}</option>
									@endforeach
								</select>
							</div>
						</div>

						<div class="row mt-16">
							<div class="col-12">
								<h5 class="mb-0">Content Curation:</h5>
							</div>

							<div class="col-lg-6 col-md-6 col-sm-12 col-12">
								<p class="mb-0"><small>Are we providing content curation services?</small></p>
								<select id="content_curation_select" name="content_curation" form="update_client_form" class="form-control">
									<option value="0" <?php if($client->content_curation == 0) { echo "selected"; } ?>>No</option>
									<option value="1" <?php if($client->content_curation == 1) { echo "selected"; } ?>>Yes</option>
								</select>
							</div>

							<div class="col-lg-6 col-md-6 col-sm-12 col-12" id="content_curation" <?php if($client->content_curation == 0) { echo 'style="display: none;"'; } ?>>
								<p class="mb-0"><small>Who will be in charge of branding?</small></p>
								<select id="content_curation_employee_id" name="content_curation_employee_id" form="update_client_form" class="form-control">
									<option value="0" <?php if($client->content_curation_employee_id == 0) { echo "selected"; } ?>>N/A</option>
									@foreach($employees as $e)
									<option value="{{ $e->id }}" <?php if($client->content_curation_employee_id == $e->id) { echo "selected"; } ?>>{{ $e->first_name }} {{ $e->last_name }}</option>
									@endforeach
								</select>
							</div>
						</div>

						<div class="row mt-32">
							<div class="col-12">
								<input type="submit" value="Update Client" class="primary-btn center-button">
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
@endsection

@section('page_js')
	<script type="text/javascript">
		$(document).ready(function() {
			$("#website_dev_select").on('change', function() {
				var selection = $(this).val();
				if (selection == 0) {
					$("#website_dev_employee_id").val('0');
					$("#website_dev").hide();
				} else {
					$("#website_dev").show();
				}
			});

			$("#marketing_select").on('change', function() {
				var selection = $(this).val();
				if (selection == 0) {
					$("#marketing_employee_id").val('0');
					$("#marketing").hide();
				} else {
					$("#marketing").show();
				}
			});

			$("#branding_select").on('change', function() {
				var selection = $(this).val();
				if (selection == 0) {
					$("#branding_employee_id").val('0');
					$("#branding").hide();
				} else {
					$("#branding").show();
				}
			});

			$("#content_curation_select").on('change', function() {
				var selection = $(this).val();
				if (selection == 0) {
					$("#content_curation_employee_id").val('0');
					$("#content_curation").hide();
				} else {
					$("#content_curation").show();
				}
			});
		});
	</script>
@endsection