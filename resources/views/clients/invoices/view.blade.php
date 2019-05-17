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