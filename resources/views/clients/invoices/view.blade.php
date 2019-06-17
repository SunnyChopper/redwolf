@extends('layouts.app')

@section('content')
	@include('layouts.banner')
	<div class="container pt-64 pb-64">
		<div class="row justify-content-center">
			@if(count($invoices) > 0)
			<div class="col-12">
				<div style="overflow: auto;">
					<table class="table table-striped">
						<thead>
							<tr>
								<th>Date</th>
								<th>Amount</th>
								<th>Status</th>
								<th>Paid On</th>
							</tr>
						</thead>
						<tbody>
							@foreach($invoices as $invoice)
							<tr>
								<td style="vertical-align: middle;">{{ Carbon\Carbon::parse($invoice->due_date)->format('M jS, Y') }}</td>
								<td>${{ sprintf("%.2f", $invoice->amount) }}</td>
								<td>
									@if($invoice->status == 0)
										Unpaid
									@elseif($invoice->status == 1)
										Paid
									@else
										Cancelled
									@endif
								</td>
								<td>{{ $invoice->updated_at->format('M jS, Y') }}</td>
							</tr>
							@endforeach
						</tbody>
					</table>
				</div>
			</div>
			@else
				<div class="col-lg-6 col-md-7 col-sm-10 col-12">
					<div class="grey-box">
						<h3 class="text-center">No Invoices</h3>
						<p class="text-center mb-0">There are no invoices in our system.</p>
					</div>
				</div>
			@endif
		</div>
	</div>
@endsection