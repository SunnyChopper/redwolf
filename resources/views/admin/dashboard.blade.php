@extends('layouts.app')

@section('content')
	@include('layouts.banner')

	<div class="container p-32">
		<div class="row">
			<div class="col-lg-6 col-md-6 col-sm-12 col-12">
				<div class="grey-box">
					<h3 class="text-center">Quick Actions</h3>
					<hr />
					<a href="/admin/clients/new" class="primary-btn center-button mt-16 mb-16">Create New Client</a>
					<a href="/admin/invoices/new" class="primary-btn center-button mt-16 mb-16">Create New Invoice</a>
				</div>
			</div>
		</div>
	</div>
@endsection