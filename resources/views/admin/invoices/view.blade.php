@extends('layouts.app')

@section('content')
	@include('layouts.banner')

	<div class="container pt-32 pb-32">
		<div class="row">
			@if(count($invoices) > 0)
				<div class="col-lg-10 mx-lg-auto col-md-10 mx-md-auto col-sm-12 col-12">
					<div style="overflow: auto;">
						<table class="table table-striped">
							<thead>
								<tr>
									<th>Company</th>
									<th>Amount</th>
									<th>Due Date</th>
									<th>Status</th>
									<th>Invoice URL</th>
									<th></th>
								</tr>
							</thead>
							<tbody>
								@foreach($invoices as $invoice)
									<tr>
										<td>{{ \App\Custom\ClientHelper::get_company_name($invoice->client_id) }}</td>
										<td>${{ $invoice->amount }}</td>
										<td>{{ $invoice->due_date }}</td>
										<td>
											@if($invoice->status == 0)
												Unpaid
											@elseif($invoice->status == 1)
												Paid
											@elseif($invoice->status == 2)
												Cancelled
											@elseif($invoice->status == 3)
												Overdue
											@endif
										</td>
										<td>{{ url('/invoices/' . $invoice->id) }}</td>
										<td style="float: right;">
											<a href="/admin/invoices/edit/{{ $invoice->id }}" class="genric-btn small primary">Edit</a>
											{{-- <button type="button" class="genric-btn delete_invoice_button small danger" id="{{ $invoice->id }}">Delete</button> --}}
										</td>
									</tr>
								@endforeach
							</tbody>
						</table>
					</div>
				</div>
			@else
				<div class="col-lg-8 mx-lg-auto col-md-8 mx-md-auto col-sm-12 col-12">
					<div class="grey-box">
						<h3 class="text-center">No Invoices</h3>
						<p class="text-center">There are no invoices in the system right now. Click below to get started on creating the first one.</p>
						<a href="/admin/invoices/new" class="primary-btn center-button">Create New Invoice</a>
					</div>
				</div>
			@endif
		</div>
	</div>
@endsection