@extends('layouts.app')

@section('content')
	@include('layouts.banner')

	<div class="container pt-64 pb-64">
		<div class="row justify-content-center">
			@if(count($tasks) > 0)
			<div class="col-12">
				<div style="overflow: auto;">
					<table class="table table-striped">
						<thead>
							<tr>
								<th>Title</th>
								<th>Description</th>
								<th>Client</th>
								<th>Due Date</th>
								<th>Status</th>
								<th></th>
							</tr>
						</thead>

						<tbody>
							@foreach($tasks as $task)
							<tr>
								<td>{{ $task->title }}</td>
								<td>{{ substr($task->description, 0, 255) }}</td>
								<td>{{ App\Custom\ClientHelper::get_company_name($task->client_id) }}</td>
								<td>{{ Carbon\Carbon::parse($task->due_date)->format('M jS Y') }}</td>
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
								<td>
									
									<button id="{{ $task->id }}" class="genric-btn danger small rounded ml-2" style="float: right;">Delete</button>
									<a href="/admin/tasks/{{ $task->id }}/edit" class="genric-btn info small rounded ml-2" style="float: right;">Edit</a>
								</td>
							</tr>
							@endforeach
						</tbody>
					</table>

					
				</div>

				<a href="/admin/tasks/new" class="primary-btn centered mt-16">Create New Task</a>
			</div>
			@else
			<div class="col-lg-7 col-md-8 col-sm-10 col-12">
			</div>
			@endif
		</div>
	</div>
@endsection