@extends('layouts.app')

@section('content')
	@include('layouts.banner')

	<div class="container pt-64 pb-64">
		<div class="row">
			<div class="col-lg-8 col-md-8 col-sm-12 col-12">
				<h3 class="mb-16">Tasks Completed</h3>
				<div>{!! $chart->container() !!}</div>
			</div>

			<div class="col-lg-4 col-md-4 col-sm-12 col-12">
				<div class="grey-box">
					<h4>Quick Actions</h4>
					<hr />
					<a href="/clients/dashboard/tasks" class="primary-btn text-center mt-8 mb-8" style="width: 100%;">View Tasks</a>
					<a href="/clients/dashboard/logs" class="primary-btn text-center mt-8 mb-8" style="width: 100%;">View Logs</a>
					{{-- <a href="/clients/dashboard/documents" class="primary-btn text-center mt-8 mb-8" style="width: 100%;">View Documents</a>
					<a href="/clients/dashboard/contracts" class="primary-btn text-center mt-8 mb-8" style="width: 100%;">View Contracts</a> --}}
					<a href="/clients/dashboard/invoices" class="primary-btn text-center mt-8 mb-8" style="width: 100%;">View Invoices</a>
					<hr />
					<h5 class="mb-2"><strong>Your Main Representative:</strong></h5>
					<p class="mb-0"><strong>Name: </strong>{{ \App\Custom\EmployeesHelper::getEmployeeName($client->rep_id) }}</p>
					<p class="mb-0"><strong>Email:</strong> <a href="mailto:{{ \App\Custom\EmployeesHelper::getEmail($client->rep_id) }}">{{ \App\Custom\EmployeesHelper::getEmail($client->rep_id) }}</a></p>

					@if($client->website_dev == 1)
					<hr />
					<h5 class="mb-2">Your Web Dev Representative:</h5>
					<p class="mb-0"><strong>Name: </strong>{{ \App\Custom\EmployeesHelper::getEmployeeName($client->website_dev_employee_id) }}</p>
					<p class="mb-0"><strong>Email:</strong> <a href="mailto:{{ \App\Custom\EmployeesHelper::getEmail($client->website_dev_employee_id) }}">{{ \App\Custom\EmployeesHelper::getEmail($client->website_dev_employee_id) }}</a></p>
					@endif

					@if($client->marketing == 1)
					<hr />
					<h5 class="mb-2">Your Marketing Representative:</h5>
					<p class="mb-0"><strong>Name: </strong>{{ \App\Custom\EmployeesHelper::getEmployeeName($client->marketing_employee_id) }}</p>
					<p class="mb-0"><strong>Email:</strong> <a href="mailto:{{ \App\Custom\EmployeesHelper::getEmail($client->marketing_employee_id) }}">{{ \App\Custom\EmployeesHelper::getEmail($client->marketing_employee_id) }}</a></p>
					@endif

					@if($client->branding == 1)
					<hr />
					<h5 class="mb-2">Your Branding Representative:</h5>
					<p class="mb-0"><strong>Name: </strong>{{ \App\Custom\EmployeesHelper::getEmployeeName($client->branding_employee_id) }}</p>
					<p class="mb-0"><strong>Email:</strong> <a href="mailto:{{ \App\Custom\EmployeesHelper::getEmail($client->branding_employee_id) }}">{{ \App\Custom\EmployeesHelper::getEmail($client->branding_employee_id) }}</a></p>
					@endif

					@if($client->content_curation == 1)
					<hr />
					<h5 class="mb-2">Your Branding Representative:</h5>
					<p class="mb-0"><strong>Name: </strong>{{ \App\Custom\EmployeesHelper::getEmployeeName($client->content_curation_employee_id) }}</p>
					<p class="mb-0"><strong>Email:</strong> <a href="mailto:{{ \App\Custom\EmployeesHelper::getEmail($client->content_curation_employee_id) }}">{{ \App\Custom\EmployeesHelper::getEmail($client->content_curation_employee_id) }}</a></p>
					@endif
				</div>
			</div>
		</div>
	</div>
@endsection

@section('page_js')
	{!! $chart->script() !!}
@endsection