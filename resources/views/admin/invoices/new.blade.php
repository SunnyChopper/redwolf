@extends('layouts.app')

@section('content')
	@include('layouts.banner')

	<div class="container pt-32 pb-32">
		<div class="row">
			<div class="col-lg-8 mx-lg-auto col-md-8 mx-md-auto col-sm-12 col-12">
				<div class="grey-box">
					<form id="create_invoice_form" action="/admin/invoices/create" method="POST">
						{{ csrf_field() }}
						<div class="row">
							<div class="col-12">
								<h4>Step 1: Choose the Client</h4>
								<hr />
							</div>
						</div>

						<div class="row">
							<div class="col-12">
								<div class="form-group">
									<h5 class="mb-2">Company:</h5>
									<select id="client_id" class="form-control" name="client_id" form="create_invoice_form">
										<option value="create_new">Create New</option>
										@foreach($clients as $client)
											<option value="{{ $client->id }}">{{ $client->company_name }}</option>
										@endforeach
									</select>
								</div>
							</div>
						</div>

						<div class="row" id="new_client_form">
							<div class="col-lg-6 col-md-6 col-sm-6 col-12 form-group">
								<h5 class="mb-2">Contact First Name:</h5>
								<input type="text" name="client_first_name" class="form-control" required="true">
							</div>

							<div class="col-lg-6 col-md-6 col-sm-6 col-12 form-group">
								<h5 class="mb-2">Contact Last Name:</h5>
								<input type="text" name="client_last_name" class="form-control" required="true">
							</div>

							<div class="col-12 form-group">
								<h5 class="mb-2">Contact Email:</h5>
								<input type="email" name="client_email" class="form-control" required="true">
							</div>

							<div class="col-12 form-group">
								<h5 class="mb-2">Company Name:</h5>
								<input type="text" name="company_name" class="form-control" required="true">
							</div>
						</div>

						<div class="row mt-32">
							<div class="col-12">
								<h4>Step 2: Create Invoice</h4>
								<hr />
							</div>

							<div class="col-lg-6 col-md-6 col-sm-6 col-12">
								<div class="form-group">
									<h5 class="mb-2">Amount:</h5>
									<input type="number" name="amount" class="form-control" min="0.00" step="0.01" required>
								</div>
							</div>

							<div class="col-lg-6 col-md-6 col-sm-6 col-12">
								<div class="form-group">
									<h5 class="mb-2">Due Date:</h5>
									<input type="date" name="due_date" class="form-control" required>
								</div>
							</div>
						</div>

						<div class="row">
							<div class="col-lg-6 col-md-6 col-sm-6 col-12">
								<div class="form-group">
									<h5 class="mb-2">Payment Method:</h5>
									<select class="form-control" name="payment_method" form="create_invoice_form">
										<option value="1">Online Payment</option>
										<option value="2">Cash</option>
										<option value="3">Check</option>
										<option value="4">Bank Transfer</option>
									</select>
								</div>
							</div>

							<div class="col-lg-6 col-md-6 col-sm-6 col-12">
								<div class="form-group">
									<h5 class="mb-2">Status:</h5>
									<select class="form-control" name="status" form="create_invoice_form">
										<option value="0">Unpaid</option>
										<option value="1">Paid</option>
										<option value="2">Cancelled</option>
									</select>
								</div>
							</div>
						</div>

						<div class="row mt-16">
							<div class="col-12">
								<input type="submit" value="Create Invoice" class="primary-btn center-button">
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
		$("#client_id").on('change', function() {
			var val = $(this).val();
			if (val == "create_new") {
				$("#new_client_form").show();
				$("input[name=client_first_name]").attr('required', true);
				$("input[name=client_last_name]").attr('required', true);
				$("input[name=client_email]").attr('required', true);
				$("input[name=company_name]").attr('required', true);
			} else {
				$("#new_client_form").hide();
				$("input[name=client_first_name]").attr('required', false);
				$("input[name=client_last_name]").attr('required', false);
				$("input[name=client_email]").attr('required', false);
				$("input[name=company_name]").attr('required', false);
			}
		});
	</script>
@endsection