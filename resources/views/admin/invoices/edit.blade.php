@extends('layouts.app')

@section('content')
	@include('layouts.banner')

	<div class="container pt-32 pb-32">
		<div class="row">
			<div class="col-lg-8 mx-lg-auto col-md-8 mx-md-auto col-sm-12 col-12">
				<div class="grey-box">
					<form id="edit_invoice_form" action="/admin/invoices/update" method="POST">
						{{ csrf_field() }}
						<input type="hidden" value="{{ $invoice->id }}" name="invoice_id">
						<div class="row">
							<div class="col-12">
								<div class="form-group">
									<h5 class="mb-2">Company:</h5>
									<input type="text" value="{{ $client_helper->get_company_name() }}" class="form-control" disabled required>
								</div>
							</div>
						</div>

						@if($invoice->status == 0)
							<div class="row">
								<div class="col-lg-4 col-md-4 col-sm-6 col-12">
									<div class="form-group">
										<h5 class="mb-2">Amount:</h5>
										<input type="number" value="{{ $invoice->amount }}" name="amount" class="form-control" min="0.00" step="0.01" required>
									</div>
								</div>

								<div class="col-lg-4 col-md-4 col-sm-6 col-12">
									<div class="form-group">
										<h5 class="mb-2">Due Date:</h5>
										<input type="date" value="{{ $invoice->due_date }}" name="due_date" class="form-control" required>
									</div>
								</div>

								<div class="col-lg-4 col-md-4 col-sm-12 co-12">
									<div class="form-group">
										<h5 class="mb-2">Invoice Status:</h5>
										<select form="edit_invoice_form" class="form-control" name="status">
											<option value="0" <?php if($invoice->status == 0){echo "selected";} ?>>Unpaid</option>
											<option value="1" <?php if($invoice->status == 1){echo "selected";} ?>>Paid</option>
											<option value="2" <?php if($invoice->status == 2){echo "selected";} ?>>Cancelled</option>
											<option value="3" <?php if($invoice->status == 3){echo "selected";} ?>>Overdue</option>
										</select>
									</div>
								</div>
							</div>

							<div class="row mt-16">
								<div class="col-12">
									<input type="submit" value="Update Invoice" class="primary-btn center-button">
								</div>
							</div>
						@elseif($invoice->status == 1)
							<h5 class="text-center mt-16">Invoice has already been paid for...can no longer edit</h5>
						@endif

						
					</form>
				</div>
			</div>
		</div>
	</div>
@endsection