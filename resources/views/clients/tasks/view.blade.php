@extends('layouts.app')

@section('content')
	@include('layouts.banner')

	<div class="container pt-64 pb-64">
		<div class="row justify-content-center">
			@if(count($tasks) > 0)
			<div class="col-12">
				<a href="/clients/dashboard/tasks/request" class="primary-btn">Request New Task</a>
				<table class="table table-striped mt-32">
					<thead>
						<tr>
							<th>Title</th>
							<th>Description</th>
							<th>Due Date</th>
							<th>Status</th>
						</tr>
					</thead>
					<tbody>
						@foreach($tasks as $task)
						<tr>
							<td>{{ $task->title }}</td>
							<td>{{ $task->description }}</td>
							<td>{{ Carbon\Carbon::parse($task->due_date)->format('M jS, Y') }}</td>

							@if($task->status == 1)
							<td><span class="badge badge-primary">Scheduled</span></td>
							@elseif($task->status == 2)
							<td><span class="badge badge-warning">Requested</span></td>
							@elseif($task->status == 3)
							<td><span class="badge badge-info">In Progress</span></td>
							@elseif($task->status == 4)
							<td><span class="badge badge-danger">Waiting on Client</span></td>
							@else
							<td><span class="badge badge-success">Done</span></td>
							@endif

						</tr>
						@endforeach
					</tbody>
				</table>


			</div>
			@else
			<div class="col-lg-7 col-m-d-8 col-sm-12 col-12">
				<div class="grey-box">
					<h3 class="text-center mb-2">No Tasks</h3>
					<p class="text-center">There are currently no tasks available. Click below to request a new task.</p>
					<a href="/clients/dashboard/tasks/request" class="primary-btn centered">Request Task</a>
				</div>
			</div>
			@endif
		</div>
	</div>
@endsection