@extends('layouts.app')

@section('content')
	@include('layouts.banner')

	<div class="container pt-64 pb-64">
		<div class="row justify-content-center">
			@if(count($tasks) > 0)
			<div class="col-12">
				<table class="table table-striped">
					<thead>
						<th>Title</th>
						<th>Description</th>
						<th>Due Date</th>
						<th></th>
					</thead>
					<tbody>
						@foreach($tasks as $task)
						<tr>
							<td>{{ $task->title }}</td>
							<td>{{ $task->description }}</td>
							<td>{{ Carbon\Carbon::parse($task->due_date)->format('M jS, Y') }}</td>
							<td>
								<a href="/admin/tasks/{{ $task->id }}/edit" class="btn btn-primary">Edit</a>
							</td>
						</tr>
						@endforeach
					</tbody>
				</table>
			</div>
			@else
			<div class="col-lg-7 col-md-8 col-sm-12 col-12">
				<div class="grey-box">
					<h3 class="text-center">No Tasks Requested</h3>
					<p class="text-center mb-0">There are currently no tasks requested.</p>
				</div>
			</div>
			@endif
		</div>
	</div>
@endsection