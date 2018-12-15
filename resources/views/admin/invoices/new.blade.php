@extends('layouts.app')

@section('content')
	@include('layouts.banner')

	<div class="container pt-32 pb-32">
		<div class="row">
			<div class="col-lg-8 mx-lg-auto col-md-8 mx-md-auto col-sm-12 col-12">
				<div class="grey-box">
					@if(count($clients) > 0)
						<form id="create_invoice_form" action="/admin/invoices/create" method="POST">
							{{ csrf_field() }}
							<div class="row">
								<div class="col-12">
									<div class="form-group">
										<h5 class="mb-2">Company:</h5>
										<select class="form-control" name="client_id" form="create_invoice_form">
											@foreach($clients as $client)
												<option value="{{ $client->id }}">{{ $client->company_name }}</option>
											@endforeach
										</select>
									</div>
								</div>
							</div>

							<div class="row">
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

							<div class="row mt-16">
								<div class="col-12">
									<input type="submit" value="Create Invoice" class="primary-btn center-button">
								</div>
							</div>
						</form>
					@else
						<h3 class="text-center">No Clients Exist</h3>
						<p class="text-center">You must create a client before you can create an invoice.</p>
						<a href="/admin/clients/new" class="primary-btn center-button">Create New Client</a>
					@endif
				</div>
			</div>
		</div>
	</div>
@endsection