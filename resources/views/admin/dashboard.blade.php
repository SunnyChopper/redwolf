@extends('layouts.app')

@section('content')
	@include('layouts.banner')

	<div class="container pt-64 pb-64">
		<div class="row">
			<div class="col-lg-8 col-md-8 col-sm-12 col-12">
				<h3 class="mb-2">Upcoming Tasks</h3>
				@if(count($tasks) > 0)
					<div style="overflow: auto;">
						<table class="table table-striped mt-16">
							<thead>
								<tr>
									<th>Title</th>
									<th>Client</th>
									<th>Due Date</th>
									<th>Status</th>
								</tr>
							</thead>
							<tbody>
								@foreach($tasks as $task)
								<tr>
									<td>{{ $task->title }}</td>
									<td>{{ \App\Custom\ClientHelper::get_company_name($task->client_id) }}</td>
									<td>{{ Carbon\Carbon::parse($task->due_date)->format('M jS, Y') }}</td>
									<td>
										@if($task->status == 1)
										Scheduled
										@elseif($task->status == 2)
										Waiting for Approval
										@elseif($task->status == 3)
										In Progress
										@elseif($task->status == 4)
										Waiting on Client
										@else
										Done
										@endif
									</td>
								</tr>
								@endforeach
							</tbody>
						</table>
					</div>
				@else
					<div class="grey-box">
						<h4 class="text-center mb-2">No Upcoming Tasks</h4>
						<p class="text-center">There are currently no upcoming tasks for any client. Click the button below to create a new task.</p>
						<a href="{{ url('/admin/tasks/new') }}" class="primary-btn center-button">Create New Task</a>
					</div>
				@endif
			</div>

			<div class="col-lg-4 col-md-4 col-sm-12 col-12 mt-32-mobile">
				<div class="grey-box">
					<h3 class="text-center">Quick Actions</h3>
					<hr />
					<a href="/admin/clients/new" class="primary-btn center-button mt-16 mb-16">Create New Client</a>
					<a href="/admin/invoices/new" class="primary-btn center-button mt-16 mb-16">Create New Invoice</a>
					<a href="{{ url('/admin/tasks/new') }}" class="primary-btn center-button mt-16 mb-0">Create New Task</a>
				</div>
			</div>
		</div>
	</div>

	<div style="background: #EAEAEA;">
		<div class="container pt-64 pb-64">
			<div class="row">
				<div class="col-12">
					<h3>Past Tasks</h3>
				</div>
			</div>

			<div class="row">
				@foreach($past_tasks as $past_task)
					<div class="col-lg-4 col-md-4 col-sm-6 col-12 mt-16 mb-16">
						<div style="background: white; border-radius: 8px; padding: 16px;">
							<h5 class="mb-2">{{ $past_task->title }}</h5>
							<p class="mb-1">{{ $past_task->description }}</p>
							<p class="mb-1"><b>Client: </b> {{ \App\Custom\ClientHelper::get_company_name($past_task->client_id) }}</p>
							<p class="mb-1"><b>Due Date: </b> {{ Carbon\Carbon::parse($past_task->due_date)->format('M jS, Y') }}</p>
							<p class="mb-0"><b>Status: </b> 
								@if($task->status == 1)
								<span class="red">Scheduled</span>
								@elseif($task->status == 2)
								<span class="red">Waiting for Approval</span>
								@elseif($task->status == 3)
								<span class="red">In Progress</span>
								@elseif($task->status == 4)
								<span class="red">Waiting on Client</span>
								@else
								<span class="green">Done</span>
								@endif
							</p>
						</div>
					</div>
				@endforeach
			</div>
		</div>
	</div>
@endsection